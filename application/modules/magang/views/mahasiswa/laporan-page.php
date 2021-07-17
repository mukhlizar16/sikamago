`
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10">Dashboard <?= is_admin() ? 'Administrator' : 'Pengguna' ?></h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">
									<i class="feather icon-home"></i>
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= site_url('admin') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="javascript:void(0)"><?= $breadcrumb ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->

		<!-- laporan final -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Laporan</h5>
						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									<i class="feather icon-more-horizontal"></i>
								</button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i
														class="feather icon-maximize"></i> maximize</span><span
													style="display:none"><i
														class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i
														class="feather icon-minus"></i> collapse</span><span
													style="display:none"><i class="feather icon-plus"></i> expand</span></a>
									</li>
									<li class="dropdown-item reload-card"><a href="#!"><i
													class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
											remove</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if ($laporan['status'] == 'kosong') : ?>
							<button type="button" class="btn btn-primary" id="btn-add-laporan">
								<i class="feather mr-2 icon-plus-circle"></i>Tambah
							</button>
						<?php endif ?>
						<?php if ($laporan['status'] == 'ada') : ?>
							<span>Anda telah mengupload berkas laporan. Hubungi admin jika ada kendala.</span>
						<?php endif; ?>

						<div class="mt-3">
							<table class="table table-striped table-responsive-lg table-hover" id="tabel-laporan">
								<thead>
								<tr>
									<th>Judul</th>
									<th class="text-center">Berkas</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-wrap"><?= $laporan['judul'] ?></td>
									<td class="text-center" width="10%">
											<a href="<?= base_url() ?>assets/magang/userfiles/laporan/<?= $laporan['nama_file'] ?>"
											   target="_blank" data-toggle="tooltip" title="laporan: <?= $laporan['nama_file'] ?>">
												<img src="<?= base_url() ?>assets/magang/theme/images/pdf.png" alt=""
													 height="40px">
											</a>
									</td>
									<td class="text-center" width="10%"><?= $laporan['tgl'] ?></td>
									<td class="text-center" width="10%">
										<button id="btn-hapus-lap"
												class="btn btn-sm btn-danger has-ripple"
												data-toggle="tooltip"
												data-placement="top" title="Hapus"
												data-id="<?= $laporan['id'] ?>">
											<i class="feather icon-trash-2"></i> hapus
										</button>
									</td>
								</tr>
								</tbody>
							</table>
						</div>

						<small>Hanya digunakan untuk mengunggah (<i>mengupload</i>) berkas laporan final.</small>

						<div class="mt-3">
							<h6>Preview berkas</h6>
							<?php if ($laporan['status'] == 'kosong') {
								echo 'Tidak ditemukan berkas';
							}else{ ?>
								<iframe src="https://docs.google.com/gview?url=<?= base_url() ?>assets/magang/userfiles/laporan/<?= $laporan['nama_file'] ?>&embedded=true"
										style="width:240px; height:320px;"
										frameborder="0">
								</iframe>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Laporan artikel ilmiah -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Laporan Artikel Ilmiah</h5>
						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									<i class="feather icon-more-horizontal"></i>
								</button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i
														class="feather icon-maximize"></i> maximize</span><span
													style="display:none"><i
														class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i
														class="feather icon-minus"></i> collapse</span><span
													style="display:none"><i class="feather icon-plus"></i> expand</span></a>
									</li>
									<li class="dropdown-item reload-card"><a href="#!"><i
													class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
											remove</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card-body">
						<?php if ($artikel['status'] == 'kosong') : ?>
							<button type="button" class="btn btn-primary" id="btn-add-artikel">
								<i class="feather mr-2 icon-plus-circle"></i>Tambah
							</button>
						<?php endif; ?>
						<?php if ($artikel['status'] == 'ada') : ?>
							<span>Anda telah mengupload berkas laporan artikel ilmiah. Hubungi admin jika ada kendala.</span>
						<?php endif; ?>

						<div class="mt-3">
							<table class="table table-striped table-responsive-sm table-hover" id="tabel-artikel">
								<thead>
								<tr>
									<th>Judul</th>
									<th class="text-center">Berkas</th>
									<th>Tanggal</th>
									<th class="text-center">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td class="text-wrap"><?= $artikel['judul'] ?></td>
									<td class="text-center" width="10%">
										<a href="<?= base_url() ?>assets/userfiles/artikel/<?= $artikel['nama_file'] ?>"
										   target="_blank" data-toggle="tooltip" title="artikel: <?= $artikel['nama_file'] ?>">
											<img src="<?= config_item('theme_image') ?>pdf.png" alt=""
												 height="40px">
										</a>
									</td>
									<td class="text-center" width="10%"><?= $artikel['tgl'] ?></td>
									<td class="text-center" width="10%">
										<button id="btn-hapus-artikel"
												class="btn btn-sm btn-danger has-ripple"
												data-toggle="tooltip" data-id="<?= $artikel['id'] ?>">
											<i class="feather icon-trash-2"></i> hapus
										</button>
									</td>

								</tr>
								</tbody>
							</table>
						</div>

						<small>Hanya digunakan untuk mengunggah (<i>mengupload</i>) berkas laporan artikel ilmiah.</small>

						<div class="mt-3">
							<h6>Preview berkas</h6>
							<?php if ($artikel['status'] == 'kosong'){
								echo 'Tidak ditemukan berkas';
							}else{ ?>
								<iframe src="https://docs.google.com/gview?url=<?= base_url() ?>assets/magang/userfiles/artikel/<?= $artikel['nama_file'] ?>&embedded=true"
										style="width:240px; height:320px;"
										frameborder="0">
								</iframe>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>


<!-- Modal -->
<div id="modal-laporan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-laporanLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-laporan-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center mt-5" id="keterangan_modal-laporan"></div>
				<form id="form-uploadLaporan" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" name="judul" id="judul-laporan" required>
					</div>
					<div class="form-group">
						<label for="foto">Silahkan pilih file dengan tipe *.pdf</label>
						<input type="file" id="laporan" class="dropify" name="laporan">
					</div>
					<small class="text-muted">Ukuran file (berkas) yang diunggah, maksimal adalah 10 Mb.</small>
					<div class="modal-footer">
						<button id="btn-close-modalLaporan" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modalLaporan" type="submit" class="btn btn-sm btn-primary">Upload
						</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modalLaporan"
								style="display: none">
							<span class="spinner-border spinner-border-sm" role="status"></span>
							Loading...
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Edit Laporan Modal -->
<div id="modal-add-artikel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-eidt-laporanLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-add-artikel-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center mt-5" id="keterangan_modal-add-artikel"></div>
				<form id="form-add-artikel" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="judul_artikel">Judul</label>
						<input type="text" class="form-control" name="judul_artikel" id="judul_artikel" required>
					</div>
					<div class="form-group">
						<label for="nama_artikel">Silahkan pilih file dengan tipe *.pdf</label>
						<input type="file" id="nama_artikel" class="dropify" name="nama_berkas">
					</div>
					<small class="text-muted">Ukuran file (berkas) yang diunggah, maksimal adalah 10 Mb.</small>
					<div class="modal-footer">
						<button id="btn-close-modal-add-artikel" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modal-add-artikel" type="submit" class="btn btn-sm btn-primary">Simpan
						</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modal-add-artikel"
								style="display: none">
							<span class="spinner-border spinner-border-sm" role="status"></span>
							Loading...
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
