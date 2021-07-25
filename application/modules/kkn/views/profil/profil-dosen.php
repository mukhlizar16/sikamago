<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
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
							<?php if ($profil['foto'] == ''){ ?>
							<img alt="foto profil"
								 src="<?= config_item('kkn_image') ?><?= $_SESSION['gender'] == 1 ? 'man.png' : 'woman.png' ?>"
								 class="rounded-circle"
								 width="250px" height="250px">
							<?php }else{ ?>
								<img alt="foto profil"
									 src="<?= config_item('kkn_foto') ?><?= $profil['foto'] ?>"
									 class="rounded-circle"
									 width="250px" height="250px">
							<?php } ?>
						</div>
					</div>
					<div class="card-footer text-center">
						<button class="btn btn-primary" data-toggle="modal" data-target="#fotoModal">Ganti Foto</button>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card">
					<div class="card-header">
						<h4>Data Pribadi</h4>
					</div>
					<div class="card-body">
						<div class="form-group row">
							<label class="col-form-label col-md-3">Nama</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $profil['nama'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Email</label>
							<div class="col-md-9">
								<input type="email" class="form-control" value="<?= $profil['email'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">NIDN</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $profil['nidn'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">No HP</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $profil['no_hp'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<a href="<?= site_url('kkn/profil/edit') ?>" class="btn btn-primary"><i class="fas fa-user-edit fa-fw"></i> Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- foto modal -->
<div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel" aria-hidden="true"
	 data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="fotoModalLabel">Form Ganti Foto</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/profil/foto', 'id="form-foto"') ?>
			<div class="modal-body">
				<input type="file" name="foto" id="foto" class="form-control">
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" type="submit" id="btn-submit-foto">Ganti</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

