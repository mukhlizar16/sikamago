<?php defined('BASEPATH') or exit('NO direct script access allowed');

class Auth_model extends CI_Model
{
	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('kkn', true);
	}

	public function check_user($email)
	{
		$this->db2->where('email', $email);
		return $this->db2->get('user');
	}

	public function get_prodi()
	{
		return $this->db->get('prodi');
	}

	public function store_data($clean)
	{
		$this->db2->insert('user', $clean);
		$id = $this->db2->insert_id();

		$data = [
			'role_id' => 3,
			'user_id'=> $id
		];
		return $this->db2->insert('user_role', $data);
	}

	public function cek_tokenData($token)
	{
		$this->db2->where('token', $token);
		return $this->db2->get('user');
	}

	public function activate_user($id)
	{
		$data = ['is_active' => 1];
		$this->db2->where('id', $id);
		return $this->db2->update('user', $data);
	}

	public function cek_status($id)
	{
		return $this->db2->get_where('status', ['id' => $id]);
	}
}
