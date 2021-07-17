<!DOCTYPE html>
<html lang="en">
<head>
	<title>Error 404</title>
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
	<meta name="description" content=""/>
	<meta name="keywords" content="">
	<meta name="author" content="sikamago"/>
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url() ?>assets/magang/theme/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= config_item('magang_css') ?>style.css">


</head>
<!-- [ offline-ui ] start -->
<body>
<div class="auth-wrapper maintance">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="text-center">
					<img src="<?= base_url() ?>assets/magang/theme/images/maintance/404.png" alt="" class="img-fluid">
					<h5 class="text-muted my-4">Oops! Halaman atau data tidak ada!</h5>
						<button onclick="history.back()" class="btn waves-effect waves-light btn-primary mb-4"><i
								class="feather icon-refresh-ccw mr-2"></i>Kembali
						</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ offline-ui ] end -->
<!-- Required Js -->
<script src="<?= config_item('magang_js') ?>vendor-all.min.js"></script>
<script src="<?= config_item('magang_js') ?>plugins/bootstrap.min.js"></script>

</body>
</html>
