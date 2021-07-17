<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_m extends CI_Model
{

	public function get_pengumuman()
	{
		$this->db->select('*, p.created_at as tgl');
		$this->db->from('pengumuman as p');
		$this->db->join('user as u', 'u.id = p.created_by', 'left');
		$this->db->where('dosen_tampil', 1);
		$this->db->order_by('p.id', 'DESC');
		$this->db->limit(2);
		return $this->db->get();
	}

	public function get_usertable($id)
	{
		return $this->db->get_where('user', ['id' => $id]);
	}

	public function cek_dosenTable($id)
	{
		return $this->db->get_where('dosen', ['user_id' => $id]);
	}

	public function update_dosen_userTable($id, $data)
	{
		return $this->db->where('id', $id)->update('user', $data);
	}

	public function insert_data($id, $data)
	{
		$data['user_id'] = $id;
		return $this->db->insert('dosen', $data);
	}

	public function update_data($id, $data)
	{
		return $this->db->where('user_id', $id)->update('dosen', $data);
	}

	public function ganti_pass($data, $id_user)
	{
		$this->db->where('id', $id_user);
		return $this->db->update('user', $data);
	}

	public function photo_changed($data)
	{
		return $this->db->insert('dosen', $data);
	}

	public function update_foto($data, $id)
	{
		return $this->db->where('user_id', $id)
				->update('dosen', $data);
	}

	public function get_bimbingan($id, $jenis)
	{
		$this->db->where('dosen_id', $id);
		$this->db->or_where('jenis_bimbingan_id', $jenis);
		return $this->db->get('bimbingan');
	}

	public function get_mhs($mhs_id)
	{
		$this->db->select('m.id as id, u.napan as napan, u.nabel as nabel, m.foto as foto,
							m.id as id');
		$this->db->from('mahasiswa as m');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->where('m.id', $mhs_id);

		return $this->db->get();
	}

	public function get_mhsData($dosen_id, $jenis){
		$this->db->select('*, m.id as idm');
		$this->db->from('bimbingan as b');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->where('b.mhs_id IN (select m.id)', null, false);
		$this->db->where('b.dosen_id', $dosen_id);
		$this->db->where('b.jenis_bimbingan_id', $jenis);
		return $this->db->get();
	}

	public function get_allMhs()
	{
		$this->db->select('m.id as id, u.napan as napan, u.nabel as nabel');
		$this->db->from('mahasiswa as m');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->order_by('u.napan', 'ASC');
		return $this->db->get();
	}

	public function get_ID($id)
	{
		return $this->db->get_where('dosen', ['user_id' => $id]);
	}

	public function get_allbimbingan($idd)
	{
		$this->db->select('*, m.foto as foto, u.napan as napan, u.nabel as nabel, u.email as email, 
							p.nama_prodi as prodi, m.no_hp as no_hp, r.nama as jenis, g.bidang_id as bidang,
							g.lokasi_id as lokasi, g.lokasi_lain as lain, t.nama_bimbingan as tipe, 
							b.id as id');
		$this->db->from('bimbingan as b');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->join('prodi as p', 'p.id = m.prodi_id', 'left');
		$this->db->join('pilihan_magang as g', 'g.mhs_id = m.id', 'left');
		$this->db->join('ruang_lingkup as r', 'r.id = g.lingkup_id', 'left');
		$this->db->join('bidang_magang as d', 'd.id = g.bidang_id', 'left');
		$this->db->join('lokasi_magang as l', 'l.id = g.lokasi_id', 'left');
		$this->db->join('tipe_bimbingan as t', 't.id = b.jenis_bimbingan_id', 'left');
		$this->db->where('b.dosen_id', $idd);
		return $this->db->get();
	}

	public function save_bim_data($data)
	{
		return $this->db->insert('bimbingan', $data);
	}

	public function hapus_dataBimbingan($id)
	{
		return $this->db->delete('bimbingan', ['id' => $id]);
	}

	public function get_bimbinganData($id, $jenis)
	{
		$this->db->select('*, b.mhs_id as idm, m.foto as foto_mhs, p.lokasi_id as lokasi, p.lokasi_lain as lokasi_lain');
		$this->db->from('bimbingan as b');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->join('pilihan_magang as p', 'p.mhs_id = m.id', 'left');
		$this->db->where('b.mhs_id IN (select m.id)', null, false);
		$this->db->where('b.dosen_id', $id);
		$this->db->where('b.jenis_bimbingan_id', $jenis);
		return $this->db->get();
	}

	public function hitung($id, $jenis)
	{
		$this->db->select('*');
		$this->db->from('log as l');
		$this->db->join('mahasiswa as m', 'm.id = l.mhs_id', 'left');
		$this->db->join('bimbingan as b', 'b.mhs_id = m.id', 'left');
		$this->db->where('b.dosen_id', $id);
		$this->db->where('b.jenis_bimbingan_id', $jenis);
		$this->db->where('b.mhs_id IN (select l.mhs_id)', null, false);

		return $this->db->get();
	}

	public function show_logData($id)
	{
		$this->db->where('mhs_id', $id);
		$this->db->order_by('status', 'desc');
		return $this->db->get('log');
	}

	public function show_detail_mhs_magang($mhs_id)
	{
		$this->db->select('m.id as id, u.napan as napan, u.nabel as nabel, m.foto as foto,
							m.id as id, r.nama as lingkup, p.lokasi_id as lokasi, p.lokasi_lain as lokasi_lain');
		$this->db->from('mahasiswa as m');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->join('pilihan_magang as p', 'p.mhs_id = m.id', 'left');
		$this->db->join('ruang_lingkup as r', 'r.id = p.lingkup_id');
		$this->db->where('m.id', $mhs_id);

		return $this->db->get();
	}

	public function update_logTable($log_id, $data)
	{
		return $this->db->where('id', $log_id)
				->update('log', $data);
	}

	//chapter pesan
	public function search_penerima($nama)
	{
		$this->db->select('*, u.napan as napan, u.nabel as nabel, u.id as, u.id as id_mhs');
		$this->db->from('mahasiswa as m');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->like('u.napan', $nama, 'both');
		$this->db->or_like('u.nabel', $nama, 'both');
		$this->db->order_by('u.napan', 'ASC');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function get_penerimaID($id)
	{
		return $this->db->get_where('mahasiswa', ['id' => $id]);
	}

	public function get_send_Pesan($id)
	{
		$this->db->select('u.napan as napan, u.nabel as nabel, m.foto as foto_mhs, p.created_at as tgl,
							p.isi_pesan as isi_pesan, u.email as email, r.napan as np, r.nabel as nb,
							d.foto as foto_dsn, r.email as email_dsn');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.penerima_id', 'left');
		$this->db->join('mahasiswa as m', 'm.user_id = u.id', 'left');
		$this->db->join('dosen as d', 'd.user_id = p.pengirim_id', 'left');
		$this->db->join('user as r', 'r.id = d.user_id', 'left');
		$this->db->group_start();
		$this->db->where('p.pengirim_id', $id);
		$this->db->order_by('p.id', 'DESC');
		$this->db->group_end();
		return $this->db->get();
	}

	public function get_allPesan($id)
	{
		$this->db->select('u.napan as napan, u.nabel as nabel, p.isi_pesan as isi_pesan, p.created_at as tgl,
							m.foto as foto_mhs, u.email as email_mhs, p.id as id_pesan, COUNT(p.penerima_id) as total,
							p.status_baca as dibaca, p.pengirim_id as id_p');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.pengirim_id');
		$this->db->join('mahasiswa as m', 'm.user_id = u.id');
		$this->db->where('p.penerima_id', $id);
		$this->db->where('p.status_baca', 0);
		return $this->db->get();
	}

	public function detail_pesan($id_pengirim, $id_penerima)
	{
		$this->db->select('*, p.status_baca as status, u.napan as napan, u.nabel as nabel, r.napan as napan,
						r.nabel as nabel, p.created_at as tgl, p.id as id_pesan');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.penerima_id', 'left');
		$this->db->join('user as r', 'r.id = p.pengirim_id', 'left');
		$this->db->where('p.penerima_id', $id_pengirim);
		$this->db->or_where('p.pengirim_id', $id_pengirim);
		$this->db->or_where('p.penerima_id', $id_penerima);
		$this->db->order_by('tgl', 'DESC');
		return $this->db->get();
	}

	public function simpan_pesan($data)
	{
		return $this->db->insert('pesan', $data);
	}

	public function update_pesan($data, $id_pesan)
	{
		$this->db->where('id', $id_pesan);
		return $this->db->update('pesan', $data);
	}
	
	public function show_kegiatan($id)
	{
		return $this->db->get_where('log_dosen', ['dosen_id' => $id]);
	}

	public function add_kegiatan($data)
	{
		return $this->db->insert('log_dosen', $data);
	}
	
	public function hapus_data_kegiatan($id)
	{
		return $this->db->delete('log_dosen', ['id' => $id]);
	}
	
	public function get_laporan($idd)
	{
		return $this->db->get_where('laporan_dosen', ['dosen_id' => $idd]);
	}

	public function save_laporan($data)
	{
		return $this->db->insert('laporan_dosen', $data);
	}
}
