<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
	var $order_column = array(null, 'nm_dosen', 'nm_mhs', null);

	public function show_user_aktif()
	{
		$this->db->select('*, l.last_login as masuk');
		$this->db->from('login_log as l');
		$this->db->join('user as u', 'u.id = l.user_id', 'left');
		$this->db->where('online', 1);
		$this->db->order_by('l.last_login', 'DESC');
		return $this->db->get();
	}

	public function showdata($id)
	{
		return $this->db->get_where('user', ['id' => $id]);
	}

	public function getData_DosenJoin($id)
	{
		$this->db->select('u.id as id, u.napan as napan, u.nabel as nabel, u.level as level, d.nama_lembaga as lembaga');
		$this->db->from('user as u');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->where('u.level', $id);
		$this->db->where('u.id NOT IN (select dosen_id from bimbingan)', NULL, FALSE);
		return $this->db->get();
	}

	public function getData_MhsJoin($id)
	{
		return $this->db->get_where('user', ['level' => $id]);
	}

	public function save_bimbingan($data)
	{
		return $this->db->insert('bimbingan', $data);
	}

	public function fecth_Bimtable($i)
	{
		$this->db->select('b.id as id, u.napan as nm_dosen, u.nabel as nm_dosen2, r.napan as nm_mhs,
						r.nabel as nm_mhs2, u.id as id_user, d.nama_lembaga as lembaga');
		$this->db->from('bimbingan as b');
		$this->db->join('dosen as d', 'd.id = b.dosen_id', 'left');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = d.user_id', 'left');
		$this->db->join('user as r', 'r.id = m.user_id', 'left');
		$this->db->where('b.jenis_bimbingan_id', $i);
		return $this->db->get();
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

		if (isset($_POST['search']['value'])) {
			$this->db->like('r.napan', $_POST['search']['value']);
			$this->db->or_like('u.napan', $_POST['search']['value']);
		}
		if (isset($_POST['order'])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id', 'ASC');
		}
	}

	public function make_datatable()
	{
		$this->make_query();
		if ($_POST['length'] != -1) {
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

	public function delete_penugasan($id)
	{
		return $this->db->delete('bimbingan', ['id' => $id]);
	}

	// chapter operator
	public function get_operator($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	public function add_operator($data)
	{
		return $this->db->insert('user', $data);
	}

	public function search_data($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user');
	}

	public function updata_operatorData($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	// chapter list mahasiswa
	public function get_list_mahasiswa($level, $is_approve)
	{
		$this->db->select('u.*, p.nama_prodi as prodi');
		$this->db->from('user as u');
		$this->db->join('mahasiswa as m', 'm.user_id = u.id', 'left');
		$this->db->join('prodi as p', 'p.id = m.prodi_id', 'left');
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get();
	}

	public function hapus_mhsData($id)
	{
		return $this->db->delete('user', ['id' => $id]);
	}

	public function get_list_dpl($level, $is_approve)
	{
		$this->db->select('u.napan as napan, u.nabel as nabel, u.email as email, u.is_approve as aktif,
							d.foto as foto, u.created_at as tgl, u.id as id');
		$this->db->from('user as u');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->where('u.level', $level);
		$this->db->where('u.is_approve', $is_approve);
		$this->db->order_by('u.napan', 'ASC');
		return $this->db->get();
	}

	public function get_list_par($level, $is_approve)
	{
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get('user');
	}

	public function get_list_spv($level, $is_approve)
	{
		$this->db->select('*, u.id as id, u.created_at as tgl, d.nama_lembaga as lembaga');
		$this->db->from('user as u');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->where('level', $level);
		$this->db->where('is_approve', $is_approve);
		return $this->db->get();
	}

	public function delete_supervisorData($id)
	{
		return $this->db->delete('user', ['id' => $id]);
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

	public function get_fakultas()
	{
		return $this->db->get('fakultas');
	}

	public function get_prodi()
	{
		$this->db->select('p.id as id, p.nama_prodi as nama_prodi, f.nama_fak as fakultas, p.created_at as tgl');
		$this->db->from('prodi as p');
		$this->db->join('fakultas as f', 'f.id = p.fak_id', 'left');
		return $this->db->get();
	}

	public function get_id_mhs()
	{
		$this->db->select('u.napan as napan_mhs, u.nabel as nabel_mhs, b.mhs_id as id, 
							b.jenis_bimbingan_id as jenis');
		$this->db->from('bimbingan as b');
		$this->db->join('mahasiswa as m', 'm.id = b.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->order_by('b.mhs_id', 'ASC');
		$this->db->group_by('b.mhs_id');
		return $this->db->get();
	}

	public function get_list_bimbingan()
	{
		$hasil = $this->db->query('
			SELECT b.id, (SELECT CONCAT(napan, " ", nabel) 
					FROM user
					LEFT JOIN mahasiswa ON mahasiswa.user_id = user.id		
					where mahasiswa.id=b.mhs_id) AS nama_mhs,
			    
			       /* menampilkan nama lengkap dosen */
			       	GROUP_CONCAT((SELECT CONCAT(napan, " ", nabel) FROM user
						LEFT JOIN dosen ON dosen.user_id = user.id
						where dosen.id=b.dosen_id) SEPARATOR "#") AS nama_dosen,
			       /* menampilkan jenis bimbingan */
			       	GROUP_CONCAT((SELECT nama_bimbingan FROM tipe_bimbingan
			       		where id=b.jenis_bimbingan_id) SEPARATOR "#") AS nama_jenis 
			FROM bimbingan b 
			GROUP BY b.mhs_id
			ORDER BY b.mhs_id
		');
		return $hasil;
	}

	public function get_super()
	{
		$hasil = $this->db->query('
			WITH DataMahasiswa AS ( SELECT m.id, CONCAT(u.napan, " ", u.nabel) AS nama_mahasiswa, m.prodi_id 
			FROM mahasiswa m JOIN user u ON m.user_id = u.id ), DataDosen AS ( SELECT d.id, CONCAT(u.napan, " ",u.nabel) AS nama_dosen,
			d.nama_lembaga FROM dosen d JOIN user u ON d.user_id = u.id ), DataNamaBimbingan AS ( SELECT b.id, m.id AS mhs_id,
			m.nama_mahasiswa, m.prodi_id, d.id AS dosen_id, d.nama_dosen, d.nama_lembaga, b.jenis_bimbingan_id, t.nama_bimbingan
			FROM bimbingan b JOIN DataDosen d ON b.dosen_id = d.id JOIN DataMahasiswa m ON b.mhs_id = m.id JOIN tipe_bimbingan t 
			ON b.jenis_bimbingan_id = t.id ), DataBimbinganPivot AS ( SELECT mhs_id, prodi_id, nama_mahasiswa, 
			MAX(CASE WHEN jenis_bimbingan_id = 1 THEN nama_dosen END) "dosen_pa", MAX(CASE WHEN jenis_bimbingan_id = 2 THEN nama_dosen END) "dosen_ps", 
			MAX(CASE WHEN jenis_bimbingan_id = 3 THEN nama_dosen END) "dosen_spv" FROM DataNamaBimbingan GROUP BY mhs_id, prodi_id, nama_mahasiswa ) 
			SELECT r.nama_mahasiswa, r.dosen_pa, r.dosen_ps, r.dosen_spv FROM Databimbinganpivot r;
		');
		return $hasil;
	}

	public function get_fokus()
	{
		$this->db->select(' *,f.nama_kegiatan as kegiatan, p.nama_prodi as prodi, r.nama as lingkup,
							f.bidang_id as bidang, f.bagian as peminatan');
		$this->db->from('fokus_kegiatan as f');
		$this->db->join('ruang_lingkup as r', 'r.id = f.lingkup_id', 'left');
		$this->db->join('prodi as p', 'p.id = f.prodi_id', 'left');
		$this->db->order_by('f.bidang_id', 'ASC');
		return $this->db->get();
	}

	public function get_tahun()
	{
		$this->db->select('tahun, id');
		$this->db->from('demografi_ekonomi');
		$this->db->group_by('tahun');
		$this->db->order_by('tahun', 'DESC');
		return $this->db->get();
	}

	public function get_graph($year)
	{
		$this->db->select('d.tahun as tahun, d.pendapatan_avg as pendapatan, b.nama_bulan as bulan');
		$this->db->from('demografi_ekonomi as d');
		$this->db->join('bulan as b', 'b.id = d.bulan');
		$this->db->where('tahun', $year);
		$this->db->order_by('tahun', 'ASC');
		return $this->db->get();
	}

	public function show_spv_data($id)
	{
		$this->db->select('*, u.id as id, u.napan as napan, u.nabel as nabel, u.email as email, u.is_approve as is_approve,
							l.nama_level as level, d.foto as foto, d.nama_lembaga as lembaga');
		$this->db->from('user as u');
		$this->db->join('level as l', 'l.id = u.level', 'left');
		$this->db->join('dosen as d', 'd.user_id = u.id', 'left');
		$this->db->where('u.id', $id);
		return $this->db->get();
	}

	public function update_spv_data($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function get_data_magang($id_prodi)
	{
		$this->db->select("u.napan as napan, m.nim as nim, u.nabel as nabel, d.nama_prodi as prodi,
							p.lokasi_id as lokasi, p.lokasi_lain as lokasi_lain");
		$this->db->from('pilihan_magang as p');
		$this->db->join('mahasiswa as m', 'm.id = p.mhs_id', 'left');
		$this->db->join('user as u', 'u.id = m.user_id', 'left');
		$this->db->join('prodi as d', 'd.id = m.prodi_id', 'left');
		$this->db->where('m.prodi_id', $id_prodi);
		return $this->db->get();
	}

	public function get_approve_data()
	{
		$result = $this->db->query('
		WITH data_dosen AS ( SELECT d.id, IF ( STRCMP(u.napan, u.nabel) = 0, 
		u.napan, CONCAT(u.napan, " ", u.nabel) ) AS nama_dosen 
		FROM dosen d JOIN user u ON d.user_id = u.id ), 
		data_mahasiswa AS ( SELECT m.id, IF ( STRCMP(u.napan, u.nabel) = 0, 
		u.napan, CONCAT(u.napan, " ", u.nabel) ) AS nama_mahasiswa 
		FROM mahasiswa m JOIN user u ON m.user_id = u.id ), 
		data_bimbingan AS ( SELECT b.id, b.dosen_id, dd.nama_dosen, b.mhs_id, 
		dm.nama_mahasiswa, b.jenis_bimbingan_id FROM bimbingan b JOIN data_dosen dd 
		ON b.dosen_id = dd.id JOIN data_mahasiswa dm ON b.mhs_id = dm.id 
		WHERE b.jenis_bimbingan_id = 1 ), data_log_bimbingan 
		AS ( SELECT db.mhs_id, db.nama_mahasiswa, COUNT(l.uraian) AS jumlah_log_bimbingan 
		FROM data_bimbingan db JOIN log l ON db.mhs_id = l.mhs_id GROUP BY l.mhs_id ), 
		data_approval AS ( SELECT db.dosen_id, db.nama_dosen, db.mhs_id, db.nama_mahasiswa, 
		COUNT(l.status) AS jumlah_approve FROM data_bimbingan db JOIN log l ON db.mhs_id = l.mhs_id 
		WHERE l.status = 1 GROUP BY l.mhs_id ) SELECT da.nama_dosen, da.nama_mahasiswa, 
		da.jumlah_approve, dl.jumlah_log_bimbingan FROM data_approval da JOIN data_log_bimbingan dl 
		ON da.mhs_id = dl.mhs_id ORDER BY da.nama_dosen ASC
		');

		return $result;
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
}
