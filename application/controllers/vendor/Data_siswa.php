<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_siswa');
		if($this->M_login->logged_id() <= 0){
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] 	= "Data Siswa";
		$data['list']  	= $this->M_siswa->getSiswa();
		$data['kelas'] 	= $this->db->get('kelas');
		$data['spp'] 	= $this->db->get('spp');
		
		$this->load->view('vendor/data-siswa/index', $data);
	}

	public function input_siswa()
	{
		$data['title']  = "Input Data Siswa";
		$data['kelas'] 	= $this->db->get('kelas');
		$data['spp'] 	= $this->db->get('spp');
		
		$this->load->view('vendor/data-siswa/input-siswa', $data);	
	}

	public function aksi_input()
	{
		$data = array(
			'nis' 		=> $this->input->post('nis'),
			'nama'  	=> $this->input->post('nama'),
			'password' 	=> md5($this->input->post('password')),
			'id_kelas' 	=> $this->input->post('id_kelas'),
			'alamat' 	=> $this->input->post('alamat'),
			'no_tlp' 	=> $this->input->post('no_tlp'),
			'id_spp' 	=> $this->input->post('id_spp'),
			'level' 	=> $this->input->post('level')
		);

		$this->db->insert('siswa', $data);
		$this->session->set_flashdata('input', 'Data berhasil diinput');

		redirect('vendor/data-siswa');
	}

	public function editsiswa($nis)
	{
		$this->db->where('nis', $nis);

		redirect('vendor/data-siswa');
	}

	public function aksi_edit($nis)
	{
		$data = array(
			'nis' 		=> $this->input->post('nis'),
			'nama'  	=> $this->input->post('nama'),
			'password' 	=> md5($this->input->post('password')),
			'id_kelas' 	=> $this->input->post('id_kelas'),
			'alamat' 	=> $this->input->post('alamat'),
			'no_tlp' 	=> $this->input->post('no_tlp'),
			'id_spp' 	=> $this->input->post('id_spp')
		);

		$this->db->where('nis', $nis);

		$this->db->update('siswa', $data);

		$this->session->set_flashdata('edit', 'Data berhasil diubah');

		redirect('vendor/data-siswa');
	}

	public function hapussiswa($nis)
	{
		$this->db->where('nis', $nis);
		
		$this->db->delete('siswa');

		$this->session->set_flashdata('hapus', 'Data berhasil dihapus');

		redirect('vendor/data-siswa');
	}

}
