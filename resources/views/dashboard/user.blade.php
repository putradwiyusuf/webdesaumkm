@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center text-md-start">Dashboard UMKM Anda</h2>

    @php
        $umkm = \App\Models\Umkm::where('user_id', $user->id)->first();
    @endphp

    @if ($umkm)
        @php
            $totalProduk = \App\Models\Product::where('umkm_id', $umkm->id)->count();
        @endphp

        <div class="card mb-4 shadow-sm">
            <div class="row g-0 flex-column flex-md-row">
                <div class="col-md-4 text-center p-3">
                    <img src="/image/{{ $umkm->image }}" class="img-fluid rounded mb-2" alt="Foto UMKM">
                </div>
                <div class="col-md-8 p-3">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start mb-2">
                        <div>
                            <h2 class="fw-bold mb-1 ">{{ $umkm->title }}</h2>
                            <div class="text-muted d-flex align-items-center">
                                <i class="bi bi-telephone me-1"></i> 
                                <small>{{ $umkm->phone ?? '-' }}</small>
                            </div>
                        </div>
                     </div>

                    <p class="text-muted mb-2"><i class="bi bi-info-circle me-1"></i>{{ $umkm->description }}</p>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-box-seam me-2"></i> 
                            <strong>Total Produk:</strong> {{ $totalProduk }}
                        </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-eye me-2"></i> 
                            <strong>Total Klik Produk:</strong> {{ $umkm->products->sum('click_count') }}
                        </div>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-3 mt-3">
                    <a href="{{ route('umkm.user.edit', $umkm->id) }}" class="btn btn-primary mt-2 mt-md-0">Edit Profil</a>
                    </div>
                </div>
                    
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center">
            Anda belum memiliki data UMKM. <a href="{{ route('umkm.create') }}">Klik di sini untuk menambahkan.</a>
        </div>
    @endif
</div>
@endsection
