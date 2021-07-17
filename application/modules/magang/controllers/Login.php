<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_m');
	}

	public function index()
	{
		if (is_login() == true) {
			redirect('magang/switch_page', 'refresh');
		}

		$data['title'] = 'Login';
		$this->load->view('loginpage', $data, false);
	}

	public function masuk()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
				'required' => '%s wajib diisi',
				'valid_email' => '%s harus valid'
			]);
			$this->form_validation->set_rules('password', 'Password', 'trim|required', [
				'required' => '%s wajib diisi'
			]);

			if ($this->form_validation->run() == false) {
				$arr_data = [
					'status' => 'Error',
					'pesan' => validation_errors()
				];
			} else {
				$email = $this->input->post('email');
				$userpass = $this->input->post('password');
				$cek_email = $this->Login_m->email_check($email);
				if ($cek_email->num_rows() > 0) {
					foreach ($cek_email->result_array() as $c) {
						$pass = $c['password'];
						if (password_verify($userpass, $pass)) {
							$status = $c['is_approve'];
							if ($status == 0) {
								$arr_data = [
									'status' => 'belum_aktif',
									'pesan' => 'Maaf! Akun anda belum diaktivasi, hubungi admin/operator ...'
								];
							} else {
								// create session data
								$data = array(
									'id-magang' => $c['id'],
									'napan' => $c['napan'],
									'nabel' => $c['nabel'],
									'level-magang' => $c['level'],
									'log-in' => true
								);

								// create history login
								$cek_login_log = $this->Login_m->check_login_log($data['id-magang'])->row_array();
								if (empty($cek_login_log)) {
									$insert = [
										'user_id' => $data['id-magang'],
										'online' => 1,
										'last_login' => date('Y-m-d H:i:s'),
										'last_active' => date('Y-m-d H:i:s')
									];
									$this->Login_m->insert_login_log($insert);
								} else {
									$idu = $data['id-magang'];
									$update = [
										'online' => 1,
										'last_login' => date('Y-m-d H:i:s')
									];
									$this->Login_m->update_login_log($idu, $update);
								}

								$this->session->set_userdata($data);
								$arr_data = [
									'status' => 'sukses',
									'pesan' => 'Selamat datang ...',
									'alamat' => config_item('base_url') . 'magang/switch_page',
								];
							}
						} else {
							$arr_data = [
								'status' => 'error_pass',
								'pesan' => 'Password salah ...'
							];
						}
					}
				} else {
					$arr_data = [
						'status' => 'no-email',
						'pesan' => 'Email anda tidak terdaftar'
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	public function reset_password()
	{
		$data = [
			'title' => 'Sikamago - Reset Password'
		];

		$this->load->view('auth-reset', $data, false);
	}

	public function cek_email()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email', [
				'required' => '%s wajib diisi',
				'valid_email' => '%s harus valid'
			]);

			if ($this->form_validation->run() == false) {
				$arr_data = [
					'status' => 'error',
					'pesan' => strip_tags(validation_errors())
				];
			} else {
				$email = $this->security->xss_clean($this->input->post('email'));

				$cek = $this->Login_m->email_check($email);

				if ($cek->num_rows() > 0) {
					$res = $cek->row_array();
					$id = $this->encryption->encrypt($res['id']);
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Klik untuk berpindah halaman ...',
						'url' => config_item('base_url') . 'login/change_pass/' . $id
					];
				} else {
					$arr_data = [
						'status' => 'gagal',
						'pesan' => 'Email anda tidak terdaftar / salah ...',
						'url' => ''
					];
				}
			}
			echo json_encode($arr_data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function change_pass($id)
	{
		$data = [
			'title' => 'Sikamago - Ganti Password'
		];
		$i = $this->uri->segment(3);
		$id = $this->encryption->decrypt($i);
		$data['id'] = $id;

		$this->load->view('auth-change', $data, false);
	}

	public function update_password()
	{
		$this->form_validation->set_rules('new_pass', 'Password baru', 'required|min_length[6]', [
			'required' => '%s wajib diisi',
			'min_length' => '%s minimal 6 karakter'
		]);
		$this->form_validation->set_rules('new_confirm_pass', 'Konfirmasi password', 'matches[new_pass]', [
			'matches' => '%s, tidak cocok'
		]);

		if ($this->form_validation->run() == false) {
			$arr_data = [
				'status' => 'error',
				'pesan' => strip_tags(validation_errors()),
				'url' => ''
			];
		} else {
			$arr_data = [
				'status' => 'sukses',
				'pesan' => 'Terima kasih sudah mencoba, halaman ini sedang disiapkan',
				'url' => config_item('base_url') . 'login'
			];
		}
		echo json_encode($arr_data);
	}

	public function logout()
	{
		$id = $_SESSION['id'];
		$val = [
			'online' => 0,
			'last_active' => date('Y-m-d H:i:s')
		];
		$this->Login_m->update_login_log($id, $val);
		$this->session->sess_destroy();
		redirect('magang/login');
	}
}
