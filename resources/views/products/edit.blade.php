@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<div class="container">
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @php $user = auth()->user(); @endphp

                @if ($user->level === 'user')
                <input type="hidden" name="umkm_id" value="{{ $product->umkm_id }}">
                @else
                <div class="form-group">
                    <label for="umkm_id">UMKM</label>
                    <select name="umkm_id" id="umkm_id" class="form-control">
                        @foreach ($umkms as $umkm)
                        <option value="{{ $umkm->id }}" {{ $product->umkm_id == $umkm->id ? 'selected' : '' }}>
                            {{ $umkm->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('umkm_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                @endif
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="5" maxlength="250" oninput="updateCount()">{{ old('description', $product->description) }}</textarea>
                    <small id="charCount">0 / 250 karakter</small>
                    @error('description')
                    <br><small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Gambar Produk</label>
                    <input type="file" name="image" class="form-control">
                    @if ($product->image)
                    <div class="mt-2">
                        <p>Gambar saat ini:</p>
                        <img src="{{ asset('image/' . $product->image) }}" width="120">
                    </div>
                    @endif
                    @error('image')
                    <br><small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function updateCount() {
        const textarea = document.querySelector('textarea[name="description"]');
        const countDisplay = document.getElementById('charCount');
        countDisplay.textContent = `${textarea.value.length} / 250 karakter`;
    }
    document.addEventListener("DOMContentLoaded", updateCount);
</script>
@endpush