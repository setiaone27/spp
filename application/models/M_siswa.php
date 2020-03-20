<?php

Class M_siswa extends CI_Model{

    public function getSiswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas', 'left');
        $this->db->join('spp', 'siswa.id_spp=spp.id_spp', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    // public function getLimitAnggota()
    // {
    //     $query = $this->db->query("SELECT * FROM anggota JOIN divisi ON anggota.divisi_id = divisi.id_divisi LIMIT 5");
    //     return $query->result();
    // }

    // public function hitungAnggota()
    // {
    //     $query = $this->db->query("SELECT COUNT(*) AS totalanggota FROM anggota");
    //     return $query->result();
    // }
}