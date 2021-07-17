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
						<h5>Data Mahasiswa</h5>
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
						<button type="button" class="btn btn-primary" id="btn-add-dosen-bim">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table table-striped dataTable nowrap table-responsive" id="tabel-add-mhs">
								<thead>
								<tr>
									<th class="text-center">No</th>
									<th>Mahasiswa</th>
									<th>Prodi</th>
									<th>Nomor HP</th>
									<th>Jenis Magang</th>
									<th>Bidang Magang</th>
									<th>Lokasi Magang</th>
									<th>Tipe Bimbingan</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; foreach ($bim->result_array() as $b) : ?>
								<tr role="row">
									<td><?= $no++ ?></td>
									<td class="sorting_1">
										<div class="d-inline-block align-middle">
											<img src="<?= config_item('magang_foto') . $b['foto'] ?>"
												 alt="Foto mahasiswa" class="img-radius align-top m-r-15"
												 style="width:40px;">
											<div class="d-inline-block">
												<h6 class="m-b-0"><?= $b['napan'] . ' ' . $b['nabel'] ?></h6>
												<p class="m-b-0"><?= $b['email'] ?></p>
											</div>
										</div>
									</td>
									<td class="text-wrap"><?= $b['prodi'] ?></td>
									<td><?= $b['no_hp'] ?></td>
									<td><?= $b['jenis'] ?></td>
									<td class="text-wrap">
										<?= $b['bidang'] == null ? ' -- ' : $b['bidang'] ?>
									</td>
									<td class="text-wrap">
										<?= $b['lokasi'] == 'Lainnya' ? $b['lain'] : $b['lokasi'] ?>
									</td>
									<td><?= $b['tipe'] ?></td>
									<td>
										<button id="btn-hapus" class="btn btn-sm btn-danger" data-id="<?= $b['id'] ?>">
											<i class="feather icon-trash-2"></i>
										</button>
									</td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<p>Data mahasiswa bimbingan.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>


<!-- Modal -->
<div id="modal-dosen-addBim" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-dosen-addBimLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-dosen-addBim-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_modal-dosen-addBim"></div>
				<form id="form-submit-dosen-addBim">
					<div class="form-group">
						<label for="nama">Nama Mahasiswa</label>
						<select name="nama" id="nama" class="form-control" required>
							<option value="">-Pilih-</option>
							<?php foreach ($mhs->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] . ' ' . $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis">Jenis Bimbingan</label>
						<select name="jenis" id="jenis" class="form-control" required>
							<option value="">-Pilih-</option>
							<option value="1">Bimbingan Lapangan</option>
							<option value="2">Bimbingan Artikel Ilmiah</option>
						</select>
					</div>

					<div class="mt-3 mb-3">
						<small style="text-align: justify"><strong>Note :</strong> Mohon memilih nama mahasiswa sesuai dengan yang ditugaskan.</small>
					</div>

					<div class="modal-footer">
						<button id="btn-close-modal-dosen-addBim" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modal-dosen-addBim" type="submit" class="btn btn-sm btn-primary">Simpan</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modal-dosen-addBim"
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
