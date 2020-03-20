<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kompetensi_keahlian extends CI_Controller {

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
		$data['title'] 					= "Data Kompetensi Keahlian";
		$data['list'] 					= $this->db->get('kompetensi_keahlian');
		
		$this->load->view('vendor/data-kompetensi-keahlian/index', $data);
	}

	public function input_kompetensi_keahlian()
	{
		$data['title']  = "Input Data Kompetensi Keahlian";

		$this->load->view('vendor/data-kompetensi-keahlian/input-kompetensi-keahlian', $data);	
	}

	public function aksi_input()
	{
		$data = array(
			'nama_kk' => $this->input->post('nama_kk')
		);

		$this->db->insert('kompetensi_keahlian', $data);
		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-kompetensi-keahlian');
	}

	public function editkompetensikeahlian($id_kk)
	{
		$this->db->where('id_kk', $id_kk);

		redirect('vendor/data-kompetensi-keahlian');
	}

	public function aksi_edit($id_kk)
	{
		$data = array(
			'nama_kk' => $this->input->post('nama_kk')
		);

		$this->db->where('id_kk', $id_kk);

		$this->db->update('kompetensi_keahlian', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-kompetensi-keahlian');
	}

	public function hapuskompetensikeahlian($id_kk)
	{
		$this->db->where('id_kk', $id_kk);
		
		$this->db->delete('kompetensi_keahlian');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-kompetensi-keahlian');
	}

}
