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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>bootstrap-social/bootstrap-social.css">
	<link rel="stylesheet" href="<?= config_item('kkn_modules') ?>jquery-selectric/selectric.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>style.css">
	<link rel="stylesheet" href="<?= config_item('kkn_css') ?>components.css">
</head>

<body>
<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<div class="login-brand">
						<img src="<?= base_url() ?>assets/landing/image/log.png" alt="logo" width="150"
							 class="shadow-light">
					</div>

					<div class="card card-primary">
						<div class="card-header"><h4>Register</h4></div>
						<div class="card-body">
							<div class="mt-2 mb-2">
								<div class="alert alert-light alert-has-icon">
									<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
									<div class="alert-body">
										<div class="alert-title">Informasi</div>
										<p>Silakan mendaftar sebagai mahasiswa atau dosen dengan memilih sesuai tab
											berikut :</p>

									</div>
								</div>
							</div>
							<div class="mt-2 mb-2">
								<?= $this->session->flashdata('status') ?>
							</div>
							<ul class="nav nav-tabs" id="registerTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" href="#mhs-Tab" id="mhsTab" data-toggle="tab" role="tab">Mahasiswa</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#dosen-Tab" id="dosenTab" data-toggle="tab" role="tab">Dosen</a>
								</li>
							</ul>
							<div class="tab-content" id="registerTabContent">
								<div class="tab-pane fade show active" id="mhs-Tab" role="tabpanel"
									 aria-labelledby="mhsTab">
									<?= form_open('kkn/auth/register/store') ?>
									<div class="form-group row">
										<label for="nama" class="col-md-3">Nama <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<input name="nama"
												   id="nama"
												   type="text"
												   class="form-control <?= form_error('nama') == '' ? '':'is-invalid' ?>"
												   value="<?= set_value('nama') ?>">
											<?= form_error('nama', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-md-3">NIM <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<input name="nim"
												   id="nim"
												   type="text"
												   class="form-control <?= form_error('nim') == '' ? '':'is-invalid' ?>"
												   value="<?= set_value('nim') ?>">
											<?= form_error('nim', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-md-3">Email <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<input name="email"
												   id="email"
												   type="text"
												   class="form-control <?= form_error('email') == '' ? '':'is-invalid' ?>"
												   value="<?= set_value('email') ?>">
											<?= form_error('email', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="password" class="d-block col-md-3">Password <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<input name="password" id="password" type="password"
												   class="form-control pwstrength <?= form_error('password') == '' ? '':'is-invalid' ?>" data-indicator="pwindicator">
											<div id="pwindicator" class="pwindicator">
												<div class="bar"></div>
												<div class="label"></div>
											</div>
											<?= form_error('password', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="confirm_password" class="col-md-3">Konfirmasi Password <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<input name="confirm_password" id="confirm_password" type="password"
												   class="form-control <?= form_error('confirm_password') == '' ? '':'is-invalid' ?>">
											<?= form_error('confirm_password', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="gender" class="col-md-3">Jenis Kelamin <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<div class="form-inline">
												<div class="custom-control custom-radio">
													<input class="custom-control-input <?= form_error('gender') == '' ? '':'is-invalid' ?>" name="gender" type="radio"
														   id="customRadio1" value="1" checked="checked">
													<label class="custom-control-label"
														   for="customRadio1">Laki-laki</label>
												</div>
												<div class="custom-control custom-radio ml-3">
													<input class="custom-control-input <?= form_error('gender') == '' ? '':'is-invalid' ?>" type="radio" name="gender"
														   id="customRadio2" value="2">
													<label class="custom-control-label"
														   for="customRadio2">Perempuan</label>
												</div>
											</div>
											<?= form_error('gender', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="prodi" class="col-md-3">Program Studi <span
													class="text-danger">*</span></label>
										<div class="col-md-9">
											<select name="prodi" class="custom-select <?= form_error('prodi') == '' ? '':'is-invalid' ?>" id="prodi">
												<option value="">--Pilih--</option>
												<?php foreach ($prodi->result_array() as $p) : ?>
													<option value="<?= $p['id'] ?>"><?= $p['nama_prodi'] ?></option>
												<?php endforeach; ?>
											</select>
											<?= form_error('prodi', '<div class="invalid-feedback">', '</div>') ?>
										</div>
									</div>
									<div class="mt-2 mb-2 text-center">
										<button class="btn btn-primary" id="btn-daftar">Daftar</button>
									</div>
									<?= form_close() ?>
								</div>
								<div class="tab-pane fade" id="dosen-Tab" role="tabpanel"
									 aria-labelledby="dosenTab">
									dosen
								</div>
							</div>

							<div class="mt-5 text-center">
								Sudah memiliki akun? <a href="<?= site_url('kkn/auth/login') ?>">LOGIN</a>
							</div>
						</div>
					</div>
					<div class="simple-footer">
						Copyright © <?= date('Y') ?> - SmakinBaik | UTU
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- General JS Scripts -->
<!--<script src="<? /*= base_url() */ ?>assets/js/jquery/dist/jquery.min.js"></script>-->
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
<script src="<?= base_url() ?>assets/kkn/theme/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= config_item('kkn_modules') ?>jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?= config_item('kkn_modules') ?>jquery-selectric/jquery.selectric.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/kkn/theme/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/kkn/theme/js/custom.js"></script>

<!-- Page Specific JS File -->
<script>
	$('.pwstrength').pwstrength();
</script>
</body>
</html>
