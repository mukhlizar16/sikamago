
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Sistem informasi KKN dan Magang Online UTU"
		  name="description">
	<meta content="SiKaMaGo" name="author">
	<meta content="sikamago, utu, simakago utu" name="keyword">

	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/kkn/image/favicon.ico">

	<title>Error &mdash; SiKaMaGo - KKN Apps</title>

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
			<div class="page-error">
				<div class="page-inner">
					<h1>Under Construction</h1>
					<div class="page-description">
						We are preparing the page you are looking for...
					</div>
					<div class="page-search">
						<div class="mt-3">
							<button onclick="history.back()" class="btn btn-primary btn-lg">Kembali</button>
						</div>
					</div>
				</div>
			</div>
			<div class="simple-footer mt-5">
				Copyright &copy; <?= date('Y') ?> - SiKaMaGo - KKN Apps | UTU
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

</body>
</html>
