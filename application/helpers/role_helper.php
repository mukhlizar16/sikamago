<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_admin()
{
	if ($_SESSION['log-in'] == true) {
		if ($_SESSION['level-magang'] != 1) {
			return false;
		}
		return true;
	}
	return false;
}

function is_user()
{
	if (!empty($_SESSION['log-in'])) {
		if ($_SESSION['level'] == 1) {
			return false;
		}
		return true;
	}
	return false;
}


//function cek mahasiswa
function is_mhs()
{
	if ($_SESSION['log-in'] == true) {
		if ($_SESSION['level-magang'] == 5) {
			return true;
		}
		return false;
	}
	return false;
}

//function cek dosen
function is_PA()
{
	if ($_SESSION['log-in'] == true) {
		if ($_SESSION['level-magang'] == 2) {
			return true;
		}
		return false;
	}
	return false;
}

function is_PAR()
{
	if ($_SESSION['log-in'] == true) {
		if ($_SESSION['level-magang'] == 3) {
			return true;
		}
		return false;
	}
	return false;
}

function is_SPV()
{
	if (!empty($_SESSION['log-in'])) {
		if ($_SESSION['level-magang'] == 4) {
			return true;
		}
		return false;
	}
	return false;
}

function is_operator()
{
	if (!empty($_SESSION['log-in'])) {
		if ($_SESSION['level-magang'] == 7) {
			return true;
		}
		return false;
	}
	return false;
}


function status()
{
	switch ($_SESSION['level-magang']) {
		case 1:
			echo "Administrator";
			break;
		case 2:
			echo "Dosen Pembimbing Akademik";
			break;
		case 3:
			echo "Dosen Pembimbing Artikel Ilmiah";
			break;
		case 4:
			echo "Supervisor Mitra Magang";
			break;
		case 5:
			echo "Mahasiswa";
			break;
		case 6:
			echo "Stakeholder";
			break;
		default:
			echo "Operator";
	}
}


function cekFoto()
{
	$id = $_SESSION['id-magang'];
	$CI = get_instance();
	switch ($id) {
		case 1:
			$foto = 'user/avatar-5.jpg';
			break;
		case 2:
			$foto = 'avatar-2.jpg';
			break;
		default:
			$data = $CI->Profil_m->photo_check($id);
			$foto = $data['foto'];
	}
	return $foto;
}

function foto($id = null, $level = null)
{
	$ci =& get_instance();
	if ($id != null || $level != null) {
		if ($level == 3) {
			$cek = $ci->db->where('id', $id)->get('dosen')->row_array();
			if ($cek['foto'] == null) {
				return 'assets/img/avatar/avatar-1.png';
			}
			return 'assets/upload/foto/' . $cek['foto'];
		} else if ($level == 4) {
			$cek = $ci->db->where('id', $id)->get('tendik')->row_array();
			if ($cek['foto'] == null) {
				return 'assets/img/avatar/avatar-1.png';
			}
			return 'assets/upload/foto/' . $cek['foto'];
		} else {
			$cek = $ci->db->where('id', $id)->get('user')->row_array();
			if ($cek['foto'] == null) {
				return 'assets/img/avatar/avatar-1.png';
			}
			return 'assets/upload/foto/' . $cek['foto'];
		}
	}
	return 'assets/img/avatar/avatar-1.png';
}

/*
 * Fungsi pengecekan login
*/
function is_login()
{
	if (!empty($_SESSION['log-in'])) {
		return TRUE;
	}

	return FALSE;
}

function must_login()
{
	if (!is_login()) {
		redirect('magang/login', 'refresh');
	}
}

function get_indo_bulan($bln = '')
{
	$data = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	if (empty($bln)) {
		return $data;
	} else {
		$bln = (int)$bln;
		return isset($data[$bln]) ? $data[$bln] : "";
	}
}

function get_indo_hari($hari = '')
{
	$data = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
	if (empty($hari)) {
		return $data;
	} else {
		$hari = (int)$hari;
		return $data[$hari];
	}
}

function tgl_jam_indo($tgl_jam = '')
{
	if (!empty($tgl_jam)) {
		$pisah = explode(' ', $tgl_jam);
		return tgl_indo($pisah[0]) . ' ' . date('H:i', strtotime($tgl_jam));
	}
}

function tgl_indo($tgl = '')
{
	if (!empty($tgl)) {
		$pisah = explode('-', $tgl);
		return $pisah[2] . ' ' . get_indo_bulan($pisah[1]) . ' ' . $pisah[0];
	}
}

if (!function_exists('redirect_back')) {
	function redirect_back()
	{
		if (isset($_SERVER['HTTP_REFERER'])) {
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} else {
			header('Location: http://' . $_SERVER['SERVER_NAME']);
		}

		exit;
	}
}

if (!function_exists('check_user_login')) {
	function check_user_login()
	{
		if (is_admin()) {
			redirect('magang/admin', 'refresh');
		} else if (is_mhs()) {
			redirect('magang/mahasiswa', 'refresh');
		} else if (is_PA() || is_PAR()) {
			redirect('magang/dosen', 'refresh');
		} else if (is_SPV()) {
			redirect('magang/supervisor', 'refresh');
		} else if (is_operator()) {
			redirect('magang/operator', 'refresh');
		} else {
			redirect('magang/login', 'refresh');
		}
	}
}

function belum_aktif($id = '')
{
	$ci = get_instance();
	$count = $ci->db->where(['is_approve' => 0, 'level' => $id])->get('user');
	return $count->num_rows();
}

function jumlah_user($id = '')
{
	$ci = get_instance();
	$count = $ci->db->where('level', $id)->get('user');
	return $count->num_rows();
}

function iso8601($datetime)
{
	return date(DateTime::ISO8601, strtotime($datetime));
}

function id_mhs()
{
	$id_user = $_SESSION['id-magang'];
	$ci = get_instance();
	$cek = $ci->db->get_where('mahasiswa', ['user_id' => $id_user])->row_array();
	if (empty($cek)){
		return null;
	}else{
		return $cek['id'];
	}
}

function id_dosen()
{
	$id_user = $_SESSION['id-magang'];
	$ci = get_instance();
	$cek = $ci->db->get_where('dosen', ['user_id' => $id_user])->row_array();
	return $cek['id'];
}

function cek_lingkup()
{
	if (id_mhs() == null){
		return 0;
	}else{
		$id = id_mhs();
		$ci = get_instance();
		$cek = $ci->db->get_where('pilihan_magang', ['mhs_id' => $id])->row_array();
		return $cek['lingkup_id'];
	}
}

function cek_bidang()
{
	$id = id_mhs();
	$ci = get_instance();
	$cek = $ci->db->get_where('pilihan_magang', ['mhs_id' => $id])->row_array();
	return $cek['bidang_id'];
}

function cek_prodi()
{
	$id = id_mhs();
	$ci = get_instance();
	$cek = $ci->db->select('p.id as id_prodi')
		->from('mahasiswa as m')
		->join('prodi as p', 'p.id = m.prodi_id', 'left')
		->where('m.id', $id)
		->get()->row_array();
	return $cek['id_prodi'];
}

// pengaturan tampilan last login
// model 1
if (!function_exists('time_ago')) {
	function time_ago($timestamp)
	{
		$time_ago = strtotime($timestamp);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;

		$minutes = round($seconds / 60); // value 60 is seconds
		$hours = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
		$days = round($seconds / 86400); //86400 = 24 * 60 * 60;
		$weeks = round($seconds / 604800); // 7*24*60*60;
		$months = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
		$years = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {

			return "<b>Baru saja</b>";

		} else if ($minutes <= 60) {

			if ($minutes == 1) {

				return "<b>Semenit</b> yang lalu";

			} else {

				return "<b>$minutes</b> Menit yang lalu";

			}

		} else if ($hours <= 24) {

			if ($hours == 1) {

				return "<b>Sejam</b> yang lalu";

			} else {

				return "<b>$hours</b> Jam yang lalu";

			}

		} else if ($days <= 7) {

			if ($days == 1) {

				return "<b>Kemarin</b>";

			} else {

				return "<b>$days</b> Hari yang lalu";

			}

		} else if ($weeks <= 4.3) {

			if ($weeks == 1) {

				return "<b>Seminggu</b> yang lalu";

			} else {

				return "<b>$weeks</b> Minggu yang lalu";

			}

		} else if ($months <= 12) {

			if ($months == 1) {

				return "<b>Sebulan</b> yang lalu";

			} else {

				return "<b>$months</b> Bulan yang lalu";

			}

		} else {

			if ($years == 1) {

				return "<b>Setahun</b> yang lalu";

			} else {

				return "<b>$years</b> Tahun yang lalu";

			}
		}
	}
}

// model 2
if (!function_exists('time_elapsed_string')) {
	function time_elapsed_string($datetime, $full = false)
	{
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'Tahun',
			'm' => 'Bulan',
			'w' => 'Minggu',
			'd' => 'Hari',
			'h' => 'Jam',
			'i' => 'Menit',
			's' => 'Detik',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = '<b>' . $diff->$k . '</b>' . ' ' . $v /*. ($diff->$k > 1 ? 's' : '')*/
				;
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
	}
}

// fungsi lama login
if (!function_exists('login_log')) {
	function login_log()
	{
		$id = $_SESSION['id-magang'];
		$ci = get_instance();
		$query = $ci->db->where('user_id', $id)
			->where('online', 1)
			->get('login_log')->row_array();
		$masuk = $query['last_login'];
		return time_ago($masuk);
	}
}


//=========================================================================================
/*
 *	KKN punya barang
*/

function must_login_kkn()
{
	if (!is_login()) {
		redirect('kkn/auth/login', 'refresh');
	}
}

function is_dosen()
{
	if (!empty(is_login())) {
		if ($_SESSION['level'] == 2) {
			return true;
		}
		return false;
	}
	return false;
}

function is_mahasiswa()
{
	if (!empty(is_login())) {
		if ($_SESSION['level'] == 3) {
			return true;
		}
		return false;
	}
	return false;
}

function cek_label()
{
	$level = $_SESSION['level'];
	if ($level == 2) {
		return 'Dosen';
	} elseif ($level == 3) {
		return 'Mahasiswa';
	} else {
		return 'Administrator';
	}
}

function is_admin_kkn()
{
	if ($_SESSION['log-in'] == true) {
		if ($_SESSION['level'] != 1) {
			return false;
		}
		return true;
	}
	return false;
}
