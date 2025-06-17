@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard UMKM Anda</h2>

    @php
        $umkm = \App\Models\Umkm::where('user_id', $user->id)->first();
    @endphp

    @if ($umkm)
        @php
            $totalProduk = \App\Models\Product::where('umkm_id', $umkm->id)->count();
        @endphp

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/image/{{ $umkm->image }}" class="img-fluid rounded-start" alt="Foto UMKM">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $umkm->title }}</h5>
                        <p class="card-text">{{ $umkm->description }}</p>
                        <p class="card-text"><strong>Total Produk:</strong> {{ $totalProduk }}</p>
                        <a href="{{ route('umkm.user.edit', $umkm->id) }}" class="btn btn-primary">Edit Profil UMKM</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Anda belum memiliki data UMKM. <a href="{{ route('umkm.create') }}">Klik di sini untuk menambahkan.</a>
        </div>
    @endif
</div>
@endsection
