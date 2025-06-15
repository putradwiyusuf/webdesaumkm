@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Berita</h5>
                    <p class="card-text fs-3">{{ \App\Models\News::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-secondary">
                <div class="card-body">
                    <h5 class="card-title">Total Galeri</h5>
                    <p class="card-text fs-3">{{ \App\Models\Galeri::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-success mt-4">
        Halo {{ $user->name }}! Anda bertugas mengelola konten website seperti berita, galeri, dan data publik.
    </div>
</div>
@endsection
