<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthAdmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Insert');
		$this->load->model('M_Edit');
	}

	public function index()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		$data['Pelayanan'] = $this->db->get_where('dtpelayanan', ['IdAkun' => $this->session->userdata('IdAdmin')])->result_array();
		$data['rm'] = $this->db->get_where('rekam_medis', ['IdAkun' => $this->session->userdata('IdAdmin')])->result_array();;
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin/dtTransaksi');
			} else {
				$data['title'] = 'Dashboard';
				$data['otoritas'] = 'Admin';
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/dashboard', $data);
			}
		} else
			return redirect('login');
	}

	public function dataPetugas()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Data Petugas';
				$data['otoritas'] = 'Admin';
				$data['petugas'] = $this->db->get_where('petugas', ['IdAkun' => $_SESSION['IdAdmin']])->result_array();
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/datapetugas', $data);
			}
		} else
			return redirect('login');
	}
	public function inputPetugas()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Input Data Petugas';
				$data['otoritas'] = 'Admin';
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/inputpetugas', $data);
			}
		} else
			return redirect('login');
	}
	public function editPetugas()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Edit Data Petugas';
				$data['otoritas'] = 'Admin';
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/editpetugas', $data);
			}
		} else
			return redirect('login');
	}
	public function AksiInsert_P()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|exact_length[18]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('Sex', 'Sex', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required');
		$this->form_validation->set_rules('Status', 'Status', 'trim|required');
		$this->form_validation->set_rules('profesi', 'Profesi', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('AuthAdmin/inputPetugas');
		} else {
			$NIP = $this->input->post('nip');
			$NAMA = $this->input->post('nama');
			$JENKEL = $this->input->post('Sex');
			$NOTELPON = $this->input->post('NoTelp');
			$STATUS = $this->input->post('Status');
			$PROFESI = $this->input->post('profesi');

			$DataInsert = array(
				'NIP' => $NIP,
				'Nama' => $NAMA,
				'JenKel' => $JENKEL,
				'NoTelp' => $NOTELPON,
				'Status' => $STATUS,
				'Profesi' => $PROFESI,
				'otp' => 'NULL',
				'IdAkun' => $_SESSION['IdAdmin']
			);

			$this->M_Insert->InsertDataPetugas($DataInsert);
			redirect(base_url('AuthAdmin/dataPetugas'));
		}
	}
	public function AksiEdit_P()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|exact_length[18]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('Sex', 'Sex', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required');
		$this->form_validation->set_rules('Status', 'Status', 'trim|required');
		$this->form_validation->set_rules('profesi', 'Profesi', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('AuthAdmin/inputPetugas');
		} else {
			$NIP = $this->input->post('nip');
			$NAMA = $this->input->post('nama');
			$JENKEL = $this->input->post('Sex');
			$NOTELPON = $this->input->post('NoTelp');
			$STATUS = $this->input->post('Status');
			$PROFESI = $this->input->post('profesi');

			$data = array(
				'NIP' => $NIP,
				'Nama' => $NAMA,
				'JenKel' => $JENKEL,
				'NoTelp' => $NOTELPON,
				'Status' => $STATUS,
				'Profesi' => $PROFESI,
				'otp' => 'NULL',
				'IdAkun' => $_SESSION['IdAdmin']
			);

			$where = array(
				'NIP' => $NIP
			);

			$this->M_Edit->EditDataPetugas($where, $data);
			redirect(base_url('AuthAdmin/dataPetugas'));
		}
	}

	public function AksiDelete_P()
	{
		if (isset($_GET['nip'])) {
			$nip = $_GET['nip'];

			$this->load->model('M_Delete');
			$this->M_Delete->DeleteDataPetugas($nip);
			redirect(base_url('AuthAdmin/dataPetugas'));
		}
	}

	public function dataPasien()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Data Pasien';
				$data['otoritas'] = 'Admin';
				$data['Pasien'] = $this->db->get_where('rm_pasien', ['IdAkun' => $this->session->userdata('IdAdmin')])->result_array();
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/dataPasien', $data);
			}
		} else
			return redirect('login');
	}
	public function dataRM()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Data Rekam Medis';
				$data['otoritas'] = 'Admin';
				$data['RekamMedis'] = $this->db->get_where('rekam_medis', ['IdAkun' => $this->session->userdata('IdAdmin')])->result_array();
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/dataRM', $data);
			}
		} else
			return redirect('login');
	}
	public function detailRM()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$kdRM = $_GET['kdRM'];
				$date = $_GET['date'];
				$data['title'] = 'Data Rekam Medis No ' . $kdRM . ' ' . $date . '';
				$data['otoritas'] = 'Admin';
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/detailRM', $data);
			}
		} else
			return redirect('login');
	}
	public function dtPemeriksaan()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$data['title'] = 'Data Pemeriksaan';
				$data['otoritas'] = 'Admin';
				$data['Pemeriksaan'] = $this->db->get_where('dtPemeriksaan', ['IdAkun' => $this->session->userdata('IdAdmin')])->result_array();
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/dataPem', $data);
			}
		} else
			return redirect('login');
	}
	public function dtPemeriksaanPasien()
	{
		$data = $this->db->get_where('admin', ['IdAkun' => $this->session->userdata('IdAdmin')])->row_array();
		if ($this->session->userdata('IdAdmin') != null) {
			if ($data['status'] == 0) {
				return redirect('AuthAdmin');
			} else {
				$kdRM = $_GET['kdRM'];
				$data['title'] = 'Data Pemeriksaan ' . $kdRM . '';
				$data['otoritas'] = 'Admin';
				$data['Pasien'] = $this->db->get_where('dtPemeriksaan', ['kodeRME' => $kdRM])->result_array();
				$this->load->view('template/sideHeader', $data);
				$this->load->view('auth/admin/dataPemPasien', $data);
			}
		} else
			return redirect('login');
	}
	public function dtTransaksi()
	{
		if ($this->session->userdata('IdAdmin') != null) {
			$data['title'] = 'Data Transaksi';
			$data['otoritas'] = 'Admin';
			$data['result'] = $this->db->get_where('pembayaran', ['IdAdmin' => $this->session->userdata('IdAdmin')])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/admin/dataTransaksi', $data);
		} else
			return redirect('login');
	}

	public function langganan()
	{
		if ($this->session->userdata('IdAdmin') != null) {
			$data = $this->db->get_where('accesstoken', ['token' => $this->session->userdata('logToken')])->row_array();
			if ($data != null) {
				$this->session->set_flashdata('notifikasi', 'Perpanjang Langganan Anda Segera!!!');
				$id['InfoAkun'] = $this->db->get_where('admin', ['IdAkun' => $data['UserId']])->row_array();
				$this->load->view('langganan', $id);
			} else {
				$this->session->set_flashdata('notifikasi', 'Akses Gagal');
				return redirect('AuthAdmin/dtTransaksi');
			}
		} else
			return redirect('login');
	}
}
