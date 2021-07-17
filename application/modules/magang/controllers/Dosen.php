<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dosen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Dosen',
			'breadcrumb' => 'Dashboard'
		];

		$data['pengumuman'] = $this->Dosen_m->get_pengumuman();

		$this->template->load('template/master', 'dosen/dashboard', $data, false);
	}

	// START: PA Chapter
	public function profil_pa()
	{
		$data = [
			'title' => 'Dosen / Profil',
			'breadcrumb' => 'Profil'
		];


		$id = $_SESSION['id-magang'];
		$data['user'] = $this->Dosen_m->get_usertable($id)->row_array();
		$cek = $this->Dosen_m->cek_dosenTable($id)->row_array();
		/*var_dump($cek);die();*/

		if (empty($cek)) {
			$data['dosen'] = array(
				'id' => $id,    // user_id
				'no_hp' => 'Data kosong',
				'foto' => config_item('base_url') . 'assets/magang/theme/images/user/avatar.png'
			);
			$dosen_id = 0;
		} else {
			if ($cek['foto'] == null) {
				$data['dosen'] = array(
					'id' => $id,    // user_id
					'no_hp' => $cek['no_hp'],
					'foto' => config_item('base_url') . 'assets/magang/theme/images/user/avatar.png'
				);
				$dosen_id = $cek['id'];
			} else {
				$data['dosen'] = array(
					'id' => $id,    // user_id
					'no_hp' => $cek['no_hp'],
					'foto' => config_item('base_url') . 'assets/magang/userfiles/' . $cek['foto']
				);
				$dosen_id = $cek['id'];
			}
		}

		// ambil data bimbingan

		$jenis = 1;    // jenis bimbingan = bimbingan akademik
		$artikel = 2;
		$data['bimbingan'] = $this->Dosen_m->get_mhsData($dosen_id, $jenis);
		$data['artikel'] = $this->Dosen_m->get_mhsData($dosen_id, $artikel);

		$this->template->load('template/master', 'dosen/profil', $data, false);
	}

	// profil dosen pembimbing artikel
	public function profil_par()
	{
		$data = [
			'title' => 'Dosen / Profil',
			'breadcrumb' => 'Profil'
		];


		$id = $_SESSION['id-magang'];
		$data['user'] = $this->Dosen_m->get_usertable($id)->row_array();
		$cek = $this->Dosen_m->cek_dosenTable($id)->row_array();

		if (empty($cek)) {
			if (empty($cek['foto'])) {
				$data['dosen'] = array(
					'id' => $id,
					'no_hp' => 'Data kosong',
					'foto' => config_item('theme_image') . 'user/avatar.png'
				);
			}
			$dosen_id = 0;
		} else {
			$data['dosen'] = array(
				'id' => $id,
				'no_hp' => $cek['no_hp'],
				'foto' => config_item('base_url') . 'assets/userfiles/' . $cek['foto']
			);
			$dosen_id = $cek['id'];    // id dosen di tabel dosen
		}

		// ambil data bimbingan

		$jenis = 1;    // jenis bimbingan = bimbingan akademik
		$artikel = 2;
		$data['bimbingan'] = $this->Dosen_m->get_mhsData($dosen_id, $jenis);
		$data['artikel'] = $this->Dosen_m->get_mhsData($dosen_id, $artikel);

		$this->template->load('template/master', 'dosen/profil', $data, false);
	}

	public function update_profil_pa_C1()
	{
		$id = $this->input->post('id');
		$data = [
			'napan' => $this->input->post('napan'),
			'nabel' => $this->input->post('nabel'),
			'email' => $this->input->post('email'),
		];
		$update = $this->Dosen_m->update_dosen_userTable($id, $data);
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

	public function update_profil_pa_C2()
	{
		$id = $this->input->post('id');
		$cek = $this->Dosen_m->cek_dosenTable($id)->row_array();
		$data = array(
			'no_hp' => htmlspecialchars($this->input->post('no_hp'), true),
			'created_at' => date('Y-m-d H:i:s')
		);
		if (empty($cek)) {
			$simpan = $this->Dosen_m->insert_data($id, $data);
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
			$update = $this->Dosen_m->update_data($id, $data);
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

	public function ubah_password()
	{
		if ($this->input->is_ajax_request()) {
			$id_user = $_SESSION['id-magang'];
			$this->form_validation->set_rules('new_pass', 'Password Baru', 'required|min_length[6]', [
				'required' => '%s wajib diisi',
				'min_length' => '%s minimal 6 karakter'
			]);
			$this->form_validation->set_rules('new_confirm_pass', 'Konfirmasi Password Baru', 'matches[new_pass]', [
				'matches' => '%s tidak sama'
			]);

			if ($this->form_validation->run() == false) {
				$arr_data = [
					'status' => 'error',
					'pesan' => strip_tags(validation_errors())
				];
			} else {
				$data = [
					'password' => password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT)
				];

				$ubah = $this->Dosen_m->ganti_pass($data, $id_user);
				if ($ubah) {
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Password berhasil diperbaharui ...'
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Password gagal diperbaharui ...'
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update_foto_pa()
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
			$cek_foto = $this->Dosen_m->get_ID($id)->row_array();
			if ($cek_foto == null) {
				$data = [
					'user_id' => $id,
					'foto' => $this->upload->data('file_name'),
					'created_at' => date('Y-m-d H:i:s')
				];

				$simpan = $this->Dosen_m->photo_changed($data);
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
			} else {
				// jika sudah ada sebelumnya (proses update)
				if ($cek_foto['foto'] == null) {
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				} else {
					$target = './assets/magang/userfiles/' . $cek_foto['foto'];
					unlink($target);
					$data = array(
						'foto' => $this->upload->data('file_name')
					);
				}
				$update = $this->Dosen_m->update_foto($data, $id);
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
		$config['upload_path'] = './assets/magang/userfiles/';
		$config['max_size'] = 5000;

		$this->load->library('upload', $config);
	}
	// END: PA Chapter

	// tambah kegiatan
	public function kegiatan()
	{
		$data = [
			'title' => 'Dosen / Kegiatan',
			'breadcrumb' => 'Kegiatan'
		];

		// ambil id dosen
		$idu = $_SESSION['id-magang'];
		$cek_id = $this->Dosen_m->get_ID($idu)->row_array();
		$id_dosen = $cek_id['id'];
		$data['kegiatan'] = $this->Dosen_m->show_kegiatan($id_dosen);

		$this->template->load('template/master', 'dosen/kegiatan', $data, false);
	}

	public function tambah_kegiatan()
	{
		// ambil id dosen
		$idu = $_SESSION['id-magang'];
		$cek_id = $this->Dosen_m->get_ID($idu)->row_array();
		$id_dosen = $cek_id['id'];

		if (empty($_POST['uraian'])) {
			$arr_data = [
				'status' => 'kosong',
				'pesan' => 'Uraian kegiatan tidak boleh kosong ...'
			];

		} elseif ($id_dosen == null) {
			$arr_data = [
				'status' => 'isi-profil',
				'pesan' => 'lengkapi data profil Anda terlebih dahulu ...'
			];
		} else {
			$data = [
				'dosen_id' => $id_dosen,
				'uraian' => $this->input->post('uraian'),
				'created_at' => date('Y-m-d H:i:s')
			];

			$simpan = $this->Dosen_m->add_kegiatan($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data kegiatan berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data kegiatan gagal disimpan ...'
				];
			}
		}
		echo json_encode($arr_data);
	}

	public function hapus_kegiatan()
	{
		if ($this->input->is_ajax_request()) {
			$id_keg = $this->input->post('id');
			$hapus = $this->Dosen_m->hapus_data_kegiatan($id_keg);
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

	// chapter tambah mahasiswa bimbingan
	public function bimbingan()
	{
		$data = [
			'title' => 'Dosen / Bimbingan',
			'breadcrumb' => 'Tambah Mahasiswa Bimbingan'
		];

		// ambil data mahasiswa
		$data['mhs'] = $this->Dosen_m->get_allMhs();

		// ambil data bimbingan dengan id dosen
		// ambil id dosen terlebih dahulu
		$id = $_SESSION['id-magang'];
		$cek_id = $this->Dosen_m->get_ID($id)->row_array();
		if (empty($cek_id)) {
			$idd = 0;
		} else {
			$idd = $cek_id['id'];
		}
		$data['bim'] = $this->Dosen_m->get_allbimbingan($idd);
		$this->template->load('template/master', 'dosen/tambah-mhs', $data, false);
	}

	public function tambah_bimbingan()
	{
		if ($this->input->is_ajax_request()) {
			// ambil id dosen terlebih dahulu
			$id = $_SESSION['id-magang'];
			$cek_id = $this->Dosen_m->get_ID($id);
			$data_dosen = $cek_id->row_array();

			if ($cek_id->num_rows() > 0) {
				$data = [
					'mhs_id' => $this->input->post('nama'),
					'dosen_id' => $data_dosen['id'],
					'jenis_bimbingan_id' => $this->input->post('jenis'),
				];

				$simpan = $this->Dosen_m->save_bim_data($data);

				if ($simpan) {
					$arr_data = [
						'status' => 'sukses'
					];
				} else {
					$arr_data = [
						'status' => 'gagal'
					];
				}
			} else {
				$arr_data = [
					'status' => 'data-kosong',
					'pesan' => 'Mohon perbaharui data profil Anda terlebih dahulu ...',
					'alamat' => config_item('base_url') . 'dosen/pa/profil',
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_bimbingan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$hapus = $this->Dosen_m->hapus_dataBimbingan($id);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data bimbingan berhasil dihapus ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data bimbingan gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function approve()
	{
		$data = [
			'title' => 'Dosen / Approve',
			'breadcrumb' => 'Approve List'
		];

		// ambil id dosen dari tabel dosen
		$idu_dosen = $_SESSION['id-magang'];
		$cek_id = $this->Dosen_m->get_ID($idu_dosen)->row_array();
		$id = $cek_id['id'];

		if (empty($cek_id)){
			redirect('magang/dosen/pa/profil/');
		}else{
			// ambil data mhs bimbingan
			$jenis = 1;
			$data['bim'] = $this->Dosen_m->get_bimbinganData($id, $jenis);
			$this->template->load('template/master', 'dosen/log-mhs', $data, false);
		}
	}

	public function detail_log_mahasiswa($id)
	{
		$data = [
			'title' => 'Dosen - Detail Log',
			'breadcrumb' => 'Detail Log Mahasiswa'
		];
		$id = $this->uri->segment(4);
		// cek isian di tabel log berdasarkan id
		$data['uraian'] = $this->Dosen_m->show_logData($id);
		$data['nama'] = $this->Dosen_m->show_detail_mhs_magang($id)->row_array();

		$this->template->load('template/master', 'dosen/detail-log', $data, false);
	}

	public function setujui()
	{
		$log_id = $this->input->post('id');
		$data = [
			'status' => 1,
			'tgl_setuju' => date('Y-m-d H:i:s')
		];
		$update = $this->Dosen_m->update_logTable($log_id, $data);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Log harian mahasiswa berhasil disetujui ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Log harian mahasiswa gagal disetujui ...'
			];
		}
		echo json_encode($arr_data);
	}

	function get_penerimaMhs()
	{
		if (isset($_GET['term'])) {
			$result = $this->Dosen_m->search_penerima($_GET['term']);
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
			'title' => 'Dosen / Pesan',
			'breadcrumb' => 'List Pesan'
		];

		//id penerima
		$id = $_SESSION['id-magang'];

		$data['pesanku'] = $this->Dosen_m->get_send_Pesan($id);
		$data['list_pesan'] = $this->Dosen_m->get_allPesan($id);
		/*var_dump($data['list_pesan']->result_array());die();*/

		$this->template->load('template/master', 'dosen/list-pesan', $data, false);
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
		$simpan = $this->Dosen_m->simpan_pesan($data);
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

	public function detail_pesan()
	{
		$data = [
			'title' => 'Dosen / Detil Pesan',
			'breadcrumb' => 'Detil Pesan'
		];

		//ambil id dosen
		$idd = $_SESSION['id-magang'];
		$cek_id = $this->Dosen_m->get_ID($idd)->row_array();
		$id_penerima = $cek_id['id'];

		$id_pengirim = $this->uri->segment(3);
		$data['pesan'] = $this->Dosen_m->detail_pesan($id_pengirim, $id_penerima);

		$data['penerima'] = $id_pengirim;

		$this->template->load('template/master', 'dosen/detil-pesan', $data, false);
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
		$simpan = $this->Dosen_m->simpan_pesan($data);
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
		$id_pesan = $this->input->post('id');
		$data = [
			'status_baca' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Dosen_m->update_pesan($data, $id_pesan);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Pesan telah dibaca ...'
			];
		} else {
			$arr_data = [
				'status' => 'error',
				'pesan' => 'Pesan gagal ditandai telah dibaca ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function laporan()
	{
		$data = [
			'title' => 'Dosen / Laporan',
			'breadcrumb' => 'Laporan'
		];


		$id = id_dosen();
		$cek_data = $this->Dosen_m->get_laporan($id)->row_array();
		if ($cek_data == null) {
			$data['laporan'] = [
				'id' => '',
				'judul' => 'Belum ada',
				'nama_file' => 'Belum ada',
				'tgl' => 'Belum ada',
				'status' => 'kosong'
			];
		} else {
			$data['laporan'] = [
				'id' => $cek_data['id'],
				'judul' => $cek_data['judul'],
				'nama_file' => $cek_data['nama_file'],
				'tgl' => date('d-m-Y', strtotime($cek_data['created_at'])),
				'status' => 'ada'
			];
		}

		$this->template->load('template/master', 'dosen/laporan-page', $data, false);
	}

	public function tambah_lap()
	{
		if ($this->input->is_ajax_request()) {
			$this->_upload_lap();
			if (!$this->upload->do_upload('berkas_lap')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => strip_tags($this->upload->display_errors())
				];
			} else {
				$data = [
					'judul' => $this->input->post('judul'),
					'nama_file' => $this->upload->data('file_name'),
					'dosen_id' => id_dosen(),
					'created_at' => date('Y-m-d H:i:s')
				];

				$simpan = $this->Dosen_m->save_laporan($data);
				if ($simpan) {
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Data berhasil disimpan'
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Data gagal disimpan'
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	private function _upload_lap()
	{
		$napan = $_SESSION['napan'];
		$nabel = $_SESSION['nabel'];
		$n = preg_replace("/[^a-zA-Z]/", "", $napan);
		$b = preg_replace("/[^a-zA-Z]/", "", $nabel);
		$config['file_name'] = $n . '-' . $b . '-laporan';
		$config['allowed_types'] = 'pdf|PDF';
		$config['upload_path'] = './assets/magang/userfiles/laporan/dosen/';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
	}

}
