<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_m extends CI_Model{

	public function get_pengumuman()
	{
		$this->db->select('p.created_at as tgl, u.napan as napan, p.deskripsi as deskripsi,
							p.judul as judul');
		$this->db->from('pengumuman as p');
			$this->db->join('user as u', 'u.id = p.created_by', 'left');
			$this->db->order_by('p.id', 'DESC')->limit(2);
			$this->db->where('mhs_tampil', 1);
			return $this->db->get();
	}

	public function get_ID($id)
	{
		return $this->db->get_where('mahasiswa', ['user_id' => $id]);
	}

	public function get_penerimaID($id)
	{
		return $this->db->get_where('dosen', ['id' => $id]);
	}

	public function show_data($id){
		return $this->db->get_where('user', ['id' => $id]);
	}

	public function cek_mhsTable($id){
		$this->db->select('m.user_id as user_id, m.prodi_id as id_prodi, m.nim as nim, m.foto as foto, m.no_hp as no_hp, p.nama_prodi as prodi');
		$this->db->from('mahasiswa as m');
		$this->db->join('prodi as p', 'p.id = m.prodi_id', 'left');
		$this->db->where('m.user_id', $id);
		return $this->db->get();
	}

	public function get_prodi(){
		return $this->db->get('prodi');
	}

	public function get_magangTable($id){
		$this->db->select('p.id as id, r.nama as lingkup, p.bidang_id as bidang, p.bidang_lain as bidang_lain, p.lokasi_id as lokasi,
					p.bidang_lain as bidang_lain, p.lokasi_lain as lokasi_lain, p.lingkup_id as id_lingkup, p.kecamatan as kecamatan,
					p.kelurahan as kelurahan, p.kecamatan_lainnya as kec_lain, p.kelurahan_lainnya as kel_lain');
		$this->db->from('pilihan_magang as p');
		$this->db->join('ruang_lingkup as r', 'r.id = p.lingkup_id', 'left');
		$this->db->where('p.mhs_id', $id);
		return $this->db->get();
	}

	public function pilihan_magangTable($id_m)
	{
		return $this->db->get_where('pilihan_magang', ['mhs_id' => $id_m]);
	}

	public function insert_data($id, $data){
		$data['user_id'] = $id;
		return $this->db->insert('mahasiswa', $data);
	}

	public function update_data($id, $data){
		return $this->db->where('user_id', $id)->update('mahasiswa', $data);
	}

	public function simpan_foto($data){
		return $this->db->insert('mahasiswa', $data);
	}

	public function update_foto($data, $mhs_id)
	{
		$this->db->where('user_id', $mhs_id);
		return $this->db->update('mahasiswa', $data);
	}

	public function get_mentor($id, $j)
	{
		$this->db->select('b.id as id_bimbingan, u.napan as napan, u.nabel as nabel, d.no_hp as no_hp_dosen, d.foto as foto_dosen, 
						l.nama_level as level');
		$this->db->from('bimbingan as b');
		$this->db->join('dosen as d', 'd.id = b.dosen_id', 'left');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->join('level as l', 'l.id = u.level', 'left');
		$this->db->where('b.mhs_id', $id);
		$this->db->where('b.jenis_bimbingan_id', $j);
		return $this->db->get();
	}

	// Chapter magang
	public function get_lingkup(){
		return $this->db->get('ruang_lingkup');
	}

	public function ambil_ID($id)
	{
		return $this->db->get_where('mahasiswa', ['user_id' => $id]);
	}

	function get_lokasi($id){
		$hasil=$this->db->get_where('lokasi_magang', ['lingkup_id' => $id]);
		return $hasil->result();
	}

	function get_bidang($id){
		$hasil=$this->db->get_where('bidang_magang', ['lingkup_id' => $id]);
		return $hasil->result();
	}

	public function cek_simpan($id_mhs){
		return $this->db->get_where('pilihan_magang', ['mhs_id' => $id_mhs]);
	}

	public function save_dataMagang($id, $data)
	{
		$data['mhs_id'] = $id;
		return $this->db->insert('pilihan_magang', $data);
	}

	public function update_dataMagang($id_mhs, $data)
	{
		$this->db->where('mhs_id', $id_mhs);
		return $this->db->update('pilihan_magang', $data);
	}

	// chapter log harian
	//ambil data kegiatan dari database
	function get_kegiatan_list($id_mhs){
		$this->db->select('*, f.nama_kegiatan as fokus, l.id as id_log');
		$this->db->from('log as l');
		$this->db->join('fokus_kegiatan as f', 'f.id = l.fokus_id', 'left');
		$this->db->where('l.mhs_id', $id_mhs);
		return $this->db->get();
	}

	public function get_pilihMagang($id_mhs)
	{
		return $this->db->get_where('pilihan_magang', ['mhs_id' => $id_mhs]);
	}

	public function get_fokusData($id_lingkup, $id_bidang, $id_prodi)
	{
		return $this->db->where('lingkup_id', $id_lingkup)
				->where('bidang_id', $id_bidang)
				->where('prodi_id', $id_prodi)
				->order_by('id', 'ASC')
/*			->group_by('bagian')*/
				->get('fokus_kegiatan');
	}

	public function save_logData($data)
	{
		return $this->db->insert('log', $data);
	}

	public function hapus_data_kegiatan($id_log)
	{
		return $this->db->delete('log', ['id' => $id_log]);
	}

	public function get_mhsTable($id){
		return $this->db->get_where('mahasiswa', ['user_id' => $id]);
	}

	// chapter laporan
	public function cek_laporan($idm){
		return $this->db->get_where('laporan', ['mhs_id' => $idm]);
	}

	public function simpan_berkas($data){
		return $this->db->insert('laporan', $data);
	}

	public function get_laporan($idm)
	{
		return $this->db->get_where('laporan', ['mhs_id' => $idm]);
	}

	public function get_artikelData($idm)
	{
		return $this->db->get_where('artikel', ['mhs_id' => $idm]);
	}

	// chapter pesan
	public function search_penerima($nama)
	{
		$this->db->select('*, u.napan as napan, u.nabel as nabel, d.id as id_dosen');
		$this->db->from('dosen as d');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->like('u.napan', $nama, 'both');
		$this->db->or_like('u.nabel', $nama, 'both');
		$this->db->order_by('u.napan', 'ASC');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function simpan_pesan($data)
	{
		return $this->db->insert('pesan', $data);
	}

	public function get_send_Pesan($id)
	{
		$this->db->select('r.napan as napan, r.nabel as nabel, m.foto as foto_mhs, p.created_at as tgl,
							p.isi_pesan as isi_pesan, r.email as email, u.napan as np, u.nabel as nb,
							d.foto as foto_dsn, u.email as email_dsn');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.penerima_id', 'left');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->join('mahasiswa as m', 'm.user_id = p.pengirim_id', 'left');
		$this->db->join('user as r', 'r.id = m.user_id', 'left');
		$this->db->group_start();
		$this->db->where('p.pengirim_id', $id);
		$this->db->order_by('p.id', 'DESC');
		$this->db->group_end();
		return $this->db->get();
	}

	public function get_allPesan($id)
	{
		$this->db->select('*, u.napan as napan, u.nabel as nabel, p.isi_pesan as isi_pesan, p.created_at as tgl,
							d.foto as foto_dosen, u.email as email_dosen, p.id as id_pesan, COUNT(p.penerima_id) as total,
							p.status_baca as dibaca, p.id as id_pesan, p.pengirim_id as id_pengirim');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.pengirim_id', 'left');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->where('p.penerima_id', $id);
		$this->db->group_by('p.pengirim_id');
		$this->db->order_by('p.pengirim_id', 'ASC');
		$this->db->where('p.status_baca', 0);
		return $this->db->get();
	}

	public function detail_pesan($idm, $idp)
	{
		$this->db->select('*, p.status_baca as status, u.napan as napan, u.nabel as nabel, r.napan as napan,
						r.nabel as nabel, p.created_at as tgl, p.id as id_pesan');
		$this->db->from('pesan as p');
		$this->db->join('user as u', 'u.id = p.penerima_id');
		$this->db->join('user as r', 'r.id = p.pengirim_id');
		$this->db->where('p.penerima_id', $idm);
		$this->db->or_where('p.pengirim_id', $idm);
		$this->db->where('p.pengirim_id', $idp);
		$this->db->or_where('p.penerima_id', $idp);
		$this->db->order_by('p.id', 'DESC');
		return $this->db->get();
	}

	public function hapus_pesan($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('pesan');
	}

	public function update_pesan($data, $id_pesan)
	{
		$this->db->where('id', $id_pesan);
		return $this->db->update('pesan', $data);
	}

	// chapter demografi
	public function simpan_data_kesehatan($data)
	{
		return $this->db->insert('demografi_kesehatan', $data);
	}

	public function get_demografi()
	{
		$this->db->select('*, d.wanita_subur as wanita_subur, b.nama_bulan as nama_bulan,
						d.tahun as tahun, d.bulan as bulan');
		$this->db->from('demografi_kesehatan as d');
		$this->db->join('bulan as b', 'b.id = d.bulan', 'left');
		return $this->db->get();
	}

	public function simpan_demo_sosial($data)
	{
		return $this->db->insert('demografi_sosial', $data);
	}

	public function save_demo_perikanan($data)
	{
		return $this->db->insert('demografi_perikanan', $data);
	}

	public function save_demo_ekonomi($data)
	{
		return $this->db->insert('demografi_ekonomi', $data);
	}

	public function save_demo_pertanian($data)
	{
		return $this->db->insert('demografi_pertanian', $data);
	}

	public function cekdata($idmhs)
	{
		return $this->db->get_where('identitas_kecamatan', ['created_by' => $idmhs]);
	}

	public function save_identitas_kecamatan($data)
	{
		return $this->db->insert('identitas_kecamatan', $data);
	}

	public function save_dimekoData($data_de, $data_kp, $data_sp, $data_pp,
									$data_dl, $data_lk, $data_le, $data_kw, $idm)
	{
		$data_de['mhs_id'] = $idm;
		$this->db->insert('dimensi_ekonomi', $data_de);
		if ($this->db->affected_rows() > 0){
			$id_de = $this->db->insert_id();
		}else{
			return false;
		}

		$data_kp['de_id'] = $id_de;
		$data_sp['de_id'] = $id_de;
		$data_pp['de_id'] = $id_de;
		$data_dl['de_id'] = $id_de;
		$data_lk['de_id'] = $id_de;
		$data_le['de_id'] = $id_de;
		$data_kw['de_id'] = $id_de;

		$this->db->insert('DE_keragaman_produksi', $data_kp);
		$this->db->insert('DE_sarana_prasarana', $data_sp);
		$this->db->insert('DE_pusat_perdagangan', $data_pp);
		$this->db->insert('DE_distribusi_logistik', $data_dl);
		$this->db->insert('DE_lembaga_keuangan', $data_lk);
		$this->db->insert('DE_lembaga_ekonomi', $data_le);
		return $this->db->insert('DE_keterbukaan_wilayah', $data_kw);
	}

	public function save_dimsos_kesehatan($data)
	{
		return $this->db->insert('dimsos_kesehatan', $data);
	}

	public function save_dimsos_pendidikan($data)
	{
		return $this->db->insert('dimsos_pendidikan', $data);
	}

	public function save_dim_sos($data)
	{
		return $this->db->insert('dimsos_modalsosial', $data);
	}

	public function get_laporan_by_ID($id_lap)
	{
		return $this->db->get_where('laporan', ['id' => $id_lap]);
	}

	public function delete_laporan($id_lap)
	{
		return $this->db->delete('laporan', ['id' => $id_lap]);
	}

	public function get_artikel_by_ID($id_ar)
	{
		return $this->db->get_where('artikel', ['id' => $id_ar]);
	}

	public function delete_artikel($id_ar)
	{
		return $this->db->delete('artikel', ['id' => $id_ar]);
	}

	public function simpan_artikel($data)
	{
		return $this->db->insert('artikel', $data);
	}
	
	public function get_idenKec_data($id)
	{
		return $this->db->get_where('identitas_kecamatan', ['created_by' => $id]);
	}

	public function get_ides_data($id)
	{
		return $this->db->get_where('identitas_desa', ['created_by' => $id]);
	}

	public function get_igeo_data($id)
	{
		return $this->db->get_where('identitas_geotop', ['created_by' => $id]);
	}

	public function get_dsk_data($id)
	{
		return $this->db->get_where('dimsos_kesehatan', ['created_by' => $id]);
	}

	public function get_dim_pend($id)
	{
		return $this->db->get_where('dimsos_pendidikan', ['created_by' => $id]);
	}

	public function get_dim_sos_data($id)
	{
		return $this->db->get_where('dimsos_modalsosial', ['created_by' => $id]);
	}

	public function get_dimsos_kim($id)
	{
		return $this->db->get_where('dimsos_permukiman', ['created_by' => $id]);
	}

	public function get_dimeko_data($id)
	{
		return $this->db->get_where('dimensi_ekonomi', ['mhs_id' => $id]);
	}

	public function get_dim_eko_data($id)
	{
		return $this->db->get_where('dimensi_ekologi', ['created_by' => $id]);
	}

	public function get_ades_data($id)
	{
		return $this->db->get_where('aktivitas_desa', ['created_by' => $id]);
	}

	public function get_idem_data($id)
	{
		return $this->db->get_where('identitas_demografi', ['created_by' => $id]);
	}

	public function get_pd_data($id)
	{
		return $this->db->get_where('pendapatan_desa', ['created_by' => $id]);
	}

	public function save_identitas_desa($data)
	{
		return $this->db->insert('identitas_desa', $data);
	}

	public function save_identitas_geotop($data)
	{
		return $this->db->insert('identitas_geotop', $data);
	}

	public function save_identitas_demo($data)
	{
		return $this->db->insert('identitas_demografi', $data);
	}

	public function save_aktivitas_desa($data)
	{
		return $this->db->insert('aktivitas_desa', $data);
	}
	
	public function save_dimeko($data)
	{
		return $this->db->insert('dimensi_ekologi', $data);
	}

	public function save_pendapatan_desa($data)
	{
		return $this->db->insert('pendapatan_desa', $data);
	}
}
