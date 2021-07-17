<?php defined('BASEPATH') or exit('No direct script access allowed') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta content="Sistem informasi manajemen kinerja berbasis akuntabel, integratif dan komunikatif"
		  name="description">
	<meta content="SmakinBaik" name="author">
	<meta content="sakip, manajemen kinerja" name="keyword">

	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/favicon.ico">

	<title>Login &mdash; SmakinBaik</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
</head>

<body>
<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<div class="login-brand">
						<img src="<?= base_url() ?>assets/img/logo-kuning.png" alt="logo" width="100"
							 class="shadow-light">
					</div>

					<?php if ($user->num_rows > 0) : ?>
						<?php
						$data = $user->row_array();
						$email = $data['email'];
						$tokenbase = $data['token'];
						$urltoken = $this->uri->segment(4);
						?>
						<?php if ($tokenbase == $urltoken) { ?>
							<div class="card card-primary">
								<div class="card-header"><h4>Register</h4></div>
								<div class="card-body">
								<?= $this->session->flashdata('status') ?>
									<p class="text-dark">
										<strong><?= $email ?></strong> telah diaktifkan. Silahkan klik tombol login
										untuk
										masuk ke dalam sistem.
									</p>
									<a href="<?= site_url('login') ?>" class="btn btn-primary shadow-dark">
										Back to Login
									</a>
								</div>
							</div>
							<div class="simple-footer">
								Copyright © <?= date('Y') ?> - SmakinBaik | UTU
							</div>
						<?php } else { ?>
							<div class="card card-danger">
								<div class="card-header"><h4>Register</h4></div>
								<div class="card-body">
								<?= $this->session->flashdata('status') ?>
									<p class="text-dark">
										<strong>Maaf !</strong> Token tidak valid, mohon cek kembali email Anda. Jika belum mendaftar, silahkan klik tombol di bawah untuk proses registrasi.
									</p>
									<a href="<?= site_url('register') ?>" class="btn btn-warning shadow-light">
										Back to Register
									</a>
									</a>
								</div>
							</div>
							<div class="simple-footer">
								Copyright © <?= date('Y') ?> - SmakinBaik | UTU
							</div>
						<?php } ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>
</html>
