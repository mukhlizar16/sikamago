<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Print Data</title>

	<style>
		.table1 {
			font-family: sans-serif;
			color: #232323;
			border-collapse: collapse;
			margin: 0 auto;
		}

		.table1, th, td {
			border: 1px solid #999;
			padding: 8px 20px;
		}

		.judul {
			font-family: 'Poppins', sans-serif;
			text-align: center;
		}
	</style>
</head>
<body>
<h3 class="judul"><?= $judul ?></h3>
<table class="table1">
	<thead>
	<tr>
		<th>Nama Mahasiswa</th>
		<th>Nama Dosen</th>
		<th>Jenis</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($bimbingan->result_array() as $b) :
		$nama_dosen = explode('#', $b['nama_dosen']);
		$nama_jenis = explode('#', $b['nama_jenis']);
		foreach ($nama_dosen as $key => $val) :	?>
			<tr <?= $key == 0 ? 'rowspan="'.count($nama_dosen).'"'  : ''?>>
				<td><?= $key == 0 ? $b['nama_mhs']  : ''?></td>
				<td><?= $val ?></td>
				<td><?= $nama_jenis[$key] ?></td>
			</tr>
		<?php endforeach; ?>
	<?php endforeach; ?>
	</tbody>
</table>

<script>
	window.print();
</script>
</body>
</html>
