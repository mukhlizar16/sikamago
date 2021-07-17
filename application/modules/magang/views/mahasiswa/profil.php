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
													 src="<?= $mhs['foto'] ?>"
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
								<li class="nav-item">
									<a class="nav-link text-reset" id="profile-tab" data-toggle="tab"
									   href="#jenis-magang"
									   role="tab" aria-controls="profile" aria-selected="false"><i
												class="feather icon-user mr-2"></i>Jenis Magang</a>
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
								<form method="post" action="<?= site_url('mahasiswa/update_profil_C1') ?>"
									  id="form-tabus">
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
									<?php if (is_mhs()) : ?>
										<div class="form-group row">
											<label for="nim" class="col-sm-3 col-form-label font-weight-bolder">NIM</label>
											<div class="col-sm-9">
												<input type="text" id="nim" readonly class="form-control-plaintext" name="nim"
													   value="<?= $mhs['nim'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label font-weight-bolder">Nomor
												Handphone</label>
											<div class="col-sm-9">
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $mhs['no_hp'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label font-weight-bolder">Program
												Studi</label>
											<div class="col-sm-9">
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $mhs['prodi'] ?>">
											</div>
										</div>
									<?php endif; ?>
								</form>
							</div>
							<div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
								<form id="form-tabmhs" action="<?= site_url('mahasiswa/update_profil_C2') ?>"
									  method="post">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">NIM</label>
										<div class="col-sm-9">
											<input type="hidden" class="form-control" name="id"
												   value="<?= $mhs['id'] ?>">
											<input type="text" class="form-control" name="nim"
												   value="<?= $mhs['nim'] ?>"
												   autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nomor HP</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" name="no_hp"
												   value="<?= $mhs['no_hp'] ?>"
												   autofocus>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder required">Program
											Studi</label>
										<div class="col-sm-9">
											<select class="form-control" name="prodi">
												<option value="" selected="selected">Pilih Prodi</option>
												<?php foreach ($id_prodi->result_array() as $id) : ?>
													<option value="<?= $id['id'] ?>" <?= $mhs['id_prodi'] == $id['id'] ? 'selected' : '' ?>><?= $id['nama_prodi'] ?></option>
												<?php endforeach; ?>
											</select>
											<small class="text-muted"><span class="text-danger">*</span>Biarkan saja apabila tidak ingin mengganti</small>
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
					<!--Tab magang-->
					<div class="tab-pane fade" id="jenis-magang" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Ruang Lingkup Magang</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right"
										data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false"
										aria-controls="pro-det-edit-1 pro-det-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jenis Magang</label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext"
												   value="<?= $bimbingan['lingkup'] ?>">
										</div>
									</div>
									<?php if ($bimbingan['id_lingkup'] == 2) : ?>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label font-weight-bolder">Bidang
												Magang</label>
											<div class="col-sm-9">
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $bimbingan['bidang_lain'] != null ? $bimbingan['bidang_lain'] : $bimbingan['bidang'] ?>">
											</div>
										</div>
									<?php endif ?>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Lokasi Magang</label>
										<div class="col-sm-9">
											<?php if ($bimbingan['id_lingkup'] == 1) { ?>
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $magang_api['lokasi_id'] != 'x' ? $magang_api['lokasi_id'] : $magang_api['lokasi_lain'] ?>">
											<?php } else { ?>
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $bimbingan['lokasi_lain'] != null ? $bimbingan['lokasi_lain'] : $bimbingan['lokasi'] ?>">
											<?php } ?>
										</div>
									</div>
									<?php if ($bimbingan['id_lingkup'] == 1) : ?>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label font-weight-bolder">Kecamatan</label>
											<div class="col-sm-9">
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $magang_api['kecamatan'] != 'x' ? $magang_api['kecamatan'] : $magang_api['kecamatan_lainnya'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 col-form-label font-weight-bolder">Kelurahan</label>
											<div class="col-sm-9">
												<input type="text" readonly class="form-control-plaintext"
													   value="<?= $magang_api['kelurahan'] != 'x' ? $magang_api['kelurahan'] : $magang_api['kelurahan_lainnya'] ?>">
											</div>
										</div>
									<?php endif; ?>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-2">
								<form method="post" id="form-magang">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Jenis Magang</label>
										<div class="col-sm-9">
											<select required name="jenis" id="kategori" class="form-control">
												<option value="">-Pilih-</option>
												<?php foreach ($magang->result_array() as $m) : ?>
													<option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group row" id="grup-bidang">
										<label class="col-sm-3 col-form-label font-weight-bolder">Bidang Magang</label>
										<div class="col-sm-9">
											<select name="bidang" id="bidang-magang" class="form-control" required>
												<option value="">-Pilih-</option>
											</select>
											<input id="bidang-lainnya" type="text" placeholder="bidang lainnya"
												   class="form-control" name="bidang2" style="display: none">
										</div>
									</div>
									<div class="form-group row" id="grup-kota">
										<label class="col-sm-3 col-form-label font-weight-bolder">Lokasi Magang</label>
										<div class="col-sm-9">
											<select required name="lokasi" id="kota" class="form-control">
												<option value="">-Pilih-</option>
											</select>
											<input id="kota-lainnya" placeholder="lokasi lainnya" type="text"
												   class="form-control" name="kota_lainnya" style="display: none">
										</div>
									</div>
									<div class="form-group row" id="grup-kecamatan">
										<label class="col-sm-3 col-form-label font-weight-bolder">Kecamatan</label>
										<div class="col-sm-9">
											<select name="kecamatan" id="kecamatan" class="form-control" required>
												<option value="">-Pilih-</option>
											</select>
											<input id="kecamatan-lainnya" placeholder="kecamatan lainnya" type="text"
												   class="form-control" name="kecamatan2" style="display: none">
										</div>
									</div>
									<div class="form-group row" id="grup-kelurahan">
										<label class="col-sm-3 col-form-label font-weight-bolder">Kelurahan</label>
										<div class="col-sm-9">
											<select name="kelurahan" id="kelurahan" class="form-control" required>
												<option value="">-Pilih-</option>
											</select>
											<input id="kelurahan-lainnya" placeholder="kelurahan lainnya" type="text"
												   class="form-control" name="kelurahan2" style="display: none">
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
				<div class="card user-card user-card-3 social-hover support-bar1">
					<div class="card-body ">
						<div class="text-center">
							<img class="img-radius img-fluid wid-150 hei-150"
								 src="<?= config_item('magang_foto') . $mentor['foto'] ?>" alt="foto pembimbing">

							<h3 class="mb-1 mt-3 f-w-400"><?= $mentor['napan'] . ' ' . $mentor['nabel'] ?></h3>
							<p class="mb-3 text-muted">Dosen Pembimbing Lapangan</p>
							<ul class="list-unstyled f-20 mb-0 social-top-link">
								<li class="list-item"><a href="javascript:void(0)" class="text-facebook"><i
												class="fab fa-facebook-f"></i></a></li>
								<li class="list-item"><a href="#" class="text-twitter"><i
												class="fab fa-twitter"></i></a></li>
								<li class="list-item"><a href="#" class="text-dribbble"><i class="fab fa-dribbble"></i></a>
								</li>
								<li class="list-item"><a href="#" class="text-pinterest"><i
												class="fab fa-pinterest"></i></a></li>
								<li class="list-item"><a href="#" class="text-youtube"><i
												class="fab fa-youtube"></i></a></li>
								<li class="list-item"><a href="#" class="text-googleplus"><i
												class="fab fa-google-plus-g"></i></a></li>
								<li class="list-item"><a href="#" class="text-linkedin"><i
												class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-footer bg-light">
						<div class="row text-center">
							<div class="col">
								<h6 class="mb-1"><?= $mentor['no_hp'] ?></h6>
								<p class="mb-0">Mobile Phone</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card user-card user-card-3 social-hover support-bar1">
					<div class="card-body ">
						<div class="text-center">
							<img class="img-radius img-fluid wid-150 hei-150" src="<?= config_item('magang_foto') . $par['foto']?>" alt="foto pembimbing artikel">

							<h3 class="mb-1 mt-3 f-w-400"><?= $par['napan'] . ' ' . $par['nabel'] ?></h3>
							<p class="mb-3 text-muted">Dosen Pembimbing Artikel Ilmiah</p>
							<ul class="list-unstyled f-20 mb-0 social-top-link">
								<li class="list-item"><a href="javascript:void(0)" class="text-facebook"><i
												class="fab fa-facebook-f"></i></a></li>
								<li class="list-item"><a href="#" class="text-twitter"><i
												class="fab fa-twitter"></i></a></li>
								<li class="list-item"><a href="#" class="text-dribbble"><i class="fab fa-dribbble"></i></a>
								</li>
								<li class="list-item"><a href="#" class="text-pinterest"><i
												class="fab fa-pinterest"></i></a></li>
								<li class="list-item"><a href="#" class="text-youtube"><i
												class="fab fa-youtube"></i></a></li>
								<li class="list-item"><a href="#" class="text-googleplus"><i
												class="fab fa-google-plus-g"></i></a></li>
								<li class="list-item"><a href="#" class="text-linkedin"><i
												class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-footer bg-light">
						<div class="row text-center">
							<div class="col">
								<h6 class="mb-1"><?= $par['no_hp'] ?></h6>
								<p class="mb-0">Mobile Phone</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card user-card user-card-3 social-hover support-bar1">
					<div class="card-body ">
						<div class="text-center">
							<img class="img-radius img-fluid wid-150 hei-150"
								 src="<?= config_item('magang_foto') . $spv['foto'] ?>" alt="foto pembimbing">

							<h3 class="mb-1 mt-3 f-w-400"><?= $spv['napan'] . ' ' . $spv['nabel'] ?></h3>
							<p class="mb-3 text-muted"><?= $spv['level'] ?></p>
							<ul class="list-unstyled f-20 mb-0 social-top-link">
								<li class="list-item"><a href="javascript:void(0)" class="text-facebook"><i
												class="fab fa-facebook-f"></i></a></li>
								<li class="list-item"><a href="#" class="text-twitter"><i
												class="fab fa-twitter"></i></a></li>
								<li class="list-item"><a href="#" class="text-dribbble"><i class="fab fa-dribbble"></i></a>
								</li>
								<li class="list-item"><a href="#" class="text-pinterest"><i
												class="fab fa-pinterest"></i></a></li>
								<li class="list-item"><a href="#" class="text-youtube"><i
												class="fab fa-youtube"></i></a></li>
								<li class="list-item"><a href="#" class="text-googleplus"><i
												class="fab fa-google-plus-g"></i></a></li>
								<li class="list-item"><a href="#" class="text-linkedin"><i
												class="fab fa-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="card-footer bg-light">
						<div class="row text-center">
							<div class="col">
								<h6 class="mb-1"><?= $spv['no_hp'] ?></h6>
								<p class="mb-0">Mobile Phone</p>
							</div>
						</div>
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
				<form id="form-uploadFoto" action="<?= site_url('mahasiswa/update_foto') ?>" method="post"
					  enctype="multipart/form-data">
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
