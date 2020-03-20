<?php

Class M_login_siswa extends CI_Model{

	public function logged_id()
	{
		return $this->session->userdata('user_id');
	}

    public function checkLogin()
    {
        $nis=$this->input->post('nis',true);
        $password=$this->input->post('password',true);
        return $this->db->where('nis',$nis)->where('password',$password)
        ->get('siswa')->row();

    }
}

