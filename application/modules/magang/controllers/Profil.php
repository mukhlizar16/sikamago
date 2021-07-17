<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if(empty(is_login())){
			redirect('login', 'refresh');
		}

	}

	public function index()
	{
		$id = $_SESSION['level-magang'];
		switch ($id){
			case 1:
				redirect('magang/admin/profil');
				break;
			case 2:
				redirect('magang/dosen/pa/profil');
				break;
			case 3:
				redirect('magang/dosen/par/profil');
				break;
			case 4:
				redirect('magang/supervisor/profil');
				break;
			case 5:
				redirect('magang/mahasiswa/profil');
				break;
			case 7:
				redirect('magang/operator/profil');
				break;
			default:
				redirect('magang/stakeholder/profil');
		}

	}


}
