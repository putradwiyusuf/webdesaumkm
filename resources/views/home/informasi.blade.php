@extends('layouts.home.layouts.app')

@section('title', 'Informasi Layanan')

@section('content')
  <br>
  <div class="section-title" mt-4>
    <h2>INFORMASI LAYANAN ADMINISTRATIF</h2>
  </div>
  <div class="container" mt-4>
    <ul>
      <li><a href="/ktp">Pembuatan atau Pembaruan KTP</li>
      <li><a href="/kk">Pembuatan atau Pembaruan KK</li>
      <li><a href="/aktekelahiran">Pembuatan Akta Kelahiran</li>
      <li><a href="/aktekematian">Pembuatan Akta Kematian</li>
      <li><a href="/pindahdomisili">Prosedur Pindah Domisili</li>
      <li><a href="/izinkeramaian">Pembuatan Surat Izin Keramaian</li>
      <li><a href="http://bphtb.probolinggokab.go.id/" target="_blank">CEK PBB</li>
    </ul>
  </div>
  
@endsection