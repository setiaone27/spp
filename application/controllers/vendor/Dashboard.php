<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_dashboard');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$data['siswa'] = $this->M_dashboard->hitungSiswa();
		$data['kelas'] = $this->M_dashboard->hitungKelas();
		$data['petugas'] = $this->M_dashboard->hitungPetugas();
		$data['kk'] = $this->M_dashboard->hitungkk();
		$data['pembayaran'] = $this->M_dashboard->getPembayaran();
		$data['kompetensi'] = $this->M_dashboard->getKompetensi();

		$this->load->view('vendor/dashboard', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $sdata['message'] = "Logout Berhasil";
        $this->session->set_userdata($sdata);
		redirect('auth', 'refresh');
	}
}
