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
							<li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>">
									<i class="feather icon-home"></i>
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= site_url('dosen') ?>">Dashboard</a>
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

		<!-- START: Main content-->
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
						<button type="button" class="btn btn-primary waves-effect waves-light has-ripple" id="btn-dosen-add-lap">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>

						<div class="mt-3">
							<table class="table table-striped table-responsive-lg table-hover" id="tabel-laporan-dosen">
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
										<!--<a href="<?/*= base_url() */?>assets/userfiles/laporan/dosen/<?/*= $laporan['nama_file'] */?>"
										   target="_blank" data-toggle="tooltip" title="laporan: <?/*= $laporan['nama_file'] */?>">
											<img src="<?/*= config_item('theme_image') */?>pdf.png" alt=""
												 height="40px">
										</a>-->

										<iframe src="https://docs.google.com/gview?url=<?= base_url() ?>assets/userfiles/laporan/dosen/<?= $laporan['nama_file'] ?>&embedded=true"
												style="width:240px; height:320px;"
												frameborder="0">
										</iframe>
									</td>
									<td class="text-center" width="10%"><?= $laporan['tgl'] ?></td>
									<td class="text-center" width="10%">
										<button id="btn-hapus-lap"
												class="btn btn-sm btn-danger has-ripple"
												data-toggle="tooltip"
												data-id="<?= $laporan['id'] ?>">
											<i class="feather icon-trash-2"></i> hapus
										</button>
									</td>
								</tr>
								</tbody>
							</table>
						</div>

						<small>Hanya digunakan untuk mengunggah (<i>mengupload</i>) berkas laporan final.</small>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>


<!-- Modal -->
<div id="modal-dosen-laporan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-dosen-lapLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-dosen-lap-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_modal-dosen-lap"></div>
				<form id="form-submit-dosen-lap">
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" name="judul" id="judul" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="berkas">Silahkan pilih file dengan tipe *.pdf</label>
						<input type="file" id="berkas_lap" class="dropify" name="berkas_lap">
					</div>
					<small class="text-muted">Ukuran file (berkas) yang diunggah, maksimal adalah 10 Mb.</small>

					<div class="modal-footer">
						<button id="btn-close-modal-dosen-lap" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modal-dosen-lap" type="submit" class="btn btn-sm btn-primary">Simpan</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modal-dosen-lap"
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
