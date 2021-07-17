<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="admin-sikamago">
	<meta name="title" content="sikamago">
	<meta name="keywords" content="sikamago, sikamago apps, web app, login">
	<meta name="description" content="Aplikasi magang dan kkn online.">
	<meta content="Aplikasi Sikamago" property="og:title">
	<meta content="http://sikamago.lppm-utu-ac.id/" property="og:url">

	<link rel="icon" href="<?= base_url() ?>assets/landing/image/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/animate.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/landing/css/style.css">

	<title><?= $title ?></title>
</head>
<body>
<div class="container">
	<header>
		<nav>
			<a href="" class="logo">
				<img src="<?= base_url() ?>assets/landing/image/log.png" alt="logo sikamago">
			</a>
		</nav>
	</header>
</div>

<section class="hero">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-md-5 wow slideInLeft" data-wow-delay="200" data-wow-duration="1s">
				<h1 class="title">Mari Bergabung Bersama Kami</h1>
				<p>
					Menjadi sumber inspirasi dan referensi dalam pengembangan ilmu pengetahuan,
					teknologi dan bisnis disektor industri berbasis agro and marine industry di tingkat
					regional (2025), nasional (2040), dan internasional (2060) melalui riset yang inovatif,
					kreatif dan berdaya saing tinggi
				</p>
				<div class="mt-5">
					<a class="btn btn-warning" href="<?= site_url('kkn/auth/login') ?>">KKN</a>
					<a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Aplikasi Magang"
					   href="<?= site_url('magang/login') ?>">Magang</a>
				</div>
				<small class="text-muted">Klik salah satu tombol aplikasi.</small>
			</div>
			<div class="figure col-md-7 wow slideInRight" data-wow-delay="500" data-wow-duration="2s">
				<img src="<?= base_url() ?>assets/landing/image/bg.png" height="450px" alt="gambar sikamago mahasiswa">
			</div>
		</div>
</section>


<script src="<?= base_url() ?>assets/landing/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/landing/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/landing/js/wow.min.js"></script>

<script>
	wow = new WOW(
		{
			boxClass: 'wow',      // default
			animateClass: 'animated', // default
			offset: 0,          // default
			mobile: true,       // default
			live: true        // default
		}
	)
	wow.init();
</script>

</body>
</html>
