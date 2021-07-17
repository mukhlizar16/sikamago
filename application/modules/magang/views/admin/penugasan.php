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
							<table class="table dataTable nowrap table-striped table-responsive-lg" width="100%" id="table-pa-list">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Dosen</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="target-penugasan-pa">

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
							<table class="table dataTable nowrap table-striped table-responsive-lg" id="table-par-list">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Dosen</th>
									<th>Nama Mahasiswa</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="target-penugasan-par">

								</tbody>
							</table>
						</div>
						<p>Data penugasan dosen bimbingan mahasiswa.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Dosen PAR ] end -->

		<!-- [ start: Supervisor ] start -->
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
							<table id="table-supervisor-list" class="table dataTable table-striped table-responsive">
								<thead>
								<tr>
									<th class="text-center" style="width: 5%">No</th>
									<th style="width: 25%">Nama Supervisor</th>
									<th style="width: 35%">Lembaga Asal</th>
									<th style="width: 25%">Nama Mahasiswa</th>
									<th class="text-center" style="width: 10%">Aksi</th>
								</tr>
								</thead>
								<tbody id="target-penugasan-spv">

								</tbody>
							</table>
						</div>
						<p>Data penugasan supervisor bimbingan mahasiswa.</p>
					</div>
				</div>
			</div>
		</div>
		<!-- [ end: Supervisor ] end -->

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
						<label for="exampleFormControlSelect1">Nama Pembimbing</label>
						<input type="text" name="jenis" value="1" class="form-control" hidden>
						<select name="dosen" class="form-control" id="exampleFormControlSelect1">
							<option value="">-Pilih-</option>
							<?php foreach ($pa->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="exampleFormControlSelect2">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="exampleFormControlSelect2">
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
						<label for="exampleFormControlSelect1">Nama Pembimbing</label>
						<input type="text" name="jenis" value="2" class="form-control" hidden>
						<select name="dosen" class="form-control" id="exampleFormControlSelect1">
							<option value="">-Pilih-</option>
							<?php foreach ($par->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="exampleFormControlSelect2">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="exampleFormControlSelect2">
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
						<label for="exampleFormControlSelect1">Nama Pembimbing</label>
						<input type="text" name="jenis" value="3" class="form-control" hidden>
						<select name="dosen" class="form-control" id="exampleFormControlSelect1">
							<option value="">-Pilih-</option>
							<?php foreach ($spv->result_array() as $m) : ?>
								<option value="<?= $m['id'] ?>"><?= $m['napan'] ?> <?= $m['nabel'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="exampleFormControlSelect2">Nama Mahasiswa</label>
						<select name="mhs" class="form-control" id="exampleFormControlSelect2">
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

