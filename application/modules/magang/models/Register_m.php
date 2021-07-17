<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Register_m extends CI_Model {

	public function savedata($d) {
		return $this->db->insert('user', $d);
	}
}
