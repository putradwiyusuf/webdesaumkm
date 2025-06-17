<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umkm = Umkm::all();

        return view('umkm.index', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('level', 'user')->get();
        return view('umkm.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'user_id' => 'required|exists:users,id',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'image.required' => 'Gambar wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'user_id.required' => 'User tidak boleh kosong.',
            'user_id.exists' => 'User tidak valid.',
        ]);

        $input = $request->all();

        // Cek jika user sudah punya UMKM
        // if (Umkm::where('user_id', $request->user_id)->exists()) {
        //     return back()->withErrors(['user_id' => 'User ini sudah memiliki UMKM.'])->withInput();
        // }

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName =
                $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }

        Umkm::create($input);

        return redirect('admin/umkm')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Umkm $umkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($umkm)
    {
        $umkm = Umkm::findOrFail($umkm);
        $users = User::where('level', 'user')->get(); // hanya ambil user biasa

        return view('umkm.edit', compact('umkm', 'users'));
    }

    /**
     * Update the specified resource in storage by user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editByUser()
    {
        $umkm = Umkm::where('user_id', auth()->id())->firstOrFail();
        $users = User::where('id', auth()->id())->get(); // hanya ambil user biasa
        return view('umkm.edit', compact('umkm','users'));
    }
    /**
     * Update the specified resource in storage by user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateByUser(Request $request)
    {
        $umkm = Umkm::where('user_id', auth()->id())->firstOrFail();
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'user_id.required' => 'User tidak boleh kosong.',
            'user_id.exists' => 'User tidak valid.',
            'image.image' => 'File harus berupa gambar.',
        ]);

        $umkm->title = $request->title;
        $umkm->description = $request->description;
        $umkm->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($umkm->image && file_exists(public_path('image/' . $umkm->image))) {
                unlink(public_path('image/' . $umkm->image));
            }

            $image = $request->file('image');
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move(public_path($destinationPath), $imageName);
            $umkm->image = $imageName;
        }

        $umkm->save();

        return redirect()->route('dashboard')->with('message', 'Data berhasil diupdate.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image',
        ], [
            'title.required' => 'Judul wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 500 karakter.',
            'user_id.required' => 'User tidak boleh kosong.',
            'user_id.exists' => 'User tidak valid.',
            'image.image' => 'File harus berupa gambar.',
        ]);

        $umkm->title = $request->title;
        $umkm->description = $request->description;
        $umkm->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($umkm->image && file_exists(public_path('image/' . $umkm->image))) {
                unlink(public_path('image/' . $umkm->image));
            }

            $image = $request->file('image');
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move(public_path($destinationPath), $imageName);
            $umkm->image = $imageName;
        }

        $umkm->save();

        return redirect()->route('umkm.index')->with('message', 'Data berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect('admin/umkm')->with('message', 'Data berhasil dihapus');
    }
}
