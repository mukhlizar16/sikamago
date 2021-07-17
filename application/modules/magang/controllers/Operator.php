<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (must_login()) {
			redirect('login', 'refresh');
		}
		if(! is_operator()){
			check_user_login();
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Operator',
			'breadcrumb' => 'Dashboard'
		];

		$data['user_login'] = $this->Admin_m->show_user_aktif();
		$this->template->load('template/master', 'admin/dashboard', $data, false);

	}

	public function profil()
	{
		$data = [
			'title' => 'Operator',
			'breadcrumb' => 'Profil'
		];
		$id = $_SESSION['id'];
		$data['operator'] = $this->Operator_m->showdata($id)->row_array();

		// ambil data foto
		$cek_foto = $this->Operator_m->get_operatorData($id)->row_array();
		if($cek_foto == null){
			$data['foto'] = config_item('theme_image') . 'user/avatar-2.jpg';
		}else{
			$data['foto'] = base_url() . 'assets/userfiles/' . $cek_foto['foto'];
		}
		$this->template->load('template/master', 'operator/profil', $data, false);
	}

	public function update_profil()
	{
		$id = $this->input->post('id');
		$data = [
			'napan' => $this->input->post('napan'),
			'nabel' => $this->input->post('nabel'),
			'email' => $this->input->post('email'),
		];

		$simpan = $this->Operator_m->update_profile($id, $data);

		if ($simpan){
			$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil diperbaharui'
			];
		}else{
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Data gagal diperbaharui'
			];
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
			//cek status foto tabel operator
			$id = $_SESSION['id'];
			$cek_foto = $this->Operator_m->get_dataOperator($id)->row_array();

			//jika tidak ada
			if ($cek_foto == null) {
				$data = [
					'user_id' => $id,
					'foto' => $this->upload->data('file_name'),
					'created_at' => date('Y-m-d H:i:s')
				];
				$simpan_foto = $this->Operator_m->simpan_foto($data);
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
				$update = $this->Operator_m->update_foto($data, $id);
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

	//bidang penugasan
	public function penugasan()
	{
		$data = [
			'title' => 'Operator - Penugasan',
			'breadcrumb' => 'Penugasan'
		];
		$mhs_level = 5;
		$id_mentor = 2;
		$id_mentor2 = 3;
		$id_dpl = 4;
		$data['pa'] = $this->Operator_m->getData_DosenJoin($id_mentor);
		$data['par'] = $this->Operator_m->getData_DosenJoin($id_mentor2);
		$data['dpl'] = $this->Operator_m->getData_DosenJoin($id_dpl);

		$data['mhs'] = $this->Operator_m->getData_MhsJoin($mhs_level);

		$this->template->load('template/master', 'operator/penugasan', $data, false);
	}

	public function tambah_penugasan()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'dosen_id' => $this->input->post('dosen'),
				'mhs_id' => $this->input->post('mhs'),
				'jenis_bimbingan_id' => $this->input->post('jenis'),
				'created_at' => date('Y-m-d H:i:s')
			];
			$tambah = $this->Operator_m->save_bimbingan($data);
			if ($tambah) {
				$arr_data = [
					'status' => 'sukses',
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function get_bimtable()
	{
		$i = 1;
		$fetch_data = $this->Operator_m->make_datatable($i);
		$no = $_POST['start'];
		$data = array();
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->nm_dosen .' '. $row->nm_dosen2;
			$sub_array[] = $row->nm_mhs .' '. $row->nm_mhs2;
			$sub_array[] = '<button class="btn btn-danger btn-sm" id="btn-hapus" data-id="'.$row->id.'">hapus</button>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw" => $_POST["draw"],
			"recordsTotal" => $this->Operator_m->get_all_data(),
			"recordsFiltered" => $this->Operator_m->filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function get_bimtable2()
	{
		$i = 2;
		$data = $this->Operator_m->fecth_Bimtable($i)->result();
		echo json_encode($data);
	}

	public function get_bimtable3()
	{
		$i = 3;
		$data = $this->Operator_m->fecth_Bimtable($i)->result();
		echo json_encode($data);
	}

	// chapter user mahasiswa
	public function show_mahasiswa()
	{
		$data = [
			'title' => 'Operator / List Mahasiswa',
			'breadcrumb' => 'Mahasiswa'
		];

		// data mahasiswa yang tidak aktif
		$is_approve = 0;
		$approve = 1;
		$level = 5;
		$data['tidak_aktif'] = $this->Operator_m->get_list_mahasiswa($level, $is_approve);
		$data['aktif'] = $this->Operator_m->get_list_mahasiswa($level, $approve);
		//data mahasiswa aktif

		$this->template->load('template/master', 'operator/list-mahasiswa', $data, false);
	}

	public function aktivasi()
	{
		$id = $this->input->post('id');
		$data = [
			'is_approve' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Operator_m->update_data($id, $data);
		if($update){
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Mahasiswa berhasil diaktivasi ...'
			];
		}else{
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Mahasiswa gagal diaktivasi ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function aktivasi_dosen()
	{
		$id = $this->input->post('id');
		$data = [
			'is_approve' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Operator_m->update_data($id, $data);
		if($update){
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Dosen berhasil diaktivasi ...'
			];
		}else{
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Dosen gagal diaktivasi ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function aktivasi_spv()
	{
		$id = $this->input->post('id');
		$data = [
			'is_approve' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Operator_m->update_data($id, $data);
		if($update){
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Supervisor berhasil diaktivasi ...'
			];
		}else{
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Supervisor gagal diaktivasi ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function dosen_par()
	{
		$data = [
			'title' => 'Operator / Dosen PAR',
			'breadcrumb' => 'Dosen Pembimbing Artikel Ilmiah'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 3;

		$data['aktif'] = $this->Operator_m->get_list_par($level, $approve);
		$data['tidak_aktif'] = $this->Operator_m->get_list_par($level, $is_approve);

		$this->template->load('template/master', 'operator/list-par', $data, false);
	}

	public function dosen_dpl()
	{
		$data = [
			'title' => 'Operator / DPL',
			'breadcrumb' => 'Dosen Pendamping Lapangan'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 2;
		$data['aktif'] = $this->Operator_m->get_list_dpl($level, $approve);
		$data['tidak_aktif'] = $this->Operator_m->get_list_dpl($level, $is_approve);

		$this->template->load('template/master', 'operator/list-dpl', $data, false);
	}

	public function supervisor()
	{
		$data = [
			'title' => 'Operator / Supervisor',
			'breadcrumb' => 'Supervisor Mitra'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 4;
		$data['aktif'] = $this->Operator_m->get_list_spv($level, $approve);
		$data['tidak_aktif'] = $this->Operator_m->get_list_spv($level, $is_approve);

		$this->template->load('template/master', 'operator/list-spv', $data, false);
	}

	public function pengumuman()
	{
		$data = [
			'title' => 'Operator / Pengumuman',
			'breadcrumb' => 'Pengumuman'
		];

		$data['pengumuman'] = $this->Operator_m->get_pengumuman();
		$this->template->load('template/master', 'admin/pengumuman', $data, false);
	}

	public function add_pengumuman()
	{
		$post = $_POST['judul'];
		$data = [
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'created_by' => $_SESSION['id'],
			'created_at' => date('Y-m-d H:i:s')
		];

		$simpan = $this->Operator_m->add_pengumumanData($data);
		if ($simpan) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Data pengumuman, berhasil disimpan ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Data pengumuman, gagal disimpan ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function magang_mahasiswa()
	{
		$data = [
			'title' => 'Operator / Data Magang',
			'breadcrumb' => 'Pilihan Magang'
		];

		$data['magang'] = $this->Operator_m->show_magangMhs();

		$this->template->load('template/master', 'admin/data-magang', $data, false);
	}
}
