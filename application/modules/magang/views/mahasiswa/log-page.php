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
						<h5>Log Harian</h5>
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
						<button type="button" class="btn btn-primary" id="btn-add-log">
							<i class="feather mr-2 icon-plus-circle"></i>Tambah
						</button>
						<div class="mt-3">
							<table id="tabel-mhs-kegiatan"
								   class="table dataTable nowrap table-striped table-responsive table-hover">
								<thead>
								<tr>
									<th class="text-center" style="width: 5%">No</th>
									<th>Uraian Kegiatan</th>
									<th style="width: 30%">Fokus Kegiatan</th>
									<th class="text-center" style="width: 10%">Status</th>
									<th class="text-center" style="width: 10%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach ($kegiatan->result_array() as $k) : ?>
									<tr>
										<!--<td><? /*= ++$start */ ?></td>-->
										<td><?= $no++ ?></td>
										<td class="text-wrap"
											style="text-align: justify"><?= $k['uraian'] ?></td>
										<td class="text-wrap"><?= $k['fokus'] == null ? $k['fokus_lain'] : $k['fokus'] ?></td>
										<td class="text-center">
											<?php if ($k['status'] == 1 && $k['status_spv'] == 1) { ?>
												<button class="btn btn-sm btn-success rounded-circle"><i
															class="feather icon-check-circle"></i></button>
												<button class="btn btn-sm btn-success rounded-circle"><i
															class="feather icon-check-circle"></i></button>
											<?php } elseif ($k['status'] == 1 && $k['status_spv'] == 0) { ?>
												<button class="btn btn-sm btn-success rounded-circle"><i
															class="feather icon-check-circle"></i></button>
												<button class="btn btn-sm btn-danger rounded-circle"><i
															class="feather icon-x"></i></button>
											<?php } elseif ($k['status'] == 0 && $k['status_spv'] == 1) { ?>
												<button class="btn btn-sm btn-danger rounded-circle">
													<i class="feather icon-x"></i>
												</button>
												<button type="button"
														class="btn btn-sm btn-success rounded-circle has-ripple"
														data-toggle="tooltip" title="Disetujui"><i
															class="feather icon-check-circle"></i></button>
											<?php } else { ?>
												<button class="btn btn-sm btn-danger rounded-circle">
													<i class="feather icon-x"></i>
												</button>
												<button class="btn btn-sm btn-danger rounded-circle">
													<i class="feather icon-x"></i>
												</button>
											<?php } ?>
										</td>
										<td class="text-center">
											<button id="btn-hapus"
													class="btn btn-sm btn-danger rounded-circle has-ripple"
													data-id="<?= $k['id_log'] ?>"><i class="feather icon-trash-2"></i>
											</button>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div>
							<?= $pagination ?>
						</div>

						<p>Data kegiatan harian mahasiswa.</p>

						<div class="text-left"
							 style="border: 1px solid lightgrey; background: whitesmoke; width: 100%; border-radius: 5px; padding: inherit">
							<span style="font-size: 14px;">Keterangan:</span>
							<div class="list mt-3">
								<ul style="list-style: none">
									<li>
										<p class="text-muted">
											<button class="btn btn-danger has-ripple btn-sm rounded-circle"><i
														class="feather icon-x"></i></button>
											&nbsp; menyatakan &nbsp; belum disetujui oleh DPL atau Supervisor
										</p>
									</li>
									<li>
										<p class="text-muted">
											<button class="btn btn-sm rounded-circle btn-success has-ripple">
												<i class="feather icon-check-circle"></i>
											</button>
											&nbsp; menyatakan &nbsp; telah disetujui oleh DPL atau Supervisor
										</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Main content-->
</div>


<!-- Modal -->
<div id="modal-log" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-logLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-log-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center mt-5" id="keterangan_modal-log"></div>
				<?php if (cek_lingkup() == 1) : ?>
					<div class="text-center mb-3">
						<span class="text-muted">Khusus Generalis.</span>
					</div>
				<?php endif; ?>

				<form id="form-submit-log" method="post">
					<div class="form-group">
						<label for="uraian">Uraian kegiatan :
							<hr style="border: 1px solid orange; margin-top: 2px">
						</label>
						<textarea class="form-control" name="uraian" cols="30" rows="5"
								  placeholder="klik untuk mengisi" required></textarea>
					</div>

					<?php if (cek_lingkup() == 2) : ?>
						<?php if (cek_bidang() != 'Lainnya') { ?>
							<div class="form-group">
								<label for="fokus">Fokus Kegiatan :</label>
								<select style="white-space: " name="fokus" class="form-control" required>
									<option value="">--Pilih--</option>
									<?php foreach ($fokus->result_array() as $f) : ?>
										<?php if ($f['bagian'] != null) { ?>
											<optgroup label="<?= $f['bagian'] ?>">
												<option value="<?= $f['id'] ?>"><?= $f['nama_kegiatan'] ?></option>
											</optgroup>
										<?php } else { ?>
											<option value="<?= $f['id'] ?>"><?= $f['nama_kegiatan'] ?></option>
										<?php } ?>
									<?php endforeach; ?>
								</select>
							</div>
						<?php } else { ?>
							<div class="form-group">
								<label for="fokus">Fokus Kegiatan :</label>
								<textarea class="form-control" name="fokus_lain" cols="30" rows="5"
										  placeholder="klik untuk mengisi" required></textarea>
							</div>
						<?php } ?>
					<?php endif; ?>

					<div class="text-muted">
						<small>
							<ul style="margin-left: -20px" class="text-muted">
								<li>Mohon diisi dengan kegiatan yang sesuai.</li>
								<li>Setelah disimpan, isian Anda tidak dapat diubah.</li>
								<li>Pilihan akan muncul, jika data profil telah dilengkapi.</li>
								<li>Harus ada kesesuaian antara bidang magang dengan prodi asal.</li>
							</ul>
						</small>
					</div>

					<div class="modal-footer">
						<button id="btn-close-modal-log" type="button" class="btn btn-sm btn-secondary"
								data-dismiss="modal">Tutup
						</button>
						<button id="btn-submit-modal-log" type="submit" class="btn btn-sm btn-primary">Simpan</button>
						<button class="btn  btn-primary m-2" type="button" disabled="" id="btn-loading-modal-log"
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
