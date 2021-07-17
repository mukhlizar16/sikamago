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
						<h5>Data Fokus Kegiatan</h5>
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
						<button type="button" class="btn btn-primary" id="btn-add-fokus">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>

						<table id="tabel-fokus"
							   class="table table-striped dataTable nowrap table-responsive">
							<thead>
							<tr>
								<th class="text-center" style="width: 5%">No</th>
								<th>Fokus Kegiatan</th>
								<th>Lingkup</th>
								<th>Prodi</th>
								<th style="width: 10%">Peminatan</th>
								<th class="text-center" style="width: 10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($fokus->result_array() as $f) :?>
								<tr>
									<td><?= $no++ ?></td>
									<td class="text-wrap"><?= $f['kegiatan'] ?></td>
									<td><?= $f['lingkup'] ?></td>
									<td class="text-wrap"><?= $f['prodi'] == null ? "Semua Prodi" : $f['prodi'] ?></td>
									<td class="text-wrap" style="width: 10%"><?= $f['peminatan'] == null ? "--" : $f['peminatan'] ?></td>
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

<div id="modal-add-fokus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-add-fokus"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-add-fokusTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
		</div>
	</div>
</div>
