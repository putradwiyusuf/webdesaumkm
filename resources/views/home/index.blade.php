@extends('layouts.home.layouts.app')

@section('title', 'Home')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      @foreach ($sliders as $index => $slider)
      <!-- Slide 1 -->
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image: url('/image/{{ $slider->image }}'); background-size: cover; background-position: center;">
        <div class="carousel-content animate__animated animate__fadeInUp">
          <h1 class="animate__animated animate__fadeInDown">{{ $slider->title }}</h1>
          <p style="color: #3fbbc0;" class="animate__animated animate__fadeInUp">{{ $slider->description }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- =======  UMKM  ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Produk Unggulan UMKM</h2>
      </div>
      @foreach($umkm as $u)
      @if($u->products->count())
      <h4 class="mt-4">{{ $u->title }}</h4>
      <div class="row">
        @foreach($u->products->take(3) as $product)
        <div class="col-md-3 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('product.show', $product->id) }}" onclick="increaseClick('{{ $product->id }}')">
              <div class="member-img">
                <img src="{{ asset('image/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                <!-- Jumlah klik di pojok kanan bawah -->
                <span class="position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 small rounded-start">
                  {{ $product->click_count }} klik
                </span>
                <div class="">
                  <h5 class="title font-weight-bold text-warning">{{ $product->name }}</h5>
                  <p class="description">{{ $product->description }}</p>
                  <div class="mt-auto">
                    <span class="text-danger font-weight-bold h6">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                  </div>
                </div>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-end mt-2">
      <a href="{{ route('umkm.detail', $u->id) }}" class="btn btn-sm btn-outline-primary">
        Lihat semua produk dari {{ $u->title }} >
      </a>
    </div>
    @endif
    @endforeach
  </section>
  <!-- End UMKM Section -->

  <!-- ======= Counts Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Data Website Desa Wargaluyu</h2>
      </div>

      <div class="row">
        @foreach ($data as $data)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon">
              <img src="/image/{{$data->image}}" alt="" class="img-fluid" width="80">
            </div>
            <h4>{{$data->title}}</h4>
            <p class="description">{{$data->description}}</p>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Featured Services Section -->


  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">

      <div class="text-center">
        <h3>Sejarah Desa Wargaluyu</h3>
        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
        <a class="cta-btn scrollto" href="/sejarah">Lihat detail</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      @foreach ($sambutan as $sambutan)
      <div class="section-title">
        <h2>Sambutan Kepala Desa</h2>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="/image/{{$sambutan->image}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>{{$sambutan->title}}</h3>
          <br>
          <p>
            {{$sambutan->description}}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </section><!-- End About Us Section -->


  <!-- ======= Features Section ======= -->

  <section id="visimisi" class="features">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Visi, Misi dan Motto</h2>
      </div>

      <div class="row">
        <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
          <div class="icon-box mt-5 mt-lg-0">
            <i class="bx bx-receipt"></i>
            <h4>Visi</h4>
            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
          </div>
          <div class="icon-box mt-5">
            <i class="bx bx-cube-alt"></i>
            <h4>Misi</h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
          </div>
          <div class="icon-box mt-5">
            <i class="bx bx-images"></i>
            <h4>Motto</h4>
            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
          </div>
        </div>
        <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/kepalamotto.png");' data-aos="zoom-in"></div>
      </div>

    </div>
  </section><!-- End Features Section -->

  <!-- ======= Perangkat Section ======= -->
  <section id="doctors" class="doctors section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Perangkat Desa Wargaluyu</h2>
      </div>

      <div class="row">
        @foreach ($perangkat as $perangkat)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="/image/{{$perangkat->image}}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>{{$perangkat->title}}</h4>
              <span>{{$perangkat->description}}</span>
            </div>
          </div>
        </div>
        @endforeach


      </div>

    </div>
  </section><!-- End Perangkat Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Informasi Layanan Desa Wargaluyu</h2>
      </div>

      <div class="row">
        @foreach ($service as $service)
        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
          <img src="/image/{{$service->image}}" alt="" class="img-fluid" width="100">
          <h4>{{$service->title}}</h4>
          <p>{{$service->description}}</p>
          <a class="cta-btn scrollto" href="/informasi">Lihat detail</a>
        </div>
        @endforeach



      </div>

    </div>
  </section><!-- End Featured Services Section -->


  <!-- ======= Featured Services Section ======= -->
  <section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Berita Desa Wargaluyu</h2>
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

  <!-- ======= Services Section ======= -->
  <!-- <section id="services" class="services services">
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
  </section> -->
  <!-- End Services Section -->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Galeri Desa Wargaluyu</h2>
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


</main><!-- End #main -->
@endsection


@push('scripts')
<script>
  function increaseClick(id) {
    fetch(`/product/${id}/click`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    });
  }
</script>
@endpush