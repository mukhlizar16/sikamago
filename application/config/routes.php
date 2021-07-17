<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'error_page';
$route['translate_uri_dashes'] = FALSE;


/*
 * routing for login
 *
*/
$route['magang/login'] = 'magang/login';
$route['magang/login/masuk'] = 'magang/login/masuk';
$route['magang/login/logout'] = 'magang/login/logout';


/*
 * routing for Magang
 * Disini semua controller dideklarasikan
*/

/*
 * routing for register
*/
$route['magang/register'] = 'magang/register';
$route['magang/register/simpan'] = 'magang/register/simpan';

/*
 * routing for Admin
*/
$route['admin'] = 'magang/admin';
$route['admin/profil'] = 'magang/admin/profil';
$route['admin/fokus_kegiatan'] = 'magang/admin/fokus_kegiatan';
$route['admin/fakultas'] = 'magang/admin/fakultas';
$route['admin/prodi'] = 'magang/admin/prodi';
$route['admin/bimbingan'] = 'magang/admin/bimbingan';
$route['admin/print'] = 'magang/admin/print';
$route['admin/approve_dosen'] = 'magang/admin/approve_dosen';
$route['admin/show_mahasiswa'] = 'magang/admin/show_mahasiswa';
$route['admin/dosen_dpl'] = 'magang/admin/dosen_dpl';
$route['admin/dosen_par'] = 'magang/admin/dosen_par';
$route['admin/supervisor'] = 'magang/admin/supervisor';
$route['admin/operator'] = 'magang/admin/operator';
$route['admin/penugasan'] = 'magang/admin/penugasan';
$route['admin/hapus_penugasan'] = 'magang/admin/hapus_penugasan';
$route['admin/get_bimtable'] = 'magang/admin/get_bimtable';
$route['admin/get_bimtable2'] = 'magang/admin/get_bimtable2';
$route['admin/get_bimtable3'] = 'magang/admin/get_bimtable3';
$route['admin/magang_mahasiswa'] = 'magang/admin/magang_mahasiswa';
$route['admin/pengumuman'] = 'magang/admin/pengumuman';
$route['admin/add_pengumuman'] = 'magang/admin/add_pengumuman';
$route['admin/show_location'] = 'magang/admin/show_location';
$route['admin/list_lokasi'] = 'magang/admin/list_lokasi';
$route['admin/grafik'] = 'magang/admin/grafik';
$route['admin/create_graph'] = 'magang/admin/create_graph';

/*
 * Pesan controller
*/
$route['magang/pesan'] = 'magang/pesan';

/*
 * routing profil
*/
$route['magang/profil'] = 'magang/profil';

/*
 * routing for switch
*/
$route['magang/switch_page'] = 'magang/switch_page';

/*
 * routing mahasiswa
*/
$route['mahasiswa'] = 'magang/mahasiswa';
$route['mahasiswa/profil'] = 'magang/mahasiswa/profil';
$route['mahasiswa/provinsi'] = 'magang/mahasiswa/provinsi';
$route['mahasiswa/kota'] = 'magang/mahasiswa/kota';
$route['mahasiswa/kecamatan'] = 'magang/mahasiswa/kecamatan';
$route['mahasiswa/kelurahan'] = 'magang/mahasiswa/kelurahan';
$route['mahasiswa/show_lokasi_magang'] = 'magang/mahasiswa/show_lokasi_magang';
$route['mahasiswa/show_bidang_magang'] = 'magang/mahasiswa/show_bidang_magang';
$route['mahasiswa/update_profil_C1'] = 'magang/mahasiswa/update_profil_C1';
$route['mahasiswa/update_profil_C2'] = 'magang/mahasiswa/update_profil_C2';
$route['mahasiswa/update_foto'] = 'magang/mahasiswa/update_foto';
$route['mahasiswa/simpan_data_magang'] = 'magang/mahasiswa/simpan_data_magang';
$route['mahasiswa/pesan'] = 'magang/mahasiswa/pesan';
$route['mahasiswa/get_penerima'] = 'magang/mahasiswa/get_penerima';
$route['mahasiswa/detail_pesan'] = 'magang/mahasiswa/detail_pesan';
$route['mahasiswa/balas_pesan'] = 'magang/mahasiswa/balas_pesan';
$route['mahasiswa/hapus_pesan'] = 'magang/mahasiswa/hapus_pesan';
$route['mahasiswa/kirim'] = 'magang/mahasiswa/kirim';
$route['mahasiswa/sudah_baca'] = 'magang/mahasiswa/sudah_baca';
$route['mahasiswa/kegiatan'] = 'magang/mahasiswa/kegiatan';
$route['mahasiswa/tambah_kegiatan'] = 'magang/mahasiswa/tambah_kegiatan';
$route['mahasiswa/hapus_kegiatan'] = 'magang/mahasiswa/hapus_kegiatan';
$route['mahasiswa/laporan'] = 'magang/mahasiswa/laporan';
$route['mahasiswa/tambah_laporan'] = 'magang/mahasiswa/tambah_laporan';
$route['mahasiswa/hapus_laporan'] = 'magang/mahasiswa/hapus_laporan';
$route['mahasiswa/upload_berkas'] = 'magang/mahasiswa/upload_berkas';
$route['mahasiswa/tambah_artikel'] = 'magang/mahasiswa/tambah_artikel';
$route['mahasiswa/hapus_artikel'] = 'magang/mahasiswa/hapus_artikel';
$route['mahasiswa/data_demografi'] = 'magang/mahasiswa/data_demografi';
$route['mahasiswa/tambah_data_kesehatan'] = 'magang/mahasiswa/tambah_data_kesehatan';
$route['mahasiswa/tambah_data_perikanan'] = 'magang/mahasiswa/tambah_data_perikanan';
$route['mahasiswa/tambah_data_sosial'] = 'magang/mahasiswa/tambah_data_sosial';
$route['mahasiswa/tambah_data_ekonomi'] = 'magang/mahasiswa/tambah_data_ekonomi';
$route['mahasiswa/tambah_data_pertanian'] = 'magang/mahasiswa/tambah_data_pertanian';
$route['mahasiswa/data_geotop'] = 'magang/mahasiswa/data_geotop';
$route['mahasiswa/tambah_identitas_kecamatan'] = 'magang/mahasiswa/tambah_identitas_kecamatan';
$route['mahasiswa/tambah_identitas_desa'] = 'magang/mahasiswa/tambah_identitas_desa';
$route['mahasiswa/tambah_identitas_geotop'] = 'magang/mahasiswa/tambah_identitas_geotop';
$route['mahasiswa/tambah_iden_demo'] = 'magang/mahasiswa/tambah_iden_demo';
$route['mahasiswa/tambah_dimsos_kesehatan'] = 'magang/mahasiswa/tambah_dimsos_kesehatan';
$route['mahasiswa/tambah_dimsos_pendidikan'] = 'magang/mahasiswa/tambah_dimsos_pendidikan';
$route['mahasiswa/tambah_dim_sos'] = 'magang/mahasiswa/tambah_dim_sos';
$route['mahasiswa/tambah_dim_mukim'] = 'magang/mahasiswa/tambah_dim_mukim';
$route['mahasiswa/tambah_dimensi_ekonomi'] = 'magang/mahasiswa/tambah_dimensi_ekonomi';
$route['mahasiswa/tambah_dimeko'] = 'magang/mahasiswa/tambah_dimeko';
$route['mahasiswa/tambah_aktivitas_desa'] = 'magang/mahasiswa/tambah_aktivitas_desa';
$route['mahasiswa/tambah_pendes'] = 'magang/mahasiswa/tambah_pendes';
$route['mahasiswa/bantuan'] = 'magang/mahasiswa/bantuan';

/*
 * routing dosen
*/
$route['dosen'] = 'magang/dosen';
$route['dosen/pesan'] = 'magang/dosen/pesan';
$route['dosen/get_penerimaMhs'] = 'magang/dosen/get_penerimaMhs';
$route['dosen/kirim'] = 'magang/dosen/kirim';
$route['dosen/detail_pesan/:num'] = 'magang/dosen/detail_pesan/:num';
$route['dosen/balas_pesan'] = 'magang/dosen/balas_pesan';
$route['dosen/detail_pesan/sudah_baca'] = 'magang/dosen/sudah_baca';
$route['magang/dosen/pa/profil'] = 'magang/dosen/profil_pa';
$route['magang/dosen/par/profil'] = 'magang/dosen/profil_par';
$route['magang/dosen/update_profil_pa_C1'] = 'magang/dosen/update_profil_pa_C1';
$route['magang/dosen/update_profil_pa_C2'] = 'magang/dosen/update_profil_pa_C2';
$route['magang/dosen/pa/ubah_password'] = 'magang/dosen/ubah_password';
$route['dosen/update_foto_pa'] = 'magang/dosen/update_foto_pa';
$route['dosen/kegiatan'] = 'magang/dosen/kegiatan';
$route['dosen/tambah_kegiatan'] = 'magang/dosen/tambah_kegiatan';
$route['dosen/hapus_kegiatan'] = 'magang/dosen/hapus_kegiatan';
$route['dosen/bimbingan'] = 'magang/dosen/bimbingan';
$route['dosen/tambah_bimbingan'] = 'magang/dosen/tambah_bimbingan';
$route['dosen/hapus_bimbingan'] = 'magang/dosen/hapus_bimbingan';
$route['dosen/approve'] = 'magang/dosen/approve';
$route['magang/dosen/detail_log_mahasiswa/:num'] = 'magang/dosen/detail_log_mahasiswa/:num';
$route['dosen/laporan'] = 'magang/dosen/laporan';
$route['magang/dosen/detail_log_mahasiswa/setujui'] = 'magang/dosen/setujui';
$route['dosen/tambah_lap'] = 'magang/dosen/tambah_lap';

/*
 * Routing Supervisor
*/
$route['magang/supervisor'] = 'magang/supervisor';
$route['magang/supervisor/detail_log_mahasiswa/setujui'] = 'magang/supervisor/setujui';



//===================================================================
/*
 * routing for KKN
 * disini semua controller kkn dideklarasikan
 *
*/
$route['kkn/auth'] = 'kkn/auth';
$route['kkn/auth/login'] = 'kkn/auth/login';
$route['kkn/auth/login/process'] = 'kkn/auth/process';
$route['kkn/auth/register'] = 'kkn/auth/register';
$route['kkn/auth/register/store'] = 'kkn/auth/store';
$route['kkn/auth/lihat'] = 'kkn/auth/lihat';
$route['kkn/auth/verify/:any'] = 'kkn/auth/verify';
$route['kkn/auth/logout'] = 'kkn/auth/logout';

/*
 * Routing for dashboard
*/
$route['kkn/dashboard'] = 'kkn/dashboard';


/*
 * Routing for mahasiswa
*/
$route['kkn/mahasiswa'] = 'kkn/mahasiswa';
/*$route['kkn/mahasiswa/upload_doc_satu'] = 'kkn/mahasiswa/upload_doc_satu';*/

/*
 * routing for admin
*/
$route['kkn/auth/admin'] = 'kkn/auth/admin';
$route['kkn/auth/admin/login'] = 'kkn/auth/login_admin';
$route['kkn/admin/mahasiswa'] = 'kkn/admin/list_mahasiswa';

$route['kkn/admin/lihat/:num/:any'] = 'kkn/admin/lihat_file';


