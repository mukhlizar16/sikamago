`
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

		<!-- START: Main content-->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Bantuan</h5>
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
						<div class="col-md-12">
							<h5 class="mb-3">Pertanyaan yang sering ditanyakan</h5>
							<hr>
							<div class="accordion" id="accordionExample">
								<div class="card mb-0">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0"><a href="javascript:void(0)" data-toggle="collapse"
															data-target="#pertanyaan1" aria-expanded="true"
															aria-controls="pertanyaan1">Kenapa tombol tambah tidak
												muncul ?</a></h5>
									</div>
									<div id="pertanyaan1" class="collapse" aria-labelledby="headingOne"
										 data-parent="#accordionExample">
										<div class="card-body">
											Tombol tambah akan muncul jika belum pernah membuat log harian sama sekali.
											Jika sudah ada, maka ada log harian yang belum disetujui oleh dosen
											pembimbing dan supervisornya.
										</div>
									</div>
								</div>
								<div class="card mb-0">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0"><a href="javascript:void(0)" class="collapsed"
															data-toggle="collapse" data-target="#pertanyaan2"
															aria-expanded="false" aria-controls="pertanyaan2">Tombol
												hapus kenapa tidak berfungsi ?</a></h5>
									</div>
									<div id="pertanyaan2" class="collapse" aria-labelledby="headingTwo"
										 data-parent="#accordionExample">
										<div class="card-body">
											Agar fungsi berjalan dengan baik, gunakanlah web browser google chrome.
											Hapus terlebih dahulu history dan cache nya dengan cara seperti pada panduan
											berikut:
											<br>
											<a href="https://support.google.com/accounts/answer/32050?co=GENIE.Platform%3DAndroid&hl=id&oco=1"
											   target="_blank">Panduan menghapus history</a>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="headingThree">
										<h5 class="mb-0"><a href="javascript:void(0)" class="collapsed"
															data-toggle="collapse" data-target="#pertanyaan3"
															aria-expanded="false" aria-controls="pertanyaan3">Dosen
												pembimbing dan supervisor belum muncul di profil ?</a></h5>
									</div>
									<div id="pertanyaan3" class="collapse" aria-labelledby="headingThree"
										 data-parent="#accordionExample">
										<div class="card-body">
											Agar foto dosen pembimbing dan supervisornya muncul di profil, silahkan
											menghubungi dosen pembimbing dan supervisornya untuk menambahkan Anda
											sebagai mahasiswa bimbingannya melalui menu <b>tambah bimbingan</b>.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>
