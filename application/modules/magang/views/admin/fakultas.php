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

		<!-- [ Operator ] start -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Data Fakultas</h5>
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
						<button type="button" class="btn btn-primary" id="btn-add-operator">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>

						<table id="tabel-fakultas"
							   class="table table-striped dataTable nowrap table-responsive-lg">
							<thead>
							<tr>
								<th class="text-center" style="width: 5%">No</th>
								<th>Nama Fakultas</th>
								<th class="text-center">Tanggal</th>
								<th class="text-center" style="width: 10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($fakultas->result_array() as $f) :?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $f['nama_fak'] ?></td>
									<td class="text-center"><?= tgl_jam_indo($f['created_at']) ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-danger" data-id="<?= $f['id'] ?>">
											<i class="feather icon-trash-2"></i>
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
		<!-- [ Operator ] end -->
	</div>
</div>

<div id="modal-add-fa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-operatorLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-add-operatorTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/tambah_operator') ?>" id="form-add-operator" method="post">
					<div class="form-group fill">
						<label for="napan">Nama Depan</label>
						<input type="text" id="napan" name="napan" class="form-control" required>

					</div>
					<div class="form-group fill">
						<label for="nabel">Nama Belakang</label>
						<input type="text" name="nabel" class="form-control">
					</div>
					<div class="form-group fill">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" class="form-control" required>
					</div>
					<div class="form-group fill">
						<label for="pass">Password</label>
						<input type="password" id="pass" name="password" class="form-control" required>
					</div>
					<div class="form-group fill">
						<label for="pass">Status</label>
						<select class="form-control" name="status" id="status" required>
							<option value="1">Aktif</option>
							<option value="0">Tidak Aktif</option>
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
