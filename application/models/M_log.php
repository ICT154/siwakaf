<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_log extends CI_Model
{
    function log_in($ngapain)
    {
        $data = array(
            'id_log' => "" . rand() . "",
            'log_name' => strtoupper($ngapain),
            'username' => $this->session->userdata('user'),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'device' => $_SERVER['HTTP_USER_AGENT'],
            'time' => date("Y-m-d H:i:s"),
        );
        $this->db->insert('t_log_history', $data);
    }
}

/* End of file M_log.php */