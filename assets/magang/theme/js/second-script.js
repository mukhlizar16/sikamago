'use strict';
$(document).ready(function () {
	$('#form-tabus').submit(function (e) {
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'gagal') {
					swal("Gagal", response.pesan, "error")
				} else {
					swal("Sukses!", response.pesan, "success").then(function () {
						location.reload()
					});
				}
			}
		})
		return false;
	})

	$('#form-tabmhs').submit(function (e) {
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'gagal-insert') {
					swal("Gagal", response.pesan, "error")
				} else if (response.status == 'sukses-insert') {
					swal("Sukses!", response.pesan, "success").then(function () {
						location.reload();
					})
				} else if (response.status == 'gagal-update') {
					swal("Gagal", response.pesan, "error")
				} else {
					swal("Sukses!", response.pesan, "success").then(function () {
						location.reload();
					})
				}
			},
			error: function () {
				swal("Error", "Terdapat kesalahan ...", "error")
			}
		})
		return false;
	})

	//function photo change
	$(document).on('click', '#upload-foto', function () {
		$('#modal-foto').modal('show');
		$('#modal-foto-title').html('Upload Foto Profil');
		$('#keterangan_modal-foto').hide();
		$('#form-uploadFoto')[0].reset();
	})

	//function submit foto
	$('#form-uploadFoto').submit(function (e) {
		e.preventDefault();
		$('#keterangan_modal-foto').html('<span class="alert alert-info" role="alert">Mengunggah berkas foto ...</span>');
		$('#btn-loading-modalFoto').show();
		$('#btn-submit-modalFoto').hide();
		$('#btn-close-modalFoto').hide();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			async: false,
			success: function (data) {
				if (data.status == 'error-upload') {
					$('#keterangan_modal-foto').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Gagal!", data.pesan, "error");
				} else if (data.status == 'sukses-simpan') {
					$('#keterangan_modal-foto').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Sukses!", "Foto berhasil diupload", "success").then(function () {
						$('#modal-foto').modal('hide');
						location.reload();
					})
				} else if (data.status == 'gagal-simpan') {
					$('#keterangan_modal-foto').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Gagal!", data.pesan, "error");
				} else if (data.status == 'gagal-update') {
					$('#keterangan_modal-foto').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Gagal!", data.pesan, "error");
				} else {
					$('#keterangan_modal-foto').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						$('#modal-foto').modal('hide');
						location.reload();
					})
				}
			}
		})
		return false;
	})

	// chapter magang
	$('#kategori').change(function () {
		$('#bidang-lainnya').hide();
		$('#lokasi-lainnya').hide();
		$('#grup-kecamatan').show();
		$('#grup-kelurahan').show();
		var id_lingkup = $(this).val();
		if (id_lingkup == 1) {
			$('#grup-bidang').hide();
			$('#bidang-magang').removeAttr('required');
			$.ajax({
				url: 'kota',
				type: 'post',
				success: function (list_kota) {
					$('#kota').html(list_kota);
				}
			})
			// jika select dropdown kabupaten berganti
			$('#kota').change(function () {
				var id_kota = $('option:selected', this).attr('data-id');
				$.ajax({
					type: 'post',
					url: 'kecamatan',
					data: {id_kota: id_kota},
					success: function (list_kecamatan) {
						$('#kecamatan').html(list_kecamatan);
					}
				})
				if ($('#kota').val() == 'x') {
					$('#kota-lainnya').prop('required', true).show();
				} else {
					$('#kota-lainnya').prop('required', false).hide();
				}
			})
			// jika select dropdown kecamatan berganti
			$('#kecamatan').change(function () {
				var id_kec = $('option:selected', this).attr('data-id');
				if ($('#kecamatan').val() == 'x') {
					$('#kecamatan-lainnya').prop('required', true).show();
				} else {
					$('#kecamatan-lainnya').prop('required', false).hide();
				}
				$.ajax({
					type: 'post',
					url: 'kelurahan',
					data: {id_kec: id_kec},
					success: function (list_kelurahan) {
						$('#kelurahan').html(list_kelurahan);
					}
				})
			})
			// jika select dropdown kelurahan berganti
			$('#kelurahan').change(function () {
				var id_kel = $('option:selected', this).attr('value');
				if (id_kel == 'x') {
					$('#kelurahan-lainnya').prop('required', true).show();
				} else {
					$('#kelurahan-lainnya').prop('required', false).hide();
				}
			})
		} else {
			$('#grup-bidang').show();
			$('#grup-kecamatan').hide();
			$('#grup-kelurahan').hide();
			$('#kecamatan').removeAttr('required');
			$('#kelurahan').removeAttr('required');
			var id_kategori = $('option:selected', this).attr('value');
			$.ajax({
				type: 'post',
				url: 'show_bidang_magang',
				data: {id: id_kategori},
				dataType: 'json',
				success: function (data) {
					var html = '<option value="">-Pilih-</option>';
					for (var i = 0; i < data.length; i++) {
						html += '<option data-id="' + data[i].id + '" value="' + data[i].nama_bidang + '">' + data[i].nama_bidang + '</option>';
					}
					$('#bidang-magang').html(html);
				}
			})
			// jika bidang magang berganti menjadi lainnya
			$('#bidang-magang').change(function () {
				var id_bidang = $('option:selected', this).attr('data-id');
				var id_kategori = $('#kategori').val();
				if (id_bidang == 7) {
					$('#bidang-lainnya').prop('required', true).show();
				} else {
					$('#bidang-lainnya').prop('required', false).hide();
				}
				$.ajax({
					type: 'post',
					url: 'show_lokasi_magang',
					data: {id: id_kategori},
					dataType: 'json',
					success: function (data) {
						var html = '';
						for (var i = 0; i < data.length; i++) {
							html += '<option data-id="' + data[i].id + '" value="' + data[i].nama_lokasi + '">' + data[i].nama_lokasi + '</option>';
						}
						$('#kota').html(html);
					}
				})
				// jika select dropdown lokasi magang sesuai bidang berganti menjadi lainnya
				$('#kota').change(function () {
					var id_kota = $('option:selected', this).attr('data-id');
					if (id_kota == 17) {
						$('#kota-lainnya').prop('required', true).show();
					} else {
						$('#kota-lainnya').prop('required', false).hide();
					}
				})
			})
		}
	});

	$('#form-magang').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'simpan_data_magang',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal-update') {
					swal("Gagal!", "Data gagal diperbaharui ...", "error")
				} else if (data.status == 'gagal-simpan') {
					swal("Gagal!", "Data gagal disimpan ...", "error")
				} else if (data.status == 'error-tabel') {
					swal("Gagal!", data.pesan, "error")
				} else if (data.status == 'sukses-update') {
					swal("Sukses!", "Data berhasil diperbaharui ...", "success").then(function () {
						location.reload();
					})
					$('form-magang')[0].reset();
				} else {
					swal("Sukses!", "Data berhasil disimpan ...", "success").then(function () {
						location.reload();
					})
					$('form-magang')[0].reset();
				}
			}
		})
		return false;
	})

	// chapter log
	$('#btn-add-log').click(function () {
		$('#modal-log').modal('show');
		$('#form-submit-log')[0].reset();
		$('#keterangan_modal-log').hide();
		$('#modal-log-title').html('Tambah Kegiatan');
	})

	$('#form-submit-log').submit(function (e) {
		e.preventDefault();
		$('#btn-loading-modal-log').show();
		$('#btn-close-modal-log').hide();
		$('#btn-submit-modal-log').hide();
		$('#keterangan_modal-log').html('<span class="alert alert-info" role="alert">Proses menyimpan ...</span>');
		$.ajax({
			type: 'post',
			url: 'tambah_kegiatan',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'sukses') {
					$('#keterangan_modal-log').show().html('<span class="alert alert-success" role="alert">Behasil menyimpan ...</span>');
					swal("Sukses!", "Data kegiatan harian berhasil ditambah", "success").then(function () {
						$('modal-log').modal('hide');
						location.reload();
					})
				} else {
					swal("Gagal!", "Data kegiatan gagal ditambah", "error")
				}
			}
		})
		return false;
	})

	$('#tabel-mhs-kegiatan').on('click', '#btn-hapus', function (e) {
		e.preventDefault();
		var id_log = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, data tidak dapat dikembalikan!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_kegiatan',
					data: {id: id_log},
					dataType: 'json',
					success: function (data) {
						if (data.status == 'gagal') {
							swal("Gagal!", data.pesan, "error")
						} else {
							swal("Sukses!", data.pesan, "success").then(function () {
								location.reload();
							})
						}
					}
				})
				return false;
			} else {
				swal("Data tidak jadi dihapus!", {
					icon: "error",
				});
			}
		})
	})

	// chapter laporan
	// focusing on input
	$('#modal-laporan').on('shown.bs.modal', function () {
		$('#judul-laporan').focus();
		$('#modal-laporan-title').html('Upload Laporan Final');
		$('#keterangan_modal-laporan').hide();
		$('#btn-loading-modalLaporan').hide();
		$(".dropify-clear").click();
	})
	// showing modal
	$('#btn-add-laporan').click(function () {
		$('#modal-laporan').modal('show');
		$('#form-uploadLaporan')[0].reset();
	})
	// submit
	$('#form-uploadLaporan').submit(function (e) {
		e.preventDefault();
		$('#keterangan_modal-laporan').html('Mengupload berkas ...');
		$('#btn-close-modalLaporan').hide();
		$('#btn-submit-modalLaporan').hide();
		$('#btn-loading-modalLaporan').show();
		$.ajax({
			type: 'post',
			url: 'tambah_laporan',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			success: function (data) {
				if (data.status == 'gagal-upload') {
					$('#keterangan_modal-laporan').html('Gagal upload berkas ...');
					$('#btn-close-modalLaporan').show();
					$('#btn-submit-modalLaporan').show();
					$('#btn-loading-modalLaporan').hide();
					swal("Gagal!", data.pesan, "error");
				} else if (data.status == 'sukses') {
					$('#btn-close-modalLaporan').show();
					$('#btn-submit-modalLaporan').show();
					$('#btn-loading-modalLaporan').hide();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
						$('#modal-laporan').modal('hide');
					});
				} else {
					$('#keterangan_modal-laporan').html('Gagal upload berkas ...');
					$('#btn-close-modalLaporan').show();
					$('#btn-submit-modalLaporan').show();
					$('#btn-loading-modalLaporan').hide();
					swal("Gagal!", data.pesan, "error");
				}
			}
		})
	})

	// update laporan
	$('#modal-add-artikel').on('shown.bs.modal', function () {
		$('#keterangan_modal-add-artikel').hide();
		$('#judul_artikel').focus();
	});
	$('#btn-add-artikel').click(function () {
		$('#modal-add-artikel').modal('show');
		$('#modal-add-artikel-title').html('Tambah berkas laporan artikel ilmiah')
		$('#keterangan_modal-add-artikel').hide();
	})
	$('#form-add-artikel').submit(function (e) {
		e.preventDefault();
		$('#btn-close-modal-add-artikel').hide();
		$('#btn-submit-modal-add-artikel').hide();
		$('#btn-loading-modal-add-artikel').show();
		$.ajax({
			url: 'tambah_artikel',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			success: function (data) {
				if (data.status == 'gagal-upload') {
					$('#keterangan_modal-add-artikel').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>')
					swal("Error", data.pesan, "error");
					$('#btn-close-modal-add-artikel').show();
					$('#btn-submit-modal-add-artikel').show();
					$('#btn-loading-modal-add-artikel').hide();
				} else if (data.status == 'gagal') {
					$('#keterangan_modal-add-artikel').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>')
					swal("Gagal!", data.pesan, "error");
					$('#btn-close-modal-add-artikel').show();
					$('#btn-submit-modal-add-artikel').show();
					$('#btn-loading-modal-add-artikel').hide();
				} else {
					$('#keterangan_modal-add-artikel').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>')
					$('#btn-close-modal-add-artikel').show();
					$('#btn-submit-modal-add-artikel').show();
					$('#btn-loading-modal-add-artikel').hide();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
	})

	// chapter pesan
	/*$('#input').autocomplete({
		source: 'get_penerima/?',
	})*/

	$('#input').autocomplete({
		source: function (request, response) {
			var sUrl = 'get_penerima';
			$.getJSON(sUrl, request, function (result) {
				response(result);
			});
		},
		select: function (event, ui) {
			$('#id_penerima').val(ui.item.id);
			/*alert('Your selected id is '+ui.item.id);*/
		}
	})

	$('#pesan-mhs').submit(function (e) {
		e.preventDefault();
		$.ajax({
			url: 'kirim',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'gagal') {
					$('#keterangan-pesan').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>')
					swal("Gagal!", data.pesan, "error")
				} else {
					$('#keterangan-pesan').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>')
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}
			}
		})
		return false;
	})

	$('#tabel-list-pesan').on('click', '#btn-hapus-pesan', function (e) {
		e.preventDefault();
		var id = $(this).attr('data_id')
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, anda tidak dapat mengembalikannya lgi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_pesan',
					data: {id: id},
					dataType: 'json',
					success: function (data) {
						if (data.status == 'gagal') {
							swal("Gagal!", data.pesan, "error")
						} else {
							swal("Sukses!", data.pesan, "success").then(function () {
								location.reload();
							})
						}
					}
				})
				return false;
			} else {
				swal("Data tidak jadi dihapus!", {
					icon: "error",
				});
			}
		});

	})

	//balas pesan
	$('#mhs-balas-pesan').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'sukses-balas') {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload()
					})
				} else {
					swal("Gagal!", data.pesan, "error");
				}
			}
		})
		return false;
	})

	// tandai pesan sudah dibaca
	$('#tabel-list-mhs-bls-pesan').on('click', '#btn-baca', function (e) {
		e.preventDefault();
		var id = $(this).attr('data_id');
		$.ajax({
			url: 'sudah_baca',
			type: 'post',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'sukses-baca') {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				} else {
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
	})

	// chapter data kesehatan
	$('#form-data-kesehatan').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'gagal') {
					swal("Gagal!", response.pesan, "error")
				} else {
					swal("Sukses!", response.pesan, "success").then(function () {
						location.reload();
					})
				}
			}
		})
		return false;
	});

	// data demografi perikanan
	$('#form-data-perikanan').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'post',
			dataType: 'json',
			cache: false,
			success: function (data){
				if(data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					swal("Gagal!", data.pesan, "error")
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				swal("Gagal!", xhr.thrownError, "error")
			}
		})
		return false;
	})

	//data demografi sosial
	$('#form-submit-data-sosial').submit(function (e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'tambah_data_sosial',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if(data.status == 'sukses-simpan'){
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					swal("Gagal!", data.pesan, "error")
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				swal("Gagal!", xhr.thrownError, "error")
			}
		})
		return false;
	})

	// data demografi ekonomi
	$('#form-data-ekonomi').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'post',
			dataType: 'json',
			cache: false,
			success: function (data){
				if(data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					swal("Gagal!", data.pesan, "error")
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				swal("Gagal!", xhr.thrownError, "error")
			}
		})
		return false;
	})

	// data demografi pertanian
	$('#form-data-pertanian').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'post',
			dataType: 'json',
			cache: false,
			success: function (data){
				if(data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					swal("Gagal!", data.pesan, "error")
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				swal("Gagal!", xhr.thrownError, "error")
			}
		})
		return false;
	})

	// data identitas kecamatan
	$('#identitas-kecamatan-form').submit(function (e){
		e.preventDefault();
		$('#btn-loading-geotop').show();
		$('#btn-submit-geotop').hide();
		$.ajax({
			url: 'tambah_identitas_kecamatan',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			success: function (data){
				if(data.status == 'sukses'){
					$('#btn-loading-geotop').hide();
					$('#btn-submit-geotop').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else if(data.status == 'sudah-ada'){
					$('#btn-loading-geotop').hide();
					$('#btn-submit-geotop').show();
					swal("Maaf!", data.pesan, "warning")
				}else{
					$('#btn-loading-geotop').hide();
					$('#btn-submit-geotop').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data identitas desa
	$('#identitas-desa-form').submit(function (e){
		e.preventDefault();
		$('#btn-loading-ides').show();
		$('#btn-submit-ides').hide();
		$.ajax({
			url: 'tambah_identitas_desa',
			type: 'post',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			success: function (data){
				if(data.status == 'sukses'){
					$('#btn-loading-ides').hide();
					$('#btn-submit-ides').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else if (data.status == 'error-upload'){
					$('#btn-loading-ides').hide();
					$('#btn-submit-ides').show();
					swal("Gagal!", data.pesan, "error")
				}else{
					$('#btn-loading-ides').hide();
					$('#btn-submit-ides').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data identitas geotop
	$('#form-identitas-geotop').submit(function (e){
		e.preventDefault();
		$('#btn-loading-igeo').show();
		$('#btn-submit-igeo').hide();
		$.ajax({
			url: 'tambah_identitas_geotop',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-igeo').hide();
					$('#btn-submit-igeo').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-igeo').hide();
					$('#btn-submit-igeo').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data identitas demografi
	$('#form-identitas-demografi').submit(function (e){
		e.preventDefault();
		$('#btn-loading-idem').show();
		$('#btn-submit-idem').hide();
		$.ajax({
			url: 'tambah_iden_demo',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-idem').hide();
					$('#btn-submit-idem').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-idem').hide();
					$('#btn-submit-idem').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data dimensi sosial kesehatan
	$('#form-dimsos-kesehatan').submit(function (e){
		e.preventDefault();
		$('#btn-loading-dk').show();
		$('#btn-submit-dk').hide();
		$.ajax({
			url: 'tambah_dimsos_kesehatan',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-dk').hide();
					$('#btn-submit-dk').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-dk').hide();
					$('#btn-submit-dk').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data dimensi modal sosial
	$('#form-dim-sosial').submit(function (e){
		e.preventDefault();
		$('#btn-loading-dimsos').show();
		$('#btn-submit-dimsos').hide();
		$.ajax({
			url: 'tambah_dim_sos',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-dimsos').hide();
					$('#btn-submit-dimsos').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-dimsos').hide();
					$('#btn-submit-dimsos').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data dimensi sosial kesehatan
	$('#form-dimsos-pendidikan').submit(function (e){
		e.preventDefault();
		$('#btn-loading-dp').show();
		$('#btn-submit-dp').hide();
		$.ajax({
			url: 'tambah_dimsos_pendidikan',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-dp').hide();
					$('#btn-submit-dp').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-dp').hide();
					$('#btn-submit-dp').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data dimensi ekonomi
	$('#dimensi-ekonomi-form').submit(function (e){
		e.preventDefault();
		$('#btn-loading-dimeko').show();
		$('#btn-submit-dimeko').hide();
		$.ajax({
			url: 'tambah_dimensi_ekonomi',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-dimeko').hide();
					$('#btn-submit-dimeko').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else {
					$('#btn-loading-dimeko').hide();
					$('#btn-submit-dimeko').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data dimensi ekonomi
	$('#form-ekologi').submit(function (e){
		e.preventDefault();
		$('#btn-loading-eko').show();
		$('#btn-submit-eko').hide();
		$.ajax({
			url: 'tambah_dimeko',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-eko').hide();
					$('#btn-submit-eko').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else {
					$('#btn-loading-eko').hide();
					$('#btn-submit-eko').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data aktivitas desa
	$('#form-aktivitas-desa').submit(function (e){
		e.preventDefault();
		$('#btn-loading-ades').show();
		$('#btn-submit-ades').hide();
		$.ajax({
			url: 'tambah_aktivitas_desa',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-ades').hide();
					$('#btn-submit-ades').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-ades').hide();
					$('#btn-submit-ades').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// data aktivitas desa
	$('#form-pendapatan-desa').submit(function (e){
		e.preventDefault();
		$('#btn-loading-pd').show();
		$('#btn-submit-pd').hide();
		$.ajax({
			url: 'tambah_pendes',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if (data.status == 'sukses'){
					$('#btn-loading-pd').hide();
					$('#btn-submit-pd').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					$('#btn-loading-pd').hide();
					$('#btn-submit-pd').show();
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
		return false;
	})

	// hapus data laporan
	$('#tabel-laporan').on('click', '#btn-hapus-lap', function (e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, data tidak dapat dikembalikan lagi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_laporan',
					data: {id: id},
					dataType: 'json',
					success: function (data) {
						if (data.status == 'gagal') {
							swal("Gagal!", data.pesan, "error")
						} else {
							swal("Sukses!", data.pesan, "success").then(function () {
								location.reload();
							})
						}
					}
				})
				return false;
			} else {
				swal("Data batal dihapus!", {
					icon: "error",
				});
			}
		});
	})

	// hapus data artikel
	$('#tabel-artikel').on('click', '#btn-hapus-artikel', function (e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, data tidak dapat dikembalikan lagi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_artikel',
					data: {id: id},
					dataType: 'json',
					success: function (data) {
						if (data.status == 'gagal') {
							swal("Gagal!", data.pesan, "error")
						} else {
							swal("Sukses!", data.pesan, "success").then(function () {
								location.reload();
							})
						}
					}
				})
				return false;
			} else {
				swal("Data batal dihapus!", {
					icon: "error",
				});
			}
		});
	})


	// daterangepicker
	$(function() {
		$('#jam_operasional').daterangepicker({
			timePicker: true,
			timePicker24Hour: true,
			timePickerIncrement: 1,
			timePickerSeconds: false,
			locale: {
				format: 'HH:mm:ss'
			}
		}).on('show.daterangepicker', function (ev, picker) {
			picker.container.find(".calendar-table").hide();
		});
	});

	// datatables
	$('#tabel-list-mhs-bls-pesan').DataTable();
	$('#tabel-mhs-kegiatan').DataTable();

	// wizard
	$('#verticalwizard').bootstrapWizard({
		'nextSelector': '.button-next',
		'previousSelector': '.button-previous',
	});

})
//dropify controller
$('.dropify').dropify();
