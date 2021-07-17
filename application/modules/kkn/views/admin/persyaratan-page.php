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
					<h4>List Mahasiswa</h4>
				</div>
				<div class="card-body">
					<div class="mb-3">
						<a href="<?= site_url('kkn/admin/export') ?>" class="btn btn-primary">
							<i class="fas fa-file-excel fa-fw"></i> Export Excel
						</a>
					</div>
					<div class="table-responsive">
						<table class="table" width="100%" id="table-persyaratan">
							<thead>
							<tr>
								<th style="text-align: center" width="5%">No</th>
								<th>Nama</th>
								<th style="text-align: center">NIM</th>
								<th>Prodi</th>
								<th style="text-align: center" width="15%">Surat Persetujuan Prodi</th>
								<th style="text-align: center" width="10%">Izin Ortu</th>
								<th style="text-align: center" width="10%">Surat Pernyataan Diri</th>
								<th style="text-align: center" width="10%">Sertifikat Vaksin</th>
								<th style="text-align: center" width="10%">Transkrip Nilai</th>
								<th style="text-align: center" width="10%">Surat SWAB</th>
								<th>Kelengkapan</th>
								<th style="text-align: center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($mhs as $m) : ?>
								<tr>
									<td>
										<?= $no++ ?>
										<input type="hidden" class="form-control" id="user" name="user" value="<?= $m['user_id'] ?>">
									</td>
									<td><?= $m['nama'] ?></td>
									<td><?= $m['nim'] ?></td>
									<td><?= $m['prodi'] ?></td>
									<td class="text-center">
										<?php if (!empty($m['doc_1'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_1']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td class="text-center">
										<?php if (!empty($m['doc_2'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_2']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td class="text-center">
										<?php if (!empty($m['doc_3'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_3']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td class="text-center">
										<?php if (!empty($m['doc_5'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_5']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td class="text-center">
										<?php if (!empty($m['doc_6'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_6']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td class="text-center">
										<?php if (!empty($m['doc_4'])) { ?>
											<a href="<?= site_url('kkn/admin/lihat/' . $m['id'] . '/' . $m['doc_4']) ?>"
											   class="btn btn-primary btn-sm">
												Lihat
											</a>
										<?php } else { ?>
											<span class="badge badge-warning">Belum Ada</span>
										<?php } ?>
									</td>
									<td>
										<span class="badge badge-success"><?= $m['status'] == 1 ? 'Lengkap':'Tidak Lengkap' ?></span>
										<p><?= $m['keterangan'] ?></p>
									</td>
									<td style="text-align: center" nowrap width="100%">
										<button class="btn btn-primary" data-id="<?= $m['user_id'] ?>" id="btn-catatan">
											<i class="fas fa-check-circle"></i>
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

<!-- Modal hapus -->
<div class="modal fade" id="catatanModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="catatanModalLabel">Are you sure?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/admin/catatan', 'id="form-catatan"') ?>
			<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="user_id" class="form-control" id="user_id">
						<select name="status" id="status" class="custom-select"
								style="width: 100%">
							<option value="1">Lengkap</option>
							<option value="0">Tidak Lengkap</option>
						</select>
					</div>
					<div class="form-group" id="field-catatan" style="display: none">
						<textarea class="form-control summernote" name="catatan" id="catatan"></textarea>
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
