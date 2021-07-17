<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="card card-success" id="card-form">
				<div class="card-header">
					<h4>Form Pilih Lokasi</h4>
				</div>
				<div class="card-body">
					<?= form_open('kkn/mahasiswa/simpan_lokasi', 'id="form-lokasi"') ?>
					<div class="form-group row">
						<label for="kecamatan" class="col-form-label col-md-3">Kecamatan</label>
						<div class="col-md-9">
							<select name="kecamatan" id="kecamatan" class="custom-select">
								<option value="">--Pilih--</option>
								<?php foreach ($kecamatan as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['nama_kecamatan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="desa" class="col-form-label col-md-3">Desa</label>
						<div class="col-md-9">
							<select name="desa" id="desa" class="custom-select">
							</select>
						</div>
					</div>
					<div class="mt-2 text-right">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
					<?php form_close() ?>
				</div>
				<div class="card-footer bg-light">
					Pastikan sudah memilih dengan benar.
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card card-primary">
				<div class="card-header">
					<h4>Lokasi KKN yang dipilih</h4>
				</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="kec" class="col-form-label col-md-3">Kecamatan</label>
						<div class="col-md-9">
							<input name="kec" type="text" class="form-control" readonly
								   value="<?= $lokasi['kecamatan'] ?? '' ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="desa" class="col-form-label col-md-3">Desa</label>
						<div class="col-md-9">
							<input name="desa" type="text" class="form-control" readonly
								   value="<?= $lokasi['desa'] ?? '' ?>">
						</div>
					</div>
				</div>
				<div class="card-footer bg-light">
					<span>Jika ingin mengganti lokasi, silahkan pilih di panel <b>Form Pilih Lokasi</b>.</span>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Judul modal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>

		</div>
	</div>
</div>
