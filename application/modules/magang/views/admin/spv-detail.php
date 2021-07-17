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
												<?php if (!empty($spv['foto'])) { ?>
												<img class="img-radius img-fluid wid-100 hei-100"
													 src="<?= config_item('foto') . $spv['foto'] ?>"
													 alt="foto <?= $spv['napan'] ?>">
												<?php }else{ ?>
												<img class="img-radius img-fluid wid-100 hei-100"
													 src="<?= config_item('theme_image') ?>user/avatar-2.jpg"
													 alt="User image">
												<?php } ?>
											</div>
											<!--<div class="overlay">
												<span>Ganti</span>
											</div>-->
										</div>
										<div class="certificated-badge">
											<i class="fas fa-certificate text-c-blue bg-icon"></i>
											<i class="fas fa-check front-icon text-white"></i>
										</div>
									</a>
									<!--<div class="dropdown-menu">
										<button type="button" class="dropdown-item" href="javascript:void(0)"
												id="upload-foto">
											<i class="feather icon-upload-cloud mr-2"></i>
											Upload Foto
										</button>
									</div>-->
								</div>
							</div>
							<h5 class="mb-1"><?= $spv['napan'].' '. $spv['nabel'] ?></h5>
							<p class="mb-2 text-muted"><?= $spv['level'] ?></p>
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
											<input type="text" readonly class="form-control-plaintext" value="<?= $spv['napan'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $spv['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" value="<?= $spv['email'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Password</label>
										<div class="col-sm-9">
											<input type="password" readonly class="form-control-plaintext" value="<?= $spv['password'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Status</label>
										<div class="col-sm-9">
											<span class="badge badge-primary"><?= ($spv['is_approve'] == 1) ? 'Aktif' : 'Tidak Aktif' ?></span>
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse" id="pro-det-edit-2">
								<form method="post" action="<?= site_url('admin/') ?>" id="form-spv-update">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Depan</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="id"
												   value="<?= $spv['id'] ?>" hidden>
											<input type="text" class="form-control" name="napan"
												   value="<?= $spv['napan'] ?>" autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nama Belakang</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nabel"
												   value="<?= $spv['nabel'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Email</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="email"
												   value="<?= $spv['email'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Password</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="password"
												   value="<?= $spv['password'] ?>">
											<small class="text-danger"><em class="text-dark">Note : </em> Hapus terlebih dahulu</small>
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
		</div>
	</div>
</div>
