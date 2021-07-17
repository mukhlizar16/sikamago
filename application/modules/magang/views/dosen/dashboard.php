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
							<li class="breadcrumb-item"><a href="<?= site_url('Dosen') ?>">
									<i class="feather icon-home"></i>
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="javascript:void(0)">Dashboard</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->

		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header">
						<h5>Informasi</h5>
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
						<?php if ($pengumuman->num_rows() > 0) { ?>
							<?php foreach ($pengumuman->result_array() as $p): ?>
								<span style="font-weight: bold; border-bottom: 1px solid whitesmoke"><?= $p['judul'] ?></span>
								<br>
								<p style="text-align: justify" class="mt-3"><?= $p['deskripsi'] ?></p>
								<div class="row">
									<div class="col-md-6">
										<small class="text-muted author-pengumuman">pembuat: <?= $p['napan'] ?></small>
									</div>
									<div class="col-md-6">
										<small class="text-muted tgl-pengumuman">tanggal: <?= tgl_jam_indo($p['tgl']) ?></small>
									</div>
								</div>
								<br>
								<hr>
							<?php endforeach; ?>
						<?php } else { ?>
							<i class="feather icon-alert-circle" style="color: red"></i> Belum ada pengumuman ...
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="card">
					<div class="card-header">
						<h5>Jadwal Penting</h5>
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
						<p>List Jadwal penting akan muncul disini</p>
					</div>
				</div>
				<div class="card card-border-c-green">
					<div class="card-header">
						<h5>Penetapan SK</h5>
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
						<div class="row">
							<div class="col-md-4">
								<div class="box">
									<a href="">
										<img src="<?= config_item('base_url') ?>assets/magang/theme/images/pdf.png" alt="icon file">
									</a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="description">
									<h6 class="desc-title">SK Penetapan Pembimbing</h6>
									<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore iste
										molestias numquam veritatis. Assumenda, consequatur culpa dolores error esse
										facilis quasi qui saepe veritatis voluptatem? Deserunt iusto nulla perspiciatis
										placeat.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
