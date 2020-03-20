<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{

	public function search($keyword)
	{
		$this->db->like('nis', $keyword);

    	$this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas', 'left');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp', 'left');
        $query = $this->db->get();
        return $query->result();
	}

	public function search2($keyword)
	{
		$this->db->like('nis', $keyword);

    	$this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp', 'left');
        
        $query = $this->db->get();
        return $query->result();
	}
}