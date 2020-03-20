<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|md5'
        )
    ),
    'loginsiswa' => array(
        array(
            'field' => 'nis',
            'label' => 'NIS',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|md5'
        )
    ),
);