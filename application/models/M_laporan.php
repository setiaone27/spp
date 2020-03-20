<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model{

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

    public function getSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas', 'left');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPembayaran()
    {
        $this->db->select('pembayaran.id_petugas,pembayaran.tgl,pembayaran.id_spp, pembayaran.bulan_dibayar, pembayaran.tahun_dibayar, pembayaran.jumlah_bayar, petugas.id_petugas, petugas.nama_petugas, petugas.level, spp.*');
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas=petugas.id_petugas', 'left');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp', 'left');
        $query = $this->db->get();
        return $query->result();
    }

}