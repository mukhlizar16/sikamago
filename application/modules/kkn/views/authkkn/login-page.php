
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Sistem informasi manajemen kinerja berbasis akuntabel, integratif dan komunikatif"
		  name="description">
	<meta content="SmakinBaik" name="author">
	<meta content="sakip, manajemen kinerja" name="keyword">

	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/landing/image/favicon.ico">

	<title><?= $title ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>style.css">
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>components.css">
</head>

<body>
<div id="app">
	<section class="section">
		<div class="d-flex flex-wrap align-items-stretch">
			<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
				<div class="p-4 m-3">
					<img src="<?= base_url() ?>assets/landing/image/log.png" alt="logo" width="80" class="shadow-light mb-3 mt-2">
					<h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">KKN Apps</span></h4>
					<p class="text-muted">Sebelum memulai, silahkan login terlebih dahulu atau mendaftar jika Anda belum memiliki akun.</p>
					<form method="POST" action="#" id="form" class="needs-validation" novalidate="">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
							<div class="invalid-feedback" id="femail">
								Please fill in your email
							</div>
						</div>

						<div class="form-group">
							<div class="d-block">
								<label for="password" class="control-label">Password</label>
							</div>
							<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
							<div class="invalid-feedback" id="fpass">
							</div>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
								<label class="custom-control-label" for="remember-me">Remember Me</label>
							</div>
						</div>

						<div class="form-group text-right">
							<a href="#" class="float-left mt-3">
								Forgot Password?
							</a>
							<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
								Login
							</button>
							<!--<button class="btn btn-warning" disabled>
								<i class="fas fa-exclamation-circle"></i> Dalam Perbaikan</button>-->
						</div>

						<div class="mt-5 text-center">
							Belum memiliki akun? <a href="<?= site_url('kkn/auth/register') ?>">DAFTAR</a>
						</div>
					</form>

					<div class="text-center mt-5 text-small">
						Copyright &copy; <?= date('Y') ?> SiKaMaGo - KKN Apps | UTU
						<div class="mt-2">
							<a href="#">Privacy Policy</a>
							<div class="bullet"></div>
							<a href="#">Terms of Service</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../../../assets/kkn/theme/images/background.jpeg">
				<div class="absolute-bottom-left index-2">
					<div class="text-light p-5 pb-2">
						<div class="mb-5 pb-3">
							<h1 class="mb-2 display-4 font-weight-bold">Welcome</h1>
							<h5 class="font-weight-normal text-muted-transparent">Universitas Teuku Umar, Aceh - Indonesia</h5>
						</div>
						Photo in <a class="text-light bb" href="javascript:void">Prof. Dr. Jasman J. Ma'ruf, S.E., MBA</a> on <a class="text-light bb" href="https://mcoding.com">Universitas Teuku Umar</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= config_item('kkn_js') ?>stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= config_item('kkn_js') ?>scripts.js"></script>
<script src="<?= config_item('kkn_js') ?>custom.js"></script>

<!-- Page Specific JS File -->
<script>
	$(document).ready(function () {
		$('#form').submit(function (event) {
			event.preventDefault();
			$('#btn-submit').hide();
			$('#info').html('Mencari data...').show();
			$.ajax({
				url: 'login/process',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (response) {
					Swal.fire({
						title: 'Mencari data...',
						allowEscapeKey: false,
						allowOutsideClick: false,
						timer: 2000,
						didOpen: () => {
							Swal.showLoading()
						}
					}).then(function () {
						$('btn-submit').show();
						$('#femail').html(response.email);
						$('#fpass').html(response.password);
						if (response.status == 'error') {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: 'Periksa kembali data anda',
							})
							$('#btn-submit').show();
						}
						else if (response.status == 'sukses') {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								text: 'Anda berhasil login',
							}).then(function (){
								window.location.assign(response.alamat)
							})
						}
						else if (response.status == 'error-pass') {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: response.pesan,
							})
							$('#btn-submit').show();
						}
						else if(response.status == 'no-email'){
							Swal.fire({
								icon: 'error',
								title: 'Maaf !',
								text: 'Email tidak terdaftar, silahkan mendaftar terlebih dahulu',
							})
							$('#btn-submit').show();
						}
						else {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: response.pesan,
							})
							$('#btn-submit').show();
						}
					})
				}
			})
		})
	})
</script>
</body>
</html>
