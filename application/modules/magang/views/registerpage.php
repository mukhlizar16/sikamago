<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head -->
<head>
	<meta charset="utf-8">
	<link href="<?= config_item('image') ?>logo.svg" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		  content="sikamago">
	<meta name="keywords"
		  content="sikamago">
	<meta name="author" content="sikamago">
	<title><?= $title; ?></title>
	<!-- BEGIN: CSS Assets-->
	<link href="<?= base_url() ?>assets/magang/auth/images/favicon.ico" rel="shortcut icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/plugin/toastr.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/css/app.css"/>
	<link rel="stylesheet" href="<?= base_url() ?>assets/magang/auth/css/main.css"/>
	<!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="login">
<div class="container sm:px-10">
	<div class="block xl:grid grid-cols-2 gap-4">
		<!-- BEGIN: Login Info -->
		<div class="hidden xl:flex flex-col min-h-screen">
			<a style="outline: none" tabindex="-1" href="" class="-intro-x flex items-center pt-5">
				<img alt="KKN Apps" class="w-12" src="<?= base_url() ?>assets/magang/auth/images/utu.png">
				<span class="text-white text-lg ml-3"> Universitas Teuku Umar
							<br>
							<span class="font-medium">SiKaMaGo</span>
						</span>
			</a>
			<div class="my-auto">
				<img alt="KKN Apps Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
					 src="<?= base_url() ?>assets/magang/auth/images/illustration.svg">
				<div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
					Selamat datang di Sistem <br> Informasi <span
							style="color: yellow; font-weight: bold">KKN & Magang Online</span>
					<br>
					<small style="color: black; font-weight: bold">Universitas Teuku Umar</small>
				</div>
				<div class="-intro-x mt-5 text-lg text-white">Silahkan mendaftar terlebih dahulu sebelum login</div>
			</div>
		</div>
		<!-- END: Login Info -->
		<!-- BEGIN: Login Form -->
		<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
			<div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
				<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
					Registrasi
				</h2>
				<div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Silahkan mendaftar terlebih dahulu sebelum
					login
				</div>
				<form action="<?= site_url('magang/register/simpan') ?>" method="post" id="form-register-submit">
					<div class="intro-x mt-8">
						<input type="text" class="intro-x login__input input input--lg border border-gray-300 block"
							   placeholder="First Name" name="napan" id="firts-name">
						<input type="text"
							   class="intro-x login__input input input--lg border border-gray-300 block mt-4"
							   placeholder="Last Name" name="nabel">
						<input type="text"
							   class="intro-x login__input input input--lg border border-gray-300 block mt-4"
							   placeholder="Email" name="email">
						<input type="password"
							   class="intro-x login__input input input--lg border border-gray-300 block mt-4"
							   placeholder="Password" name="password">
						<input type="password"
							   class="intro-x login__input input input--lg border border-gray-300 block mt-4"
							   placeholder="Password Confirmation" name="pass_confirm">
						<select name="level" data-hide-search="true" class="intro-x login__input input input--lg border border-gray-300 block mt-4" required>
							<option value="">Status Registrasi</option>
							<option value="2">Dosen Pembimbing Lapangan</option>
							<option value="3">Dosen Pembimbing Artikel Ilmiah</option>
							<option value="4">Supervisor Magang Mitra</option>
							<option value="5">Mahasiswa</option>
							<option value="6">Stakeholder</option>
						</select>
					</div>
					<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
						<button id="btn-submit" type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">
							Daftar
						</button>
						<a id="btn-login" class="btn-custom text-gray-700 border border-gray-300 mt-3 xl:mr-3" href="<?= site_url('magang/login') ?>">
							Login
						</a>
						<button id="btn-loading"
								class="button button--lg w-full xl:w-32 inline-block mr-1 mb-2 bg-theme-1 text-white inline-flex items-center" disabled>
							Menyimpan
							<i data-loading-icon="three-dots"
							   data-color="white"
							   class="w-4 h-4 ml-auto">
							</i>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- END: Login Form -->
	</div>
</div>
<!-- BEGIN: JS Assets-->
<script src="<?= base_url() ?>assets/magang/auth/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/magang/auth/plugin/toastr.min.js"></script>
<script src="<?= base_url() ?>assets/magang/auth/js/app.js"></script>
<!-- END: JS Assets-->
<script>
	$(document).ready(function () {
		$('#firts-name').focus();
		$('#btn-loading').hide();
		$('#form-register-submit').submit(function (e) {
			e.preventDefault();
			$('#btn-submit').hide();
			$('#btn-login').hide();
			$('#btn-loading').show();
			$.ajax({
				type: 'post',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (data) {
					if (data.status == 'error') {
						$('#btn-submit').show();
						$('#btn-login').show();
						$('#btn-loading').hide();
						toastr["error"](data.pesan)
					} else if (data.status == 'gagal-simpan') {
						$('#btn-submit').show();
						$('#btn-login').show();
						$('#btn-loading').hide();
						toastr["error"](data.pesan)
					}else if(data.status == 'sukses-kirim') {
						toastr["success"](data.pesan);
						$('#btn-submit').show();
						$('#btn-login').show();
						$('#btn-loading').hide();
						setTimeout(function (){
							window.location.assign(data.alamat);
						}, 2500)
					}else{
						$('#btn-submit').show();
						$('#btn-login').show();
						$('#btn-loading').hide();
						toastr["error"](data.pesan)
					}
				}
			});
			return false;
		});

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": true,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
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
</body>
</html>
