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
                    <label for="images">Upload Gambar Baru:</label>
                    <input type="file" name="images[]" id="images" multiple onchange="previewImages()" class="form-control">
                    <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-2"></div>

                    <input type="hidden" name="main_image_index" id="main_image_index" value="0">
                    <small class="text-muted d-block mt-1">Klik gambar untuk jadikan gambar utama (border kuning)</small>

                    @error('images')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <p>Gambar Lama:</p>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($product->images as $image)
                        <div class="position-relative">
                            <img src="{{ asset('image/' . $image->image_path) }}"
                                class="img-preview {{ $image->is_main ? 'active' : '' }}"
                                alt="gambar" width="80" height="80">

                            <div class="form-check mt-1">
                                <input type="radio" name="existing_main_image_id" value="{{ $image->id }}" {{ $image->is_main ? 'checked' : '' }}>
                                <label class="form-check-label">Gambar Utama</label>
                            </div>

                            <div class="form-check mt-1">
                                <input type="checkbox" name="delete_image_ids[]" value="{{ $image->id }}">
                                <label class="form-check-label text-danger">Hapus</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Update Produk</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let selectedMainIndex = 0;

    function updateCount() {
        const textarea = document.querySelector('textarea[name="description"]');
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
        border-radius: 5px;
        cursor: pointer;
    }

    .img-preview.active {
        border: 3px solid orange !important;
    }
</style>
@endpush