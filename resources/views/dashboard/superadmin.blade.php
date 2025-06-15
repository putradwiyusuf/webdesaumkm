@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text fs-2">{{ \App\Models\User::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Total UMKM</h5>
                    <p class="card-text fs-2">{{ \App\Models\Umkm::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Event</h5>
                    <p class="card-text fs-2">{{ \App\Models\Event::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info mt-4">
        <strong>Selamat datang, {{ $user->name }}!</strong> Anda memiliki akses penuh ke seluruh sistem.
    </div>
</div>
@endsection
