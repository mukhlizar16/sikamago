<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('templates/partial/header') ?>
</head>

<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<?php $this->load->view('templates/partial/navbar') ?>
		<div class="main-sidebar">
			<?php $this->load->view('templates/partial/sidebar') ?>
		</div>

		<!-- Main Content -->
		<div class="main-content">
			<?= $konten ?>
		</div>

		<!-- Modal logout -->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Klik tombol "Logout" jika anda ingin mengakhiri sesi.</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
						<a class="btn btn-danger" href="<?= site_url('kkn/auth/logout') ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php $this->load->view('templates/partial/footer') ?>
	</div>
</div>

<!-- part js -->
<?php $this->load->view('templates/partial/js') ?>
</body>
</html>

