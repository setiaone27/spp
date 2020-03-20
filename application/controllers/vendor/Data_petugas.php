<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_petugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] 					= "Data Petugas";
		$data['list'] 					= $this->db->get('petugas');
		
		$this->load->view('vendor/data-petugas/index', $data);
	}

	public function input_petugas()
	{
		$data['title']  = "Input Data Petugas";

		$this->load->view('vendor/data-petugas/input-petugas', $data);	
	}

	public function aksi_input()
	{
		$data = array(
			'username' 		=> $this->input->post('username'),
			'password' 		=> md5($this->input->post('password')),
			'nama_petugas' 	=> $this->input->post('nama_petugas'),
			'level' 		=> $this->input->post('level')
		);

		$this->db->insert('petugas', $data);
		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-petugas');
	}

	public function editpetugas($id_petugas)
	{
		$this->db->where('id_petugas', $id_petugas);

		redirect('vendor/data-petugas');
	}

	public function aksi_edit($id_petugas)
	{
		$data = array(
			'username' 		=> $this->input->post('username'),
			'nama_petugas' 	=> $this->input->post('nama_petugas'),
			'level' 		=> $this->input->post('level')
		);

		$this->db->where('id_petugas', $id_petugas);

		$this->db->update('petugas', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-petugas');
	}

	public function hapuspetugas($id_petugas)
	{
		$this->db->where('id_petugas', $id_petugas);
		
		$this->db->delete('petugas');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-petugas');
	}

}
