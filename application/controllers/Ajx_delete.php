<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Ajx_delete extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user') == '') {
            redirect('auth');
        }
        $this->load->model('M_data');
        $this->load->model('M_log');
        $this->load->model('M_function');
    }


    function ajx_delete_v2()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->where('id_data_wakaf', $id);
        $this->db->delete('t_data_wakaf');

        $this->M_log->log_in('HAPUS DATA WAKAF ' . $id . '');

        $this->db->where('id_data_wakaf', $id);
        $this->db->delete('t_data_pimpinan');

        $this->M_log->log_in('HAPUS DATA PIMPINAN ' . $id . '');

        $this->db->where('id_data_wakaf', $id);
        $this->db->delete('t_data_pengelola');

        $this->M_log->log_in('HAPUS DATA PENGELOLA ' . $id . '');

        $url = base_url('dash/wakaf_masjid');
        echo "<script>
                    Swal.fire(
                        'Success !',
                        'Data Dihapus!',
                        'success'
                        )
                        javascript:history.back()
                </script>";
    }




    function ajx_delete_peruntukan()
    {
        $id = $this->input->post('id');
        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_akt_penerimaan');


        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_bangunan_lain');


        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_inven_masjid');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_luas');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_pemberi');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_penerima');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_peruntukan');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_saksi');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('t_wakaf_sertifikat');

        $this->db->where('id_penerimaan_wakaf', $id);
        $this->db->delete('gambar');

        $url = base_url('dash/pen_wakaf');
        echo "<script>
                    Swal.fire(
                        'Success !',
                        'Data Dihapus!',
                        'success'
                        )
                        javascript:history.back()
                </script>";
    }



    function ajx_delete()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $id_tb = htmlspecialchars($this->input->post('id_tb'));
        $tb = htmlspecialchars($this->input->post('tb'));

        $this->db->where($id_tb, $id);
        $this->db->delete($tb);

        $this->M_log->log_in('HAPUS DATA ' . $tb . ' | ' . $id . '');

        $url = base_url('dash/investmen_instrument');
        echo "<script>
                    Swal.fire(
                        'Success !',
                        'Data Dihapus!',
                        'success'
                        )
                        javascript:history.back()
                </script>";
    }
}
