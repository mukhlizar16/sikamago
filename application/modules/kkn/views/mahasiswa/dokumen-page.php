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
			<div class="card">
				<div class="card-header">
					<h4>Dokumen Persyaratan</h4>
				</div>
				<div class="card-body">
					<div class="mt-3 mb-3">
						Hasil Verifikasi Berkas: <?php if (!empty($syarat)) { ?> <b><?= $syarat['status'] == 2 ? 'Tidak Lengkap':'Lengkap' ?></b>. <?= $syarat['keterangan'] ?> <?php }else{ ?> <b>Belum Diverifikasi</b> <?php } ?>
					</div>
					<div class="table-responsive">
						<table class="table table-borderless" width="90%">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Surat Keterangan</th>
								<th width="10%">Status</th>
								<th width="30%"></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td width="5%">1.</td>
								<td>Surat Pernyataan Persetujuan Prodi</td>
								<td><?= empty($dokumen['doc_1']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<a href="https://drive.google.com/file/d/153H43YGjtSIIi_vqa9ZDZEXxtfPpSLyX/view?usp=sharing"
									   class="btn btn-primary" target="_blank">
										<i class="fas fa-download fa-fw"></i> Download
									</a>
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
										<button class="btn btn-info" id="btn-satu" type="button">
											<i class="fas fa-upload fa-fw"></i> Upload
										</button>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td width="5%">2.</td>
								<td>Surat Keterangan Izin Orangtua</td>
								<td><?= empty($dokumen['doc_2']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<a href="https://drive.google.com/file/d/1-m-rk9v7b0KzXF76rU7IqAiSjNmjiFvp/view?usp=sharing"
									   class="btn btn-primary" target="_blank">
										<i class="fas fa-download fa-fw"></i> Download
									</a>
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
									<button class="btn btn-info" id="btn-dua">
										<i class="fas fa-upload fa-fw"></i> Upload
									</button>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td width="5%">3.</td>
								<td>Surat Pernyataan Diri</td>
								<td><?= empty($dokumen['doc_3']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<a href="https://drive.google.com/file/d/1se96zaMVfbfhMbjQ_D28rMQeHaNiSSwM/view?usp=sharing"
									   class="btn btn-primary" target="_blank">
										<i class="fas fa-download fa-fw"></i> Download
									</a>
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
									<button class="btn btn-info" id="btn-tiga">
										<i class="fas fa-upload fa-fw"></i> Upload
									</button>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td width="5%">4.</td>
								<td>Sertifikat Vaksin</td>
								<td><?= empty($dokumen['doc_5']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
									<button class="btn btn-info" id="btn-lima">
										<i class="fas fa-upload fa-fw"></i> Upload
									</button>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td width="5%">5.</td>
								<td>Transkrip Nilai</td>
								<td><?= empty($dokumen['doc_6']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
									<button class="btn btn-info" id="btn-enam">
										<i class="fas fa-upload fa-fw"></i> Upload
									</button>
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td width="5%">6.</td>
								<td>
									Surat Keterangan SWAB
									<div>
										<small class="text-danger">Diupload H-1 pelepasan</small>
									</div>
								</td>
								<td><?= empty($dokumen['doc_4']) ? '<span class="badge badge-danger">Belum Ada</span>':'<span class="badge badge-success">Sudah Ada</span>' ?></td>
								<td nowrap style="text-align: right">
									<?php if ($fitur['is_open'] == 0) { ?>
									<?php }else{ ?>
									<button class="btn btn-info" id="btn-empat">
										<i class="fas fa-upload fa-fw"></i> Upload
									</button>
									<?php } ?>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modalSatu" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Pernyataan Persetujuan Prodi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_satu', 'id="form-doc-satu"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_satu" id="doc-satu">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalDua" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Keterangan Izin Orang Tua</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_dua', 'id="form-doc-dua"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_dua" id="doc-dua">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTiga" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Pernyataan Diri</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_tiga', 'id="form-doc-tiga"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_tiga" id="doc-tiga">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalmpat" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Keterangan SWAB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_empat', 'id="form-doc-empat"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_empat" id="doc-empat">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalLima" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sertifikat Vaksin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_lima', 'id="form-doc-lima"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_lima" id="doc-lima">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEnam" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Transkrip Nilai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_enam', 'id="form-doc-enam"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_enam" id="doc-enam">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTujuh" aria-hidden="true" data-backdrop="static"
	 data-keyboard="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Surat Keterangan Sehat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('kkn/mahasiswa/upload_doc_tujuh', 'id="form-doc-tujuh"') ?>
			<div class="modal-body">
				<input type="file" class="form-control" name="doc_tujuh" id="doc-tujuh">
			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
