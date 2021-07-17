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
						<h5><?= anchor('magang/mahasiswa/pesan', 'Pesan') ?> / Detil Pesan</h5>
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
						<table id="tabel-list-mhs-bls-pesan" class="table table-hover table-responsive-xl dataTable nowrap">
							<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="20%">Penerima</th>
								<th>Isi Pesan</th>
								<th width="10%" class="text-center">Tanggal</th>
								<th width="5%" class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($detail_pesan->result_array() as $d) : ?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td class="sorting_1">
										<div class="d-inline-block align-middle">
											<div class="d-inline-block">
												<h6 class="m-b-0"><?= $d['napan'] . ' ' . $d['nabel'] ?></h6>
												<p class="m-b-0"><?= $d['email'] ?></p>
											</div>
										</div>
								</td>
								<td><?= $d['isi_pesan'] ?></td>
								<td class="text-center"><?= tgl_jam_indo($d['tgl']) ?></td>
								<td class="text-center">
									<?php
									if($d['status'] == 0) {	?>
										<button type="button" id="btn-baca" class="btn btn-sm btn-primary has-ripple" data_id="<?= $d['id_pesan'] ?>" data-toggle="tooltip" title="tandai sudah baca">
											<i class="feather icon-check-circle"></i>
										</button>
									<?php }else{ ?>
										<button type="button" id="btn-belum-baca" class="btn btn-sm btn-warning" data_id="<?= $d['id_pesan'] ?>" data-toggle="tooltip" title="tandai sudah baca">
											<i class="feather icon-x"></i>
										</button>
									<?php } ?>
									<button class="btn btn-sm btn-danger" id="btn-hapus-pesan" data_id="<?= $d['id_pesan'] ?>" type="submit">Hapus</button>
								</td>
							</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- List Pesan -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card">

					<div class="card-header">
						<h5>Tulis Pesan</h5>
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
					<!-- konten -->
					<div class="card-body">
						<form action="<?= site_url('magang/mahasiswa/balas_pesan') ?>" method="post" id="mhs-balas-pesan">
							<div class="form-group">
								<label for="pesan">Isi Pesan :</label>
								<input type="text" class="form-control" name="penerima" value="<?= $penerima ?>" hidden>
								<textarea id="tinymce-editor" name="pesan">Ketik pesan disini...</textarea>
							</div>
							<div class="float-right mt-3">
								<button type="submit" class="btn waves-effect waves-light btn-primary">Kirim</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>

