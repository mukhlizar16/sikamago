<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="<?= base_url() ?>assets/landing/image/favicon.ico">

	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/kkn/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>assets/kkn/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
	<div class="container-fluid my-padding">
		<a class="navbar-brand" href="<?= site_url() ?>">
			<img src="<?= base_url() ?>assets/landing/image/log.png" width="100px" alt="Logo Sikamago">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
				aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-login" href="<?= site_url('kkn/auth/login') ?>">Login</a>
				</li>
			</ul>
			<!--<span class="navbar-text">
				Navbar text with an inline element
			</span>-->
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="section">
		<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
						aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
						aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
						aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url() ?>assets/kkn/images/image-1.jpg" class="d-block w-100" alt="img">
					<div class="carousel-caption d-none d-md-block">
						<h5>First slide label</h5>
						<p>Some representative placeholder content for the first slide.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url() ?>assets/kkn/images/image-2.jpg" class="d-block w-100" alt="img">
					<div class="carousel-caption d-none d-md-block">
						<h5>Second slide label</h5>
						<p>Some representative placeholder content for the second slide.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url() ?>assets/kkn/images/image-3.jpg" class="d-block w-100" alt="img">
					<div class="carousel-caption d-none d-md-block">
						<h5>Third slide label</h5>
						<p>Some representative placeholder content for the third slide.</p>
					</div>
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
					data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
					data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3">
			<div class="card shadow">
				<div class="card-body">
					<h5 class="card-title">Dokumen Persyaratan</h5>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<a href="https://drive.google.com/file/d/153H43YGjtSIIi_vqa9ZDZEXxtfPpSLyX/view?usp=sharing"
							   target="_blank" class="nav-link">
								<i class="far fa-file-alt"></i> Surat Pernyataan Persetujuan Prodi
							</a>
						</li>
						<li class="list-group-item">
							<a href="https://drive.google.com/file/d/1-m-rk9v7b0KzXF76rU7IqAiSjNmjiFvp/view?usp=sharing"
							   target="_blank" class="nav-link">
								<i class="far fa-file-alt"></i> Surat Keterangan Izin Orang Tua
							</a>
						</li>
						<li class="list-group-item">
							<a href="https://drive.google.com/file/d/1se96zaMVfbfhMbjQ_D28rMQeHaNiSSwM/view?usp=sharing"
							   target="_blank" class="nav-link">
								<i class="far fa-file-alt"></i> Surat Pernyataan Diri
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-9">
			<div class="card shadow">
				<div class="card-body">
					<h5>Pengumuman</h5>

					<table class="table-borderless" style="border-collapse: collapse" width="100%">
						<tbody>
						<tr>
							<td>
								<div>
									<strong style="color: #ee6920">
										Nomor pengumuman
									</strong>
									<ul>
										<div>
											<table class="table-borderless" style="border-collapse: collapse"
												   width="100%">
												<tbody>
												<tr>
													<td>
														<li>
															<a href="" class="item-pengumuman">Isi dari pengumuman</a>
															<span><i class="far fa-file-pdf"></i></span>
														</li>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</ul>
									<hr>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<strong style="color: #ee6920">
										Nomor pengumuman
									</strong>
									<ul>
										<div>
											<table class="table-borderless" style="border-collapse: collapse"
												   width="100%">
												<tbody>
												<tr>
													<td>
														<li>
															<a href="" class="item-pengumuman">Isi dari pengumuman</a>
															<span><i class="far fa-file-pdf"></i></span>
														</li>
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</ul>
									<hr>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>KKN ©<?= date('Y') ?> Sikamago | UTU</p>
</footer>


<script src="<?= base_url() ?>assets/kkn/js/bootstrap.min.js"></script>
</body>
</html>
