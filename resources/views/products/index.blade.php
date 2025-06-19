@extends('layouts.app')

@section('title','Data Produk')

@section('content')

<div class="container">
  <div class="content">
    <div class="container-fluid">

      <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

      @if ($message = Session::get('message'))
      <div class="alert alert-success">
        <strong>Berhasil!</strong> {{ $message }}
      </div>
      @endif

      <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
          <input type="text" name="keyword" class="form-control" placeholder="Cari nama produk..." value="{{ request('keyword') }}">
        </div>

        @if($umkms->isNotEmpty())
        <div class="col-md-4">
          <select name="umkm_id" class="form-control">
            <option value="">-- Semua UMKM --</option>
            @foreach ($umkms as $umkm)
            <option value="{{ $umkm->id }}" {{ request('umkm_id') == $umkm->id ? 'selected' : '' }}>
              {{ $umkm->title }}
            </option>
            @endforeach
          </select>
        </div>
        @endif

        <div class="col-md-4 d-flex gap-2">
          <button type="submit" class="btn btn-primary w-100">Filter</button>
          <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset</a>
        </div>
      </form>

      <div class="table-responsive">
        <form id="product-form" method="POST" action="{{ route('products.bulkDelete') }}">
          @csrf
          @method('DELETE')

          <table class="table table-bordered table-hover table-striped align-middle table-sm">
            <thead class="table-dark">
              <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>No</th>
                <th>Nama Produk</th>
                <th>UMKM</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($products as $index => $product)
              <tr>
                <td><input type="checkbox" name="selected[]" value="{{ $product->id }}" class="select-item"></td>
                <td>{{ $products->firstItem() + $index }}</td>
                <td>{{ $product->name }}</td>
                <td class="text-muted">{{ $product->umkm->title ?? '-' }}</td>
                <td>{{ $product->description }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>
                  @php
                    $mainImage = $product->mainImage ?? $product->images->first();
                  @endphp
                  @if ($mainImage)
                  <img src="{{ asset('image/' . $mainImage->image_path) }}" class="image-square" alt="Produk">
                  @else
                  <span class="text-muted">-</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex flex-column gap-1">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center text-muted">Data produk tidak ditemukan.</td>
              </tr>
              @endforelse
            </tbody>
          </table>

          <button type="submit" class="btn btn-danger mt-2"
            onclick="return confirm('Hapus semua data yang dipilih?')">Bulk Delete</button>
        </form>
      </div>

      <div class="d-flex justify-content-end mt-4">
        {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
      </div>

    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
    // Select all checkbox
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.select-item');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
@endpush

@push('styles')
<style>
  .image-square {
    width: 90px;
    aspect-ratio: 1 / 1;
    object-fit: cover;
    border-radius: 6px;
  }

  table td, table th {
    vertical-align: middle !important;
    padding: 12px !important;
  }
</style>
@endpush