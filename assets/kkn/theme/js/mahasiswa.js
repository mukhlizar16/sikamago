$(document).ready(function () {
	$('#btn-satu').click(function () {
		$('#modalSatu').modal('show')
	})
	$('#modalSatu').on('shown.bs.modal', function () {
		$('#form-doc-satu')[0].reset()
	})

	$('#btn-dua').click(function () {
		$('#modalDua').modal('show')
	})
	$('#modalDua').on('shown.bs.modal', function () {
		$('#form-doc-dua')[0].reset()
	})

	$('#btn-tiga').click(function () {
		$('#modalTiga').modal('show')
	})
	$('#modalTiga').on('shown.bs.modal', function () {
		$('#form-doc-tiga')[0].reset()
	})

	$('#btn-empat').click(function () {
		$('#modalEmpat').modal('show')
	})
	$('#modalEmpat').on('shown.bs.modal', function () {
		$('#form-doc-empat')[0].reset()
	})

	$('#btn-lima').click(function () {
		$('#modalLima').modal('show')
	})
	$('#modalLima').on('shown.bs.modal', function () {
		$('#form-doc-lima')[0].reset()
	})

	$('#btn-enam').click(function () {
		$('#modalEnam').modal('show')
	})
	$('#modalEnam').on('shown.bs.modal', function () {
		$('#form-doc-enam')[0].reset()
	})

	$('#btn-tujuh').click(function () {
		$('#modalTujuh').modal('show')
	})
	$('#modalTujuh').on('shown.bs.modal', function () {
		$('#form-doc-tujuh')[0].reset()
	})

	$('#form-doc-satu').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-satu').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalSatu').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalSatu').modal('hide')
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

		}
	})
	$('#form-doc-dua').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-dua').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalDua').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalDua').modal('hide')
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

		}
	})
	$('#form-doc-tiga').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-tiga').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalTiga').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalTiga').modal('hide')
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

		}
	})
	$('#form-doc-empat').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-empat').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalEmpat').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalEmpat').modal('hide')
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

		}
	})
	$('#form-doc-lima').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-lima').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalLima').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalLima').modal('hide')
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

		}
	})
	$('#form-doc-enam').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-enam').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalEnam').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalEnam').modal('hide')
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

		}
	})
	$('#form-doc-tujuh').submit(function (e) {
		e.preventDefault()
		var file = $('#doc-tujuh').val();
		if (file == '') {
			Swal.fire(
				'Peringatan !',
				'Anda belum memilih file',
				'warning'
			)
		} else {
			$.ajax({
				url: $(this).attr('action'),
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
								$('#modalTujuh').modal('hide')
								location.reload()
							})
						} else if (response.status == 'update') {
							Swal.fire(
								'Sukses !',
								response.pesan,
								'success'
							).then(function () {
								$('#modalTujuh').modal('hide')
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

		}
	})


	// pilih lokasi kkn
	$('#kecamatan').change(function () {
		var id = $(this).val();
		$('#desa').empty();
		$('#card-form').addClass('card-progress');
		$.ajax({
			url: 'get_desa',
			type: 'post',
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function (data) {
				$('#card-form').removeClass('card-progress')
				/*
				// model lain menampilkan data
				var opt = '<option value="">--Pilih--</option>';
				for (var i=0; i < data.length; i++){
					opt +='<option value="'+data[i].id+'">'+data[i].text+'</option>';
				}
				$('#desa').append(opt)
				*/

				$('#desa').select2({
					data: data
				});
			}
		})
	})

	$('#form-lokasi').submit(function (e) {
		e.preventDefault()
		// karena menggunakan select2, maka serialize tidak berfungsi
		var kec = $('#kecamatan').val();
		var desa = $('#desa').val();
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: {
				kecamatan: kec,
				desa: desa
			},
			dataType: 'json',
			cache: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data lokasi KKN...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else if (response.status == 'update') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else if (response.status == 'fail') {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'warning'
						)
					} else if (response.status == 'jumlah') {
						Swal.fire(
							'Peringatan !',
							response.pesan,
							'warning'
						)
					} else if (response.status == 'jumlah-update') {
						Swal.fire(
							'Peringatan !',
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


	// log harian
	$('#form-add-log').submit(function (e) {
		var tgl = $('#tgl-input').val()
		var uraian = $('#uraian').val()
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data log harian...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function (){
					if (tgl == '' || uraian == '') {
						Swal.fire(
							'Gagal !',
							'Periksa kembali isian Anda',
							'warning'
						)
					} else if (response.status == 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					} else if (response.status == 'error') {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'warning'
						)
					} else {
						Swal.fire(
							'Gagal !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	})

	$('#tabel-log').on('click', '#btn-hapus', function (){
		var id = $(this).closest('tr').find('#btn-hapus').attr('data-id')
		$('#hapusModal').modal('show')
		$('#log_id').val(id)
	})

	$('#form-del-log').submit(function (e){
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response){
				Swal.fire({
					title: 'Menghapus data log harian...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function (){
					if (response.status == 'sukses'){
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function (){
							$('#hapusModal').modal('hide')
							location.reload()
						})
					}else{
						Swal.fire(
							'Gagal !',
							response.pesan,
							'error'
						)
					}
				})
			}
		})
	})


	$('#kecamatan').select2();
})
