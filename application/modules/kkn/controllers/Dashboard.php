<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		must_login_kkn();
	}

	public function index()
	{
		$level = $_SESSION['level'];
		switch ($level){
			case 2:
				redirect('kkn/dosen');
				break;
			case 3:
				redirect('kkn/mahasiswa');
				break;
			default:
				redirect('kkn/admin');
		}
	}
}
