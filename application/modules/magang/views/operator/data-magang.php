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
								<a href="<?= site_url('admin') ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item">
								<a href="javascript:void(0)"><?= $breadcrumb ?></a>
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
				<div class="card card-border-c-green">
					<div class="card-header">
						<h5 class="mb-3">Daftar Magang Mahasiswa</h5>
					</div>
					<div class="card-body">
					<span class="text-muted">
						Berikut adalah daftar pilihan magang oleh mahasiswa.
					</span>

						<div class="mt-3">
							<table id="table-pilihan-magang" class="table table-striped table-hover dt-responsive nowrap dataTable table-responsive-xl">
								<thead>
								<tr>
									<th style="width: 5%">No.</th>
									<th>Nama</th>
									<th>Jenis</th>
									<th>Bidang</th>
									<th>Lokasi</th>
									<th>Kecamatan</th>
									<th>Kelurahan/Desa</th>
									<th>Dibuat</th>
								</tr>
								</thead>
								<tbody>
								<?php $no = 1; foreach ($magang->result_array() as $m) : ?>
								<tr>
									<td class="text-center"><?= $no++ ?></td>
									<td class="text-wrap" style="width: 20%">
										<b><?= $m['napan']. ' '. $m['nabel'] ?></b>
										<br>
										<small class="text-muted"><?= $m['prodi'] ?></small>
									</td>
									<td class="text-wrap"><?= $m['lingkup'] ?></td>
									<td style="width: 10%" class="text-wrap"><?= $m['bidang'] == 'Lainnya' ? $m['bidang_lain'] : $m['bidang'] ?></td>
									<td class="text-wrap"><?= $m['lokasi'] == 'Lainnya' ? $m['lokasi_lain'] : $m['lokasi'] ?></td>
									<td class="text-wrap"><?= $m['kecamatan'] == 'x' ? $m['kecamatan_lain'] : $m['kecamatan'] ?></td>
									<td class="text-wrap"><?= $m['kelurahan'] == 'x' ? $m['kelurahan_lain'] : $m['kelurahan'] ?></td>
									<td class="text-wrap"><?= tgl_jam_indo($m['tgl']) ?></td>
								</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
