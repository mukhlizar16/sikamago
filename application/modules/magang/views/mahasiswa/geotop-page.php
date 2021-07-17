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
		<div class="bt-wizard" id="verticalwizard">
			<div class="row align-items-stratched mb-4">
				<div class="col-12 col-md-auto col-sm-12">
					<div class="card mb-0">  <!-- aslinya menggunakan h-100 -->
						<div class="card-body">
							<ul class="nav flex-column nav-pills"
								role="tablist"
								aria-orientation="vertical">
								<li class="nav-item">
									<a href="#v-tabs-t-tab1"
									   class="nav-link active"
									   data-toggle="tab">
										Identitas Kecamatan
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab2"
									   class="nav-link"
									   data-toggle="tab">
										Identitas Desa
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab3"
									   class="nav-link"
									   data-toggle="tab">
										Identitas GeoTop
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab4"
									   class="nav-link"
									   data-toggle="tab">
										Identitas Demografi
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab5"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Sosial-Kesehatan
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab6"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Sosial-Pendidikan
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab7"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Sosial
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab8"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Sosial-Pemukiman
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab9"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Ekonomi
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab10"
									   class="nav-link"
									   data-toggle="tab">
										Dimensi Ekologi
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab11"
									   class="nav-link"
									   data-toggle="tab">
										Aktivitas Desa
									</a>
								</li>
								<li class="nav-item">
									<a href="#v-tabs-t-tab12"
									   class="nav-link"
									   data-toggle="tab">
										Pendapatan Desa
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col tabku">
					<div class="tab-content card mb-0" id="v-pills-tabContent">
						<div class="tab-pane card-body active show" id="v-tabs-t-tab1">
							<form id="identitas-kecamatan-form" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="nama_kecamatan"
										   class="col-md-5 col-form-label required">Nama Kecamatan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kecamatan"
											   id="nama_kecamatan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_informan" class="required col-md-5 col-form-label">Nama
										Informan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_informan"
											   id="nama_informan"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jabatan" class="col-md-5 col-form-label required">Jabatan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jabatan"
											   id="jabatan"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_hp" class="col-md-5 col-form-label required">Nomor HP</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_hp" id="no_hp"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir" class="col-md-5 col-form-label required">Tanggal
										Lahir</label>
									<div class="col-md-7">
										<input type="date"
											   class="form-control"
											   name="tgl_lahir"
											   id="tgl_lahir"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pria" class="col-md-5 col-form-label required">Jenis Kelamin</label>
									<div class="col-md-7">
										<div class="custom-control custom-radio">
											<input class="custom-control-input" name="jk" value="1" type="radio"
												   id="pria" required>
											<label class="custom-control-label" for="pria">Laki-laki</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" name="jk" value="2" type="radio"
												   id="wanita">
											<label class="custom-control-label" for="wanita">Perempuan</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="lu" class="col-md-5 col-form-label required">Latitude (LU/LS))</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lu" id="lu"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bujur" class="col-md-5 col-form-label required">Longitude
										(BB/BT))</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bujur" id="bujur"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="alamat" class="col-md-5 col-form-label required">Alamat Kantor
										Kecamatan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="alamat" id="alamat"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="peta" class="col-md-5 col-form-label required">Batas Kecamatan dalam
										Bentuk
										Peta</label>
									<div class="col-md-7">
										<input type="file"
											   class="form-control"
											   name="peta"
											   id="peta" required>
										<small class="text-muted">file dalam bentuk jpg, jpeg, gif, png.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_camat" class="col-md-5 col-form-label required">
										Nama Camat
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_camat"
											   id="nama_camat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jk_c" class="col-md-5 col-form-label required">Jenis Kelamin
										Camat</label>
									<div class="col-md-7">
										<div class="custom-control custom-radio">
											<input class="custom-control-input" name="jk_c" value="1" type="radio"
												   id="jk_c" required>
											<label class="custom-control-label" for="jk_c">Laki-laki</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input" name="jk_c" value="2" type="radio"
												   id="wanita_c">
											<label class="custom-control-label" for="wanita_c">Perempuan</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_hp_camat" class="col-md-5 col-form-label required">
										Nomor HP Camat
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_hp_camat"
											   id="no_hp_camat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_telp_kantor_camat" class="col-md-5 col-form-label required">
										Nomor telp kantor camat
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_telp_kantor_camat"
											   id="no_telp_kantor_camat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="email_kec" class="col-md-5 col-form-label required">
										Alamat email kecamatan
									</label>
									<div class="col-md-7">
										<input type="email"
											   class="form-control"
											   name="email_kec"
											   id="email_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="fb_kec" class="col-md-5 col-form-label required">
										<i class="feather icon-facebook mr-2"></i> Akun Facebook Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="fb_kec"
											   id="fb_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="insta_kec" class="col-md-5 col-form-label required">
										<i class="feather icon-instagram mr-2"></i> Akun Instagram Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="insta_kec"
											   id="insta_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="twitter_kec" class="col-md-5 col-form-label required">
										<i class="feather icon-twitter mr-2"></i> Akun Twitter Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="twitter_kec"
											   id="twitter_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="web_kec" class="col-md-5 col-form-label required">
										<i class="feather icon-globe mr-2"></i> Alamat Web Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="web_kec"
											   id="web_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pendidikan_camat" class="col-md-5 col-form-label required">
										Pendidikan terakhir camat
									</label>
									<div class="col-md-7">
										<select name="pendidikan_camat"
												id="pendidikan_camat"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-ikec" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($ikec == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-ikec">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<strong style="color: red"><?= $ikec != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></strong>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab2">
							<form id="identitas-desa-form" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="nm_kec"
										   class="col-md-5 col-form-label required">Nama Kecamatan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec"
											   id="nm_kec" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa"
										   class="col-md-5 col-form-label required">Nama Desa</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa"
											   id="nm_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_ides"
										   class="col-md-5 col-form-label required">Tahun</label>
									<div class="col-md-7">
										<input type="number"
											   min="2000" max="2099"
											   class="form-control"
											   name="thn_ides"
											   id="thn_ides" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_informan_ides" class="required col-md-5 col-form-label">Nama
										Informan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_informan_ides"
											   id="nama_informan_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jabatan_ides" class="col-md-5 col-form-label required">Jabatan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jabatan_ides"
											   id="jabatan_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_hp_ides" class="col-md-5 col-form-label required">Nomor HP</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_hp_ides" id="no_hp_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tgl_lahir_ides" class="col-md-5 col-form-label required">Tanggal
										Lahir</label>
									<div class="col-md-7">
										<input type="date"
											   class="form-control"
											   name="tgl_lahir_ides"
											   id="tgl_lahir_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jk_inroman_ides" class="col-md-5 col-form-label required">Jenis
										Kelamin</label>
									<div class="col-md-7">
										<div class="custom-control custom-radio">
											<input class="custom-control-input"
												   name="jk_ides" value="1" type="radio"
												   id="jk_inroman_ides" required>
											<label class="custom-control-label" for="pria_informan">Laki-laki</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input"
												   name="jk_ides" value="2" type="radio"
												   id="wanita_informan">
											<label class="custom-control-label" for="wanita_informan">Perempuan</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="lu_ides" class="col-md-5 col-form-label required">Latitude
										(LU/LS))</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lu_ides" id="lu_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bujur_ides" class="col-md-5 col-form-label required">Longitude
										(BB/BT))</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bujur_ides" id="bujur_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="alamat_ides" class="col-md-5 col-form-label required">Alamat Kantor
										Desa</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="alamat_ides" id="alamat_ides"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kan_des" class="col-md-5 col-form-label required">Terdapat Kantor
										Desa</label>
									<div class="col-md-7">
										<select name="kan_des" id="kan_des" class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="peta_desa" class="col-md-5 col-form-label required">Batas Desa dalam
										Bentuk Peta</label>
									<div class="col-md-7">
										<input type="file"
											   class="form-control"
											   name="peta_desa"
											   id="peta_desa" required>
										<small class="text-muted">file dalam bentuk jpg, jpeg, gif, png.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_kades" class="col-md-5 col-form-label required">
										Nama Plt/Kepala Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_kades"
											   id="nama_kades" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jk_kades" class="col-md-5 col-form-label required">Jenis Kelamin
										Plt/Kepala Desa</label>
									<div class="col-md-7">
										<div class="custom-control custom-radio">
											<input class="custom-control-input"
												   name="jk_kades" value="1" type="radio"
												   id="jk_kades" required>
											<label class="custom-control-label" for="pria_ides">Laki-laki</label>
										</div>
										<div class="custom-control custom-radio">
											<input class="custom-control-input"
												   name="jk_kades" value="2" type="radio"
												   id="wanita_ides">
											<label class="custom-control-label" for="wanita_ides">Perempuan</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_hp_kades" class="col-md-5 col-form-label required">
										Nomor HP Kepala Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_hp_kades"
											   id="no_hp_kades" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="no_telp_kantor_desa" class="col-md-5 col-form-label required">
										Nomor telp Kantor Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="no_telp_kantor_desa"
											   id="no_telp_kantor_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="email_desa" class="col-md-5 col-form-label required">
										Alamat email desa
									</label>
									<div class="col-md-7">
										<input type="email"
											   class="form-control"
											   name="email_desa"
											   id="email_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="fb_desa" class="col-md-5 col-form-label required">
										<i class="feather icon-facebook mr-2"></i> Akun Facebook Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="fb_desa"
											   id="fb_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="insta_desa" class="col-md-5 col-form-label required">
										<i class="feather icon-instagram mr-2"></i> Akun Instagram Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="insta_desa"
											   id="insta_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="twitter_desa" class="col-md-5 col-form-label required">
										<i class="feather icon-twitter mr-2"></i> Akun Twitter Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="twitter_desa"
											   id="twitter_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="web_desa" class="col-md-5 col-form-label required">
										<i class="feather icon-globe mr-2"></i> Alamat Web Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="web_desa"
											   id="web_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pendidikan_kades" class="col-md-5 col-form-label required">
										Pendidikan terakhir Kepala Desa
									</label>
									<div class="col-md-7">
										<select name="pendidikan_kades"
												id="pendidikan_kades"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="masa_jabatan" class="col-md-5 col-form-label required">
										Lama masa jabatan sebagai Plt/Kepala Desa
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number"
												   class="form-control"
												   name="masa_jabatan"
												   min="0"
												   id="masa_jabatan" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Tahun</span>
											</div>
										</div>
										<small class="text-muted">Hanya berupa angka saja</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pendidikan_sekdes" class="col-md-5 col-form-label required">
										Pendidikan terakhir Sekretaris Desa
									</label>
									<div class="col-md-7">
										<select name="pendidikan_sekdes"
												id="pendidikan_sekdes"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="masa_jabatan_sekdes" class="col-md-5 col-form-label required">
										Lama masa jabatan sebagai Plt/Sekretaris Desa
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number"
												   min="0"
												   class="form-control"
												   name="masa_jabatan_sekdes"
												   id="masa_jabatan_sekdes" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Tahun</span>
											</div>
										</div>
										<small class="text-muted">Hanya berupa angka saja</small>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-ides" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($ides == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-ides">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $ides != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab3">
							<form id="form-identitas-geotop" method="post">
								<div class="form-group row">
									<label for="nm_kec_igeo" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_igeo"
											   id="nm_kec_igeo" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_igeo" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_igeo"
											   id="nm_desa_igeo" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_igeo" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="2000" max="2099"
											   class="form-control"
											   name="thn_igeo"
											   id="thn_igeo" required>
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Data Geografi
									</h5>
								</div>
								<div class="form-group row">
									<label for="luas_wilayah" class="col-md-5 col-form-label required">
										Luas Wilayah Desa
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="luas_wilayah"
											   id="luas_wilayah" required>
										<small class="text-muted">Hanya angka saja dalam satuan (km<sup>2</sup>)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="luas_hutan" class="col-md-5 col-form-label required">
										Luas Hutan Desa
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="luas_hutan"
											   id="luas_hutan" required>
										<small class="text-muted">Hanya angka saja dalam satuan (km<sup>2</sup>)</small>
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Data Topografi
									</h5>
								</div>
								<div class="form-group row">
									<label for="jenis_wilayah" class="col-md-5 col-form-label required">
										Jenis Wilayah Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jenis_wilayah"
											   id="jenis_wilayah" required>
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Data Hasil Pertanian
									</h5>
								</div>
								<div class="form-group row">
									<label for="luas_lahan_pertanian" class="col-md-5 col-form-label required">
										Luas lahan pertanian
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="luas_lahan_pertanian"
											   id="luas_lahan_pertanian" required>
										<small class="text-muted">Hanya angka saja dalam satuan (km<sup>2</sup>)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jenis" class="col-md-5 col-form-label required">
										Jenis
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jenis"
											   id="jenis" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_per_hari" class="col-md-5 col-form-label required">
										Jumlah per hari
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="jlh_per_hari"
											   id="jlh_per_hari" required>
										<small class="text-muted">Hanya angka saja dalam satuan (kg)</small>
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Data Hasil Perikanan
									</h5>
								</div>
								<div class="form-group row">
									<label for="luas_perairan" class="col-md-5 col-form-label required">
										Luas perairan
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="luas_perairan"
											   id="luas_perairan" required>
										<small class="text-muted">Hanya angka saja dalam satuan
											(mil<sup>2</sup>)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jenis_perairan" class="col-md-5 col-form-label required">
										Jenis
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jenis_perairan"
											   id="jenis_perairan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_per_hari_perairan" class="col-md-5 col-form-label required">
										Jumlah per hari
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="jlh_per_hari_perairan"
											   id="jlh_per_hari_perairan" required>
										<small class="text-muted">Hanya angka saja dalam satuan (kg)</small>
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Data Hasil Perkebunan
									</h5>
								</div>
								<div class="form-group row">
									<label for="luas_perkebunan" class="col-md-5 col-form-label required">
										Luas perkebunan
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="luas_perkebunan"
											   id="luas_perkebunan" required>
										<small class="text-muted">Hanya angka saja dalam satuan (km<sup>2</sup>)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jenis_perkebunan" class="col-md-5 col-form-label required">
										Jenis
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jenis_perkebunan"
											   id="jenis_perkebunan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_per_hari_perkebunan" class="col-md-5 col-form-label required">
										Jumlah per hari
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="jlh_per_hari_perkebunan"
											   id="jlh_per_hari_perkebunan" required>
										<small class="text-muted">Hanya angka saja dalam satuan (kg)</small>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-igeo" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($igeo == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-igeo">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $igeo != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab4">
							<form id="form-identitas-demografi">
								<div class="form-group row">
									<label for="nm_kec_idem" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_idem"
											   id="nm_kec_idem" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_idem" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_idem"
											   id="nm_desa_idem" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_idem" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="tahun_idem"
											   id="tahun_idem" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Penduduk</h5>
								</div>
								<div class="form-group row">
									<label for="tot_penduduk" class="col-md-5 col-form-label required">
										Jumlah total penduduk
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tot_penduduk"
											   id="tot_penduduk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_lk" class="col-md-5 col-form-label required">
										Jumlah penduduk laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_lk"
											   id="total_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_pr" class="col-md-5 col-form-label required">
										Jumlah penduduk perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_pr"
											   id="total_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pendatang" class="col-md-5 col-form-label required">
										Jumlah penduduk pendatang s/d tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pendatang"
											   id="pendatang" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pend_pergi" class="col-md-5 col-form-label required">
										Jumlah penduduk penduduk pergi s/d tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pend_pergi"
											   id="pend_pergi" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Kepala Keluarga</h5>
								</div>
								<div class="form-group row">
									<label for="total_kk" class="col-md-5 col-form-label required">
										Jumlah total kepala keluarga
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_kk"
											   id="total_kk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_kkp" class="col-md-5 col-form-label required">
										Jumlah total kepala keluarga perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_kkp"
											   id="total_kkp" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_kkmis" class="col-md-5 col-form-label required">
										Jumlah keluarga miskin
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_kkmis"
											   id="total_kkmis" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Jumlah Penduduk Berdasarkan Struktur Usia</h5>
								</div>
								<div class="form-group row">
									<label for="total_by" class="col-md-5 col-form-label required">
										Jumlah bayi yang berusia <i class="feather icon-chevron-left"></i> 1 tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_by"
											   id="total_by" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_balita" class="col-md-5 col-form-label required">
										Jumlah balita yang berusia 1-4 tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_balita"
											   id="total_balita" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_rmj" class="col-md-5 col-form-label required">
										Jumlah remaja yang berusia 5-14 tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_rmj"
											   id="total_rmj" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_dws" class="col-md-5 col-form-label required">
										Jumlah orang dewasa yang berusia 15-39 tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_dws"
											   id="total_dws" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_dws2" class="col-md-5 col-form-label required">
										Jumlah orang dewasa yang berusia 40-64 tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_dws2"
											   id="total_dws2" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="total_lansia" class="col-md-5 col-form-label required">
										Jumlah lansia yang berusia 65 tahun ke atas
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="total_lansia"
											   id="total_lansia" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Jumlah Penduduk Berdasarkan Pekerjaan</h5>
								</div>
								<div class="form-group row">
									<label for="petani_lk" class="col-md-5 col-form-label required">
										Jumlah petani laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="petani_lk"
											   id="petani_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="petani_pr" class="col-md-5 col-form-label required">
										Jumlah petani perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="petani_pr"
											   id="petani_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nelayan_lk" class="col-md-5 col-form-label required">
										Jumlah nelayan laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="nelayan_lk"
											   id="nelayan_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nelayan_pr" class="col-md-5 col-form-label required">
										Jumlah nelayan perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="nelayan_pr"
											   id="nelayan_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="buruh_tani_lk" class="col-md-5 col-form-label required">
										Jumlah buruh tani/buruh nelayan laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="buruh_tani_lk"
											   id="buruh_tani_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="buruh_tani_pr" class="col-md-5 col-form-label required">
										Jumlah buruh tani/buruh nelayan perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="buruh_tani_pr"
											   id="buruh_tani_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="buruh_pabrik_lk" class="col-md-5 col-form-label required">
										Jumlah buruh pabrik laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="buruh_pabrik_lk"
											   id="buruh_pabrik_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="buruh_pabrik_pr" class="col-md-5 col-form-label required">
										Jumlah buruh pabrik perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="buruh_pabrik_pr"
											   id="buruh_pabrik_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pns_lk" class="col-md-5 col-form-label required">
										Jumlah PNS laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pns_lk"
											   id="pns_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pns_pr" class="col-md-5 col-form-label required">
										Jumlah PNS perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pns_pr"
											   id="pns_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="swasta_lk" class="col-md-5 col-form-label required">
										Jumlah pegawai swasta laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="swasta_lk"
											   id="swasta_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="swasta_pr" class="col-md-5 col-form-label required">
										Jumlah pegawai swasta perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="swasta_pr"
											   id="swasta_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="wiraswasta_lk" class="col-md-5 col-form-label required">
										Jumlah wiraswasta/pedagang laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="wiraswasta_lk"
											   id="wiraswasta_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="wiraswasta_pr" class="col-md-5 col-form-label required">
										Jumlah wiraswasta/pedagang perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="wiraswasta_pr"
											   id="wiraswasta_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tni_lk" class="col-md-5 col-form-label required">
										Jumlah TNI laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tni_lk"
											   id="tni_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tni_pr" class="col-md-5 col-form-label required">
										Jumlah TNI perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tni_pr"
											   id="tni_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="polri_lk" class="col-md-5 col-form-label required">
										Jumlah POLRI laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="polri_lk"
											   id="polri_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="polri_pr" class="col-md-5 col-form-label required">
										Jumlah POLRI perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="polri_pr"
											   id="polri_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="dokter_lk" class="col-md-5 col-form-label required">
										Jumlah dokter (swasta/honorer) laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="dokter_lk"
											   id="dokter_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="dokter_pr" class="col-md-5 col-form-label required">
										Jumlah dokter (swasta/honorer) perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="dokter_pr"
											   id="dokter_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bidan_lk" class="col-md-5 col-form-label required">
										Jumlah bidan (swasta/honorer) laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bidan_lk"
											   id="bidan_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bidan_pr" class="col-md-5 col-form-label required">
										Jumlah bidan (swasta/honorer) perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bidan_pr"
											   id="bidan_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perawat_lk" class="col-md-5 col-form-label required">
										Jumlah perawat (swasta/honorer) laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="perawat_lk"
											   id="perawat_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perawat_pr" class="col-md-5 col-form-label required">
										Jumlah perawat (swasta/honorer) perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="perawat_pr"
											   id="perawat_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kerja_lain_lk" class="col-md-5 col-form-label required">
										Jumlah pekerja lain (swasta/honorer) laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kerja_lain_lk"
											   id="kerja_lain_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kerja_lain_pr" class="col-md-5 col-form-label required">
										Jumlah pekerja lain (swasta/honorer) perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kerja_lain_pr"
											   id="kerja_lain_pr" required>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-idem" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($idem == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-idem">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $idem != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab5">
							<form id="form-dimsos-kesehatan">
								<div class="form-group row">
									<label for="nm_kec_dk" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_dk"
											   id="nm_kec_dk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_dk" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_dk"
											   id="nm_desa_dk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_dk" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="tahun_dk"
											   id="tahun_dk" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Ketersediaan Sarana Kesehatan</h5>
								</div>
								<div class="form-group row">
									<label for="sarkes_terdekat" class="col-md-5 col-form-label required">
										Sarana kesehatan terdekat
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="sarkes_terdekat"
											   id="sarkes_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_sarkes" class="col-md-5 col-form-label required">
										Jarak ke sarana kesehatan terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_sarkes"
											   id="jarak_sarkes" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_sarkes" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke sarana kesehatan terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_sarkes"
												   id="menit_sarkes" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Rumah Sakit</h5>
								</div>
								<div class="form-group row">
									<label for="rs_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana rumah sakit di desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="rs_terdekat"
											   id="rs_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_rs" class="col-md-5 col-form-label required">
										Jarak ke rumah sakit terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_rs"
											   id="jarak_rs" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_rs" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke rumah sakit terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_rs"
												   id="menit_rs" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Rumah Sakit Bersalin</h5>
								</div>
								<div class="form-group row">
									<label for="rs_bersalin_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana rumah sakit bersalin di desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="rs_bersalin_terdekat"
											   id="rs_bersalin_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_rs_bersalin" class="col-md-5 col-form-label required">
										Jarak ke rumah sakit bersalin terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_rs_bersalin"
											   id="jarak_rs_bersalin" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_rs_bersalin" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke rumah sakit bersalin terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_rs_bersalin"
												   id="menit_rs_bersalin" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Puskesmas Rawat Inap</h5>
								</div>
								<div class="form-group row">
									<label for="puskes_inap_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana puskesmas dengan rawat inap di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="puskes_inap_terdekat"
											   id="puskes_inap_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_puskes_inap" class="col-md-5 col-form-label required">
										Jarak ke puskesmas dengan rawat inap terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_puskes_inap"
											   id="jarak_puskes_inap" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_puskes_inap" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke puskesmas dengan rawat inap terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_puskes_inap"
												   id="menit_puskes_inap" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="puskes_non_inap" class="col-md-5 col-form-label required">
										Ketersediaan sarana puskesmas non inap di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="puskes_non_inap"
											   id="puskes_non_inap" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_puskes_non_inap" class="col-md-5 col-form-label required">
										Jarak ke puskesmas dengan rawat inap terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_puskes_non_inap"
											   id="jarak_puskes_non_inap" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_puskes_non_inap" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke puskesmas dengan rawat inap terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_puskes_non_inap"
												   id="menit_puskes_non_inap" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Puskesmas Pembantu</h5>
								</div>
								<div class="form-group row">
									<label for="pustu_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana puskesmas pembantu di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pustu_terdekat"
											   id="pustu_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_pustu" class="col-md-5 col-form-label required">
										Jarak ke puskesmas pembantu terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_pustu"
											   id="jarak_pustu" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_pustu" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke puskesmas pembantu terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_pustu"
												   id="menit_pustu" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Rumah Bersalin</h5>
								</div>
								<div class="form-group row">
									<label for="rb_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana rumah bersalin di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="rb_terdekat"
											   id="rb_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_rb" class="col-md-5 col-form-label required">
										Jarak ke rumah bersalin terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_rb"
											   id="jarak_rb" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_rb" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke rumah bersalin terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_rb"
												   id="menit_rb" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Poliklinik / Balai Pengobatan</h5>
								</div>
								<div class="form-group row">
									<label for="klinik_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana poliklinik/balai pengobatan di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="klinik_terdekat"
											   id="klinik_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_klinik" class="col-md-5 col-form-label required">
										Jarak ke poliklinik/balai pengobatan terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_klinik"
											   id="jarak_klinik" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_klinik" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke poliklinik/balai pengobatan terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_klinik"
												   id="menit_klinik" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Tempat Praktek Dokter</h5>
								</div>
								<div class="form-group row">
									<label for="pd_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana tempat praktek dokter di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pd_terdekat"
											   id="pd_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_pd" class="col-md-5 col-form-label required">
										Jarak ke tempat praktek dokter terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_pd"
											   id="jarak_pd" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_pd" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke tempat praktek dokter terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_pd"
												   id="menit_pd" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Tempat Praktek Bidan</h5>
								</div>
								<div class="form-group row">
									<label for="pb_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana tempat praktek bidan di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pb_terdekat"
											   id="pb_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_pb" class="col-md-5 col-form-label required">
										Jarak ke tempat praktek bidan terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_pb"
											   id="jarak_pb" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_pb" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke tempat praktek bidan terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_pb"
												   id="menit_pb" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Apotek</h5>
								</div>
								<div class="form-group row">
									<label for="apotek_terdekat" class="col-md-5 col-form-label required">
										Ketersediaan sarana apotek di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="apotek_terdekat"
											   id="apotek_terdekat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_apotek" class="col-md-5 col-form-label required">
										Jarak ke apotek terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_apotek"
											   id="jarak_apotek" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_apotek" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke apotek terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_apotek"
												   id="menit_apotek" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Ketersediaan Tenaga Kesehatan Bidan</h5>
								</div>
								<div class="form-group row">
									<label for="bdd" class="col-md-5 col-form-label required">
										Ketersediaan tenaga kesehatan bidan Desa (BDD)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bdd"
											   id="bdd" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_bdd" class="col-md-5 col-form-label required">
										Jumlah bidan desa (BDD) di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_bdd"
											   id="jlh_bdd" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Ketersediaan Tenaga Kesehatan Dokter</h5>
								</div>
								<div class="form-group row">
									<label for="dokter" class="col-md-5 col-form-label required">
										Ketersediaan tenaga kesehatan dokter
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="dokter"
											   id="dokter" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_dokter" class="col-md-5 col-form-label required">
										Jumlah dokter di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_dokter"
											   id="jlh_dokter" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Ketersediaan Tenaga Kesehatan Lainnya</h5>
								</div>
								<div class="form-group row">
									<label for="nakes" class="col-md-5 col-form-label required">
										Ketersediaan tenaga kesehatan lainnya selain dokter dan bidan di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nakes"
											   id="nakes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_nakes" class="col-md-5 col-form-label required">
										Jumlah tenaga kesehatan lainnya selain dokter dan bidan di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_nakes"
											   id="jlh_nakes" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses ke Poskesdes / Polindes dan Posyandu</h5>
								</div>
								<div class="form-group row">
									<label for="poskeslindes" class="col-md-5 col-form-label required">
										Ketersediaan sarana poskesdes/polindes
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="poskeslindes"
											   id="poskeslindes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_poskeslindes" class="col-md-5 col-form-label required">
										Jarak poskesdes/polindes terdekat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jarak_poskeslindes"
											   id="jarak_poskeslindes" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="menit_poskeslindes" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke poskesdes/polindes terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="menit_poskeslindes"
												   id="menit_poskeslindes" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="fungsi_poskeslindes" class="col-md-5 col-form-label required">
										Fungsi poskesdes/polindes
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="fungsi_poskeslindes"
											   id="fungsi_poskeslindes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="rmh_singgah" class="col-md-5 col-form-label required">
										Ketersediaan rumah singgah/rumah tunggu untuk ibu hamil
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="rmh_singgah"
											   id="rmh_singgah" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_posyandu" class="col-md-5 col-form-label required">
										Jumlah posyandu di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_posyandu"
											   id="jlh_posyandu" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="posyandu1" class="col-md-5 col-form-label required">
										Jumlah posyandu yang melaksanakan kegiatan/pelayanan sebulan sekali
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="posyandu1"
											   id="posyandu1" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="posyandu2" class="col-md-5 col-form-label required">
										Jumlah posyandu yang melaksanakan kegiatan/pelayanan 2 bulan sekali atau lebih
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="posyandu2"
											   id="posyandu2" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="partisipasi_posyandu" class="col-md-5 col-form-label required">
										Mayoritas warga desa berpartisipasi aktif dalam kegiatan Posyandu
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="partisipasi_posyandu"
											   id="partisipasi_posyandu" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="biaya_posyandu" class="col-md-5 col-form-label required">
										Sumber dana pembiayaan kegiatan posyandu
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="biaya_posyandu"
											   id="biaya_posyandu" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="warga_bpjs" class="col-md-5 col-form-label required">
										Jumlah warga yang terdaftar menjadi peserta BPJS Kesehatan/Jaminan Kesehatan Nasional/Kartu Indonesia Sehat (KIS)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="warga_bpjs"
											   id="warga_bpjs" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="manfaat_bpjs" class="col-md-5 col-form-label required">
										Warga Desa memanfaatkan pelayanan BPJS/JKN/KIS
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="manfaat_bpjs"
											   id="manfaat_bpjs" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jamkesda" class="col-md-5 col-form-label required">
										Jumlah warga yang terdaftar menjadi peserta Jamkesda/BPJS/JKN/KIS
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jamkesda"
											   id="jamkesda" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Derajat Kesehatan dan Gizi Buruk</h5>
								</div>
								<div class="form-group row">
									<label for="aki" class="col-md-5 col-form-label required">
										Terdapat kejadian kematian ibu melahirkan di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="aki"
											   id="aki" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_aki" class="col-md-5 col-form-label required">
										Jumlah kejadian kematian ibu melahirkan di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jlh_aki"
											   id="jlh_aki" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="akaba" class="col-md-5 col-form-label required">
										Terdapat kejadian kematian balita di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="akaba"
											   id="akaba" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_akaba" class="col-md-5 col-form-label required">
										Terdapat kejadian kematian balita di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jlh_akaba"
											   id="jlh_akaba" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="akb" class="col-md-5 col-form-label required">
										Terdapat kejadian kematian bayi (0-12 Bulan) di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="akb"
											   id="akb" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_akb" class="col-md-5 col-form-label required">
										Jumlah kejadian kematian bayi (0-12 Bulan) di Desa
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="jlh_akb"
											   id="jlh_akb" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="gizbur" class="col-md-5 col-form-label required">
										Terdapat kejadian balita gizi buruk di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="gizbur"
											   id="gizbur" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_gizbur" class="col-md-5 col-form-label required">
										Jumlah kejadian balita gizi buruk di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="jlh_gizbur"
											   id="jlh_gizbur" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="klb" class="col-md-5 col-form-label required">
										Terdapat kejadian luar biasa di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="klb"
											   id="klb" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="penyakit_klb" class="col-md-5 col-form-label required">
										Penyakit yang menyebabkan kejadian luar biasa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="penyakit_klb"
											   id="penyakit_klb" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Sasaran 1.000 Hari Pertama Kehidupan (HPK) (Ibu hamil dan anak 0-23 bulan)</h5>
								</div>
								<div class="form-group row">
									<label for="rt_hpk" class="col-md-5 col-form-label required">
										Jumlah Total Rumah Tangga 1.000 HPK
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="rt_hpk"
											   id="rt_hpk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="ibu_hamil" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="ibu_hamil"
											   id="ibu_hamil" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="usia_anak_bln" class="col-md-5 col-form-label required">
										Jumlah usia Anak 0-23 bulan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="usia_anak_bln"
											   id="usia_anak_bln" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Pengukuran Tikar Pertumbuhan (Deteksi Dini Stunting) Usia Anak 0-23 Bulan</h5>
								</div>
								<div class="form-group row">
									<label for="pertumbuhan_hijau" class="col-md-5 col-form-label required">
										Panjang Anak 0-23 Bulan Pertumbuhan Normal (Hijau)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pertumbuhan_hijau"
											   id="pertumbuhan_hijau" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pertumbuhan_kuning" class="col-md-5 col-form-label required">
										Panjang Anak 0-23 Bulan Pertumbuhan Resiko Stunting (Kuning)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pertumbuhan_kuning"
											   id="pertumbuhan_kuning" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pertumbuhan_merah" class="col-md-5 col-form-label required">
										Panjang Anak 0-23 Bulan Pertumbuhan Terindikasi Stunting (Merah)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pertumbuhan_merah"
											   id="pertumbuhan_merah" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Kelengkapan Konvergensi Paket Layanan Pencegahan Stunting bagi 1.000 HPK</h5>
								</div>
								<div class="form-group row">
									<label for="bumil_cek" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Periksa 4 Kali Selama Kehamilan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_cek"
											   id="bumil_cek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_pil_fe" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Mendapat dan Meminum Pil FE Selama 90 Hari
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_pil_fe"
											   id="bumil_pil_fe" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_nifas" class="col-md-5 col-form-label required">
										Jumlah Ibu Bersalin yang Mendapat Layanan Pemeriksaan NIFAS 3 Kali
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_nifas"
											   id="bumil_nifas" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_konseling_gizi" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Mengikuti Konseling Gizi/ Kelas Ibu Minimal 4 Kali
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_konseling_gizi"
											   id="bumil_konseling_gizi" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_kek" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil Mengalami Kekurangan Energi Kronis (KEK)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_kek"
											   id="bumil_kek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_kek_kunjungan" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Mengalami KEK Mendapat Kunjungan Rumah Bulanan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_kek_kunjungan"
											   id="bumil_kek_kunjungan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_resti" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil Mengalami Resiko Tinggi Kehamilan (RESTI)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_resti"
											   id="bumil_resti" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_resti_kunjungan" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Mengalami RESTI Mendapat Kunjungan Rumah Bulanan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_resti_kunjungan"
											   id="bumil_resti_kunjungan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_air_minum_aman" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Memiliki Akses Air Minum Aman
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_air_minum_aman"
											   id="bumil_air_minum_aman" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_jamban_layak" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil Memiliki Jamban Layak
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_jamban_layak"
											   id="bumil_jamban_layak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumil_jamkes" class="col-md-5 col-form-label required">
										Jumlah Ibu Hamil yang Memiliki Jaminan Kesehatan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bumil_jamkes"
											   id="bumil_jamkes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_indik_bumil" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Ibu Hamil (Indikator yang Diterima)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_indik_bumil"
											   id="jlh_indik_bumil" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_indik_bumil_shr" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Ibu Hamil (Indikator yang Seharusnya Diterima)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_indik_bumil_shr"
											   id="jlh_indik_bumil_shr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tingkat_konvergensi_bumil" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Ibu Hamil
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tingkat_konvergensi_bumil"
											   id="tingkat_konvergensi_bumil" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_imunisasi" class="col-md-5 col-form-label required">
										Jumlah Anak Usia < 12 Bulan yang Mendapat Imunisasi Dasar Lengkap
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="anak_imunisasi"
											   id="anak_imunisasi" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_timbang_rutin" class="col-md-5 col-form-label required">
										Jumlah Anak yang Ditimbang Rutin Setiap Bulan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="anak_timbang_rutin"
											   id="anak_timbang_rutin" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_ukur_panjang" class="col-md-5 col-form-label required">
										Jumlah Anak yang Diukur Panjang/Tinggi Badan 2 Kali Dalam Setahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="anak_ukur_panjang"
											   id="anak_ukur_panjang" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pengasuh_lk" class="col-md-5 col-form-label required">
										Jumlah Orang Tua/Pengasuh Laki-laki yang Mengikuti Konseling Gizi Bulanan Anak
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pengasuh_lk"
											   id="pengasuh_lk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pengasuh_pr" class="col-md-5 col-form-label required">
										Jumlah Orang Tua/Pengasuh Perempuan yang Mengikuti Konseling Gizi Bulanan Anak
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pengasuh_pr"
											   id="pengasuh_pr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_kunjungan_gizi_brk" class="col-md-5 col-form-label required">
										Jumlah Kunjungan Rumah bagi Anak Gizi Buruk
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_kunjungan_gizi_brk"
											   id="jlh_kunjungan_gizi_brk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_kunjungan_gizi_krg" class="col-md-5 col-form-label required">
										Jumlah Kunjungan Rumah bagi Anak Gizi Kurang
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_kunjungan_gizi_krg"
											   id="jlh_kunjungan_gizi_krg" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_kunjungan_anak_stunting" class="col-md-5 col-form-label required">
										Jumlah Kunjungan Rumah bagi Anak Stunting
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_kunjungan_anak_stunting"
											   id="jlh_kunjungan_anak_stunting" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_air_minum_aman" class="col-md-5 col-form-label required">
										Jumlah Anak 0-2 Tahun yang Memiliki Akses Air Minum Aman
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_air_minum_aman"
											   id="jlh_anak_air_minum_aman" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_jamban_layak" class="col-md-5 col-form-label required">
										Jumlah Anak 0-2 Tahun yang Memiliki Jamban Layak
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_jamban_layak"
											   id="jlh_anak_jamban_layak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_jamkes" class="col-md-5 col-form-label required">
										Jumlah Anak 0-2 Tahun yang Memiliki Jaminan Kesehatan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_jamkes"
											   id="jlh_anak_jamkes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_punya_akta_lahir" class="col-md-5 col-form-label required">
										Jumlah Anak 0-2 Tahun yang Memiliki Akta Kelahiran
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_punya_akta_lahir"
											   id="jlh_anak_punya_akta_lahir" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_pengasuh_ikut_parenting" class="col-md-5 col-form-label required">
										Jumlah Orang Tua/Pengasuh yang Mengikuti Parenting Bulanan (PAUD)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_pengasuh_ikut_parenting"
											   id="jlh_pengasuh_ikut_parenting" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_indik_anak" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Anak Usia 0-23 Bulan (Indikator yang Diterima)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_indik_anak"
											   id="jlh_indik_anak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_indik_anak_shr" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Anak Usia 0-23 Bulan (Indikator yang Seharusnya Diterima)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_indik_anak_shr"
											   id="jlh_indik_anak_shr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="konvergensi_anak" class="col-md-5 col-form-label required">
										Tingkat Konvergensi Desa Terhadap Anak Usia 0-23 Bulan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konvergensi_anak"
											   id="konvergensi_anak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_tahun" class="col-md-5 col-form-label required">
										Jumlah Anak Usia > 2-6 Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_tahun"
											   id="jlh_anak_tahun" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anak_tahun_paud" class="col-md-5 col-form-label required">
										Jumlah Anak Usia &langle; 2-6 Tahun yang Aktif Dalam Kegiatan PAUD
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_anak_tahun_paud"
											   id="jlh_anak_tahun_paud" required>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled
											id="btn-loading-dk" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dsk == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-dk">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $dsk != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab6">
							<form id="form-dimsos-pendidikan">
								<div class="form-group row">
									<label for="nm_kec_dp" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_dp"
											   id="nm_kec_dp" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_dp" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_dp"
											   id="nm_desa_dp" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_dp" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="tahun_dp"
											   id="tahun_dp" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses Ke Pendidikan Dasar dan Menengah</h5>
								</div>
								<div class="form-group row">
									<label for="jlh_sd" class="col-md-5 col-form-label required">
										Jumlah SD /MI di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_sd"
											   id="jlh_sd" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_sd" class="col-md-5 col-form-label required">
										Jumlah tenaga pengajar di SD / MI
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_sd"
											   id="jlh_guru_sd" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_sd" class="col-md-5 col-form-label required">
										Jarak ke SD / MI terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_sd"
												   id="jrk_sd" required>
											<div class="input-group-prepend">
												<span class="input-group-text">km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="mnt_sd" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke SD / MI terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="mnt_sd"
												   id="mnt_sd" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_smp" class="col-md-5 col-form-label required">
										Jumlah SMP / MTs di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_smp"
											   id="jlh_smp" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_smp" class="col-md-5 col-form-label required">
										Jumlah tenaga pengajar di SMP/MTs
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_smp"
											   id="jlh_guru_smp" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_smp" class="col-md-5 col-form-label required">
										Jarak ke SMP / MTs terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_smp"
												   id="jrk_smp" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="mnt_smp" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke SMP / MTs terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="mnt_smp"
												   id="mnt_smp" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_smu" class="col-md-5 col-form-label required">
										Jumlah SMU / MA/ SMK di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_smu"
											   id="jlh_smu" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_smu" class="col-md-5 col-form-label required">
										Jumlah tenaga pengajar di SMU / MA/ SMK
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_smu"
											   id="jlh_guru_smu" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_smu" class="col-md-5 col-form-label required">
										Jarak ke SMU / MA / SMK terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_smu"
												   id="jrk_smu" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="mnt_smu" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke SMU / MA / SMK terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="mnt_smu"
												   id="mnt_smu" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<!-- sub judul -->
								<div class="mt-5 text-md-center">
									<h5>Data Tingkat Pendidikan</h5>
								</div>
								<!-- akhir sub judul -->
								<div class="form-group row">
									<label for="tk_pend" class="col-md-5 col-form-label required">
										Tingkat pendidikan sebagian besar penduduk Desa
									</label>
									<div class="col-md-7">
										<select name="tk_pend" id="tk_pend" class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="sd_tdk_skl" class="col-md-5 col-form-label required">
										Terdapat anak usia SD yang putus atau tidak sekolah di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="sd_tdk_skl"
											   id="sd_tdk_skl" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="sd_tdk_sklh_jlh" class="col-md-5 col-form-label required">
										Jumlah anak usia SD yang putus atau tidak sekolah di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="sd_tdk_skl_jlh"
											   id="sd_tdk_sklh_jlh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="smp_tdk_sklh" class="col-md-5 col-form-label required">
										Terdapat anak usia SMP yang putus atau tidak sekolah di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="smp_tdk_skl"
											   id="smp_tdk_sklh" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="smp_tdk_sklh_jlh" class="col-md-5 col-form-label required">
										Jumlah anak usia SMP yang putus atau tidak sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="smp_tdk_skl_jlh"
											   id="smp_tdk_sklh_jlh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunagrahita_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunagrahita Masih Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunagrahita_skl"
											   id="tunagrahita_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunagrahita_tdk_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunagrahita Tidak Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunagrahita_tdk_skl"
											   id="tunagrahita_tdk_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunanetra_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunanetra Masih Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunanetra_skl"
											   id="tunanetra_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunanetra_tdk_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunanetra Tidak Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunanetra_tdk_skl"
											   id="tunanetra_tdk_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunarungu_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunarungu Masih Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunarungu_skl"
											   id="tunarungu_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunarungu_tdk_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunarungu Tidak Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunarungu_tdk_skl"
											   id="tunarungu_tdk_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunalaras_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunalaras Masih Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunalaras_skl"
											   id="tunalaras_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunalaras_tdk_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunalaras tidak Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunalaras_tdk_skl"
											   id="tunalaras_tdk_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunadaksa_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunadaksa Masih Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunadaksa_skl"
											   id="tunadaksa_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunadaksa_tdk_sklh" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunadaksa Tidak Sekolah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunadaksa_tdk_skl"
											   id="tunadaksa_tdk_sklh" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses Ke Pendidikan Non-Formal Usia 3-5 tahun</h5>
								</div>
								<div class="form-group row">
									<label for="paud" class="col-md-5 col-form-label required">
										Ketersediaan Pos PAUD di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="paud"
											   id="paud" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_paud_pmr" class="col-md-5 col-form-label required">
										Jumlah Pos PAUD Pemerintah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_paud_pmr"
											   id="jlh_paud_pmr" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_paud_non_pmr" class="col-md-5 col-form-label required">
										Jumlah Pos PAUD Non Pemerintah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_paud_non_pmr"
											   id="jlh_paud_non_pmr" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_paud" class="col-md-5 col-form-label required">
										Jarak ke Pos PAUD terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_paud"
												   id="jrk_paud" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="wkt_paud" class="col-md-5 col-form-label required">
										Waktu tempuh untuk menuju ke PAUD terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="wkt_paud"
												   id="wkt_paud" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tk" class="col-md-5 col-form-label required">
										Desa Terdapat Taman Kanak-kanak (TK)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tk"
											   id="tk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_tk" class="col-md-5 col-form-label required">
										Jarak Taman Kanak-kanak (TK) Terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_tk"
												   id="jrk_tk" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="ra" class="col-md-5 col-form-label required">
										Desa Terdapat Raudhatul Athfal (RA)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="ra"
											   id="ra" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_ra" class="col-md-5 col-form-label required">
										Jarak Raudhatul Athfal (RA) Terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_ra"
												   id="jrk_ra" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="ba" class="col-md-5 col-form-label required">
										Desa Terdapat Bustanul Athfal (BA)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="ba"
											   id="ba" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_ba" class="col-md-5 col-form-label required">
										Jarak Bustanul Athfal (BA) Terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_ba"
												   id="jrk_ba" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="guru_paud" class="col-md-5 col-form-label required">
										Jumlah guru PAUD
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="guru_paud"
											   id="guru_paud" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_tk" class="col-md-5 col-form-label required">
										Jumlah guru TK
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_tk"
											   id="jlh_guru_tk" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_ra" class="col-md-5 col-form-label required">
										Jumlah guru RA
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_ra"
											   id="jlh_guru_ra" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_guru_ba" class="col-md-5 col-form-label required">
										Jumlah guru BA
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_guru_ba"
											   id="jlh_guru_ba" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="form-group row">
									<label for="pkbm" class="col-md-5 col-form-label required">
										Ketersediaan Pusat Kegiatan Belajar Masyarakat Kejar Paket A, B, dan C di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pkbm"
											   id="pkbm" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_kursus" class="col-md-5 col-form-label required">
										Jumlah pusat kursus atau pusat pelatihan keterampilan khusus di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_kursus"
											   id="jlh_kursus" required>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_kursus" class="col-md-5 col-form-label required">
										Jarak tempuh menuju pusat kursus atau pusat pelatihan keterampilan khusus ke terdekat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_kursus"
												   id="jrk_kursus" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="buta_aksara" class="col-md-5 col-form-label required">
										Terdapat Kegiatan Pemberatasan Buta Aksara
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="buta_aksara"
											   id="buta_aksara" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses Pengetahuan</h5>
								</div>
								<div class="form-group row">
									<label for="tbm" class="col-md-5 col-form-label required">
										Ketersediaan fasilitas perpustakaan Desa / taman bacaan masyarakat di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tbm"
											   id="tbm" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pemanfaatan_tbm" class="col-md-5 col-form-label required">
										Pemanfaatan fasilitas perpustakaan Desa / taman bacaan masyarakat
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pemanfaatan_tbm"
											   id="pemanfaatan_tbm" required>
									</div>
								</div>

								<p class="text-muted">(<span class="text-danger">*</span>) wajib diisi.</p>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-dp" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dp == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-dp">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $dp != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab7">
							<form id="form-dim-sosial">
								<div class="form-group row">
									<label for="kec_dim_sos" class="col-md-5 col-form-label required">
										Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="kec_dim_sos"
											   id="kec_dim_sos" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="desa_dim_sos" class="col-md-5 col-form-label required">
										Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="desa_dim_sos"
											   id="desa_dim_sos" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_dimsos" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="thn_dimsos"
											   id="thn_dimsos" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Modal Sosial</h5>
								</div>
								<div class="form-group row">
									<label for="gotong_royong" class="col-md-5 col-form-label required">
										Kebiasaan gotong royong warga di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="gotong_royong"
											   id="gotong_royong" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="fr_gotong_royong" class="col-md-5 col-form-label required">
										Frekuensi kegiatan gotong royong
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="fr_gotong_royong"
											   id="fr_gotong_royong" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="ruang_publik" class="col-md-5 col-form-label required">
										Ketersediaan ruang publik terbuka bagi warga tanpa perlu membayar
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="ruang_publik"
											   id="ruang_publik" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kondisi_ruang_publik" class="col-md-5 col-form-label required">
										Kondisi Ruang Terbuka Publik
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="kondisi_ruang_publik"
											   id="kondisi_ruang_publik" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="karang_taruna" class="col-md-5 col-form-label required">
										Karang Taruna
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="karang_taruna"
											   id="karang_taruna" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="karang_taruna_frek" class="col-md-5 col-form-label required">
										Karang Taruna Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="karang_taruna_frek"
											   id="karang_taruna_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pkk" class="col-md-5 col-form-label required">
										PKK
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pkk"
											   id="pkk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pkk_frek" class="col-md-5 col-form-label required">
										PKK Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pkk_frek"
											   id="pkk_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="org_agm" class="col-md-5 col-form-label required">
										Perkumpulan Agama
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="org_agm"
											   id="org_agm" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="org_agm_frek" class="col-md-5 col-form-label required">
										Perkumpulan Agama Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="org_agm_frek"
											   id="org_agm_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="panti" class="col-md-5 col-form-label required">
										Panti
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="panti"
											   id="panti" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="panti_frek" class="col-md-5 col-form-label required">
										Panti Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="panti_frek"
											   id="panti_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="arisan" class="col-md-5 col-form-label required">
										Arisan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="arisan"
											   id="arisan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="arisan_frek" class="col-md-5 col-form-label required">
										Arisan Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="arisan_frek"
											   id="arisan_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_tani" class="col-md-5 col-form-label required">
										Lembaga Tani
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_tani"
											   id="lemb_tani" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_tani_frek" class="col-md-5 col-form-label required">
										Lembaga Tani Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_tani_frek"
											   id="lemb_tani_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_nelayan" class="col-md-5 col-form-label required">
										Lembaga Nelayan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_nelayan"
											   id="lemb_nelayan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_nelayan_frek" class="col-md-5 col-form-label required">
										Lembaga Nelayan Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_nelayan_frek"
											   id="lemb_nelayan_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_usternak" class="col-md-5 col-form-label required">
										Lembaga Usternak
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_usternak"
											   id="lemb_usternak" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_usternak_frek" class="col-md-5 col-form-label required">
										Lembaga Usternak Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_usternak_frek"
											   id="lemb_usternak_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_pengrajin" class="col-md-5 col-form-label required">
										Lembaga Pengrajin
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_pengrajin"
											   id="lemb_pengrajin" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_pengrajin_frek" class="col-md-5 col-form-label required">
										Lembaga Pengrajin Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_pengrajin_frek"
											   id="lemb_pengrajin_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_wanita" class="col-md-5 col-form-label required">
										Lembaga Wanita
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_wanita"
											   id="lemb_wanita" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_wanita_frek" class="col-md-5 col-form-label required">
										Lembaga Wanita Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_wanita_frek"
											   id="lemb_wanita_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_lain" class="col-md-5 col-form-label required">
										Lembaga Lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_lain"
											   id="lemb_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_lain_sebutkan" class="col-md-5 col-form-label required">
										Lembaga Lain Sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_lain_sebutkan"
											   id="lemb_lain_sebutkan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="lemb_lain_frek" class="col-md-5 col-form-label required">
										Lembaga Lain Frek
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lemb_lain_frek"
											   id="lemb_lain_frek" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="partisipasi_musdes" class="col-md-5 col-form-label required">
										Warga Desa mengikuti musyawarah Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="partisipasi_musdes"
											   id="partisipasi_musdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="frek_musdes" class="col-md-5 col-form-label required">
										Frekuensi musyawarah Desa selama setahun terakhir
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="frek_musdes"
											   id="frek_musdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pr_musdes" class="col-md-5 col-form-label required">
										Kelompok perempuan mengikuti musyawarah Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pr_musdes"
											   id="pr_musdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tot_fasilitas" class="col-md-5 col-form-label required">
										Total fasilitas / lapangan olah raga di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tot_fasilitas"
											   id="tot_fasilitas" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_sepak_bola" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Sepak Bola
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_sepak_bola"
											   id="jlh_lap_sepak_bola" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_futsal" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Futsal
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_futsal"
											   id="jlh_lap_futsal" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_tenis" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Tenis
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_tenis"
											   id="jlh_lap_tenis" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_bulu_tangkis" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Bulu Tangkis
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_bulu_tangkis"
											   id="jlh_lap_bulu_tangkis" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_basket" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Basket
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_basket"
											   id="jlh_lap_basket" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_lap_lainnya" class="col-md-5 col-form-label required">
										Jumlah Fasilitas/ Lapangan Lainnya
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_lap_lainnya"
											   id="jlh_lap_lainnya" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="lap_lainnya" class="col-md-5 col-form-label required">
										Sebutkan Fasilitas/ Lapangan Lainnya
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lap_lainnya"
											   id="lap_lainnya" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="keg_or" class="col-md-5 col-form-label required">
										Terdapat kegiatan kelompok olahraga yang rutin
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="keg_or"
											   id="keg_or" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_keg_or" class="col-md-5 col-form-label required">
										Jumlah kelompok kegiatan olahraga
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_keg_or"
											   id="jlh_keg_or" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="suku" class="col-md-5 col-form-label required">
										Warga Desa terdiri dari beberapa suku / etnis
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="suku"
											   id="suku" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bahasa" class="col-md-5 col-form-label required">
										Jumlah Bahasa yang digunakan Warga Desa untuk Komunikasi Sehari-hari di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bahasa"
											   id="bahasa" required>
										<small class="text-muted">hanya angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="islam" class="col-md-5 col-form-label required">
										Warga yang menganut agama Islam
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="islam"
											   id="islam" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kristen" class="col-md-5 col-form-label required">
										Warga yang menganut agama Kristen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kristen"
											   id="kristen" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="katolik" class="col-md-5 col-form-label required">
										Warga yang menganut agama Katolik
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="katolik"
											   id="katolik" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="buddha" class="col-md-5 col-form-label required">
										Warga yang menganut agama Buddha
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="buddha"
											   id="buddha" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="hindu" class="col-md-5 col-form-label required">
										Warga yang menganut agama Hindu
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="hindu"
											   id="hindu" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konghocu" class="col-md-5 col-form-label required">
										Warga yang menganut agama Kong Hu Cu
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konghocu"
											   id="konghocu" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="agama_lainnya" class="col-md-5 col-form-label required">
										Warga yang menganut agama lain
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="agama_lainnya"
											   id="agama_lainnya" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="agama_lain_sebutkan" class="col-md-5 col-form-label required">
										Warga yang menganut Agama lain (sebutkan)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="agama_lain_sebutkan"
											   id="agama_lain_sebutkan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="masjid" class="col-md-5 col-form-label required">
										Terdapat Masjid di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="masjid"
											   id="masjid" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="gereja_kristen" class="col-md-5 col-form-label required">
										Terdapat Gereja Kristen di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="gereja_kristen"
											   id="gereja_kristen" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="gereja_katolik" class="col-md-5 col-form-label required">
										Terdapat Gereja Katolik di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="gereja_katolik"
											   id="gereja_katolik" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="wihara" class="col-md-5 col-form-label required">
										Terdapat Wihara di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="wihara"
											   id="wihara" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pura" class="col-md-5 col-form-label required">
										Terdapat Pura di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pura"
											   id="pura" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kelenteng" class="col-md-5 col-form-label required">
										Terdapat Litang / Kelenteng
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kelenteng"
											   id="kelenteng" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="agama_mayoritas" class="col-md-5 col-form-label required">
										Agama / kepercayaan mayoritas yang dianut warga Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="agama_mayoritas"
											   id="agama_mayoritas" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kel_seni" class="col-md-5 col-form-label required">
										Terdapat kelompok seni adat dan budaya di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kel_seni"
											   id="kel_seni" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="frek_seni" class="col-md-5 col-form-label required">
										Frekuensi kegiatan seni adat dan budaya diselenggarakan dalam setahun terakhir
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="frek_seni"
											   id="frek_seni" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_kelseni" class="col-md-5 col-form-label required">
										Jumlah kelompok seni adat dan budaya di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_kelseni"
											   id="jlh_kelseni" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="hadir_adatlahir" class="col-md-5 col-form-label required">
										Mayoritas warga di Desa menghadiri perayaan adat budaya tertentu untuk acara
										kelahiran
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="hadir_adatlahir"
											   id="hadir_adatlahir" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="hadir_adat_kematian" class="col-md-5 col-form-label required">
										Mayoritas warga di Desa menghadiri perayaan adat budaya tertentu untuk acara
										kematian
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="hadir_adat_kematian"
											   id="hadir_adat_kematian" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="hadir_adatnikah" class="col-md-5 col-form-label required">
										Mayoritas warga di Desa menghadiri perayaan adat budaya tertentu untuk acara
										perkawinan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="hadir_adatnikah"
											   id="hadir_adatnikah" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="haribesar_lain" class="col-md-5 col-form-label required">
										Mayoritas warga di Desa menghadiri perayaan adat budaya tertentu untuk acara /
										hari besar lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="haribesar_lain"
											   id="haribesar_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="haribesar_lainsebutkan" class="col-md-5 col-form-label required">
										Mayoritas warga di Desa menghadiri perayaan adat budaya tertentu untuk acara /
										hari besar lain sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="haribesar_lainsebutkan"
											   id="haribesar_lainsebutkan" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Keamanan Warga</h5>
								</div>
								<div class="form-group row">
									<label for="poskamling" class="col-md-5 col-form-label required">
										Terdapat kegiatan pembangunan dan pemeliharaan pos keamanan lingkungan
										(Poskamling) oleh warga
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="poskamling"
											   id="poskamling" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="siskamling_warga" class="col-md-5 col-form-label required">
										Inisiatif dan partisipasi warga dalam pengaktifan sistem keamanan lingkungan
										(Siskamling)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="siskamling_warga"
											   id="siskamling_warga" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik" class="col-md-5 col-form-label required">
										Terdapat konflik di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik"
											   id="konflik" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_masy" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antarkelompok masyarakat
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_masy"
											   id="konflik_masy" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_desa" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik kelompok masyarakat antar Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_desa"
											   id="konflik_desa" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_kam" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antara kelompok masyarakat dengan aparat keamanan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_kam"
											   id="konflik_kam" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_pemr" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antara kelompok masyarakat dengan aparat pemerintah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_pemr"
											   id="konflik_pemr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_mhs" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antarpelajar/ mahasiswa/pemuda
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_mhs"
											   id="konflik_mhs" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_suku" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antarsuku
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_suku"
											   id="konflik_suku" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_agm" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik antaragama
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_agm"
											   id="konflik_agm" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_lain" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik lain
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="konflik_lain"
											   id="konflik_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="konflik_lain_sebutkan" class="col-md-5 col-form-label required">
										Jumlah kejadian Konflik lain Sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="konflik_lain_sebutkan"
											   id="konflik_lain_sebutkan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai" class="col-md-5 col-form-label required">
										Penyelesaian Konflik secara damai
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai"
											   id="damai" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_kam" class="col-md-5 col-form-label required">
										Peranan aparat keamanan menjadi mediator / penengah dalam penyelesaian Konflik
										massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_kam"
											   id="damai_kam" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_pemr" class="col-md-5 col-form-label required">
										Peranan aparat pemerintah menjadi mediator / penengah dalam penyelesaian Konflik
										massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_pmr"
											   id="damai_pemr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_tokomasy" class="col-md-5 col-form-label required">
										Peranan tokoh masyarakat menjadi mediator / penengah dalam penyelesaian Konflik
										massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_tokomasy"
											   id="damai_tokomasy" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_tokoag" class="col-md-5 col-form-label required">
										Peranan tokoh agama menjadi mediator / penengah dalam penyelesaian Konflik
										massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_tokoag"
											   id="damai_tokoag" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_lain" class="col-md-5 col-form-label required">
										Peranan tokoh lain menjadi mediator / penengah dalam penyelesaian Konflik massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="mediator_lain"
											   id="damai_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_lain_sebutkan" class="col-md-5 col-form-label required">
										Peranan tokoh lain menjadi mediator / penengah dalam penyelesaian Konflik massal
										Sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_lain_sebutkan"
											   id="damai_lain_sebutkan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tdk_ada_mediator" class="col-md-5 col-form-label required">
										Tidak ada yang menjadi mediator / penengah upaya dalam penyelesaian Konflik
										massal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tdk_ada_mediator"
											   id="tdk_ada_mediator" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="damai_trad" class="col-md-5 col-form-label required">
										Penyelesaian konflik di Desa oleh lembaga lokal sesuai adat budaya tertentu di
										Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="damai_trad"
											   id="damai_trad" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="curi" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan pencurian
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="curi"
											   id="curi" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tipu" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan penipuan/ penggelapan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tipu"
											   id="tipu" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="aniaya" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan penganiayaan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="aniaya"
											   id="aniaya" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bakar" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan pembakaran
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bakar"
											   id="bakar" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="susila" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan perkosaan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="susila"
											   id="susila" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="narkoba" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan peredaran narkoba / penyalahgunaan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="narkoba"
											   id="narkoba" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="judi" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan perjudian
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="judi"
											   id="judi" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bunuh" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan pembunuhan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bunuh"
											   id="bunuh" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="traffick" class="col-md-5 col-form-label required">
										Terdapat tindak kejahatan perdagangan orang
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="traffick"
											   id="traffick" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kejahatan" class="col-md-5 col-form-label required">
										Tindak kejahatan yang paling sering terjadi
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="kejahatan"
											   id="kejahatan" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Kesejahteraan Sosial</h5>
								</div>
								<div class="form-group row">
									<label for="slb" class="col-md-5 col-form-label required">
										Ketersediaan SLB di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="slb"
											   id="slb" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_slb" class="col-md-5 col-form-label required">
										Jumlah SLB yang terdapat di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlh_slb"
											   id="jlh_slb" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunagrahita_lk" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunagrahita Laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunagrahita_lk"
											   id="tunagrahita_lk" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunagrahita_pr" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunagrahita Perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunagrahita_pr"
											   id="tunagrahita_pr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunanetra_lk" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunanetra Laki-Laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunanetra_lk"
											   id="tunanetra_lk" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunanetra_pr" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunanetra Perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunanetra_pr"
											   id="tunanetra_pr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunarungu_lk" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunarungu Laki-Laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunarungu_lk"
											   id="tunarungu_lk" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunarungu_pr" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunarungu Perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunarungu_pr"
											   id="tunarungu_pr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunalaras_lk" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunalaras Laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunalaras_lk"
											   id="tunalaras_lk" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunalaras_pr" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunalaras Perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunalaras_pr"
											   id="tunalaras_pr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunadaksa_lk" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunadaksa Laki-laki
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunadaksa_lk"
											   id="tunadaksa_lk" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tunadaksa_pr" class="col-md-5 col-form-label required">
										Jumlah Penyandang Kebutuhan Khusus Tunadaksa Perempuan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tunadaksa_pr"
											   id="tunadaksa_pr" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="disabilitas_lahir" class="col-md-5 col-form-label required">
										Jumlah Penyandang Disabilitas bawaan lahir
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="disabilitas_lahir"
											   id="disabilitas_lahir" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="disabilitas_kecelakaan" class="col-md-5 col-form-label required">
										Jumlah Penyandang Disabilitas akibat Kecelakaan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="disabilitas_kecelakaan"
											   id="disabilitas_kecelakaan" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_jalanan" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Anak Jalanan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="anak_jalanan"
											   id="anak_jalanan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="anak_terlantar" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Anak Terlantar
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="anak_terlantar"
											   id="anak_terlantar" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kekerasan" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan sosial (PMKS) Korban Kekerasan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="kekerasan"
											   id="kekerasan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pmks" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Lanjut Usia Terlantar
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pmks"
											   id="pmks" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="napza" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Korban Penyalahgunaan
										NAPZA
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="napza"
											   id="napza" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="migran" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Pekerja Migran Terlantar
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="migran"
											   id="migran" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="gepeng" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) Gelandangan / Pengemis
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="gepeng"
											   id="gepeng" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="psk" class="col-md-5 col-form-label required">
										Terdapat Penyandang Masalah Kesejahteraan Sosial (PMKS) PSK
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="psk"
											   id="psk" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bunuh_diri" class="col-md-5 col-form-label required">
										Jumlah kejadian bunuh diri di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bunuh_diri"
											   id="bunuh_diri" required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai
											koma</small>
									</div>
								</div>

								<p class="text-muted">(<span class="text-danger">*</span>) wajib diisi.</p>

								<!-- tombol kirim -->
								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-dimsos" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dimsos == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-dimsos">Simpan
										</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $dimsos != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab8">
							<form id="form-dimsos-mukim">
								<div class="form-group row">
									<label for="kec_mukim" class="col-md-5 col-form-label required">
										Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="kec_mukim"
											   id="kec_mukim" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="des_mukim" class="col-md-5 col-form-label required">
										Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="des_mukim"
											   id="des_mukim" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_mukim" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="thn_mukim"
											   id="thn_mukim" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Kondisi Pemukiman Desa</h5>
								</div>
								<div class="form-group row">
									<label for="kk_pny_rmh" class="col-md-5 col-form-label required">
										Jumlah KK yang memiliki rumah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_pny_rmh"
											   id="kk_pny_rmh"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kk_tdk_pny_rmh" class="col-md-5 col-form-label required">
										Jumlah KK yang tidak memiliki rumah
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_tdk_pny_rmh"
											   id="kk_tdk_pny_rmh"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kk_pny_rmh_pmn" class="col-md-5 col-form-label required">
										Jumlah KK yang memiliki rumah permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_pny_rmh_pmn"
											   id="kk_pny_rmh_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kds_rmh_pmn" class="col-md-5 col-form-label required">
										Kondisi KK Memiliki Rumah Permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kds_rmh_pmn"
											   id="kds_rmh_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kk_pny_rmh_sm_pmn" class="col-md-5 col-form-label required">
										Jumlah KK yang memiliki rumah semi permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_pny_rmh_sm_pmn"
											   id="kk_pny_rmh_sm_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kds_rmh_sm_pmn" class="col-md-5 col-form-label required">
										Kondisi KK Memilik rumah semi permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kds_rmh_sm_pmn"
											   id="kds_rmh_sm_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kk_pyn_rmh_non_pmn" class="col-md-5 col-form-label required">
										Jumlah KK yang memiliki rumah non permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_pyn_rmh_non_pmn"
											   id="kk_pyn_rmh_non_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kds_rmh_non_pmn" class="col-md-5 col-form-label required">
										Kondisi rumah non permanen
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kds_rmh_non_pmn"
											   id="kds_rmh_non_pmn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>


								<div class="mt-5 text-md-center">
									<h5>Akses Air Bersih dan Air Minum</h5>
								</div>
								<div class="form-group row">
									<label for="airmn_kmsn" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari air kemasan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_kmsn"
											   id="airmn_kmsn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_pam" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari air ledeng dengan meteran (PAM/PDAM)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_pam"
											   id="airmn_pam" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_ldg_tp_mtrn" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari air ledeng tanpa meteran
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_ldg_tp_mtrn"
											   id="airmn_ldg_tp_mtrn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_smr_bor" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari sumur bor / pompa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_smr_bor"
											   id="airmn_smr_bor" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_smr" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari sumur
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_smr"
											   id="airmn_smr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_mata_air" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari mata air
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_mata_air"
											   id="airmn_mata_air" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_sungai" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari sungai / danau / kolam
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_sungai"
											   id="airmn_sungai" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_hjn" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari air hujan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_hjn"
											   id="airmn_hjn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_lain" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_lain"
											   id="airmn_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmn_lain_sbtkn" class="col-md-5 col-form-label required">
										Air minum warga di Desa bersumber dari lain sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmn_lain_sbtkn"
											   id="airmn_lain_sbtkn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_pam" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari air ledeng dengan meteran (PAM/PDAM)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_pam"
											   id="airmc_pam" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_ldg_tnp_mtrn" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari air ledeng tanpa meteran
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_ldg_tnp_mtrn"
											   id="airmc_ldg_tnp_mtrn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_smr_bor" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari sumur bor / pompa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_smr_bor"
											   id="airmc_smr_bor" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_smr" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari sumur
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_smr"
											   id="airmc_smr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_mata_air" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari mata air
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_mata_air"
											   id="airmc_mata_air" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_sungai" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari sungai / danau / kolam
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_sungai"
											   id="airmc_sungai" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_hjn" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari air hujan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_hjn"
											   id="airmc_hjn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_lain" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_lain"
											   id="airmc_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="airmc_lain_sbtkn" class="col-md-5 col-form-label required">
										Air untuk mandi / cuci warga di Desa bersumber dari lain sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airmc_lain_sbtkn"
											   id="airmc_lain_sbtkn" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses Listrik</h5>
								</div>
								<div class="form-group row">
									<label for="tps" class="col-md-5 col-form-label required">
										Ketersediaan TPS (Tempat Penampungan Sampah Sementara)
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tps"
											   id="tps"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="limbah" class="col-md-5 col-form-label required">
										Kebiasaan warga Desa membuang limbah cair atau air kotor
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="limbah"
											   id="limbah" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlhkk_ltrkpln" class="col-md-5 col-form-label required">
										Jumlah keluarga di Desa yang menggunakan sumber listrik dari PLN
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlhkk_ltrkpln"
											   id="jlhkk_ltrkpln"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlhkk_ltrk_non_pln" class="col-md-5 col-form-label required">
										Jumlah keluarga di Desa yang menggunakan sumber listrik dari non-PLN
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jlhkk_ltrk_non_pln"
											   id="jlhkk_ltrk_non_pln"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kk_non_ltrk" class="col-md-5 col-form-label required">
										Jumlah keluarga yang belum teraliri listrik
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kk_non_ltrk"
											   id="kk_non_ltrk"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_mthr" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Matahari
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_mthr"
											   id="e_mthr"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_angin" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Angin
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_angin"
											   id="e_angin"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_biomasa" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Biomasa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_biomasa"
											   id="e_biomasa"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_gas" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Bahan Bakar Gas
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_gas"
											   id="e_gas"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_hyti_cair" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Bahan Bakar Hayati Cair
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_hyti_cair"
											   id="e_hyti_cair"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_microhydro" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Microhydro
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_microhydro"
											   id="e_microhydro"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_pns_bm" class="col-md-5 col-form-label required">
										Jumlah KK yang memanfaatkan energi Tenaga Panas Bumi
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_pns_bm"
											   id="e_pns_bm"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="e_trbrkn" class="col-md-5 col-form-label required">
										Jumlah sumber energi terbarukan dimanfaatkan warga Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="e_trbrkn"
											   id="e_trbrkn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tdpt_pju" class="col-md-5 col-form-label required">
										Terdapatnya Penerangan di Jalan Utama (PJU) di Desa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tdpt_pju"
											   id="tdpt_pju"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pju_pln" class="col-md-5 col-form-label required">
										Sumber Energi PJU dari PLN
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pju_pln"
											   id="pju_pln"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pju_diesel_non_pln" class="col-md-5 col-form-label required">
										Sumber Energi PJU dari Diesel Non PLN
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pju_diesel_non_pln"
											   id="pju_diesel_non_pln"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pju_ebt_non_pln" class="col-md-5 col-form-label required">
										Sumber Energi PJU dari EBT Non PLN
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pju_ebt_non_pln"
											   id="pju_ebt_non_pln"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Akses Informasi & Komunikasi</h5>
								</div>
								<div class="form-group row">
									<label for="sinyal" class="col-md-5 col-form-label required">
										Sinyal telepon seluler / handphone di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="sinyal"
											   id="sinyal" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="telkomsel" class="col-md-5 col-form-label required">
										Operator / provider telepon seluler Telkomsel dapat menerima sinyal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="telkomsel"
											   id="telkomsel" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="indosat" class="col-md-5 col-form-label required">
										Operator / provider telepon seluler Indosat dapat menerima sinyal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="indosat"
											   id="indosat" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="xl_axiata" class="col-md-5 col-form-label required">
										Operator / provider telepon seluler Xl_Axiata dapat menerima sinyal
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="xl_axiata"
											   id="xl_axiata" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="op_lain" class="col-md-5 col-form-label required">
										Operator / provider telepon seluler lainnya dapat menerima sinyal lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="op_lain"
											   id="op_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="op_lain_sbtkn" class="col-md-5 col-form-label required">
										Operator / provider telepon seluler lainnya dapat menerima sinyal lain sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="op_lain_sbtkn"
											   id="op_lain_sbtkn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tvri" class="col-md-5 col-form-label required">
										Siaran program televisi saluran TVRI Nasional dan TVRI daerah
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tvri"
											   id="tvri" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tvswasta" class="col-md-5 col-form-label required">
										Siaran program televisi saluran swasta
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tvswasta"
											   id="tvswasta" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tvln" class="col-md-5 col-form-label required">
										Siaran program televisi saluran luar negeri
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tvln"
											   id="tvln" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="internet" class="col-md-5 col-form-label required">
										Terdapat fasilitas internet di kantor kepala Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="internet"
											   id="internet" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="warnet" class="col-md-5 col-form-label required">
										Warga Desa memiliki akses internet
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="warnet"
											   id="warnet" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="info_mading" class="col-md-5 col-form-label required">
										Informasi Desa ada di Papan informasi
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="info_mading"
											   id="info_mading" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="webdesa" class="col-md-5 col-form-label required">
										Informasi Desa Website
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="webdesa"
											   id="webdesa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="info_lain" class="col-md-5 col-form-label required">
										Sarana informasi Lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="info_lain"
											   id="info_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="info_lain_sbtkn" class="col-md-5 col-form-label required">
										Sarana informasi Lain sebutkan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="info_lain_sbtkn"
											   id="info_lain_sbtkn" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="twr_bts" class="col-md-5 col-form-label required">
										Tersedia Tower BTS di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="twr_bts"
											   id="twr_bts" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="wrg_prbla" class="col-md-5 col-form-label required">
										Mayoritas warga yang menggunakan Parabola di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="wrg_prbla"
											   id="wrg_prbla" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jrk_twr_tdkt" class="col-md-5 col-form-label required">
										Jarak Tower Provider terdekat di Desa
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="jrk_twr_tdkt"
												   id="jrk_twr_tdkt" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-dsp" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dsp == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-dsp">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $dsp != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab9">
							<form id="dimensi-ekonomi-form">
								<div class="form-group row">
									<label for="nama_kecamatan_dim_eko" class="col-md-5 col-form-label required">Nama
										Kecamatan</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="nama_kecamatan"
											   id="nama_kecamatan_dim_eko" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_desa_dim_eko" class="col-md-5 col-form-label required">Nama Desa</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_desa"
											   id="nama_desa_dim_eko"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_dim_eko" class="col-md-5 col-form-label required">Tahun</label>
									<div class="col-md-7">
										<input type="number"
											   min="2010"
											   max="2099"
											   step="1"
											   class="form-control"
											   name="tahun"
											   id="tahun_dim_eko">
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Keragaman Produksi Masyarakat Desa
									</h5>
								</div>
								<div class="form-group row">
									<label for="penghasilan_utama" class="col-md-5 col-form-label required">Sumber Penghasilan
										utama penduduk Desa</label>
									<div class="col-sm-7">
										<input type="text"
											   class="form-control"
											   name="penghasilan_utama"
											   id="penghasilan_utama"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="produk_unggul" class="col-md-5 col-form-label required">Terdapat produk unggulan di Desa</label>
									<div class="col-sm-7">
										<input type="text"
											   class="form-control"
											   name="produk_unggul"
											   id="produk_unggul"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="produk_unggul_1" class="col-md-5 col-form-label required">Jenis produk unggulan
										pertama</label>
									<div class="col-md-7">
										<input name="jenis_produk_unggul_1"
											   class="form-control"
											   id="produk_unggul_1">
									</div>
								</div>
								<div class="form-group row">
									<label for="produk_unggul_2" class="col-md-5 col-form-label required">Jenis produk unggulan
										kedua</label>
									<div class="col-md-7">
										<input name="jenis_produk_unggul_2"
											   class="form-control"
											   id="produk_unggul_2">
									</div>
								</div>
								<div class="form-group row">
									<label for="perubahan_tani" class="col-md-5 col-form-label required">Perubahan
										(meningkat/menurun) produk komoditi pertanian</label>
									<div class="col-md-7">
										<input name="perubahan_tani"
											   class="form-control"
											   id="perubahan_tani">
									</div>
								</div>
								<div class="form-group row">
									<label for="produk_komoditi" class="col-md-5 col-form-label required">Produk Komiditi
										pertanian yang mengalami peningkatan/penurunan</label>
									<div class="col-md-7">
										<input name="produk_komoditi"
											   class="form-control"
											   id="produk_komoditi">
									</div>
								</div>
								<div class="form-group row">
									<label for="produk_laut" class="col-md-5 col-form-label required">Terdapat produksi hasil
										tangkapan laut</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="produk_laut" id="produk_laut"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="perubahan_laut" class="col-md-5 col-form-label required">Perubahan
										(meningkat/menurun) produksi hasil tangkapan laut</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="perubahan_laut"
											   id="perubahan_laut"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_mikro" class="col-md-5 col-form-label required">Jumlah industri mikro
										dan kecil komoditas industri rumah tangga</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_mikro"
											   id="industri_mikro"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_pariwisata" class="col-md-5 col-form-label required">Jumlah industri
										mikro dan kecil komoditas pariwisata</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_pariwisata"
											   id="industri_pariwisata"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_perikanan" class="col-md-5 col-form-label required">Jumlah industri
										mikro dan kecil komoditas perikanan</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_perikanan"
											   id="industri_perikanan"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_pertanian" class="col-md-5 col-form-label required">Jumlah industri
										mikro dan kecil komoditas pertanian</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_pertanian"
											   id="industri_pertanian"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_peternakan" class="col-md-5 col-form-label required">Jumlah industri
										mikro dan kecil komoditas peternakan</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_peternakan"
											   id="industri_peternakan"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="industri_lainnya" class="col-md-5 col-form-label required">Jumlah industri mikro
										dan kecil Lainnya di Desa</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="industri_lainnya"
											   id="industri_lainnya"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="mikro_kecil" class="col-md-5 col-form-label required">Total industri mikro dan
										kecil di Desa</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="tot_mikro_kecil"
											   id="mikro_kecil"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="menengah" class="col-md-5 col-form-label required">Total industri menengah di
										Desa</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="tot_menengah"
											   id="menengah"
											   min="0">
									</div>
								</div>

								<div class="text-md-center">
									<h5>
										Sarana dan Prasarana Ekonomi di Desa
									</h5>
								</div>
								<div class="form-group row">
									<label for="ttg_pertanian" class="col-md-5 col-form-label required">Mayoritas Peralatan
										Teknologi Tepat Guna pertanian yang digunakan di Desa</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="ttg_pertanian" id="ttg_pertanian"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_ttg_pertanian" class="col-md-5 col-form-label required">Jumlah alat bantu
										Teknologi Tepat Guna pertanian di Desa</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_ttg_pertanian"
											   id="jlh_ttg_pertanian"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="ttg_peternakan" class="col-md-5 col-form-label required">Mayoritas Peralatan
										Teknologi Tepat Guna peternakan yang digunakan di Desa</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="ttg_peternakan"
											   id="ttg_peternakan">
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_ttg_peternakan" class="col-md-5 col-form-label required">Jumlah alat bantu
										Teknologi Tepat Guna peternakan di Desa</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_ttg_peternakan"
											   id="jlh_ttg_peternakan"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="ttg_perikanan" class="col-md-5 col-form-label required">Mayoritas Peralatan
										Teknologi Tepat Guna perikanan yang digunakan di Desa</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="ttg_perikanan" id="ttg_perikanan"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_ttg_perikanan" class="col-md-5 col-form-label required">Jumlah alat bantu
										Teknologi Tepat Guna perikanan di Desa</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_ttg_perikanan"
											   id="jlh_ttg_perikanan"
											   min="0">
									</div>
								</div>

								<div class="text-md-center">
									<h5>Akses ke Pusat Perdagangan</h5>
								</div>
								<div class="form-group row">
									<label for="kelompok_toko" class="col-md-5 col-form-label required">Ketersediaan kelompok
										pertokoan di Desa</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="kelompok_toko" id="kelompok_toko"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_kel_toko" class="col-md-5 col-form-label required">Jarak ke kelompok
										pertokoan terdekat</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" class="form-control" name="jarak_kel_toko"
												   id="jarak_kel_toko"
												   min="0"
												   pattern="([0-9]+.{0,1}[0-9]*,{0,1})*[0-9]">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_pasar_permanen" class="col-md-5 col-form-label required">Jumlah pasar dengan
										bangunan permanen</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_pasar_permanen"
											   id="jlh_pasar_permanen"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_pasar_semi_permanen" class="col-md-5 col-form-label required">Jumlah pasar
										dengan bangunan semi permanen</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_pasar_semi_permanen"
											   id="jlh_pasar_semi_permanen"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="pasar_tanpa_bangunan" class="col-md-5 col-form-label required">Terdapat pasar
										tanpa bangunan di Desa</label>
									<div class="col-md-7">
										<select class="form-control" name="pasar_tanpa_bangunan"
												id="pasar_tanpa_bangunan">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_pasar_tanpa_bangunan" class="col-md-5 col-form-label required">Jumlah pasar
										tanpa bangunan di Desa</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="jlh_pasar_tanpa_bangunan"
											   id="jlh_pasar_tanpa_bangunan"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_toko_kelontong" class="col-md-5 col-form-label required">Jumlah toko/warung
										kelontong di Desa</label>
									<div class="col-md-7">
										<input type="number"
											   class="form-control"
											   name="jlh_toko_kelontong"
											   id="jlh_toko_kelontong"
											   min="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="kedai_makanan" class="col-md-5 col-form-label required">Terdapat warung/kedai
										makanan dan minuman di Desa</label>
									<div class="col-md-7">
										<select class="form-control" name="kedai_makanan" id="kedai_makanan">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="hotel" class="col-md-5 col-form-label required">Terdapat hotel/penginapan di
										Desa</label>
									<div class="col-md-7">
										<select class="form-control" name="hotel" id="hotel" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_hotel" class="col-md-5 col-form-label required">Jarak ke hotel/penginapan
										terdekat</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" class="form-control" name="jarak_hotel" id="jarak_hotel"
												   onkeypress="return event.charCode >= 48 && event.charCode <=57">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="waktu_tempuh_hotel" class="col-md-5 col-form-label required">Waktu tempuh menuju
										hotel/penginapan terdekat</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0" class="form-control" name="waktu_tempuh_hotel"
												   id="waktu_tempuh_hotel"
												   onkeypress="return event.charCode >= 48 && event.charCode <=57">
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="biogas" class="col-md-5 col-form-label required">Terdapat masyarakat yang
										memanfaatkan biogas</label>
									<div class="col-md-7">
										<select class="form-control" name="biogas" id="biogas" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="agen_lpg" class="col-md-5 col-form-label required">Terdapat agen penjual
										LPG/Minyak Tanah</label>
									<div class="col-md-7">
										<select class="form-control" name="agen_lpg" id="agen_lpg" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bb_masak" class="col-md-5 col-form-label required">Mayoritas bahan bakar memasak
										untuk kebutuhan keluarga</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="bb_masak" id="bb_masak"
											   placeholder="">
									</div>
								</div>
								<div class="form-group row">
									<label for="bb_lainnya" class="col-md-5 col-form-label required">Bahan bakar masak
										lainnya</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="bb_lainnya" id="bb_lainnya"
											   placeholder="">
									</div>
								</div>

								<div class="text-md-center">
									<h5>Akses Distribusi Logistik</h5>
								</div>
								<div class="form-group row">
									<label for="kantor_pos" class="col-md-7 col-form-label required">Terdapat kantor pos/pos
										pembantu/rumah pos/pos keliling di Desa</label>
									<div class="col-md-5">
										<select class="form-control" name="kantor_pos" id="kantor_pos">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_pos" class="col-md-5 col-form-label required">Jarak ke kantor pos</label>
									<div class="col-md-7">
										<div class="input-group">
										<input class="form-control"
											   type="number"
											   name="jarak_pos"
											   id="jarak_pos">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="ekspedisi" class="col-md-7 col-form-label required">Terdapat pelayanan jasa
										ekspedisi di Desa</label>
									<div class="col-md-5">
										<select class="form-control" name="ekspedisi" id="ekspedisi">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_ekspedisi" class="col-md-5 col-form-label required">Jarak ke lokasi jasa
										ekspedisi</label>
									<div class="col-md-7">
										<div class="input-group">
										<input class="form-control"
											   type="number"
											   name="jarak_ekspedisi"
											   id="jarak_ekspedisi">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>

								<div class="text-md-center">
									<h5>Akses Lembaga Keuangan</h5>
								</div>
								<div class="form-group row">
									<label for="bank_umum" class="col-md-7 col-form-label required">Terdapat bank umum pemerintah
										di Desa</label>
									<div class="col-md-5">
										<select class="form-control" name="bank_umum" id="bank_umum" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_bank_umum" class="col-md-5 col-form-label required">Jarak ke bank umum
										terdekat</label>
									<div class="col-md-7">
										<div class="input-group">
										<input class="form-control"
											   type="number"
											   name="jarak_bank_umum"
											   id="jarak_bank_umum"
											   onkeypress="return event.charCode >= 48 && event.charCode <=57">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bank_swasta" class="col-md-7 col-form-label required">Terdapat bank swasta
										pemerintah di Desa</label>
									<div class="col-md-5">
										<select class="form-control" name="bank_swasta" id="bank_swasta" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jarak_bank_swasta" class="col-md-5 col-form-label required">Jarak ke bank swasta
										terdekat</label>
									<div class="col-md-7">
										<div class="input-group">
										<input class="form-control"
											   type="number"
											   name="jarak_bank_swasta"
											   id="jarak_bank_swasta"
											   onkeypress="return event.charCode >= 48 && event.charCode <=57">
											<div class="input-group-prepend">
												<span class="input-group-text">Km</span>
											</div>
										</div>
										<small class="text-muted">hanya berupa angka dan tanda koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bpr" class="col-md-7 col-form-label required">Terdapat BPR di Desa</label>
									<div class="col-md-5">
										<select class="form-control" name="bpr" id="bpr" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="kur" class="col-md-7 col-form-label required">Terdapat fasilitas kredit berupa
										KUR</label>
									<div class="col-md-5">
										<select class="form-control" name="kur" id="kur" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="kkpe" class="col-md-7 col-form-label required">Terdapat fasilitas kredit berupa
										KKP-E</label>
									<div class="col-md-5">
										<select class="form-control" name="kkpe" id="kkpe" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="kuk" class="col-md-7 col-form-label required">Terdapat fasilitas kredit berupa
										KUK</label>
									<div class="col-md-5">
										<select class="form-control" name="kuk" id="kuk" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="kredit_lainnya" class="col-md-7 col-form-label required">Terdapat fasilitas
										kredit lainnya</label>
									<div class="col-md-5">
										<select class="form-control" name="kredit_lainnya" id="kredit_lainnya" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_kredit_lainnya" class="col-md-5 col-form-label required">Nama lembaga
										penyedia fasilitas kredit lainnya</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="nama_kredit_lainnya"
											   id="nama_kredit_lainnya">
									</div>
								</div>

								<div class="text-md-center">
									<h5>Ketersediaan Lembaga Ekonomi</h5>
								</div>
								<div class="form-group row">
									<label for="jlh_koperasi_aktif" class="col-md-5 col-form-label required">Jumlah koperasi di
										Desa yang aktif beroperasi</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="jlh_koperasi_aktif"
											   id="jlh_koperasi_aktif"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bum_desa" class="col-md-5 col-form-label required">Terdapat BUMDesa</label>
									<div class="col-md-7">
										<select class="form-control" name="bum_desa" id="bum_desa"
												required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_bum_desa" class="col-md-5 col-form-label required">Nama BUMDesa</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="nama_bum_desa" id="nama_bum_desa">
									</div>
								</div>
								<div class="form-group row">
									<label for="status_bum_desa" class="col-md-5 col-form-label required">Status BUMDesa</label>
									<div class="col-md-7">
										<select class="form-control" name="status_bum_desa" id="status_bum_desa">
											<option value="">--Pilih--</option>
											<option value="Aktif">Aktif</option>
											<option value="Tidak Aktif">Tidak Aktif</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bersama" class="col-md-5 col-form-label required">Keikutsertaan Desa
										terhadap BUMDesa bersama</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="bumdes_bersama"
											   id="bumdes_bersama">
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_bumdes_bersama" class="col-md-5 col-form-label required">Nama BUMDesa
										bersama</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="nama_bumdes_bersama"
											   id="nama_bumdes_bersama">
									</div>
								</div>
								<div class="form-group row">
									<label for="kantor_bumdes_bersama" class="col-md-7 col-form-label required">Terdapat kantor
										BUMDesa bersama</label>
									<div class="col-md-5">
										<select class="form-control" name="kantor_bumdes_bersama"
												id="kantor_bumdes_bersama" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="status_bumdes_bersama" class="col-md-7 col-form-label required">Status BUMDesa
										bersama</label>
									<div class="col-md-5">
										<select class="form-control" name="status_bumdes_bersama"
												id="status_bumdes_bersama">
											<option value="">--Pilih--</option>
											<option value="Aktif">Aktif</option>
											<option value="Tidak Aktif">Tidak Aktif</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bisnis_sosial" class="col-md-5 col-form-label required">BUMDesa bisnis
										sosial</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="bumdes_bisnis_sosial"
											   id="bumdes_bisnis_sosial" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bisnis_sosial_air_bersih" class="col-md-7 col-form-label required">Terdapat
										BUMDesa bisnis sosial bidang air bersih</label>
									<div class="col-md-5">
										<select name="bumdes_bis_sos_air_bersih"
												id="bumdes_bisnis_sosial_air_bersih"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bisnis_sosial_listrik" class="col-md-7 col-form-label required">Terdapat
										BUMDesa bisnis sosial bidang listrik</label>
									<div class="col-md-5">
										<select name="bumdes_bis_sos_listrik"
												id="bumdes_bisnis_sosial_listrik"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bisnis_sosial_sampah" class="col-md-7 col-form-label required">Terdapat
										BUMDesa bisnis sosial bidang sampah</label>
									<div class="col-md-5">
										<select name="bumdes_bis_sos_sampah"
												id="bumdes_bisnis_sosial_sampah"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bisnis_sosial_jasa" class="col-md-7 col-form-label required">Terdapat
										BUMDesa bisnis sosial bidang jasa</label>
									<div class="col-md-5">
										<select name="bumdes_bis_sos_jasa"
												id="bumdes_bisnis_sosial_jasa"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_penyewaan" class="col-md-5 col-form-label required">BUMDesa jasa penyewaan</label>
									<div class="col-md-7">
										<input type="text"
											   name="bumdes_penyewaan"
											   id="bumdes_penyewaan"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_sewa_gedung" class="col-md-7 col-form-label required">Terdapat BUMDesa
										jasa sewa gedung</label>
									<div class="col-md-5">
										<select name="bumdes_sewa_gedung"
												id="bumdes_sewa_gedung"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_sewa_tenda" class="col-md-7 col-form-label required">Terdapat BUMDesa jasa
										sewa tenda</label>
									<div class="col-md-5">
										<select name="bumdes_sewa_tenda"
												id="bumdes_sewa_tenda"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_sewa_soundsystem" class="col-md-7 col-form-label required">Terdapat
										BUMDesa jasa sewa sound system</label>
									<div class="col-md-5">
										<select name="bumdes_sewa_soundsystem"
												id="bumdes_sewa_soundsystem"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_sewa_peralatan_lainnya" class="col-md-7 col-form-label required">Terdapat
										BUMDesa jasa sewa peralatan lainnya</label>
									<div class="col-md-5">
										<select name="bumdes_sewa_peralatan_lainnya"
												id="bumdes_sewa_peralatan_lainnya"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perdagangan" class="col-md-5 col-form-label required">BUMDesa
										perdagangan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bumdes_perdagangan"
											   id="bumdes_perdagangan"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bidang_pertanian" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perdagangan bidang pertanian</label>
									<div class="col-md-5">
										<select name="bumdes_bid_pertanian"
												id="bumdes_bidang_pertanian"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_bumdes_bid_pertanian" class="col-md-5 col-form-label required">Nama BUMDesa
										perdagangan bidang pertanian</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_bumdes_bid_pertanian"
											   id="nama_bumdes_bid_pertanian">
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bidang_perkebunan" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perdagangan bidang perkebunan</label>
									<div class="col-md-5">
										<select name="bumdes_bid_perkebunan"
												id="bumdes_bidang_perkebunan"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_bumdes_bid_perkebunan" class="col-md-5 col-form-label required">Nama BUMDesa
										perdagangan bidang perkebunan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_bumdes_bid_perkebunan"
											   id="nama_bumdes_bid_perkebunan">
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bidang_peternakan" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perdagangan bidang peternakan</label>
									<div class="col-md-5">
										<select name="bumdes_bid_peternakan"
												id="bumdes_bidang_peternakan"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="nama_bumdes_bid_peternakan" class="col-md-5 col-form-label required">Nama BUMDesa
										perdagangan bidang peternakan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nama_bumdes_bid_peternakan"
											   id="nama_bumdes_bid_peternakan">
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_bidang_sembako" class="col-md-7 col-form-label required">Terdapat BUMDesa
										perdagangan bidang sembako</label>
									<div class="col-md-5">
										<select name="bumdes_bid_sembako"
												id="bumdes_bidang_sembako"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdesa_keuangan" class="col-md-5 col-form-label required">BUMDesa
										keuangan</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bumdesa_keuangan"
											   id="bumdesa_keuangan"
											   required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_simpan_pinjam" class="col-md-7 col-form-label required">Terdapat BUMDesa
										keuangan simpan pinjam</label>
									<div class="col-md-5">
										<select name="bumdes_simpan_pinjam"
												id="bumdes_simpan_pinjam"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_uedsp" class="col-md-7 col-form-label required">Terdapat BUMDesa keuangan
										UED SP</label>
									<div class="col-md-5">
										<select name="bumdes_uedsp"
												id="bumdes_uedsp"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_mikro_finance" class="col-md-7 col-form-label required">Terdapat BUMDesa
										keuangan mikro finance</label>
									<div class="col-md-5">
										<select name="bumdes_mikro_finance"
												id="bumdes_mikro_finance"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_brilink" class="col-md-7 col-form-label required">Terdapat BUMDesa
										keuangan Brilink</label>
									<div class="col-md-5">
										<select name="bumdes_brilink"
												id="bumdes_brilink"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_agen46" class="col-md-7 col-form-label required">Terdapat BUMDesa keuangan
										Agen 46</label>
									<div class="col-md-5">
										<select name="bumdes_agen46"
												id="bumdes_agen46"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_keuangan_kredit" class="col-md-7 col-form-label required">Terdapat BUMDesa
										keuangan kredit</label>
									<div class="col-md-5">
										<select name="bumdes_keuangan_kredit"
												id="bumdes_keuangan_kredit"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_keuangan_koperasi" class="col-md-7 col-form-label required">Terdapat
										BUMDesa keuangan koperasi</label>
									<div class="col-md-5">
										<select name="bumdes_keuangan_koperasi"
												id="bumdes_keuangan_koperasi"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_keuangan_ppob" class="col-md-7 col-form-label required">Terdapat BUMDesa
										keuangan PPOB</label>
									<div class="col-md-5">
										<select name="bumdes_keuangan_ppob"
												id="bumdes_keuangan_ppob"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara" class="col-md-5 col-form-label required">BUMDesa perantara
										(layanan)</label>
									<div class="col-md-7">
										<input name="bumdes_perantara"
											   id="bumdes_perantara"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_bid_jasa" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perantara bidang jasa</label>
									<div class="col-md-5">
										<select name="bumdes_perantara_bid_jasa"
												id="bumdes_perantara_bid_jasa"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_bid_bengkel" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perantara bidang perbengkelan</label>
									<div class="col-md-5">
										<select name="bumdes_perantara_bid_bengkel"
												id="bumdes_perantara_bid_bengkel"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_kios" class="col-md-7 col-form-label required">Terdapat BUMDesa
										perantara Toko/Kios</label>
									<div class="col-md-5">
										<select name="bumdes_perantara_kios"
												id="bumdes_perantara_kios"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_percetakan" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perantara bidang percetakan</label>
									<div class="col-md-5">
										<select name="bumdes_perantara_percetakan"
												id="bumdes_perantara_percetakan"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_photocopy" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perantara bidang photocopy</label>
									<div class="col-md-5">
										<select name="bumdes_perantara_photocopy"
												id="bumdes_perantara_photocopy"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_perantara_penggilingan_padi" class="col-md-7 col-form-label required">Terdapat
										BUMDesa perantara bidang penggilingan padi</label>
									<div class="col-md-5">
										<select name="bumdes_giling_padi"
												id="bumdes_perantara_penggilingan_padi"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_usaha" class="col-md-5 col-form-label required">BUMDesa bidang
										usaha</label>
									<div class="col-md-7">
										<input name="bumdes_usaha"
											   id="bumdes_usaha"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_usaha_bid_kel_usaha" class="col-md-7 col-form-label required">Terdapat
										BUMDesa usaha bidang kelompok usaha</label>
									<div class="col-md-5">
										<select name="bumdes_usaha_bid_kel_usaha"
												id="bumdes_usaha_bid_kel_usaha"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_usaha_bid_penjualan_tiket" class="col-md-7 col-form-label required">Terdapat
										BUMDesa usaha bidang penjualan tiket</label>
									<div class="col-md-5">
										<select name="bumdes_penjualan_tiket"
												id="bumdes_usaha_bid_penjualan_tiket"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_usaha_bid_karaoke" class="col-md-7 col-form-label required">Terdapat
										BUMDesa usaha bidang karaoke</label>
									<div class="col-md-5">
										<select name="bumdes_karaoke"
												id="bumdes_usaha_bid_karaoke"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_pariwisata" class="col-md-5 col-form-label required">BUMDesa bidang
										pariwisata</label>
									<div class="col-md-7">
										<input name="bumdes_pariwisata"
											   id="bumdes_pariwisata"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_pariwisata_bid_wisdes" class="col-md-7 col-form-label required">Terdapat
										BUMDesa pariwisata bidang wisata desa</label>
									<div class="col-md-5">
										<select name="bumdes_wisdes"
												id="bumdes_pariwisata_bid_wisdes"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_pariwisata_bid_agrowisata" class="col-md-7 col-form-label required">Terdapat
										BUMDesa pariwisata bidang agrowisata</label>
									<div class="col-md-5">
										<select name="bumdes_agrowisata"
												id="bumdes_pariwisata_bid_agrowisata"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_pariwisata_bid_wisata_alam" class="col-md-7 col-form-label required">Terdapat
										BUMDesa pariwisata bidang wisata alam</label>
									<div class="col-md-5">
										<select name="bumdes_wisata_alam"
												id="bumdes_pariwisata_bid_wisata_alam"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bumdes_pariwisata_bid_transportasi" class="col-md-7 col-form-label required">Terdapat
										BUMDesa pariwisata bidang transportasi</label>
									<div class="col-md-5">
										<select name="bumdes_transportasi"
												id="bumdes_pariwisata_bid_transportasi"
												class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="omset_bumdes" class="col-md-5 col-form-label required">Omset BUMDesa 1 tahun
										terakhir</label>
									<div class="col-md-7">
										<input type="text" name="omset_bumdes"
											   id="omset_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="omset_bumdes_bersama" class="col-md-5 col-form-label required">Omset BUMDesa
										bersama 1 tahun terakhir</label>
									<div class="col-md-7">
										<input type="text" name="omset_bumdes_bersama"
											   id="omset_bumdes_bersama"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_usaha_bumdes" class="col-md-5 col-form-label required">Jumlah bidang usaha
										BUMDesa</label>
									<div class="col-md-7">
										<input type="number" name="jlh_usaha_bumdes"
											   id="jlh_usaha_bumdes"
											   class="form-control"
											   min="0" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perdes_bentuk_bumdes" class="col-md-5 col-form-label required">Nomor perdes
										pembentukan BUMDesa</label>
									<div class="col-md-7">
										<input name="perdes_bentuk_bumdes"
											   type="text"
											   id="perdes_bentuk_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_berdiri_bumdes" class="col-md-5 col-form-label required">Tahun pendirian
										BUMDesa</label>
									<div class="col-md-7">
										<input type="number" name="thn_berdiri_bumdes"
											   min="2010"
											   max="2099"
											   id="thn_berdiri_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tot_tenagakerja_bumdes" class="col-md-5 col-form-label required">Total tenaga
										kerja BUMDesa</label>
									<div class="col-md-7">
										<input type="number" name="tot_tenagakerja_bumdes"
											   min="0"
											   max="5000"
											   id="tot_tenagakerja_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pengelola_bumdes" class="col-md-5 col-form-label required">Nama pengelola BUMDesa</label>
									<div class="col-md-7">
										<input type="text" name="pengelola_bumdes"
											   id="pengelola_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="ketua_bumdes" class="col-md-5 col-form-label required">Nama ketua
										BUMDesa</label>
									<div class="col-md-7">
										<input type="text" name="ketua_bumdes"
											   id="ketua_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="sekretaris_bumdes" class="col-md-5 col-form-label required">Nama sekretaris
										BUMDesa</label>
									<div class="col-md-7">
										<input type="text" name="sekretaris_bumdes"
											   id="sekretaris_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="bendahara_bumdes" class="col-md-5 col-form-label required">Nama bendahara BUMDesa</label>
									<div class="col-md-7">
										<input type="text" name="bendahara_bumdes"
											   id="bendahara_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_anggota_bumdes" class="col-md-5 col-form-label required">Jumlah anggota
										BUMDesa</label>
									<div class="col-md-7">
										<input type="number" name="jlh_anggota_bumdes"
											   id="jlh_anggota_bumdes"
											   class="form-control" min="0" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="sk_pengelola_bumdes" class="col-md-5 col-form-label required">SK pengelola
										BUMDesa</label>
									<div class="col-md-7">
										<input type="text" name="sk_pengelola_bumdes"
											   id="sk_pengelola_bumdes"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="email_bumdes" class="col-md-5 col-form-label required">Alamat email
										BUMDesa</label>
									<div class="col-md-7">
										<input type="email" name="email_bumdes"
											   id="email_bumdes"
											   class="form-control" required>
									</div>
								</div>

								<div class="text-md-center">
									<h5>Keterbukaan Wilayah</h5>
								</div>
								<div class="form-group row">
									<label for="angkutan_umum" class="col-md-5 col-form-label required">Angkutan umum di
										Desa</label>
									<div class="col-md-7">
										<input type="text" name="angkutan_umum"
											   id="angkutan_umum"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="angkutan_umum_utama" class="col-md-5 col-form-label required">Angkutan umum utama
										di Desa yang beroperasi setiap hari</label>
									<div class="col-md-7">
										<input type="text" name="angkutan_umum_utama"
											   id="angkutan_umum_utama"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jam_operasional" class="col-md-5 col-form-label required">Jam operasional
										angkutan umum
										utama</label>
									<div class="col-md-7">
										<input type="text" name="jam_operasional"
											   id="jam_operasional"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jalan_desa" class="col-md-5 col-form-label required">Jalan di Desa dapat dilalui
										kendaraan bermotor roda empat</label>
									<div class="col-md-7">
										<input type="text" name="jalan_desa"
											   id="jalan_desa"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jenis_permukaan" class="col-md-5 col-form-label required">Jenis permukaan jalan
										di Desa yang terluas</label>
									<div class="col-md-7">
										<input type="text" name="jenis_permukaan"
											   id="jenis_permukaan"
											   class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="kualitas_jalan" class="col-md-5 col-form-label required">Kualitas permukaan jalan
										di Desa</label>
									<div class="col-md-7">
										<input type="text" name="kualitas_jalan"
											   id="kualitas_jalan"
											   class="form-control" required>
									</div>
								</div>

								<p class="text-muted">(<span class="text-danger">*</span>) wajib diisi.</p>

								<!-- tombol kirim -->
								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-dimeko" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dimeko == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-dimeko">
											Simpan
										</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<strong style="color: red">
										<?= $dimeko != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?>
									</strong>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab10">
							<form id="form-ekologi">
								<div class="form-group row">
									<label for="nm_kec_de" class="col-md-5 col-form-label required">
										Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_de"
											   id="nm_kec_de" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_de" class="col-md-5 col-form-label required">
										Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_de"
											   id="nm_desa_de" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="thn_de" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="thn_de"
											   id="thn_de" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Kondisi Linkungan</h5>
								</div>
								<div class="form-group row">
									<label for="airdesa" class="col-md-5 col-form-label required">
										Ketersediaan Sumber Air di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="airdesa"
											   id="airdesa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="cemar_air" class="col-md-5 col-form-label required">
										Terjadi pencemaran air di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="cemar_air"
											   id="cemar_air" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="cemar_tnh" class="col-md-5 col-form-label required">
										Terjadi pencemaran tanah di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="cemar_tnh"
											   id="cemar_tnh" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="cemar_udr" class="col-md-5 col-form-label required">
										Terjadi pencemaran udara di Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="cemar_udr"
											   id="cemar_udr" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="dmpk_cemar" class="col-md-5 col-form-label required">
										Dampak pencemaran lingkungan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="dmpk_cemar"
											   id="dmpk_cemar" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="sngai_lmbh" class="col-md-5 col-form-label required">
										Terdapat sungai yang terkena pembuangan limbah
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="sngai_lmbh"
											   id="sngai_lmbh" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tataruang" class="col-md-5 col-form-label required">
										Terdapat perencanaan tata ruang Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="tataruang"
											   id="tataruang" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perub_lhn" class="col-md-5 col-form-label required">
										Terdapat perubahan penggunaan lahan dari sektor pertanian menjadi non-pertanian
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="perub_lhn"
											   id="perub_lhn" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Potensi Bencana</h5>
								</div>
								<div class="form-group row">
									<label for="tnh_lngsr" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Tanah Longsor
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tnh_lngsr"
											   id="tnh_lngsr"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bnjr" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Banjir
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bnjr"
											   id="bnjr"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="gmp" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Gempa
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="gmp"
											   id="gmp"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="tsunami" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Tsunami
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="tsunami"
											   id="tsunami"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="gel_pasang" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Gelombang Pasang laut
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="gel_pasang"
											   id="gel_pasang"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="agn_pyh" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Angin Puyuh / Puting Beliung / Topan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="agn_pyh"
											   id="agn_pyh"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="gunung_mlts" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Gunung Meletus
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="gunung_mlts"
											   id="gunung_mlts"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kbkrn" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Kebakaran Hutan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kbkrn"
											   id="kbkrn"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kekeringan" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Kekeringan Lahan
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="kekeringan"
											   id="kekeringan"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bncn_lain" class="col-md-5 col-form-label required">
										Kejadian Bencana Lain
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="bncn_lain"
											   id="bncn_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="frek_bncn_lain" class="col-md-5 col-form-label required">
										Frekuensi Kejadian Bencana Lainnya
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="frek_bncn_lain"
											   id="frek_bncn_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="spdben" class="col-md-5 col-form-label required">
										Terdapat Fasilitas Mitigasi Bencana Alam di Desa Berupa Peringatan Dini Bencana
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="spdben"
											   id="spdben" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="spdben_tsunami" class="col-md-5 col-form-label required">
										Terdapat Fasilitas Mitigasi Bencana Alam di Desa Berupa Sistem Peringatan Dini Khusus Tsunami
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="spdben_tsunami"
											   id="spdben_tsunami" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perlab_keselamatan" class="col-md-5 col-form-label required">
										Terdapat Fasilitas Mitigasi Bencana Alam di Desa Berupa Perlengkapan Keselamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="perlab_keselamatan"
											   id="perlab_keselamatan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="jalur_evakuasi" class="col-md-5 col-form-label required">
										Terdapat Fasilitas Mitigasi Bencana Alam di Desa Berupa Jalur Evakuasi
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="jalur_evakuasi"
											   id="jalur_evakuasi"required>
										<small class="text-muted">hanya berupa angka dan tanda titik sebagai koma</small>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-eko" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($dim_eko == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-eko">Simpan
										</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $dim_eko != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab11">
							<form id="form-aktivitas-desa">
								<div class="form-group row">
									<label for="nm_kec_akdes" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_akdes"
											   id="nm_kec_akdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_akdes" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_akdes"
											   id="nm_desa_akdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_akdes" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="2000" max="2099"
											   class="form-control"
											   name="tahun_akdes"
											   id="tahun_akdes" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pld" class="col-md-5 col-form-label required">
										Ketersediaan pendamping lokal desa (PLD)
									</label>
									<div class="col-md-7">
										<select class="form-control" name="pld" id="pld" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="jlh_pld" class="col-md-5 col-form-label required">
										Jumlah pendamping lokal desa (PLD) di Kecamatan
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="jlh_pld"
											   id="jlh_pld" required>
										<small class="text-muted">Hanya berupa angka dan tanda titik saja sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kpmd_aktif" class="col-md-5 col-form-label required">
										Jumlah anggota KPMD (Kader Pembangunan Masyarakat Desa) (Kader Posyandu/ Kader
										Kesehatan) yang aktif
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="kpmd_aktif"
											   id="kpmd_aktif" required>
										<small class="text-muted">Hanya berupa angka dan tanda titik saja sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="RPJMDes_aktif" class="col-md-5 col-form-label required">
										Jumlah anggota Tim Perumusan RPJMDes yang aktif
									</label>
									<div class="col-md-7">
										<input type="number"
											   min="0"
											   class="form-control"
											   name="RPJMDes_aktif"
											   id="RPJMDes_aktif" required>
										<small class="text-muted">Hanya berupa angka dan tanda titik saja sebagai
											koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="kebun_gizi" class="col-md-5 col-form-label required">
										Ketersediaan kebun gizi di Desa yang dimanfaatkan masyarakat
									</label>
									<div class="col-md-7">
										<select name="kebun_gizi" id="kebun_gizi" class="form-control" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="pangan" class="col-md-5 col-form-label required">
										Sumber pangan yang paling sering dikonsumsi masyarakat Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pangan"
											   id="pangan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="perdes" class="col-md-5 col-form-label required">
										Terdapat Peraturan Desa tentang Kesehatan dan Pendidikan
									</label>
									<div class="col-md-7">
										<select class="form-control"
												name="perdes"
												id="perdes" required>
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-ades" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($ades == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-ades">Simpan
										</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<b style="color: red"><?= $ades != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?></b>
								</p>
							</form>
						</div>
						<div class="tab-pane card-body" id="v-tabs-t-tab12">
							<form id="form-pendapatan-desa">
								<div class="form-group row">
									<label for="nm_kec_pd" class="col-md-5 col-form-label required">
										Nama Kecamatan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_kec_pd"
											   id="nm_kec_pd" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="nm_desa_pd" class="col-md-5 col-form-label required">
										Nama Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="nm_desa_pd"
											   id="nm_desa_pd" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="tahun_pd" class="col-md-5 col-form-label required">
										Tahun
									</label>
									<div class="col-md-7">
										<input type="number" min="2000" max="2099"
											   class="form-control"
											   name="tahun_pd"
											   id="tahun_pd" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Sumber Pendapatan Desa</h5>
								</div>
								<div class="form-group row">
									<label for="pad_2020" class="col-md-5 col-form-label required">
										Pendapatan asli desa tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pad_2020"
											   id="pad_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pad_2019" class="col-md-5 col-form-label required">
										Pendapatan asli desa tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pad_2019"
											   id="pad_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="dd_2020" class="col-md-5 col-form-label required">
										Dana desa (DD) tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="dd_2020"
											   id="dd_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="dd_2019" class="col-md-5 col-form-label required">
										Dana desa (DD) tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="dd_2019"
											   id="dd_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pajak_2020" class="col-md-5 col-form-label required">
										Bagi hasil pajak dan retribusi daerah tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pajak_2020"
											   id="pajak_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="pajak_2019" class="col-md-5 col-form-label required">
										Bagi hasil pajak dan retribusi daerah tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="pajak_2019"
											   id="pajak_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="add_2020" class="col-md-5 col-form-label required">
										Alokasi dana desa tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="add_2020"
											   id="add_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="add_2019" class="col-md-5 col-form-label required">
										Alokasi dana desa tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="add_2019"
											   id="add_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bp_2020" class="col-md-5 col-form-label required">
										Bantuan provinsi tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bp_2020"
											   id="bp_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bp_2019" class="col-md-5 col-form-label required">
										Bantuan provinsi tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bp_2019"
											   id="bp_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bk_2020" class="col-md-5 col-form-label required">
										Bantuan kabupaten/kota tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bk_2020"
											   id="bk_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="bk_2019" class="col-md-5 col-form-label required">
										Bantuan kabupaten/kota tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="bk_2019"
											   id="bk_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="lain_2020" class="col-md-5 col-form-label required">
										Bantuan dari sumber lainnya tahun 2020
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="lain_2020"
											   id="lain_2020" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="lain_2019" class="col-md-5 col-form-label required">
										Bantuan dari sumber lainnya tahun 2019
									</label>
									<div class="col-md-7">
										<input type="number" min="0"
											   class="form-control"
											   name="lain_2019"
											   id="lain_2019" required>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik
											atau koma</small>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>Aset / Kekayaan Desa</h5>
								</div>
								<div class="form-group row">
									<label for="tnh_kasdes" class="col-md-5 col-form-label required">
										Terdapat Tanah Kas Desa / Ulayat
									</label>
									<div class="col-md-7">
										<select name="tnh_kasdes" id="tnh_kasdes" class="form-control">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="kandes" class="col-md-5 col-form-label required">
										Terdapat bangunan kantor desa
									</label>
									<div class="col-md-7">
										<select name="kandes" id="kandes" class="form-control">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="balai" class="col-md-5 col-form-label required">
										Terdapat bangunan balai desa
									</label>
									<div class="col-md-7">
										<select name="balai" id="balai" class="form-control">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="bangunan_lain" class="col-md-5 col-form-label required">
										Terdapat bangunan desa lainnya (sebutkan)
									</label>
									<div class="col-md-7">
										<input type="text" min="0"
											   class="form-control"
											   name="bangunan_lain"
											   id="bangunan_lain">
									</div>
								</div>
								<div class="form-group row">
									<label for="pasar_hewan" class="col-md-5 col-form-label required">
										Terdapat pasar hewan
									</label>
									<div class="col-md-7">
										<select name="pasar_hewan" id="pasar_hewan" class="form-control">
											<option value="">--Pilih--</option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="lelang_ikan" class="col-md-5 col-form-label required">
										Terdapat pasar pelelangan ikan
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="lelang_ikan"
											   id="lelang_ikan" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pasar_pelelang" class="col-md-5 col-form-label required">
										Terdapat Pasar Pelelangan Hasil Pertanian
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pasar_pelelang"
											   id="pasar_pelelang" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="pasar_lain" class="col-md-5 col-form-label required">
										Terdapat Pasar Desa Lainnya (sebutkan)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="pasar_lain"
											   id="pasar_lain" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="aset_desa" class="col-md-5 col-form-label required">
										Terdapat Aset Desa Lainnya (sebutkan)
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="aset_desa"
											   id="aset_desa" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="infoapbdes_mading" class="col-md-5 col-form-label required">
										Papan informasi
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="infoapbdes_mading"
											   id="infoapbdes_mading" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="infoapbdes_mus" class="col-md-5 col-form-label required">
										Musyawarah Desa
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="infoapbdes_mus"
											   id="infoapbdes_mus" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="infoapbdes_we" class="col-md-5 col-form-label required">
										Website
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="infoapbdes_we"
											   id="infoapbdes_we" required>
									</div>
								</div>
								<div class="form-group row">
									<label for="infoapbdes_lain" class="col-md-5 col-form-label required">
										Lainnya
									</label>
									<div class="col-md-7">
										<input type="text"
											   class="form-control"
											   name="infoapbdes_lain"
											   id="infoapbdes_lain" required>
									</div>
								</div>

								<div class="mt-5 text-md-center">
									<h5>JARAK, WAKTU DAN BIAYA DESA KE KECAMATAN DAN KABUPATEN</h5>
								</div>
								<div class="form-group row">
									<label for="ktrdesa_ktrcamat" class="col-md-5 col-form-label required">
										Jarak Kantor Desa Ke kantor Camat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="ktrdesa_ktrcamat"
												   id="ktrdesa_ktrcamat" required>
											<div class="input-group-prepend">
												<span class="input-group-text">km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="wkt_ktrdesa_ktr_camat" class="col-md-5 col-form-label required">
										Waktu Tempuh dari Kantor Desa Ke Kantor Camat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="wkt_ktrdesa_ktr_camat"
												   id="wkt_ktrdesa_ktr_camat" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="biaya_ktrdesa_ktrcamat" class="col-md-5 col-form-label required">
										Total Biaya Transportasi Dari Kantor Desa Ke Kantor Camat
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="number" min="0"
												   class="form-control"
												   name="biaya_ktrdesa_ktrcamat"
												   id="biaya_ktrdesa_ktrcamat" required>
										</div>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik atau koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="ktrdesa_ktrbupati" class="col-md-5 col-form-label required">
										Jarak Kantor Desa Ke kantor Bupati/Walikota
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="ktrdesa_ktrbupati"
												   id="ktrdesa_ktrbupati" required>
											<div class="input-group-prepend">
												<span class="input-group-text">km</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="wkt_ktrdesa_ktr_bupati" class="col-md-5 col-form-label required">
										Waktu Tempuh Kantor Desa Ke Kantor Bupati/Walikota
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<input type="number" min="0"
												   class="form-control"
												   name="wkt_ktrdesa_ktr_bupati"
												   id="wkt_ktrdesa_ktr_bupati" required>
											<div class="input-group-prepend">
												<span class="input-group-text">Menit</span>
											</div>
										</div>
										<small class="text-muted">Hanya angka dan tanda titik saja sebagai koma</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="biaya_ktrdesa_ktrbupati" class="col-md-5 col-form-label required">
										Total Biaya Transportasi Dari Kantor Desa Ke Kantor Bupati/Walikota
									</label>
									<div class="col-md-7">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="number" min="0"
												   class="form-control"
												   name="biaya_ktrdesa_ktrbupati"
												   id="biaya_ktrdesa_ktrbupati" required>
										</div>
										<small class="text-muted">Hanya berupa angka saja, jangan gunakan tanda titik atau koma</small>
									</div>
								</div>

								<div class="mt-3 text-md-center">
									<button class="btn btn-primary m-2" type="button" disabled=""
											id="btn-loading-pd" style="display: none">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										menyimpan data ...
									</button>
									<?php if ($pd == null) : ?>
										<button class="btn btn-info" type="submit" id="btn-submit-pd">Simpan</button>
									<?php endif; ?>
								</div>

								<p class="mt-5 mb-2">Catatan :
									<br>
									<strong style="color: red">
										<?= $pd != null ? 'Anda sudah mengisi data' : 'Anda belum mengisi data' ?>
									</strong>
								</p>
							</form>
						</div>
						<!-- tombol bagian bawah-->
						<div class="row justify-content-between card-footer mx-0 btn-page">
							<div class="col-sm-6 pl-0">
								<a href="#!" class="btn btn-primary btn-sm button-previous">Sebelumnya</a>
							</div>
							<div class="col-sm-6 text-md-right pr-0">
								<a href="#!" class="btn btn-primary btn-sm button-next">Selanjutnya</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: Main content-->
	</div>
</div>
