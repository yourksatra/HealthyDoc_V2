<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('home');
		} else {
			$this->_save();
		}
	}
	public function _save(){
		$email = $this->input->post('email');
		$nama= $this->input->post('nama');
		$saran = $this->input->post('pesan');

		$Data= array(
			'Email' => $email,
			'Nama' => $nama,
			'Pesan' => $saran
		);
		$this->db->insert('kritiksaran', $Data);
		$this->session->set_flashdata('notifikasi', 'Berhasil Mengirim');
		redirect(base_url('home'));
	}
}