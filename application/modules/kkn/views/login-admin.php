<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Sistem informasi KKN dan Magang Online UTU"
		  name="description">
	<meta content="SiKaMaGo" name="author">
	<meta content="sikamago, sikamago utu, utu" name="keyword">

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
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
					<div class="login-brand">
						<a href="<?= site_url() ?>">
							<img src="<?= base_url() ?>assets/landing/image/log.png" alt="logo" width="100" class="shadow-light">
						</a>
					</div>

					<div class="card card-primary">
						<div class="card-header">
							<h4>Login</h4>
						</div>

						<div class="card-body">
							<form method="POST" class="needs-validation" novalidate="" id="form-admin">
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
									<div class="invalid-feedback" id="femail">
									</div>
								</div>

								<div class="form-group">
									<div class="d-block">
										<label for="password" class="control-label">Password</label>
										<div class="float-right">
											<a href="javascript:void(0)" class="text-small">
												Forgot Password?
											</a>
										</div>
									</div>
									<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
									<div class="invalid-feedback" id="fpass">
									</div>
								</div>

								<div class="form-group">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
										<label class="custom-control-label" for="remember-me">Remember Me</label>
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="btn-submit">
										Login
									</button>
								</div>
							</form>
							<!--<div class="mt-2 text-muted text-center">
								Don't have an account? <a href="<?/*= site_url('register') */?>">Create One</a>
							</div>-->
						</div>
					</div>
					<div class="simple-footer">
						Copyright &copy; SiKaMaGo - KKN Apps | <?= date('Y') ?> | UTU
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- General JS Scripts -->
<!--<script src="<?/*= base_url() */?>assets/js/jquery/dist/jquery.min.js"></script>-->
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
		$('#form-admin').submit(function (event) {
			event.preventDefault();
			$('#btn-submit').hide();
			$.ajax({
				url: 'admin/login',
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
							$('#btn-submit').show()
						}
						else if (response.status == 'sukses') {
							Swal.fire({
								icon: 'success',
								title: 'Sukses',
								text: 'Anda berhasil login',
							}).then(function (){
								window.location.assign(response.link)
							})
						}
						else if (response.status == 'pass-salah') {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: response.pesan,
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
