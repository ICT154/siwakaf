<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_function extends CI_Model
{
    function data($db, $number, $offset)
    {
        $this->db->order_by("date_g", "DESC");
        return $query = $this->db->get($db, $number, $offset)->result();
    }

    function data_where($db, $number, $offset, $where)
    {
        $this->db->order_by("date_g", "DESC");
        $this->db->where($where, $this->session->userdata('user'));
        return $query = $this->db->get($db, $number, $offset)->result();
    }

    function data_xxx($db, $number, $offset, $where)
    {
        $this->db->order_by("date_g", "DESC");
        $this->db->where('ket_g', $where);
        return $query = $this->db->get($db, $number, $offset)->result();
    }
}

/* End of file M_function.php */