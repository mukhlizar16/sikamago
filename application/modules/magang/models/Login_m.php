<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login_m extends CI_Model {

	public function email_check($email)
	{
		return $this->db->get_where('user', ['email' => $email]);
	}

	public function check_login_log($id)
	{
		return $this->db->get_where('login_log', ['user_id' => $id]);
	}

	public function insert_login_log($data)
	{
		return $this->db->insert('login_log', $data);
	}

	public function update_login_log($id, $data)
	{
		$this->db->where('user_id', $id);
		return $this->db->update('login_log', $data);
	}
}
