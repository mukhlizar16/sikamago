<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'Profil',
			'label' => cek_label(),
			'breadcrumb' => 'Profil'
		];

		$data['profil'] = $this->Profil_model->get_profil($_SESSION['id'])->row_array();

		$this->template->load('templates/master', 'kkn/profil/profil-page', $data, false);
	}

	public function edit()
	{
		$data = [
			'title' => 'KKN Apps - Profil',
			'label' => cek_label(),
			'breadcrumb' => 'Edit Profil'
		];

		$data['profil'] = $this->Profil_model->get_profil($_SESSION['id'])->row_array();

		$this->template->load('templates/master', 'kkn/profil/edit-profil', $data, false);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
		if ($this->form_validation->run() == false) {
			$ajax = [
				'status' => 'error',
				'pesan' => array(
					'nim' => strip_tags(form_error('nim')),
					'no_hp' => strip_tags(form_error('no_hp')),
				)
			];
		} else {
			$user_id = $_SESSION['id'];
			$data = [
				'nama' => $_POST['nama'],
				'email' => $_POST['email'],
				'nim' => $_POST['nim'],
				'no_hp' => $_POST['no_hp'],
				'tgl' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Profil_model->update_data($user_id, $data);
			if ($simpan) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Data profil berhasil diperbaharui'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Data profil gagal diperbaharui'
				];
			}
		}
		echo json_encode($ajax);
	}

	public function update_alamat()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $_SESSION['id'];
			$cek = $this->Profil_model->cek_alamat($user_id)->row_array();
			if ($cek == null) {
				$data = [
					'user_id' => $user_id,
					'provinsi' => $_POST['prov'],
					'kabupaten' => $_POST['kab'],
					'kecamatan' => $_POST['kec'],
					'desa' => $_POST['desa'],
					'jalan' => $_POST['jalan']
				];
				$simpan = $this->Profil_model->simpan_alamat($data);
				if ($simpan) {
					$ajax = [
						'status' => 'sukses',
						'pesan' => 'Data profil berhasil disimpan'
					];
				} else {
					$ajax = [
						'status' => 'gagal',
						'pesan' => 'Data profil gagal disimpan'
					];
				}
			} else {
				$data_update = [
					'provinsi' => $_POST['prov'],
					'kabupaten' => $_POST['kab'],
					'kecamatan' => $_POST['kec'],
					'desa' => $_POST['desa'],
					'jalan' => $_POST['jalan']
				];
				$update = $this->Profil_model->update_alamat($user_id, $data_update);
				if ($update) {
					$ajax = [
						'status' => 'update',
						'pesan' => 'Data profil berhasil diperbaharui'
					];
				} else {
					$ajax = [
						'status' => 'fail',
						'pesan' => 'Data profil gagal diperbaharui'
					];
				}
			}

			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function update_ortu()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $_SESSION['id'];
			$cek = $this->Profil_model->cek_ortu($user_id)->row_array();
			if ($cek == null) {
				$data = [
					'user_id' => $user_id,
					'nama_ayah' => $_POST['nama_ayah'],
					'nama_ibu' => $_POST['nama_ibu'],
					'hp_ayah' => $_POST['hp_ayah'],
					'hp_ibu' => $_POST['hp_ibu'],
					'provinsi' => $_POST['prov'],
					'kabupaten' => $_POST['kab'],
					'kecamatan' => $_POST['kec'],
					'desa' => $_POST['desa'],
					'jalan' => $_POST['jalan']
				];

				$simpan = $this->Profil_model->simpan_alamat_ortu($data);
				if ($simpan) {
					$ajax = [
						'status' => 'sukses',
						'pesan' => 'Data profil orang tua berhasil disimpan'
					];
				} else {
					$ajax = [
						'status' => 'gagal',
						'pesan' => 'Data profil orang tua gagal disimpan'
					];
				}
			} else {
				$data_update = [
					'nama_ayah' => $_POST['nama_ayah'],
					'nama_ibu' => $_POST['nama_ibu'],
					'hp_ayah' => $_POST['hp_ayah'],
					'hp_ibu' => $_POST['hp_ibu'],
					'provinsi' => $_POST['prov'],
					'kabupaten' => $_POST['kab'],
					'kecamatan' => $_POST['kec'],
					'desa' => $_POST['desa'],
					'jalan' => $_POST['jalan']
				];
				$update = $this->Profil_model->update_alamat_ortu($user_id, $data_update);
				if ($update) {
					$ajax = [
						'status' => 'update',
						'pesan' => 'Data profil orang tua berhasil diperbaharui'
					];
				} else {
					$ajax = [
						'status' => 'fail',
						'pesan' => 'Data profil orang tua gagal diperbaharui'
					];
				}
			}

			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function foto()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/foto/';
			$config['allowed_types'] = 'jpg|JPG|jpeg|png';
			$config['max_size'] = 500;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '-foto';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Profil_model->cek_foto($id_user)->row_array();
				$foto = $cek['foto'];
				$user_id = $_SESSION['id'];
				if (empty($foto)) {
					$data = [
						'foto' => $this->upload->data('file_name'),
					];
					$simpan = $this->Profil_model->simpan_foto($user_id, $data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Foto berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Foto gagal disimpan'
						];
					}
				} else {
					$target = './assets/kkn/userfiles/foto/' . $foto;
					if (is_readable($target)) {
						unlink($target);
					}
					$data = [
						'foto' => $this->upload->data('file_name'),
					];
					$update = $this->Profil_model->update_foto($user_id, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Foto berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Foto gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function get_provinsi()
	{
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/provinsi";
		$data = file_get_contents($sumber, true);
		$arr_response = json_decode($data, true);
		$provinsi = $arr_response['provinsi'];

		echo '<option value="">-Pilih-</option>';
		foreach ($provinsi as $key => $val) {
			echo '<option value="' . $val['id'] . '" data-nama="' . $val['nama'] . '">' . $val['nama'] . '</option>>';
		}
	}

	public function get_kabupaten()
	{
		$prov = $_POST['id'];
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" . $prov;
		$data = file_get_contents($sumber, true);
		$arr_response = json_decode($data, true);
		$kabupaten = $arr_response['kota_kabupaten'];

		echo '<option value="">-Pilih-</option>';
		foreach ($kabupaten as $key => $val) {
			echo '<option value="' . $val['id'] . '" data-nama="' . $val['nama'] . '">' . $val['nama'] . '</option>>';
		}
	}

	public function get_kecamatan()
	{
		$kota = $_POST['id'];
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" . $kota;
		$data = file_get_contents($sumber, true);
		$arr_response = json_decode($data, true);
		$kecamatan = $arr_response['kecamatan'];

		echo '<option value="">-Pilih-</option>';
		foreach ($kecamatan as $key => $val) {
			echo '<option value="' . $val['id'] . '" data-nama="' . $val['nama'] . '">' . $val['nama'] . '</option>>';
		}
	}

	public function get_desa()
	{
		$kec = $_POST['id'];
		$sumber = "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" . $kec;
		$data = file_get_contents($sumber, true);
		$arr_response = json_decode($data, true);
		$desa = $arr_response['kelurahan'];

		echo '<option value="">-Pilih-</option>';
		foreach ($desa as $key => $val) {
			echo '<option value="' . $val['id'] . '" data-nama="' . $val['nama'] . '">' . $val['nama'] . '</option>>';
		}
	}
}
