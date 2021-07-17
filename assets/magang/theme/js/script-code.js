$(document).ready(function () {
	/*checkCookie();*/
	show_allmenu();
	show_datamainmenu();
	show_datasubmenu();
	show_dataPAR();
	show_dataSPV();
	//Modal menu
	$('#btn-menu').click(function () {
		$('#modalmenu').modal('show');
		$('#form-tambahmenu')[0].reset();
	})

	//--------------------------------------------------------------------
	// START: OPERATOR
	//--------------------------------------------------------------------

	$('#form-op-profil').submit(function (e) {
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
		})
		return false;
	})

	$('#upload-foto-operator').click(function (e) {
		e.preventDefault();
		$('#modal-foto-operator').modal('show');
		$('#modal-foto-operator-title').html('Upload Foto Profil');
		$('#keterangan_modal-foto-operator').hide();
		$('#form-uploadFoto-operator')[0].reset();
		$(".dropify-clear").click();
	})

	$('#form-uploadFoto-operator').submit(function (e) {
		e.preventDefault();
		$('#keterangan_modal-foto-operator').html('<span class="alert alert-info" role="alert">Mengunggah berkas foto ...</span>');
		$('#btn-loading-modalFoto-operator').show();
		$('#btn-submit-modalFoto-operator').hide();
		$('#btn-close-modalFoto-operator').hide();
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
					$('#keterangan_modal-foto-operator').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto-operator').hide();
					$('#btn-submit-modalFoto-operator').show();
					$('#btn-close-modalFoto-operator').show();
					swal("Gagal!", data.pesan, "error");
				} else if (data.status == 'sukses-simpan') {
					$('#keterangan_modal-foto-operator').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto-operator').hide();
					$('#btn-submit-modalFoto-operator').show();
					$('#btn-close-modalFoto-operator').show();
					swal("Sukses!", "Foto berhasil diupload", "success").then(function () {
						$('#modal-foto-operator').modal('hide');
						location.reload();
					})
				} else if (data.status == 'gagal-simpan') {
					$('#keterangan_modal-foto-operator').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto-operator').hide();
					$('#btn-submit-modalFoto-operator').show();
					$('#btn-close-modalFoto-operator').show();
					swal("Gagal!", data.pesan, "error");
				} else if (data.status == 'gagal-update') {
					$('#keterangan_modal-foto-operator').html('<span class="alert alert-danger" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto-operator').hide();
					$('#btn-submit-modalFoto-operator').show();
					$('#btn-close-modalFoto-operator').show();
					swal("Gagal!", data.pesan, "error");
				} else {
					$('#keterangan_modal-foto-operator').html('<span class="alert alert-success" role="alert">' + data.pesan + '</span>');
					$('#btn-loading-modalFoto-operator').hide();
					$('#btn-submit-modalFoto-operator').show();
					$('#btn-close-modalFoto-operator').show();
					swal("Sukses!", data.pesan, "success").then(function () {
						$('#modal-foto-operator').modal('hide');
						location.reload();
					})
				}
			}
		})
		return false;
	})

	//--------------------------------------------------------------------
	// END: OPERATOR
	//--------------------------------------------------------------------

	//---------------------------------------------------------------------
	// START FUNCTION MENU
	//---------------------------------------------------------------------
	// show all menu
	function show_allmenu() {
		$.ajax({
			type: 'post',
			url: 'allmenu',
			dataType: 'json',
			success: function (data) {
				var html = '';
				for (var i = 0; i < data.length; i++) {
					var j = i + 1;
					html += '<tr><td class="text-center">' + j + '</td>' +
						'<td>' + data[i].mainmenu + '</td>' +
						'<td>' + data[i].submenu + '</td>' +
						'<td><span class="badge badge-pill badge-primary">' + data[i].level + '</span></td>' +
						'<td class="text-center">' +
						'<button type="button" class="btn btn-sm btn-info mr-2" id="edit-allmenu" value="' + data[i].id + '">Edit</button>' +
						'<button type="button" class="btn btn-sm btn-danger" id="delete-allmenu" value="' + data[i].id + '">Hapus</button>' +
						'</td>' +
						'</tr>';
				}
				$('#showing-allmenu').html(html);
			}
		})
	}

	// Submit form save all menu
	$('#form-tambahmenu').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'error') {
					swal("Kesalahan!", response.pesan, "error")
				} else if (response.status == 'gagal') {
					swal("Gagal!", response.pesan, "error")
				} else {
					swal("Sukses!", response.pesan, "success").then(function () {
						$('#modalmenu').modal('hide')
						show_allmenu();
					})
				}
			}
		})
		return false;
	})

	//---------------------------------------------------------------------
	// START FUNCTION MAIN MENU
	//---------------------------------------------------------------------
	//show data mainmenu
	function show_datamainmenu() {
		$.ajax({
			type: 'post',
			url: 'show_mainmenu',
			dataType: 'json',
			success: function (data) {
				var html = '';
				for (var i = 0; i < data.length; i++) {
					var j = i + 1;
					html += '<tr>' +
						'<td class="text-center">' + j + '</td>' +
						'<td>' + data[i].nama_mainmenu + '</td>' +
						'<td>' + data[i].icon + '</td>' +
						'<td class="text-center">' +
						'<button type="button" class="btn btn-info btn-sm mr-2" id="editMenu" value="' + data[i].id + '">Edit</button>' +
						'<button type="button" class="btn btn-danger btn-sm" id="deleteMenu" value="' + data[i].id + '">Hapus</button>' +
						'</td>' +
						'</tr>';
				}
				$('#target').html(html);
			}
		})
	}

	//modal main menu
	$('#btn-mainmenu').click(function () {
		$('#modal-mainmenu').modal('show');
		$('#form-tambah-mainmenu')[0].reset();
	})

	//submit form tambah main menu
	$('#form-tambah-mainmenu').submit(function (e) {
		e.preventDefault();
		$('#keterangan_mainmenu').html('<span class="alert alert-info" role="alert">Menyimpan ...</span>');
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'error') {
					$('#keterangan_mainmenu').html('<span class="alert alert-danger" role="alert">Gagal ...</span>');
					swal("Failed!", response.pesan, "error");
				} else if (response.status == 'sukses') {
					$('#keterangan_mainmenu').html('<span class="alert alert-success" role="alert">Sukses menyimpan data ...</span>');
					swal("Sukses!", response.pesan, "success").then(function () {
						$('#modal-mainmenu').modal('hide')
						show_datamainmenu();
					})
				} else {
					$('#keterangan_mainmenu').html('<span class="alert alert-danger" role="alert">Gagal menyimpan...</span>');
					swal("Failed!", response.pesan, "error");
				}
			}
		});
		return false;
	})

	//ambil data untuk update
	$(document).on('click', '#editMenu', function (e) {
		e.preventDefault();
		var edit_id = $(this).attr('value');
		$.ajax({
			type: 'post',
			url: 'edit_mainmenu',
			dataType: 'json',
			data: {
				edit_id: edit_id
			},
			success: function (data) {
				$('#modal_editmainMenu').modal('show');
				$('#id_menu').val(data.post.id);
				$('#nama_menu').val(data.post.nama_mainmenu);
				$('#ikon_menu').val(data.post.icon);
			}
		})
	});

	//submit form update main menu
	$('#form-edit-mainmenu').submit(function (e) {
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
						$('#modal_editmainMenu').modal('hide');
						show_datamainmenu();
					})
				} else {
					swal("Failed!", data.pesan, "error");
				}
			}
		});
		return false;
	})

	//delete main menu data
	$(document).on('click', '#deleteMenu', function (e) {
		e.preventDefault();
		var eID = $(this).attr('value');
		$.ajax({
			type: 'post',
			url: 'delete_mainmenu',
			dataType: 'json',
			data: {eID: eID},
			success: function (data) {
				if (data.status == 'sukses') {
					swal({
						title: "Anda yakin?",
						text: "Setelah dihapus, Anda tidak dapat mengembalikan data!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					}).then((willDelete) => {
						if (willDelete) {
							swal("Sukses! Data berhasil dihapus ...", {
								icon: "success",
							});
						} else {
							swal("Data batal dihapus ...", {
								icon: "error",
							});
						}
					});
					show_datamainmenu();
				} else {
					swal("Gagal!", "Data gagal dihapus!", "error")
				}
			}
		});
		return false;
	})

	//----------------------------------------------------------------------------------------------
	// END FUNCTION
	//----------------------------------------------------------------------------------------------


	//----------------------------------------------------------------------------------------------
	// START FUNCTION FOR SUBMENU
	//----------------------------------------------------------------------------------------------
	// Show data submenu
	function show_datasubmenu() {
		$.ajax({
			type: 'post',
			url: 'show_dataSubmenu',
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					var j = i + 1;
					html += '<tr><td class="text-center">' + j + '</td>' +
						'<td>' + data[i].nama_submenu + '</td>' +
						'<td>' + data[i].url + '</td>' +
						'<td class="text-center">' +
						'<button type="button" class="btn btn-sm btn-info mr-2" id="edit-submenu" value="' + data[i].id + '">Edit</button>' +
						'<button type="button" class="btn btn-sm btn-danger" id="hapus-submenu" value="' + data[i].id + '">Hapus</button>' +
						'</td>'
					'</tr>';
				}
				$('#show_tablesubmenu').html(html);
			}
		})
	}

	//Modal submenu
	$('#btn-submenu').click(function () {
		$('#modal-submenu').modal('show');
		$('#form-tambah-submenu')[0].reset();
	})

	//form submit tambah submenu
	$('#form-tambah-submenu').submit(function (e) {
		e.preventDefault();
		$('#keterangan_submenu').html('<span class="alert alert-info" role="alert">Menyimpan ...</span>');
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response) {
				if (response.status == 'error') {
					$('#keterangan_submenu').html('<span class="alert alert-danger" role="alert">Gagal ...</span>');
					swal("Failed!", response.pesan, "error");
				} else if (response.status == 'sukses') {
					$('#keterangan_submenu').html('<span class="alert alert-success" role="alert">Sukses menyimpan data ...</span>');
					swal("Sukses!", response.pesan, "success").then(function () {
						$('#modal-submenu').modal('hide')
					})
					show_datasubmenu();
				} else {
					$('#keterangan_submenu').html('<span class="alert alert-danger" role="alert">Gagal menyimpan...</span>');
					swal("Failed!", response.pesan, "error");
				}
			}
		});
		return false;
	})

	//edit data (ambil data) submenu
	$(document).on('click', '#edit-submenu', function (e) {
		e.preventDefault();
		var edit_id = $(this).attr('value');
		$.ajax({
			type: 'post',
			url: 'edit_submenu',
			dataType: 'json',
			data: {edit_id: edit_id},
			success: function (data) {
				if (data == 'gagal') {
					swal("Gagal!", "Data gagal dimuat ...", "error")
				} else {
					$('#modal_editsubMenu').modal('show');
					$('#id_submenu').val(data.post.id);
					$('#nama_submenu').val(data.post.nama_submenu);
					$('#url_submenu').val(data.post.url);
				}
			}
		})
		return false;
	})

	//update data submenu
	$('#form-edit-submenu').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			data: $(this).serialize(),
			url: $(this).attr('action'),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					swal("Sukses!", "Data berhasil diperbaharui ...", "success").then(function () {
						$('#modal_editsubMenu').modal('hide');
						show_datasubmenu();
					})
				} else {
					swal("Gagal!", "Data gagal diperbaharui", "error")
				}
			}
		})
	})

	//delete data submenu
	$(document).on('click', '#hapus-submenu', function () {
		var eID = $(this).attr('value');
		$.ajax({
			type: 'post',
			url: 'delete_submenu',
			dataType: 'json',
			data: {eID: eID},
			success: function (data) {
				if (data.status == 'sukses') {
					swal({
						title: "Anda yakin?",
						text: "Setelah dihapus, Anda tidak dapat mengembalikan data!",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
						.then((willDelete) => {
							if (willDelete) {
								swal("Sukses! Data berhasil dihapus ...", {
									icon: "success",
								});
							} else {
								swal("Data batal dihapus ...", {
									icon: "error",
								});
							}
						});
					show_datasubmenu();
				} else {
					swal("Gagal!", "Data gagal dihapus!", "error")
				}
			}
		});
		return false;
	})
	//----------------------------------------------------------------------------------------------
	// END FUNCTION FOR SUBMENU
	//----------------------------------------------------------------------------------------------


	//----------------------------------------------------------------------------------------------
	// BEGIN FUNCTION FOR ASSIGNMENT
	//----------------------------------------------------------------------------------------------
	$('#btn-addPA').click(function () {
		$('#modal-penugasan').modal('show');
		$('#modal-penugasanLabel').html('Tambah Penugasan Bimbingan Akademik');
	})

	//untuk tipe par
	$('#btn-addPAR').click(function () {
		$('#modal-penugasanpar').modal('show');
		$('#modal-penugasanparLabel').html('Tambah Penugasan Bimbingan Artikel Ilmiah');
	})

	//untuk tipe dpl
	$('#btn-addDPL').click(function () {
		$('#modal-penugasandpl').modal('show');
		$('#modal-penugasandplLabel').html('Tambah Penugasan Bimbingan Artikel Ilmiah');
	})

	//FORM SUBMIT Penugasan All Model
	$('#form-penugasan').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					swal("Sukses!", "Data berhasil ditambahkan", "success").then(function () {
						$('#modal-penugasan').modal('hide')
						show_dataPA();
						location.reload();
					})
				} else {
					swal("Gagal!", "Data gagal ditambahkan", "error")
				}
			}
		})
		return false;
	})
	$('#form-penugasanpar').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					swal("Sukses!", "Data berhasil ditambahkan", "success").then(function () {
						$('#modal-penugasanpar').modal('hide')
						show_dataNPA();
						location.reload();
					})
				} else {
					swal("Gagal!", "Data gagal ditambahkan", "error")
				}
			}
		})
		return false;
	})
	$('#form-penugasandpl').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				if (response.status == 'sukses') {
					swal("Sukses!", "Data berhasil ditambahkan", "success").then(function () {
						$('#modal-penugasandpl').modal('hide')
						show_dataDPL();
						location.reload();
					})
				} else {
					swal("Gagal!", "Data gagal ditambahkan", "error")
				}
			}
		})
		return false;
	})

	// hapus penugasan DPL
	$('#table-pa-list').on('click', '#btn-hapus', function (e) {
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
					url: 'hapus_penugasan',
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

	function show_dataPAR() {
		$.ajax({
				type: 'post',
				url: 'get_bimtable2',
				dataType: 'json',
				success: function (data) {
					if (data == '') {
						var html = '<tr>' +
							'<td class="text-center" colspan="4">Data kosong</td>' +
							'</tr>';
						$('#target-penugasan-par').html(html);
					} else {
						var html = '';
						for (var i = 0; i < data.length; i++) {
							var j = i + 1;
							html += '<tr>' +
								'<td class="text-center">' + j + '</td>' +
								'<td>' + data[i].nm_dosen + ' ' + data[i].nm_dosen2 + '</td>' +
								'<td>' + data[i].nm_mhs + ' ' + data[i].nm_mhs2 + '</td>' +
								'<td class="text-center">' +
								'<button class="btn btn-sm btn-info mr-2" id="btn-edit-par" value="' + data[i].id + '"><i class="feather icon-edit mr-2"></i>Edit</button>' +
								'<button class="btn btn-sm btn-danger" id="btn-hapus-par" value="' + data[i].id + '"><i class="feather icon-trash mr-2"></i>Hapus</button>' +
								'</td></tr>';
						}
						$('#target-penugasan-par').html(html);
					}
				}
			}
		)
	}

	function show_dataSPV() {
		$.ajax({
				type: 'post',
				url: 'get_bimtable3',
				dataType: 'json',
				success: function (data) {
					if (data == '') {
						var html = '<tr>' +
							'<td class="text-center" colspan="4">Data kosong</td>' +
							'</tr>';
						$('#target-penugasan-spv').html(html);
					} else {
						var html = '';
						for (var i = 0; i < data.length; i++) {
							var j = i + 1;
							html += '<tr>' +
								'<td class="text-center">' + j + '</td>' +
								'<td>' + data[i].nm_dosen + ' ' + data[i].nm_dosen2 + '</td>' +
								'<td class="text-wrap">' + data[i].lembaga + '</td>' +
								'<td>' + data[i].nm_mhs + ' ' + data[i].nm_mhs2 + '</td>' +
								'<td class="text-center">' +
								'<button class="btn btn-sm btn-info mr-2" id="btn-edit-spv" value="' + data[i].id + '"><i class="feather icon-edit mr-2"></i>Edit</button>' +
								'<button class="btn btn-sm btn-danger" id="btn-hapus-spv" value="' + data[i].id + '"><i class="feather icon-trash mr-2"></i>Hapus</button>' +
								'</td></tr>';
						}
						$('#target-penugasan-spv').html(html);
					}
				}
			}
		)
	}

	// chapter operator
	$('#modal-add-operator').on('shown.bs.modal', function () {
		$('#napan').focus();
	})

	$('#btn-add-operator').click(function () {
		$('#modal-add-operator').modal('show');
		$('#modal-add-operatorTitle').html('Tambah akun operator');
		$('#form-add-operator')[0].reset();
	})

	$('#form-add-operator').submit(function (e) {
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
		})
		return false;
	})

	//edit operator
	$('#modal-edit-operator').on('shown.bs.modal', function () {
		$('#napan-edit').focus();
	});
	$('#tabel-operator-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'edit_operator',
			dataType: 'json',
			data: {id: id},
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", "Data gagal dimuat ...", "error")
				} else {
					$('#modal-edit-operator').modal('show');
					$('#modal-edit-operatorTitle').html('Edit data operator');
					$('#id-edit').val(data.nilai.id);
					$('#napan-edit').val(data.nilai.napan);
					$('#nabel-edit').val(data.nilai.nabel);
					$('#email-edit').val(data.nilai.email);
					$('#password-edit').val(data.nilai.password);
					$('#status-edit').val(data.nilai.status);
				}
			}
		})
		return false;
	})

	$('#form-edit-operator').submit(function (e) {
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
		})
		return false;
	})

	//chapter pengumuman
	$('#form-add-pengumuman').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'post',
			url: 'add_pengumuman',
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
		})
		return false;
	})

	// chapter: edit mahasiswa tidak aktif
	$('#tabel-mhs-tdk-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'aktivasi',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error");
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
		return false;
	})

	// hapus data mahasiswa
	$('#tabel-mhs-aktif').on('click', '.btn-hapus', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, anda tidak dapat mengembalikannya lagi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_mahasiswa',
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

	// edit dosen yang tidak aktif
	$('#tabel-dpl-tdk-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'aktivasi_dosen',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error");
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
		return false;
	})

	// edit dosen par yang tidak aktif
	$('#tabel-par-tdk-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'aktivasi_dosen',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error");
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
		return false;
	})

	// edit data spv yang tidak aktif
	$('#tabel-spv-tdk-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'aktivasi_spv',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error");
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
		return false;
	})

	// hapus data spv
	$('#tabel-spv-aktif').on('click', '.btn-hapus', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		swal({
			title: "Anda yakin menghapus ?",
			text: "Setelah dihapus, anda tidak dapat mengembalikannya lagi!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: 'post',
					url: 'hapus_supervisor',
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

	// edit data operator yang tidak aktif
	$('#tabel-operator-tdk-aktif').on('click', '.btn-edit', function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'post',
			url: 'aktivasi_operator',
			data: {id: id},
			dataType: 'json',
			success: function (data) {
				if (data.status == 'gagal') {
					swal("Gagal!", data.pesan, "error");
				} else {
					swal("Sukses!", data.pesan, "success").then(function () {
						location.reload();
					});
				}
			}
		})
		return false;
	})

	// update data supervisor
	$('#form-spv-update').submit(function (e){
		e.preventDefault();
		$.ajax({
			url: 'update_supervisor',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			success: function (response){
				if (response.status == 'sukses'){
					swal("Sukses!", response.pesan, "success").then(function () {
						location.reload();
					})
				}else{
					swal("Gagal!", response.pesan, "error")
				}
			}
		})
		return false;
	})

	/*
	 * Method for magang location
	 */
	$('#prodi-magang').change(function (event){
		var prodi = $(this).val();
		var tabelku = $('#tabel-list-lokasi');
		$.ajax({
			type: 'post',
			url: 'show_location',
			data: {id_prodi : prodi},
			dataType: 'json',
			success: function (response){
				/*var table = '';
					for (var i = 0; i < data.length; i++){
						var j = i + 1;
						table += '<tr>' +
							'<td>'+j+'</td>' +
							'<td>'+data[i].prodi+'</td>' +
							'<td>'+data[i].napan+' '+data[i].nabel+'</td>' +
							'<td>'+data[i].lokasi+'</td>' +
							'</tr>';
					}
					$('#target-lokasi').append(table);*/
				tabelku.dataTable().fnDestroy();
				tabelku.find('tbody').empty();
				tabelku.dataTable({
					dom: 'Bfrtip',
					buttons: ['copy', 'csv', 'excel',
						{
							extend: 'pdfHtml5',
							orientation: 'portrait',
							pageSize: 'LEGAL'
						},
						'print'],
					data: response,
					columns: [
						{'data': 'prodi'},
						{'data': 'nim'},
						{'data': function (data){
								return data.napan +' '+ data.nabel
							}
						},
						{'data': function (data, type, row){
								if (data.lokasi == 'Lainnya'){
									return data.lokasi_lain
								}else{
									return data.lokasi
								}
							}
						},
					],
					columnDefs: [
						{
							"target": [0],
							"orderable": false
						},
						{
							"target": [1],
							"orderable": true
						},
					],
					"order": [
						[1, 'asc']
					],
					responsive: false,
				})
			}
		})
	})

	// pengumuman


//----------------------------------------------------------------------------------------------
// END FUNCTION FOR ASSIGNMENT
//----------------------------------------------------------------------------------------------
	$('#tabel-operator').DataTable();
	$('#tabel-mhs-aktif').DataTable();
	$('#tabel-mhs-tdk-aktif').DataTable();

	$('#tabel-dpl-aktif').DataTable();
	$('#tabel-dpl-tdk-aktif').DataTable();

	$('#tabel-par-aktif').DataTable();
	$('#tabel-par-tdk-aktif').DataTable();

	$('#tabel-operator-aktif').DataTable();
	$('#tabel-operator-tdk-aktif').DataTable();

	$('#table-pilihan-magang').DataTable({
		dom: 'Bfrtip',
		buttons: ['copy', 'csv', 'excel',
			{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL'
			},
			'print'],
		responsive: true,
	});

	$('#tabel-bimbingan').DataTable({
		dom: 'Bfrtip',
		buttons: ['copy', 'csv', 'excel',
			{
				extend: 'pdfHtml5',
				orientation: 'landscape',
				pageSize: 'LEGAL'
			},
			'print'],
		responsive: false,
	});
	$('#tabel-bimbingan2').DataTable({
		dom: 'Bfrtip',
		buttons: ['copy', 'csv', 'excel',
			{
				extend: 'pdfHtml5',
				orientation: 'portrait',
				pageSize: 'LEGAL'
			},
			'print'],
		responsive: false,
	});

	$('#table-pa-list').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [
			[1, 'asc']
		],
		"ajax": {
			url: 'get_bimtable',
			type: 'post'
		},
		"columnDefs": [{
			"target": [0, 3],
			"orderable": false
		}]
	});

	$('#table-par-list').DataTable();
	$('#table-supervisor-list').DataTable();
	$('#tabel-spv-aktif').DataTable();
	$('#tabel-spv-tdk-aktif').DataTable();
	$('#tabel-fokus').DataTable();
	$('#table-login-log').DataTable({
		"bInfo": false
	});
	$('#table-approve').DataTable({
		dom: 'Bfrtip',
		buttons: ['copy', 'csv', 'excel',
			{
				extend: 'pdfHtml5',
				orientation: 'portrait',
				pageSize: 'LEGAL'
			},
			'print'],
		responsive: false,
	});


	/* for graph */
	google.charts.load('current', {
		packages: ['corechart']
	});
	/*google.charts.setOnLoadCallback(drawChart);*/

	function load_data(tahun){
		$.ajax({
			url: 'create_graph',
			method: 'post',
			data: {tahun:tahun},
			dataType: 'json',
			success: function (data){
				var judul = data.judul;
				drawChart(data, judul);
			}
		})
	}

	function drawChart(chart_data, judul){
		var json_data = chart_data;
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Bulan');
		data.addColumn('number', 'Jumlah');

		$.each(json_data, function(i, json_data){
			var bulan = json_data.bulan;
			var pendapatan = parseFloat($.trim(json_data.nilai));
			data.addRows([
				[bulan, pendapatan]
			]);
		});

		var options = {
			chart: {
				title: 'Pendapatan Rata-Rata',
				subtitle: 'Test'
			},
			width: 1000,
			height: 500,
			curveType: 'function',
			legend: { position: 'top' },
			hAxis: {
				title: 'Bulan'
			},
			vAxis: {
				title: 'Jumlah'
			},
			chartArea:{width:'80%',height:'80%'}
		}

		var chart = new google.visualization.LineChart(document.getElementById('chart_area'));

		chart.draw(data, options);
	}

	// graphic data
	$('#tahun').change(function(){
		var tahun = $(this).val();
		if(tahun != '')
		{
			load_data(tahun);
		}
	});
});

function showPass() {
	var x = document.getElementById('password-edit');
	if (x.type === 'password') {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

/*function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function checkCookie() {
	var ticks = getCookie("modelopen");
	if (ticks != "") {
		ticks++;
		setCookie("modelopen", ticks, 1);
		if (ticks == "2" || ticks == "1" || ticks == "0") {
			$('#exampleModalCenter').modal();
		}
	} else {
		// user = prompt("Please enter your name:", "");
		$('#exampleModalCenter').modal();
		ticks = 1;
		setCookie("modelopen", ticks, 1);
	}
}

function delete_data() {
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this imaginary file!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		if (willDelete) {
			swal("Poof! Your imaginary file has been deleted!", {
				icon: "success",
			});
		} else {
			swal("Your imaginary file is safe!", {
				icon: "error",
			});
		}
	});
}*/

//dropify controller
$('.dropify').dropify();

$('#prodi-magang').select2({
	placeholder: "Pilih"
});
