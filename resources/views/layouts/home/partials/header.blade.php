<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <a href="/" class="logo me-auto"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="/">HOME</a></li>
        <li class="dropdown"><a href="{{ url('/profil') }}"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a class="nav-link" href="{{ url('/profil/sejarah') }}">Sejarah Desa</a></li>
            <li><a class="nav-link" href="{{ url('/profil/visimisi') }}">Visi dan Misi</a></li>
            <li><a class="nav-link" href="{{ url('/sotk') }}">Struktur Organisasi dan Tata Kerja</a></li>
            <li><a class="nav-link" href="{{ url('/profil/kelembagaan') }}">Kelembagaan</a></li>
            <li><a class="nav-link" href="{{ url('/profil/potensi') }}">Potensi Desa</a></li>
            <li><a class="nav-link" href="{{ url('/profil/asetdesa') }}">Aset Desa</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="{{ url('/datadesa') }}">Data Desa</a></li>
        <li class="dropdown"><a href="{{ url('/informasi') }}"><span>INFORMASI LAYANAN</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="{{ url('/informasi/ktp') }}">Pembuatan KTP</a></li>
            <li><a href="{{ url('/informasi/kk') }}">Pembuatan KK</a></li>
            <li><a href="{{ url('/informasi/aktekelahiran') }}">Pembuatan Akte Kelahiran</a></li>
            <li><a href="{{ url('/informasi/aktekematian') }}">Pembuatan Akte Kematian</a></li>
            <li><a href="{{ url('/informasi/pindahdomisili') }}">Prosedur Pindah Domisili</a></li>
            <li><a href="{{ url('/informasi/izinkeramaian') }}">Pembuatan Surat Izin Keramaian</a></li>
            <li><a href="http://bphtb.probolinggokab.go.id/" target="_blank">Cek PBB</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="{{ url('/event') }}">EVENT</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/berita') }}">BERITA</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/galeri') }}">GALERI</a></li>
        <li><a class="nav-link scrollto" href="{{ url('/umkm') }}">POJOK UMKM</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>
