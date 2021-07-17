<?php defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		if (is_login() == true){
			redirect('kkn/dashboard');
		}
		$data = [
			'title' => 'Sikamago - KKN'
		];
		$this->load->view('kkn-page', $data, false);
	}

	public function login()
	{
		if (is_login() == true){
			redirect('kkn/dashboard');
		}
		$data = [
			'title' => 'Sikamago - Login KKN'
		];

		$this->load->view('authkkn/login-page', $data, false);
	}

	public function process()
	{
		$this->rules();
		if ($this->form_validation->run() == false) {
			$arr_data = [
				'status' => 'error',
				'email' => strip_tags(form_error('email')),
				'password' => strip_tags(form_error('password')),
			];
		} else {
			$email = $this->input->post('email');
			$userpass = $this->input->post('password');
			$cek_email = $this->Auth_model->check_user($email);
			if ($cek_email->num_rows() > 0) {
				foreach ($cek_email->result_array() as $c) {
					$pass = $c['password'];
					if (password_verify($userpass, $pass)) {
						$status = $c['is_active'];
						if ($status == 0) {
							$arr_data = [
								'status' => 'belum_aktif',
								'pesan' => 'Maaf! Akun belum aktif, cek kembali kotak masuk email anda ...'
							];
						} else {
							// create session data
							$data = array(
								'id' => $c['id'],
								'nama' => $c['nama'],
								'email' => $c['email'],
								'prodi' => $c['prodi_id'],
								'level' => $c['level_id'],
								'gender' => $c['gender_id'],
								'log-in' => 'true'
							);

							$this->session->set_userdata($data);

							$arr_data = [
								'status' => 'sukses',
								'pesan' => 'Selamat datang ...',
								'alamat' => config_item('base_url') . 'kkn/dashboard'
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
	}

	/*Methode for register*/
	public function register()
	{
		// cek status registrasi
		$id = 1;
		$cek = $this->Auth_model->cek_status($id)->row_array();
		$result = $cek['is_open'];

		if ($result == 0){
			$this->load->view('close-page');
		}else{
			$data = [
				'title' => 'KKN - Register',
				'prodi' => $this->Auth_model->get_prodi()
			];

			$this->load->view('authkkn/register-page', $data, false);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean|required', [
			'required' => '%s wajib diisi'
		]);
		$this->form_validation->set_rules('nim', 'NIM', 'trim|xss_clean|required|is_unique_dua[user.nim]', [
			'required' => '%s wajib diisi',
			'valid_email' => '%s tidak valid',
			'is_unique_dua' => '%s telah terdaftar, silahkan pilih yang lain'
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|is_unique_dua[user.email]', [
			'required' => '%s wajib diisi',
			'valid_email' => '%s tidak valid',
			'is_unique_dua' => '%s telah terdaftar, silahkan pilih yang lain'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]', [
			'required' => '%s wajib diisi',
			'min_length' => '%s minimal 6 karakter',
		]);
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'trim|xss_clean|matches[password]', [
			'matches' => '%s tidak sama',
		]);
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|xss_clean|required', [
			'required' => '%s belum dipilih'
		]);
		$this->form_validation->set_rules('prodi', 'Program Studi', 'trim|xss_clean|required', [
			'required' => '%s belum dipilih'
		]);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('status', '<div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        Periksa kembali data isian anda
                      </div>
                    </div>');


			$this->register();

		} else {
			$tokennya = urlencode($this->encrypt->encode($_POST['email']));
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama'), true),
				'nim' => htmlspecialchars($this->input->post('nim'), true),
				'email' => htmlspecialchars($this->input->post('email'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'gender_id' => htmlspecialchars($this->input->post('gender'), true),
				'prodi_id' => htmlspecialchars($this->input->post('prodi'), true),
				'token' => $tokennya,
				'level_id' => 3,
				'is_active' => 0,
				'tgl' => date('Y-m-d H:i:s')
			];

			$clean = $this->security->xss_clean($data);

			$simpan = $this->Auth_model->store_data($clean);

			if ($simpan) {
				// data dikirim ke email
				$nama = $_POST['nama'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$token = $tokennya;

				$this->send_email($nama, $email, $password, $token);
			}else{
				$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        Data tidak dapat disimpan, hubungi Administrator
                      </div>
                    </div>');

				$this->register();
			}
		}
	}

	public function send_email($nama, $email, $password, $token)
	{
		$mail = new PHPMailer(true);

		//Server settings
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'sikamago.utu@gmail.com';
		$mail->Password = 'sikamago1234';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$mail->SMTPAutoTLS = true;
		$mail->Port = 587;

		//Recipients
		$mail->setFrom('info@sikamago.lppm-utu-ac.id', 'Admin');
		$mail->addAddress($email);     //Add a recipient
		$mail->addReplyTo('sikamago.utu@gmail.com', 'Information Registration');
		/*$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');*/

		// data
		$data = [
			'token' => $token,
			'email' => $email,
			'nama' => $nama,
			'password' => $password
		];

		// content
		$mail->isHTML(true);
		$mail->Subject = "Email Verification";
		$body = $this->load->view('email/email-page', $data, true);

		$mail->Body = $body;
		$kirim = $mail->send();
		if ($kirim) {
			$this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissible alert-has-icon">
														<div class="alert-icon"><i class="far fa-check-circle"></i></div>
														<div class="alert-body"><button class="close" data-dismiss="alert">
														<span>&times;</span></button>
														<div class="alert-title">Selamat !</div>Akun berhasil dibuat. Silahkan cek email untuk verifikasi akun</div></div>');
		}else{
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible alert-has-icon">
														<div class="alert-icon"><i class="far lightbulb"></i></div>
														<div class="alert-body"><button class="close" data-dismiss="alert">
														<span>&times;</span></button>
														<div class="alert-title">Error !</div>Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div></div>');
		}
			redirect('kkn/auth/register');
	}

	public function verify()
	{
		$token = $this->uri->segment(4);
		$cek_token = $this->Auth_model->cek_tokenData(urldecode($token));
		if ($cek_token->num_rows() > 0){
			$result = $cek_token->row_array();
			$id = $result['id'];

			// aktifkan
			$aktifkan = $this->Auth_model->activate_user($id);

			if ($aktifkan){
				$this->session->set_flashdata('status', '<div class="alert alert-success alert-dismissible alert-has-icon">
															  <div class="alert-icon"><i class="far fa-check-circle"></i></div>
															  <div class="alert-body">
															  <button class="close" data-dismiss="alert">
																  <span>&times;</span>
																</button>
																<div class="alert-title">Sukses !</div>
																Selamat, akun Anda telah aktif.
															  </div>
															</div>');
				$data = [
					'message' => '<strong>'.$result['email'].'</strong> telah diaktifkan. Silahkan klik tombol login untuk masuk ke dalam sistem.',
					'status' => 'sukses'
				];
			}else{
				$this->session->set_flashdata('status', '<div class="alert alert-warning alert-dismissible alert-has-icon">
															  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
															  <div class="alert-body">
															  <button class="close" data-dismiss="alert">
																  <span>&times;</span>
																</button>
																<div class="alert-title">Maaf !</div>
																Akun anda tidak dapat diaktivasi.
															  </div>
															</div>');
				$data = [
					'message' => 'Maaf, terjadi kesalahan. Silahkan hubungi <strong>Administrator</strong>',
					'status' => 'gagal'
				];
			}
		}else{
			$this->session->set_flashdata('status', '<div class="alert alert-danger alert-dismissible alert-has-icon">
															  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
															  <div class="alert-body">
															  <button class="close" data-dismiss="alert">
																  <span>&times;</span>
																</button>
																<div class="alert-title">Maaf !</div>
																Token tidak sesuai. Silahkan Daftar terlebih dahulu.
															  </div>
															</div>');
			$data = [
				'message' => 'Maaf, data anda tidak dapat ditemukan. Silahkan daftar atau periksa kotak masuk email anda.',
				'status' => 'gagal'
			];
		}

		$this->load->view('email/verify-page', $data, false);
	}

	public function lihat()
	{
		$data = [
			'token' => urlencode($this->encrypt->encode('mukhlizar@gmail.com')),
			'email' => 'example@mail.com',
			'nama' => 'John Jennedy',
			'password' => 'password'
		];
		$this->load->view('email/email-page', $data);
	}

	function rules()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => '%s wajib diisi',
			'valid_email' => '%s tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => '%s wajib diisi',
		]);
	}

	// bagian admin
	public function admin()
	{
		if (! empty($_SESSION['id'])){
			redirect('kkn/dashboard');
		}

		$data = [
			'title' => 'Sikamago - Admin Login KKN'
		];

		$this->load->view('kkn/login-admin', $data, false);
	}

	public function login_admin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => '%s wajib diisi',
			'valid_email' => '%s tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => '%s wajib diisi',
		]);
		if ($this->form_validation->run() == false){
			$arr_data = [
				'status' => 'error',
				'email' => strip_tags(form_error('email')),
				'password' => strip_tags(form_error('password')),
			];
		}else{
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$cek = $this->Auth_model->check_user($email);
			if ($cek->num_rows() > 0){
				$datadiri = $cek->row_array();
				$password = $datadiri['password'];
				if (password_verify($pass, $password)){
					$sess_data = [
						'id' => $datadiri['id'],
						'nama' => $datadiri['nama'],
						'email' => $datadiri['email'],
						'level' => $datadiri['level_id'],
						'log-in' => 'true'
					];
					$this->session->set_userdata($sess_data);
					$arr_data = [
						'status' => 'sukses',
						'pesan' => 'Anda berhasil login',
						'link' => config_item('base_url') . 'kkn/admin'
					];
				}else{
					$arr_data = [
						'status' => 'pass-salah',
						'pesan' => 'Maaf, password Anda salah'
					];
				}
			}else{
				$arr_data = [
					'status' => 'kosong',
					'pesan' => 'Maaf, data Anda tidak ada'
				];
			}

		}

		echo json_encode($arr_data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('kkn/auth/login');
	}
}
