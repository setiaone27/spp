<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		if($this->session->userdata('user_id')>0)
		{
			redirect('vendor/dashboard');
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function check_login(){
		$response=array();
		if($this->form_validation->run('login')!==false){
			$result=$this->M_login->checkLogin();
			if($result){
				$response['status']='success';
				$sdata['user_id']		=$result->id_petugas;
				$sdata['user_name']		=$result->username;
				$sdata['pass_word']		=$result->password;
				$sdata['full_name']		=$result->nama_petugas;
				$sdata['user_level']	=$result->level;
				$this->session->set_userdata($sdata);
			}
			else{
				$response['status']='error';
				$response['message']='Ops! Username atau Password Salah!';
			}
		}
		else{
			$response['status']='error';
			$response['message']=validation_errors();
		}
		echo json_encode($response);
	}
}
