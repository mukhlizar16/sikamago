<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (! is_login()){
			redirect('magang/login', 'refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Supervisor',
			'breadcrumb' => 'Dashboard',
			'pengumuman' => $this->Mitra_m->get_pengumuman()
		];

		$this->template->load('template/master', 'supervisor/dashboard', $data, false);
	}

	public function profil()
	{
		$data = [
			'title' => 'Supervisor / Profil',
			'breadcrumb' => 'Profil'
		];


		$id = $_SESSION['id-magang'];
		$data['user'] = $this->Mitra_m->get_usertable($id)->row_array();
		$cek = $this->Mitra_m->cek_Table($id)->row_array();

		if (empty($cek)) {
			if (empty($cek['foto'])) {
				$data['spv'] = array(
					'id' => $id,
					'no_hp' => 'Data kosong',
					'nama_lembaga' => 'Data kosong',
					'foto' => config_item('theme_image') . 'user/avatar.png'
				);
			}
			$data['spv'] = array(
				'id' => $id,
				'no_hp' => 'Data kosong',
				'nama_lembaga' => 'Data kosong',
				'foto' => config_item('theme_image') . 'user/avatar.png'
			);
			$spv_id = '';
		} else {
			$data['spv'] = array(
				'id' => $id,
				'no_hp' => $cek['no_hp'],
				'nama_lembaga' => $cek['nama_lembaga'],
				'foto' => config_item('base_url') . 'assets/userfiles/' . $cek['foto']
			);
			$spv_id = $cek['id'];	// id dosen di tabel dosen
		}

		// ambil data bimbingan

		$jenis = 3;	// jenis bimbingan = bimbingan akademik
		$data['bimbingan'] = $this->Mitra_m->get_mhsData($spv_id, $jenis);

		$this->template->load('template/master', 'supervisor/profil', $data, false);
	}

	public function update_profil_C1()
	{
		$id = $this->input->post('id');
		$data = [
			'napan' => $this->input->post('napan'),
			'nabel' => $this->input->post('nabel'),
			'email' => $this->input->post('email'),
		];
		$update = $this->Mitra_m->update_dosen_userTable($id, $data);
		if ($update) {
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

	public function update_password()
	{
		if ($this->input->is_ajax_request()){
			$id_user = $_SESSION['id-magang'];
			$this->form_validation->set_rules('new_pass', 'Password Baru', 'required|min_length[6]', [
				'required' => '%s wajib diisi',
				'min_length' => '%s minimal 6 karakter'
			]);
			$this->form_validation->set_rules('new_confirm_pass', 'Konfirmasi Password Baru', 'matches[new_pass]', [
				'matches' => '%s tidak sama'
			]);

			if ($this->form_validation->run() == false){
				$arr_data = [
					'status' => 'error',
					'pesan' => strip_tags(validation_errors())
				];
			}else{
				$data = [
					'password' => password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT)
				];

				$ubah = $this->Mitra_m->ganti_pass($data, $id_user);
				if ($ubah){
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Password berhasil diperbaharui ...'
					];
				}else{
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Password gagal diperbaharui ...'
					];
				}
			}
			echo json_encode($arr_data);
		}else{
			echo "No direct script access allowed";
		}
	}

	public function update_profil_C2()
	{
		$id = $this->input->post('id');
		$cek = $this->Mitra_m->cek_Table($id)->row_array();
		$data = array(
			'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
			'nama_lembaga' => htmlspecialchars($this->input->post('nama_lembaga'), true),
			'created_at' => date('Y-m-d H:i:s')
		);
		if (empty($cek)) {
			$simpan = $this->Mitra_m->insert_data($id, $data);
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
			$update = $this->Mitra_m->update_data($id, $data);
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
				'status' => 'error',
				'pesan' => strip_tags($this->upload->display_errors()),
			];
		} else {
			// cek foto di tabel dosen
			$id = $_SESSION['id-magang'];
			$cek_foto = $this->Mitra_m->get_ID($id)->row_array();
			if($cek_foto == null){
				$data = [
					'user_id' => $id,
					'foto' => $this->upload->data('file_name'),
					'created_at' => date('Y-m-d H:i:s')
				];

				$simpan = $this->Mitra_m->photo_changed($data);
				if ($simpan) {
					$arr_data = [
						'status' => 'sukses-simpan',
						'pesan' => 'Foto berhasil diperbaharui ...',
					];
				} else {
					$arr_data = [
						'status' => 'gagal-simpan',
						'pesan' => 'Foto gagal diperbaharui ...',
					];
				}
			}else{
				// jika sudah ada sebelumnya (proses update)
				if($cek_foto['foto'] == null){
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				}else{
					$target = './assets/magang/userfiles/' . $cek_foto['foto'];
					unlink($target);
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				}
				$update = $this->Mitra_m->update_foto($data, $id);
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

	// start: pesan
	function get_penerimaMhs()
	{
		if (isset($_GET['term'])) {
			$result = $this->Mitra_m->search_penerima($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) {
					$aRow = array();
					$aRow['label'] = $row->napan . ' ' . $row->nabel;
					$aRow['value'] = $row->napan . ' ' . $row->nabel;
					$aRow['id'] = $row->id_mhs;
					$data[] = $aRow;
				}
				echo json_encode($data);
			}
		}
	}

	public function pesan()
	{
		$data = [
			'title' => 'Supervisor / Pesan',
			'breadcrumb' => 'List Pesan'
		];

		//id penerima
		$id = $_SESSION['id-magang'];

		$data['pesanku'] = $this->Mitra_m->get_send_Pesan($id);
		$data['list_pesan'] = $this->Mitra_m->get_allPesan($id);
		/*var_dump($data['list_pesan']->result_array());die();*/

		$this->template->load('template/master', 'supervisor/list-pesan', $data, false);
	}

	public function kirim()
	{
		//ambil id user penerima
		$id_penerima = $this->input->post('id_penerima');

		$data = [
			'penerima_id' => $id_penerima,
			'pengirim_id' => $_SESSION['id-magang'],
			'isi_pesan' => $this->input->post('pesan'),
			'created_at' => date('Y-m-d H:i:s')
		];
		$simpan = $this->Mitra_m->simpan_pesan($data);
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

	public function detail_pesan($id)
	{
		$data = [
			'title' => 'Dosen / Detil Pesan',
			'breadcrumb' => 'Detil Pesan'
		];

		//ambil id dosen
		$id_penerima = $_SESSION['id-magang'];

		$id_pengirim = $this->uri->segment(3);
		$data['pesan'] = $this->Mitra_m->detail_pesan($id_pengirim, $id_penerima);

		$data['penerima'] = $id_pengirim;

		$this->template->load('template/master', 'supervisor/detil-pesan', $data, false);
	}

	public function balas_pesan()
	{
		//ambil id dosen
		$id = $_SESSION['id-magang'];

		$data = [
			'penerima_id' => $this->input->post('penerima'),
			'isi_pesan' => $this->input->post('pesan'),
			'pengirim_id' => $id,
			'status_baca' => 0,
			'created_at' => date('Y-m-d H:i:s')
		];
		$simpan = $this->Mitra_m->simpan_pesan($data);
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

	public function sudah_baca()
	{
		if($this->input->is_ajax_request()){
			$id_pesan = $this->input->post('id');
			$data = [
				'status_baca' => 1,
				'created_at' => date('Y-m-d H:i:s')
			];
			$update = $this->Mitra_m->update_pesan($data, $id_pesan);
			if($update){
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Pesan telah dibaca ...'
				];
			}else{
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Pesan gagal ditandai telah dibaca ...'
				];
			}
			echo json_encode($arr_data);
		}else{
			echo "No direct script access allowed";
		}
	}
	// end: pesan

	public function bimbingan()
	{
		$data = [
			'title' => 'Supervisor / Bimbingan',
			'breadcrumb' => 'Tambah Mahasiswa Bimbingan'
		];

		// ambil data mahasiswa
		$data['mhs'] = $this->Mitra_m->get_allMhs();

		// ambil data bimbingan dengan id dosen
		// ambil id dosen terlebih dahulu
		$id = $_SESSION['id-magang'];
		$cek_id = $this->Mitra_m->get_ID($id)->row_array();
		if(empty($cek_id)){
			$ids = 0;
		}else{
			$ids = $cek_id['id'];
		}
		$data['bim'] = $this->Mitra_m->get_allbimbingan($ids);
		$this->template->load('template/master', 'supervisor/tambah-mhs', $data, false);
	}

	public function tambah_bimbingan()
	{
		if($this->input->is_ajax_request()){
			// ambil id dosen terlebih dahulu
			$id = $_SESSION['id-magang'];
			$cek_id = $this->Mitra_m->get_ID($id)->row_array();
			$ids = $cek_id['id'];
			if($ids == null){
				$arr_data = [
					'status' => 'data-kosong',
					'pesan' => 'Mohon perbaharui data profil Anda terlebih dahulu ...',
					'alamat' => config_item('base_url').'supervisor/profil'
				];
			}else{
				$data = [
					'mhs_id' => $this->input->post('nama'),
					'dosen_id' => $ids,
					'jenis_bimbingan_id' => 3,
				];

				$simpan = $this->Mitra_m->save_bim_data($data);

				if($simpan){
					$arr_data = [
						'status' => 'sukses'
					];
				}else{
					$arr_data = [
						'status' => 'gagal'
					];
				}
			}
			echo json_encode($arr_data);
		}else{
			echo "No direct script access allowed";
		}
	}

	// start: show log mahasiswa
	public function approve(){
		$data = [
			'title' => 'Supervisor / Approve',
			'breadcrumb' => 'Approve List'
		];

		// ambil id dosen dari tabel dosen
		$ids = $_SESSION['id-magang'];
		$cek_id = $this->Mitra_m->get_ID($ids)->row_array();
		$id = $cek_id['id'];

		// ambil data mhs bimbingan
		$jenis = 3;
		$data['bim'] = $this->Mitra_m->get_bimbinganData($id, $jenis);
		$this->template->load('template/master', 'supervisor/log-mhs', $data, false);

	}

	public function detail_log_mahasiswa($id){
		$data = [
			'title' => 'Supervisor / Detail Log',
			'breadcrumb' => 'Detail Log Mahasiswa'
		];
		$id = $this->uri->segment(4);
		// cek isian di tabel log berdasarkan id
		$data['uraian'] = $this->Mitra_m->show_logData($id);
		$data['nama'] = $this->Mitra_m->show_detail_mhs_magang($id)->row_array();

		$this->template->load('template/master', 'supervisor/detail-log', $data, false);
	}

	public function setujui()
	{
		$log_id = $this->input->post('id');
		$data = [
			'status_spv' => 1,
			'tgl_setuju_spv' => date('Y-m-d H:i:s')
		];
		$update = $this->Mitra_m->update_logTable($log_id, $data);
		if($update){
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Log harian mahasiswa berhasil disetujui ...'
			];
		}else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Log harian mahasiswa gagal disetujui ...'
			];
		}
		echo json_encode($arr_data);
	}
	// end: log mahasiswa

	public function laporan()
	{
		$id = $_SESSION['id-magang'];
		$data = [
			'title' => 'Supervisor - Laporan',
			'breadcrumb' => 'Laporan',
			'laporan' => $this->Mitra_m->get_laporan($id)->row_array()
		];

		$this->template->load('template/master', 'supervisor/laporan-page', $data, false);
	}

	public function kegiatan()
	{
		$id = $_SESSION['id-magang'];
		$data = [
			'title' => 'Supervisor - Kegiatan',
			'breadcrumb' => 'Kegiatan',
			'kegiatan' => $this->Mitra_m->get_kegiatan($id)
		];

		$this->template->load('template/master', 'supervisor/kegiatan-page', $data, false);
	}

	private function _upload()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['upload_path'] = './assets/magang/userfiles/';
		$config['max_size'] = 5000;

		$this->load->library('upload', $config);
	}
}
