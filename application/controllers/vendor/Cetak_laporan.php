<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_laporan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_laporan');
		$this->load->helper('rupiah_helper');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Cetak Laporan Pembayaran";

		$this->load->view('vendor/pembayaran/cetak-laporan', $data);
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$siswa = $this->M_laporan->search($keyword);
    
		$hasil = $this->load->view('vendor/pembayaran/table-cetak-laporan', array('siswa'=>$siswa), true);

		$callback = array(
      		'hasil' => $hasil,
  		);
    	echo json_encode($callback);
	}

	public function siswa($nis)
	{
		$this->db->where('nis', $nis);

		$data['title'] = 'Cetak Laporan';

		$data['list'] = $this->M_laporan->getSiswa();
		$data['list2'] = $this->M_laporan->getPembayaran();

		$this->load->view('vendor/pembayaran/cetak', $data);
	}

}