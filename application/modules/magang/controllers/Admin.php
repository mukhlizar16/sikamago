<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login();
		if (! is_admin()){
			redirect('magang/switch_page', 'refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Admin',
			'breadcrumb' => 'Dashboard'
		];

		$data['user_login'] = $this->Admin_m->show_user_aktif();

		$this->template->load('template/master', 'admin/dashboard', $data, false);
	}

	public function profil()
	{
		$data = [
			'title' => 'Admin',
			'breadcrumb' => 'Profil'
		];
		$id = $_SESSION['id'];
		$data['admin'] = $this->Admin_m->showdata($id)->row_array();
		$this->template->load('template/master', 'admin/profil', $data, false);
	}


	//Function for showing, editing and delete main menu
	public function main_menu()
	{
		$data = [
			'title' => 'Menu Utama',
			'breadcrumb' => 'Menu'
		];
		$data['mainmenu'] = $this->Menu_m->showData();
		$data['submenu'] = $this->Menu_m->showDatasubmenu();
		$data['level'] = $this->Menu_m->show_level();
		$this->template->load('template/master', 'admin/menu', $data, false);
	}

	// Function menampilkan all data menu
	public function allmenu()
	{
		$data = $this->Menu_m->show_Allmenu()->result();
		echo json_encode($data);
	}

	//function untuk mengisi tabel menu
	public function save_menu()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('mainmenu', 'Main Menu', 'trim|required', [
				'required' => '%s wajib dipilih'
			]);
			$this->form_validation->set_rules('submenu', 'Submenu', 'trim|required', [
				'required' => '%s wajib dipilih'
			]);
			if ($this->form_validation->run() == false) {
				$arr_data = [
					'status' => 'error',
					'pesan' => strip_tags(validation_errors())
				];
			} else {
				$data = array(
					'mainmenu_id' => $this->input->post('mainmenu'),
					'submenu_id' => $this->input->post('submenu'),
					'level_id' => $this->input->post('level'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$simpan = $this->Menu_m->save_allmenu($data);
				if ($simpan) {
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Data berhasil disimpan ...',
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Data gagal disimpan ...',
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function show_mainmenu()
	{
		$arr_data = $this->Menu_m->showData()->result();
		echo json_encode($arr_data);
	}

	public function simpan_mainmenu()
	{
		$this->form_validation->set_rules('nama_mainmenu', 'Nama Menu', 'trim|required', [
			'required' => '%s wajib diisi'
		]);
		$this->form_validation->set_rules('icon_mainmenu', 'Icon Menu', 'trim|required', [
			'required' => '%s wajib diisi'
		]);

		if ($this->form_validation->run() == false) {
			$arr_data = [
				'status' => 'error',
				'pesan' => strip_tags(validation_errors()),
				'alamat' => ''
			];
		} else {
			$data = [
				'nama_mainmenu' => htmlspecialchars($this->input->post('nama_mainmenu'), true),
				'icon' => htmlspecialchars($this->input->post('icon_mainmenu'), true),
				'created_at' => date('Y-m-d H:i:s')
			];
			$simpan = $this->Menu_m->save($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan',
					'alamat' => ''
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan',
					'alamat' => ''
				];
			}
		}
		echo json_encode($arr_data);
	}

	public function edit_mainmenu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('edit_id');
			$ambil_id = $this->Menu_m->getbyId($id)->row_array();
			if ($ambil_id) {
				$arr_data = [
					'status' => 'sukses',
					'post' => $ambil_id
				];
			} else {
				$arr_data = [
					'status' => 'gagal'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update_mainmenu()
	{
		if ($this->input->is_ajax_request()) {
			$source = array(
				'nama_mainmenu' => $this->input->post('nama_mainmenu_edit'),
				'icon' => $this->input->post('icon_mainmenu_edit'),
				'created_at' => date('Y-m-d H:i:s')
			);
			$id = $this->input->post('id');
			$ubah = $this->Menu_m->updateMainMenu($id, $source);
			if ($ubah) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil diperbaharui',
					'alamat' => ''
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal diperbaharui',
					'alamat' => ''
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function delete_mainmenu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('eID');
			$hapus = $this->Menu_m->delete_mainMenu($id);
			if ($hapus) {
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
	//end function for main menu

	//start function for submenu table
	public function show_dataSubmenu()
	{
		$data = $this->Menu_m->showDatasubmenu()->result();
		echo json_encode($data);
	}

	public function simpan_submenu()
	{
		$this->form_validation->set_rules('nama_submenu', 'Nama Menu', 'trim|required', [
			'required' => '%s wajib diisi'
		]);
		$this->form_validation->set_rules('url_submenu', 'Alamat url', 'trim|required', [
			'required' => '%s wajib diisi'
		]);
		if ($this->form_validation->run() == false) {
			$arr_data = [
				'status' => 'error',
				'pesan' => strip_tags(validation_errors()),
				'alamat' => ''
			];
		} else {
			$data = [
				'nama_submenu' => htmlspecialchars($this->input->post('nama_submenu'), true),
				'url' => htmlspecialchars($this->input->post('url_submenu'), true),
				'created_at' => date('Y-m-d H:i:s')
			];
			$simpan = $this->Menu_m->save_submenu($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data berhasil disimpan',
					'alamat' => ''
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data gagal disimpan',
					'alamat' => ''
				];
			}
		}
		echo json_encode($arr_data);
	}

	public function edit_submenu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('edit_id');
			$ambil = $this->Menu_m->cek_dataSubmenu($id)->row_array();
			if ($ambil) {
				$arr_data = [
					'status' => 'sukses',
					'post' => $ambil
				];
			} else {
				$arr_data = [
					'status' => 'gagal'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update_datasubmenu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id_smEdit');
			$data = [
				'nama_submenu' => $this->input->post('nama_submenu_edit'),
				'url' => $this->input->post('url_submenu_edit'),
				'created_at' => date('Y-m-d H:i:s')
			];
			$simpan = $this->Menu_m->update_submenu($id, $data);
			if ($simpan) {
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

	public function delete_submenu()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('eID');
			$hapus = $this->Menu_m->delete_subMenu($id);
			if ($hapus) {
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

	//bidang penugasan
	public function penugasan()
	{
		$data = [
			'title' => 'Admin - Penugasan Bimbingan',
			'breadcrumb' => 'Penugasan Bimbingan'
		];
		$mhs_level = 5;
		$id_mentor = 2;
		$id_mentor2 = 3;
		$id_spv = 4;
		$data['pa'] = $this->Admin_m->getData_DosenJoin($id_mentor);
		$data['par'] = $this->Admin_m->getData_DosenJoin($id_mentor2);
		$data['spv'] = $this->Admin_m->getData_DosenJoin($id_spv);

		$data['mhs'] = $this->Admin_m->getData_MhsJoin($mhs_level);

		$this->template->load('template/master', 'admin/penugasan', $data, false);
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
			$tambah = $this->Admin_m->save_bimbingan($data);
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
		$fetch_data = $this->Admin_m->make_datatable($i);
		$no = $_POST['start'];
		$data = array();
		foreach ($fetch_data as $row) {
			$no++;
			$sub_array = array();
			$sub_array[] = $no;
			$sub_array[] = $row->nm_dosen . ' ' . $row->nm_dosen2;
			$sub_array[] = $row->nm_mhs . ' ' . $row->nm_mhs2;
			$sub_array[] = '<button class="btn btn-danger btn-sm" id="btn-hapus" data-id="' . $row->id . '">hapus</button>';
			$data[] = $sub_array;
		}

		$output = array(
			"draw" => $_POST["draw"],
			"recordsTotal" => $this->Admin_m->get_all_data(),
			"recordsFiltered" => $this->Admin_m->filtered_data(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function get_bimtable2()
	{
		$i = 2;
		$data = $this->Admin_m->fecth_Bimtable($i)->result();
		echo json_encode($data);
	}

	public function get_bimtable3()
	{
		$i = 3;
		$data = $this->Admin_m->fecth_Bimtable($i)->result();
		echo json_encode($data);
	}

	public function hapus_penugasan()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$hapus = $this->Admin_m->delete_penugasan($id);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data penugasan berhasil dihapus'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data penugasan gagal dihapus'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function operator()
	{
		$data = [
			'title' => 'Admin / Operator',
			'breadcrumb' => 'Operator'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 7;

		$data['aktif'] = $this->Admin_m->get_operator($level, $approve);
		$data['tidak_aktif'] = $this->Admin_m->get_operator($level, $is_approve);

		$this->template->load('template/master', 'admin/operator', $data, false);
	}

	public function tambah_operator()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'napan' => $this->input->post('napan'),
				'nabel' => $this->input->post('nabel'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'is_approve' => $this->input->post('status'),
				'level' => 7,
				'created_at' => date('Y-m-d H:i:s'),
				'is_delete' => 0
			];
			$simpan = $this->Admin_m->add_operator($data);
			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data operator baru, berhasil disimpan ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data operator baru, gagal disimpan ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function edit_operator()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$get_data = $this->Admin_m->search_data($id)->row_array();
			if ($get_data) {
				$arr_data = [
					'status' => 'sukses',
					'nilai' => $get_data
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'nilai' => $get_data
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update_operator()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id-edit');
			$data = [
				'napan' => $this->input->post('napan-edit'),
				'nabel' => $this->input->post('nabel-edit'),
				'email' => $this->input->post('email-edit'),
				'password' => password_hash($this->input->post('password-edit'), PASSWORD_DEFAULT),
				'is_approve' => $this->input->post('status-edit'),
			];

			$update = $this->Admin_m->updata_operatorData($id, $data);
			if ($update) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data operator baru, berhasil diperbaharui ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data operator baru, gagal diperbaharui ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	// chapter user mahasiswa
	public function show_mahasiswa()
	{
		$data = [
			'title' => 'Admin / List Mahasiswa',
			'breadcrumb' => 'Mahasiswa'
		];

		// data mahasiswa yang tidak aktif
		$is_approve = 0;
		$approve = 1;
		$level = 5;
		$data['tidak_aktif'] = $this->Admin_m->get_list_mahasiswa($level, $is_approve);

		//data mahasiswa aktif
		$data['aktif'] = $this->Admin_m->get_list_mahasiswa($level, $approve);


		$this->template->load('template/master', 'admin/list-mahasiswa', $data, false);
	}

	public function hapus_mahasiswa()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$hapus = $this->Admin_m->hapus_mhsData($id);
			if ($hapus) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data mahasiswa berhasil dihapus ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data mahasiswa gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function aktivasi()
	{
		$id = $this->input->post('id');
		$data = [
			'is_approve' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Admin_m->update_data($id, $data);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Mahasiswa berhasil diaktivasi ...'
			];
		} else {
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
		$update = $this->Admin_m->update_data($id, $data);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Dosen berhasil diaktivasi ...'
			];
		} else {
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
		$update = $this->Admin_m->update_data($id, $data);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Supervisor berhasil diaktivasi ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Supervisor gagal diaktivasi ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function aktivasi_operator()
	{
		$id = $this->input->post('id');
		$data = [
			'is_approve' => 1,
			'created_at' => date('Y-m-d H:i:s')
		];
		$update = $this->Admin_m->update_data($id, $data);
		if ($update) {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Operator berhasil diaktivasi ...'
			];
		} else {
			$arr_data = [
				'status' => 'gagal',
				'pesan' => 'Operator gagal diaktivasi ...'
			];
		}
		echo json_encode($arr_data);
	}

	public function dosen_par()
	{
		$data = [
			'title' => 'Admin / Dosen PAR',
			'breadcrumb' => 'Dosen Pembimbing Artikel Ilmiah'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 3;

		$data['aktif'] = $this->Admin_m->get_list_par($level, $approve);
		$data['tidak_aktif'] = $this->Admin_m->get_list_par($level, $is_approve);

		$this->template->load('template/master', 'admin/list-par', $data, false);
	}

	public function dosen_dpl()
	{
		$data = [
			'title' => 'Admin / DPL',
			'breadcrumb' => 'Dosen Pendamping Lapangan'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 2;
		$data['aktif'] = $this->Admin_m->get_list_dpl($level, $approve);
		$data['tidak_aktif'] = $this->Admin_m->get_list_dpl($level, $is_approve);

		$this->template->load('template/master', 'admin/list-dpl', $data, false);
	}

	public function supervisor()
	{
		$data = [
			'title' => 'Admin / Supervisor',
			'breadcrumb' => 'Supervisor Mitra'
		];

		$is_approve = 0;
		$approve = 1;
		$level = 4;
		$data['aktif'] = $this->Admin_m->get_list_spv($level, $approve);
		$data['tidak_aktif'] = $this->Admin_m->get_list_spv($level, $is_approve);

		$this->template->load('template/master', 'admin/list-spv', $data, false);
	}

	public function supervisor_detail($id)
	{
		$data = [
			'title' => 'Admin - Supervisor Detail',
			'breadcrumb' => 'Profil Supervisor'
		];
		$uri_id = $this->uri->segment(3);
		$id = base64_decode($uri_id);

		$data['spv'] = $this->Admin_m->show_spv_data($id)->row_array();

		$this->template->load('template/master', 'admin/spv-detail', $data, false);

	}

	public function update_supervisor()
	{
		if ($this->input->is_ajax_request()) {
			$data = [
				'napan' => $this->input->post('napan'),
				'nabel' => $this->input->post('nabel'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];

			$id = $this->input->post('id');

			$simpan = $this->Admin_m->update_spv_data($id, $data);

			if ($simpan) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data supervisor berhasil diubah'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data supervisor belum berhasil diubah'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function hapus_supervisor()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$delete = $this->Admin_m->delete_supervisorData($id);
			if ($delete) {
				$arr_data = [
					'status' => 'sukses',
					'pesan' => 'Data supervisor berhasil dihapus ...'
				];
			} else {
				$arr_data = [
					'status' => 'gagal',
					'pesan' => 'Data supervisor gagal dihapus ...'
				];
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function pengumuman()
	{
		$data = [
			'title' => 'Admin / Pengumuman',
			'breadcrumb' => 'Pengumuman'
		];

		$data['pengumuman'] = $this->Admin_m->get_pengumuman();
		$this->template->load('template/master', 'admin/pengumuman', $data, false);
	}

	public function add_pengumuman()
	{
		$post = $this->input->post();
		$data = [
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'mhs_tampil' => array_key_exists('tampil_mhs', $post) ? 1 : 0,
			'dosen_tampil' => array_key_exists('tampil_dosen', $post) ? 1 : 0,
			'created_by' => $_SESSION['id'],
			'created_at' => date('Y-m-d H:i:s')
		];

		$simpan = $this->Admin_m->add_pengumumanData($data);
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
			'title' => 'Admin / Data Magang',
			'breadcrumb' => 'Pilihan Magang'
		];

		$data['magang'] = $this->Admin_m->show_magangMhs();

		$this->template->load('template/master', 'admin/data-magang', $data, false);
	}

	public function fakultas()
	{
		$data = [
			'title' => 'Admin / Data Fakultas',
			'breadcrumb' => 'Fakultas',
			'fakultas' => $this->Admin_m->get_fakultas()
		];

		$this->template->load('template/master', 'admin/fakultas', $data, false);
	}

	public function prodi()
	{
		$data = [
			'title' => 'Admin / Data Prodi',
			'breadcrumb' => 'Prodi',
			'prodi' => $this->Admin_m->get_prodi()
		];

		$this->template->load('template/master', 'admin/prodi', $data, false);
	}

	public function bimbingan()
	{
		$data = [
			'title' => 'Admin / List Bimbingan',
			'breadcrumb' => 'Daftar Bimbingan'
		];

		$data['bimbingan'] = $this->Admin_m->get_list_bimbingan();
		$data['bim'] = $this->Admin_m->get_super();
		/*var_dump($data['bim']->result());die();*/
		$this->template->load('template/master', 'admin/list-bimbingan', $data, false);
	}

	public function print()
	{
		$data['judul'] = 'Data Bimbingan';
		$data['bimbingan'] = $this->Admin_m->get_list_bimbingan();
		$this->load->view('admin/print-bimbingan', $data);
	}

	public function fokus_kegiatan()
	{
		$data = [
			'title' => 'Admin / Fokus Kegiatan',
			'breadcrumb' => 'Fokus Kegiatan'
		];

		$data['fokus'] = $this->Admin_m->get_fokus();

		$this->template->load('template/master', 'admin/list-fokus', $data, false);
	}

	public function grafik()
	{
		$data = [
			'title' => 'Admin - Grafik',
			'breadcrumb' => 'Grafik',
			'year' => $this->Admin_m->get_tahun()
		];

		$this->template->load('template/master', 'admin/grafik-page', $data, false);
	}

	public function create_graph()
	{
		/*if ($this->input->is_ajax_request()) {*/
		if ($this->input->post('tahun')) {
			$chart_data = $this->Admin_m->get_graph($this->input->post('tahun'));
			foreach ($chart_data->result_array() as $k => $row) {
				$output[] = array(
					'nilai' => $row["pendapatan"],
					'judul' => 'Pendapatan rata-rata',
					'bulan' => $row['bulan']
				);
			}
			echo json_encode($output);
		}
		/*} else {
			echo "No direct script access allowed";
		}*/
	}

	public function list_lokasi()
	{
		$data = [
			'title' => 'Admin - List Lokasi Magang',
			'breadcrumb' => 'List Lokasi Magang'
		];

		$data['prodi'] = $this->Admin_m->get_prodi();

		$this->template->load('template/master', 'admin/list-lokasi', $data, false);
	}

	public function show_location()
	{
		if ($this->input->is_ajax_request()) {
			$id_prodi = $this->input->post('id_prodi');
			$data = $this->Admin_m->get_data_magang($id_prodi)->result();
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function approve_dosen()
	{
		$data = [
			'title' => 'Admin - Jumlah Approve',
			'breadcrumb' => 'Approve Dosen'
		];

		$data['approve'] = $this->Admin_m->get_approve_data()->result_array();

		$this->template->load('template/master', 'admin/approve-page', $data, false);
	}

	public function delete_dpl($id)
	{
		$this->Admin_m->delete_user($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', '<div class="alert alert-succes" role="alert">Data berhasil dihapus</div>');
			echo "<script>alert('Data berhasil dihapus')</script>";
		}
		echo "<script>window.location='" . site_url('admin/dosen_dpl') . "'</script>";
	}
}

