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
			<div class="col-sm-6 col-md-12">
				<div class="card card-border-c-red">
					<div class="card-header">
						<h5 class="mb-3">Informasi</h5>
					</div>
					<div class="card-body">
						<?php if($pengumuman->num_rows() > 0) { ?>
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
						<?php }else{ ?>
							<i class="feather icon-alert-circle" style="color: red"></i> Belum ada pengumuman ...
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
