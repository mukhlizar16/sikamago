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
			<div class="col-lg-3 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-8">
								<h4 class="text-c-yellow"><?= jumlah_user(5) ?></h4>
								<h6 class="text-muted m-b-0">Mahasiswa <br><br><br></h6>
							</div>
							<div class="col-4 text-right">
								<i class="feather icon-bar-chart-2 f-28"></i>
							</div>
						</div>
					</div>
					<div class="card-footer bg-c-yellow">
						<div class="row align-items-center">
							<div class="col-9">
								<p class="text-white m-b-0">% change</p>
							</div>
							<div class="col-3 text-right">
								<i class="feather icon-trending-up text-white f-16"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-8">
								<h4 class="text-c-green"><?= jumlah_user(2) ?></h4>
								<h6 class="text-muted m-b-0">Dosen Pembimbing Lapangan</h6>
							</div>
							<div class="col-4 text-right">
								<i class="feather icon-file-text f-28"></i>
							</div>
						</div>
					</div>
					<div class="card-footer bg-c-green">
						<div class="row align-items-center">
							<div class="col-9">
								<p class="text-white m-b-0">% change</p>
							</div>
							<div class="col-3 text-right">
								<i class="feather icon-trending-up text-white f-16"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-8">
								<h4 class="text-c-red"><?= jumlah_user(3) ?></h4>
								<h6 class="text-muted m-b-0">Dosen Pembimbing Artikel Ilmiah</h6>
							</div>
							<div class="col-4 text-right">
								<i class="feather icon-calendar f-28"></i>
							</div>
						</div>
					</div>
					<div class="card-footer bg-c-red">
						<div class="row align-items-center">
							<div class="col-9">
								<p class="text-white m-b-0">% change</p>
							</div>
							<div class="col-3 text-right">
								<i class="feather icon-trending-down text-white f-16"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-8">
								<h4 class="text-c-blue"><?= jumlah_user(4) ?></h4>
								<h6 class="text-muted m-b-0">Supervisor Magang Mitra <br><br></h6>
							</div>
							<div class="col-4 text-right">
								<i class="feather icon-thumbs-down f-28"></i>
							</div>
						</div>
					</div>
					<div class="card-footer bg-c-blue">
						<div class="row align-items-center">
							<div class="col-9">
								<p class="text-white m-b-0">% change</p>
							</div>
							<div class="col-3 text-right">
								<i class="feather icon-trending-down text-white f-16"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- page statustic card end -->

		<!-- Latest Customers start -->
		<div class="row">
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
			</div>
			<div class="col-sm-6 col-lg-6">
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
