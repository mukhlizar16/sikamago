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
						<h5><?= anchor('magang/supervisor/pesan', 'Pesan') ?> / Detil Pesan</h5>
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
						<table id="tbl-mitra-balas-pesan" class="table table-hover dataTable nowrap table-responsive">
							<thead>
							<tr>
								<th width="5%" class="text-center">No</th>
								<th width="20%">Pengirim</th>
								<th>Isi Pesan</th>
								<th width="10%" class="text-center">Tanggal</th>
								<th width="5%" class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($pesan->result_array() as $p) : ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td class="sorting_1">
										<div class="d-inline-block align-middle">
											<div class="d-inline-block">
												<h6 class="m-b-0"><?= $p['napan'] . ' ' . $p['nabel'] ?></h6>
												<p class="m-b-0"><?= $p['email'] ?></p>
											</div>
										</div>
									</td>
									<td>
										<?php if($p['status'] == 0) { ?>
												<b style="color: blue"><?= $p['isi_pesan'] ?></b>
										<?php }else{ ?>
												<?= $p['isi_pesan'] ?>
										<?php } ?>
									</td>
									<td class="text-center"><?= tgl_jam_indo($p['tgl']) ?></td>
									<td class="text-center">
										<?php
										if($p['status'] == 0) {	?>
												<button id="btn-baca" class="btn btn-sm btn-primary has-ripple" data_id="<?= $p['id_pesan'] ?>">
													<i class="feather icon-check-circle"></i>
												</button>
										<?php }else{ ?>
											<button id="belum-baca" class="btn btn-sm btn-warning" data_id="<?= $p['id_pesan'] ?>" data-toggle="tooltip" title="tandai sudah baca">
												<i class="feather icon-x"></i>
											</button>
										<?php } ?>
										<button type="button" class="btn btn-sm btn-danger" id="btn-hapus-pesan" data_id="<?= $p['id_pesan'] ?>">Hapus</button>
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
						<form action="<?= site_url('magang/supervisor/balas_pesan') ?>" method="post" id="mitra-balas-pesan">
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
