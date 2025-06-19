@extends('layouts.home.layouts.app')

@section('title', 'Informasi Layanan')

@section('content')
<section id="services" class="services services">
  <div class="container" data-aos="fade-up">
    <div class="section-title" mt-4>
      <h2>INFORMASI LAYANAN ADMINISTRATIF</h2>
    </div>
    <div class="container" mt-4>
      <div class="list-group">
        <a href="{{ url('/informasi/ktp') }}" class="list-group-item list-group-item-action">Pembuatan KTP</a>
        <a href="{{ url('/informasi/kk') }}" class="list-group-item list-group-item-action">Pembuatan Kartu Keluarga</a>
        <a href="{{ url('/informasi/aktekelahiran') }}" class="list-group-item list-group-item-action">Pembuatan Akte Kelahiran</a>
        <a href="{{ url('/informasi/aktekematian') }}" class="list-group-item list-group-item-action">Pembuatan Akte Kematian</a>
        <a href="{{ url('/informasi/pindahdomisili') }}" class="list-group-item list-group-item-action">Prosedur Pindah Domisili</a>
        <a href="{{ url('/informasi/izinkeramaian') }}" class="list-group-item list-group-item-action">Pembuatan Surat Izin Keramaian</a>
        <!-- <a href="http://bphtb.probolinggokab.go.id/" class="list-group-item list-group-item-action" target="_blank">CEK PBB</a> -->
      </div>
    </div>
  </div>
</section><!-- End Services Section -->

@endsection