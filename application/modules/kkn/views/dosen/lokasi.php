<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-4 col-lg-4 col-xl-4">
			<div class="card card-info">
				<div class="card-header">
					<h4>Pilih Lokasi</h4>
				</div>
				<div class="card-body">
					<form action="" id="form-lokasi">
						<div class="form-group">
							<label for="kec">Kecamatan</label>
							<select name="kec" id="kec" class="custom-select select2">
								<option value="">--Pilih--</option>
								<?php foreach ($kec as $k) : ?>
									<option value="<?= $k['id'] ?>"><?= $k['nama_kecamatan'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="desan">Desa</label>
							<select name="desa" id="desa" class="custom-select"></select>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-8 col-md-8 col-xl-8">
			<div class="card card-primary">
				<div class="card-header">
					<h4>Lokasi KKN Mahasiswa</h4>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<button class="btn btn-primary" data-toggle="modal" data-target="#addModalLoc">
							Tetapkan Lokasi
						</button>
					</div>
					<div class="table-responsive">
						<table class="table" width="100%" id="table-list-mhs">
							<thead>
							<tr>
								<th style="text-align: center" width="5%">No</th>
								<th>Nama</th>
								<th style="text-align: center" width="15%">Lokasi</th>
								<th style="text-align: center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Modal tambah -->
<div class="modal fade" id="addModalLoc" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
	 aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Form Penetapan Lokasi</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/dosen/add_lokasi', 'id="form-add-loc"') ?>
			<div class="modal-body">
				Isi
			</div>
			<div class="modal-footer">
				<button class="btn btn-outline-warning" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Tambah</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="hapusModalUser" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Are you sure?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/admin/hapus_user', 'id="form-hapus-user"') ?>
			<div class="modal-body">
				Anda akan menghapus : <span class="text-dark" id="nama-user"></span><br>
				Setelah dihapus, data tidak dapat dikembalikan lagi.
				<input type="hidden" name="user" class="form-control" id="user">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
