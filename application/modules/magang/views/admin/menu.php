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
								<a href="#!">Menu</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->

		<div class="row">
			<!-- [ sample-page ] start -->
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Menu List</h5>
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
						<button type="button" class="btn btn-primary" id="btn-menu">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table table-striped table-responsive-lg">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Main Menu</th>
									<th>Sub Menu</th>
									<th>Level</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="showing-allmenu">

								</tbody>
							</table>
						</div>
						<p>Data yang akan muncul di sidebar pengguna.</p>
					</div>
				</div>
			</div>
			<!-- [ sample-page ] end -->
		</div>

		<!-- Main Menu Card-->
		<!-- [ sample-page ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Main Menu List</h5>
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
						<button type="button" class="btn btn-primary" id="btn-mainmenu">
							<i class="feather mr-2 icon-plus-square"></i>Tambah
						</button>
						<div class="mt-3">
								<table class="table table-striped table-responsive-lg">
									<thead>
									<tr>
										<th class="text-center" style="width: 10%">No</th>
										<th>Nama Menu</th>
										<th>Icon</th>
										<th class="text-center" style="width: 15%">Aksi</th>
									</tr>
									</thead>
									<tbody id="target">

									</tbody>
								</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- START: Table Submenu -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Submenu List</h5>
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
						<button type="button" class="btn btn-primary" id="btn-submenu">
							<i class="feather mr-2 icon-plus-square"></i>Tambah
						</button>
						<div class="mt-3">
							<table class="table">
								<thead>
								<tr>
									<th class="text-center" style="width: 10%">No</th>
									<th>Nama Menu</th>
									<th>Url</th>
									<th class="text-center" style="width: 15%">Aksi</th>
								</tr>
								</thead>
								<tbody id="show_tablesubmenu">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: Table Submenu-->
		<!-- [ sample-page ] end -->

	</div>
</div>

<div id="modalmenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalmenuLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLiveLabel">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/save_menu') ?>" id="form-tambahmenu" method="post">
					<div class="form-group fill">
						<label for="exampleFormControlSelect1">Main Menu</label>
						<select name="mainmenu" class="form-control" id="exampleFormControlSelect1">
							<option value="">-Pilih menu utama-</option>
							<?php foreach ($mainmenu->result_array() as $mm) : ?>
							<option value="<?= $mm['id'] ?>"><?= $mm['nama_mainmenu'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="exampleFormControlSelect2">Submenu</label>
						<select name="submenu" class="form-control" id="exampleFormControlSelect2">
							<option value="">-Pilih submenu-</option>
							<?php foreach ($submenu->result_array() as $sm) : ?>
								<option value="<?= $sm['id'] ?>"><?= $sm['nama_submenu'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group fill">
						<label for="exampleFormControlSelect2">Level</label>
						<select name="level" class="form-control" id="exampleFormControlSelect3">
							<option value="">-Pilih level-</option>
							<?php foreach ($level->result_array() as $l) : ?>
								<option value="<?= $l['id'] ?>"><?= $l['nama_level'] ?></option>
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

<!--Modal main menu-->
<div id="modal-mainmenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-mainmenuLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-mainmenuLabel">Tambah Menu Utama</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_mainmenu"></div>
				<div class="mt-5">
					<form action="<?= site_url('admin/simpan_mainmenu') ?>" id="form-tambah-mainmenu" method="post">
						<div class="form-group fill">
							<label for="nama_mainmenu">Nama Main Menu</label>
							<input type="text" class="form-control" name="nama_mainmenu" autofocus>
						</div>
						<div class="form-group fill">
							<label for="icon_mainmenu">Icon</label>
							<input type="text" class="form-control" name="icon_mainmenu">
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
<!--Modal submenu-->
<div id="modal-submenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-submenuLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLiveLabel">Tambah Submenu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center" id="keterangan_submenu"></div>
				<div class="mt-5">
					<form action="<?= site_url('admin/simpan_submenu') ?>" id="form-tambah-submenu" method="post">
						<div class="form-group fill">
							<label for="nama_submenu"><b>Submenu</b></label>
							<input type="text" class="form-control" name="nama_submenu" autofocus>
						</div>
						<div class="form-group fill">
							<label for="url_submenu">Url</label>
							<input type="text" class="form-control" name="url_submenu">
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

<!-- Modal edit submenu-->
<div id="modal_editsubMenu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-editsubMenuLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-mainmenuLabel">Edit Submenu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body none-border">
				<div class="mt-5">
					<form action="<?= site_url('admin/update_datasubmenu') ?>" id="form-edit-submenu" method="post">
						<div class="form-group fill">
							<label for="nama_submenu"><b>Nama Submenu</b></label>
							<input type="text" class="form-control" name="id_smEdit" id="id_submenu" hidden>
							<input type="text" id="nama_submenu" class="form-control" name="nama_submenu_edit" autofocus>
						</div>
						<div class="form-group fill">
							<label for="url_mainmenu">Url</label>
							<input type="text" id="url_submenu" class="form-control" name="url_submenu_edit">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

