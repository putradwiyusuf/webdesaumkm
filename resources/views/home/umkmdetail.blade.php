@extends('layouts.home.layouts.app')

@section('title', 'UMKM')

@section('content')

<section class="pt-5 pb-5 bg-white">
  <div class="container">
    <div class="card shadow-sm border-0 p-4 mb-5">
      <div class="row align-items-center">
        <div class="col-md-2 text-center mb-3 mb-md-0">
          @if($umkm->image)
          <img src="{{ asset('image/'.$umkm->image) }}" alt="{{ $umkm->title }}" class="img-fluid rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
          @else
          <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
            <i class="fas fa-store text-secondary" style="font-size: 48px;"></i>
          </div>
          @endif
        </div>
        <div class="col-md-10">
          <h3 class="font-weight-bold mb-1">{{ $umkm->title }}</h3>
          <p class="text-muted">{{ $umkm->description }}</p>
          <p class="text-secondary small">
            <i class="fas fa-box-open"></i> {{ $umkm->products->count() }} Produk Tersedia
          </p>
          <p class="text-secondary small">
            <i class="fas fa-hand-pointer"></i> Produk Dilihat: {{ $umkm->products->sum('click_count') }} kali
          </p>
        </div>
      </div>
    </div>

    <!-- {{-- Produk --}} -->
    @if($umkm->products->count())
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Produk Dari UMKM Ini</h2>
        </div>

        <div class="row">
          @foreach($umkm->products as $product)
          <div class="col-md-3 mb-4 d-flex align-items-stretch">
            <div class="icon-box w-100 p-3 shadow-sm d-flex flex-column">
              <a href="{{ route('product.show', $product->id) }}" onclick="increaseClick('{{ $product->id }}')">
                <div class="member-img position-relative" style="height: 200px; overflow: hidden; border-radius: 10px;">
                  <img src="{{ asset('image/' . $product->image) }}"
                    class="img-fluid w-100"
                    alt="{{ $product->name }}"
                    style="height: 100%; object-fit: cover;">

                  <span class="position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 small rounded-start">
                    {{ $product->click_count }} klik
                  </span>
                </div>

                <div class="mt-3">
                  <h5 class="title font-weight-bold text-warning mb-1">{{ $product->name }}</h5>
                  <p class="description mb-2" style="min-height: 48px;">{{ Str::limit($product->description, 60) }}</p>
                  <div class="mt-auto">
                    <span class="text-danger font-weight-bold h6">
                      Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <p class="text-muted">Belum ada produk dari toko ini.</p>
        @endif
      </div>
    </section>
    @endsection
    @push('scripts')
    <script>
      function increaseClick(id) {
        fetch(`/product/${id}/click`, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
          }
        });
      }
    </script>
    @endpush