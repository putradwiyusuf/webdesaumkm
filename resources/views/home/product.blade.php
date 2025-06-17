@extends('layouts.home.layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-5">
            <img src="{{ asset('image/' . $product->image) }}" class="img-fluid rounded mb-3" alt="Gambar Produk">
        </div>

        <!-- Informasi Produk -->
        <div class="col-md-7">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>

            <h3 class="text-danger">Rp{{ number_format($product->price, 0, ',', '.') }}</h3>

            <p>
                <span class="badge bg-warning text-dark">Free Ongkir Sedesa</span>
                <!-- <span class="ms-2">⭐ 4.5 (10RB+ Penilaian)</span> -->
            </p>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah:</label>
                <div class="input-group" style="width: 120px;">
                    <button class="btn btn-outline-secondary">-</button>
                    <input type="text" class="form-control text-center" value="1">
                    <button class="btn btn-outline-secondary">+</button>
                </div>
            </div>

            <div class="d-flex gap-2">
                <!-- <button class="btn btn-outline-danger w-50">Masukkan Keranjang</button> --><a
                    href="https://wa.me/6281234567890?text=Halo%20saya%20mau%20beli%20produk%20{{ urlencode($product->name) }}"
                    target="_blank"
                    class="btn btn-success w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-whatsapp me-2"></i> Beli Sekarang
                </a>
            </div>
        </div>
    </div>
    
<div class="mt-4">
    <a href="{{ url('umkm/' . $product->umkm->id) }}" class="btn btn-secondary">
        &larr; Kembali ke Halaman Toko
    </a>
</div>
</div>
@endsection