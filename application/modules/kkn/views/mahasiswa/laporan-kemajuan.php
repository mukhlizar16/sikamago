<section class="section">
	<div class="section-header">
		<h1><?= $label ?></h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= site_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item"><?= $breadcrumb ?></div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="card card-warning">
				<div class="card-body">
					<div class="list-group" id="list-tab" role="tablist">
						<a class="list-group-item list-group-item-action active show" id="list-home-list" data-toggle="list"
						   href="#list-home" role="tab" aria-selected="true">BAB I</a>
						<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
						   href="#list-profile" role="tab" aria-selected="false">BAB II</a>
						<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
						   href="#list-messages" role="tab" aria-selected="false">BAB III</a>
						<a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
						   href="#list-settings" role="tab" aria-selected="false">Cetak Laporan</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade active show" style="padding-top: 0" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Form BAB I</h4>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Judul BAB :</label>
									<div class="col-md-9">
										<input type="text" name="judul" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Isi BAB :</label>
									<div class="col-md-9">
										<textarea name="isi" id="isi" class="summernote" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="mt-2 text-right">
									<button class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" style="padding-top: 0" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
					<div class="card card-info">
						<div class="card-header">
							<h4>Form BAB II</h4>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Judul BAB :</label>
									<div class="col-md-9">
										<input type="text" name="judul" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Isi BAB :</label>
									<div class="col-md-9">
										<textarea name="isi" id="isi" class="summernote" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="mt-2 text-right">
									<button class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" style="padding-top: 0" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
					<div class="card card-success">
						<div class="card-header">
							<h4>Form BAB III</h4>
						</div>
						<div class="card-body">
							<form action="">
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Judul BAB :</label>
									<div class="col-md-9">
										<input type="text" name="judul" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-form-label col-md-3">Isi BAB :</label>
									<div class="col-md-9">
										<textarea name="isi" id="isi" class="summernote" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="mt-2 text-right">
									<button class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" style="padding-top: 0" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
					<div class="card card-danger">
						<div class="card-header">
							<h4>Cetak Laporan</h4>
						</div>
						<div class="card-body">
							<button class="btn btn-warning">Preview</button>
							<a href="<?= site_url('kkn/mahasiswa/cetak') ?>" class="btn btn-primary">Print</a>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							Ini hasil preview
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
