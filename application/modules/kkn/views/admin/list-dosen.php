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
					<h4>List Dosen</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" width="100%" id="table-list-dosen">
							<thead>
							<tr>
								<th style="text-align: center" width="5%">No</th>
								<th>Nama</th>
								<th>NIDN</th>
								<th>Email</th>
								<th>Password</th>
								<th>Prodi</th>
								<th style="text-align: center" width="15%">Status</th>
								<th style="text-align: center" width="10%">Tanggal</th>
								<th style="text-align: center" width="10%">Aksi</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$no = 1;
							foreach ($dosen as $d) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td nowrap><?= $d['nama'] ?></td>
								<td><?= $d['nidn'] ?></td>
								<td><?= $d['email'] ?></td>
								<td><?= $d['pass'] ?></td>
								<td><?= $d['prodi'] ?></td>
								<td class="text-center"><?= $d['is_active'] == 1 ? '<span class="badge badge-success">Aktif</span>':'<span class="badge badge-warning">Belum Verifikasi</span>' ?></td>
								<td class="text-center"><?= date('d-m-Y', strtotime($d['tgl'])) ?></td>
								<td nowrap>
									<a href="<?= site_url('kkn/admin/detil/' . urlencode($this->encrypt->encode($d['id']))) ?>" class="btn btn-info btn-sm">
										<i class="fas fa-edit fa-fw"></i>
									</a>
									<button class="btn btn-danger btn-sm"
											id="btn-hapus-dosen"
											data-id="<?= $d['id'] ?>"
											data-nama ="<?= $d['nama'] ?>"
											data-toggle="tooltip"
											title="Hapus"
											data-placement="top">
										<i class="fas fa-trash-alt"></i>
									</button>
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

<!-- Modal hapus -->
<div class="modal fade" id="hapusModalDosen" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="hapusModalLabel">Are you sure?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<?= form_open('kkn/admin/hapus_user', 'id="form-hapus-dosen"') ?>
			<div class="modal-body">
				Anda akan menghapus : <b><span class="text-dark" id="nama-user"></span></b>
				<br>
				Setelah dihapus, data tidak dapat dikembalikan lagi.
				<input type="hidden" name="user" class="form-control" id="user">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
