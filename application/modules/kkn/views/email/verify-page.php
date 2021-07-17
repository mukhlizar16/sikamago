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

	<title>SiKaMaGo - KKN Apps</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>style.css">
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>components.css">
</head>

<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div
					class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<div class="login-brand">
						<img src="<?= base_url() ?>assets/landing/image/log.png" alt="logo" width="150"
							 class="shadow-light">
					</div>

					<div class="mt-2 mb-2">
						<?= $this->session->flashdata('status') ?>
					</div>

					<div class="card card-primary">
						<div class="card-header"><h4>Status Register</h4></div>
						<div class="card-body">
							<?= $message ?>
							<div class="mt-3">
								<?php if ($status == 'sukses') { ?>
								<a href="<?= site_url('kkn/auth/login') ?>" class="btn btn-primary">Login</a>
								<?php }else{ ?>
									<a href="<?= site_url('kkn/auth/register') ?>" class="btn btn-primary">Daftar</a>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="simple-footer">
						Copyright © <?= date('Y') ?> - SiKaMaGo - KKN Apps
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
</html>
