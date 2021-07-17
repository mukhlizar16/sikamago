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
												<img class="img-radius img-fluid wid-100 hei-100"
													 src="<?= $spv['foto'] ?>"
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
			<div class="order-md-2 col-md-8">
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
											<input type="text" readonly class="form-control-plaintext" value="<?= $user['napan'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $user['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $user['email'] ?>">
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse" id="pro-det-edit-2">
								<form method="post" action="<?= site_url('magang/supervisor/update_profil_C1') ?>"
									  id="form-spv-tabus">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Depan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id"
												   value="<?= $user['id'] ?>" hidden>
											<input type="text" class="form-control" name="napan"
												   value="<?= $user['napan'] ?>" autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nabel"
												   value="<?= $user['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="email"
												   value="<?= $user['email'] ?>">
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
						<!-- Edit password card -->
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Data Password</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right"
										data-toggle="collapse" data-target=".pro-pass-edit" aria-expanded="false"
										aria-controls="pro-pass-edit-1 pro-pass-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-pass-edit collapse show" id="pro-pass-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Password</label>
										<div class="col-sm-9">
											<input type="password" readonly class="form-control-plaintext"
												   value="<?= $user['password'] ?>">
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-pass-edit collapse" id="pro-pass-edit-2">
								<form id="form-spv-pass">
									<div class="form-group row">
										<label for="new_pass" class="col-sm-3 col-form-label font-weight-bolder">Password
											Baru</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id"
												   value="<?= $user['id'] ?>" hidden>
											<div class="input-group">
												<input type="password" id="new_pass" class="form-control"
													   name="new_pass" autofocus>
												<div class="input-group-prepend">
													<div class="input-group-text">
														<input type="checkbox" id="show-pass">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label for="new_confirm_pass"
											   class="col-sm-3 col-form-label font-weight-bolder">Konfirmasi Password
											Baru</label>
										<div class="col-sm-9">
											<input type="password" id="new_confirm_pass" class="form-control"
												   name="new_confirm_pass">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" id="btn-pass" class="btn btn-primary">Simpan</button>
											<div class="spinner-border text-danger" role="status" style="display: none">
												<span class="sr-only">Loading...</span>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- end edit password card -->
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Contact Information</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right"
										data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false"
										aria-controls="pro-dont-edit-1 pro-dont-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nomor
											Handphone</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext"
												   value="<?= $spv['no_hp'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Lembaga</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext"
												   value="<?= $spv['nama_lembaga'] ?>">
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
								<form id="form-tab-spv" action="<?= site_url('magang/supervisor/update_profil_C2') ?>"
									  method="post">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nomor HP</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id"
												   value="<?= $spv['id'] ?>" hidden>
											<input type="number" class="form-control" name="no_hp"
												   value="<?= $spv['no_hp'] ?>"
												   autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Lembaga</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nama_lembaga"
												   value="<?= $spv['nama_lembaga'] ?>">
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
					</div>
				</div>
			</div>
			<div class="col-md-4 order-1">
				<div class="card">
					<div class="card-header d-flex align-items-center justify-content-between">
						<h5 class="mb-0">Mahasiswa Bimbingan</h5>
						<span class="badge badge-light-primary float-right"><?= $bimbingan->num_rows(); ?>+</span>
					</div>
					<div class="card-body">
						<ul class="list-inline">
							<?php foreach ($bimbingan->result_array() as $m) : ?>
								<li class="list-inline-item">
									<a href="<?= site_url('supervisor/detail_mahasiswa') ?>/<?= $m['idm'] ?>">
										<img src="<?= base_url() ?>assets/userfiles/<?= $m['foto'] ?>" alt="user image" class="img-radius mb-2 wid-50" data-toggle="tooltip" title="" data-original-title="<?= $m['napan'] . ' ' . $m['nabel'] ?>">
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
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
				<div class="text-center mb-4" id="keterangan_modal-foto"></div>
				<form id="form-uploadDosenFoto" action="<?= site_url('magang/supervisor/update_foto') ?>" method="post">
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
