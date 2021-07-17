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

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Data Bimbingan</h5>
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
						<div class="mt-3 mb-3">
							<a class="btn btn-sm btn-primary" href="<?= site_url('admin/print') ?>">Print</a>
						</div>
						<table id="tabel-bimbingan"
							   class="table table-striped dataTable nowrap table-responsive-xl">
							<thead>
							<tr>
								<th>Nama Mahasiswa</th>
								<th>Nama Dosen</th>
								<th>Jenis</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($bimbingan->result_array() as $b) :
							$nama_dosen = explode('#', $b['nama_dosen']);
							$nama_jenis = explode('#', $b['nama_jenis']);
							?>
								<tr>
									<td><?=$b['nama_mhs']?></td>
									<td>
										<?php
										foreach ($nama_dosen as $key => $val) : ?>
											<?= $val.'<br>' ?>
										<?php endforeach ?>
									</td>
									<td>
										<?php
										foreach ($nama_jenis as $key => $val_jenis) : ?>
											<?= $val_jenis.'<br>' ?>
										<?php endforeach ?>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- model kedua -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5>Tabel Bimbingan Versi Horizontal</h5>
					</div>
					<div class="card-body">
						<table class="table table-hover table-responsive-xl dataTable nowrap"
							   width="100%"
							   id="tabel-bimbingan2">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nama DPL</th>
								<th>Nama Pembimbing Artikel</th>
								<th>Nama Supervisor</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($bim->result_array() as $b) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $b['nama_mahasiswa'] ?></td>
									<td><?= empty($b['dosen_pa']) ? 'Belum ada' : $b['dosen_pa'] ?></td>
									<td><?= empty($b['dosen_ps']) ? 'Belum ada' : $b['dosen_ps'] ?></td>
									<td><?= empty($b['dosen_spv']) ? 'Belum ada' : $b['dosen_spv'] ?></td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
