<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class Register extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Register';
		$this->load->view('registerpage', $data, false);
	}

	public function simpan()
	{
		if ($this->input->is_ajax_request()) {
			$this->_rules();
			if ($this->form_validation->run() == false) {
				$arr_data = [
					'status' => 'error',
					'pesan' => validation_errors()
				];
			} else {
				$data = array(
					'napan' => htmlspecialchars($this->input->post('napan'), true),
					'nabel' => htmlspecialchars($this->input->post('nabel'), true),
					'email' => htmlspecialchars(strtolower($this->input->post('email')), true),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'level' => htmlspecialchars($this->input->post('level'), true),
					'created_at' => date('Y-m-d H:i:s')
				);
				$d = $this->security->xss_clean($data);

				/* sending email */
				$mail = new PHPMailer(true);

				/* Data yang akan dikirim ke email */
				$subject = 'Registrasi';
				$userEmail = $this->input->post('email');
				$napan = $this->input->post('napan');
				$nabel = $this->input->post('nabel');
				$password = $this->input->post('password');
				$message = "Anda telah berhasil mendaftar dengan data sebagai berikut :";
				/* End data */

				/*$mail->setLanguage('id', '/vendor/phpmailer/phpmailer/language/');*/

				/*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
				$mail->isSMTP();                                            // Send using SMTP
				$mail->Host = 'smtp.gmail.com';                        // Set the SMTP server to send through
				$mail->SMTPAuth = true;                                   // Enable SMTP authentication
				$mail->Username = 'sikamago.utu@gmail.com';            // SMTP username
				$mail->Password = 'sikamago1234';                             // SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				//$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
				$mail->SMTPAutoTLS = true;
				$mail->Port = 587;

				/* Pengaturan menggunakan email hosting */
				/*$mail->isSMTP();
				$mail->Host = 'srv103.niagahoster.com';
				//$mail->SMTPAuth = true;
				$mail->Username = 'admin@sikamago.lppm-utu-ac.id';
				$mail->Password = 'sikamago123';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;*/

				//Recipients
				$mail->setFrom('sikamago.utu@gmail.com', 'Admin');
				$mail->addAddress($userEmail);     // Add a recipient

				$mail->addReplyTo('nataliesweet404@gmail.com', 'Information');
				$data = array(
					'username' => $userEmail,
					'message' => $message,
					'napan' => $napan,
					'nabel' => $nabel,
					'password' => $password
				);
				$mail->isHTML(true);                                  // Set email format to HTML
				$body = $this->load->view('email-page', $data, true);
				$mail->Subject = $subject;

				$mail->Body = $body;
				$mail->send();
				$save = $this->Register_m->savedata($d);
				if ($save) {
					//callback data ajax
					$arr_data = array(
						'status' => 'sukses-kirim',
						'pesan' => 'email data registrasi telah dikirim, periksa email Anda termasuk di dalam folder spam',
						'alamat' => config_item('base_url') . 'login'
					);
				} else {
					//callback data ajax
					$arr_data = array(
						'status' => 'gagal-simpan',
						'pesan' => $mail->ErrorInfo,
						'alamat' => ''
					);
				}
			}
			echo json_encode($arr_data);
		} else {
			echo 'No direct script access allowed';
		}
	}

	function _rules()
	{
		$this->form_validation->set_rules('napan', 'Nama Depan', 'trim|required|min_length[3]', [
			'required' => '%s wajib diisi',
			'min_length' => '%s minimal 3 huruf'
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
			'required' => '%s wajib diisi',
			'valid_email' => '%s harus valid, periksa kembali',
			'is_unique' => '%s telah terdaftar, gunakan email lainnya'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
			'required' => '%s wajib diisi',
			'min_length' => '%s minimal 6 karakter'
		]);
		$this->form_validation->set_rules('pass_confirm', 'Konfirmasi Password', 'trim|required|matches[password]', [
			'required' => '%s wajib diisi',
			'matches' => '%s harus sama'
		]);
	}

	public function lihat_email()
	{
		$data = [
			'napan' => 'Napan',
			'nabel' => 'Nabel',
			'password' => 'Password',
			'username' => 'example@gmail.com'
		];
		$this->load->view('email-page', $data);
	}
}
