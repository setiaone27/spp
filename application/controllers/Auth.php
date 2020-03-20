<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->view('auth');
	}
}