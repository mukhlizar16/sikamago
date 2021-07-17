<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('kkn', true);
	}

	public function cek_info($id_user)
	{
		$this->db2->where('user_id', $id_user);
		return $this->db2->get('info_syarat');
	}

	public function cek_persyaratan($id_user)
	{
		$this->db2->where('user_id', $id_user);
		return $this->db2->get('persyaratan');
	}

	public function store_doc($data)
	{
		return $this->db2->insert('persyaratan', $data);
	}

	public function update_doc($id_user, $data)
	{
		$this->db2->where('user_id', $id_user);
		return $this->db2->update('persyaratan', $data);
	}

	public function get_lokasi($id_user)
	{
		$this->db2->select('l.id as id, k.nama_kecamatan as kecamatan, d.nama_desa as desa, l.tgl as tgl');
		$this->db2->from('lokasi as l');
		$this->db2->join('kecamatan as k', 'k.id = l.kecamatan_id', 'LEFT');
		$this->db2->join('desa as d', 'd.id = l.desa_id', 'LEFT');
		$this->db2->where('user_id', $id_user);
		return $this->db2->get();
	}

	public function get_kecamatan()
	{
		return $this->db2->get('kecamatan');
	}

	public function get_desa($id)
	{
		$this->db2->where('kecamatan_id', $id);
		return $this->db2->get('desa');
	}

	public function cek_lokasiData($id_user)
	{
		$this->db2->where('user_id', $id_user);
		return $this->db2->get('lokasi');
	}

	public function cek_jumlah($id_desa)
	{
		$this->db2->where('desa_id', $id_desa);
		return $this->db2->count_all_results('lokasi');
	}

	public function simpan_lokasiData($data)
	{
		return $this->db2->insert('lokasi', $data);
	}

	public function update_lokasiData($id_user, $data_update)
	{
		$this->db2->where('user_id', $id_user);
		return $this->db2->update('lokasi', $data_update);
	}
	
	public function store_log($data)
	{
		return $this->db2->insert('log', $data);
	}

	public function delete_log($id)
	{
		$this->db2->where('id', $id);
		return $this->db2->delete('log');
	}

	public function get_log($id)
	{
		return $this->db2->get_where('log', ['id' => $id]);
	}

	public function show_log($id_user)
	{
		return $this->db2->get_where('log', ['user_id' => $id_user]);
	}

	public function cek_status($fitur_id)
	{
		return $this->db2->get_where('status', ['id' => $fitur_id]);
	}
}
