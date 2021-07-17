<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Switch_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		must_login();
	}

	public function index()
    {

		$id = $_SESSION['level-magang'];
		if ($id == 1){
			redirect('magang/admin');
		}else if ($id == 2 || $id == 3){
			redirect('magang/dosen');
		}else if ($id == 4){
			redirect('magang/supervisor');
		}else if ($id == 5 ){
			redirect('magang/mahasiswa');
		}else {
			redirect('magang/login');
		}
    }
}
