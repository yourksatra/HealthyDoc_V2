<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pencarian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
		$this->form_validation->set_rules('NAMA', 'NAMA', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('home/search');
		} else {
			$nik = $this->input->post('NIK');
			$nama= $this->input->post('NAMA');
			
			$pasien= $this->db->get_where('pasien', ['NIK' => $nik])->row_array();
			if ($pasien!=null) {
				if ($pasien['Nama'] == $nama) {
					$data['NIK'] = $pasien['NIK'];
					$data['title']='Pencarian Data';
					$this->load->view('template/header', $data);
					$this->load->view('searchPage', $data);
					$this->load->view('template/footer');
				} else {
					return redirect('home/search');
				}
			} else {
				return redirect('home/search');
			}
		}
	}
}