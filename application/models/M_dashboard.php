<?php

Class M_dashboard extends CI_Model{

    public function hitungSiswa()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totalsiswa FROM siswa");
        return $query->result();
    }

    public function hitungKelas()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totalkelas FROM kelas");
        return $query->result();
    }

    public function hitungPetugas()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totalpetugas FROM petugas");
        return $query->result();
    }

    public function hitungkk()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totalkk FROM kompetensi_keahlian");
        return $query->result();
    }

   	public function getPembayaran()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas=petugas.id_petugas', 'left');
        $this->db->join('spp', 'pembayaran.id_spp=spp.id_spp', 'left');
        $this->db->join('siswa', 'pembayaran.nis=siswa.nis', 'left');
        $this->db->limit(5);
        $this->db->order_by('id_pembayaran','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKompetensi()
    {
        $query = $this->db->query("SELECT * FROM kompetensi_keahlian");
        return $query->result();
    }
}