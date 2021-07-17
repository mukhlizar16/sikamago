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
						<div class="card-header-action">
							<button class="btn btn-primary" onclick="history.back()">Kembali</button>
						</div>
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
				<div class="card" id="data-pribadi">
					<div class="card-header">
						<h4>Data Pribadi</h4>
					</div>
					<?= form_open('kkn/profil/update', 'class="needs-validation" id="form-pribadi" novalidate') ?>
					<div class="card-body">
						<div class="mb-3" id="status-pribadi">
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Nama</label>
							<div class="col-md-9">
								<input name="nama" type="text" class="form-control" value="<?= $profil['nama'] ?>"
									   required autofocus>
								<div class="invalid-feedback">
									Tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Email</label>
							<div class="col-md-9">
								<input name="email" type="email" class="form-control" value="<?= $profil['email'] ?>"
									   required>
								<div class="invalid-feedback">
									Tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">NIM</label>
							<div class="col-md-9">
								<input name="nim" type="text" class="form-control" value="<?= $profil['nim'] ?>"
									   required>
								<div class="invalid-feedback">
									Tidak boleh kosong
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">No HP</label>
							<div class="col-md-9">
								<input name="no_hp" type="text" class="form-control" value="<?= $profil['no_hp'] ?>"
									   required>
								<div class="invalid-feedback">
									Tidak boleh kosong
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-right">
						<button type="submit" class="btn btn-primary"><i class="fas fa-user-edit fa-fw"></i> Ubah
						</button>
					</div>
					<?= form_close() ?>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card" id="data-alamat">
					<div class="card-header">
						<h4>Alamat</h4>
					</div>
					<form action="<?= site_url('kkn/profil/update_alamat') ?>" id="form-alamat">
						<div class="card-body">
							<div class="mb-3" id="status-alamat">
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>Provinsi</label>
									<select name="provinsi" class="custom-select select2" id="prov"
											onclick="list_provinsi()"></select>
								</div>
								<div class="form-group col-md-6 col-12">
									<label>Kabupaten</label>
									<select name="kabupaten" id="kabupaten" class="custom-select select2"></select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>Kecamatan</label>
									<select name="kecamatan" class="custom-select select2" id="kecamatan"></select>
								</div>
								<div class="form-group col-md-6 col-12">
									<label>Desa</label>
									<select name="desa" class="custom-select select2" id="desa"></select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12 col-12">
									<label>Jalan</label>
									<input name="jalan" id="jalan" class="form-control">
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" type="submit"><i class="fas fa-edit fa-fw"></i> Ubah
							</button>
						</div>
					</form>
				</div>
				<div class="card" id="alamat-ortu">
					<div class="card-header">
						<h4>Alamat Orang Tua</h4>
					</div>

					<form action="<?= site_url('kkn/profil/update_ortu') ?>" method="post" id="form-ortu">
						<div class="card-body">
								<div class="mb-3" id="status-ortu"></div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>Nama Ayah</label>
									<input type="text" class="form-control" name="nama_ayah" id="nama-ayah">
								</div>
								<div class="form-group col-md-6 col-12">
									<label>Nama Ibu</label>
									<input type="text" class="form-control" name="nama_ibu" id="nama-ibu">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>No HP Ayah</label>
									<input type="text" class="form-control" name="hp_ayah" id="hp-ayah">
								</div>
								<div class="form-group col-md-6 col-12">
									<label>No HP Ibu</label>
									<input type="text" class="form-control" name="hp_ibu" id="hp-ibu">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>Provinsi</label>
									<select name="prov_ortu" class="custom-select select2" id="prov-ortu"
											onclick="list_provinsi()"></select>
								</div>
								<div class="form-group col-md-6 col-12">
									<label>Kabupaten</label>
									<select name="kab_ortu" id="kab-ortu" class="custom-select select2"></select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6 col-12">
									<label>Kecamatan</label>
									<select name="kec_ortu" id="kec-ortu" class="custom-select select2"></select>
								</div>
								<div class="form-group col-md-6 col-12">
									<label>Desa</label>
									<select name="desa_ortu" id="desa-ortu" class="custom-select select2"></select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12 col-12">
									<label>Jalan</label>
									<input type="text" name="jln_ortu" class="form-control" id="jln-ortu">
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary">
								<i class="fas fa-edit fa-fw"></i> Ubah
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

