<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_spp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('rupiah_helper');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] 	= "Data SPP";
		$data['list'] 	= $this->db->get('spp');
		
		$this->load->view('vendor/data-spp/index', $data);
	}

	public function input_spp()
	{
		$data['title']  = "Input Data SPP";
		
		$this->load->view('vendor/data-spp/input-spp', $data);	
	}

	public function aksi_input()
	{
		$data = array(
			'tahun' 	=> $this->input->post('tahun'),
			'nominal' 	=> $this->input->post('nominal')
		);

		$this->db->insert('spp', $data);
		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-spp');
	}

	public function editspp($id_spp)
	{
		$this->db->where('id_spp', $id_spp);

		redirect('vendor/data-anggota');
	}

	public function aksi_edit($id_spp)
	{
		$data = array(
			'tahun' 	=> $this->input->post('tahun'),
			'nominal' 	=> $this->input->post('nominal')
		);

		$this->db->where('id_spp', $id_spp);

		$this->db->update('spp', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-spp');
	}

	public function hapusspp($id_spp)
	{
		$this->db->where('id_spp', $id_spp);
		
		$this->db->delete('spp');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-spp');
	}

}
