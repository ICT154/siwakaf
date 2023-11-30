<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_log');
    }

    function data_wakaf_sv_edit()
    {
        try {
            $data_muwakif = array(
                "NAMA_MUWAKIF" => htmlspecialchars($this->input->post('nama_muwakif')),
                "ALAMAT_MUWAKIF" => htmlspecialchars($this->input->post('alamat_muwakif')),
            );
            $this->db->where("ID", $this->input->post('id_muwakif'));
            $this->db->update("muwakif", $data_muwakif);

            $data_nadzir = array(
                "NAMA_NADZIR" => htmlspecialchars($this->input->post('nama_nadzhir')),
                "ALAMAT_NADZIR" => htmlspecialchars($this->input->post('alamat_nadzhir')),
            );
            $this->db->where("ID", $this->input->post('id_nadzir'));
            $this->db->update("nadzir", $data_nadzir);

            $objek_wakaf = array(
                "NO_OBJEK" => htmlspecialchars($this->input->post('objek_no')),
                "JENIS_TANAH" => htmlspecialchars($this->input->post('jenis_tanah_wakaf')),
                "LUAS_TANAH" =>  htmlspecialchars($this->input->post('luas_tanah_wakaf')),
                "LOKASI_TANAH" => htmlspecialchars($this->input->post('alamat_tanah')),
                "LUAS_BANGUNAN" =>  htmlspecialchars($this->input->post('luas_bangunan_wakaf')),

                "FUNGSI_WAKAF" => htmlspecialchars($this->input->post('fungsi_wakaf')),
                "LUAS_FUNGSI" => htmlspecialchars($this->input->post('luas_tanah_wakaf_fungsi')),
                "LUAS_BANGUNAN_FUNGSI" =>  htmlspecialchars($this->input->post('luas_bangunan_wakaf_fungsi')),
                "NAMA_PENGELOLA" => htmlspecialchars($this->input->post('nama_pengelola')),
                "STATUS_WAKAF" => htmlspecialchars($this->input->post('kategori_wakaf')),
                "BASTW_NOMOR" => htmlspecialchars($this->input->post('nomor_bastw')),
                "AIW_NOMOR" => htmlspecialchars($this->input->post('no_awi_ppawi')),
                "SERTIFIKAT_NOMOR" => htmlspecialchars($this->input->post('no_sertifikat_ajb')),

                "TANGGAL_BASTW" => htmlspecialchars($this->input->post('tgl_bastw')),
                "TANGGAL_AIW" => htmlspecialchars($this->input->post('tgl_awi_ppaiw')),
                "TANGGAL_SERTIFIKAT" => htmlspecialchars($this->input->post('tgl_sertifikat_ajb')),

                "JAMAAH" => htmlspecialchars($this->input->post('jamaah')),
                "RANTING" => htmlspecialchars($this->input->post('ranting')),
                "CABANG" => htmlspecialchars($this->input->post('cabang')),
                "KATEGORI_WAKAF" => htmlspecialchars($this->input->post('kategori_wakaf')),
                "date_g" => date("Y-m-d H:i:s"),

                "LATITUDE" => htmlspecialchars($this->input->post('lat')),
                "LONGITUDE" => htmlspecialchars($this->input->post('lng')),

                "NGOPTANAH" => htmlspecialchars($this->input->post('ngoptanah')),
                "NGOPBANGUNAN" => htmlspecialchars($this->input->post('ngopbangunan')),
            );
            $this->db->where("ID", $this->input->post('id_objek_wakaf'));
            $this->db->update("objekwakaf", $objek_wakaf);

            $this->M_log->log_in("UBAH OBJEK WAKAF BARU " . $this->input->post('id_data_wakaf') . "");
            $this->M_log->show_msg("success", "Data Berhasil Diubah");
            redirect(base_url("dash/data_wakaf_"));
        } catch (\Throwable $th) {
            $this->M_log->show_msg("danger", "Data Gagal Diubah . " . $th->getMessage() . "");
            redirect(base_url("dash/data_wakaf_"));
        }
    }


    function data_wakaf_sv()
    {
        try {
            $data_muwakif = array(
                "ID" => $id_data_muwakif = "DM" . str_replace("-", "", date("Y-m-d")) . "" . rand() . "",
                "NAMA_MUWAKIF" => htmlspecialchars($this->input->post('nama_muwakif')),
                "ALAMAT_MUWAKIF" => htmlspecialchars($this->input->post('alamat_muwakif')),
            );
            $this->db->insert("muwakif", $data_muwakif);

            $data_nadzir = array(
                "ID" => $id_data_nadzir = "DN" . str_replace("-", "", date("Y-m-d")) . "" . rand() . "",
                "MUWAKIF_ID" => $id_data_muwakif,
                "NAMA_NADZIR" => htmlspecialchars($this->input->post('nama_nadzhir')),
                "ALAMAT_NADZIR" => htmlspecialchars($this->input->post('alamat_nadzhir')),
            );
            $this->db->insert("nadzir", $data_nadzir);

            $objek_wakaf = array(
                "ID" => $id_data_wakaf = "DW" . str_replace("-", "", date("Y-m-d")) . "" . rand() . "",
                "MUWAKIF_ID" => $id_data_muwakif,
                "NO_OBJEK" => htmlspecialchars($this->input->post('objek_no')),
                "JENIS_TANAH" => htmlspecialchars($this->input->post('jenis_tanah_wakaf')),
                "LUAS_TANAH" =>  htmlspecialchars($this->input->post('luas_tanah_wakaf')),
                "LOKASI_TANAH" => htmlspecialchars($this->input->post('alamat_tanah')),
                "LUAS_BANGUNAN" =>  htmlspecialchars($this->input->post('luas_bangunan_wakaf')),

                "FUNGSI_WAKAF" => htmlspecialchars($this->input->post('fungsi_wakaf')),
                "LUAS_FUNGSI" => htmlspecialchars($this->input->post('luas_tanah_wakaf_fungsi')),
                "LUAS_BANGUNAN_FUNGSI" =>  htmlspecialchars($this->input->post('luas_bangunan_wakaf_fungsi')),
                "NAMA_PENGELOLA" => htmlspecialchars($this->input->post('nama_pengelola')),
                "STATUS_WAKAF" => htmlspecialchars($this->input->post('kategori_wakaf')),
                "BASTW_NOMOR" => htmlspecialchars($this->input->post('nomor_bastw')),
                "AIW_NOMOR" => htmlspecialchars($this->input->post('no_awi_ppawi')),
                "SERTIFIKAT_NOMOR" => htmlspecialchars($this->input->post('no_sertifikat_ajb')),

                "TANGGAL_BASTW" => htmlspecialchars($this->input->post('tgl_bastw')),
                "TANGGAL_AIW" => htmlspecialchars($this->input->post('tgl_awi_ppaiw')),
                "TANGGAL_SERTIFIKAT" => htmlspecialchars($this->input->post('tgl_sertifikat_ajb')),

                "JAMAAH" => htmlspecialchars($this->input->post('jamaah')),
                "RANTING" => htmlspecialchars($this->input->post('ranting')),
                "CABANG" => htmlspecialchars($this->input->post('cabang')),
                "KATEGORI_WAKAF" => htmlspecialchars($this->input->post('kategori_wakaf')),
                "date_g" => date("Y-m-d H:i:s"),

                "LATITUDE" => htmlspecialchars($this->input->post('lat')),
                "LONGITUDE" => htmlspecialchars($this->input->post('lng')),

                "NGOPTANAH" => htmlspecialchars($this->input->post('ngoptanah')),
                "NGOPBANGUNAN" => htmlspecialchars($this->input->post('ngopbangunan')),
            );
            $this->db->insert("objekwakaf", $objek_wakaf);

            $this->M_log->log_in("TAMBAH OBJEK WAKAF BARU " . $this->input->post('id_data_wakaf') . "");
            $this->M_log->show_msg("success", "Data Berhasil Ditambahkan");
            redirect(base_url("dash/data_wakaf_"));
        } catch (\Throwable $th) {
            $this->M_log->show_msg("danger", "Data Gagal Ditambahkan . " . $th->getMessage() . "");
            redirect(base_url("dash/data_wakaf_"));
        }
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
