<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_history');
		$this->load->helper('rupiah_helper');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title']  = "History Pembayaran";

		$data['list']	= $this->M_history->getAll();

		$this->load->view('vendor/pembayaran/history-pembayaran', $data);
	}

}
