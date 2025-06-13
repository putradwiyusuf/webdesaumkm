@extends('layouts.home.layouts.app')

@section('title', 'Gallery')

@section('content')
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Galeri Website Desa Wargaluyu</h2>
        </div>

        <div class="gallery-slider swiper">
       
          <div class="swiper-wrapper align-items-center">
          @foreach ($galeri as $index => $galeri)
            <div class="swiper-slide{{$index === 0 ? 'active' : ''}}">
              <a class="gallery-lightbox" href="image/{{$galeri->image}}"> <img src="image/{{$galeri->image}}" class="img-fluid" alt=""> </a>
           
            </div>
            @endforeach
            </div>
            <div class="swiper-pagination">
            
            </div>
          
      
        </div>

      </div>
    </section><!-- End Gallery Section -->
@endsection