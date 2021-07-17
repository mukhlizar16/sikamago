<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_m extends CI_Model {

	public function show_profiluser($id){
		$result =  $this->db->where('id', $id)
					->get('user');
		return $result->row_array();
	}

	public function update_userTable($id, $data){
		return $this->db->where('id', $id)->update('user', $data);
	}

	//showing mahasiswa profile
	public function check_dataMhs(){
		return $this->db->get('mahasiswa');
	}

	public function show_profilMhs($id){
		return $this->db->where('user_id', $id)->get('mahasiswa');
	}

	public function update_profilMhs($id, $data){
		return $this->db->where('user_id', $id)->update('mahasiswa', $data);
	}

	public function simpan_profilMhs($id, $data){
		$data['user_id'] = $id;
		return $this->db->insert('mahasiswa', $data);
	}

	public function photo_check($id) {
		return $this->db->where('user_id', $id)->get('mahasiswa')
				->row_array();
	}

	public function photo_Admincheck($id) {
		return $this->db->where('user_id', $id)->get('admin')
				->row_array();
	}

	public function photo_changed($foto, $id){
		return $this->db->where('user_id', $id)->update('mahasiswa', $foto);
	}
}
