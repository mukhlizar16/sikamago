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
						<h5>Daftar Dosen Pembimbing Lapangan</h5>
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
						<div class="mt-2 mb-3">
							<?= $this->session->flashdata('status') ?>
						</div>

						<button type="button" class="btn btn-primary" id="btn-add-operator">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>

						<ul class="nav nav-pills mb-3" id="myTab" role="tablist" style="float: right">
							<li class="nav-item">
								<a class="nav-link has-ripple active" id="pills-aktif-tab" data-toggle="pill" href="#aktif" role="tab" aria-controls="aktif" aria-selected="true">Aktif</a>
							</li>
							<li class="nav-item">
								<a class="nav-link has-ripple" id="pills-tidak-aktif-tab" data-toggle="pill" href="#tidak-aktif" role="tab" aria-controls="tidak-aktif" aria-selected="false">
									Tidak Aktif
									<span class="badge badge-danger badge-pill"><?= belum_aktif(2) ?></span>
								</a>
							</li>
						</ul>

						<div class="tab-content mt-3" id="myTabContent">
							<div class="tab-pane fade show active" id="aktif" role="tabpanel" aria-labelledby="aktif-tab">
								<table id="tabel-dpl-aktif" class="table table-striped dataTable nowrap table-responsive-lg">
									<thead>
									<tr>
										<th class="text-center" style="width: 5%">No</th>
										<th>Nama</th>
										<th>Email</th>
										<th class="text-center">Status</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center" style="width: 15%">Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach ($aktif->result_array() as $a) :?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td width="25%" class="sorting_1">
												<div class="d-inline-block align-middle">
													<img src="<?= base_url() ?>assets/userfiles/<?= $a['foto'] ?>"
														 alt="Foto dosen" class="img-radius align-top wid-40 hei-40 m-r-15">
													<div class="d-inline-block">
														<h6 class="m-b-0"><?= $a['napan'] . ' ' . $a['nabel'] ?></h6>
														<p class="m-b-0"><?= $a['email'] ?></p>
													</div>
												</div>
											</td>
											<td><?= $a['email'] ?></td>
											<?php
											if($a['aktif'] == 0){
												$status = "<span class='btn badge badge-warning'>Tidak Aktif</span>";
											}else{
												$status = "<span class='btn badge badge-primary'>Aktif</span>";
											}
											?>
											<td class="text-center"><?= $status ?></td>
											<td class="text-center"><?= tgl_jam_indo($a['tgl']) ?></td>
											<td class="text-center">
												<button class="btn btn-primary btn-sm has-ripple btn-edit" data-id="<?= $a['id'] ?>">Edit</button>
												<a href="#" data-toggle="modal" data-target="#modal-delete" onclick="$('#form-hapus-dpl').attr('action', '<?= site_url('admin/delete_dpl/' . $a['id']) ?>')" class="btn btn-danger btn-sm has-ripple btn-hapus">Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>

									</tbody>
								</table>
							</div>

							<div class="tab-pane fade" id="tidak-aktif" role="tabpanel" aria-labelledby="tidak-aktif-tab">
								<table id="tabel-dpl-tdk-aktif" class="table table-striped dataTable nowrap table-responsive-lg">
									<thead>
									<tr>
										<th class="text-center" style="width: 5%">No</th>
										<th>Nama</th>
										<th>Email</th>
										<th class="text-center">Status</th>
										<th class="text-center">Tanggal</th>
										<th class="text-center" style="width: 15%">Aksi</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$no = 1;
									foreach ($tidak_aktif->result_array() as $t) :?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $t['napan']. ' ' . $t['nabel'] ?></td>
											<td><?= $t['email'] ?></td>
											<?php
											if($t['aktif'] == 0){
												$status = "<span class='btn badge badge-warning'>Tidak Aktif</span>";
											}else{
												$status = "<span class='btn badge badge-primary'>Aktif</span>";
											}
											?>
											<td class="text-center"><?= $status ?></td>
											<td class="text-center"><?= tgl_jam_indo($t['tgl']) ?></td>
											<td class="text-center">
												<button class="btn btn-primary btn-sm has-ripple btn-edit" data-id="<?= $t['id'] ?>">Ubah</button>
											</td>
										</tr>
									<?php endforeach; ?>

									</tbody>
								</table>

								<div class="mt-5">
									<p class="text-muted">klik tombol ubah untuk mengaktivasi akun pengguna.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Operator ] end -->
	</div>
</div>


<!--modal hapus-->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-delete">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title">Yakin?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body"> Apakah ingin tetap menghapus?</div>
			<div class="modal-footer">
				<form id="form-hapus-dpl" method="post">
					<button type="submit" class="btn btn-danger">Ya</button>
				</form>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>

