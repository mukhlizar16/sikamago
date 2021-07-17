<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kirim Email</title>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

		body {
			font-family: 'Poppins', sans-serif;
			/*width: 100vw;
			height: 100vh;*/
			font-size: 18px;
			background: whitesmoke;
		}

		.container {
			padding: 20px 30px;
		}

		.container .logo {
			margin-top: 40px;
		}

		.text-bold {
			font-weight: 500;
		}

		.table-borderless {
			border: none;
		}

		.styled-table {
			border-collapse: collapse;
			margin: 25px 0;
			font-family: sans-serif;
			min-width: 400px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}

		.styled-table thead tr {
			background-color: #009879;
			color: #ffffff;
			text-align: center;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
		}

		.styled-table tbody tr {
			border-bottom: 1px solid #dddddd;
		}

		.styled-table tbody tr:nth-of-type(even) {
			background-color: #f3f3f3;
		}

		.styled-table tbody tr:last-of-type {
			border-bottom: 2px solid #009879;
		}

		.styled-table tbody tr.active-row {
			font-weight: bold;
			color: #009879;
		}

		.footer {
			margin-top: 20px;
			text-align: justify;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="logo">
		<img height="50px" src="<?= base_url() ?>assets/theme/images/logo-dark.png" alt="logo">
	</div>
	<p>Selamat, <b style="color: #009879"><?= $napan . ' ' . $nabel ?></b>.
		Anda telah melakukan registrasi di <b>SiKaMaGo UTU</b>.
	</p>

	<table class="table-borderless styled-table">
		<thead>
		<tr>
			<th>Item</th>
			<th></th>
			<th>Data</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>Username</td>
			<td>:</td>
			<td class="text-bold"><?= $username ?></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td class="text-bold"><?= $password ?></td>
		</tr>
		</tbody>
	</table>

	<div class="footer">
		Silahkan hubungi admin, untuk mengaktivasi akun Anda.
	</div>
</div>
</body>
</html>
