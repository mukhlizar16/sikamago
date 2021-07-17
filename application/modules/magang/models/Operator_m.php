<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator_m extends CI_Model
{
	var $order_column = array(null, 'nm_dosen', 'nm_mhs', null);
	public function showdata($id)
	{
		return $this->db->get_where('user', ['id' => $id]);
	}

	public function get_dataOperator($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('operator');
	}

	public  function get_operatorData($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('operator');
	}

	public function simpan_foto($data)
	{
		return $this->db->insert('operator', $data);
	}

	public function update_foto($data, $id)
	{
		$this->db->where('user_id', $id);
		return $this->db->update('operator', $data);
	}

	public function update_profile($id, $data)
	{
		return $this->db->where('id', $id)->update('user', $data);
	}

	public function getData_DosenJoin($id)
	{
		$this->db->select('u.id as id, u.napan as napan, u.nabel as nabel, u.level as level');
		$this->db->from('user as u');
		$this->db->where('u.level', $id);
		$this->db->where('u.id NOT IN (select dosen_id from bimbingan)', NULL, FALSE);
		return $this->db->get();
	}

	public function getData_MhsJoin($id)
	{
		return $this->db->get_where('user', ['level' => $id]);
	}

	private function make_query()
	{
		$this->db->select('b.id as id, u.napan as nm_dosen, u.nabel as nm_dosen2, r.napan as nm_mhs,
						r.nabel as nm_mhs2, u.id as id_user, d.nama_lembaga as lembaga');
		$this->db->from('bimbingan as b');
		$this->db->join('dosen as d', 'd.id = b.dosen_id', 'left');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->join('user as r', 'r.id = m.user_id', 'left');
		$this->db->where('b.jenis_bimbingan_id', 1);

		if (isset($_POST['search']['value'])){
			$this->db->like('r.napan', $_POST['search']['value']);
			$this->db->or_like('u.napan', $_POST['search']['value']);
		}
		if (isset($_POST['order'])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}else{
			$this->db->order_by('id', 'ASC');
		}
	}

	public function make_datatable()
	{
		$this->make_query();
		if ($_POST['length'] != -1)
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data()
	{
		$this->db->select('b.id as id, u.napan as nm_dosen, u.nabel as nm_dosen2, r.napan as nm_mhs,
						r.nabel as nm_mhs2, u.id as id_user, d.nama_lembaga as lembaga');
		$this->db->from('bimbingan as b');
		$this->db->join('dosen as d', 'd.id = b.dosen_id', 'left');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->join('user as r', 'r.id = m.user_id', 'left');
		$this->db->where('b.jenis_bimbingan_id', 1);
		return $this->db->count_all_results();
	}

	public function save_bimbingan($data)
	{
		return $this->db->insert('bimbingan', $data);
	}

	public function fecth_Bimtable($i)
	{
		$this->db->select('b.id as id, u.napan as nm_dosen, u.nabel as nm_dosen2, r.napan as nm_mhs,
						r.nabel as nm_mhs2, u.id as id_user');
		$this->db->from('bimbingan as b');
		$this->db->join('dosen as d', 'd.id = b.dosen_id', 'left');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->join('user as r', 'r.id = m.user_id', 'left');
		$this->db->where('b.jenis_bimbingan_id', $i);
		return $this->db->get();
	}

	public function search_data($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user');
	}

	// chapter list mahasiswa
	public function get_list_mahasiswa($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	public function get_list_dpl($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	public function get_list_par($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	public function get_list_spv($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	// chapter pengumuman
	public function add_pengumumanData($data)
	{
		return $this->db->insert('pengumuman', $data);
	}

	public function get_pengumuman()
	{
		$this->db->select('p.created_at as tgl, u.napan as napan,
								p.deskripsi as deskripsi, p.judul as judul,
								p.id as id, p.dosen_tampil as tampil_dosen,
								p.mhs_tampil as tampil_mhs');
		$this->db->from('pengumuman as p');
		$this->db->join('user as u', 'u.id = p.created_by', 'left');
		return $this->db->get();
	}

	public function update_data($id, $data)
	{
		return $this->db->where('id', $id)->update('user', $data);
	}

	public function show_magangMhs()
	{
		$this->db->select('*, u.napan as napan, u.nabel as nabel, p.created_at as tgl, d.nama_prodi as prodi,
							r.nama as lingkup, g.nama_bidang as nama_bidang, p.bidang_id as bidang, p.lokasi_id as lokasi, p.kecamatan as kecamatan, 
							p.kelurahan as kelurahan, p.bidang_lain as bidang_lain, p.kecamatan_lainnya as kecamatan_lain,
							p.kelurahan_lainnya as kelurahan_lain');
		$this->db->from('pilihan_magang as p');
		$this->db->join('mahasiswa as m', 'm.id = p.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->join('prodi as d', 'd.id = m.prodi_id', 'left');
		$this->db->join('ruang_lingkup as r', 'r.id = p.lingkup_id', 'left');
		$this->db->join('bidang_magang as g', 'g.id = p.bidang_id', 'left');
		return $this->db->get();
	}
}
