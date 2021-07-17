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
						<h5>Log Harian Mahasiswa Bimbingan</h5>
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

						<table class="table table-hover table-responsive" id="lihat-log-mhs">
							<thead>
							<tr>
								<th width="5%">No</th>
								<th>Mahasiswa</th>
								<th>Lokasi</th>
								<th class="text-center" width="15%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($bim->result_array() as $b) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td class="sorting_1">
									<div class="d-inline-block align-middle">
										<img src="<?= config_item('magang_foto') . $b['foto_mhs'] ?>"
											 alt="Foto mahasiswa" class="img-radius align-top m-r-15"
											 style="width:40px;">
										<div class="d-inline-block">
											<h6 class="m-b-0"><?= $b['napan'] . ' ' . $b['nabel'] ?></h6>
											<p class="m-b-0"><?= $b['email'] ?></p>
										</div>
									</div>
								</td>
								<td>
									<?= $b['lokasi'] == 'Lainnya' ? $b['lokasi_lain'] : $b['lokasi'] ?>
								</td>
								<td class="text-center">
									<a class="btn btn-sm btn-primary has-ripple" href="<?= site_url('magang/dosen/detail_log_mahasiswa') ?>/<?= $b['idm'] ?>">
										<i class="feather icon-eye"></i> Lihat</a>
								</td>
							</tr>
							<?php endforeach; ?>
							</tbody>
						</table>

						<p class="text-muted">Data mahasiswa bimbingan <?= is_PA() ? 'lapangan' : 'artikel ilmiah' ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>
