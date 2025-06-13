@extends('layouts.app')

@section('title', 'Tambah Data UMKM Website Desa Wargaluyu')

@section('content')

<div class="container">
    <a href="/admin/umkm" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('umkm.store')  }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </div>
                @error('title')
                <small style="color:red">{{$message}}</small>
                @enderror
                 <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        cols="30" 
                        rows="10" 
                        class="form-control @error('description') is-invalid @enderror" 
                        placeholder="Deskripsi"
                        maxlength="500"
                        oninput="updateCount()">{{ old('description') }}</textarea>
                    <small id="charCount">0 / 500 karakter</small>
                </div>
                @error('description')
                <small style="color:red">{{$message}}</small>
                @enderror
                 <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="image" >
                </div>
                 @error('image')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function updateCount() {
        const textarea = document.getElementById('description');
        const countDisplay = document.getElementById('charCount');
        countDisplay.textContent = `${textarea.value.length} / 500 karakter`;
    }

    // Jalankan saat halaman dimuat agar count tetap muncul jika ada old value
    document.addEventListener("DOMContentLoaded", updateCount);
</script>
@endpush
