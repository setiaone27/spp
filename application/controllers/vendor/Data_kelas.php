<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_kelas');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] 					= "Data kelas";
		$data['list'] 					= $this->M_kelas->getKelas();
		$data['kompetensi_keahlian'] 	= $this->db->get('kompetensi_keahlian');
		
		$this->load->view('vendor/data-kelas/index', $data);
	}

	public function input_kelas()
	{
		$data['title']  = "Input Data Kelas";

		$data['kompetensi_keahlian'] = $this->db->get('kompetensi_keahlian');
		
		
		$this->load->view('vendor/data-kelas/input-kelas', $data);	
	}

	public function aksi_input()
	{
		$data = array(
			'nama_kelas' => $this->input->post('nama_kelas'),
			'id_kk'		 => $this->input->post('id_kk')
		);

		$this->db->insert('kelas', $data);
		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-kelas');
	}

	public function editkelas($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);

		redirect('vendor/data-kelas');
	}

	public function aksi_edit($id_kelas)
	{
		$data = array(
			'nama_kelas' => $this->input->post('nama_kelas'),
			'id_kk'		 => $this->input->post('id_kk')
		);

		$this->db->where('id_kelas', $id_kelas);

		$this->db->update('kelas', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-kelas');
	}

	public function hapuskelas($id_kelas)
	{
		$this->db->where('id_kelas', $id_kelas);
		
		$this->db->delete('kelas');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-kelas');
	}

}
