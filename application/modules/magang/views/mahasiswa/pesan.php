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
						<h5>Kirim Pesan</h5>
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
						<div class="m-t-2 m-b-3" id="keterangan-pesan"></div>
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#form-kirim-mhs" aria-expanded="false" aria-controls="form-kirim-mhs">
							Kirim Pesan
						</button>
						<div class="collapse" id="form-kirim-mhs">
							<form action="<?= site_url('mahasiswa/kirim') ?>" id="pesan-mhs" method="post">
								<table class="table-borderless">
									<tr>
										<td><label for="" class="col-form-label">Penerima </label></td>
										<td>: &nbsp;</td>
										<td>
											<input type="text" name="penerima" id="input" class="form-control" required>
											<input type="text" name="id_penerima" id="id_penerima" class="form-control" hidden>
										</td>
									</tr>
									<tr>
										<td><small class="text-muted">Ketik satu atau dua kata, sistem akan otomatis mencari.</small></td>
									</tr>
									<tr>
										<td>Isi Pesan</td>
										<td>: &nbsp;</td>
										<td>
										<textarea name="pesan" id="mi" cols="30" rows="10"
												  class="form-control" required></textarea>
										</td>
									</tr>
								</table>
								<div class="mt-3">
									<button type="submit" class="btn btn-sm btn-primary">Kirim</button>
								</div>
							</form>
						</div>

						<div class="mt-5">
							<table id="list-kirim-pesan-dosen" class="table table-responsive table-borderless">
								<thead>
								<tr>
									<th>From</th>
									<th>To:</th>
									<th>Pesan</th>
									<th>Tanggal</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($pesanku->result_array() as $p) : ?>
									<tr>
										<td width="25%" class="sorting_1">
											<div class="d-inline-block align-middle">
												<img src="<?= config_item('magang_foto') . $p['foto_mhs'] ?>"
													 alt="Foto bimbingan" class="img-radius align-top m-r-15"
													 style="width:40px;">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $p['napan'] . ' ' . $p['nabel'] ?></h6>
													<p class="m-b-0"><?= $p['email'] ?></p>
												</div>
											</div>
										</td>
										<td width="25%" class="sorting_1">
											<div class="d-inline-block align-middle">
												<img src="<?= config_item('magang_foto') . $p['foto_dsn'] ?>"
													 alt="Foto pembimbing" class="img-radius align-top m-r-15"
													 style="width:40px;">
												<div class="d-inline-block">
													<h6 class="m-b-0"><?= $p['np'] . ' ' . $p['nb'] ?></h6>
													<p class="m-b-0"><?= $p['email_dsn'] ?></p>
												</div>
											</div>
										</td>
										<td width="35%"><?= $p['isi_pesan'] ?></td>
										<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- List Pesan -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Daftar Pesan</h5>
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
						<table id="tabel-list-mhs-pesan" class="table table-hover dataTable nowrap table-responsive">
							<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="20%">Pengirim</th>
								<th>Isi Pesan</th>
								<th class="text-center">Jumlah</th>
								<th width="10%" class="text-center">Tanggal</th>
								<th width="5%" class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($list_pesan->result_array() as $p) : ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td class="sorting_1">
										<div class="d-inline-block align-middle">
											<img src="<?= base_url() ?>assets/userfiles/<?= $p['foto_dosen'] ?>"
												 alt="Foto bimbingan" class="img-radius align-top m-r-15"
												 style="width:40px;">
											<div class="d-inline-block">
												<h6 class="m-b-0"><?= $p['napan'] . ' ' . $p['nabel'] ?></h6>
												<p class="m-b-0"><?= $p['email_dosen'] ?></p>
											</div>
										</div>
									</td>
									<td><?= $p['isi_pesan'] ?></td>
									<td class="text-center"><?= $p['total'] ?></td>
									<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
									<td>
										<a class="btn btn-sm btn-primary" href="<?= site_url('mahasiswa	/detail_pesan') ?>/<?= $p['id_pengirim'] ?>">Lihat</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>
