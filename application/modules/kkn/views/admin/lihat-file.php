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
					<h4>Dokumen Persyaratan</h4>
					<div class="card-header-action">
						<button class="btn btn-primary" onclick="history.back()">Kembali</button>
					</div>
				</div>
				<div class="card-body">
					<iframe src="https://docs.google.com/gview?url=<?= base_url() ?>assets/kkn/userfiles/persyaratan/<?= $file ?>&embedded=true"
							style="width:480px; height:720px;"
							frameborder="0">
					</iframe>
				</div>
				<div class="card-footer">
					<a href="<?= base_url() ?>assets/kkn/userfiles/persyaratan/<?= $file ?>" class="btn btn-success" target="_blank">Download</a>
				</div>
			</div>
		</div>
	</div>
</section>
