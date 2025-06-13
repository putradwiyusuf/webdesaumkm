<!DOCTYPE html>
<html lang="en">
@include('layouts.home.partials.head')
<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
  </div>
  
@include('layouts.home.partials.header')

  <!-- ======= Hero Section ======= -->
  <section>
  </section><!-- End Hero -->
  
<main>
  @yield('content')
</main>

@include('layouts.home.partials.footer')

<!-- JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>