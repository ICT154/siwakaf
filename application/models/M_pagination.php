<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pagination extends CI_Model
{

    function count($db)
    {
        return $this->db->get($db)->num_rows();
    }

    function data($db, $number, $offset)
    {
        return $query = $this->db->get($db, $number, $offset)->result();
    }
}

/* End of file M_pagination.php */
