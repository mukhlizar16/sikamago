$(document).ready(function () {

	$('#table-list-mhs').on('click', '#btn-hapus-user', function () {
		var id = $(this).attr('data-id')
		var nama = $(this).attr('data-nama')
		$('#hapusModalUser').modal('show')
		$('#user').val(id)
		$('#nama-user').html(nama)
	})

	$('#form-hapus-user').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				Swal.fire({
					title: 'Menghapus data...',
					allowEscapeKey: false,
					allowOutsideClick: false,
					timer: 2000,
					didOpen: () => {
						Swal.showLoading()
					}
				}).then(function () {
					if (response.status = 'sukses') {
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							$('#hapusModalUser').modal('hide')
							location.reload()
						})
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

	$('#table-persyaratan').on('click', '#btn-catatan',function () {
		var id = $(this).closest('tr').find('#user').val();
		$('#catatanModal').modal('show');
		$('#user_id').val(id)
		$('#form-catatan')[0].reset()
	})

	$('#catatanModal').on('shown.bs.modal', function () {
		$('#field-catatan').hide()
	})

	$('#status').change(function () {
		var status = $(this).val()
		if (status == 0) {
			$('#field-catatan').show()
		} else {
			$('#field-catatan').hide()
		}
	})

	$('#form-catatan').submit(function (e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				Swal.fire({
					title: 'Menyimpan data...',
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
					}else if (response.status == 'update'){
						Swal.fire(
							'Sukses !',
							response.pesan,
							'success'
						).then(function () {
							location.reload()
						})
					}else if (response.status == 'fail'){
						Swal.fire(
							'Peringatan !',
							response.pesan,
							'warning'
						)
					}else {
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

	// status register
	$('#tabel-status').on('click', '#btn-status-register', function (){
		var id = $(this).closest('tr').find('#btn-status-register').attr('data-id')
		$('#statusModal').modal('show')
		$('#fitur').val(id)
	})

	// form status submit
	$('#form-status').submit(function (e){
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response){
				if(response.status == 'sukses'){
					Swal.fire(
						'Sukses !',
						response.pesan,
						'success'
					).then(function (){
						location.reload()
					})
				}else{
					Swal.fire(
						'Gagal !',
						response.pesan,
						'error'
					)
				}
			}
		})
	})

	/* Datatables */
	$('#table-list-mhs').DataTable({
		lengthChange: false,
		dom: 'Bfrtip',
		buttons: ['copy', 'excel', 'pdf', 'print', 'colvis'],
		language: {
			sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
			sProcessing: "Sedang memproses...",
			sLengthMenu: "Tampilkan _MENU_ entri",
			sZeroRecords: "Tidak ditemukan data yang sesuai",
			sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
			sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
			sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
			sInfoPostFix: "",
			sSearch: "Cari:",
			sUrl: "",
			oPaginate: {
				sFirst: "Pertama",
				sPrevious: "&lt",
				sNext: "&gt",
			}
		},
	});
	$('#table-persyaratan').DataTable({
		"lengthMenu": [ 10, 25, 50, 75, 100, 200, 500]
	});

	$('body').tooltip({selector: '[data-toggle="tooltip"]'});
})

/*$('#catatan').summernote();*/
