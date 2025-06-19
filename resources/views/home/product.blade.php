@extends('layouts.home.layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-5">
            @if ($product->images->count())
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($product->images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <div class="ratio ratio-1x1"> {{-- atau gunakan ratio-4x3 jika ingin tidak persegi --}}
                            <img src="{{ asset('image/' . $image->image_path) }}"
                                class="w-100 h-100 object-fit-cover rounded"
                                alt="Gambar Produk">
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            <!-- Thumbnail -->
            <div class="d-flex justify-content-center mt-2 gap-2">
                @foreach ($product->images as $key => $image)
                <img src="{{ asset('image/' . $image->image_path) }}"
                    class="img-thumbnail"
                    style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                    onclick="setActiveSlide('{{ $key }}')">
                @endforeach
            </div>
            @else
            <img src="{{ asset('image/default.jpg') }}" class="img-fluid rounded mb-3" alt="Gambar Produk Default">
            @endif
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
                    <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(-1)">-</button>
                    <input type="text" id="quantityInput" class="form-control text-center" value="1" readonly>
                    <button type="button" class="btn btn-outline-secondary" onclick="changeQuantity(1)">+</button>
                </div>
            </div>

            <div class="d-flex gap-2">
                <!-- <button class="btn btn-outline-danger w-50">Masukkan Keranjang</button> -->
                @if ($product->umkm && $product->umkm->phone)
                <a
                    href="https://wa.me/{{ $product->umkm->phone }}?text=Halo%20saya%20mau%20beli%20produk%20{{ urlencode($product->name) }}"
                    target="_blank"
                    class="btn btn-success d-flex align-items-center justify-content-center w-100 mt-3"
                    style="font-size: 1rem;">
                    <i class="bi bi-whatsapp me-2"></i> Beli Sekarang via WhatsApp
                </a>
                @else
                <div class="alert alert-warning mt-3">
                    Kontak WhatsApp belum tersedia untuk UMKM ini.
                </div>
                @endif
                <!-- <a
                    href="https://wa.me/{{ $product->umkm->phone }}?text=Halo%20saya%20mau%20beli%20produk%20{{ urlencode($product->name) }}"
                    target="_blank"
                    class="btn btn-success w-50 d-flex align-items-center justify-content-center">
                    <i class="bi bi-whatsapp me-2"></i> Beli Sekarang
                </a> -->
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

@push('scripts')
<script>
    function changeQuantity(change) {
        const input = document.getElementById('quantityInput');
        let current = parseInt(input.value) || 1;
        current += change;
        if (current < 1) current = 1;
        input.value = current;
    }

    // Add this function to control the carousel slide
    function setActiveSlide(index) {
        var carousel = document.getElementById('productCarousel');
        if (carousel) {
            var bsCarousel = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
            bsCarousel.to(index);
        }
    }
</script>
@endpush