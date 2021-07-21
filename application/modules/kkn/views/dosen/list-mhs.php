<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header">
					<h4>List Mahasiswa Bimbingan</h4>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<button class="btn btn-primary" id="add-mhs" data-toggle="modal" data-target="#addModalBim">
							Tambah Bimbingan
						</button>
					</div>
					<div class="table-responsive">
						<table class="table" width="100%" id="table-list-mhs">
							<thead>
							<tr>
								<th style="text-align: center" width="5%">No</th>
								<th>Nama</th>
								<th>NIM</th>
								<th>Prodi</th>
								<th>Ketua Kelompok</th>
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
<div class="modal fade" id="addModalBim" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
	 aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addModalLabel">Form Tambah Bimbingan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/dosen/add_bim', 'id="form-add-bim"') ?>
			<div class="modal-body">
				<div class="form-group">
					<select name="mhs" id="list-mhs" class="custom-select" style="width: 100%"></select>
				</div>
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
