<div class="pcoded-main-container">
	<div class="pcoded-content">

		<div class="user-profile user-card mb-4">
			<div class="card-header border-0 p-0 pb-0">
				<div class="cover-img-block">
				</div>
			</div>
			<div class="card-body py-0">
				<div class="user-about-block m-0">
					<div class="row">
						<div class="col-md-4 text-center mt-n5">
							<div class="change-profile text-center">
								<div class="dropdown w-auto d-inline-block">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
									   aria-expanded="false">
										<div class="profile-dp">
											<div class="position-relative d-inline-block">
												<img class="img-radius img-fluid wid-100"
													 src="<?= config_item('theme_image') ?>user/avatar-2.jpg"
													 alt="User image">
											</div>
											<div class="overlay">
												<span>Ganti</span>
											</div>
										</div>
										<div class="certificated-badge">
											<i class="fas fa-certificate text-c-blue bg-icon"></i>
											<i class="fas fa-check front-icon text-white"></i>
										</div>
									</a>
									<div class="dropdown-menu">
										<button type="button" class="dropdown-item" href="javascript:void(0)"
												id="upload-foto">
											<i class="feather icon-upload-cloud mr-2"></i>
											Upload Foto
										</button>
									</div>
								</div>
							</div>
							<h5 class="mb-1"><?= $_SESSION['napan'] . ' ' . $_SESSION['nabel'] ?></h5>
							<p class="mb-2 text-muted"><?= status() ?></p>
						</div>
						<div class="col-md-8 mt-md-4">
							<ul class="nav nav-tabs profile-tabs nav-fill" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link text-reset active" id="home-tab" data-toggle="tab"
									   href="#personal"
									   role="tab" aria-controls="home" aria-selected="true"><i
												class="feather icon-home mr-2"></i>Personal</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="tab-content" id="myTabContent">
					<!--Tab personal profil-->
					<div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="home-tab">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Personal details</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right"
										data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false"
										aria-controls="pro-det-edit-1 pro-det-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Depan</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $admin['napan'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $admin['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $admin['email'] ?>">
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse" id="pro-det-edit-2">
								<form method="post" action="<?= site_url('mahasiswa/update_profil_C1') ?>" id="form-tabus">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Depan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id"
												   value="<?= $admin['id'] ?>" hidden>
											<input type="text" class="form-control" name="napan"
												   value="<?= $admin['napan'] ?>" autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nabel"
												   value="<?= $admin['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="email"
												   value="<?= $admin['email'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<!--<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">other Information</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right"
										data-toggle="collapse" data-target=".pro-wrk-edit" aria-expanded="false"
										aria-controls="pro-wrk-edit-1 pro-wrk-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse show" id="pro-wrk-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Occupation</label>
										<div class="col-sm-9">
											Designer
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Skills</label>
										<div class="col-sm-9">
											C#, Javascript, Scss
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jobs</label>
										<div class="col-sm-9">
											Phoenixcoded
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse " id="pro-wrk-edit-2">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Occupation</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Full Name"
												   value="Designer">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Ema"
												   value="Demo@domain.com">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jobs</label>
										<div class="col-sm-9">
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-1"
													   checked>
												<label class="custom-control-label" for="pro-wrk-chk-1">C#</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-2"
													   checked>
												<label class="custom-control-label"
													   for="pro-wrk-chk-2">Javascript</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-3"
													   checked>
												<label class="custom-control-label" for="pro-wrk-chk-3">Scss</label>
											</div>
											<div class="custom-control custom-checkbox form-check d-inline-block mr-2">
												<input type="checkbox" class="custom-control-input" id="pro-wrk-chk-4">
												<label class="custom-control-label" for="pro-wrk-chk-4">Html</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal foto-->
<div id="modal-foto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-fotoLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-foto-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center mt-5" id="keterangan_modal-foto"></div>
				<form id="form-uploadFoto" action="<?= site_url('mahasiswa/update_foto') ?>" method="post">
					<div class="form-group">
						<label for="foto">Silahkan pilih foto</label>
						<input type="file" id="foto" class="dropify" name="foto">
					</div>
					<small>Gunakan foto dengan ukuran 100x100 piksel, agar terlihat lebih baik.</small>
					<div class="modal-footer">
						<button id="btn-close-modalFoto" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modalFoto" type="submit" class="btn btn-sm btn-primary">Upload</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modalFoto"
								style="display: none">
							<span class="spinner-border spinner-border-sm" role="status"></span>
							Loading...
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
