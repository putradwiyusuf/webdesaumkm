@extends('layouts.home.layouts.app')

@section('title', 'Berita')

@section('content')
<section>
</section><!-- End Hero -->
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Berita Terbaru Website Desa Wargaluyu</h2>
    </div>

    <div class="row">
      @foreach ($news as $news)
      <div class="col-md-3 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
          <div class="member-img">
            <img src="/image/{{$news->image}}" alt="" class="img-fluid">
          </div>
          <br>
          <div class="text-center">
            <h4>{{$news->title}}</h4>
          </div>
          <p class="description">{{$news->description}}</p>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Featured Services Section -->

<main>
</main><!-- End #main -->

@endsection