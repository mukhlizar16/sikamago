<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/_partial/head'); ?>
</head>
<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
	<div class="loader-track">
		<div class="loader-fill"></div>
	</div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
<?php $this->load->view('template/_partial/sidebar'); ?>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<?php $this->load->view('template/_partial/top-bar'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $konten ?>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="text-center">
						<h3 class="mt-3">Welcome To <span class="text-primary">SiKaMaGo<sup>UTU</sup></h3>
					</div>
					<div class="carousel-inner text-center">
						<div class="carousel-item active" data-interval="50000">
							<img src="<?= config_item('theme_image') ?>model/welcome.svg" class="wid-250 my-4" alt="images">
							<div class="row justify-content-center">
								<div class="col-lg-9">
									<p class="f-16"><strong>SiKaMaGo<sup class="text-muted">UTU</sup> versi 1.0</strong> dengan struktur terbaru.</p>
									<p class="f-16"> Tersedia <strong>Admin, Operator, Mahasiswa, Dosen dan Supervisor Mitra Panel</strong></p>
									<div class="row justify-content-center text-left">
										<div class="col-md-10">
											<h4 class="mb-3">Fitur</h4>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Tambah Menu</p>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Hak Akses</p>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Tambah User</p>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Input log harian</p>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Upload laporan</p>
											<p class="mb-2 f-16"><i class="feather icon-check-circle mr-2 text-primary"></i> Notifikasi</p>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item" data-interval="50000">
							<img src="<?= config_item('theme_image') ?>model/able-admin.jpg" class="img-fluid mt-0"
								 alt="images">
						</div>
					</div>

				</div>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"
					 style="transform:rotate(180deg);margin-bottom:-1px">
					<path class="elementor-shape-fill" fill="#4680ff" opacity="0.33"
						  d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">
					</path>
					<path class="elementor-shape-fill" fill="#4680ff" opacity="0.66"
						  d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
					<path class="elementor-shape-fill" fill="#4680ff"
						  d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
				</svg>
				<div class="modal-body text-center bg-primary py-4">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
					</ol>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="ml-2">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="mr-2">Next</span>
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade
		<br/>to any of the following web browsers to access this website.
	</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="<?= config_item('theme_image') ?>browser/chrome.png" alt="Chrome">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="<?= config_item('theme_image') ?>browser/firefox.png" alt="Firefox">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="<?= config_item('theme_image') ?>browser/opera.png" alt="Opera">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="<?= config_item('theme_image') ?>browser/safari.png" alt="Safari">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="<?= config_item('theme_image') ?>browser/ie.png" alt="">
					<div>IE (11 & above)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- BEGIN: Footer -->
<?php $this->load->view('template/_partial/footer'); ?>
<!-- END: Footer -->


</body>

</html>
