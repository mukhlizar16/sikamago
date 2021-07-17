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
					<h4>Status Registrasi</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" width="100%" id="tabel-status">
							<thead>
							<tr>
								<th>Nama Fitur</th>
								<th style="text-align: center" width="15%">Status</th>
								<th style="text-align: center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($status as $s) : ?>
								<tr>
									<td><?= $s['nama_fitur'] ?></td>
									<td style="text-align: center">
										<?= $s['is_open'] == 1 ? '<div class="badge badge-success">Buka</div>':'<div class="badge badge-warning">Tutup</div>' ?>
									</td>
									<td style="text-align: center">
										<button class="btn btn-primary" id="btn-status-register" data-id="<?= $s['id'] ?>">Status</button>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Modal hapus -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="statusModalLabel">Anda yakin mengubah status?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/admin/ubah_status', 'id="form-status"') ?>
			<div class="modal-body">
				<input type="hidden" name="id" id="fitur" class="form-control">
				<select name="status" id="status" class="form-control">
					<option value="1">Buka</option>
					<option value="0">Tutup</option>
				</select>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
