<!DOCTYPE html>
<html lang="en">

<head>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="aplikasi kkn dan magang online"/>
	<meta name="keywords" content="sikamago, magang apps, kkn apps">
	<meta name="author" content="sikamago"/>
	<!-- Favicon icon -->
	<link rel="icon" href="<?= config_item('theme_image') ?>favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= config_item('theme_css') ?>style.css">

	<title><?= $title ?></title>


</head>

<body>

<div class="auth-wrapper">
	<!-- [ reset-password ] start -->
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-header bg-pattern">
						<img src="<?= config_item('theme_image') ?>log.png" width="50%" alt="logo sikamago"
							 class="img-fluid">
					</div>
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Reset Password</h4>
						<form id="form-reset-pass">
							<div class="form-group mb-4">
								<label class="floating-label" for="Username">Email</label>
								<input type="email" name="email" class="form-control" id="Username">
							</div>
							<button type="submit" class="btn btn-block btn-primary mb-4">Reset password</button>
						</form>
						<p class="mb-0 text-muted">Belum memiliki akun? <a href="<?= site_url('register') ?>"
																		   class="f-w-400">Daftar</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- [ reset-password ] end -->
</div>

<!-- Required Js -->
<script src="<?= config_item('theme_js') ?>vendor-all.min.js"></script>
<script src="<?= config_item('theme_js') ?>plugins/bootstrap.min.js"></script>
<script src="<?= config_item('theme_js') ?>ripple.js"></script>
<script src="<?= config_item('theme_js') ?>pcoded.min.js"></script>
<script src="<?= config_item('theme_js') ?>plugins/sweetalert.min.js"></script>

<script>
	$(document).ready(function () {
		$('#form-reset-pass').submit(function (e) {
			e.preventDefault();
			$.ajax({
				url: 'cek_email',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				cache: false,
				success: function (data) {
					if (data.status == 'sukses') {
						swal("Sukses", data.pesan, "success").then(function () {
							window.location.assign(data.url);
						})
					} else if (data.status == 'error') {
						swal("Error", data.pesan, "warning")
					} else {
						swal("Gagal", data.pesan, "error")
					}
				}
			})
			return false;
		})
	})
</script>

</body>

</html>
