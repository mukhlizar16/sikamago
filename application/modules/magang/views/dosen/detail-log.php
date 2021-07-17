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
								<a href="<?= site_url('dosen') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="<?= site_url('dosen/approve') ?>">Approve</a>
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
						<h5>Detail Log Harian Mahasiswa</h5>
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
						<div class="mt-2 mb-4">
							Nama : <b><?= $nama['napan'] . ' ' . $nama['nabel'] ?></b>
							<Br>
							Lokasi : <b><?= $nama['lokasi'] == 'Lainnya' ? $nama['lokasi_lain'] : $nama['lokasi'] ?></b>
						</div>
						<table class="table table-hover table-responsive-xl" id="tabel-detail-log">
							<thead>
							<tr>
								<th class="text-center" style="width: 15%">Tanggal</th>
								<th>Uraian</th>
								<th width="15%">Status</th>
								<th class="text-center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php if ($uraian->num_rows() > 0) { ?>
								<?php foreach ($uraian->result_array() as $u) : ?>
									<tr>
										<td class="text-center"><?= date('d-m-Y', strtotime($u['created_at'])) ?></td>
										<td class="text-wrap" style="text-align: justify"><?= $u['uraian'] ?></td>
										<td>
											<?php if ($u['status'] == 0) { ?>
													<span class="badge badge-secondary">Belum disetujui</span>
											<?php }else{ ?>
												<span class="badge badge-primary">Sudah disetujui</span>
											<?php } ?>
										</td>
										<td class="text-center" style="width: 5%">
											<?php if ($u['status'] == 0) { ?>
												<button id="btn-setuju" type="submit" class="btn btn-sm btn-warning"
														data-id="<?= $u['id'] ?>">
													Setujui
												</button>
											<?php } else { ?>
												<button class="btn btn-sm btn-success" data-toggle="tooltip"
														title="Sudah disetujui">
													<i class="feather icon-check-circle"></i>
												</button>
											<?php } ?>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php } else { ?>
								<tr>
									<td class="text-center" colspan="3">
										-- Tidak ada data --
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>

						<div class="mt-5 mb-3">
							<span style="line-height: 2rem; font-weight: bold">Keterangan :</span>
							<br>
							Tombol
							<button class="btn btn-sm btn-success"><i class="feather icon-check-circle"></i>
							</button> &nbsp; menyatakan bahwa Bapak/Ibu sudah menyetujui.
						</div>

						<div class="mt-5">
							<a class="btn btn-sm btn-primary" href="<?= site_url('magang/dosen/approve') ?>">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>
