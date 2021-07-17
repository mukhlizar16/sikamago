<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = 'Mahasiswa';
		$data['pengumuman'] = $this->Mahasiswa_m->get_pengumuman();
		$this->template->load('template/master', 'mahasiswa/dashboard', $data, false);
	}

	public function provinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			/*CURLOPT_URL => "https://api.rajaongkir.com/starter/province/?id=21"*//*?id=12*/
			CURLOPT_URL => "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 6cfba544b5577f381660b3035a5b8168"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$provinsi = json_decode($response, true);
			/*foreach ($provinsi as $key => $prov){
				echo $prov['name'];
			}*/
			print_r($provinsi);
			die();
		}
	}

	public function kota()
	{
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=11";
		$isi = file_get_contents($sumber, true);

		$arr_response = json_decode($isi, true);
		$kota = $arr_response['kota_kabupaten'];

		echo '<option value="">-Pilih-</option>';
		foreach ($kota as $key => $k) {
			echo '<option data-id="' . $k['id'] . '" value="' . $k['nama'] . '">' . $k['nama'] . '</option>';
		}
		echo '<option value="x">lainnya</option>';

	}

	public function kecamatan()
	{
		$id_kota = $this->input->post('id_kota');
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota={$id_kota}";
		$isi = file_get_contents($sumber, true);

		$arr_response = json_decode($isi, true);
		$kecamatan = $arr_response['kecamatan'];

		echo '<option value="">-Pilih-</option>';
		foreach ($kecamatan as $key => $kec) {
			echo '<option data-id="' . $kec['id'] . '" value="' . $kec['nama'] . '">' . $kec['nama'] . '</option>';
		}
		echo '<option value="x">Lainnya</option>';
	}

	public function kelurahan()
	{
		$id_kec = $this->input->post('id_kec');
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan={$id_kec}";
		$isi = file_get_contents($sumber, true);

		$arr_response = json_decode($isi, true);
		$kecamatan = $arr_response['kelurahan'];

		echo '<option value="">-Pilih-</option>';
		foreach ($kecamatan as $key => $kec) {
			echo '<option data-id="' . $kec['id'] . '" value="' . $kec['nama'] . '">' . $kec['nama'] . '</option>';
		}
		echo '<option value="x">Lainnya</option>';
	}

	public function profil()
	{
		$data = [
			'title' => 'Profil',
			'breadcrumb' => 'Profil'
		];

		// ambil id mahasiswa
		$id = $_SESSION['id-magang'];
		$cek_id = $this->Mahasiswa_m->get_ID($id)->row_array();
		if ($cek_id == null) {
			$id_m = 0;
		} else {
			$id_m = $cek_id['id'];
		}


		// ambil data pembimbing
		$jenis = 1;        // jenis bimbingan akademik
		$jenis2 = 2;        // jenis bimbingan karya ilmiah
		$jenis3 = 3;        // jenis bimbingan lapangan
		$mentor = $this->Mahasiswa_m->get_mentor($id_m, $jenis)->row_array();
		$par = $this->Mahasiswa_m->get_mentor($id_m, $jenis2)->row_array();
		$spv = $this->Mahasiswa_m->get_mentor($id_m, $jenis3)->row_array();
		if ($mentor == null) {
			$data['mentor'] = [
				'napan' => 'Belum',
				'nabel' => 'Ditetapkan',
				'level' => 'Kosong',
				'no_hp' => 'Kosong',
				'foto' => 'Kosong'
			];
		} else {
			$data['mentor'] = [
				'napan' => $mentor['napan'],
				'nabel' => $mentor['nabel'],
				'level' => $mentor['level'],
				'no_hp' => $mentor['no_hp_dosen'],
				'foto' => $mentor['foto_dosen'],
			];
		}
		if ($par == null) {
			$data['par'] = [
				'napan' => 'Belum',
				'nabel' => 'Ditetapkan',
				'level' => 'Kosong',
				'no_hp' => 'Kosong',
				'foto' => 'Kosong'
			];
		} else {
			$data['par'] = [
				'napan' => $par['napan'],
				'nabel' => $par['nabel'],
				'level' => $par['level'],
				'no_hp' => $par['no_hp_dosen'],
				'foto' => $par['foto_dosen'],
			];
		}
		if ($spv == null) {
			$data['spv'] = [
				'napan' => 'Belum',
				'nabel' => 'Ditetapkan',
				'level' => 'Kosong',
				'no_hp' => 'Kosong',
				'foto' => 'Kosong'
			];
		} else {
			$data['spv'] = [
				'napan' => $spv['napan'],
				'nabel' => $spv['nabel'],
				'level' => $spv['level'],
				'no_hp' => $spv['no_hp_dosen'],
				'foto' => $spv['foto_dosen'],
			];
		}
		// ambil data magang
		$data['magang'] = $this->Mahasiswa_m->get_lingkup();

		$data['user'] = $this->Mahasiswa_m->show_data($id)->row_array();
		$cek = $this->Mahasiswa_m->cek_mhsTable($id)->row_array();
		if ($cek == null) {
			$data['mhs'] = array(
				'id' => $id,
				'nim' => 'Data kosong',
				'no_hp' => 'Data kosong',
				'id_prodi' => 'Data kosong',
				'prodi' => 'Data kosong',
				'foto' => config_item('magang_avatar') . 'avatar.png'
			);
		} else {
			if ($cek['foto'] == null) {
				$data['mhs'] = [
					'id' => $id,
					'nim' => $cek['nim'],
					'id_prodi' => $cek['id_prodi'],
					'no_hp' => $cek['no_hp'],
					'prodi' => $cek['prodi'],
					'foto' => config_item('magang_avatar') . 'avatar.png'
				];
			}
			$data['mhs'] = array(
				'id' => $id,
				'nim' => $cek['nim'],
				'id_prodi' => $cek['id_prodi'],
				'no_hp' => $cek['no_hp'],
				'prodi' => $cek['prodi'],
				'foto' => config_item('magang_foto') . $cek['foto']
			);
		}

		$data['id_prodi'] = $this->Mahasiswa_m->get_prodi();
		// ambil data id dari tabel mahasiswa
		$cek = $this->Mahasiswa_m->ambil_ID($id)->row_array();
		if ($cek == null) {
			$id_mhs = 0;
		} else {
			$id_mhs = $cek['id'];
		}
		$bim = $this->Mahasiswa_m->get_magangTable($id_mhs)->row_array();
		/*var_dump($bim['bidang']);die();*/
		if (empty($bim)) {
			$data['bimbingan'] = [
				'lingkup' => 'Belum memilih',
				'bidang' => 'Belum memilih',
				'lokasi' => 'Belum memilih',
				'lokasi_lain' => '',
				'bidang_lain' => '',
				'id_lokasi' => '',
				'id_lingkup' => '',
				'tampil' => false
			];
		} else {
			$data['bimbingan'] = [
				'lingkup' => $bim['lingkup'],
				'bidang' => $bim['bidang'],
				'lokasi' => $bim['lokasi'],
				'lokasi_lain' => $bim['lokasi_lain'],
				'bidang_lain' => $bim['bidang_lain'],
				'id_lingkup' => $bim['id_lingkup'],
				'tampil' => true
			];
		}

		$data['magang_api'] = $this->Mahasiswa_m->pilihan_magangTable($id_m)->row_array();

		$this->template->load('template/master', 'mahasiswa/profil', $data, false);
	}

	public function show_lokasi_magang()
	{
		$id = $this->input->post('id');
		$data = $this->Mahasiswa_m->get_lokasi($id);
		echo json_encode($data);
	}

	public function show_bidang_magang()
	{
		$id = $this->input->post('id');
		$data = $this->Mahasiswa_m->get_bidang($id);
		echo json_encode($data);
	}

	//Update user data
	public function update_profil_C1()
	{
		$id = $this->input->post('id');
		$data = [
			'napan' => $this->input->post('napan'),
			'nabel' => $this->input->post('nabel'),
			'email' => $this->input->post('email'),
		];
		$ubah = $this->Profil_m->update_userTable($id, $data);
		if ($ubah) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Data berhasil diubah'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Data gagal diubah'
			];
		}
		echo json_encode($arr_data);
	}

	public function update_profil_C2()
	{
		$id = $this->input->post('id');
		$cek = $this->Mahasiswa_m->cek_mhsTable($id)->row_array();
		$data = array(
			'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
			'prodi_id' => htmlspecialchars($this->input->post('prodi'), true),
			'nim' => htmlspecialchars($this->input->post('nim'), true),
			'created_at' => date('Y-m-d H:i:s')
		);
		if (empty($cek)) {
			$simpan = $this->Mahasiswa_m->insert_data($id, $data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses-insert',
					'pesan' => 'Berhasil menambahkan data'
				];
			} else {
				$arr_data = [
					'status' => 'gagal-insert',
					'pesan' => 'Gagal menambahkan data'
				];
			}
		} else {
			$update = $this->Mahasiswa_m->update_data($id, $data);
			if ($update) {
				$arr_data = [
					'status' => 'sukses-update',
					'pesan' => 'Berhasil memperbaharui data'
				];
			} else {
				$arr_data = [
					'status' => 'gagal-update',
					'pesan' => 'Gagal memperbaharui data'
				];
			}
		}
		echo json_encode($arr_data);
	}

	public function update_foto()
	{
		$this->_upload();
		if (!$this->upload->do_upload('foto')) {
			$arr_data = [
				'status' => 'error-upload',
				'pesan' => strip_tags($this->upload->display_errors())
			];
		} else {
			//cek status foto tabel mahasiswa
			$mhs_id = $_SESSION['id-magang'];
			$cek_foto = $this->Mahasiswa_m->get_ID($mhs_id)->row_array();

			//jika tidak ada
			if ($cek_foto == null) {
				$data = [
					'user_id' => $mhs_id,
					'foto' => $this->upload->data('file_name'),
					'created_at' => date('Y-m-d H:i:s')
				];
				$simpan_foto = $this->Mahasiswa_m->simpan_foto($data);
				if ($simpan_foto) {
					$arr_data = [
						'status' => 'sukses-simpan',
						'pesan' => 'Foto berhasil disimpan'
					];
				} else {
					$arr_data = [
						'status' => 'gagal-simpan',
						'pesan' => 'Foto belum berhasil disimpan, periksa kembali ...'
					];
				}
			} else {
				// jika sudah ada, maka update data
				if ($cek_foto['foto'] == null) {
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				} else {
					$target = './assets/userfiles/' . $cek_foto['foto'];
					unlink($target);
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				}
				$update = $this->Mahasiswa_m->update_foto($data, $mhs_id);
				if ($update) {
					$arr_data = [
						'status' => 'sukses-update',
						'pesan' => 'Foto berhasil diperbaharui ...'
					];
				} else {
					$arr_data = [
						'status' => 'gagal-update',
						'pesan' => 'Foto belum berhasil diperbaharui, periksa kembali ...'
					];
				}
			}
		}
		echo json_encode($arr_data);
	}

	private function _upload()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['upload_path'] = './assets/userfiles/';
		$config['max_size'] = 5000;

		$this->load->library('upload', $config);
	}

	// chapter magang
	public function simpan_data_magang()
	{
		$id = $_SESSION['id-magang'];
		//ambil id dari tabel mahasiswa
		$cek = $this->Mahasiswa_m->ambil_ID($id)->row_array();
		if ($cek == null) {
			$arr_data = [
				'status' => 'error-tabel',
				'pesan' => 'Perbaharui data identitas terlebih dahulu ...'
			];
		} else {
			$id_mhs = $cek['id'];
			$magang = $_POST['bidang'];
			if (!empty($magang)) {
				$data = array(
					'lingkup_id' => $this->input->post('jenis'),
					'bidang_id' => $this->input->post('bidang'),
					'bidang_lain' => $this->input->post('bidang2'),
					'lokasi_id' => $this->input->post('lokasi'),
					'lokasi_lain' => $this->input->post('kota_lainnya'),
					'kecamatan' => '',
					'kecamatan_lainnya' => '',
					'kelurahan' => '',
					'kelurahan_lainnya' => '',
					'created_at' => date('Y-m-d H:i:s'),
				);
			} else {
				$data = array(
					'lingkup_id' => $this->input->post('jenis'),
					'bidang_id' => $this->input->post('bidang'),
					'bidang_lain' => $this->input->post('bidang2'),
					'lokasi_id' => $this->input->post('lokasi'),
					'lokasi_lain' => $this->input->post('kota_lainnya'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kecamatan_lainnya' => $this->input->post('kecamatan2'),
					'kelurahan' => $this->input->post('kelurahan'),
					'kelurahan_lainnya' => $this->input->post('kelurahan2'),
					'created_at' => date('Y-m-d H:i:s'),
				);
			}

			$cekdata = $this->Mahasiswa_m->cek_simpan($id_mhs)->row_array();

			if (empty($cekdata)) {
				$simpan = $this->Mahasiswa_m->save_dataMagang($id_mhs, $data);
				if ($simpan) {
					$arr_data = [
						'status' => 'sukses'
					];
				} else {
					$arr_data = [
						'status' => 'gagal-simpan'
					];
				}
			} else {
				$update = $this->Mahasiswa_m->update_dataMagang($id_mhs, $data);
				if ($update) {
					$arr_data = [
						'status' => 'sukses-update'
					];
				} else {
					$arr_data = [
						'status' => 'gagal-update'
					];
				}
			}
		}
		echo json_encode($arr_data);
	}

	//chapter log harian
	public function kegiatan()
	{
		$data = [
			'title' => 'Profil',
			'breadcrumb' => 'Log Harian'
		];

		//konfigurasi pagination
		/*$config['base_url'] = base_url('mahasiswa/kegiatan'); //site url
		$config['total_rows'] = $this->db->count_all('log'); //total row
		$config['per_page'] = 5;  //show record per halaman
		$config['uri_segment'] = 3;  // uri parameter
		$choice = $config['total_rows'] / $config["per_page"];
		$config['num_links'] = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&raquo';
		$config['prev_link'] = '&laquo';
		$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><a href="#" class="page-link">';
		$config['last_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3) ?: 0;*/

		// ambil ID mahasiswa
		$id_user = $_SESSION['id-magang'];
		$cek_id = $this->Mahasiswa_m->get_ID($id_user)->row_array();
		if ($cek_id != null) {
			$id_mhs = $cek_id['id'];
		} else {
			$id_mhs = '';
		}

		$jenis = 1;
		// ambil data pembimbing akademik
		$data['pembimbing'] = $this->Mahasiswa_m->get_mentor($id_mhs, $jenis);

		// panggil function get_mahasiswa_list yang ada pada model.
		/*$data['kegiatan'] = $this->Mahasiswa_m->get_kegiatan_list($config["per_page"], $data['start'], $id_mhs);*/
		$data['kegiatan'] = $this->Mahasiswa_m->get_kegiatan_list($id_mhs);
		$data['pagination'] = $this->pagination->create_links();

		// ambil data pilihan magang
		$magang = $this->Mahasiswa_m->get_pilihMagang($id_mhs)->row_array();
		if ($magang != null) {
			$lingkup_id = $magang['lingkup_id'];
			$bidang_id = $magang['bidang_id'];
		} else {
			$lingkup_id = '';
			$bidang_id = '';
		}
		// ambil id prodi
		$id_prodi = cek_prodi();

		// ambil data fokus kegiatan
		$data['fokus'] = $this->Mahasiswa_m->get_fokusData($lingkup_id, $bidang_id, $id_prodi);

		$this->template->load('template/master', 'mahasiswa/log-page', $data, false);
	}

	public function tambah_kegiatan()
	{
		// ambil ID mahasiswa
		$id_user = $_SESSION['id-magang'];
		$cek_id = $this->Mahasiswa_m->ambil_ID($id_user)->row_array();
		$id_mhs = $cek_id['id'];
		$data = [
			'mhs_id' => $id_mhs,
			'uraian' => $this->input->post('uraian'),
			'fokus_id' => $this->input->post('fokus'),
			'fokus_lain' => $this->input->post('fokus_lain'),
			'status' => 0,
			'status_spv' => 0,
			'created_at' => date('Y-m-d H:i:s')
		];
		$simpan = $this->Mahasiswa_m->save_logData($data);
		if ($simpan) {
			$arr_data = [
				'status' => 'sukses'
			];
		} else {
			$arr_data = [
				'status' => 'gagal'
			];
		}
		echo json_encode($arr_data);
	}

	public function hapus_kegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$id_log = $this->input->post('id');
			$hapus = $this->Mahasiswa_m->hapus_data_kegiatan($id_log);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data kegiatan berhasil dihapus ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data kegiatan gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}

	}

	public function laporan()
	{
		$data = [
			'title' => 'Mahasiswa / Laporan',
			'breadcrumb' => 'Laporan'
		];

		// ambil ID mahasiswa
		$id = $_SESSION['id-magang'];
		$cek_id = $this->Mahasiswa_m->get_ID($id)->row_array();
		if ($cek_id != null) {
			$idm = $cek_id['id'];
		} else {
			$idm = null;
		}

		$laporan = $this->Mahasiswa_m->get_laporan($idm)->row_array();
		$artikel = $this->Mahasiswa_m->get_artikelData($idm)->row_array();
		if ($laporan == null) {
			$data['laporan'] = array(
				'id' => '',
				'judul' => 'Belum ada',
				'nama_file' => 'Belum ada',
				'tgl' => '--',
				'status' => 'kosong'
			);
		} else {
			$data['laporan'] = array(
				'id' => $laporan['id'],
				'judul' => $laporan['judul'],
				'nama_file' => $laporan['nama_file'],
				'tgl' => date('m-d-Y', strtotime($laporan['created_at'])),
				'status' => 'ada'
			);
		}
		if ($artikel == null) {
			$data['artikel'] = array(
				'id' => '',
				'judul' => 'Belum ada',
				'nama_file' => 'Belum ada',
				'tgl' => '--',
				'status' => 'kosong'
			);
		} else {
			$data['artikel'] = array(
				'id' => $artikel['id'],
				'judul' => $artikel['judul'],
				'nama_file' => $artikel['nama_file'],
				'tgl' => date('m-d-Y', strtotime($artikel['created_at'])),
				'status' => 'ada'
			);
		}

		$this->template->load('template/master', 'mahasiswa/laporan-page', $data, false);
	}

	public function tambah_laporan()
	{
		if ($this->input->is_ajax_request()) {
			$this->upload_berkas();
			if (!$this->upload->do_upload('laporan')) {
				$arr_data = [
					'status' => 'gagal-upload',
					'pesan' => strip_tags($this->upload->display_errors())
				];
			} else {
				// ambil ID mahasiswa
				$id = $_SESSION['id-magang'];
				$cek_id = $this->Mahasiswa_m->get_ID($id)->row_array();
				if ($cek_id == null) {
					$idm = 0;
				} else {
					$idm = $cek_id['id'];
				}

				$data = array(
					'nama_file' => $this->upload->data('file_name'),
					'judul' => $this->input->post('judul'),
					'mhs_id' => $idm,
					'created_at' => date('Y-m-d H:i:s')
				);
				$simpan = $this->Mahasiswa_m->simpan_berkas($data);
				if ($simpan) {
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Berkas berhasil diupload ...'
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Berkas belum berhasil diupload ...'
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_laporan()
	{
		if ($this->input->is_ajax_request()) {
			$id_lap = $this->input->post('id');
			$ambil_lap = $this->Mahasiswa_m->get_laporan_by_ID($id_lap)->row_array();
			$hapus = $this->Mahasiswa_m->delete_laporan($id_lap);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil dihapus ...'
				];
				$target = './assets/magang/userfiles/laporan/' . $ambil_lap['nama_file'];
				unlink($target);
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	private function upload_berkas()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b . '-laporan';
		$config['allowed_types'] = 'pdf|PDF';
		$config['upload_path'] = './assets/magang/userfiles/laporan/';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
	}

	public function tambah_artikel()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b . '-artikel';
		$config['allowed_types'] = 'pdf|PDF';
		$config['upload_path'] = './assets/magang/userfiles/artikel/';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('nama_berkas')) {
			$arr_data = [
				'status' => 'gagal-upload',
				'pesan' => strip_tags($this->upload->display_errors())
			];
		} else {
			$data = array(
				'nama_file' => $this->upload->data('file_name'),
				'judul' => $this->input->post('judul_artikel'),
				'mhs_id' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			);

			$simpan = $this->Mahasiswa_m->simpan_artikel($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil diunggah ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal diunggah ...'
				];
			}
		}
		echo json_encode($arr_data);
	}

	public function hapus_artikel()
	{
		if ($this->input->is_ajax_request()) {
			$id_ar = $this->input->post('id');
			$ambil_artikel = $this->Mahasiswa_m->get_artikel_by_ID($id_ar)->row_array();
			$hapus = $this->Mahasiswa_m->delete_artikel($id_ar);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil dihapus ...'
				];
				$target = './assets/magang/userfiles/artikel/' . $ambil_artikel['nama_file'];
				unlink($target);
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function pesan()
	{
		$data = [
			'title' => 'Mahasiswa / Pesan',
			'breadcrumb' => 'Pesan'
		];

		// ambil id pengirim
		$id = $_SESSION['id-magang'];

		$data['pesanku'] = $this->Mahasiswa_m->get_send_Pesan($id);
		$data['list_pesan'] = $this->Mahasiswa_m->get_allPesan($id);

		$this->template->load('template/master', 'mahasiswa/pesan', $data, false);
	}

	function get_penerima()
	{
		if (isset($_GET['term'])) {
			$result = $this->Mahasiswa_m->search_penerima($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) {
					$aRow = array();
					$aRow['label'] = $row->napan . ' ' . $row->nabel;
					$aRow['value'] = $row->napan . ' ' . $row->nabel;
					$aRow['id'] = $row->id_dosen;
					$data[] = $aRow;
				}
				echo json_encode($data);
			}
		}
	}

	public function detail_pesan($id)
	{
		$data = [
			'title' => 'Mahasiswa / Detil Pesan',
			'breadcrumb' => 'Detil Pesan'
		];

		// ambil id mahasiswa sebagai penerima
		$idm = $_SESSION['id-magang'];

		// id dosen
		$idp = $this->uri->segment(3);
		$data['detail_pesan'] = $this->Mahasiswa_m->detail_pesan($idm, $idp);

		/*var_dump($data['detail_pesan']->result_array());die();*/
		$data['penerima'] = $idp;
		$this->template->load('template/master', 'mahasiswa/detail-pesan', $data, false);
	}

	public function balas_pesan()
	{
		// ambil id pengirim
		$idm = $_SESSION['id-magang'];

		$data = [
			'penerima_id' => $this->input->post('penerima'),
			'isi_pesan' => $this->input->post('pesan'),
			'pengirim_id' => $idm,
			'status_baca' => 0,
			'created_at' => date('Y-m-d H:i:s')
		];
		$simpan = $this->Mahasiswa_m->simpan_pesan($data);
		if ($simpan) {
			$arr_data = [
				'status' => 'sukses-balas',
				'pesan' => 'Berhasil mengirim pesan ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal-balas',
				'pesan' => 'Pesan gagal dikirim ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function kirim()
	{
		/*$penerima = explode(".", $this->input->post('penerima'));*/

		$idm = $_SESSION['id-magang'];

		//ambil id user penerima
		$id_penerima = $this->input->post('id_penerima');
		$cek_id_pen = $this->Mahasiswa_m->get_penerimaID($id_penerima)->row_array();
		$penerima = $cek_id_pen['user_id'];

		$data = [
			/*'penerima_id' => $penerima[0],*/
			'penerima_id' => $penerima,
			'pengirim_id' => $idm,
			'isi_pesan' => $this->input->post('pesan'),
			'created_at' => date('Y-m-d H:i:s')
		];
		$simpan = $this->Mahasiswa_m->simpan_pesan($data);
		if ($simpan) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Berhasil mengirim pesan ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Pesan gagal dikirim ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function hapus_pesan()
	{
		$id_pesan = $this->input->post('id');
		$hapus = $this->Mahasiswa_m->hapus_pesan($id_pesan);
		if ($hapus) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Pesan berhasil dihapus'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Pesan tidak dapat dihapus ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function sudah_baca()
	{
		$id_pesan = $this->input->post('id');
		$data = [
			'status_baca' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Mahasiswa_m->update_pesan($data, $id_pesan);
		if ($update) {
			$arr_data = [
				'status' => 'sukses-baca',
				'pesan' => 'Pesan telah dibaca ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal-baca',
				'pesan' => 'Pesan gagal ditandai telah dibaca ...'
			];
		}
		echo json_encode($arr_data);
	}

	// chapter data demografi
	public function data_demografi()
	{
		$data = [
			'title' => 'Mahasiswa / Data Demografi',
			'breadcrumb' => 'Data Demografi'
		];

		$id_mhs = id_mhs();
		$data['lokasi'] = $this->Mahasiswa_m->get_magangTable($id_mhs)->row_array();

		$datas = $this->Mahasiswa_m->get_demografi()->result_array();
		$data['data'] = json_encode($datas);

		$this->template->load('template/master', 'mahasiswa/demografi', $data, false);
	}

	public function tambah_data_kesehatan()
	{
		if ($this->input->is_ajax_request()) {
			// ambil id mahasiswa
			$idu = $_SESSION['id-magang'];
			$cek_id = $this->Mahasiswa_m->get_ID($idu)->row_array();
			$idm = $cek_id['id'];

			$data = [
				'wanita_subur' => $this->input->post('wanita_subur'),
				'pasangan_subur' => $this->input->post('pasangan_subur'),
				'ibu_bersalin' => $this->input->post('ibu_bersalin'),
				'kematian_ibu' => $this->input->post('kematian_ibu'),
				'kematian_balita' => $this->input->post('kematian_balita'),
				'masyarakat_sakit' => $this->input->post('masyarakat_sakit'),
				'pasangan_menikah' => $this->input->post('pasangan_menikah'),
				'ibu_hamil' => $this->input->post('ibu_hamil'),
				'ibu_nifas' => $this->input->post('ibu_nifas'),
				'kematian_bayi' => $this->input->post('kematian_bayi'),
				'kematian_kk' => $this->input->post('kematian_kk'),
				'tanggal' => $this->input->post('tanggal'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'mhs_id' => $idm,
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->simpan_data_kesehatan($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data bidang kesehatan berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data bidang kesehatan gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_data_perikanan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'jenis_ikan' => $this->input->post('jenis_ikan'),
				'harga_ikan' => $this->input->post('harga_ikan'),
				'ikan_tawar' => $this->input->post('ikan_tawar'),
				'udang_windu' => $this->input->post('udang_windu'),
				'udang_vanamae' => $this->input->post('udang_vanamae'),
				'kerang' => $this->input->post('kerang'),
				'kepiting' => $this->input->post('kepiting'),
				'alat_tangkap' => $this->input->post('alat_tangkap'),
				'tgl' => $this->input->post('tgl_perikanan'),
				'bulan' => $this->input->post('bln_perikanan'),
				'tahun' => $this->input->post('thn_perikanan'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => id_mhs()
			];

			$simpan = $this->Mahasiswa_m->save_demo_perikanan($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_data_sosial()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'anak_yatim' => $this->input->post('anak_yatim'),
				'anak_piatu' => $this->input->post('anak_piatu'),
				'yatim_piatu' => $this->input->post('yatim_piatu'),
				'siswa_prestasi' => $this->input->post('siswa_prestasi'),
				'organisasi_gampong' => $this->input->post('organisasi'),
				'kurang_mampu' => $this->input->post('kurang_mampu'),
				'penduduk' => $this->input->post('penduduk'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'tgl' => $this->input->post('tgl_sosial'),
				'bulan' => $this->input->post('bln_sosial'),
				'tahun' => $this->input->post('thn_sosial'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];
			$simpan = $this->Mahasiswa_m->simpan_demo_sosial($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses-simpan',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal-simpan',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_data_ekonomi()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'pendapatan_avg' => $this->input->post('pendapatan'),
				'jumlah_umkm' => $this->input->post('umkm'),
				'jlh_industri_rt' => $this->input->post('industri'),
				'tgl' => $this->input->post('tgl_ekonomi'),
				'bulan' => $this->input->post('bln_ekonomi'),
				'tahun' => $this->input->post('thn_ekonomi'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => id_mhs()
			];

			$simpan = $this->Mahasiswa_m->save_demo_ekonomi($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_data_pertanian()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'jenis_komoditi_pertanian' => $this->input->post('jenis_komoditi_pertanian'),
				'harga_jual_pertanian' => $this->input->post('harga_jual_pertanian'),
				'hambatan_pertanian' => $this->input->post('hambatan_pertanian'),
				'jenis_komoditi_perkebunan' => $this->input->post('jenis_komoditi_perkebunan'),
				'harga_jual_perkebunan' => $this->input->post('harga_jual_perkebunan'),
				'hambatan_perkebunan' => $this->input->post('hambatan_perkebunan'),
				'jenis_komoditi_peternakan' => $this->input->post('jenis_komoditi_peternakan'),
				'harga_jual_peternakan' => $this->input->post('harga_jual_peternakan'),
				'hambatan_peternakan' => $this->input->post('hambatan_peternakan'),
				'luas_pertanian' => $this->input->post('luas_pertanian'),
				'luas_perikanan' => $this->input->post('luas_perikanan'),
				'luas_perkebunan' => $this->input->post('luas_perkebunan'),
				'luas_peternakan' => $this->input->post('luas_peternakan'),
				'tgl' => $this->input->post('tgl_pertanian'),
				'bulan' => $this->input->post('bln_pertanian'),
				'tahun' => $this->input->post('thn_pertanian'),
				'kabupaten' => $this->input->post('kabupaten'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => id_mhs()
			];

			$simpan = $this->Mahasiswa_m->save_demo_pertanian($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	/*
	 * data geotop mulai
	*/
	public function data_geotop()
	{
		$id = id_mhs();
		$data = [
			'title' => 'Mahasiswa / Data GEOTOP',
			'breadcrumb' => 'Data GeoTop',
			'ikec' => $this->Mahasiswa_m->get_idenKec_data($id)->row_array(),
			'ides' => $this->Mahasiswa_m->get_ides_data($id)->row_array(),
			'igeo' => $this->Mahasiswa_m->get_igeo_data($id)->row_array(),
			'idem' => $this->Mahasiswa_m->get_idem_data($id)->row_array(),
			'dsk' => $this->Mahasiswa_m->get_dsk_data($id)->row_array(),
			'dp' => $this->Mahasiswa_m->get_dim_pend($id)->row_array(),
			'dimsos' => $this->Mahasiswa_m->get_dim_sos_data($id)->row_array(),
			'dsp' => $this->Mahasiswa_m->get_dimsos_kim($id)->row_array(),
			'dimeko' => $this->Mahasiswa_m->get_dimeko_data($id)->row_array(),
			'dim_eko' => $this->Mahasiswa_m->get_dim_eko_data($id)->row_array(),
			'ades' => $this->Mahasiswa_m->get_ades_data($id)->row_array(),
			'pd' => $this->Mahasiswa_m->get_pd_data($id)->row_array(),
		];

		$this->template->load('template/master', 'mahasiswa/geotop-page', $data, false);
	}

	public function tambah_identitas_kecamatan()
	{
		if ($this->input->is_ajax_request()) {
			$this->_upload_peta();
			if (!$this->upload->do_upload('peta')) {
				$arr_data = [
					'status' => 'error-upload',
					'pesan' => strip_tags($this->upload->display_errors())
				];
			} else {
				$data = [
					'nama_kecamatan' => $this->input->post('nm_kecamatan'),
					'nama_informan' => $this->input->post('nama_informan'),
					'jabatan' => $this->input->post('jabatan'),
					'no_hp' => $this->input->post('no_hp'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'jenis_kelamin' => $this->input->post('jk'),
					'latitude' => $this->input->post('lu'),
					'longitude' => $this->input->post('bujur'),
					'alamat' => $this->input->post('alamat'),
					'peta' => $this->upload->data('file_name'),
					'nama_camat' => $this->input->post('nama_camat'),
					'jk_camat' => $this->input->post('jk_c'),
					'no_hp_camat' => $this->input->post('no_hp_camat'),
					'no_telp_kantor_camat' => $this->input->post('no_telp_kantor_camat'),
					'email_kec' => $this->input->post('email_kec'),
					'fb_kec' => $this->input->post('fb_kec'),
					'insta_kec' => $this->input->post('insta_kec'),
					'twitter_kec' => $this->input->post('twitter_kec'),
					'web_kec' => $this->input->post('web_kec'),
					'pendidikan_camat' => $this->input->post('pendidikan_camat'),
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => id_mhs()
				];

				$idmhs = id_mhs();
				$cekdulu = $this->Mahasiswa_m->cekdata($idmhs);
				if ($cekdulu->num_rows() > 0) {
					$arr_data = [
						'status' => 'sudah-ada',
						'pesan' => 'Anda sudah mengisi data ini ...'
					];
				} else {
					$simpan = $this->Mahasiswa_m->save_identitas_kecamatan($data);

					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Data berhasil disimpan ...'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Data gagal disimpan ...'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	private function _upload_peta()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b . '-peta';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['upload_path'] = './assets/userfiles/peta/';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
	}

	public function tambah_identitas_desa()
	{
		if ($this->input->is_ajax_request()) {
			$this->_upload_peta_desa();
			if (!$this->upload->do_upload('peta_desa')) {
				$arr_data = [
					'status' => 'error-upload',
					'pesan' => strip_tags($this->upload->display_errors())
				];
			} else {
				$data = [
					'nm_kec' => $this->input->post('nm_kec'),
					'nm_desa' => $this->input->post('nm_desa'),
					'thn_ides' => $this->input->post('thn_ides'),
					'nama_informan' => $this->input->post('nama_informan_ides'),
					'jabatan' => $this->input->post('jabatan_ides'),
					'no_hp' => $this->input->post('no_hp_ides'),
					'tgl_lahir' => $this->input->post('tgl_lahir_ides'),
					'jenis_kelamin' => $this->input->post('jk_ides'),
					'latitude' => $this->input->post('lu_ides'),
					'longitude' => $this->input->post('bujur_ides'),
					'alamat' => $this->input->post('alamat_ides'),
					'kantor_desa' => $this->input->post('kan_des'),
					'peta_desa' => $this->upload->data('file_name'),
					'nama_kades' => $this->input->post('nama_kades'),
					'jk_kades' => $this->input->post('jk_kades'),
					'no_hp_kades' => $this->input->post('no_hp_kades'),
					'no_telp_kantor_desa' => $this->input->post('no_telp_kantor_desa'),
					'email_desa' => $this->input->post('email_desa'),
					'fb_desa' => $this->input->post('fb_desa'),
					'insta_desa' => $this->input->post('insta_desa'),
					'twitter_desa' => $this->input->post('twitter_desa'),
					'web_desa' => $this->input->post('web_desa'),
					'pendidikan_kades' => $this->input->post('pendidikan_kades'),
					'masa_jabatan' => $this->input->post('masa_jabatan'),
					'pendidikan_sekdes' => $this->input->post('pendidikan_sekdes'),
					'masa_jabatan_sekdes' => $this->input->post('masa_jabatan_sekdes'),
					'created_at' => date('Y-m-d H:i:s'),
					'created_by' => id_mhs()
				];

				$simpan = $this->Mahasiswa_m->save_identitas_desa($data);

				if ($simpan) {
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Data berhasil disimpan ...'
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Data gagal disimpan ...'
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	private function _upload_peta_desa()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b . '-peta-desa';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['upload_path'] = './assets/userfiles/peta/';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
	}

	public function tambah_identitas_geotop()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('nm_kec_igeo'),
				'nama_desa' => $this->input->post('nm_desa_igeo'),
				'tahun' => $this->input->post('thn_igeo'),
				'luas_wilayah' => $this->input->post('luas_wilayah'),
				'luas_hutan' => $this->input->post('luas_hutan'),
				'jenis_wilayah' => $this->input->post('jenis_wilayah'),
				'luas_lahan_pertanian' => $this->input->post('luas_lahan_pertanian'),
				'jenis_pertanian' => $this->input->post('jenis'),
				'jlh_per_hari' => $this->input->post('jlh_per_hari'),
				'luas_perairan' => $this->input->post('luas_perairan'),
				'jenis_perairan' => $this->input->post('jenis_perairan'),
				'jlh_per_hari_perairan' => $this->input->post('jlh_per_hari_perairan'),
				'luas_perkebunan' => $this->input->post('luas_perkebunan'),
				'jenis_perkebunan' => $this->input->post('jenis_perkebunan'),
				'jlh_per_hari_perkebunan' => $this->input->post('jlh_per_hari_perkebunan'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_identitas_geotop($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_iden_demo()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('nm_kec_idem'),
				'nama_desa' => $this->input->post('nm_desa_idem'),
				'tahun' => $this->input->post('tahun_idem'),
				'total_penduduk' => $this->input->post('tot_penduduk'),
				'total_lk' => $this->input->post('total_lk'),
				'total_pr' => $this->input->post('total_pr'),
				'pendatang' => $this->input->post('pendatang'),
				'pend_pergi' => $this->input->post('pend_pergi'),
				'total_kk' => $this->input->post('total_kk'),
				'total_kkp' => $this->input->post('total_kkp'),
				'total_kkmis' => $this->input->post('total_kkmis'),
				'total_by' => $this->input->post('total_by'),
				'total_balita' => $this->input->post('total_balita'),
				'total_rmj' => $this->input->post('total_rmj'),
				'total_dw1' => $this->input->post('total_dws'),
				'total_dw2' => $this->input->post('total_dws2'),
				'total_lansia' => $this->input->post('total_lansia'),
				'petani_lk' => $this->input->post('petani_lk'),
				'petani_pr' => $this->input->post('petani_pr'),
				'nelayan_lk' => $this->input->post('nelayan_lk'),
				'nelayan_pr' => $this->input->post('nelayan_pr'),
				'buruh_tani_lk' => $this->input->post('buruh_tani_lk'),
				'buruh_tani_pr' => $this->input->post('buruh_tani_pr'),
				'pns_lk' => $this->input->post('pns_lk'),
				'pns_pr' => $this->input->post('pns_pr'),
				'swasta_lk' => $this->input->post('swasta_lk'),
				'swasta_pr' => $this->input->post('swasta_pr'),
				'wiraswasta_lk' => $this->input->post('wiraswasta_lk'),
				'wiraswasta_pr' => $this->input->post('wiraswasta_pr'),
				'tni_lk' => $this->input->post('tni_lk'),
				'tni_pr' => $this->input->post('tni_pr'),
				'polri_lk' => $this->input->post('polri_lk'),
				'polri_pr' => $this->input->post('polri_pr'),
				'dokter_lk' => $this->input->post('dokter_lk'),
				'dokter_pr' => $this->input->post('dokter_pr'),
				'bidan_lk' => $this->input->post('bidan_lk'),
				'bidan_pr' => $this->input->post('bidan_pr'),
				'perawat_lk' => $this->input->post('perawat_lk'),
				'perawat_pr' => $this->input->post('perawat_pr'),
				'kerja_lain_lk' => $this->input->post('kerja_lain_lk'),
				'kerja_lain_pr' => $this->input->post('kerja_lain_pr'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_identitas_demo($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_dimsos_kesehatan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'kecamatan' => $this->input->post('nm_kec_dk'),
				'desa' => $this->input->post('nm_desa_dk'),
				'tahun' => $this->input->post('tahun_dk'),
				'serkes_terdekat' => $this->input->post('sarkes_terdekat'),
				'jarak_serkes' => $this->input->post('jarak_sarkes'),
				'menit_serkes' => $this->input->post('menit_sarkes'),
				'rs_terdekat' => $this->input->post('rs_terdekat'),
				'jarak_rs' => $this->input->post('jarak_rs'),
				'menit_rs' => $this->input->post('menit_rs'),
				'rs_bersalin' => $this->input->post('rs_bersalin_terdekat'),
				'jarak_rs_bersalin' => $this->input->post('jarak_rs_bersalin'),
				'menit_rs_bersalin' => $this->input->post('menit_rs_bersalin'),
				'puskes_inap' => $this->input->post('puskes_inap_terdekat'),
				'jarak_puskes_inap' => $this->input->post('jarak_puskes_inap'),
				'menit_puskes_inap' => $this->input->post('menit_puskes_inap'),
				'puskes_non_inap' => $this->input->post('puskes_non_inap'),
				'jarak_puskes_non_inap' => $this->input->post('jarak_puskes_non_inap'),
				'menit_puskes_non_inap' => $this->input->post('menit_puskes_non_inap'),
				'pustu_terdekat' => $this->input->post('pustu_terdekat'),
				'jarak_pustu' => $this->input->post('jarak_pustu'),
				'menit_pustu' => $this->input->post('menit_pustu'),
				'rumah_bersalin' => $this->input->post('rb_terdekat'),
				'jarak_rumah_bersalin' => $this->input->post('jarak_rb'),
				'menit_rumah_bersalin' => $this->input->post('menit_rb'),
				'poliklinik' => $this->input->post('klinik_terdekat'),
				'jarak_poliklinik' => $this->input->post('jarak_klinik'),
				'menit_poliklinik' => $this->input->post('menit_klinik'),
				'praktek_dokter' => $this->input->post('pd_terdekat'),
				'jarak_praktek_dokter' => $this->input->post('jarak_pd'),
				'menit_praktek_dokter' => $this->input->post('menit_pd'),
				'bidan_terdekat' => $this->input->post('pb_terdekat'),
				'jarak_bidan' => $this->input->post('jarak_pb'),
				'menit_bidan' => $this->input->post('menit_pb'),
				'apotik_terdekat' => $this->input->post('apotek_terdekat'),
				'jarak_apotik' => $this->input->post('jarak_apotek'),
				'menit_apotik' => $this->input->post('menit_apotek'),
				'bdd' => $this->input->post('bdd'),
				'jml_bdd' => $this->input->post('jlh_bdd'),
				'dokter' => $this->input->post('dokter'),
				'jml_dr' => $this->input->post('jlh_dokter'),
				'nakes' => $this->input->post('nakes'),
				'jml_nakes' => $this->input->post('jlh_nakes'),
				'poskeslindes' => $this->input->post('poskeslindes'),
				'jarak_poskeslindes' => $this->input->post('jarak_poskeslindes'),
				'menit_poskeslindes' => $this->input->post('menit_poskeslindes'),
				'fungsi_poskeslindes' => $this->input->post('fungsi_poskeslindes'),
				'rumah_singgah' => $this->input->post('rmh_singgah'),
				'jml_posyandu' => $this->input->post('jlh_posyandu'),
				'posyandu_1bln' => $this->input->post('posyandu1'),
				'posyandu_2bln' => $this->input->post('posyandu2'),
				'partisipasi_posyandu' => $this->input->post('partisipasi_posyandu'),
				'biaya_posyandu' => $this->input->post('biaya_posyandu'),
				'warga_bpjs' => $this->input->post('warga_bpjs'),
				'pemanfaatan_bpjs' => $this->input->post('manfaat_bpjs'),
				'jamkesda' => $this->input->post('jamkesda'),
				'aki' => $this->input->post('aki'),
				'jml_aki' => $this->input->post('jlh_aki'),
				'akaba' => $this->input->post('akaba'),
				'jml_akaba' => $this->input->post('jlh_akaba'),
				'akb' => $this->input->post('akb'),
				'jml_akb' => $this->input->post('jlh_akb'),
				'gizbur' => $this->input->post('gizbur'),
				'jml_gizbur' => $this->input->post('jlh_gizbur'),
				'klb' => $this->input->post('klb'),
				'penyakit_klb' => $this->input->post('penyakit_klb'),
				'rt_hpk' => $this->input->post('rt_hpk'),
				'ibu_hamil' => $this->input->post('ibu_hamil'),
				'usia_anak_bln' => $this->input->post('usia_anak_bln'),
				'pertumbuhan_hijau' => $this->input->post('pertumbuhan_hijau'),
				'pertumbuhan_kuning' => $this->input->post('pertumbuhan_kuning'),
				'pertumbuhan_merah' => $this->input->post('pertumbuhan_merah'),
				'bumil_cek' => $this->input->post('bumil_cek'),
				'bumil_pil_fe' => $this->input->post('bumil_pil_fe'),
				'bumil_nifas' => $this->input->post('bumil_nifas'),
				'bumil_konseling_gizi' => $this->input->post('bumil_konseling_gizi'),
				'bumil_kek' => $this->input->post('bumil_kek'),
				'bumil_kek_kunjungan' => $this->input->post('bumil_kek_kunjungan'),
				'bumil_resti' => $this->input->post('bumil_resti'),
				'bumil_resti_kunjungan' => $this->input->post('bumil_resti_kunjungan'),
				'bumil_air_minum_aman' => $this->input->post('bumil_air_minum_aman'),
				'bumil_jamban_layak' => $this->input->post('bumil_jamban_layak'),
				'bumil_jamkes' => $this->input->post('bumil_jamkes'),
				'jlh_indik_bumil' => $this->input->post('jlh_indik_bumil'),
				'jlh_indik_bumil_shr' => $this->input->post('jlh_indik_bumil_shr'),
				'tingkat_konvergensi_bumil' => $this->input->post('tingkat_konvergensi_bumil'),
				'anak_imunisasi' => $this->input->post('anak_imunisasi'),
				'anak_timbang_rutin' => $this->input->post('anak_timbang_rutin'),
				'anak_ukur_panjang' => $this->input->post('anak_ukur_panjang'),
				'pengasuh_lk' => $this->input->post('pengasuh_lk'),
				'pengasuh_pr' => $this->input->post('pengasuh_pr'),
				'jlh_kunjungan_gizi_brk' => $this->input->post('jlh_kunjungan_gizi_brk'),
				'jlh_kunjungan_gizi_krg' => $this->input->post('jlh_kunjungan_gizi_krg'),
				'jlh_kunjungan_anak_stunting' => $this->input->post('jlh_kunjungan_anak_stunting'),
				'jlh_anak_air_minum_aman' => $this->input->post('jlh_anak_air_minum_aman'),
				'jlh_anak_jamban_layak' => $this->input->post('jlh_anak_jamban_layak'),
				'jlh_anak_jamkes' => $this->input->post('jlh_anak_jamkes'),
				'jlh_anak_punya_akta_lahir' => $this->input->post('jlh_anak_punya_akta_lahir'),
				'jlh_pengasuh_ikut_parenting' => $this->input->post('jlh_pengasuh_ikut_parenting'),
				'jlh_indik_anak' => $this->input->post('jlh_indik_anak'),
				'jlh_indik_anak_shr' => $this->input->post('jlh_indik_anak_shr'),
				'konvergensi_anak' => $this->input->post('konvergensi_anak'),
				'jlh_anak_tahun' => $this->input->post('jlh_anak_tahun'),
				'jlh_anak_tahun_paud' => $this->input->post('jlh_anak_tahun_paud'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')

			];

			$simpan = $this->Mahasiswa_m->save_dimsos_kesehatan($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}

	}

	public function tambah_dimsos_pendidikan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('nm_kec_dp'),
				'nama_desa' => $this->input->post('nm_desa_dp'),
				'data_tahun' => $this->input->post('tahun_dp'),
				'jumlah_sd' => $this->input->post('jlh_sd'),
				'jumlah_gusd' => $this->input->post('jlh_guru_sd'),
				'jarak_sd' => $this->input->post('jrk_sd'),
				'menit_sd' => $this->input->post('mnt_sd'),
				'jumlah_smp' => $this->input->post('jlh_smp'),
				'jumlah_guru_smp' => $this->input->post('jlh_guru_smp'),
				'jarak_smp' => $this->input->post('jrk_smp'),
				'menit_smp' => $this->input->post('mnt_smp'),
				'jumlah_smu' => $this->input->post('jlh_smu'),
				'jumlah_guru_smu' => $this->input->post('jlh_guru_smu'),
				'jarak_smu' => $this->input->post('jrk_smu'),
				'menit_smu' => $this->input->post('mnt_smu'),
				'tgk_pend_pd' => $this->input->post('tk_pend'),
				'sd_tdk_sklh' => $this->input->post('sd_tdk_skl'),
				'sd_tdk_sklh_jml' => $this->input->post('sd_tdk_skl_jlh'),
				'smp_tdk_sklh' => $this->input->post('smp_tdk_skl'),
				'smp_tdk_sklh_jml' => $this->input->post('smp_tdk_skl_jlh'),
				'tunagrahita_20thn_msh_sklh' => $this->input->post('tunagrahita_skl'),
				'tunagrahita_20thn_tdk_sklh' => $this->input->post('tunagrahita_tdk_skl'),
				'tunanetra_20thn_msh_sklh' => $this->input->post('tunanetra_skl'),
				'tunanetra_20thn_tdk_sklh' => $this->input->post('tunanetra_tdk_skl'),
				'tunarungu_20thn_msh_sklh' => $this->input->post('tunarungu_skl'),
				'tunarungu_20thn_tdk_sklh' => $this->input->post('tunarungu_tdk_skl'),
				'tunalaras_20thn_msh_sklh' => $this->input->post('tunalaras_skl'),
				'tunalaras_20thn_tdk_sklh' => $this->input->post('tunalaras_tdk_skl'),
				'tunadaksa_20thn_msh_sklh' => $this->input->post('tunadaksa_skl'),
				'tunadaksa_20thn_tdk_sklh' => $this->input->post('tunadaksa_tdk_skl'),
				'paud' => $this->input->post('paud'),
				'jml_paud_pmr' => $this->input->post('jlh_paud_pmr'),
				'jml_paud_nonpmr' => $this->input->post('jlh_paud_non_pmr'),
				'jarak_paud' => $this->input->post('jrk_paud'),
				'waktu_paud' => $this->input->post('wkt_paud'),
				'tk' => $this->input->post('tk'),
				'jarak_tk' => $this->input->post('jrk_tk'),
				'ra' => $this->input->post('ra'),
				'jarak_ra' => $this->input->post('jrk_ra'),
				'ba' => $this->input->post('ba'),
				'jarak_ba' => $this->input->post('jrk_ba'),
				'guru_paud' => $this->input->post('guru_paud'),
				'guru_tk' => $this->input->post('jlh_guru_tk'),
				'guru_ra' => $this->input->post('jlh_guru_ra'),
				'guru_ba' => $this->input->post('jlh_guru_ba'),
				'pkbm' => $this->input->post('pkbm'),
				'jml_kursus' => $this->input->post('jlh_kursus'),
				'jarak_kursus' => $this->input->post('jrk_kursus'),
				'buta_aksara' => $this->input->post('buta_aksara'),
				'tbm' => $this->input->post('tbm'),
				'pemanfaatan_tbm' => $this->input->post('pemanfaatan_tbm'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_dimsos_pendidikan($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_dim_sos()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('kec_dim_sos'),
				'nama_desa' => $this->input->post('desa_dim_sos'),
				'data_tahun' => $this->input->post('thn_dimsos'),
				'gotongroyong' => $this->input->post('gotong_royong'),
				'fr_gotongroyong' => $this->input->post('fr_gotong_royong'),
				'rpublik' => $this->input->post('ruang_publik'),
				'kondisi_rpublik' => $this->input->post('kondisi_ruang_publik'),
				'karang_taruna' => $this->input->post('karang_taruna'),
				'karang_taruna_frek' => $this->input->post('karang_taruna_frek'),
				'pkk' => $this->input->post('pkk'),
				'pkk_frek' => $this->input->post('pkk_frek'),
				'org_agm' => $this->input->post('org_agm'),
				'org_agm_frek' => $this->input->post('org_agm_frek'),
				'panti' => $this->input->post('panti'),
				'panti_frek' => $this->input->post('panti_frek'),
				'arisan' => $this->input->post('arisan'),
				'arisan_frek' => $this->input->post('arisan_frek'),
				'lemb_tani' => $this->input->post('lemb_tani'),
				'lemb_tani_frek' => $this->input->post('lemb_tani_frek'),
				'lemb_nelayan' => $this->input->post('lemb_nelayan'),
				'lemb_nelayan_frek' => $this->input->post('lemb_nelayan_frek'),
				'lemb_usternak' => $this->input->post('lemb_usternak'),
				'lemb_usternak_frek' => $this->input->post('lemb_usternak_frek'),
				'lemb_pengrajin' => $this->input->post('lemb_pengrajin'),
				'lemb_pengrajin_frek' => $this->input->post('lemb_pengrajin_frek'),
				'lemb_wanita' => $this->input->post('lemb_wanita'),
				'lemb_wanita_frek' => $this->input->post('lemb_wanita_frek'),
				'lemb_lain' => $this->input->post('lemb_lain'),
				'lemb_lain_sebutkan' => $this->input->post('lemb_lain_sebutkan'),
				'lemb_lain_frek' => $this->input->post('lemb_lain_frek'),
				'partisipasi_musdes' => $this->input->post('partisipasi_musdes'),
				'frek_musdes' => $this->input->post('frek_musdes'),
				'perempuan_musdes' => $this->input->post('pr_musdes'),
				'total_lap' => $this->input->post('tot_fasilitas'),
				'jml_lap_sepak_bola' => $this->input->post('jlh_lap_sepak_bola'),
				'jml_lap_futsal' => $this->input->post('jlh_lap_futsal'),
				'jml_lap_tenis' => $this->input->post('jlh_lap_tenis'),
				'jml_lap_bulu_tangkis' => $this->input->post('jlh_lap_bulu_tangkis'),
				'jml_lap_basket' => $this->input->post('jlh_lap_basket'),
				'jml_lap_lainnya' => $this->input->post('jlh_lap_lainnya'),
				'lap_lainnya' => $this->input->post('lap_lainnya'),
				'keg_or' => $this->input->post('keg_or'),
				'jml_keg_or' => $this->input->post('jlh_keg_or'),
				'suku' => $this->input->post('suku'),
				'bahasa' => $this->input->post('bahasa'),
				'islam' => $this->input->post('islam'),
				'kristen' => $this->input->post('kristen'),
				'katolik' => $this->input->post('katolik'),
				'buddha' => $this->input->post('buddha'),
				'hindu' => $this->input->post('hindu'),
				'konghocu' => $this->input->post('konghocu'),
				'agama_lainnya' => $this->input->post('agama_lainnya'),
				'agama_lainnya_sebutkan' => $this->input->post('agama_lain_sebutkan'),
				'masjid' => $this->input->post('masjid'),
				'gereja_kristen' => $this->input->post('gereja_kristen'),
				'gereja_katolik' => $this->input->post('gereja_katolik'),
				'wihara' => $this->input->post('wihara'),
				'pura' => $this->input->post('pura'),
				'kelenteng' => $this->input->post('kelenteng'),
				'agama_mayoritas' => $this->input->post('agama_mayoritas'),
				'kel_seni' => $this->input->post('kel_seni'),
				'frek_kegseni' => $this->input->post('frek_seni'),
				'jml_kelseni' => $this->input->post('jlh_kelseni'),
				'hadir_adatlahir' => $this->input->post('hadir_adatlahir'),
				'hadir_adatkematian' => $this->input->post('hadir_adat_kematian'),
				'hadir_adatnikah' => $this->input->post('hadir_adatnikah'),
				'haribesar_lain' => $this->input->post('haribesar_lain'),
				'haribesar_lain_sebutkan' => $this->input->post('haribesar_lainsebutkan'),
				'poskamling' => $this->input->post('poskamling'),
				'siskamling_warga' => $this->input->post('siskamling_warga'),
				'konflik' => $this->input->post('konflik'),
				'konflik_masy' => $this->input->post('konflik_masy'),
				'konflik_desa' => $this->input->post('konflik_desa'),
				'konflik_kam' => $this->input->post('konflik_kam'),
				'konflik_pemr' => $this->input->post('konflik_pemr'),
				'konflik_mhs' => $this->input->post('konflik_mhs'),
				'konflik_suku' => $this->input->post('konflik_suku'),
				'konflik_agm' => $this->input->post('konflik_agm'),
				'konflik_lainnya' => $this->input->post('konflik_lain'),
				'konflik_lainnya_sebutkan' => $this->input->post('konflik_lain_sebutkan'),
				'damai' => $this->input->post('damai'),
				'damai_kam' => $this->input->post('damai_kam'),
				'damai_pmr' => $this->input->post('damai_pmr'),
				'damai_tokomasy' => $this->input->post('damai_tokomasy'),
				'damai_tokoag' => $this->input->post('damai_tokoag'),
				'damai_mediator_lain' => $this->input->post('mediator_lain'),
				'damai_lainnya_sebutkan' => $this->input->post('damai_lain_sebutkan'),
				'tidak_ada_mediator' => $this->input->post('tdk_ada_mediator'),
				'damai_trad' => $this->input->post('damai_trad'),
				'curi' => $this->input->post('curi'),
				'tipu' => $this->input->post('tipu'),
				'aniaya' => $this->input->post('aniaya'),
				'bakar' => $this->input->post('bakar'),
				'susila' => $this->input->post('susila'),
				'narkoba' => $this->input->post('narkoba'),
				'judi' => $this->input->post('judi'),
				'bunuh' => $this->input->post('bunuh'),
				'traffick' => $this->input->post('traffick'),
				'kejahatan' => $this->input->post('kejahatan'),
				'slb' => $this->input->post('slb'),
				'jml_slb' => $this->input->post('jlh_slb'),
				'tunagrahita_lk' => $this->input->post('tunagrahita_lk'),
				'tunagrahita_pr' => $this->input->post('tunagrahita_pr'),
				'tunanetra_lk' => $this->input->post('tunanetra_lk'),
				'tunanetra_pr' => $this->input->post('tunanetra_pr'),
				'tunarungu_lk' => $this->input->post('tunarungu_lk'),
				'tunarungu_pr' => $this->input->post('tunarungu_pr'),
				'tunalaras_lk' => $this->input->post('tunalaras_lk'),
				'tunalaras_pr' => $this->input->post('tunalaras_pr'),
				'tunadaksa_lk' => $this->input->post('tunadaksa_lk'),
				'tunadaksa_pr' => $this->input->post('tunadaksa_pr'),
				'disabilitas_lahir' => $this->input->post('disabilitas_lahir'),
				'disabilitas_kecelakaan' => $this->input->post('disabilitas_kecelakaan'),
				'anak_jalanan' => $this->input->post('anak_jalanan'),
				'anak_terlantar' => $this->input->post('anak_terlantar'),
				'kekerasan' => $this->input->post('kekerasan'),
				'pmks' => $this->input->post('pmks'),
				'napza' => $this->input->post('napza'),
				'migran' => $this->input->post('migran'),
				'gepeng' => $this->input->post('gepeng'),
				'psk' => $this->input->post('psk'),
				'bunuh_diri' => $this->input->post('bunuh_diri'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_dim_sos($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_dim_mukim()
	{

	}

	public function tambah_dimensi_ekonomi()
	{
		if ($this->input->is_ajax_request()) {
			$idm = id_mhs();
			$data_de = [
				'kecamatan' => $this->input->post('nama_kecamatan'),
				'kelurahan' => $this->input->post('nama_desa'),
				'tahun' => $this->input->post('tahun'),
				'mhs_id' => $idm
			];
			// data keberagaman produksi masyarakat desa
			$data_kp = [
				'penghasilan_utama' => $this->input->post('penghasilan_utama'),
				'jenis_produk_unggul_1' => $this->input->post('jenis_produk_unggul_1'),
				'jenis_produk_unggul_2' => $this->input->post('jenis_produk_unggul_2'),
				'perubahan_tani' => $this->input->post('perubahan_tani'),
				'produk_komoditi' => $this->input->post('produk_komoditi'),
				'produk_laut' => $this->input->post('produk_laut'),
				'perubahan_laut' => $this->input->post('perubahan_laut'),
				'industri_mikro' => $this->input->post('industri_mikro'),
				'industri_pariwisata' => $this->input->post('industri_pariwisata'),
				'industri_perikanan' => $this->input->post('industri_perikanan'),
				'industri_pertanian' => $this->input->post('industri_pertanian'),
				'industri_peternakan' => $this->input->post('industri_peternakan'),
				'industri_lainnya' => $this->input->post('industri_lainnya'),
				'tot_mikro_kecil' => $this->input->post('tot_mikro_kecil'),
				'tot_menengah' => $this->input->post('tot_menengah'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];
			// data sarana dan prasarana ekonomi di desa
			$data_sp = [
				'ttg_pertanian' => $this->input->post('ttg_pertanian'),
				'jlh_ttg_pertanian' => $this->input->post('jlh_ttg_pertanian'),
				'ttg_peternakan' => $this->input->post('ttg_peternakan'),
				'jlh_ttg_peternakan' => $this->input->post('jlh_ttg_peternakan'),
				'ttg_perikanan' => $this->input->post('ttg_perikanan'),
				'jlh_ttg_perikanan' => $this->input->post('jlh_ttg_perikanan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm,
			];
			// data akses ke pusat perdagangan
			$data_pp = [
				'kelompok_toko' => $this->input->post('kelompok_toko'),
				'jarak_kel_toko' => $this->input->post('jarak_kel_toko'),
				'jlh_pasar_permanen' => $this->input->post('jlh_pasar_permanen'),
				'jlh_pasar_semi_permanen' => $this->input->post('jlh_pasar_semi_permanen'),
				'jlh_pasar_tanpa_bangunan' => $this->input->post('jlh_pasar_tanpa_bangunan'),
				'jlh_toko_kelontong' => $this->input->post('jlh_toko_kelontong'),
				'kedai_makanan' => $this->input->post('kedai_makanan'),
				'hotel' => $this->input->post('hotel'),
				'jarak_hotel' => $this->input->post('jarak_hotel'),
				'waktu_tempuh_hotel' => $this->input->post('waktu_tempuh_hotel'),
				'biogas' => $this->input->post('biogas'),
				'agen_lpg' => $this->input->post('agen_lpg'),
				'bb_masak' => $this->input->post('bb_masak'),
				'bb_lainnya' => $this->input->post('bb_lainnya'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];
			// data akses distribusi logistik
			$data_dl = [
				'kantor_pos' => $this->input->post('kantor_pos'),
				'jarak_pos' => $this->input->post('jarak_pos'),
				'ekspedisi' => $this->input->post('ekspedisi'),
				'jarak_ekspedisi' => $this->input->post('jarak_ekspedisi'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];
			// data akses lembaga keuangan
			$data_lk = [
				'bank_umum' => $this->input->post('bank_umum'),
				'jarak_bank_umum' => $this->input->post('jarak_bank_umum'),
				'bank_swasta' => $this->input->post('bank_swasta'),
				'jarak_bank_swasta' => $this->input->post('jarak_bank_swasta'),
				'bpr' => $this->input->post('bpr'),
				'kur' => $this->input->post('kur'),
				'kkpe' => $this->input->post('kkpe'),
				'kuk' => $this->input->post('kuk'),
				'kredit_lainnya' => $this->input->post('kredit_lainnya'),
				'nama_kredit_lainnya' => $this->input->post('nama_kredit_lainnya'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];
			// data ketersediaan lembaga ekonomi
			$data_le = [
				'jlh_koperasi_aktif' => $this->input->post('jlh_koperasi_aktif'),
				'bum_desa' => $this->input->post('bum_desa'),
				'nama_bum_desa' => $this->input->post('nama_bum_desa'),
				'status_bum_desa' => $this->input->post('status_bum_desa'),
				'bumdes_bersama' => $this->input->post('bumdes_bersama'),
				'nama_bumdes_bersama' => $this->input->post('nama_bumdes_bersama'),
				'kantor_bumdes_bersama' => $this->input->post('kantor_bumdes_bersama'),
				'status_bumdes_bersama' => $this->input->post('status_bumdes_bersama'),
				'bumdes_bisnis_sosial' => $this->input->post('bumdes_bisnis_sosial'),
				'bumdes_bis_sos_air_bersih' => $this->input->post('bumdes_bis_sos_air_bersih'),
				'bumdes_bis_sos_listrik' => $this->input->post('bumdes_bis_sos_listrik'),
				'bumdes_bis_sos_sampah' => $this->input->post('bumdes_bis_sos_sampah'),
				'bumdes_bis_sos_jasa' => $this->input->post('bumdes_bis_sos_jasa'),
				'bumdes_penyewaan' => $this->input->post('bumdes_penyewaan'),
				'bumdes_sewa_gedung' => $this->input->post('bumdes_sewa_gedung'),
				'bumdes_sewa_tenda' => $this->input->post('bumdes_sewa_tenda'),
				'bumdes_sewa_soundsystem' => $this->input->post('bumdes_sewa_soundsystem'),
				'bumdes_sewa_peralatan_lainnya' => $this->input->post('bumdes_sewa_peralatan_lainnya'),
				'bumdes_perdagangan' => $this->input->post('bumdes_perdagangan'),
				'bumdes_bid_pertanian' => $this->input->post('bumdes_bid_pertanian'),
				'nama_bumdes_bid_pertanian' => $this->input->post('nama_bumdes_bid_pertanian'),
				'bumdes_bid_perkebunan' => $this->input->post('bumdes_bid_perkebunan'),
				'nama_bumdes_bid_perkebunan' => $this->input->post('nama_bumdes_bid_perkebunan'),
				'bumdes_bid_peternakan' => $this->input->post('bumdes_bid_peternakan'),
				'nama_bumdes_bid_peternakan' => $this->input->post('nama_bumdes_bid_peternakan'),
				'bumdes_bid_sembako' => $this->input->post('bumdes_bid_sembako'),
				'bumdesa_keuangan' => $this->input->post('bumdesa_keuangan'),
				'bumdes_simpan_pinjam' => $this->input->post('bumdes_simpan_pinjam'),
				'bumdes_uedsp' => $this->input->post('bumdes_uedsp'),
				'bumdes_mikro_finance' => $this->input->post('bumdes_mikro_finance'),
				'bumdes_brilink' => $this->input->post('bumdes_brilink'),
				'bumdes_agen46' => $this->input->post('bumdes_agen46'),
				'bumdes_keuangan_kredit' => $this->input->post('bumdes_keuangan_kredit'),
				'bumdes_keuangan_koperasi' => $this->input->post('bumdes_keuangan_koperasi'),
				'bumdes_keuangan_ppob' => $this->input->post('bumdes_keuangan_ppob'),
				'bumdes_perantara' => $this->input->post('bumdes_perantara'),
				'bumdes_perantara_bid_jasa' => $this->input->post('bumdes_perantara_bid_jasa'),
				'bumdes_perantara_bid_bengkel' => $this->input->post('bumdes_perantara_bid_bengkel'),
				'bumdes_perantara_kios' => $this->input->post('bumdes_perantara_kios'),
				'bumdes_perantara_percetakan' => $this->input->post('bumdes_perantara_percetakan'),
				'bumdes_perantara_photocopy' => $this->input->post('bumdes_perantara_photocopy'),
				'bumdes_giling_padi' => $this->input->post('bumdes_giling_padi'),
				'bumdes_usaha' => $this->input->post('bumdes_usaha'),
				'bumdes_usaha_bid_kel_usaha' => $this->input->post('bumdes_usaha_bid_kel_usaha'),
				'bumdes_penjualan_tiket' => $this->input->post('bumdes_penjualan_tiket'),
				'bumdes_karaoke' => $this->input->post('bumdes_karaoke'),
				'bumdes_pariwisata' => $this->input->post('bumdes_pariwisata'),
				'bumdes_wisdes' => $this->input->post('bumdes_wisdes'),
				'bumdes_agrowisata' => $this->input->post('bumdes_agrowisata'),
				'bumdes_wisata_alam' => $this->input->post('bumdes_wisata_alam'),
				'bumdes_transportasi' => $this->input->post('bumdes_transportasi'),
				'omset_bumdes' => $this->input->post('omset_bumdes'),
				'omset_bumdes_bersama' => $this->input->post('omset_bumdes_bersama'),
				'jlh_usaha_bumdes' => $this->input->post('jlh_usaha_bumdes'),
				'perdes_bentuk_bumdes' => $this->input->post('perdes_bentuk_bumdes'),
				'thn_berdiri_bumdes' => $this->input->post('thn_berdiri_bumdes'),
				'tot_tenagakerja_bumdes' => $this->input->post('tot_tenagakerja_bumdes'),
				'pengelola_bumdes' => $this->input->post('pengelola_bumdes'),
				'ketua_bumdes' => $this->input->post('ketua_bumdes'),
				'sekretaris_bumdes' => $this->input->post('sekretaris_bumdes'),
				'bendahara_bumdes' => $this->input->post('bendahara_bumdes'),
				'jlh_anggota_bumdes' => $this->input->post('jlh_anggota_bumdes'),
				'sk_pengelola_bumdes' => $this->input->post('sk_pengelola_bumdes'),
				'email_bumdes' => $this->input->post('email_bumdes'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];
			// data keterbukaan wilayah
			$data_kw = [
				'angkutan_umum' => $this->input->post('angkutan_umum'),
				'angkutan_umum_utama' => $this->input->post('angkutan_umum_utama'),
				'jam_operasional' => $this->input->post('jam_operasional'),
				'jalan_desa' => $this->input->post('jalan_desa'),
				'jenis_permukaan' => $this->input->post('jenis_permukaan'),
				'kualitas_jalan' => $this->input->post('kualitas_jalan'),
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $idm
			];

			// simpan data
			$simpan = $this->Mahasiswa_m->save_dimekoData($data_de, $data_kp, $data_sp, $data_pp, $data_dl, $data_lk, $data_le, $data_kw, $idm);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_dimeko()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('nm_kec_de'),
				'nama_desa' => $this->input->post('nm_desa_de'),
				'data_tahun' => $this->input->post('thn_de'),
				'air_desa' => $this->input->post('airdesa'),
				'cemar_air' => $this->input->post('cemar_air'),
				'cemar_tanah' => $this->input->post('cemar_tnh'),
				'cemar_udara' => $this->input->post('cemar_udr'),
				'dampak_cemar' => $this->input->post('dmpk_cemar'),
				'sungai_lembah' => $this->input->post('sngai_lmbh'),
				'tataruang' => $this->input->post('tataruang'),
				'perub_lahan' => $this->input->post('perub_lhn'),
				'tanah_longsor' => $this->input->post('tnh_lngsr'),
				'banjir' => $this->input->post('bnjr'),
				'gempa' => $this->input->post('gmp'),
				'tsunami' => $this->input->post('tsunami'),
				'gelpasang' => $this->input->post('gel_pasang'),
				'angin_puyuh' => $this->input->post('agn_pyh'),
				'gunung_meletus' => $this->input->post('gunung_mlts'),
				'kebakaran' => $this->input->post('kbkrn'),
				'kekeringan' => $this->input->post('kekeringan'),
				'bencana_lainnya' => $this->input->post('bncn_lain'),
				'frek_bencana_lain' => $this->input->post('frek_bncn_lain'),
				'spdben' => $this->input->post('spdben'),
				'spdben_tsunami' => $this->input->post('spdben_tsunami'),
				'perlab_keselamatan' => $this->input->post('perlab_keselamatan'),
				'jalur_evakuasi' => $this->input->post('jalur_evakuasi'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_dimeko($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_aktivitas_desa()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'nama_kecamatan' => $this->input->post('nm_kec_akdes'),
				'nama_desa' => $this->input->post('nm_desa_akdes'),
				'tahun' => $this->input->post('tahun_akdes'),
				'pld' => $this->input->post('pld'),
				'jlh_pld' => $this->input->post('jlh_pld'),
				'kpmd_aktif' => $this->input->post('kpmd_aktif'),
				'rpjmdes_aktif' => $this->input->post('RPJMDes_aktif'),
				'kebun_gizi' => $this->input->post('kebun_gizi'),
				'pangan' => $this->input->post('pangan'),
				'perdes' => $this->input->post('perdes'),
				'created_by' => id_mhs(),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Mahasiswa_m->save_aktivitas_desa($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function tambah_pendes()
	{
		if ($this->input->is_ajax_request()){
			$data = [
				'kecamatan' => $this->input->post('nm_kec_pd'),
				'nama_desa' => $this->input->post('nm_desa_pd'),
				'data_tahun' => $this->input->post('tahun_pd'),
				'pad_2020' => $this->input->post('pad_2020'),
				'pad_2019' => $this->input->post('pad_2019'),
				'dd_2020' => $this->input->post('dd_2020'),
				'dd_2019' => $this->input->post('dd_2019'),
				'pajak_dan_retribusi_2020' => $this->input->post('pajak_2020'),
				'pajak_dan_retribusi_2019' => $this->input->post('pajak_2019'),
				'al_dd_2020' => $this->input->post('add_2020'),
				'al_dd_2019' => $this->input->post('add_2019'),
				'bp_2020' => $this->input->post('bp_2020'),
				'bp_2019' => $this->input->post('bp_2019'),
				'bkab_2020' => $this->input->post('bk_2020'),
				'bkab_2019' => $this->input->post('bk_2019'),
				'lainnya_2020' => $this->input->post('lain_2020'),
				'tnh_kasdesa' => $this->input->post('tnh_kasdes'),//belum ada diweb dan data base
				'bgn_kntr' => $this->input->post('kandes'),
				'bgn_balai' => $this->input->post('balai'),
				'bgn_desa_lainnya' => $this->input->post('bangunan_lain'),
				'pasar_hewan' => $this->input->post('pasar_hewan'),
				'lelang_ikan' => $this->input->post('lelang_ikan'),
				'lelang_pertanian' => $this->input->post('pasar_pelelang'),
				'pasar_desa_lain' => $this->input->post('pasar_lain'),
				'aset_desa_lain' => $this->input->post('aset_desa'),
				'infoapbdes_mading' => $this->input->post('infoapbdes_mading'),
				'infoapbdes_mus' => $this->input->post('infoapbdes_mus'),
				'infoapbdes_web' => $this->input->post('infoapbdes_we'),
				'infoapbdes_lain' => $this->input->post('infoapbdes_lain'),
				'ktr_desa_camat' => $this->input->post('ktrdesa_ktrcamat'),
				'wkt_desa_camat' => $this->input->post('wkt_ktrdesa_ktr_camat'),
				'biaya_desa_camat' => $this->input->post('biaya_ktrdesa_ktrcamat'),
				'jrk_ktr_desa_bupati' => $this->input->post('ktrdesa_ktrbupati'),
				'wkt_ktr_desa_bupati' => $this->input->post('wkt_ktrdesa_ktr_bupati'),
				'biaya_ktr_desa_bupati' => $this->input->post('biaya_ktrdesa_ktrbupati'),
			];

			$simpan = $this->Mahasiswa_m->save_pendapatan_desa($data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		}else{
			echo "No direct script access allowed";
		}

	}

	/*
	 * data geotop selesai
	*/

	public function bantuan()
	{
		$data = [
			'title' => 'Bantuan',
			'breadcrumb' => 'Bantuan'
		];

		$this->template->load('template/master', 'mahasiswa/help', $data, false);
	}
}
