<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;


class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login_kkn();

		if ($_SESSION['level'] != 3) {
			redirect('kkn/dashboard');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'KKN Apps - Dashboard',
			'label' => cek_label(),
			'breadcrumb' => '',
		];
		$this->template->load('templates/master', 'mahasiswa/home', $data, false);
	}

	public function dokumen()
	{
		$data = [
			'title' => 'KKN Apps - Dokumen Persyaratan',
			'label' => cek_label(),
			'breadcrumb' => 'Dokumen',
		];

		// cek status fitur
		$fitur_id = 2;
		$data['fitur'] = $this->Mahasiswa_model->cek_status($fitur_id)->row_array();

		$id_user = $_SESSION['id'];
		$data['syarat'] = $this->Mahasiswa_model->cek_info($id_user)->row_array();
		$data['dokumen'] = $this->Mahasiswa_model->cek_persyaratan($id_user)->row_array();

		$this->template->load('templates/master', 'mahasiswa/dokumen-page', $data, false);
	}

	// upload dokumen persyaratan
	public function upload_doc_satu()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_persetujuan-prodi';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_satu')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_1' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_1'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}

					$data = [
						'doc_1' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];

					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function upload_doc_dua()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_izin-ortu';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_dua')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_2' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_2'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}
					$data = [
						'doc_2' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function upload_doc_tiga()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_pernyataan-diri';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_tiga')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_3' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_3'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}
					$data = [
						'doc_3' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function upload_doc_empat()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_keterangan-swab';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_empat')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_4' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_4'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}
					$data = [
						'doc_4' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function upload_doc_lima()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_sertifikat-vaksin';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_lima')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_5' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_5'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}

					$data = [
						'doc_5' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function upload_doc_enam()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_transkrip-nilai';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_enam')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_6' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$result = $cek->row_array();
					$doc = $result['doc_6'];
					$target = './assets/kkn/userfiles/persyaratan/' . $doc;
					if (is_readable($target)) {
						unlink($target);
					}
					$data = [
						'doc_6' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil diperbaharui'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal diperbaharui'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	/*public function upload_doc_tujuh()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/persyaratan/';
			$config['allowed_types'] = 'pdf|PDF';
			$config['max_size'] = 10240;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_surat-keterangan-sehat';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('doc_tujuh')) {
				$arr_data = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			} else {
				$id_user = $_SESSION['id'];
				$cek = $this->Mahasiswa_model->cek_persyaratan($id_user);
				if ($cek->num_rows() < 1) {
					$data = [
						'user_id' => $_SESSION['id'],
						'doc_7' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->store_doc($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Dokumen persyaratan berhasil disimpan'
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Dokumen persyaratan gagal disimpan'
						];
					}
				} else {
					$id_user = $_SESSION['id'];
					$data = [
						'doc_7' => $this->upload->data('file_name'),
						'tgl' => date('Y-m-d H:i:s')
					];
					$update = $this->Mahasiswa_model->update_doc($id_user, $data);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data dokumen persyaratan berhasil ditambah'
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data dokumen persyaratan gagal ditambah'
						];
					}
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}*/

	public function get_desa()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$data = $this->Mahasiswa_model->get_desa($id);

			foreach ($data->result_array() as $d) {
				$row[] = [
					'id' => $d['id'],
					'text' => $d['nama_desa']
				];
			}
			echo json_encode($row);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function lokasi()
	{
		$data = [
			'title' => 'KKN Apps - Lokasi',
			'label' => cek_label(),
			'breadcrumb' => 'Lokasi',
			'lokasi' => $this->Mahasiswa_model->get_lokasi($_SESSION['id'])->row_array(),
			'kecamatan' => $this->Mahasiswa_model->get_kecamatan()->result_array()
		];

		$this->template->load('templates/master', 'mahasiswa/lokasi-page', $data, false);
	}

	public function simpan_lokasi()
	{
		if ($this->input->is_ajax_request()) {
			$id_user = $_SESSION['id'];
			// cek apakah sudah pernah memilih lokasi
			$cek_lokasi = $this->Mahasiswa_model->cek_lokasiData($id_user);
			if ($cek_lokasi->num_rows() <= 0) {
				// jika belum, cek jumlah lokasi terpilih
				$cek_jumlah = $this->Mahasiswa_model->cek_jumlah($_POST['desa']);

				if ($cek_jumlah >= 5) {
					$arr_data = [
						'status' => 'jumlah',
						'pesan' => 'Maaf, lokasi yang Anda pilih telah memenuhi kuota maksimal',
					];
				} else {
					$data = [
						'user_id' => $id_user,
						'kecamatan_id' => $_POST['kecamatan'],
						'desa_id' => $_POST['desa'],
						'tgl' => date('Y-m-d H:i:s')
					];
					$simpan = $this->Mahasiswa_model->simpan_lokasiData($data);
					if ($simpan) {
						$arr_data = [
							'status' => 'sukses',
							'pesan' => 'Data lokasi KKN berhasil disimpan',
						];
					} else {
						$arr_data = [
							'status' => 'gagal',
							'pesan' => 'Data lokasi KKN tidak berhasil disimpan',
						];
					}
				}
			} else {
				// cek juga jumlah saat update
				$update_cek_jumlah = $this->Mahasiswa_model->cek_jumlah($_POST['desa']);
				if ($update_cek_jumlah >= 5) {
					$arr_data = [
						'status' => 'jumlah-update',
						'pesan' => 'Maaf, lokasi yang Anda pilih telah memenuhi kuota maksimal',
					];
				} else {
					$data_update = [
						'kecamatan_id' => $_POST['kecamatan'],
						'desa_id' => $_POST['desa'],
						'tgl' => date('Y-m-d H:i:s')
					];

					$update = $this->Mahasiswa_model->update_lokasiData($id_user, $data_update);
					if ($update) {
						$arr_data = [
							'status' => 'update',
							'pesan' => 'Data lokasi KKN berhasil diperbaharui',
						];
					} else {
						$arr_data = [
							'status' => 'fail',
							'pesan' => 'Data lokasi KKN tidak berhasil diperbaharui',
						];
					}
				}
			}

			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function log()
	{
		$data = [
			'title' => 'KKN Apps - Log Harian',
			'label' => cek_label(),
			'breadcrumb' => 'Log harian'
		];

		$id_user = $_SESSION['id'];
		$data['log'] = $this->Mahasiswa_model->show_log($id_user)->result_array();

		$this->template->load('kkn/templates/master', 'kkn/mahasiswa/log-page', $data, false);
	}

	public function simpan_log()
	{
		if ($this->input->is_ajax_request()) {
			$config['upload_path'] = './assets/kkn/userfiles/dokumentasi/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['max_size'] = 5000;
			$config['file_name'] = preg_replace("/[^a-zA-Z]/", "", $_SESSION['nama']) . '_dokumentasi-kegiatan';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('dokumen')) {
				$ajax = [
					'status' => 'error',
					'pesan' => $this->upload->display_errors()
				];
			}else{
				$id_user = $_SESSION['id'];
				$data = [
					'user_id' => $id_user,
					'tgl' => $_POST['tanggal'],
					'kegiatan' => strip_tags($_POST['uraian']),
					'dokumentasi' => $this->upload->data('file_name'),
					'is_approve' => 0,
					'created_at' => date('Y-m-d H:i:s')
				];

				$simpan = $this->Mahasiswa_model->store_log($data);
				if ($simpan) {
					$ajax = [
						'status' => 'sukses',
						'pesan' => 'Log harian berhasil disimpan'
					];
				} else {
					$ajax = [
						'status' => 'gagal',
						'pesan' => 'Log harian gagal disimpan'
					];
				}
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function hapus_log()
	{
		if ($this->input->is_ajax_request()){
			$id = $_POST['id'];
			// hapus filenya
			$data = $this->Mahasiswa_model->get_log($id)->row_array();
			$doc = $data['dokumentasi'];
			$target = './assets/kkn/userfiles/dokumentasi/' . $doc;
			if (! empty($doc)){
				if (is_readable($target)) {
					unlink($target);
				}
			}

			// hapus data di database
			$hapus = $this->Mahasiswa_model->delete_log($id);
			if ($hapus){
				$ajax = [
				'status' => 'sukses',
				'pesan' => 'Log berhasil dihapus'
				];
			}else{
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Log gagal dihapus'
				];
			}
			echo json_encode($ajax);
		}else{
			echo 'No direct script access allowed';
		}
	}

	public function laporan_kemajuan()
	{
		$data = [
			'title' => 'KKN Apps - Laporan Kemajuan',
			'label' => cek_label(),
			'breadcrumb' => 'Laporan Kemajuan'
		];

		$this->template->load('kkn/templates/master', 'kkn/mahasiswa/laporan-kemajuan', $data, false);
	}

	public function cetak()
	{
		$content = "
			<html> 
			<body>
				<h1>HTML2PDF WORK !</h1> 
				Selamat datang di rachmat.ID
			</body>
			</html>
			";

		$html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', array(15, 15, 15, 15), false);
		$html2pdf->writeHTML($content);
		$html2pdf->output('laporan.pdf');
	}
}
