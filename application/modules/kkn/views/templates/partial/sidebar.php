<?php
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?= site_url('dashboard') ?>">
				<img src="<?= base_url() ?>assets/landing/image/log.png" alt="" width="90px">
			</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?= site_url('kkn/dashboard') ?>">
				KKN
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="dropdown <?= ($uri2 == 'mahasiswa' || $uri2 == 'dosen' || $uri2 == 'admin') && $uri3 == '' ? 'active':'' ?>">
				<a href="<?= site_url('kkn/dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
			</li>
			<li class="<?= $uri1 == 'profil' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= site_url('kkn/profil') ?>">
					<i class="far fa-user"></i> <span>Profil</span>
				</a>
			</li>

			<?php if (is_admin_kkn()) : ?>
				<li class="menu-header">Administrator</li>
				<li class="dropdown <?= $uri3 == 'mahasiswa' || $uri3 == 'dosen' || $uri3 == 'lokasi' || $uri3 == 'persyaratan' || $uri3 == 'status_register' ? 'active':'' ?>">
					<a href="javascript:void" class="nav-link has-dropdown" data-toggle="dropdown">
						<i class="fas fa-database"></i> <span>Master Data</span>
					</a>
					<ul class="dropdown-menu">
						<li class="<?= $uri3 == 'mahasiswa' ? 'active':'' ?>">
							<a href="<?= site_url('kkn/admin/mahasiswa') ?>">
								<i class="fas fa-users"></i>
								<span>List Mahasiswa</span>
							</a>
						</li>
						<li class="<?= $uri3 == 'dosen' ? 'active':'' ?>">
							<a href="<?= site_url('kkn/admin/dosen') ?>">
								<i class="fas fa-users"></i>
								<span>List Dosen</span>
							</a>
						</li>
						<li class="<?= $uri3 == 'lokasi' ? 'active':'' ?>">
							<a href="<?= site_url('kkn/admin/lokasi') ?>">
								<i class="fas fa-globe-asia"></i>
								<span>List Lokasi</span>
							</a>
						</li>
						<li class="<?= $uri3 == 'persyaratan' ? 'active':'' ?>">
							<a href="<?= site_url('kkn/admin/persyaratan') ?>">
								<i class="fas fa-globe-asia"></i>
								<span>Kelengkapan Syarat</span>
							</a>
						</li>
						<li class="<?= $uri3 == 'status_register' ? 'active':'' ?>">
							<a href="<?= site_url('kkn/admin/status_register') ?>">
								<i class="fas fa-user-edit"></i>
								<span>Status Registrasi</span>
							</a>
						</li>
					</ul>
				</li>
			<?php endif; ?>

			<?php if (is_mahasiswa()) : ?>
			<li class="menu-header">Mahasiswa</li>
			<li class="dropdown <?= $uri3 == 'dokumen' ? 'active':'' ?>">
				<a href="javascript:void" class="nav-link has-dropdown" data-toggle="dropdown">
					<i class="far fa-file-alt"></i> <span>Persyaratan</span>
				</a>
				<ul class="dropdown-menu">
					<li class="<?= $uri3 == 'dokumen' ? 'active':'' ?>">
						<a href="<?= site_url('kkn/mahasiswa/dokumen') ?>">
							<i class="fas fa-file-alt"></i>
							<span>Dokumen</span>
						</a>
					</li>
				</ul>
			</li>
			<!--<li>
				<a class="nav-link" href="<?/*= site_url('kkn/mahasiswa/lokasi') */?>">
					<i class="fas fa-globe-asia fa-fw"></i> <span>Lokasi KKN</span>
				</a>
			</li>-->
			<li class="dropdown <?= $uri3 == 'log' ? 'active':'' ?>">
				<a class="nav-link has-dropdown" data-toogle="dropdown" href="<?= site_url('kkn/mahasiswa/laporan_kemajuan') ?>">
					<i class="fas fa-shopping-bag fa-fw"></i> <span>Pelaksanaan Kegiatan</span>
				</a>
				<ul class="dropdown-menu">
					<li class="<?= $uri3 == 'log' ? 'active':'' ?>">
						<a href="<?= site_url('kkn/mahasiswa/log') ?>">
							<i class="fas fa-edit"></i>
							<span>Log Harian</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="<?= $uri3 = 'laporan_kemajuan' ? 'active':'' ?>">
				<a class="nav-link" href="<?= site_url('kkn/mahasiswa/laporan_kemajuan') ?>">
					<i class="fas fa-file fa-fw"></i> <span>Laporan Kemajuan</span>
				</a>
			</li>
			<li>
				<a class="nav-link" href="<?= site_url('kkn/mahasiswa/laporan_akhir') ?>">
					<i class="fas fa-file-pdf fa-fw"></i> <span>Laporan Akhir</span>
				</a>
			</li>
			<?php endif; ?>

			<li>
				<a class="nav-link" href="#logoutModal" data-toggle="modal">
					<i class="fas fa-sign-out-alt fa-fw"></i> <span>Logout</span>
				</a>
			</li>
		</ul>

		<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
			<a href="javascript:void" class="btn btn-primary btn-lg btn-block btn-icon-split">
				<i class="fas fa-rocket"></i> Petunjuk
			</a>
		</div>
	</aside>
</div>
