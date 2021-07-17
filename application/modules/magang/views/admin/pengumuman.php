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

		<!-- [ pengumuman form ] start -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">

					<div class="card-header">
						<h5>Pengumuman</h5>
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
						<button type="button" class="btn btn-primary" data-toggle="collapse"
								data-target="#form-add" aria-expanded="false"
								aria-controls="form-add">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah Pengumuman
						</button>
						<div class="mt-3 collapse col-md-12" id="form-add">
							<form action="<?= site_url('admin/add_pengumuman') ?>" method="post" id="form-add-pengumuman">
								<div class="form-group fill row">
										<label class="col-form-label col-md-3" for="">Judul :</label>
									<div class="col-md-9">
										<input type="text" name="judul" id="judul" class="form-control">
									</div>
								</div>
								<div class="form-group fill row">
									<label class="col-form-label col-md-3" for="">Deskripsi :</label>
									<div class="col-md-9">
										<textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="form-group fill row">
									<label class="col-form-label col-md-3" for="">Tampil di Mahasiswa :</label>
									<div class="switch switch-primary d-inline m-r-10">
										<input name="tampil_mhs" type="checkbox" id="switch-p-1">
										<label for="switch-p-1" class="cr"></label>
									</div>
								</div>
								<div class="form-group fill row">
									<label class="col-form-label col-md-3" for="">Tampil di Dosen :</label>
									<div class="switch switch-primary d-inline m-r-10">
										<input name="tampil_dosen" type="checkbox" id="switch-p-2">
										<label for="switch-p-2" class="cr"></label>
									</div>
								</div>
								<div class="mt-3 text-right">
									<button type="submit" class="btn btn-primary btn-sm has-ripple">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--pengumuman end-->

		<!-- list pengumuman -->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-border-c-blue">
					<div class="card-body">
						<h5 class="card-title">Daftar Pengumuman</h5>
						<div class="mt-3">
							<table class="table dataTable table-borderless table-hover table-responsive-xl" id="tabel-list-pengumuman">
								<thead>
								<tr>
									<th>Judul</th>
									<th>Deskripsi</th>
									<th>Dosen Tampil</th>
									<th>Mahasiswa Tampil</th>
									<th class="text-center">Tanggal</th>
									<th class="text-center">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($pengumuman->result_array() as $p) : ?>
								<tr>
									<td><?= $p['judul'] ?></td>
									<td class="text-wrap" style="text-align: justify"><?= $p['deskripsi'] ?></td>
									<td class="text-center">
										<div class="switch switch-primary d-inline m-r-10">
											<input type="checkbox" id="switch-p-1" <?= $p['tampil_dosen'] == 1 ? 'checked' : '' ?>>
											<label for="switch-p-1" class="cr"></label>
										</div>
									</td>
									<td class="text-center">
										<div class="switch switch-primary d-inline m-r-10">
											<input type="checkbox" id="switch-p-1" <?= $p['tampil_mhs'] == 1 ? 'checked' : '' ?>>
											<label for="switch-p-1" class="cr"></label>
										</div>
									</td>
									<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-danger" id="btn-hapus-pengumuman" data-id="<?= $p['id'] ?>">Hapus</button>
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
		<!-- end pengumuman -->
	</div>
</div>
