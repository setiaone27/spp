<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_pembayaran extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_transaksi');
		$this->load->helper('rupiah_helper');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Input Transaksi Pembayaran";

		$this->load->view('vendor/pembayaran/transaksi-pembayaran', $data);
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$siswa = $this->M_transaksi->search($keyword);
		$siswa2 = $this->M_transaksi->search2($keyword);
    
		$hasil = $this->load->view('vendor/pembayaran/table-input-pembayaran', array('siswa'=>$siswa), true);
		$hasil2 = $this->load->view('vendor/pembayaran/input-spp', array('siswa2'=>$siswa2), true);

		$callback = array(
      		'hasil' => $hasil,
      		'hasil2' => $hasil2,
  		);
    	echo json_encode($callback);
	}

	public function aksi_input()
	{
		$data = array(
			'id_petugas' 		=> $this->input->post('id_petugas'),
			'nis'  		=> $this->input->post('nis'),
			'tgl'  => $this->input->post('tgl'),
			'bulan_dibayar'  => $this->input->post('bulan_dibayar'),
			'tahun_dibayar'  => $this->input->post('tahun_dibayar'),
			'id_spp'  => $this->input->post('id_spp'),
			'jumlah_bayar'  => $this->input->post('jumlah_bayar')
		);

		$this->db->insert('pembayaran', $data);

		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/transaksi-pembayaran');
	}

}