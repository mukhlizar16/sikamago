<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description"
		  content="Login aplikasi pelaporan kegiatan magang online.">
	<meta name="keywords"
		  content="sikamago, sikamago apps, web app, login">
	<meta name="author" content="sikamago">
	<meta content="Aplikasi Sikamago" property="og:title">
	<meta content="http://sikamago.lppm-utu-ac.id/" property="og:url">
	<title><?= $title; ?></title>

	<!-- BEGIN: CSS Assets-->
	<link href="<?= base_url() ?>assets/magang/auth/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/plugin/toastr.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/css/app.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/css/main.css"/>
	<!-- END: CSS Assets-->
</head>

<body class="login">
<div class="container sm:px-10">
	<div class="block xl:grid grid-cols-2 gap-4">
		<!-- BEGIN: Login Info -->
		<div class="hidden xl:flex flex-col min-h-screen">
			<a style="outline: none" tabindex="-1" href="<?= site_url() ?>" class="-intro-x flex items-center pt-5">
				<img alt="KKN Apps" class="w-16" src="<?= base_url()?>assets/magang/auth/images/utu.png">
				<span class="text-white text-lg ml-3"> Universitas Teuku Umar
							<br>
							<span class="font-medium" style="color: yellow">SiKaMaGo</span>
						</span>
			</a>
			<div class="my-auto">
				<img alt="KKN Apps Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
					 src="<?= base_url() ?>assets/magang/auth/images/illustration.svg">
				<div class="-intro-x text-white font-normal text-4xl leading-tight mt-10">
					Selamat datang di Sistem <br> Informasi <span
							style="color: yellow; font-weight: bold">KKN & Magang Online</span>
					<br>
					<small style="text-shadow: 1px 1px rgba(255,255,255, 0.4); color: black; font-weight: bold">Universitas Teuku Umar</small>
				</div>
				<div class="-intro-x mt-5 text-sm text-white">Silahkan login terlebih dahulu</div>
			</div>
		</div>
		<!-- END: Login Info -->
		<!-- BEGIN: Login Form -->
		<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
			<div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
				<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
					Login
				</h2>
				<div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Silahkan login terlebih dahulu
				</div>
				<form action="<?= site_url('magang/login/masuk') ?>" method="post" id="login-form">
					<div class="intro-x mt-8">
						<input type="text" class="intro-x login__input input input--lg border border-gray-300 block"
							   placeholder="Email" name="email" id="email-login">
						<input type="password"
							   class="intro-x login__input input input--lg border border-gray-300 block mt-4"
							   placeholder="Password" name="password">
					</div>
					<div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
						<div class="flex items-center mr-auto">
							<input type="checkbox" class="input border mr-2" id="remember-me">
							<label class="cursor-pointer select-none" for="remember-me">Simpan sesi login</label>
						</div>
						<a href="<?= site_url('login/reset_password') ?>">Lupa Password?</a>
					</div>
					<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
						<button id="btn-login" type="submit"
								class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
							Login
						</button>
						<a id="btn-daftar" class="btn-custom text-gray-700 border border-gray-300 mt-3"
						   href="<?= site_url('magang/register') ?>">
							Daftar
						</a>

					</div>
				</form>
				<div class="text-center">
					<button style="display: none; background: lightblue; font-weight: 500" id="btn-loading"
							class="button button--lg w-full xl:w-32 xl:mr-3">
						Mencari ...
					</button>
				</div>
				<div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
					Dengan mendaftar, Anda menyetujui
					<br>
					<a class="text-theme-1" href="">Syarat & Ketentuan</a>
				</div>
			</div>
		</div>
		<!-- END: Login Form -->
	</div>
</div>
<!-- BEGIN: JS Assets-->
<script src="<?= base_url() ?>assets/magang/auth/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/magang/auth/plugin/toastr.min.js"></script>
<script src="<?= base_url() ?>assets/magang/auth/js/app.js"></script>
<script>
	$(document).ready(function () {
		$('#email-login').focus();

		$('#login-form').submit(function (e) {
			e.preventDefault();
			$('#btn-loading').show();
			$('#btn-login').hide();
			$('#btn-daftar').hide();
			$.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (response) {
					if (response.status == 'Error') {
						setTimeout(function () {
							$('#btn-loading').hide();
							$('#btn-login').show();
							$('#btn-daftar').show();
							toastr["error"](response.pesan)
						}, 1000);
					} else if (response.status == 'no-email') {
						setTimeout(function () {
							$('#btn-loading').hide();
							$('#btn-login').show();
							$('#btn-daftar').show();
							toastr["error"](response.pesan);
						}, 2000);
					} else if (response.status == 'sukses') {
						toastr["success"](response.pesan);
						setTimeout(function () {
							$('#btn-loading').hide();
							$('#btn-login').show();
							$('#btn-daftar').show();
							window.location.assign(response.alamat)
						}, 2000);
					} else if (response.status == 'error_pass') {
						setTimeout(function () {
							$('#btn-loading').hide();
							$('#btn-login').show();
							$('#btn-daftar').show();
							toastr["error"](response.pesan)
						}, 1000);
					} else {
						setTimeout(function () {
							$('#btn-loading').hide();
							$('#btn-daftar').show();
						}, 1000);
						toastr["error"](response.pesan)
					}
				}
			});
		});

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": true,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	})
</script>
<!-- END: JS Assets-->
</body>
</html>
