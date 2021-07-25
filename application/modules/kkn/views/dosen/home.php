<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header">
					<h4>Beranda</h4>
				</div>
				<div class="card-body">
					Ini halaman dosen
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-warning">
				<div class="card-header">
					<h4><i class="fas fa-bullhorn fa-fw"></i> Pengumuman</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table-borderless" style="border-collapse: collapse" width="100%">
							<tbody>
							<?php foreach ($pengumuman as $p) : ?>
							<tr>
								<td>
									<div>
										<strong style="color: #ee6920">
											<i class="fas fa-bell"></i> <?= $p['judul'] ?>
										</strong>
										<ul>
											<div>
												<table class="table-borderless" style="border-collapse: collapse"
													   width="100%">
													<tbody>
													<tr>
														<td>
															<li>
																<?= $p['isi'] ?>
															</li>
															<?php if (! empty($p['berkas'])) : ?>
															<li>
																<a href="<?= base_url() ?>assets/kkn/userfiles/pengumuman/<?= $p['berkas'] ?>" target="_blank">
																	<i class="fas fa-file-alt"></i> Berkas
																</a>
															</li>
															<?php endif; ?>
														</td>
													</tr>
													</tbody>
												</table>
											</div>
										</ul>
										<hr>
									</div>
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
</section>
