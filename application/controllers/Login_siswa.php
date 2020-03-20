<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login_siswa');
		if($this->session->userdata('user_id')>0)
		{
			redirect('vendor/dashboard');
		}
	}

	public function index()
	{
		$this->load->view('login-siswa');
	}

	public function check_login(){
		$response=array();
		if($this->form_validation->run('loginsiswa')!==false){
			$result=$this->M_login_siswa->checkLogin();
			if($result){
				$response['status']='success';
				$sdata['user_id']		=$result->id_siswa;
				$sdata['user_name']		=$result->nis;
				$sdata['full_name']		=$result->nama;
				$sdata['user_alamat']	=$result->alamat;
				$sdata['user_hp']		=$result->no_tlp;
				$sdata['user_level']	=$result->level;
				$this->session->set_userdata($sdata);
			}
			else{
				$response['status']='error';
				$response['message']='Ops! NIS atau Password Salah!';
			}
		}
		else{
			$response['status']='error';
			$response['message']=validation_errors();
		}
		echo json_encode($response);
	}
}
