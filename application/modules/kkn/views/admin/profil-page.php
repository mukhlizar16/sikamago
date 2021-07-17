<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="<?= site_url('kkn/admin/mahasiswa') ?>">List Mahasiswa</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>
	<div class="section-body">
		<h2 class="section-title">Hi, <?= $_SESSION['nama'] ?></h2>
		<p class="section-lead">
			Data detil mahasiswa yang dipilih.
		</p>

		<div class="row mt-sm-4">
			<div class="col-12 col-md-12 col-lg-5">
				<div class="card">
					<div class="card-header">
						<h4>Foto</h4>
					</div>
					<div class="card-body">
						<div class="text-center">
							<?php if ($mhs['foto'] == '' || $mhs['foto'] == null || $mhs == null){ ?>
							<img alt="foto profil"
								 src="<?= config_item('kkn_image') ?><?= $mhs['gender_id'] == 1 ? 'man.png' : 'woman.png' ?>"
								 class="rounded-circle"
								 width="250px" height="250px">
							<?php }else{ ?>
								<img alt="foto profil"
									 src="<?= config_item('kkn_foto') ?><?= $mhs['foto'] ?>"
									 class="rounded-circle"
									 width="250px" height="250px">
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4>Data Pribadi</h4>
					</div>
					<div class="card-body">
						<div class="form-group row">
							<label class="col-form-label col-md-3">Nama</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $mhs['nama'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">Email</label>
							<div class="col-md-9">
								<input type="email" class="form-control" value="<?= $mhs['email'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">NIM</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $mhs['nim'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-3">No HP</label>
							<div class="col-md-9">
								<input type="text" class="form-control" value="<?= $mhs['no_hp'] ?>" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-7">
				<div class="card">
					<div class="card-header">
						<h4>Alamat</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Jalan</label>
								<input type="text" class="form-control" value="<?= $mhs['jln_user'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Desa</label>
								<input type="text" class="form-control" value="<?= $mhs['desa_user'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Kecamatan</label>
								<input type="text" class="form-control" value="<?= $mhs['kec_user'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Kabupaten</label>
								<input type="text" class="form-control" value="<?= $mhs['kab_user'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Provinsi</label>
								<input type="text" class="form-control" value="<?= $mhs['prov_user'] ?>" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h4>Alamat Orang Tua</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Nama Ayah</label>
								<input type="text" class="form-control" value="<?= $mhs['nama_ayah'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Nama Ibu</label>
								<input type="text" class="form-control" value="<?= $mhs['nama_ibu'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>No HP Ayah</label>
								<input type="text" class="form-control" value="<?= $mhs['hp_ayah'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>No HP Ibu</label>
								<input type="text" class="form-control" value="<?= $mhs['hp_ibu'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Jalan</label>
								<input type="text" class="form-control" value="<?= $mhs['jln_ortu'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Desa</label>
								<input type="text" class="form-control" value="<?= $mhs['desa_ortu'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Kecamatan</label>
								<input type="text" class="form-control" value="<?= $mhs['kec_ortu'] ?>" readonly>
							</div>
							<div class="form-group col-md-6 col-12">
								<label>Kabupaten</label>
								<input type="text" class="form-control" value="<?= $mhs['kab_ortu'] ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 col-12">
								<label>Provinsi</label>
								<input type="text" class="form-control" value="<?= $mhs['prov_ortu'] ?>" readonly>
							</div>
						</div>
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

