@extends('layouts.home.layouts.app')

@section('title', 'UMKM')

@section('content')
  <section id="services" class="services services">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>UMKM Website Desa Wargaluyu</h2>
        </div>
        
        <div class="row">
        @foreach ($umkm as $umkm)
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
          <img src="/image/{{$umkm->image}}" alt="" class="img-fluid" width="100">
            <h4>{{$umkm->title}}</h4>
          <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($umkm->description), 200, '...') }}
          </p>
          
          <a href="{{ route('umkm.detail', $umkm->id) }}" class="btn btn-sm btn-primary">
              Lihat Selengkapnya >
          </a>
          </div>
          @endforeach
        </div>
    
      </div>
    </section><!-- End Services Section -->
@endsection