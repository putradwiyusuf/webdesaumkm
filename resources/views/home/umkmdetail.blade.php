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
        </div>
      </div>
    </div>

    <!-- {{-- Produk --}} -->
    @if($umkm->products->count())
    <h4 class="mb-4 font-weight-bold text-uppercase">Produk dari Toko Ini</h4>
    <div class="row">
      @foreach($umkm->products as $product)
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow-sm border-0 hover-shadow">
            <img src="{{ asset('image/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
              <p class="text-muted small">{{ $product->description }}</p>
              <div class="mt-auto">
                <span class="text-primary font-weight-bold h6">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
              </div>
            </div>
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
