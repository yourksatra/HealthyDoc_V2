<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
	{
		$this->load->view('loginPage');
	}

	public function logadmin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('loginPage');
		} else {
			$this->_login_admin();
		}
	}

	private function _login_admin(){
		$mail = $this->input->POST('email');
		$pass = $this->input->POST('password');

		$admin = $this->db->get_where('admin', ['Email' => $mail])->row_array();
		if ($admin!=null) {
			if (password_verify($pass, $admin['Password'])) {
				// Create OTP
				$token=rand(10000, 99999);
				$otp= array(
					'otp' => $token
				);
				$where = array(
					'IdAkun' => $admin['IdAkun']
				);
				$table = 'admin';
				$this->insertOTP($where,$otp,$table);
				// Session OTP
				$data = [
					'email' => $admin['Email']
				];
					$this->session->set_userdata($data);
					redirect('TwoStep/Admin');
			} else {
				$this->session->set_flashdata('notifikasi', 'Password Salah. Silahkan Coba Lagi!');
				$this->load->view('loginPage');
			}
		} else {
			$this->session->set_flashdata('notifikasi','Email Tidak Terdaftar. Silahkan Coba Lagi!');
			$this->load->view('loginPage');
		}
	}

	public function logoutAdmin()
	{
		$logToken = $this->session->userdata('logToken');
		$currentTimestamp = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$currentTimestampFormatted = $currentTimestamp->format('Y-m-d H:i:s');
		$data = array(
			'last_used_at' => $currentTimestampFormatted
		);
		$where = array(
			'token' => $logToken
		);
		$this->load->model('M_Edit');
		$this->M_Edit->accessLog($where, $data);
		$this->session->unset_userdata('logToken');
		$this->session->unset_userdata('IdAdmin');
		redirect('home');
	}

	public function logpetugas(){
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('loginPage');
		} else {
			$this->_login_petugas();
		}
	}

	private function _login_petugas()
	{
		$nip = $this->input->POST('NIP');
		$NoTlp = $this->input->POST('NoTelp');

		$Petugas = $this->db->get_where('petugas', ['NIP' => $nip])->row_array();
		if ($Petugas!=null) {
			$admin = $this->db->get_where('admin', ['IdAkun' => $Petugas['IdAkun']])->row_array();
			if ($admin['status']==0) {
				$this->session->set_flashdata('notifikasi','Masa Langganan Habis. Segera berlangganan untuk Login Kembali');
				$this->load->view('loginPage');
			}else{
				if ($Petugas['NIP'] == $nip) {
					if ($Petugas['NoTelp'] == $NoTlp) {
						// Create OTP
						$token=rand(10000, 99999);
						$otp= array(
							'otp' => $token
						);
						$where = array(
							'nip' => $Petugas['NIP']
						);
						$table = 'petugas';
						$this->insertOTP($where,$otp,$table);
						// session OTP
						$data = [
							'nip' => $Petugas['NIP']
						];
						$this->session->set_userdata($data);
						redirect('TwoStep/Petugas');
					} else {
						$this->session->set_flashdata('notifikasi','Nomor Telpon Salah. Silahkan Coba Lagi!');
						$this->load->view('loginPage');
					}
				} else {
					$this->session->set_flashdata('notifikasi','NIP Salah. Silahkan Coba Lagi!');
					$this->load->view('loginPage');
				}
			}
		} else {
			$this->session->set_flashdata('notifikasi','Login Gagal!!. Silahkan Coba Lagi!');
			$this->load->view('loginPage');
		}
	}

	public function logoutPetugas()
	{
		$logToken = $this->session->userdata('logToken');
		$currentTimestamp = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$currentTimestampFormatted = $currentTimestamp->format('Y-m-d H:i:s');
		$data = array(
			'last_used_at' => $currentTimestampFormatted
		);
		$where = array(
			'token' => $logToken
		);
		$this->load->model('M_Edit');
		$this->M_Edit->accessLog($where, $data);
		$this->session->unset_userdata('logToken');
		$this->session->unset_userdata('AdminCode');
		$this->session->unset_userdata('nip');
		redirect('home');
	}

	public function insertOTP($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
?>