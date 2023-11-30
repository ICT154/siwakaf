<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Printx extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('pdf');
        $this->load->model('M_gzl');
        $this->load->model('M_log');
    }

    public function index()
    {
    }

    function print($id)
    {
        $id_objek_wakaf = $id;
        // $id_objek_wakaf = $this->input->post('id');

        $data_objek_wakaf = $this->db->get_where("objekwakaf", array("ID" => $id_objek_wakaf), 1);

        if ($data_objek_wakaf->num_rows() > 0) {
            $data_objek_wakaf = $data_objek_wakaf->row_array();
            $muwakif = $this->db->get_where('muwakif', ['id' => $data_objek_wakaf['MUWAKIF_ID']])->row_array();
            $nadzir = $this->db->get_where('nadzir', ['MUWAKIF_ID' => $data_objek_wakaf['MUWAKIF_ID']])->row_array();

            $user = $this->db->get_where('t_admin', ['username' => $data_objek_wakaf['ADD_BY']])->row_array();

            $html = $this->load->view('layout/print_data_wakaf', array(
                'data_objek_wakaf' => $data_objek_wakaf,
                'muwakif' => $muwakif,
                'nadzir' => $nadzir,
                "user" => $user
            ), true);

            $this->pdf->to_browser($html, 'html', 'Legal');
        } else {
            echo "Data tidak ditemukan";
        }
    }
}

/* End of file Print.php */
