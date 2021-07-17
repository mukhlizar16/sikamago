<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $db2;

	public function __construct()
	{
		parent::__construct();
		$this->db2 = $this->load->database('kkn', true);
	}

	public function get_mahasiswa()
	{
		$this->db2->select('u.*, p.nama_prodi as prodi');
		$this->db2->from('user as u');
		$this->db2->join('prodi as p', 'p.id = u.prodi_id', 'LEFT');
		$this->db2->where('u.level_id', 3);
		$this->db2->order_by('p.nama_prodi', 'asc');
		return $this->db2->get();
	}

	public function delete_user($id)
	{
		$this->db2->where('id', $id);
		$this->db2->delete('user');
		if ($this->db2->affected_rows() > 0){
			return $this->db2->delete('user_role', ['user_id' => $id]);
		}else{
			return false;
		}
	}

	public function get_persyaratan()
	{
		$this->db2->select('p.*, u.nama as nama, u.nim as nim, d.nama_prodi as prodi, i.status as status, i.keterangan as keterangan');
		$this->db2->from('persyaratan as p');
		$this->db2->join('user as u', 'u.id = p.user_id', 'LEFT');
		$this->db2->join('prodi as d', 'd.id = u.prodi_id', 'LEFT');
		$this->db2->join('info_syarat as i', 'i.user_id = u.id', 'LEFT');
		return $this->db2->get();
	}

	public function cek_user_catatan($user_id){
		$this->db2->where('user_id', $user_id);
		return $this->db2->get('info_syarat');
	}

	public function update_catatan($user_id, $data_update)
	{
		$this->db2->where('user_id', $user_id);
		return $this->db2->update('info_syarat', $data_update);
	}

	public function simpan_catatan($data)
	{
		return $this->db2->insert('info_syarat', $data);
	}

	public function get_mhsData($id)
	{
		$this->db2->select('u.*, a.provinsi as prov_user, a.kabupaten as kab_user, a.kecamatan as kec_user,
							a.desa as desa_user, a.jalan as jln_user, o.provinsi as prov_ortu, o.kabupaten as kab_ortu, o.kecamatan as kec_ortu,
							o.desa as desa_ortu, o.jalan as jln_ortu, o.nama_ayah as nama_ayah, o.nama_ibu as nama_ibu, o.hp_ayah as hp_ayah, o.hp_ibu as hp_ibu');
		$this->db2->from('user as u');
		$this->db2->join('alamat_user as a', 'a.user_id = u.id', 'LEFT');
		$this->db2->join('alamat_ortu as o', 'o.user_id = u.id', 'LEFT');
		$this->db2->where('u.id', $id);
		return $this->db2->get();
	}

	public function get_status()
	{
		return $this->db2->get('status');
	}

	public function change_status($id, $data)
	{
		$this->db2->where('id', $id);
		return $this->db2->update('status', $data);
	}

	public function get_allData()
	{
		$this->db2->select('u.*, a.jalan as jln_user, a.desa as desa_user, a.kecamatan as kec_user, a.kabupaten as kab_user,
							a.provinsi as prov_user, p.nama_prodi as prodi, g.jenis as gender, f.nama_fak as fakultas, s.status as status');
		$this->db2->from('user as u');
		$this->db2->join('alamat_user as a', 'a.user_id = u.id', 'LEFT');
		$this->db2->join('alamat_ortu as o', 'o.user_id = u.id', 'LEFT');
		$this->db2->join('gender as g', 'g.id = u.gender_id', 'LEFT');
		$this->db2->join('prodi as p', 'p.id = u.prodi_id', 'LEFT');
		$this->db2->join('fakultas as f', 'f.id = p.fak_id', 'LEFT');
		$this->db2->join('info_syarat as s', 's.user_id = u.id', 'LEFT');
		$this->db2->where('u.level_id', 3);
		return $this->db2->get();
	}
}
