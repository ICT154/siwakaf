<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_log');
    }





    function wakaf_sawah_edit()
    {
        $data = array(
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            // 'ket_g' => "masjid"
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_wakaf", $data);


        $data_2 = array(

            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            // 'ket' => "masjid"
        );

        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pengelola", $data_2);

        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pimpinan", $data_3);
        $this->M_log->log_in("UBAH DATA WAKAF DAN PENGELOLAAN BARU " . $this->input->post('id_data_wakaf') . "");
        redirect(base_url("dash/wakaf_sawah"));
    }

    function wakaf_lainnya_edit()
    {
        $data = array(
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            // 'ket_g' => "masjid"
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_wakaf", $data);


        $data_2 = array(

            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            // 'ket' => "masjid"
        );

        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pengelola", $data_2);

        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pimpinan", $data_3);
        $this->M_log->log_in("UBAH DATA WAKAF DAN PENGELOLAAN BARU " . $this->input->post('id_data_wakaf') . "");
        redirect(base_url("dash/wakaf_lainnya"));
    }

    function wakaf_lainnya_add()
    {
        $data = array(
            'id_data_wakaf' => $id_data = "DW-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            'ket_g' => "wakaf_lainnya"
        );
        $this->db->insert("t_data_wakaf", $data);

        $data_2 = array(
            'id_data_pengelola' =>  "DP-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            'ket' => "wakaf_lainnya"
        );

        $this->db->insert("t_data_pengelola", $data_2);
        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );

        $this->db->insert("t_data_pimpinan", $data_3);

        $this->M_log->log_in("TAMBAH DATA WAKAF DAN PENGELOLAAN BARU " . $id_data . "");
        redirect(base_url("dash/wakaf_lainnya"));
    }


    function wakaf_sawah_add()
    {
        $data = array(
            'id_data_wakaf' => $id_data = "DW-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            'ket_g' => "sawah"
        );
        $this->db->insert("t_data_wakaf", $data);

        $data_2 = array(
            'id_data_pengelola' =>  "DP-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            'ket' => "sawah"
        );

        $this->db->insert("t_data_pengelola", $data_2);
        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );

        $this->db->insert("t_data_pimpinan", $data_3);

        $this->M_log->log_in("TAMBAH DATA WAKAF DAN PENGELOLAAN BARU " . $id_data . "");
        redirect(base_url("dash/wakaf_sawah"));
    }




    function wakaf_pesantren_edit()
    {
        $data = array(
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            // 'ket_g' => "masjid"
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_wakaf", $data);


        $data_2 = array(

            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            // 'ket' => "masjid"
        );

        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pengelola", $data_2);

        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pimpinan", $data_3);
        $this->M_log->log_in("UBAH DATA WAKAF DAN PENGELOLAAN BARU " . $this->input->post('id_data_wakaf') . "");
        redirect(base_url("dash/wakaf_pesantren"));
    }



    function wakaf_pesantren_add()
    {
        $data = array(
            'id_data_wakaf' => $id_data = "DW-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            'ket_g' => "pesantren"
        );
        $this->db->insert("t_data_wakaf", $data);

        $data_2 = array(
            'id_data_pengelola' =>  "DP-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            'ket' => "pesantren"
        );

        $this->db->insert("t_data_pengelola", $data_2);
        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );

        $this->db->insert("t_data_pimpinan", $data_3);

        $this->M_log->log_in("TAMBAH DATA WAKAF DAN PENGELOLAAN BARU " . $id_data . "");
        redirect(base_url("dash/wakaf_pesantren"));
    }

    function wakaf_masjid_edit()
    {
        $data = array(
            // 'id_data_wakaf' => $id_data = "DW-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            'ket_g' => "masjid"
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_wakaf", $data);


        $data_2 = array(
            // 'id_data_pengelola' =>  "DP-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            // 'id_data_wakaf' => $id_data,
            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            'ket' => "masjid"
        );

        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pengelola", $data_2);

        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            // 'id_data_wakaf' => $id_data,
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );
        $this->db->where('id_data_wakaf', $this->input->post('id_data_wakaf'));
        $this->db->update("t_data_pimpinan", $data_3);
        $this->M_log->log_in("UBAH DATA WAKAF DAN PENGELOLAAN BARU " . $this->input->post('id_data_wakaf') . "");
        redirect(base_url("dash/wakaf_masjid"));
    }


    function wakaf_masjid_add()
    {
        $data = array(
            'id_data_wakaf' => $id_data = "DW-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'nama_wakif' => htmlspecialchars($this->input->post('nama_wakif')),
            'alamat_wakif' => htmlspecialchars($this->input->post('alamat_wakif')),
            'tanah' => htmlspecialchars($this->input->post('tanah')),
            'luas_tanah' => str_replace(",", "", htmlspecialchars($this->input->post('luas_tanah'))),
            'bangunan' => htmlspecialchars($this->input->post('bangunan')),
            'luas_bangunan' => str_replace(",", "", htmlspecialchars($this->input->post('luas_bangunan'))),
            'peruntukan' => htmlspecialchars($this->input->post('peruntukan')),
            'lokasi_wakaf' => htmlspecialchars($this->input->post('lokasi_wakaf')),
            'persil' => htmlspecialchars($this->input->post('persil')),
            'bastw_reg' => htmlspecialchars($this->input->post('bastw_reg')),
            'bastw_tahun' => htmlspecialchars($this->input->post('bastw_tahun')),
            'ajb' => htmlspecialchars($this->input->post('ajb')),
            'aiw' => htmlspecialchars($this->input->post('aiw')),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat')),
            'date_g' => date("Y-m-d H:i:s"),
            'ket_g' => "masjid"
        );
        $this->db->insert("t_data_wakaf", $data);

        $data_2 = array(
            'id_data_pengelola' =>  "DP-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'nama' => htmlspecialchars($this->input->post('nama')),
            'pengelola' => htmlspecialchars($this->input->post('pengelola')),
            'sk' => htmlspecialchars($this->input->post('sk')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'pola_kemitraan' => htmlspecialchars($this->input->post('pola_kemitraan')),
            'lat' => htmlspecialchars($this->input->post('lat')),
            'lng' => htmlspecialchars($this->input->post('lng')),
            'ket' => "masjid"
        );

        $this->db->insert("t_data_pengelola", $data_2);


        $data_3 = array(
            'id_data_pimpinan' => "DPC-" . str_replace("-", "", date("Y-m-d")) . "-" . rand() . "",
            'id_data_wakaf' => $id_data,
            'ketua_nazir' => htmlspecialchars($this->input->post('ketua_nazir')),
            'pimpinan_cabang' => htmlspecialchars($this->input->post('pimpinan_cabang')),
            'ketua_pimpinan_cabang' => htmlspecialchars($this->input->post('ketua_pimpinan_cabang')),
            'bidgar_wakaf' => htmlspecialchars($this->input->post('bidgar_wakaf')),
        );

        $this->db->insert("t_data_pimpinan", $data_3);

        $this->M_log->log_in("TAMBAH DATA WAKAF DAN PENGELOLAAN BARU " . $id_data . "");
        redirect(base_url("dash/wakaf_masjid"));
    }
}

/* End of file Proses.php */
