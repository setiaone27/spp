<?php

Class M_login extends CI_Model{

	public function logged_id()
	{
		return $this->session->userdata('user_id');
	}

    public function checkLogin()
    {
        $username=$this->input->post('username',true);
        $password=$this->input->post('password',true);
        return $this->db->where('username',$username)->where('password',$password)
        ->get('petugas')->row();

    }

    public function hitungPetugas()
    {
        $query = $this->db->query("SELECT COUNT(*) AS totaluser FROM user");
        return $query->result();
    }
}

