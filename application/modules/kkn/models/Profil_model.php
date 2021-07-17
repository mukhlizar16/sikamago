<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{

	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('kkn', true);
	}

	public function get_profil($id)
	{
		$this->db2->select('u.*, p.nama_prodi as prodi, a.desa as desa, a.jalan as jln, a.kabupaten as kab, a.kecamatan as kec, 
							a.provinsi as prov, o.nama_ayah as nama_ayah, o.nama_ibu as nama_ibu, o.hp_ayah as hp_ayah, o.hp_ibu as hp_ibu,
							o.jalan as jln_ortu, o.desa as desa_ortu, o.kecamatan as kec_ortu, o.kabupaten as kab_ortu, o.provinsi as prov_ortu');
		$this->db2->from('user as u');
		$this->db2->join('prodi as p', 'p.id = u.prodi_id', 'LEFT');
		$this->db2->join('alamat_user as a', 'a.user_id = u.id', 'LEFT');
		$this->db2->join('alamat_ortu as o', 'o.user_id = u.id', 'LEFT');
		$this->db2->where('u.id', $id);
		return $this->db2->get();
	}

	public function cek_foto($id_user)
	{

		$this->db2->where('id', $id_user);
		return $this->db2->get('user');
	}

	public function simpan_foto($user_id, $data)
	{
		$this->db2->where('id', $user_id);
		return $this->db2->update('user', $data);
	}

	public function update_foto($user_id, $data)
	{
		$this->db2->where('id', $user_id);
		return $this->db2->update('user', $data);
	}

	public function update_data($user_id, $data)
	{
		$this->db2->where('id', $user_id);
		return $this->db2->update('user', $data);
	}

	public function cek_alamat($user_id)
	{
		$this->db2->where('user_id', $user_id);
		return $this->db2->get('alamat_user');
	}

	public function cek_ortu($user_id)
	{
		$this->db2->where('user_id', $user_id);
		return $this->db2->get('alamat_ortu');
	}

	public function update_alamat($user_id, $data_update)
	{
		$this->db2->where('user_id', $user_id);
		return $this->db2->update('alamat_user', $data_update);
	}

	public function update_alamat_ortu($user_id, $data_update)
	{
		$this->db2->where('user_id', $user_id);
		return $this->db2->update('alamat_ortu', $data_update);
	}

	public function simpan_alamat($data)
	{
		return $this->db2->insert('alamat_user', $data);
	}

	public function simpan_alamat_ortu($data)
	{
		return $this->db2->insert('alamat_ortu', $data);
	}
}
