<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model{

	public function getAll()
	{
    	$this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas=petugas.id_petugas', 'left');
        $this->db->join('siswa', 'pembayaran.nis=siswa.nis', 'left');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp', 'left');
        $this->db->order_by('id_pembayaran','DESC');
        $query = $this->db->get();
        return $query->result();
	}

}