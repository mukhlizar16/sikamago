<?php defined('BASEPATH') or exit('No direct script access allowed');


class Dosen_model extends CI_Model
{
	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('kkn', true);
	}

	public function show_pengumuman()
	{
		$this->db2->where('tampil_dosen', 1);
		$this->db->order_by('tgl', 'asc');
		return $this->db2->get('pengumuman');
	}

	public function get_allMahasiswa($cari)
	{
		$this->db2->like('nama', $cari, 'both');
		$this->db2->where('level_id', 3);
		return $this->db2->get('user');
	}

	public function get_kecamatan()
	{
		return $this->db2->get('kecamatan');
	}
}
