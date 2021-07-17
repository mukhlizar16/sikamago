<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error_page extends CI_Controller
{

	public function index()
	{
		if ($this->uri->segment(1) == 'magang') {
			$this->load->view('errors/html/404-page');
		} else {
			$this->load->view('errors/html/error-kkn-page');
		}
	}
}
