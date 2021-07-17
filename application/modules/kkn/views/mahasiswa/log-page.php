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
					<h4>Log Kegiatan Harian</h4>
				</div>
				<div class="card-body">

					<div class="mb-3">
						<a href="#tambahModal" class="btn btn-primary" data-toggle="modal">Tambah Kegiatan</a>
					</div>

					<div class="table-responsive">
						<table class="table" width="100%" id="tabel-log">
							<thead>
							<tr>
								<th style="text-align: center" width="5%">No</th>
								<th style="text-align: center" width="15%">Tanggal</th>
								<th>Uraian</th>
								<th style="text-align: center">Dokumentasi</th>
								<th style="text-align: center" width="10%">Status</th>
								<th style="text-align: center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($log as $l) :
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td style="text-align: center"><?= date('d-m-Y', strtotime($l['tgl'])) ?></td>
								<td><?= $l['kegiatan'] ?></td>
								<td style="text-align: center">
									<img src="<?= config_item('dokumentasi') . $l['dokumentasi'] ?>" alt="foto dokumentasi" height="70px">
								</td>
								<td style="text-align: center">
									<?= $l['is_approve'] == 1 ? '<span class="badge badge-success">Disetujui</span>':'<span class="badge badge-danger">Belum disetujui</span>' ?>
								</td>
								<td style="text-align: center">
									<button class="btn btn-danger" data-id="<?= $l['id'] ?>" id="btn-hapus" data-toggle="tooltip" title="Hapus" data-placement="top">
										<i class="fas fa-trash-alt fa-fw"></i>
									</button>
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

<!-- modal tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan Harian</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/simpan_log', 'id="form-add-log"') ?>
			<div class="modal-body">
				<div class="form-group row">
					<label for="tgl-input" class="col-form-label col-md-3">Tanggal :</label>
					<div class="col-md-9">
						<input type="date" class="form-control" name="tanggal" id="tgl-input">
					</div>
				</div>
				<div class="form-group row">
					<label for="tgl" class="col-form-label col-md-3">Kegiatan yang dilakukan :</label>
					<div class="col-md-9">
						<textarea name="uraian" id="uraian" class="summernote-simple"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="dokumen" class="col-form-label col-md-3">Dokumentasi kegiatan :</label>
					<div class="col-md-9">
						<input type="file" class="form-control" name="dokumen" id="dokumen">
						<small>Ukuran file maksimal 2 Mb. Jenis file adalah dengan tipe <span class="text-dark">jpg, jpeg, png dan gif</span>.</small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Yakin menghapus data?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/mahasiswa/hapus_log', 'id="form-del-log"') ?>
			<div class="modal-body">
				<p>Setelah dihapus, data tidak dapat dikembalikan.</p>
				<input name="id" id="log_id" type="hidden" class="form-control">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
