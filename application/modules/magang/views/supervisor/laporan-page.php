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
									<?php if (empty($laporan)) { ?>
											<td colspan="4" class="text-center">--Data tidak ditemukan--</td>
									<?php }else{ ?>
									<td class="text-wrap"><?= $laporan['judul'] ?></td>
									<td class="text-center" width="10%">
										<a href="<?= base_url() ?>assets/magang/userfiles/laporan/<?= $laporan['nama_file'] ?>"
										   target="_blank" data-toggle="tooltip" title="laporan: <?= $laporan['nama_file'] ?>">
											<img src="<?= config_item('base_url') ?>assets/magang/theme/images/pdf.png" alt=""
												 height="40px">
										</a>
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
									<?php } ?>
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
<div id="modal-dosen-laporan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-dosen-kegiatanLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-dosen-kegiatan-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_modal-dosen-kegiatan"></div>
				<form id="form-submit-dosen-kegiatan">
					<div class="form-group">
						<label for="jenis">Uraian Kegiatan :</label>
						<textarea name="uraian" id="uraian" cols="30" rows="10" class="form-control"></textarea>
					</div>

					<div class="modal-footer">
						<button id="btn-close-modal-dosen-kegiatan" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modal-dosen-kegiatan" type="submit" class="btn btn-sm btn-primary">Simpan</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modal-dosen-kegiatan"
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
