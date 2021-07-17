$(document).ready(function () {
	$('#form-foto').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: 'profil/foto',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan file...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status == 'error') {
						Swal.fire(
							'Error !',
							response.pesan,
							'error'
						)
					} else if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							$('#fotoModal').modal('hide')
							location.reload()
						})
					} else if (response.status == 'update') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							$('#fotoModal').modal('hide')
							location.reload()
						})
					} else if (response.status == 'fail') {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'warning'
						)
					} else {
						Swal.fire(
							'Error !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	})

	$('#form-pribadi').submit(function (e) {
		e.preventDefault()
		$('#data-pribadi').addClass('card-progress')
		$('#status-pribadi').hide()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'error') {
					$('#data-pribadi').removeClass('card-progress')
					$('#status-pribadi').addClass('alert alert-warning').html(response.pesan).show()
				} else if (response.status == 'sukses') {
					$('#data-pribadi').removeClass('card-progress')
					$('#status-pribadi').addClass('alert alert-success').html(response.pesan).show()
				} else {
					$('#data-pribadi').removeClass('card-progress')
					$('#status-pribadi').addClass('alert alert-danger').html(response.pesan).show()
				}
			}
		})
	})

	// get kabupaten
	$('#prov').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_kabupaten',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#kabupaten').html(data)
			}
		})
	})
	// get kecamatan
	$('#kabupaten').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_kecamatan',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#kecamatan').html(data)
			}
		})
	})
	// get desa
	$('#kecamatan').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_desa',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#desa').html(data)
			}
		})
	})

	/* Bagian ortu */
	// get kabupaten
	$('#prov-ortu').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_kabupaten',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#kab-ortu').html(data)
			}
		})
	})
	// get kecamatan
	$('#kab-ortu').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_kecamatan',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#kec-ortu').html(data)
			}
		})
	})
	// get desa
	$('#kec-ortu').change(function () {
		var id = $(this).val();
		$.ajax({
			url: 'get_desa',
			type: 'post',
			data: {id: id},
			success: function (data) {
				$('#desa-ortu').html(data)
			}
		})
	})

	// get provinsi
	list_provinsi();

	function list_provinsi() {
		$.ajax({
			url: 'get_provinsi',
			type: 'post',
			success: function (data) {
				$('#prov').html(data)
				$('#prov-ortu').html(data)
			}
		})
	}

	// submit form alamat
	$('#form-alamat').submit(function (e) {
		e.preventDefault()
		$('#data-alamat').addClass('card-progress')
		var provinsi = $('#prov').find(':selected').data('nama')
		var kabupaten = $('#kabupaten').find(':selected').data('nama')
		var kecamatan = $('#kecamatan').find(':selected').data('nama')
		var desa = $('#desa').find(':selected').data('nama')
		var jalan = $('#jalan').val()
		if (provinsi == '' || kabupaten == '' || kecamatan == '' || desa == '' || jalan ==''){
			$('#status-alamat').addClass('alert alert-danger').html('Periksa kembali isian anda').show()
			$('#data-alamat').removeClass('card-progress')
		}else{
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				data: {
					prov: provinsi,
					kab: kabupaten,
					kec: kecamatan,
					desa: desa,
					jalan: jalan,
				},
				dataType: 'json',
				cache: false,
				success: function (response) {
					if (response.status == 'sukses'){
						$('#status-alamat').addClass('alert alert-success').html(response.pesan).show()
						$('#data-alamat').removeClass('card-progress')
						$('#form-alamat')[0].reset()
					}else if(response.status == 'update'){
						$('#status-alamat').addClass('alert alert-success').html(response.pesan).show()
						$('#data-alamat').removeClass('card-progress')
						$('#form-alamat')[0].reset()
					}else if (response.status == 'fail'){
						$('#status-alamat').addClass('alert alert-warning').html(response.pesan).show()
						$('#data-alamat').removeClass('card-progress')
					}else{
						$('#status-alamat').addClass('alert alert-warning').html(response.pesan).show()
						$('#data-alamat').removeClass('card-progress')
					}
				}
			})
		}
	})

	// submit form alamat ortu
	$('#form-ortu').submit(function (e) {
		e.preventDefault()
		$('#alamat-ortu').addClass('card-progress')
		var provinsi = $('#prov-ortu').find(':selected').data('nama')
		var kabupaten = $('#kab-ortu').find(':selected').data('nama')
		var kecamatan = $('#kec-ortu').find(':selected').data('nama')
		var desa = $('#desa-ortu').find(':selected').data('nama')
		var jalan = $('#jln-ortu').val()
		var nm_ayah = $('#nama-ayah').val()
		var nm_ibu = $('#nama-ibu').val()
		var hp_ayah = $('#hp-ayah').val()
		var hp_ibu = $('#hp-ibu').val()
		if (provinsi == '' || kabupaten == '' || kecamatan == '' || desa == '' || jalan =='' || nm_ayah == '' || nm_ibu =='' || hp_ayah == '' || hp_ibu == ''){
			$('#status-ortu').addClass('alert alert-danger').html('Periksa kembali isian anda').show()
			$('#alamat-ortu').removeClass('card-progress')
		}else{
			$.ajax({
				url: $(this).attr('action'),
				type: 'post',
				data: {
					prov: provinsi,
					kab: kabupaten,
					kec: kecamatan,
					desa: desa,
					jalan: jalan,
					nama_ayah:nm_ayah,
					nama_ibu:nm_ibu,
					hp_ayah:hp_ayah,
					hp_ibu:hp_ibu,
				},
				dataType: 'json',
				cache: false,
				success: function (response) {
					if (response.status == 'sukses'){
						$('#status-ortu').addClass('alert alert-success').html(response.pesan).show()
						$('#alamat-ortu').removeClass('card-progress')
						$('#form-ortu')[0].reset()
					}else if(response.status == 'update'){
						$('#status-ortu').addClass('alert alert-success').html(response.pesan).show()
						$('#alamat-ortu').removeClass('card-progress')
						$('#form-ortu')[0].reset()
					}else if (response.status == 'fail'){
						$('#status-ortu').addClass('alert alert-warning').html(response.pesan).show()
						$('#alamat-ortu').removeClass('card-progress')
					}else{
						$('#status-ortu').addClass('alert alert-warning').html(response.pesan).show()
						$('#alamat-ortu').removeClass('card-progress')
					}
				}
			})
		}
	})

})
