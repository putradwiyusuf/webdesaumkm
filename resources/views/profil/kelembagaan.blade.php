@extends('layouts.home.layouts.app')

@section('title', 'Kelembagaan Desa')

@section('content')
<main>
	<section id="doctors" calass="doctors section-bg">
		<div class="container" data-aos="fade-up">

			<div class="section-title">
				<h2>Kelembagaan Desa</h2>
				<br />
				<p>Lembaga Kemasyarakatan Desa (LKD) adalah wadah partisipasi masyarakat, sebagai mitra Pemerintah Desa, ikut serta dalam perencanaan, pelaksanaan dan pengawasan pembangunan, serta meningkatkan pelayanan masyarakat Desa.</p>
				<p><b>(Permendagri No. 18 tahun 2018, Pasal 3)</b></p>
			</div>

			<div class="row">

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="100">
						<div class="member-img">
							<img src="assets/img/kepalamotto.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<h4>Samsul Arifin</h4>
							<span>Kepala Desa</span>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member" data-aos="fade-up" data-aos-delay="100">
						<div class="member-img">
							<img src="assets/img/kepalamotto.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<h4>Samsul Arifin</h4>
							<span>Wakil Kepala Desa</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- End #main -->
@endsection