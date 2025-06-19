@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

<div class="container">
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama produk" value="{{ old('name') }}">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @php $user = auth()->user(); @endphp

                @if ($user->level === 'user')
                <input type="hidden" name="umkm_id" value="{{ $user->umkm->id ?? '' }}">
                @else
                <div class="form-group">
                    <label for="umkm_id">Pilih UMKM</label>
                    <select name="umkm_id" id="umkm_id" class="form-control">
                        <option value="">-- Pilih UMKM --</option>
                        @foreach ($umkms as $umkm)
                        <option value="{{ $umkm->id }}" {{ old('umkm_id') == $umkm->id ? 'selected' : '' }}>
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
                    <textarea
                        name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        maxlength="250"
                        placeholder="Deskripsi produk"
                        oninput="updateCount()">{{ old('description') }}</textarea>
                    <small id="charCount">0 / 250 karakter</small>
                    @error('description')
                    <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="Harga (Rp)" value="{{ old('price') }}">
                    @error('price')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="images">Upload Gambar Produk:</label>
                    <input type="file" name="images[]" id="images" multiple onchange="previewImages()" class="form-control">

                    <div id="imagePreview" class="d-flex flex-wrap gap-2"></div>

                    <input type="hidden" name="main_image_index" id="main_image_index" value="0">
                    <small class="text-muted d-block mt-1">Klik gambar untuk menjadikannya gambar utama (border kuning)</small>
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary w-100">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let selectedMainIndex = 0;

    function updateCount() {
        const textarea = document.getElementById('description');
        const countDisplay = document.getElementById('charCount');
        countDisplay.textContent = `${textarea.value.length} / 250 karakter`;
    }

    document.addEventListener("DOMContentLoaded", updateCount);

    function previewImages() {
        const input = document.getElementById('images');
        const preview = document.getElementById('imagePreview');

        if (!input || !preview || !input.files) return;

        const files = Array.from(input.files);
        preview.innerHTML = ''; // kosongkan dulu

        files.forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-preview' + (index === selectedMainIndex ? ' active' : '');
                img.title = "Klik untuk jadikan gambar utama";

                img.addEventListener('click', () => {
                    selectedMainIndex = index;
                    document.getElementById('main_image_index').value = index;
                    previewImages(); // refresh ulang tampilan
                });

                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    }
</script>

@endpush
@push('styles')
<style>
.img-preview {
    width: 80px;
    height: 80px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid #ccc;
    border-radius: 6px;
}

.img-preview.active {
    border: 3px solid orange;
}
</style>
    
@endpush