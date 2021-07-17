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
								<a href="javascript:void(0)">Dashboard</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->

		<!-- [ Main Content ] start -->
		<!-- page statustic card start -->
		<div class="row">
			<div class="col-xl-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="<?= site_url('magang/admin/show_mahasiswa') ?>">
							<div class="row align-items-center m-l-0">
								<div class="col-auto">
									<i class="fas fa-user-graduate f-36 text-c-purple"></i>
								</div>
								<div class="col-auto">
									<h6 class="text-muted m-b-10">Mahasiswa</h6>
									<h2 class="m-b-0"><?= jumlah_user(5) ?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="<?= site_url('magang/admin/dosen_dpl') ?>">
							<div class="row align-items-center m-l-0">
								<div class="col-auto">
									<i class="fas fa-user-tie f-36 text-c-green"></i>
								</div>
								<div class="col-auto">
									<h6 class="text-muted m-b-10">Dosen DPL</h6>
									<h2 class="m-b-0"><?= jumlah_user(2) ?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="<?= site_url('magang/admin/dosen_par') ?>">
							<div class="row align-items-center m-l-0">
								<div class="col-auto">
									<i class="fas fa-user-tie f-36 text-c-yellow"></i>
								</div>
								<div class="col-auto">
									<h6 class="text-muted m-b-10">Dosen P. Artikel</h6>
									<h2 class="m-b-0"><?= jumlah_user(3) ?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="card">
					<div class="card-body">
						<a href="<?= site_url('magang/admin/supervisor') ?>">
							<div class="row align-items-center m-l-0">
								<div class="col-auto">
									<i class="fas fa-user-tie f-36 text-c-purple"></i>
								</div>
								<div class="col-auto">
									<h6 class="text-muted m-b-10">Supervisor</h6>
									<h2 class="m-b-0"><?= jumlah_user(4) ?></h2>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- page statustic card end -->

		<!-- Latest Customers start -->
		<div class="row">
			<!-- user active login -->
			<div class="col-sm-6 col-lg-6">
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="mb-0">User Aktif</h5>
						<span class="badge badge-light-primary float-right"><?= $user_login->num_rows() ?>+</span>
					</div>
					<div class="card-body">
						<div class="mt-3">
							<table id="table-login-log" class="table table-hover dataTable nowrap table-borderless table-responsive" width="100%">
								<thead>
								<tr>
									<th>Nama</th>
									<th>Status</th>
									<th>Pukul</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($user_login->result_array() as $u) : ?>
									<tr>
										<td style="width: 50%">
											<?= $u['napan'] . ' ' . $u['nabel'] ?>
										</td>
										<td>
											<span class="badge badge-success badge-pill">online</span>
										</td>
										<td style="text-align: justify">
											<?= time_elapsed_string($u['masuk'], true) ?>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- custom card -->
			<div class="col-sm-6 col-lg-6">
				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Data Kesehatan</h5>
						<h2>2789<span class="text-muted m-l-5 f-14">kw</span></h2>
						<div id="power-card-chart1"></div>
						<div class="row">
							<div class="col col-auto">
								<div class="map-area">
									<h6 class="m-0">2876 <span> kw</span></h6>
									<p class="text-muted m-0">month</p>
								</div>
							</div>
							<div class="col col-auto">
								<div class="map-area">
									<h6 class="m-0">234 <span> kw</span></h6>
									<p class="text-muted m-0">Today</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<h5 class="mb-3">Data Perikanan</h5>
						<h2>7.3<span class="text-muted m-l-10 f-14">deg</span></h2>
						<div id="power-card-chart3"></div>
						<div class="row">
							<div class="col col-auto">
								<div class="map-area">
									<h6 class="m-0">4.5 <span> deg</span></h6>
									<p class="text-muted m-0">month</p>
								</div>
							</div>
							<div class="col col-auto">
								<div class="map-area">
									<h6 class="m-0">0.5 <span> deg</span></h6>

									<p class="text-muted m-0">Today</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Latest Customers end -->
		<!-- [ Main Content ] end -->
	</div>
</div>
