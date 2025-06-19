<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Product::query()->with('umkm');

        // Superadmin dan admin bisa lihat semua
        if ($user->level === 'user') {
            $query->whereHas('umkm', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        // Optional: filter keyword & umkm_id
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('umkm_id')) {
            $query->where('umkm_id', $request->umkm_id);
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        // $umkms = Umkm::all(); // untuk filter dropdown

        // UMKM hanya ditampilkan jika admin atau superadmin
        $umkms = in_array($user->level, ['admin', 'superadmin']) ? Umkm::all() : collect();


        return view('products.index', compact('products', 'umkms'));
    }

    public function create()
    {
        $user = auth()->user();

        $umkms = in_array($user->level, ['admin', 'superadmin']) ? Umkm::all() : collect();

        return view('products.create', compact('umkms', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:250',
            'price' => 'required|numeric|min:0',
            'images' => 'required|array',
            'images.*' => 'image|max:2048',
            'umkm_id' => 'required|exists:umkms,id',
        ], [
            'name.required' => 'Judul wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 250 karakter.',
            'price.required' => 'Harga wajib diisi.',
            'umkm_id.required' => 'UMKM tidak boleh kosong.',
            'umkm_id.exists' => 'UMKM tidak valid.',
            'images.required' => 'Minimal satu gambar harus diupload.',
            'images.*.image' => 'Setiap file harus berupa gambar.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB per file.',
        ]);

        $data = $request->only(['name', 'description', 'price', 'umkm_id']);

        $product = Product::create($data);

        // Simpan semua gambar ke tabel product_images
        if ($request->hasFile('images')) {
            $mainIndex = (int) $request->input('main_image_index', 0);

            foreach ($request->file('images') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);

                $product->images()->create([
                    'image_path' => $filename,
                    'is_main' => $index === $mainIndex,
                ]);
            }
        }

        return redirect()->route('products.index')->with('message', 'Produk berhasil ditambahkan');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit($product)
    {
        $product = Product::findOrFail($product);
        $umkms = Umkm::all();

        return view('products.edit', compact('product', 'umkms'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:250',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'umkm_id' => 'required|exists:umkms,id',
        ], [
            'name.required' => 'Judul wajib diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 250 karakter.',
            'price.required' => 'Harga wajib diisi.',
            'umkm_id.required' => 'UMKM tidak boleh kosong.',
            'umkm_id.exists' => 'UMKM tidak valid.',
            'images.*.image' => 'Setiap file harus berupa gambar.',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'umkm_id' => $request->umkm_id,
        ]);

        // Hapus gambar lama yang dicentang untuk dihapus
        if ($request->filled('delete_image_ids')) {
            foreach ($request->delete_image_ids as $imageId) {
                $image = $product->images()->find($imageId);
                if ($image) {
                    @unlink(public_path('image/' . $image->image_path));
                    $image->delete();
                }
            }
        }

        // Upload gambar baru
        if ($request->hasFile('images')) {
            $mainIndex = (int) $request->input('main_image_index', 0);

            foreach ($request->file('images') as $index => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);

                $product->images()->create([
                    'image_path' => $filename,
                    'is_main' => $index === $mainIndex && !$request->has('existing_main_image_id'),
                ]);
            }
        }

        // Set gambar utama (dari gambar lama)
        if ($request->filled('existing_main_image_id')) {
            $product->images()->update(['is_main' => false]);
            $product->images()->where('id', $request->existing_main_image_id)->update(['is_main' => true]);
        }

        return redirect()->route('products.index')->with('message', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('selected', []);

        if (count($ids)) {
            Product::whereIn('id', $ids)->delete();
            return redirect()->route('products.index')->with('message', 'Produk berhasil dihapus secara massal.');
        }

        return redirect()->route('products.index')->with('message', 'Tidak ada produk yang dipilih.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    public function incrementClick($id)
    {
        $product = Product::findOrFail($id);
        $product->increment('click_count');
        return response()->json(['success' => true]);
    }

    public function export()
    {
        // Implementasi ekspor produk ke format yang diinginkan (misalnya CSV, Excel)
        // ...
    }

    public function import(Request $request)
    {
        // Implementasi impor produk dari file yang diunggah
        // ...
    }

    public function getUmkmProducts($umkmId)
    {
        $products = Product::where('umkm_id', $umkmId)->get();
        return response()->json($products);
    }

    public function getProductById($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
}
