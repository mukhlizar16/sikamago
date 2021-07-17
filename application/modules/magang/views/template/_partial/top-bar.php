<?php
$id = $_SESSION['id-magang'];
if (is_mhs()) {
	$cek = $this->db->get_where('mahasiswa', ['user_id' => $id])->row_array();
	if($cek == null){
		$foto = 'magang/theme/images/user/avatar.png';
	}else{
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
}elseif (is_PA() || is_PAR()) {
	$cek = $this->db->get_where('dosen', ['user_id' => $id])->row_array();
	if(empty($cek) || $cek['foto'] == null){
		$foto = 'magang/theme/images/user/avatar.png';
	}else{
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
}elseif(is_operator()){
	$cek = $this->db->get_where('operator', ['user_id' => $id])->row_array();
	if ($cek == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
}elseif (is_SPV()){
	$cek = $this->db->get_where('dosen', ['user_id' => $id])->row_array();
	if ($cek == null) {
		$foto = 'magang/theme/images/user/avatar.png';
	} else {
		$foto = 'magang/userfiles/' . $cek['foto'];
	}
}else{
	$foto = 'magang/theme/images/user/avatar.png';
}
?>
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)"><span></span></a>
		<a href="<?= site_url() ?>" class="b-brand">
			<!-- ========   change your logo hear   ============ -->
			<img src="<?= config_item('base_url') ?>assets/magang/theme/images/logo-dark.png" alt="" class="logo">

		</a>
		<a href="#!" class="mob-toggler">
			<i class="feather icon-more-vertical"></i>
		</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
				<div class="search-bar">
					<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
					<button type="button" class="close" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li>
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
								class="icon feather icon-bell"></i></a>
					<div class="dropdown-menu dropdown-menu-right notification">
						<div class="noti-head">
							<h6 class="d-inline-block m-b-0">Notifications</h6>
						</div>
						<ul class="noti-body">
							<li class="n-title">
								<p class="m-b-0">Pesan Baru</p>
							</li>
							<!--<li class="notification">
								<div class="media">
									<img class="img-radius" src="<?/*= config_item('theme_image') */?>user/avatar-1.jpg"
										 alt="Generic placeholder image">
									<div class="media-body">
										<p><strong>John Doe</strong><span class="n-time text-muted"><i
														class="icon feather icon-clock m-r-10"></i>5 min</span></p>
										<p>New ticket Added</p>
									</div>
								</div>
							</li>-->
						</ul>
						<div class="noti-footer">
							<a class="btn btn-sm btn-outline-primary" style="text-decoration: none" href="#!">Lihat
								semua</a>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="dropdown drp-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="feather icon-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-notification">
						<div class="pro-head">
							<img src="<?= base_url() ?>assets/<?= $foto ?>" class="img-radius"
								 alt="User-Profile-Image">
							<span>
								<?= $_SESSION['napan'] ?> <?= $_SESSION['nabel'] ?>
								<br><small class="text-muted"><?= login_log() ?></small>
							</span>
							<a href="<?= site_url('magang/login/logout') ?>" class="dud-logout" title="Logout">
								<i class="feather icon-log-out"></i>
							</a>
						</div>
						<ul class="pro-body">
							<li>
								<a href="<?= site_url('magang/profil') ?>" class="dropdown-item">
									<i class="feather icon-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="<?= site_url('magang/login/logout') ?>" class="dropdown-item">
									<i class="feather icon-power"></i>
									Logout
								</a>
							</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
</header>
