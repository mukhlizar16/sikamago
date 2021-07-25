<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('kkn/dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="<?= site_url('kkn/profil') ?>">Profil</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>
	<div class="section-body">
		<h2 class="section-title">Hi, <?= $_SESSION['nama'] ?></h2>
		<p class="section-lead">
			Change information about yourself on this page.
		</p>

		<div class="row mt-sm-4">
			<div class="col-12 col-md-12 col-lg-5">
				<div class="card">
					<div class="card-header">
						<h4>Foto</h4>
					</div>
					<div class="card-body">
						<div class="text-center">
							<?php if ($profil['foto'] == '') { ?>
								<img alt="foto profil"
									 src="<?= config_item('kkn_image') ?><?= $_SESSION['gender'] == 1 ? 'man.png' : 'woman.png' ?>"
									 class="rounded-circle"
									 width="250px" height="250px">
							<?php } else { ?>
								<img alt="foto profil"
									 src="<?= config_item('kkn_foto') ?><?= $profil['foto'] ?>"
									 class="rounded-circle"
									 width="250px" height="250px">
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card" id="data-pribadi">
					<div class="card-header">
						<h4>Data Pribadi</h4>
					</div>
					<?= form_open('kkn/profil/update_dosen', 'class="needs-validation" id="form-pribadi" novalidate') ?>
					<div class="card-body">
						<div class="mb-3" id="status-pribadi">
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Nama</label>
							<div class="col-md-9">
								<input name="nama" type="text" class="form-control" value="<?= $profil['nama'] ?>"
									   required autofocus>
								<div class="invalid-feedback">
									Nama tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Email</label>
							<div class="col-md-9">
								<input name="email" type="email" class="form-control" value="<?= $profil['email'] ?>"
									   required>
								<div class="invalid-feedback">
									Email tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">NIDN</label>
							<div class="col-md-9">
								<input name="nidn" type="text" class="form-control" value="<?= $profil['nidn'] ?>"
									   required>
								<div class="invalid-feedback">
									NIDN tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">No HP</label>
							<div class="col-md-9">
								<input name="no_hp" type="text" class="form-control" value="<?= $profil['no_hp'] ?>"
									   required>
								<div class="invalid-feedback">
									Nomor HP tidak boleh kosong
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<button type="button" class="btn btn-warning" onclick="history.back()">Kembali</button>
						<button type="submit" class="btn btn-primary"><i class="fas fa-user-edit fa-fw"></i> Ubah
						</button>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</section>

