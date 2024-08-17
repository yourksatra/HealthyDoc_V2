<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthPetugas extends CI_Controller
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
		$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
		$data['Pelayanan'] = $this->db->get_where('dtpelayanan', ['IdAkun' => $this->session->userdata('AdminCode')])->result_array();
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Dashboard';
			$data['otoritas'] = 'Petugas';
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dashboard', $data);
		} else
			return redirect('login');
	}
	public function dataPasien()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Pasien';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['Pasien'] = $this->db->get_where('rm_pasien', ['IdAkun' => $this->session->userdata('AdminCode')])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dataPasien', $data);
		} else
			return redirect('login');
	}
	public function dataPasienpublic()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Pasien';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['Pasien'] = $this->db->get('pasien')->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dataPasienpublic', $data);
		} else
			return redirect('login');
	}
	public function inputPasien()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Input Data Pasien';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/inputPasien', $data);
		} else
			return redirect('login');
	}
	public function editPasien()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Edit Data Pasien';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/editPasien', $data);
		} else
			return redirect('login');
	}
	public function InsertPasien()
	{
		$this->form_validation->set_rules('nik', 'nik', 'trim|required|exact_length[16]');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('namaIbu', 'namaIbu', 'trim|required');
		$this->form_validation->set_rules('Sex', 'Sex', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'tgllahir', 'trim|required');
		$this->form_validation->set_rules('umurPasien', 'umurPasien', 'trim|required');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('golDarah', 'golDarah', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('authpetugas/inputPasien');
		} else {
			$NIK = $this->input->post('nik');
			$NAMA = $this->input->post('nama');
			$NAMAIBU = $this->input->post('namaIbu');
			$JENKEL = $this->input->post('Sex');
			$TGLLAHIR = $this->input->post('tgllahir');
			$UMUR = $this->input->post('umurPasien');
			$AGAMA = $this->input->post('agama');
			$GOLDARAH = $this->input->post('golDarah');
			$PEKERJAAN = $this->input->post('pekerjaan');
			$PENDIDIKAN = $this->input->post('pendidikan');
			$NOTELPON = $this->input->post('NoTelp');
			$ALAMAT = $this->input->post('alamat');
			$NIP = $_SESSION['nip'];

			$DataInsert = array(
				'NIK' => $NIK,
				'Nama' => $NAMA,
				'NamaIbu' => $NAMAIBU,
				'JenisKelamin' => $JENKEL,
				'TanggalLahir' => $TGLLAHIR,
				'Umur' => $UMUR,
				'Agama' => $AGAMA,
				'GolDarah' => $GOLDARAH,
				'Pekerjaan' => $PEKERJAAN,
				'PendidikanTerakhir' => $PENDIDIKAN,
				'Alamat' => $ALAMAT,
				'NoTelp' => $NOTELPON
			);

			$inputPasien = $this->M_Insert->InsertDataPasien($DataInsert, $NIK, $NIP);
			if ($inputPasien != 0) {
				$this->session->set_flashdata('notifikasi', 'NIK Pasien Telah Terdaftar, Cek Data Public Pasien, untuk mendaftarkan Rekam Medis Pasien');
				redirect(base_url('AuthPetugas/dataPasien'));
			} else {
				$this->session->set_flashdata('notifikasi', 'Pasien Berhasil Terdaftar, Nomor Rekam Medis Berhasil dibuat');
				redirect(base_url('AuthPetugas/dataPasien'));
			}
		}
	}
	public function AksiEditPasien()
	{
		$this->form_validation->set_rules('nik', 'nik', 'trim|required|exact_length[16]');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('namaIbu', 'namaIbu', 'trim|required');
		$this->form_validation->set_rules('Sex', 'Sex', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'tgllahir', 'trim|required');
		$this->form_validation->set_rules('umurPasien', 'umurPasien', 'trim|required');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('golDarah', 'golDarah', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		if ($this->form_validation->run() == false) {
			return redirect('authpetugas/inputPasien');
		} else {
			$NIK = $this->input->post('nik');
			$NAMA = $this->input->post('nama');
			$NAMAIBU = $this->input->post('namaIbu');
			$JENKEL = $this->input->post('Sex');
			$TGLLAHIR = $this->input->post('tgllahir');
			$UMUR = $this->input->post('umurPasien');
			$AGAMA = $this->input->post('agama');
			$GOLDARAH = $this->input->post('golDarah');
			$PEKERJAAN = $this->input->post('pekerjaan');
			$PENDIDIKAN = $this->input->post('pendidikan');
			$NOTELPON = $this->input->post('NoTelp');
			$ALAMAT = $this->input->post('alamat');
			$NIP = $_SESSION['nip'];

			$data = array(
				'Nama' => $NAMA,
				'NamaIbu' => $NAMAIBU,
				'JenisKelamin' => $JENKEL,
				'TanggalLahir' => $TGLLAHIR,
				'Umur' => $UMUR,
				'Agama' => $AGAMA,
				'GolDarah' => $GOLDARAH,
				'Pekerjaan' => $PEKERJAAN,
				'PendidikanTerakhir' => $PENDIDIKAN,
				'Alamat' => $ALAMAT,
				'NoTelp' => $NOTELPON
			);

			$where = array(
				'NIK' => $NIK
			);

			$this->M_Edit->EditDataPasien($where, $data);
			redirect(base_url('AuthPetugas/dataPasien'));
		}
	}
	public function dataRM()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Rekam Medis';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['RekamMedis'] = $this->db->get_where('rekam_medis', ['IdAkun' => $this->session->userdata('AdminCode')])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dataRM', $data);
		} else
			return redirect('login');
	}
	public function detailRM()
	{
		if ($this->session->userdata('nip') != null) {
			$kdRM = $_GET['kdRM'];
			$date = $_GET['date'];
			$data['title'] = 'Data Rekam Medis No ' . $kdRM . ' ' . $date . '';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/detailRM', $data);
		} else
			return redirect('login');
	}
	public function newRM()
	{
		$NIP = $_SESSION['nip'];
		$NIK = $_GET['nik'];

		$inputRM = $this->M_Insert->NewRM($NIK, $NIP);
		if ($inputRM != 0) {
			$this->session->set_flashdata('notifikasi', 'Rekam Medis Berhasil Ditambahkan');
			redirect(base_url('AuthPetugas/dataPasien'));
		} else {
			$this->session->set_flashdata('notifikasi', 'Data ini telah terdaftar sebagai Pasien Anda, Cek Pada Data Rekam Medis');
			redirect(base_url('AuthPetugas/dataPasien'));
		}
	}
	public function inputRM()
	{
		$this->form_validation->set_rules('kodeRM', 'KodeRM', 'trim|required');
		$this->form_validation->set_rules('date', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('namaWali', 'Nama', 'trim|required');
		$this->form_validation->set_rules('NoTelp', 'Telepone', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$idPetugas = $_SESSION['nip'];
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Input Detail Rekam Medis';
			$data['otoritas'] = 'Petugas';
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/inputRM', $data);
		} else {
			$kdRM = $this->input->post('kodeRM');
			$dg = $this->input->post('diagnosa');
			$dg2 = $this->input->post('diagnosa2');
			$tindakan = $this->input->post('tindakan');
			$komplikasi = $this->input->post('komplikasi');
			$keluhan = $this->input->post('keluhan');
			$rujukan = $this->input->post('rujukan');
			$tanggal = $this->input->post('date');
			$obat = $this->input->post('obat');
			$NamaWali = $this->input->post('namaWali');
			$HubWali = $this->input->post('hub');
			$NOTELPON = $this->input->post('NoTelp');
			$ALAMAT = $this->input->post('alamat');
			$NIP = $this->input->post('nip');

			$DataInsert = array(
				'KodeRME' => $kdRM,
				'Diagnosa' => $dg,
				'DiagnosaSekunder' => $dg2,
				'Tindakan' => $tindakan,
				'Komplikasi' => $komplikasi,
				'Rujukan' => $rujukan,
				'Keluhan' => $keluhan,
				'Tanggal' => $tanggal,
				'Obat' => $obat,
				'NIP' => $NIP,
				'NamaWali' => $NamaWali,
				'HubunganWali' => $HubWali,
				'AlamatWali' => $ALAMAT,
				'NoTelponWali' => $NOTELPON
			);
			$this->M_Insert->InsertDetailRM($DataInsert);
			$this->M_Insert->InsertPelayanan($idPetugas, $kdRM);
			redirect(base_url('AuthPetugas/dataRM'));
		}
	}

	public function dtPemeriksaan()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Pemeriksaan';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['Pemeriksaan'] = $this->db->get_where('dtPemeriksaan', ['IdAkun' => $this->session->userdata('AdminCode')])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dataPem', $data);
		} else
			return redirect('login');
	}
	public function dtPemeriksaanPasien()
	{
		if ($this->session->userdata('nip') != null) {
			$kdRM = $_GET['kdRM'];
			$data['title'] = 'Data Pemeriksaan ' . $kdRM . '';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['Pasien'] = $this->db->get_where('dtPemeriksaan', ['kodeRME' => $kdRM])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/dataPemPasien', $data);
		} else
			return redirect('login');
	}
	public function inputPem()
	{
		$this->form_validation->set_rules('kodeRM', 'KodeRM', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$idPetugas = $_SESSION['nip'];
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Input Data Periksa';
			$data['otoritas'] = 'Petugas';
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/inputPem', $data);
		} else {
			$kdRM = $this->input->post('kodeRM');
			$ku = $this->input->post('KU');
			$gcs = $this->input->post('GCS');
			$nadi = $this->input->post('nadi');
			$suhu = $this->input->post('suhu');
			$td = $this->input->post('td');
			$resusitasi = $this->input->post('resusitasi');
			$anamnesa = $this->input->post('anamnesa');
			$kasus = $this->input->post('kasus');
			$kp = $this->input->post('kondisipasien');
			$tanggal = $this->input->post('tanggal');
			$NIP = $this->input->post('nip');

			$DataInsert = array(
				'kodeRME' => $kdRM,
				'KeadaanUmum' => $ku,
				'Kesadaran' => $gcs,
				'Nadi' => $nadi,
				'Suhu' => $suhu,
				'TekananDarah' => $td,
				'Resusitasi' => $resusitasi,
				'Anamesa' => $anamnesa,
				'Kasus' => $kasus,
				'KondisiPasien' => $kp,
				'date' => $tanggal,
				'NIP' => $NIP
			);
			$this->M_Insert->InsertPem($DataInsert);
			$this->M_Insert->InsertPelayanan($idPetugas, $kdRM);
			redirect(base_url('AuthPetugas/dtPemeriksaanPasien?kdRM=' . $kdRM . ''));
		}
	}

	public function dataPetugas()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Petugas';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $this->session->userdata('nip')])->row_array();
			$data['petugas'] = $this->db->get_where('petugas', ['IdAkun' => $_SESSION['AdminCode']])->result_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/datapetugas', $data);
		} else
			return redirect('login');
	}
	public function editProfile()
	{
		if ($this->session->userdata('nip') != null) {
			$data['title'] = 'Data Petugas';
			$data['otoritas'] = 'Petugas';
			$data['Petugas'] = $this->db->get_where('petugas', ['NIP' => $_SESSION['nip']])->row_array();
			$this->load->view('template/sideHeader', $data);
			$this->load->view('auth/petugas/editProfile', $data);
		} else
			return redirect('login');
	}
	public function ProfileUpload()
	{
		$foto = $_FILES['filefoto'];
		if ($foto = '') {
		} else {
			$config['upload_path']	= './asset/image-upload';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('filefoto')) {
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$Data = array(
			'IMG' => $foto
		);

		$where = array(
			'nip' => $_SESSION['nip']
		);
		$this->M_Edit->InsertProfile($Data, $where);
		redirect(base_url('AuthPetugas'));
	}
}