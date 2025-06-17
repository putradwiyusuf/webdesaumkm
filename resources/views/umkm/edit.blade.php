@extends('layouts.app')

@section('title', 'Edit Data UMKM Website Desa Wargaluyu')

@section('content')

@php $user = auth()->user(); @endphp
<div class="container">
    @if ($user->level === 'user')
    <a href="{{ url('/dashboard') }}" class="btn btn-primary mb-3">Kembali</a>
    @else
    <a href="/admin/umkm" class="btn btn-primary mb-3">Kembali</a>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{ $user->level === 'user' ? route('umkm.user.update', $umkm->id) : route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nama UMKM</label>
                    <input type="text" class="form-control" name="title" placeholder="Nama UMKM"
                        value="{{ old('title', $umkm->title) }}">
                </div>
                @error('title')
                <small style="color:red">{{ $message }}</small>
                @enderror


                @if ($user->level === 'user')
                <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">
                @else
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $umkm->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('user_id')
                <small style="color:red">{{ $message }}</small>
                @enderror
                @endif
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="number" class="form-control" name="phone" placeholder="08xxxxxxxxxx" value="{{ old('phone', $umkm->phone) }}">
                </div>
                @error('phone')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control @error('description') is-invalid @enderror"
                        maxlength="250" oninput="updateCount()"
                        placeholder="Deskripsi">{{ old('description', $umkm->description) }}</textarea>
                    <small id="charCount">0 / 250 karakter</small>
                </div>
                @error('description')
                <small style="color:red">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label for="image">Gambar (kosongkan jika tidak ingin ganti)</label>
                    <input type="file" class="form-control" name="image">
                    @if($umkm->image)
                    <img src="{{ asset('image/' . $umkm->image) }}" alt="" width="100" class="mt-2">
                    @endif
                </div>
                @error('image')
                <small style="color:red">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update</button>
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
        countDisplay.textContent = `${textarea.value.length} / 250 karakter`;
    }

    document.addEventListener("DOMContentLoaded", updateCount);
</script>
@endpush