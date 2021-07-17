<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_m extends CI_Model {

	public function show_Allmenu(){
		$this->db->select('m.id as id, mm.nama_mainmenu as mainmenu, sm.nama_submenu as submenu,
							l.nama_level as level');
		$this->db->from('menu as m');
		$this->db->join('mainmenu as mm', 'mm.id = m.mainmenu_id', 'left');
		$this->db->join('submenu as sm', 'sm.id = m.submenu_id', 'left');
		$this->db->join('level as l', 'l.id = m.level_id', 'left');
		return $this->db->get();
	}

	// Menu responsif user
	public function show_usermenu($id){
		$this->db->select('m.id as id, mm.nama_mainmenu as mainmenu, sm.nama_submenu as submenu,
							l.nama_level as level, sm.url as url, mm.icon as icon');
		$this->db->from('menu as m');
		$this->db->join('mainmenu as mm', 'mm.id = m.mainmenu_id', 'left');
		$this->db->join('submenu as sm', 'sm.id = m.submenu_id', 'left');
		$this->db->join('level as l', 'l.id = m.level_id', 'left');
		$this->db->where('m.level_id', $id);
		return $this->db->get();
	}

	public function save_allmenu($data)	{
		return $this->db->insert('menu', $data);
	}

	public function show_level(){
		return $this->db->get('level');
	}

	public function showData(){
		return $this->db->get('mainmenu');
	}

	public function save($data){
		return $this->db->insert('mainmenu', $data);
	}

	public function getbyId($id){
		return $this->db->get_where('mainmenu', ['id' => $id]);
	}

	public function updateMainMenu($id, $data){
		return $this->db->where('id', $id)->update('mainmenu', $data);
	}

	public function delete_mainMenu($id){
		return $this->db->where('id', $id)->delete('mainmenu');
	}

	//for submenu table
	public function showDatasubmenu(){
		return $this->db->get('submenu');
	}

	public function save_submenu($data){
		return $this->db->insert('submenu', $data);
	}

	public function cek_dataSubmenu($id){
		return $this->db->get_where('submenu', ['id' => $id]);
	}

	public function update_submenu($id, $data){
		return $this->db->where('id', $id)->update('submenu', $data);
	}

	public function delete_subMenu($id){
		return $this->db->where('id', $id)->delete('submenu');
	}
}
