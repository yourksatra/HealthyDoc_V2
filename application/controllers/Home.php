<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$file_path = APPPATH . 'maintenance_status.txt';
		$status_path = file_get_contents($file_path);
		if($status_path == '000'){
			$this->load->view('landingPage');
			$this->load->view('template/footer');
		}else{
			$this->load->view('maintenancePage');
		}
	}
	public function price()
	{
		$data['title']='Daftar Layanan';
		$this->load->view('template/header', $data);
		$this->load->view('pricePage');
		$this->load->view('template/footer');
	}
	public function search()
	{
		$data['title']='Pencarian Data';
		$data['NIK']=NULL;
		$this->load->view('template/header', $data);
		$this->load->view('searchPage', $data);
		$this->load->view('template/footer');
	}
	
}