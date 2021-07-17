<?php
$id = $_SESSION['id-magang'];
if (is_mhs()) {
	$cek = $this->db->get_where('mahasiswa', ['user_id' => $id])->row_array();
	if ($cek == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
} elseif (is_PA() || is_PAR()) {
	$cek = $this->db->get_where('dosen', ['user_id' => $id])->row_array();
	if (empty($cek) || $cek['foto'] == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
} elseif (is_operator()) {
	$cek = $this->db->get_where('operator', ['user_id' => $id])->row_array();
	if ($cek == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
} elseif (is_SPV()) {
	$cek = $this->db->get_where('dosen', ['user_id' => $id])->row_array();
	if ($cek == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
} else {
	$foto = 'magang/theme/images/user/avatar.png';
}
?>
<nav class="pcoded-navbar menu-light ">
	<div class="navbar-wrapper  ">
		<div class="navbar-content scroll-div ">
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="<?= base_url() ?>assets/<?= $foto ?>"
						 alt="User-Profile-Image">
					<div class="user-details">
						<div id="more-details"><?= $this->session->userdata('napan') ?> <?= $_SESSION['nabel'] ?> <i
									class="fa fa-caret-down"></i>
						</div>
					</div>
				</div>
				<div class="collapse" id="nav-user-link">
					<ul class="list-inline text-center">
						<li class="list-inline-item">
							<a href="<?= site_url('magang/profil') ?>" data-toggle="tooltip" title="View Profile">
								<i class="feather icon-user"></i>
							</a>
						</li>
						<?php if (is_mhs() || is_PA() || is_PAR() || is_SPV()) : ?>
							<li class="list-inline-item">
								<a href="#">
									<i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i>
									<!--<small class="badge badge-pill badge-danger">2</small>-->
								</a>
							</li>
						<?php endif; ?>
						<li class="list-inline-item">
							<a href="<?= site_url('magang/login/logout') ?>" data-toggle="tooltip" title="Logout"
							   class="text-danger">
								<i class="feather icon-power"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption">
					<label>Menu Utama</label>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('magang/switch_page') ?>" class="nav-link ">
							<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('magang/profil') ?>">
						<span class="pcoded-micon">
							<i class="feather icon-user-check"></i>
						</span>
						<span>Profil</span>
					</a>
				</li>
				<?php if (is_admin() || is_mhs() || is_PA() || is_PAR() || is_SPV()) : ?>
					<li class="nav-item">
						<a href="<?= site_url('magang/pesan') ?>">
						<span class="pcoded-micon">
							<i class="feather icon-message-circle"></i>
						</span>
							<span>Pesan</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- Begin Admin Panel-->
				<?php if (is_admin()) : ?>
					<li class="nav-item pcoded-menu-caption">
						<label>Admin Panel</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="javascript:void(0)" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-book"></i>
							</span>
							<span class="pcoded-mtext">Manajemen Menu</span>
						</a>
						<ul class="pcoded-submenu">
							<li><a href="<?= site_url('magang/admin/main_menu') ?>">Menu Utama</a>
							</li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="javascript:void(0)" class="nav-link">
							<span class="pcoded-micon">
								<i class="feather icon-settings"></i>
							</span>
							<span class="pcoded-mtext">Manajemen Data</span>
						</a>
						<ul class="pcoded-submenu">
							<li><a href="<?= site_url('magang/admin/fokus_kegiatan') ?>">Fokus Kegiatan</a>
							</li>
							<li><a href="<?= site_url('magang/admin/fakultas') ?>">Fakultas</a>
							</li>
							<li><a href="<?= site_url('magang/admin/prodi') ?>">Program Studi</a>
							</li>
							<li><a href="<?= site_url('magang/admin/bimbingan') ?>">List Bimbingan</a></li>
							<li><a href="<?= site_url('magang/admin/approve_dosen') ?>">Approve Dosen</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="javascript:void(0)" class="nav-link">
							<span class="pcoded-micon">
								<i class="feather icon-users"></i>
							</span>
							<span class="pcoded-mtext">Manajemen User</span>
						</a>
						<ul class="pcoded-submenu">
							<li><a href="<?= site_url('magang/admin/show_mahasiswa') ?>">
									Mahasiswa
									<?php if (!empty(belum_aktif(5))) : ?>
										<small class="badge badge-pill badge-danger">
											<?= belum_aktif(5) ?>
										</small>
									<?php endif; ?>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/admin/dosen_dpl') ?>">
									Dosen Pembimbing Lapangan
									<?php if (!empty(belum_aktif(2))) : ?>
										<small class="badge badge-pill badge-danger">
											<?= belum_aktif(2) ?>
										</small>
									<?php endif; ?>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/admin/dosen_par') ?>">
									Dosen Pembimbing Artikel Ilmiah
									<?php if (!empty(belum_aktif(3))) : ?>
										<small class="badge badge-pill badge-danger">
											<?= belum_aktif(3) ?>
										</small>
									<?php endif; ?>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/admin/supervisor') ?>">
									Supervisor Mitra
									<?php if (!empty(belum_aktif(4))) : ?>
										<small class="badge badge-pill badge-danger">
											<?= belum_aktif(4) ?>
										</small>
									<?php endif; ?>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/admin/operator') ?>">
									Operator
									<?php if (!empty(belum_aktif(7))) : ?>
										<small class="badge badge-pill badge-danger">
											<?= belum_aktif(7) ?>
										</small>
									<?php endif; ?>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/admin/penugasan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-check-circle"></i>
							</span>
							<span class="pcoded-mtext">Penugasan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/admin/magang_mahasiswa') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-command"></i>
							</span>
							<span class="pcoded-mtext">Magang Mahasiswa</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/admin/list_lokasi') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-map-pin"></i>
							</span>
							<span class="pcoded-mtext">List Lokasi Magang</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/admin/pengumuman') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-upload-cloud"></i>
							</span>
							<span class="pcoded-mtext">Pengumuman</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/admin/grafik') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-pie-chart"></i>
							</span>
							<span class="pcoded-mtext">Grafik Realtime</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- End admin panel-->

				<!-- Start: operator panel -->
				<?php if (is_operator()) : ?>
					<li class="nav-item pcoded-menu-caption">
						<label>Operator Panel</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="javascript:void(0)" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-users"></i>
							</span>
							<span class="pcoded-mtext">Manajemen User</span>
						</a>
						<ul class="pcoded-submenu">
							<li><a href="<?= site_url('operator/show_mahasiswa') ?>">
									Mahasiswa
									<small class="badge badge-pill badge-danger">
										<?= belum_aktif(5) ?>
									</small>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/operator/dosen_dpl') ?>">
									Dosen Pembimbing Lapangan
									<small class="badge badge-pill badge-danger">
										<?= belum_aktif(2) ?>
									</small>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/operator/dosen_par') ?>">
									Dosen Pembimbing Artikel Ilmiah
									<small class="badge badge-pill badge-danger">
										<?= belum_aktif(3) ?>
									</small>
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/operator/supervisor') ?>">
									Supervisor Mitra
									<small class="badge badge-pill badge-danger">
										<?= belum_aktif(4) ?>
									</small>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/operator/penugasan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-check-circle"></i>
							</span>
							<span class="pcoded-mtext">Penugasan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/operator/magang_mahasiswa') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-tablet"></i>
							</span>
							<span class="pcoded-mtext">Magang Mahasiswa</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/operator/pengumuman') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-upload-cloud"></i>
							</span>
							<span class="pcoded-mtext">Pengumuman</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- End: operator panel -->

				<!-- Begin Mahasiswa Panel-->
				<?php if (is_mhs()) : ?>
					<li class="nav-item pcoded-menu-caption">
						<label>Mahasiswa Panel</label>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/mahasiswa/kegiatan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit-1"></i>
							</span>
							<span class="pcoded-mtext">Log Harian</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/mahasiswa/laporan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-upload-cloud"></i>
							</span>
							<span class="pcoded-mtext">Laporan</span>
						</a>
					</li>

					<!--Mohon akses hanya jika magang generalis-->
					<?php if (cek_lingkup() == 1) : ?>
						<li class="nav-item">
							<a href="<?= site_url('magang/mahasiswa/data_demografi') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
								<span class="pcoded-mtext">Data Demografi</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('magang/mahasiswa/data_geotop') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="fas fa-atlas fa-fw"></i>
							</span>
								<span class="pcoded-mtext">Data GeoTop</span>
							</a>
						</li>
					<?php endif; ?>

					<li class="nav-item">
						<a href="<?= site_url('magang/mahasiswa/bantuan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="fa fa-question fa-fw"></i>
							</span>
							<span class="pcoded-mtext">Bantuan</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- End Mahasiswa panel-->

				<!-- Begin User Panel-->
				<?php if (is_PA() || is_PAR()) : ?>
					<li class="nav-item pcoded-menu-caption">
						<label>Dosen Panel</label>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/dosen/kegiatan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit-1"></i>
							</span>
							<span class="pcoded-mtext">Log Harian</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/dosen/bimbingan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
							<span class="pcoded-mtext">Tambah Bimbingan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/dosen/laporan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-upload-cloud"></i>
							</span>
							<span class="pcoded-mtext">Laporan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/dosen/approve') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
							<span class="pcoded-mtext">Persetujuan</span>
						</a>
					</li>
				<?php endif; ?>

				<?php if (is_SPV()) : ?>
					<li class="nav-item pcoded-menu-caption">
						<label>Supervisor Panel</label>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/supervisor/kegiatan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit-1"></i>
							</span>
							<span class="pcoded-mtext">Log Harian</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/supervisor/bimbingan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
							<span class="pcoded-mtext">Tambah Bimbingan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/supervisor/laporan') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-upload-cloud"></i>
							</span>
							<span class="pcoded-mtext">Laporan</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= site_url('magang/supervisor/approve') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-edit"></i>
							</span>
							<span class="pcoded-mtext">Persetujuan</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- End user level panel-->
				<li class="nav-item">
					<a href="<?= site_url('magang/login/logout') ?>" class="nav-link ">
							<span class="pcoded-micon">
								<i class="feather icon-log-out"></i>
							</span>
						<span class="pcoded-mtext">Logout</span>
					</a>
				</li>
			</ul>

			<div class="card text-center">
				<div class="card-block">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<img src="<?= base_url() ?>assets/magang/auth/images/utu.png" alt="" height="50px">
					<h6 class="mt-3">Universitas <br> Teuku Umar</h6>
					<p>Sistem Informasi Magang & KKN Online</p>
					<p>Versi 1.0</p>
					<p>Page loaded in <?= $this->benchmark->elapsed_time() ?> s</p>
				</div>
			</div>

		</div>
	</div>
</nav>
