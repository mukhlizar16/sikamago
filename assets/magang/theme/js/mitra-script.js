$(document).ready(function () {
	//----------------------------------------------------------------------------------------------
	// START: FUNCTION FOR PROFILE
	//----------------------------------------------------------------------------------------------
	// submit form C1
	$('#form-spv-tabus').submit(function (e) {
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

	// submit form C2
	$('#form-tab-spv').submit(function (e) {
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

	// Form password
	$('#show-pass').click(function (){
		if($(this).is(':checked')){
			$('#new_pass').attr('type', 'text')
		}else{
			$('#new_pass').attr('type', 'password')
		}
	})

	$('#form-spv-pass').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: 'update_password',
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

	// start: bimbingan
	$('#btn-add-mitra-bim').click(function () {
		$('#modal-mitra-addBim').modal('show');
		$('#modal-mitra-addBim-title').html('Tambah Mahasiswa Bimbingan');
		$('#form-submit-mitra-addBim')[0].reset();
	})

	$('#modal-mitra-addBim').on('shown.bs.modal', function () {
		$('#nama').focus();
	})

	$('#form-submit-mitra-addBim').submit(function (e) {
		e.preventDefault();
		$('#btn-loading-modal-mitra-addBim').show();
		$('#btn-close-modal-mitra-addBim').hide();
		$('#btn-submit-modal-mitra-addBim').hide();
		$('#keterangan_modal-mitra-addBim').addClass('mt-3').html('<span class="alert alert-info" role="alert">Menyimpan data ...</span>');
		$.ajax({
			type: 'post',
			url: 'tambah_bimbingan',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", "Data gagal disimpan ...", "error");
					$('#btn-loading-modal-mitra-addBim').hide();
					$('#btn-close-modal-mitra-addBim').show();
					$('#btn-submit-modal-mitra-addBim').show();
					$('#keterangan_modal-mitra-addBim').addClass('mt-3').html('<span class="alert alert-info" role="alert">Gagal menyimpan ...</span>');
				}else if(data.status == 'data-kosong'){
					swal("Gagal!", data.pesan, "error").then(function () {
						$('#btn-loading-modal-mitra-addBim').hide();
						$('#btn-close-modal-mitra-addBim').show();
						$('#btn-submit-modal-mitra-addBim').show();
						$('#modal-mitra-addBim').modal('hide');
						window.location.assign(data.alamat);
					})
				} else {
					swal("Sukses", "Data berhasil disimpan ...", "success").then(function () {
						$('#btn-loading-modal-mitra-addBim').hide();
						$('#btn-close-modal-mitra-addBim').show();
						$('#btn-submit-modal-mitra-addBim').show();
						$('#modal-mitra-addBim').modal('hide');
						location.reload();
					})
				}
			}
		})
		return false;
	})
	// end: bimbingan

	// menampilkan notif setujui
	$('#form-log-setuju').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
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

	$('#mitra-balas-pesan').submit(function (e){
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
		}
	})

	$('#pesan-mitra').submit(function (e) {
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
	$('#tbl-mitra-balas-pesan').on('click', '#btn-baca', function (e){
		e.preventDefault();
		var id = $(this).attr('data_id');
		$.ajax({
			type: 'post',
			url: 'sudah_baca',
			data: {id:id},
			dataType: 'json',
			success: function (data){
				if(data.status == 'gagal'){
					swal("Gagal!", data.pesan, "error")
				}else{
					swal("Sukses!", data.pesan, "success").then(function (){
						location.reload();
					})
				}
			}
		})
		return false;
	})

	// Notif persetujuan log mahasiswa
	$('#tabel-spv-detail-log').on('click', '#btn-setuju', function (e) {
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

	$('#lihat-log-mhs').DataTable();
	$('#tabel-mitra-detail-log').DataTable();
	$('#tabel-spv-add-mhs').DataTable();
	$('#tabel-mitra-list-pesan').DataTable();
	$('#list-kirim-pesan-mitra').DataTable();
	$('#tabel-mitra-balas-pesan').DataTable();
	$('#tabel-spv-kegiatan').DataTable();
})

//dropify controller
$('.dropify').dropify();
