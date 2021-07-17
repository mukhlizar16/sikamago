<?php defined('BASEPATH') or exit('NO direct script access allowed');


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		must_login_kkn();
		if (!is_admin_kkn()) {
			redirect('kkn/dashboard', 'refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'KKN Apps - Admin',
			'label' => cek_label(),
			'breadcrumb' => ''
		];

		$this->template->load('templates/master', 'admin/home', $data, false);
	}

	public function list_mahasiswa()
	{
		$data = [
			'title' => 'KKN Apps - List Mahasiswa',
			'label' => cek_label(),
			'breadcrumb' => 'List Mahasiswa'
		];

		$data['mhs'] = $this->Admin_model->get_mahasiswa();;

		$this->template->load('templates/master', 'admin/list-mhs', $data, false);
	}

	public function detil($id)
	{
		$data = [
			'title' => 'KKN Apps - Detil Mahasiswa',
			'label' => cek_label(),
			'breadcrumb' => 'Detil Mahasiswa'
		];

		$user_id = $this->encrypt->decode(urldecode($id));

		$data['mhs'] = $this->Admin_model->get_mhsData($user_id)->row_array();
		$this->template->load('templates/master', 'admin/profil-page', $data, false);

	}

	public function hapus_user()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['user'];
			$hapus = $this->Admin_model->delete_user($id);
			if ($hapus) {
				$ajax = ['status' => 'sukses', 'pesan' => 'Data user berhasil dihapus'];
			} else {
				$ajax = ['status' => 'gagal', 'pesan' => 'Data user gagal dihapus'];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function persyaratan()
	{
		$data = [
			'title' => 'Admin - Persyaratan',
			'label' => cek_label(),
			'breadcrumb' => 'Persyaratan'
		];

		$data['mhs'] = $this->Admin_model->get_persyaratan()->result_array();

		$this->template->load('templates/master', 'admin/persyaratan-page', $data, false);
	}

	public function lihat_file()
	{
		$data = [
			'title' => 'Admin - Detil File',
			'label' => cek_label(),
			'breadcrumb' => 'Detil File'
		];

		$user_id = $this->uri->segment(4);
		$data['file'] = $this->uri->segment(5);


		$this->template->load('templates/master', 'admin/lihat-file', $data, false);
	}

	public function catatan()
	{
		if ($this->input->is_ajax_request()) {
			$user_id = $_POST['user_id'];
			// cek apakah sudah ada catatan
			$cek = $this->Admin_model->cek_user_catatan($user_id)->row_array();
			if ($cek) {
				$data_update = [
					'status' => $_POST['status'],
					'keterangan' => strip_tags($_POST['catatan']),
					'tgl' => date('Y-m-d H:i:s')
				];
				$update = $this->Admin_model->update_catatan($user_id, $data_update);
				if ($update) {
					$ajax = [
						'status' => 'update',
						'pesan' => 'Catatan berhasil diperbaharui'
					];
				} else {
					$ajax = [
						'status' => 'fail',
						'pesan' => 'Catatan gagal diperbaharui'
					];
				}

			} else {
				$data = [
					'user_id' => $user_id,
					'status' => $_POST['status'],
					'keterangan' => strip_tags($_POST['catatan']),
					'tgl' => date('Y-m-d H:i:s')
				];

				$simpan = $this->Admin_model->simpan_catatan($data);
				if ($simpan) {
					$ajax = [
						'status' => 'sukses',
						'pesan' => 'Catatan berhasil disimpan'
					];
				} else {
					$ajax = [
						'status' => 'gagal',
						'pesan' => 'Catatan gagal disimpan'
					];
				}
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function status_register()
	{
		$data = [
			'title' => 'Admin - Status Registrasi',
			'label' => cek_label(),
			'breadcrumb' => 'Status Registrasi'
		];

		$data['status'] = $this->Admin_model->get_status()->result_array();

		$this->template->load('templates/master', 'admin/status-register', $data, false);
	}

	public function ubah_status()
	{
		if ($this->input->is_ajax_request()) {
			$id = $_POST['id'];
			$data = [
				'is_open' => $_POST['status']
			];

			$ubah = $this->Admin_model->change_status($id, $data);

			if ($ubah) {
				$ajax = [
					'status' => 'sukses',
					'pesan' => 'Status fitur berhasil diubah'
				];
			} else {
				$ajax = [
					'status' => 'gagal',
					'pesan' => 'Status fitur gagal diubah'
				];
			}
			echo json_encode($ajax);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function export()
	{
		$excel = new Spreadsheet();
		// Settingan awal fil excel
		$excel->getProperties()
			->setCreator('MCoding')
			->setLastModifiedBy('MCoding')
			->setTitle("Data Mahasiswa")
			->setSubject("Siswa")
			->setDescription("Laporan Semua Data Mahasiswa")
			->setKeywords("Data Mahasiswa");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "NO HP");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "GENDER");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "PRODI");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "FAKULTAS");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "ALAMAT PESERTA");
		$excel->getActiveSheet()->mergeCells('H3:L3');
		$excel->setActiveSheetIndex(0)->setCellValue('H4', "JALAN");
		$excel->setActiveSheetIndex(0)->setCellValue('I4', "DESA");
		$excel->setActiveSheetIndex(0)->setCellValue('J4', "KECAMATAN");
		$excel->setActiveSheetIndex(0)->setCellValue('K4', "KABUPATEN");
		$excel->setActiveSheetIndex(0)->setCellValue('L4', "PROVINSI");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "KELENGKAPAN SYARAT");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L4')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);

		// ambil data dari database
		$mhs = $this->Admin_model->get_allData()->result();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 4

		foreach ($mhs as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_hp);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->gender);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->prodi);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->fakultas);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->jln_user);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->desa_user);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->kec_user);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->kab_user);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->prov_user);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->status == 1 ? 'Lengkap':'Tidak Lengkap');

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(35); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(50); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet()->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);

		$writer = new Xlsx($excel);
		$filename = 'KKN Apps - List Mahasiswa';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
}
