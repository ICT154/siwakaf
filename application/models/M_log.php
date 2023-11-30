<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_log extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function show_msg($tipe, $msg)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-' . $tipe . '">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
       ' . $msg . '</div>');
    }

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


    function format_tanggal_indonesia($tanggal)
    {
        // Ubah format tanggal menjadi timestamp
        $timestamp = strtotime($tanggal);

        // Buat array dengan nama bulan dalam bahasa Indonesia
        $nama_bulan = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        // Ambil nilai tanggal, bulan, dan tahun dari timestamp
        $hari = date('d', $timestamp);
        $bulan = $nama_bulan[date('n', $timestamp) - 1];
        $tahun = date('Y', $timestamp);

        // Buat string dengan format "tanggal bulan tahun"
        $tanggal_indonesia = $hari . ' ' . $bulan . ' ' . $tahun;

        return $tanggal_indonesia;
    }
}

/* End of file M_log.php */