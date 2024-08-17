<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regist extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Register');
	}

    public function index()
	{
		$this->load->view('registerPage');
	}

	public function register(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[24]');
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('NoTelp', 'NoTelephone', 'required');
		$this->form_validation->set_rules('RadioOptions', 'Choice', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$this->_register();
		}
	}

	private function _register() {
		$Nama = $this->input->post('name');
		$Email = $this->input->post('email');
		$NoTlp = $this->input->post('NoTelp');
		$Kategori = $this->input->post('RadioOptions');
		$Alamat = $this->input->post('alamat');
		$Pass = $this->input->post('password');
		$options = [
        	'cost' => 10,
    	];
		$Password = password_hash($Pass,PASSWORD_DEFAULT,$options);
		$token=bin2hex(random_bytes(8));
		$otoritas = 'Admin';
		
		$this->M_Register->Register($Email,$Nama,$Kategori,$Alamat,$NoTlp,$Password,$token,$otoritas);
		$this->sendEmail($Email,$token);
		redirect(base_url('regist/langganan?token='.$token.''));
	}

	private function sendEmail($email, $token){
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
		$this->email->subject('Aktivasi Akun HealthyDoc');
		$this->email->message('Klik link berikut untuk verifikasi akun : <a href="'. base_url().'regist/verif?email='.$email.'&token='.$token.'">aktivasi</a>');
		if ($this->email->send()) {
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verif(){
		$email = $_GET['email'];
		$token = $_GET['token'];
		$responseEmail = $this->db->get_where('admin', ['Email' => $email])->row_array();
		$responseToken = $this->db->get_where('accesstoken', ['token' => $token])->row_array();
		$currentTimestamp = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$currentTimestampFormatted = $currentTimestamp->format('Y-m-d H:i:s');
		if ($responseEmail&&$responseToken) {
			$data = array(
				'email_verified' => $currentTimestampFormatted
			);
			$where = array(
				'Email' => $email
			);
			$this->M_Register->updateAdmin($where, $data);
			$this->session->set_flashdata('notifikasi', 'Verifikasi Email Berhasil');
			$this->load->view('RegisterPage');
		}else{
			$this->session->set_flashdata('notifikasi', 'Verifikasi Email Gagal');
			$this->load->view('RegisterPage');
		}
	}

	public function langganan(){
		$Token = $_GET['token'];
		$data = $this->db->get_where('accesstoken', ['token' => $Token])->row_array();
			if ($data!=null) {
				$this->session->set_flashdata('notifikasi', 'Pendaftaran Berhasil. Pilih dan Bayar Paketan Anda');
				$id['InfoAkun'] = $this->db->get_where('admin', ['IdAkun' => $data['UserId']])->row_array();
				$this->load->view('langganan', $id);
			} else {
				$this->session->set_flashdata('notifikasi','Akses Gagal, Silahkan Login Terlebih Dahulu');
				return redirect('AuthAdmin/dtTransaksi');
			}
	}
}