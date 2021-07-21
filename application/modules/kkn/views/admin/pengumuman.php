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
					<h4>List Pengumuman</h4>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<button class="btn btn-primary" id="btn-add-announce">Tambah</button>
					</div>

					<div class="table-responsive">
						<table class="table table-striped" id="tabel-pengumuman">
							<thead>
							<tr>
								<th width="5%" style="text-align: center">No</th>
								<th>Isi</th>
								<th width="10%" style="text-align: center">Tampil di Mahasiswa</th>
								<th width="10%" style="text-align: center">Tampil di Dosen</th>
								<th width="10%" style="text-align: center">File</th>
								<th width="10%" style="text-align: center">Tanggal</th>
								<th width="10%" style="text-align: center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 1;
							foreach ($pengumuman as $p) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $p['isi'] ?></td>
									<td style="text-align: center"><?= $p['tampil_mhs'] == 1 ? '<span class="badge badge-success">Ya</span>' : '<span class="badge badge-warning">Tidak</span>' ?></td>
									<td style="text-align: center"><?= $p['tampil_dosen'] == 1 ? '<span class="badge badge-success">Ya</span>' : '<span class="badge badge-warning">Tidak</span>' ?></td>
									<td style="text-align: center">
										<?php if ($p['berkas'] != null) { ?>
											<a href="<?= site_url() ?>assets/kkn/userfiles/pengumuman/<?= $p['berkas'] ?>"
											   target="_blank">
												<i class="fas fa-file fa-fw"></i> File
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Tidak Ada File</span>
										<?php } ?>
									</td>
									<td style="text-align: center"><?= date('d-m-Y', strtotime($p['tgl'])) ?></td>
									<td style="text-align: center">
										<button class="btn btn-danger" data-id="<?= $p['id'] ?>" data-toggle="tooltip"
												data-placement="top" title="Hapus" id="btn-del-announce">
											<i class="fas fa-trash-alt"></i>
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

<!-- Modal tambah -->
<div class="modal fade" id="announceModal" tabindex="-1" role="dialog" aria-labelledby="announceModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="announceModalLabel">Form Pengumuman</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open_multipart('', 'id="form-pengumuman"') ?>
			<div class="modal-body">
				<div class="form-group row">
					<label for="judul" class="col-form-label col-md-3">Judul :</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="judul" id="judul" autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="dosen" class="col-form-label col-md-3">Tampil di Dosen :</label>
					<div class="col-md-9">
						<div class="form-check form-check-inline">
							<input name="dosen" class="form-check-input" type="radio" id="inlineRadio1" value="1">
							<label class="form-check-label" for="inlineRadio1">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="dosen" class="form-check-input" type="radio" id="inlineradio2" value="0">
							<label class="form-check-label" for="inlineradio2">Tidak</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="dosen" class="col-form-label col-md-3">Tampil di Mahasiswa :</label>
					<div class="col-md-9">
						<div class="form-check form-check-inline">
							<input name="mhs" class="form-check-input" type="radio" id="inlineRadio3" value="1">
							<label class="form-check-label" for="inlineRadio3">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input name="mhs" class="form-check-input" type="radio" id="inlineradio4" value="0">
							<label class="form-check-label" for="inlineradio4">Tidak</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="isi" class="col-form-label col-md-3">Isi Pengumuman :</label>
					<div class="col-md-9">
						<textarea class="summernote" name="isi" id="isi"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="berkas" class="col-form-label col-md-3">File :</label>
					<div class="col-md-9">
						<input type="file" name="filenya" id="filenya" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="announceDelModal" tabindex="-1" role="dialog" aria-labelledby="announceDelModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="announceDelModalLabel">Yakin menghapus pengumuman?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/admin/delete_pengumuman', 'id="form-del-pengumuman"') ?>
			<div class="modal-body">
				Setelah dihapus, data tidak dapat dikembalikan lagi.
				<input type="hidden" class="form-control" name="id" id="announce_id">
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
