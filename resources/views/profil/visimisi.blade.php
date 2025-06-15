@extends('layouts.home.layouts.app')

@section('title', 'Visi, Misi dan Motto')

@section('content')
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
@endsection