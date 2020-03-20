<?php

Class M_kelas extends CI_Model{

    public function getKelas()
    {
        $query = $this->db->query("SELECT * FROM kelas JOIN kompetensi_keahlian ON kelas.id_kk = kompetensi_keahlian.id_kk");
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