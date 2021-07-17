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
					<div class="card-body">
						<ul class="nav nav-pills bg-white" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="kesehatan-tab" data-toggle="tab"
								   href="#kesehatan" role="tab" aria-controls="kesehatan"
								   aria-selected="true">Kesehatan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="perikanan-tab" data-toggle="tab"
								   href="#perikanan" role="tab" aria-controls="perikanan" aria-selected="false">Perikanan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="sosial-tab" data-toggle="tab" href="#sosial"
								   role="tab" aria-controls="sosial" aria-selected="false">Sosial</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="ekonomi-tab" data-toggle="tab" href="#ekonomi"
								   role="tab" aria-controls="ekonomi" aria-selected="false">Ekonomi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="pertanian-tab" data-toggle="tab"
								   href="#pertanian" role="tab" aria-controls="pertanian" aria-selected="false">Pertanian</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="teknik-tab" data-toggle="tab"
								   href="#teknik" role="tab" aria-controls="teknik" aria-selected="false">Teknik</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-content" id="myTabContent">
					<!-- start: tab-kesehatan -->
					<div class="tab-pane fade show active" id="kesehatan" role="tabpanel"
						 aria-labelledby="kesehatan-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang kesehatan sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Kesehatan</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#kesehatan-form" aria-expanded="false"
												aria-controls="kesehatan-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="kesehatan-form">
											<div class="card-body">
												<h5 class="card-title text-center mb-3">Tambah Data Kesehatan</h5>
												<div class="mb-5">
													<h6>Data Daerah</h6>
													<span>Kabupaten: <b><?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?></b></span><br>
													<span>Kecamatan: <b><?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?></b></span><br>
													<span>Kelurahan/Desa: <b><?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?></b></span>
												</div>
												<div>
													<form action="<?= site_url('mahasiswa/tambah_data_kesehatan') ?>"
														  method="post" id="form-data-kesehatan">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="wanita_subur">Jumlah
																		wanita subur :</label>
																	<input type="text" id="wanita_subur"
																		   name="wanita_subur" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="pasangan_subur">Jumlah
																		pasangan usia subur :</label>
																	<input type="text" id="pasangan_subur"
																		   name="pasangan_subur"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="ibu_bersalin">Jumlah
																		ibu bersalin :</label>
																	<input type="text" id="ibu_bersalin"
																		   name="ibu_bersalin" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="kematian_ibu">Jumlah
																		kematian ibu :</label>
																	<input type="text" id="kematian_ibu"
																		   name="kematian_ibu" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="kematian_balita">Jumlah
																		kematian balita :</label>
																	<input type="text" id="kematian_balita"
																		   name="kematian_balita" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="masyarakat_sakit">Jumlah masyarakat yang
																		sakit :</label>
																	<input type="text" id="masyarakat_sakit"
																		   name="masyarakat_sakit" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="pasangan_menikah">Jumlah Pasangan
																		menikah :</label>
																	<input type="text" id="pasangan_menikah"
																		   name="pasangan_menikah" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="ibu_hamil">Jumlah
																		ibu hamil :</label>
																	<input type="text" id="ibu_hamil" name="ibu_hamil"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="ibu_nifas">Jumlah
																		ibu nifas :</label>
																	<input type="text" id="ibu_nifas" name="ibu_nifas"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="kematian_bayi">Jumlah
																		kematian bayi :</label>
																	<input type="text" id="kematian_bayi"
																		   name="kematian_bayi" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="kematian_kk">Jumlah
																		kematian kepala keluarga :</label>
																	<input type="text" id="kematian_kk"
																		   name="kematian_kk" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tgl">Tanggal
																				:</label>
																			<select name="tanggal" id="tgl"
																					class="form-control" required>
																				<option value=""></option>
																				<?php for ($i = 1; $i <= 31; $i++) {
																					echo '<option value="' . $i . '">' . $i . '</option>';
																				} ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="bulan">Bulan
																				:</label>
																			<select name="bulan" id="bulan"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="1">Januari</option>
																				<option value="2">Februari</option>
																				<option value="3">Maret</option>
																				<option value="4">April</option>
																				<option value="5">Mei</option>
																				<option value="6">Juni</option>
																				<option value="7">Juli</option>
																				<option value="8">Agustus</option>
																				<option value="9">September</option>
																				<option value="10">Oktober</option>
																				<option value="11">November</option>
																				<option value="12">Desember</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tahun">Tahun
																				:</label>
																			<select name="tahun" id="tahun"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mt-3 text-center">
															<input type="text" name="kabupaten" class="form-control"
																   value="<?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?>"
																   hidden>
															<input type="text" name="kecamatan" class="form-control"
																   value="<?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?>"
																   hidden>
															<input type="text" name="kelurahan" class="form-control"
																   value="<?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?>"
																   hidden>
															<button type="submit" class="btn btn-primary has-ripple">
																Simpan
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- start: graph-->
						<div class="row">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5>Grafik</h5>
										<div class="card-header-right">
											<div class="btn-group card-option">
												<button type="button" class="btn dropdown-toggle btn-icon"
														data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
													<i class="feather icon-more-horizontal"></i>
												</button>
												<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
													<li class="dropdown-item full-card"><a href="#!"><span><i
																		class="feather icon-maximize"></i> maximize</span><span
																	style="display:none"><i
																		class="feather icon-minimize"></i> Restore</span></a>
													</li>
													<li class="dropdown-item minimize-card"><a href="#!"><span><i
																		class="feather icon-minus"></i> collapse</span><span
																	style="display:none"><i
																		class="feather icon-plus"></i> expand</span></a>
													</li>
													<li class="dropdown-item reload-card"><a href="#!"><i
																	class="feather icon-refresh-cw"></i> reload</a></li>
													<li class="dropdown-item close-card"><a href="#!"><i
																	class="feather icon-trash"></i>
															remove</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="text-center">
											<h6>Data Demografi Kesehatan</h6>
										</div>
										<div class="col-md-3 mb-3" style="text-align: right">
											<form class="form-inline" action="">
												<select name="tahun" id="" class="form-control">
													<option value="">2020</option>
													<option value="">2021</option>
												</select>
												<div class="ml-2">
													<button class="btn btn-sm btn-primary">
														<i class="feather icon-search"></i> Cari
													</button>
												</div>
											</form>
										</div>
										<div id="grafik">

										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: graph-->
					</div>
					<!-- end: tab-kesehatan -->
					<!-- start: tab-perikanan -->
					<div class="tab-pane fade" id="perikanan" role="tabpanel" aria-labelledby="perikanan-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang perikanan sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Perikanan</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#perikanan-form" aria-expanded="false"
												aria-controls="perikanan-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="perikanan-form">
											<div class="card-body">
												<h5 class="card-title text-center mb-3">Tambah Data Perikanan</h5>
												<div>
													<form action="<?= site_url('mahasiswa/tambah_data_perikanan') ?>"
														  method="post" id="form-data-perikanan">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="jenis_ikan">Jenis
																		ikan :</label>
																	<input type="text" name="jenis_ikan" id="jenis_ikan"
																		   class="form-control"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="harga_ikan">Harga
																		ikan :</label>
																	<input type="text" name="harga_ikan" id="harga_ikan"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																			required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="ikan_tawar">Jumlah
																		produksi ikan air tawar :</label>
																	<input type="text" name="ikan_tawar"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="udang_windu">Jumlah
																		produksi udang windu :</label>
																	<input type="text" name="udang_windu"
																		   id="udang_windu" class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="vanamae">Jumlah
																		produksi udang vanamae :</label>
																	<input type="text" name="udang_vanamae" id="vanamae"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="kerang">Jumlah
																		produksi kerang-kerangan :</label>
																	<input type="text" name="kerang" id="kerang"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="kepiting">Jumlah
																		produksi crustacea (kepiting) :</label>
																	<input type="text" name="kepiting" id="kepiting"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="alat_tangkap">Jenis
																		alat tangkap :</label>
																	<input type="text" name="alat_tangkap"
																		   id="alat_tangkap" class="form-control" required>
																</div>
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tgl_perikanan">Tanggal
																				:</label>
																			<select name="tgl_perikanan" id="tgl_perikanan"
																					class="form-control" required>
																				<option value=""></option>
																				<?php for ($i = 1; $i <= 31; $i++) {
																					echo '<option value="' . $i . '">' . $i . '</option>';
																				} ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="bulan_perikanan">Bulan
																				:</label>
																			<select name="bln_perikanan" id="bulan_perikanan"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="1">Januari</option>
																				<option value="2">Februari</option>
																				<option value="3">Maret</option>
																				<option value="4">April</option>
																				<option value="5">Mei</option>
																				<option value="6">Juni</option>
																				<option value="7">Juli</option>
																				<option value="8">Agustus</option>
																				<option value="9">September</option>
																				<option value="10">Oktober</option>
																				<option value="11">November</option>
																				<option value="12">Desember</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tahun_perikanan">Tahun
																				:</label>
																			<select name="thn_perikanan" id="tahun_perikanan"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mt-3 text-center">
															<input type="text" name="kabupaten" class="form-control"
																   value="<?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?>"
																   hidden>
															<input type="text" name="kecamatan" class="form-control"
																   value="<?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?>"
																   hidden>
															<input type="text" name="kelurahan" class="form-control"
																   value="<?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?>"
																   hidden>
															<button type="submit" class="btn btn-primary has-ripple">
																Simpan
															</button>
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
					<!-- end: tab-perikanan -->
					<!-- start: tab-sosial -->
					<div class="tab-pane fade" id="sosial" role="tabpanel" aria-labelledby="sosial-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang sosial sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Sosial</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#sosial-form" aria-expanded="false"
												aria-controls="sosial-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="sosial-form">
											<div class="card-body">
												<h5 class="card-title text-center mb-3">Tambah Data Sosial</h5>
												<div>
													<form id="form-submit-data-sosial">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="anak_yatim">Jumlah
																		anak yatim :</label>
																	<input type="text" name="anak_yatim" id="anak_yatim"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="anak_piatu">Jumlah
																		anak piatu :</label>
																	<input type="text" name="anak_piatu" id="anak_piatu"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="yatim_piatu">Jumlah
																		anak yatim-piatu :</label>
																	<input type="text" name="yatim_piatu"
																		   id="yatim_piatu" class="form-control"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="siswa_prestasi">Jumlah
																		siswa berprestasi :</label>
																	<input type="text" name="siswa_prestasi"
																		   id="siswa_prestasi" class="form-control"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="organisasi">Jumlah
																		organisasi gampong :</label>
																	<input type="text" name="organisasi" id="organisasi"
																		   class="form-control" required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="kurang_mampu">Jumlah
																		warga kurang mampu :</label>
																	<input type="text" name="kurang_mampu"
																		   id="kurang_mampu" class="form-control"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="penduduk">Jumlah
																		Penduduk :</label>
																	<input type="text" name="penduduk" id="penduduk"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="pekerjaan">Jenis
																		pekerjaan :</label>
																	<textarea class="form-control" name="pekerjaan"
																			  id="pekerjaan" cols="10"
																			  required></textarea>
																	<small class="text-muted">Pisahkan dengan tanda koma
																		(,) apabila lebih dari satu jenis
																		pekerjaan.</small>
																</div>
																<div><br></div>
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tgl_sosial">Tanggal
																				:</label>
																			<select name="tgl_sosial" id="tgl_sosial"
																					class="form-control" required>
																				<option value=""></option>
																				<?php for ($i = 1; $i <= 31; $i++) {
																					echo '<option value="' . $i . '">' . $i . '</option>';
																				} ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="bulan_sosial">Bulan
																				:</label>
																			<select name="bln_sosial" id="bulan_sosial"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="1">Januari</option>
																				<option value="2">Februari</option>
																				<option value="3">Maret</option>
																				<option value="4">April</option>
																				<option value="5">Mei</option>
																				<option value="6">Juni</option>
																				<option value="7">Juli</option>
																				<option value="8">Agustus</option>
																				<option value="9">September</option>
																				<option value="10">Oktober</option>
																				<option value="11">November</option>
																				<option value="12">Desember</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tahun_sosial">Tahun
																				:</label>
																			<select name="thn_sosial" id="tahun_sosial"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mt-3 text-center">
															<input type="text" name="kabupaten" class="form-control"
																   value="<?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?>"
																   hidden>
															<input type="text" name="kecamatan" class="form-control"
																   value="<?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?>"
																   hidden>
															<input type="text" name="kelurahan" class="form-control"
																   value="<?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?>"
																   hidden>
															<button type="submit" class="btn btn-primary has-ripple">
																Simpan
															</button>
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
					<!-- end: tab-sosial -->
					<!-- start: tab-ekonomi -->
					<div class="tab-pane fade" id="ekonomi" role="tabpanel" aria-labelledby="ekonomi-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang ekonomi sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Ekonomi</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#ekonomi-form" aria-expanded="false"
												aria-controls="perikanan-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="ekonomi-form">
											<div class="card-body">
												<div class="card-title text-center">
													<h5>Tambah Data Ekonomi</h5>
													<small class="text-muted"><sup>*</sup>Tulis angka saja</small>
												</div>

												<div class="bt-3">
													<form action="<?= site_url('mahasiswa/tambah_data_ekonomi') ?>"
														  method="post" id="form-data-ekonomi">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="pendapatan">Rata-rata
																		pendapatan (UMR) :</label>
																	<input type="text" id="pendapatan" name="pendapatan"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="umkm">Jumlah UMKM
																		:</label>
																	<input type="text" id="umkm" name="umkm"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group fill">
																	<label class="floating-label" for="industri">Jumlah
																		industri rumah tangga :</label>
																	<input type="text" id="industri" name="industri"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tgl_ekonomi">Tanggal
																				:</label>
																			<select name="tgl_ekonomi" id="tgl_ekonomi"
																					class="form-control" required>
																				<option value=""></option>
																				<?php for ($i = 1; $i <= 31; $i++) {
																					echo '<option value="' . $i . '">' . $i . '</option>';
																				} ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="bulan_ekonomi">Bulan
																				:</label>
																			<select name="bln_ekonomi" id="bulan_ekonomi"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="1">Januari</option>
																				<option value="2">Februari</option>
																				<option value="3">Maret</option>
																				<option value="4">April</option>
																				<option value="5">Mei</option>
																				<option value="6">Juni</option>
																				<option value="7">Juli</option>
																				<option value="8">Agustus</option>
																				<option value="9">September</option>
																				<option value="10">Oktober</option>
																				<option value="11">November</option>
																				<option value="12">Desember</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tahun_ekonomi">Tahun
																				:</label>
																			<select name="thn_ekonomi" id="tahun_ekonomi"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mt-3 text-center">
															<input type="text" name="kabupaten" class="form-control"
																   value="<?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?>"
																   hidden>
															<input type="text" name="kecamatan" class="form-control"
																   value="<?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?>"
																   hidden>
															<input type="text" name="kelurahan" class="form-control"
																   value="<?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?>"
																   hidden>
															<button type="submit" class="btn btn-primary has-ripple">
																Simpan
															</button>
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
					<!-- end: tab-ekonomi -->
					<!-- start: tab-pertanian -->
					<div class="tab-pane fade" id="pertanian" role="tabpanel" aria-labelledby="pertanian-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang pertanian sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Pertanian</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#pertanian-form" aria-expanded="false"
												aria-controls="perikanan-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="pertanian-form">
											<div class="card-body">
												<div class="card-title text-center">
													<h5>Tambah Data Pertanian</h5>
													<small class="text-muted"><sup>*</sup>Tulis angka saja</small>
												</div>

												<div class="bt-3">
													<form action="<?= site_url('mahasiswa/tambah_data_pertanian') ?>"
														  method="post" id="form-data-pertanian">
														<div class="row">
															<div class="col-md-6">
																<span style="font-weight: bold" class="mb-1">Komoditi Pertanian</span>
																<div class="form-group fill">
																	<label class="floating-label" for="jenis_komoditi">Jenis
																		komoditi :</label>
																	<input type="text" id="jenis_komoditi"
																		   name="jenis_komoditi_pertanian" class="form-control"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="harga_jual">Harga
																		jual per kg :</label>
																	<input type="text" id="harga_jual"
																		   name="harga_jual_pertanian"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label" for="hambatan">Hambatan
																		dalam bidang pertanian :</label>
																	<textarea name="hambatan_pertanian"
																			  class="form-control"
																			  id="hambatan"
																			  cols="30"
																			  rows="5" required></textarea>
																</div>
																<!-- komoditi perkebunan -->
																<span style="font-weight: bold" class="mb-1">Komoditi Perkebunan</span>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="jenis_komoditi_perkebunan">Jenis
																		komoditi :</label>
																	<input type="text" id="jenis_komoditi_perkebunan"
																		   name="jenis_komoditi_perkebunan"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="harga_jual_perkebunan">Harga jual per kg
																		:</label>
																	<input type="text" id="harga_jual_perkebunan"
																		   name="harga_jual_perkebunan"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="hambatan_perkebunan">Hambatan dalam
																		bidang perkebunan :</label>
																	<textarea name="hambatan_perkebunan"
																			  class="form-control"
																			  id="hambatan_perkebunan"
																			  cols="30"
																			  rows="5" required></textarea>
																</div>
															</div>
															<div class="col-md-6">
																<!-- komoditi peternakan -->
																<span style="font-weight: bold" class="mb-1">Komoditi Peternakan</span>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="jenis_komoditi_peternakan">
																		Jenis
																		komoditi :</label>
																	<input type="text" id="jenis_komoditi_peternakan"
																		   name="jenis_komoditi_peternakan"
																		   class="form-control" required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="harga_jual_peternakan">
																		Harga jual per kg :
																	</label>
																	<input type="text" id="harga_jual_peternakan"
																		   name="harga_jual_peternakan"
																		   class="form-control"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label class="floating-label"
																		   for="hambatan_peternakan">
																		Hambatan dalam bidang peternakan :
																	</label>
																	<textarea name="hambatan_peternakan"
																			  class="form-control"
																			  id="hambatan_peternakan"
																			  cols="30"
																			  rows="5" required></textarea>
																</div>
																<div class="form-group fill">
																	<label for="luas_pertanian" class="floating-label">
																		Luas lahan yang digunakan untuk bidang pertanian
																		(m<sup>2</sup>) :
																	</label>
																	<input type="text"
																		   class="form-control"
																		   name="luas_pertanian"
																		   id="luas_pertanian"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label for="luas_perikanan" class="floating-label">
																		Luas lahan yang digunakan untuk bidang perikanan
																		(m<sup>2</sup>) :
																	</label>
																	<input type="text"
																		   class="form-control"
																		   name="luas_perikanan"
																		   id="luas_perikanan"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label for="luas_perkebunan" class="floating-label">
																		Luas lahan yang digunakan untuk bidang perkebunan
																		(m<sup>2</sup>) :
																	</label>
																	<input type="text"
																		   class="form-control"
																		   name="luas_perkebunan"
																		   id="luas_perkebunan"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<div class="form-group fill">
																	<label for="luas_peternakan" class="floating-label">
																		Luas lahan yang digunakan untuk bidang peternakan
																		(m<sup>2</sup>) :
																	</label>
																	<input type="text"
																		   class="form-control"
																		   name="luas_peternakan"
																		   id="luas_peternakan"
																		   onkeypress="return event.charCode >= 48 && event.charCode <=57"
																		   required>
																</div>
																<!-- tanggal -->
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tgl_pertanian">Tanggal
																				:</label>
																			<select name="tgl_pertanian" id="tgl_pertanian"
																					class="form-control" required>
																				<option value=""></option>
																				<?php for ($i = 1; $i <= 31; $i++) {
																					echo '<option value="' . $i . '">' . $i . '</option>';
																				} ?>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="bulan_pertanian">Bulan
																				:</label>
																			<select name="bln_pertanian" id="bulan_pertanian"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="1">Januari</option>
																				<option value="2">Februari</option>
																				<option value="3">Maret</option>
																				<option value="4">April</option>
																				<option value="5">Mei</option>
																				<option value="6">Juni</option>
																				<option value="7">Juli</option>
																				<option value="8">Agustus</option>
																				<option value="9">September</option>
																				<option value="10">Oktober</option>
																				<option value="11">November</option>
																				<option value="12">Desember</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group fill">
																			<label class="floating-label" for="tahun_pertanian">Tahun
																				:</label>
																			<select name="thn_pertanian" id="tahun_pertanian"
																					class="form-control" required>
																				<option value=""></option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="mt-3 text-center">
															<input type="text" name="kabupaten" class="form-control"
																   value="<?= $lokasi['lokasi'] == 'Lainnya' ? $lokasi['lokasi_lain'] : $lokasi['lokasi'] ?>"
																   hidden>
															<input type="text" name="kecamatan" class="form-control"
																   value="<?= $lokasi['kecamatan'] == 'Lainnya' ? $lokasi['kec_lain'] : $lokasi['kecamatan'] ?>"
																   hidden>
															<input type="text" name="kelurahan" class="form-control"
																   value="<?= $lokasi['kelurahan'] == 'Lainnya' ? $lokasi['kel_lain'] : $lokasi['kelurahan'] ?>"
																   hidden>
															<button type="submit" class="btn btn-primary has-ripple">
																Simpan
															</button>
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
					<!-- start: tab-pertanian -->
					<!-- start: tab-teknik -->
					<div class="tab-pane fade" id="teknik" role="tabpanel" aria-labelledby="teknik-tab">
						<div class="row mb-n4">
							<div class="col-md-12">
								<h6 class="text-center mb-3">Isilah data bidang teknik sesuai yang diminta.</h6>
								<div class="card">
									<div class="card-header bg-c-blue">
										<h5 class="text-white">Data Demografi Bidang Teknik</h5>
									</div>
									<div class="card-body">
										<button class="btn btn-info has-ripple" data-toggle="collapse"
												data-target="#teknik-form" aria-expanded="false"
												aria-controls="teknik-form">Tambah
										</button>
										<div class="mt-3 collapse card shadow" id="teknik-form">
											<div class="card-body">
												<h5 class="card-title text-center mb-3">Tambah Data Teknik</h5>
												<div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end: tab-teknik -->
				</div>
			</div>
		</div>
		<!-- END: Main content-->
	</div>
</div>
