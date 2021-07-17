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

		<!-- [ Dosen PA ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Dosen Pembimbing Lapangan</h5>
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
						<button type="button" class="btn btn-primary" id="btn-addPA">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table table-striped table-responsive-lg" id="table-pa-list">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Dosen</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<p>Data penugasan dosen bimbingan mahasiswa.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Dosen PA ] end -->

		<!-- [ Dosen PAR ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Dosen Pembimbing Artikel Ilmiah</h5>
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
						<button type="button" class="btn btn-primary" id="btn-addPAR">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table table-striped table-responsive-lg">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Dosen</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="target-penugasanPAR">

								</tbody>
							</table>
						</div>
						<p>Data penugasan dosen bimbingan mahasiswa.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Dosen PAR ] end -->

		<!-- [ Dosen NPA ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Supervisor Magang Mitra</h5>
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
						<button type="button" class="btn btn-primary" id="btn-addDPL">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table table-striped table-responsive-lg">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Supervisor</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="target-penugasanSPV">

								</tbody>
							</table>
						</div>
						<p>Data penugasan dosen bimbingan mahasiswa.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Dosen NPA ] end -->

	</div>
</div>

<div id="modal-penugasan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-penugasanLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-penugasanLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/tambah_penugasan') ?>" id="form-penugasan" method="post">
					<div class="form-group fill">
						<label for="pembimbing">Nama Pembimbing</label>
						<input type="text" name="jenis" value="1" class="form-control" hidden>
						<select name="dosen" class="form-control" id="pembimbing">
							<option value="">-Pilih-</option>
							<?php foreach ($pa->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="mhs">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="mhs">
							<option value="">-Pilih-</option>
							<?php foreach ($mhs->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn  btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="modal-penugasanpar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-penugasanparLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-penugasanparLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/tambah_penugasan') ?>" id="form-penugasanpar" method="post">
					<div class="form-group fill">
						<label for="pemb_par">Nama Pembimbing</label>
						<input type="text" name="jenis" value="2" class="form-control" hidden>
						<select name="dosen" class="form-control" id="pemb_par">
							<option value="">-Pilih-</option>
							<?php foreach ($par->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="mhs_par">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="mhs_par">
							<option value="">-Pilih-</option>
							<?php foreach ($mhs->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn  btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="modal-penugasandpl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-penugasandplLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-penugasandplLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/tambah_penugasan') ?>" id="form-penugasandpl" method="post">
					<div class="form-group fill">
						<label for="pemb_dpl">Nama Pembimbing</label>
						<input type="text" name="jenis" value="3" class="form-control" hidden>
						<select name="dosen" class="form-control" id="pemb_dpl">
							<option value="">-Pilih-</option>
							<?php foreach ($dpl->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="mhs_dpl">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="mhs_dpl">
							<option value="">-Pilih-</option>
							<?php foreach ($mhs->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn  btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal edit main menu-->
<div id="modal_editmainMenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-editmainMenuLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-mainmenuLabel">Edit Menu Utama</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_editmainmenu"></div>
				<div class="mt-5">
					<form action="<?= site_url('admin/update_mainmenu') ?>" id="form-edit-mainmenu" method="post">
						<div class="form-group fill">
							<label for="nama_mainmenu"><b>Nama Main Menu</b></label>
							<input type="text" class="form-control" name="id" id="id_menu" hidden>
							<input type="text" id="nama_menu" class="form-control" name="nama_mainmenu_edit" autofocus>
						</div>
						<div class="form-group fill">
							<label for="icon_mainmenu"><b>Icon</b></label>
							<input type="text" id="ikon_menu" class="form-control" name="icon_mainmenu_edit">
						</div>

						<div class="modal-footer">
							<button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn  btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
