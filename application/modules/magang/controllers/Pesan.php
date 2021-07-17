<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Pesan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!is_login()) {
			redirect('magang/login', 'refresh');
		}
	}

	public function index()
	{
		if (is_admin()) {
			redirect('magang/admin/pesan', 'refresh');
		} else if (is_mhs()) {
			redirect('magang/mahasiswa/pesan', 'refresh');
		} else if (is_PA() || is_PAR()) {
			redirect('magang/dosen/pesan', 'refresh');
		} else {
			redirect('magang/supervisor/pesan', 'refresh');
		}
	}
}
