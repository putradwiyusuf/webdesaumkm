@extends('layouts.home.layouts.app')

@section('title', 'UMKM')

@section('content')
  <!-- ======= UMKM Detail Section ======= -->
  <section id="services" class="services services">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>{{ strtoupper($umkm->title) }}</h2>
      </div>

      <div class="row">
        @if($umkm->image)
          <div class="col-12 mb-4 text-center">
            <img src="/image/{{$umkm->image}}" alt="Foto UMKM" width="250">
          </div>
        @endif
        <div class="col-12">
          <p>{{ $umkm->description }}</p>
        </div>
      </div>
    </div>
  </section><!-- End UMKM Detail Section -->
@endsection
