<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TwoStep extends CI_Controller
{
	const pass_app = "aiov mhqh msgg nbsn";
	const token_app = "4NJbwfQh72xbafoakJAI";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function Admin()
	{
		if ($this->session->userdata('email') != null) {
			$this->form_validation->set_rules('otp', 'OTP', 'trim|required');
			if ($this->form_validation->run() == false) {
				$admin = $this->db->get_where('admin', ['Email' => $this->session->userdata('email')])->row_array();
				$Email = $admin['Email'];
				$token = $admin['otp'];
				$this->sendEmail($Email, $token);
				$this->load->view('TwoStepPage');
			} else {
				$this->verifAdmin();
			}
		} else {
			$this->session->set_flashdata('notifikasi', 'Tidak Ada Sesi Aktif. Silahkan Login');
			$this->load->view('loginPage');
		}
	}

	private function sendEmail($email, $token)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'MedTech.corp2@gmail.com',
			'smtp_pass' => "aiov mhqh msgg nbsn",
			'smtp_port' => 465,
			'mailtype' => 'html',
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('MedTech.corp2@gmail.com', 'HealthyDoc');
		$this->email->to($email);
		$this->email->subject('Kode Verifikasi 2 Langkah');
		$this->email->message('OTP Anda: '.$token);
		if ($this->email->send()) {
			$this->session->set_flashdata('notifikasi', 'OTP Berhasil Terkirim');
		} else {
			$this->session->set_flashdata('notifikasi', 'OTP Gagal Terkirim. Refresh Halaman');
			die;
		}
	}

	public function verifAdmin()
	{
		$otp = $this->input->POST('otp');
		$admin = $this->db->get_where('admin', ['Email' => $this->session->userdata('email')])->row_array();
		if ($admin != null) {
			if ($admin['otp'] == $otp) {
				$logtoken = bin2hex(random_bytes(8));
				$otoritas = 'Admin';
				$userId	= $admin['IdAkun'];
				$this->db->query("CALL LoginAccess('" . $logtoken . "','" . $otoritas . "','" . $userId . "')");
				$data = [
					'IdAdmin' => $admin['IdAkun'],
					'logToken' => $logtoken
				];
				$this->session->set_userdata($data);
				redirect('authadmin');
			} else {
				$this->session->set_flashdata('notifikasi', 'OTP Salah');
				$this->load->view('TwoStepPage');
			}
		} else {
			$this->session->set_flashdata('notifikasi', 'Login Gagal');
		}
	}

	public function Petugas()
	{
		if ($this->session->userdata('nip') != null) {
			$this->form_validation->set_rules('otp', 'OTP', 'trim|required');
			if ($this->form_validation->run() == false) {
				$petugas = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
				$NoTelp = $petugas['NoTelp'];
				$token = $petugas['otp'];

				$this->sendWa($NoTelp, $token);
				$this->load->view('TwoStepPage');
			} else {
				$this->verifPetugas();
			}
		} else {
			$this->session->set_flashdata('notifikasi', 'Tidak Ada Sesi Aktif. Silahkan Login');
			$this->load->view('loginPage');
		}
	}

	private function sendWa($NoTelp, $otp)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.fonnte.com/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'target' => $NoTelp,
				'message' => 'Kode OTP Anda: '.$otp,
				'countryCode' => '62',
			),
			CURLOPT_HTTPHEADER => array(
				'Authorization: VT5JC5twg22V7-bNcKzV'
			),
		));
		
		$response = curl_exec($curl);
		if (curl_errno($curl)) {
			$error_msg = curl_error($curl);
		}
		curl_close($curl);

		if (isset($error_msg)) {
			$this->session->set_flashdata('notifikasi', 'OTP Gagal Terkirim. Refresh Halaman');
		}
		$this->session->set_flashdata('notifikasi', 'OTP Berhasil Terkirim');
	}

	public function verifPetugas()
	{
		$otp = $this->input->POST('otp');
		$petugas = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
		if ($petugas != null) {
			if ($petugas['otp'] == $otp) {
				$logtoken = bin2hex(random_bytes(8));
				$otoritas = 'Petugas';
				$userId	= $petugas['NIP'];
				$this->db->query("CALL LoginAccess('" . $logtoken . "','" . $otoritas . "','" . $userId . "')");
				$data = [
					'nip' => $petugas['NIP'],
					'AdminCode' => $petugas['IdAkun'],
					'logToken' => $logtoken
				];
				$this->session->set_userdata($data);
				redirect('authPetugas');
			} else {
				$this->session->set_flashdata('notifikasi', 'OTP Salah');
				$this->load->view('TwoStepPage');
			}
		} else {
			$this->session->set_flashdata('notifikasi', 'Login Gagal');
		}
	}
}