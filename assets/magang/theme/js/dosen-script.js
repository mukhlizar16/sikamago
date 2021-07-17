'use strict';
$(document).ready(function () {
	//----------------------------------------------------------------------------------------------
	// START: FUNCTION FOR PROFILE
	//----------------------------------------------------------------------------------------------
	// submit form C1
	$('#form-dosen-tabus').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error")
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				}
			}
		});
		return false;
	})

	// Form password
	$('#show-pass').click(function (){
		if($(this).is(':checked')){
			$('#new_pass').attr('type', 'text')
		}else{
			$('#new_pass').attr('type', 'password')
		}
	})

	$('#form-tabDosen-pass').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: 'ubah_password',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			beforeSend: function (){
				$('.spinner-border').show()
				$('#btn-pass').hide()
			},
			success: function (data){
				if (data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
					$('.spinner-border').hide()
					$('#btn-pass').show()
				}else if (data.status == 'gagal'){
					swal("Gagal!", data.pesan, "error")
					$('#btn-pass').show()
					$('.spinner-border').hide()
				}else{
					swal("Periksa kembali!", data.pesan, "error")
					$('#btn-pass').show()
					$('.spinner-border').hide()
				}
			}
		})
		return false;
	})

	// submit form C2
	$('#form-tabDosen').submit(function (e) {
		e.preventDefault();
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

	// Modal photo change
	$(document).on('click', '#upload-foto', function () {
		$('#modal-foto').modal('show');
		$('#modal-foto-title').html('Upload Foto Profil');
		$('#keterangan_modal-foto').hide();
		$('#form-uploadFoto')[0].reset();
	})

	// Submit form foto
	$('#form-uploadDosenFoto').submit(function (e) {
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
				if (data.status == 'error') {
					$('#keterangan_modal-foto').show().html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Error!", data.pesan, "error")
				} else if (data.status == 'gagal-simpan') {
					$('#keterangan_modal-foto').show().html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Error!", data.pesan, "error")
				} else if (data.status == 'gagal-update') {
					$('#keterangan_modal-foto').show().html('<span class="alert alert-danger" role="alert">sukses ...</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Error!", data.pesan, "error")
				} else if (data.status == 'sukses-update') {
					$('#keterangan_modal-foto').show().html('<span class="alert alert-success" role="alert">sukses ...</span>');
					$('#btn-loading-modalFoto').hide();
					$('#btn-submit-modalFoto').show();
					$('#btn-close-modalFoto').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						$('#modal-foto').modal('hide');
						location.reload();
					})
				} else {
					$('#keterangan_modal-foto').show().html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>');
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
	//----------------------------------------------------------------------------------------------
	// END: FUNCTION FOR PROFILE
	//----------------------------------------------------------------------------------------------

	// start function for add bimbingan
	$('#btn-add-dosen-bim').click(function () {
		$('#modal-dosen-addBim').modal('show');
		$('#modal-dosen-addBim-title').html('Tambah Mahasiswa Bimbingan');
		$('#form-submit-dosen-addBim')[0].reset();
	})

	$('#modal-dosen-addBim').on('shown.bs.modal', function () {
		$('#nama').focus();
	})

	// submit form
	$('#form-submit-dosen-addBim').submit(function (e) {
		e.preventDefault();
		$('#btn-loading-modal-dosen-addBim').show();
		$('#btn-close-modal-dosen-addBim').hide();
		$('#btn-submit-modal-dosen-addBim').hide();
		$('#keterangan_modal-dosen-addBim').addClass('mt-3').html('<span class="alert alert-info" role="alert">Menyimpan data ...</span>');
		$.ajax({
			type: 'post',
			url: 'tambah_bimbingan',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", "Data gagal disimpan ...", "error");
					$('#btn-loading-modal-dosen-addBim').hide();
					$('#btn-close-modal-dosen-addBim').show();
					$('#btn-submit-modal-dosen-addBim').show();
					$('#keterangan_modal-dosen-addBim').addClass('mt-3').html('<span class="alert alert-info" role="alert">Gagal menyimpan ...</span>');
				}else if(data.status == 'data-kosong'){
					swal("Gagal!", data.pesan, "error").then(function (){
						$('#btn-loading-modal-dosen-addBim').hide();
						$('#btn-close-modal-dosen-addBim').show();
						$('#btn-submit-modal-dosen-addBim').show();
						$('#modal-dosen-addBim').modal('hide');
						window.location.assign(data.alamat);
					})
				} else {
					swal("Sukses", "Data berhasil disimpan ...", "success").then(function () {
						$('#btn-loading-modal-dosen-addBim').hide();
						$('#btn-close-modal-dosen-addBim').show();
						$('#btn-submit-modal-dosen-addBim').show();
						$('#modal-dosen-addBim').modal('hide');
						location.reload();
					})
				}
			}
		})
		return false;
	})

	// menampilkan notif setujui
	$('#tabel-detail-log').on('click', '#btn-setuju', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'setujui',
			data: {id:id},
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'sukses') {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					})
				} else {
					swal("Gagal!", data.pesan, "error").then(function () {
						location.reload();
					})
				}
			}
		})
		return false;
	})

	$('#dosen-balas-pesan').submit(function (e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data){
				if(data.status == 'gagal-balas'){
					swal("Gagal!", data.pesan, "error")
				}else{
					swal("Sukses!", data.pesan, "success").then(function (){
						location.reload();
					})
				}
			}
		})
	})

	$('#pesan-dosen').submit(function (e) {
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

	// tandai pesan sudah dibaca
	$('#tabel-dosen-balas-pesan').on('click', '#btn-baca', function (e){
		e.preventDefault();
		var id = $(this).attr('data_id');
		$.ajax({
			url: 'sudah_baca',
			type: 'post',
			data: {id:id},
			dataType: 'json',
			success: function (data){
				if(data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function (){
						location.reload();
					})
				}else{
					swal("Gagal!", data.pesan, "error")
				}
			}
		})
	})

	// chapter pesan
	$('#input').autocomplete({
		source:function(request, response) {
			var sUrl = 'get_penerimaMhs';
			$.getJSON(sUrl, request, function(result) {
				response(result);
			});
		},
		select:function(event, ui) {
			$('#id_penerima').val(ui.item.id);
			/*alert('Your selected id is '+ui.item.id);*/
		}
	});

	//chapter kegiatan
	$('#btn-add-dosen-kegiatan').click(function (e){
		e.preventDefault();
		$('#modal-dosen-kegiatan').modal('show');
	})

	$('#modal-dosen-kegiatan').on('shown.bs.modal', function (){
		$('#uraian').focus();
		$('#modal-dosen-kegiatan-title').html('Tambah Kegiatan').show();
		$('#btn-loading-modal-dosen-kegiatan').hide();
		$('#btn-submit-modal-dosen-kegiatan').show();
		$('#btn-close-modal-dosen-kegiatan').show();
		$('#form-submit-dosen-kegiatan')[0].reset();
	})

	$('#form-submit-dosen-kegiatan').submit(function (e){
		e.preventDefault();
		$('#btn-loading-modal-dosen-kegiatan').show();
		$('#btn-submit-modal-dosen-kegiatan').hide();
		$('#btn-close-modal-dosen-kegiatan').hide();
		$('#keterangan_modal-dosen-kegiatan').html('<span class="alert alert-info" role="alert" style="display: block">menyimpan ...</span>').addClass('mb-3');
		$.ajax({
			url: 'tambah_kegiatan',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (data){
				if(data.status == 'gagal'){
					$('#btn-loading-modal-dosen-kegiatan').hide();
					$('#btn-submit-modal-dosen-kegiatan').show();
					$('#btn-close-modal-dosen-kegiatan').show();
					$('#keterangan_modal-dosen-kegiatan').html('<span class="alert alert-danger" role="alert" style="display: block">gagal menyimpan, periksa kembali ...</span>');
					swal("Gagal!", data.pesan, "error")
				}else if(data.status == 'isi-profil'){
					$('#btn-loading-modal-dosen-kegiatan').hide();
					$('#btn-submit-modal-dosen-kegiatan').show();
					$('#btn-close-modal-dosen-kegiatan').show();
					$('#keterangan_modal-dosen-kegiatan').html('<span class="alert alert-danger" role="alert" style="display: block">Nomor HP atau foto masih kosong ...</span>');
					swal("Gagal!", data.pesan, "error")
				}else if(data.status == 'kosong'){
					$('#btn-loading-modal-dosen-kegiatan').hide();
					$('#btn-submit-modal-dosen-kegiatan').show();
					$('#btn-close-modal-dosen-kegiatan').show();
					$('#keterangan_modal-dosen-kegiatan').html('<span class="alert alert-danger" role="alert" style="display: block">periksa kembali ...</span>');
					swal("Gagal!", data.pesan, "error")
				}else{
					$('#btn-loading-modal-dosen-kegiatan').hide();
					$('#btn-submit-modal-dosen-kegiatan').show();
					$('#btn-close-modal-dosen-kegiatan').show();
					$('#keterangan_modal-dosen-kegiatan').html('<span class="alert alert-info" role="alert" style="display: block">berhasil menyimpan ...</span>');
					swal("Sukses!", data.pesan, "success").then(function (){
						location.reload();
					})
				}
			}
		})
		return false;
	})

	$('#tabel-dosen-kegiatan').on('click', '#btn-hapus', function (e){
		e.preventDefault();
		var id = $(this).attr('data-id');
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
					url: 'hapus_kegiatan',
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
		})
	})

	// hapus bimbingan
	$('#tabel-add-mhs').on('click', '#btn-hapus', function (e){
		e.preventDefault();
		var id = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, data tidak dapat dikembalikan lagi !",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_bimbingan',
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
		})
	})

	// start: laporan
	$('#btn-dosen-add-lap').click(function (){
		$('#modal-dosen-laporan').modal('show');
		$('#form-submit-dosen-lap')[0].reset();
	})
	$('#modal-dosen-laporan').on('shown.bs.modal', function () {
		$('#judul').focus();
		$('#modal-dosen-lap-title').html('Upload Laporan');
		$('#keterangan_modal-dosen-lap').hide();
		$('#btn-loading-modal-dosen-lap').hide();
		$(".dropify-clear").click();
	})
	$('#form-submit-dosen-lap').submit(function (e){
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'tambah_lap',
			data: new FormData(this),
			dataType: 'json',
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function (){
				$('#keterangan_modal-dosen-lap').html('<span style="display: block" class="alert alert-info" role="alert">Mengupload berkas ...</span>').show();
				$('#btn-loading-modal-dosen-lap').show();
				$('#btn-submit-modal-dosen-lap').hide();
				$('#btn-close-modal-dosen-lap').hide();
			},
			success: function (data){
				if (data.status == 'error'){
					swal("Kesalahan!", data.pesan, "error");
					$('#btn-loading-modal-dosen-lap').hide();
					$('#btn-submit-modal-dosen-lap').show();
					$('#keterangan_modal-dosen-lap').html('<span style="display: block" class="alert alert-warning" role="alert">Terjadi kesalahan ...</span>').show();
				}else if (data.status == 'sukses'){
					swal("Sukses!", data.pesan, "success").then(function (){
						location.reload();
						$('#modal-dosen-laporan').modal('hide');
					});
				}else {
					swal("Gagal!", data.pesan, "error");
					$('#btn-loading-modal-dosen-lap').hide();
					$('#btn-submit-modal-dosen-lap').show();
					$('#keterangan_modal-dosen-lap').html('<span style="display: block" class="alert alert-danger" role="alert">Gagal upload ...</span>').show();
				}
			}
		})
		return false;
	})
	// end: laporan

$('#lihat-log-mhs').DataTable();
$('#tabel-detail-log').DataTable();
$('#tabel-add-mhs').DataTable();
$('#tabel-dosen-list-pesan').DataTable();
$('#list-kirim-pesan-dosen').DataTable();
$('#tabel-dosen-balas-pesan').DataTable();
$('#tabel-dosen-kegiatan').DataTable();
})

//dropify controller
$('.dropify').dropify();
