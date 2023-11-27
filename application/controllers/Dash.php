<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dash extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_data');
        $this->load->model("M_log");
        $this->load->model("M_function");
        $this->load->library('Googlemaps');
        $this->load->model('M_pagination', 'paging');
        if ($this->session->userdata('user') == '') {
            redirect('auth');
        }
    }

    function wakaf_load_form_add_()
    {
        $this->load->view('input_layout/data_wakaf_');
    }


    function data_wakaf_()
    {
        $user = $this->session->userdata('user');

        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/data_wakaf_");
        $config['total_rows'] = $this->paging->count('objekwakaf');
        $config['per_page'] = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data_pagin = $this->paging->data('objekwakaf', $config['per_page'], $from);


        $data['pagin'] = $data_pagin;
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Data Wakaf';
        $data['bred'] = 'Data Wakaf';
        $data['data'] = $this->M_data->getAllresult('t_data_wakaf');

        $this->load->view('templates/header', $data);
        $this->load->view('layout/data_wakaf');
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Profil';
        $data['bred'] = 'Profil';

        $this->load->view('templates/header', $data);
        $this->load->view('dash/adm_profile');
        $this->load->view('templates/footer');
    }

    function logout()
    {
        $this->M_log->log_in("LOGOUT");

        $this->session->unset_userdata(array('user' => ''));
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function adm_a()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Tambah Pengguna';
        $data['bred'] = 'Tambah Pengguna';
        $data['adm'] = $this->M_data->getAllresult('t_admin');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/adm_pengguna_add');
        $this->load->view('templates/footer');
    }

    public function ajx_c_p_a()
    {
        $passl = htmlspecialchars($this->input->post('l'));
        $passb = htmlspecialchars($this->input->post('pb'));
        $passbk = htmlspecialchars($this->input->post('pbk'));

        $user = $this->session->userdata('user');
        $userr = $this->M_data->getWhere('t_admin', 'username', $user);

        if ($passl == $userr['password']) {
            if ($passb == $passbk) {
                $this->M_data->change_pw($user, $passb);
                echo "<div class='alert alert-success'>
                Password Berhasil Diubah !
                </div>";
                $this->M_log->log_in("UBAH PASSWORD ");
                redirect('dash/profil');
            } else {
                $this->M_log->log_in("GAGAL UBAH PASSWORD ");
                echo "<div class='alert alert-danger'>
                Password Baru Tidak Sama  !
                </div>";
            }
        } else {
            $this->M_log->log_in("GAGAL UBAH PASSWORD ");

            echo "<div class='alert alert-danger'>
            Password Lama Salah !
            </div>";
        }
    }

    public function ajx_a_adm()
    {
        $username = htmlspecialchars($this->input->post('inputUsername'));
        $nama = htmlspecialchars($this->input->post('inputNama'));
        $email = htmlspecialchars($this->input->post('inputEmail'));

        $this->M_log->log_in("TAMBAH PENGGUNA BARU  " . $username . "");
        $this->M_data->into_adm($username, $username, $nama, $email);
    }

    public function ajx_del_adm()
    {
        $name = htmlspecialchars($this->input->post('id'));
        $this->M_log->log_in("HAPUS PENGGUNA  " . $name . "");
        $this->db->query("DELETE FROM `t_admin` WHERE `t_admin`.`username` = '$name' ");

        redirect(base_url("dash/pengguna"));

        //$this->M_data->del_adm($id);
    }

    public function pengguna()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Pengguna';
        $data['bred'] = 'Pengguna';
        $data['adm'] = $this->M_data->getAllresult('t_admin');

        $this->load->view('templates/header', $data);
        $this->load->view('date-time/date-time');
        $this->load->view('dash/adm_pengguna');
        $this->load->view('templates/footer');
    }

    public function log_history()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Log History';
        $data['bred'] = 'Log History';
        $data['log'] = $this->M_data->getRessLog();

        $this->load->view('templates/header', $data);
        $this->load->view('dash/log_history');
        $this->load->view('templates/footer');
    }

    function peta_()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peta';
        $data['bred'] = 'Peta';
        //  $data['peta'] = $this->M_data->queJoinTb();
        $data['key'] = "";
        // $data['pep'] = $this->M_data->queJoinTbArr();

        $this->load->view('templates/header', $data);
        $this->load->view('peta/peta_v3');
        // $this->load->view('peta/peta_js');
        $this->load->view('templates/footer');
    }


    function wakaf_lainnya_edit($id)
    {
        if ($id == '') {
            redirect(base_url("dash/wakaf_lainnya"));
        } else {
            $cek_usr = $this->db->get_where("t_data_wakaf", array("id_data_wakaf " => $id));
            if ($cek_usr->num_rows() > 0) {
                $get_data = $this->db->get_where("t_data_wakaf", array("id_data_wakaf" => $id))->row_array();
                $get_pc = $this->db->get_where("t_data_pimpinan", array("id_data_wakaf" => $id))->row_array();
                $get_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $id))->row_array();
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Wakaf Lainnya';
                $data['bred'] = 'Ubah Data Wakaf Lainnya';

                $data['page'] = 'edit';

                $obj = new stdClass;
                $obj->id_data_wakaf = $get_data['id_data_wakaf'];
                $obj->nama_wakif = $get_data['nama_wakif'];
                $obj->alamat_wakif = $get_data['alamat_wakif'];
                $obj->tanah = $get_data['tanah'];
                $obj->luas_tanah = $get_data['luas_tanah'];
                $obj->bangunan = $get_data['bangunan'];
                $obj->luas_bangunan = $get_data['luas_bangunan'];
                $obj->peruntukan = $get_data['peruntukan'];
                $obj->lokasi_wakaf = $get_data['lokasi_wakaf'];
                $obj->persil = $get_data['persil'];
                $obj->bastw_reg = $get_data['bastw_reg'];
                $obj->bastw_tahun = $get_data['bastw_tahun'];
                $obj->ajb = $get_data['ajb'];
                $obj->aiw = $get_data['aiw'];
                $obj->sertifikat = $get_data['sertifikat'];

                $obj->id_data_pengelola = $get_pengelola['id_data_pengelola'];
                // $obj->id_data_wakaf = $get_pengelola['id_data_wakaf'];
                $obj->nama = $get_pengelola['nama'];
                $obj->pengelola = $get_pengelola['pengelola'];
                $obj->sk = $get_pengelola['sk'];
                $obj->lokasi = $get_pengelola['lokasi'];
                $obj->pola_kemitraan = $get_pengelola['pola_kemitraan'];
                $obj->lat = $get_pengelola['lat'];
                $obj->lng = $get_pengelola['lng'];


                $obj->id_data_pimpinan = $get_pc['id_data_pimpinan'];
                // $obj->id_data_wakaf = $get_pc['id_data_wakaf'];
                $obj->ketua_nazir = $get_pc['ketua_nazir'];
                $obj->pimpinan_cabang = $get_pc['pimpinan_cabang'];
                $obj->ketua_pimpinan_cabang = $get_pc['ketua_pimpinan_cabang'];
                $obj->bidgar_wakaf = $get_pc['bidgar_wakaf'];

                $data['bow'] = $obj;

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/wakaf_lainnya');
                $this->load->view('maps/maps_modal');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/wakaf_lainnya"));
            }
        }
    }

    function wakaf_lainnya()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Data Wakaf Lainnya';
        $data['bred'] = 'Data Wakaf Lainnya';
        $get_wakaf_masjid = $this->db->get_where("t_data_wakaf", array("ket_g" => "wakaf_lainnya"));

        $jumlah_data = $get_wakaf_masjid->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/wakaf_lainnya");
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['data'] = $this->M_function->data_xxx('t_data_wakaf', $config['per_page'], $from, "wakaf_lainnya");

        $this->load->view('templates/header', $data);
        $this->load->view('layout/wakaf_lainnya');
        $this->load->view('layout/addon_css');
        $this->load->view('templates/footer');
    }

    function wakaf_lainnya_add()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf Lainnya';
        $data['bred'] = 'Penerimaan Wakaf Lainnya';

        $data['page'] = 'add';
        $obj = new stdClass;
        $obj->id_data_wakaf = null;
        $obj->nama_wakif = null;
        $obj->alamat_wakif = null;
        $obj->tanah = null;
        $obj->luas_tanah = null;
        $obj->bangunan = null;
        $obj->luas_bangunan = null;
        $obj->peruntukan = null;
        $obj->lokasi_wakaf = null;
        $obj->persil = null;
        $obj->bastw_reg = null;
        $obj->bastw_tahun = null;
        $obj->ajb = null;
        $obj->aiw = null;
        $obj->sertifikat = null;

        $obj->id_data_pengelola = null;
        $obj->id_data_wakaf = null;
        $obj->nama = null;
        $obj->pengelola = null;
        $obj->sk = null;
        $obj->lokasi = null;
        $obj->pola_kemitraan = null;
        $obj->lat = null;
        $obj->lng = null;


        $obj->id_data_pimpinan = null;
        $obj->id_data_wakaf = null;
        $obj->ketua_nazir = null;
        $obj->pimpinan_cabang = null;
        $obj->ketua_pimpinan_cabang = null;
        $obj->bidgar_wakaf = null;

        $data['bow'] = $obj;

        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/wakaf_lainnya');
        $this->load->view('maps/maps_modal');
        $this->load->view('templates/footer');
    }


    function wakaf_sawah_edit($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/wakaf_pesantren"));
        } else {
            $cek_usr = $this->db->get_where("t_data_wakaf", array("id_data_wakaf " => $id));
            if ($cek_usr->num_rows() > 0) {
                $get_data = $this->db->get_where("t_data_wakaf", array("id_data_wakaf" => $id))->row_array();
                $get_pc = $this->db->get_where("t_data_pimpinan", array("id_data_wakaf" => $id))->row_array();
                $get_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $id))->row_array();
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Wakaf Pesantren';
                $data['bred'] = 'Ubah Data Wakaf Pesantren';

                $data['page'] = 'edit';

                $obj = new stdClass;
                $obj->id_data_wakaf = $get_data['id_data_wakaf'];
                $obj->nama_wakif = $get_data['nama_wakif'];
                $obj->alamat_wakif = $get_data['alamat_wakif'];
                $obj->tanah = $get_data['tanah'];
                $obj->luas_tanah = $get_data['luas_tanah'];
                $obj->bangunan = $get_data['bangunan'];
                $obj->luas_bangunan = $get_data['luas_bangunan'];
                $obj->peruntukan = $get_data['peruntukan'];
                $obj->lokasi_wakaf = $get_data['lokasi_wakaf'];
                $obj->persil = $get_data['persil'];
                $obj->bastw_reg = $get_data['bastw_reg'];
                $obj->bastw_tahun = $get_data['bastw_tahun'];
                $obj->ajb = $get_data['ajb'];
                $obj->aiw = $get_data['aiw'];
                $obj->sertifikat = $get_data['sertifikat'];

                $obj->id_data_pengelola = $get_pengelola['id_data_pengelola'];
                // $obj->id_data_wakaf = $get_pengelola['id_data_wakaf'];
                $obj->nama = $get_pengelola['nama'];
                $obj->pengelola = $get_pengelola['pengelola'];
                $obj->sk = $get_pengelola['sk'];
                $obj->lokasi = $get_pengelola['lokasi'];
                $obj->pola_kemitraan = $get_pengelola['pola_kemitraan'];
                $obj->lat = $get_pengelola['lat'];
                $obj->lng = $get_pengelola['lng'];


                $obj->id_data_pimpinan = $get_pc['id_data_pimpinan'];
                // $obj->id_data_wakaf = $get_pc['id_data_wakaf'];
                $obj->ketua_nazir = $get_pc['ketua_nazir'];
                $obj->pimpinan_cabang = $get_pc['pimpinan_cabang'];
                $obj->ketua_pimpinan_cabang = $get_pc['ketua_pimpinan_cabang'];
                $obj->bidgar_wakaf = $get_pc['bidgar_wakaf'];

                $data['bow'] = $obj;

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/wakaf_pesantren');
                $this->load->view('maps/maps_modal');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/wakaf_masjid"));
            }
        }
    }


    function wakaf_sawah()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Data Wakaf Tanah Darat / Sawah';
        $data['bred'] = 'Data Wakaf Tanah Darat / Sawah';
        $get_wakaf_masjid = $this->db->get_where("t_data_wakaf", array("ket_g" => "sawah"));


        $jumlah_data = $get_wakaf_masjid->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/wakaf_pesantren");
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['data'] = $this->M_function->data_xxx('t_data_wakaf', $config['per_page'], $from, "sawah");


        $this->load->view('templates/header', $data);
        $this->load->view('layout/wakaf_sawah');
        $this->load->view('layout/addon_css');
        $this->load->view('templates/footer');
    }

    function wakaf_sawah_add()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf Tanah Darat / Sawah';
        $data['bred'] = 'Penerimaan Wakaf Tanah Darat / Sawah';

        $data['page'] = 'add';
        $obj = new stdClass;
        $obj->id_data_wakaf = null;
        $obj->nama_wakif = null;
        $obj->alamat_wakif = null;
        $obj->tanah = null;
        $obj->luas_tanah = null;
        $obj->bangunan = null;
        $obj->luas_bangunan = null;
        $obj->peruntukan = null;
        $obj->lokasi_wakaf = null;
        $obj->persil = null;
        $obj->bastw_reg = null;
        $obj->bastw_tahun = null;
        $obj->ajb = null;
        $obj->aiw = null;
        $obj->sertifikat = null;

        $obj->id_data_pengelola = null;
        $obj->id_data_wakaf = null;
        $obj->nama = null;
        $obj->pengelola = null;
        $obj->sk = null;
        $obj->lokasi = null;
        $obj->pola_kemitraan = null;
        $obj->lat = null;
        $obj->lng = null;


        $obj->id_data_pimpinan = null;
        $obj->id_data_wakaf = null;
        $obj->ketua_nazir = null;
        $obj->pimpinan_cabang = null;
        $obj->ketua_pimpinan_cabang = null;
        $obj->bidgar_wakaf = null;

        $data['bow'] = $obj;

        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/wakaf_sawah');
        $this->load->view('maps/maps_modal');
        $this->load->view('templates/footer');
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Dashboard';
        $data['bred'] = 'Dashboard';

        $data['hit_all'] = $this->db->get("t_data_wakaf")->num_rows();
        $data['hit_masjid'] = $this->db->get_where("t_data_wakaf", array("ket_g" => "masjid"))->num_rows();
        $data['hit_pesantren'] = $this->db->get_where("t_data_wakaf", array("ket_g" => "pesantren"))->num_rows();
        $data['hit_sawah'] = $this->db->get_where("t_data_wakaf", array("ket_g" => "sawah"))->num_rows();
        $data['hit_lainnya'] = $this->db->get_where("t_data_wakaf", array("ket_g" => "wakaf_lainnya"))->num_rows();


        $this->load->view('templates/header', $data);
        $this->load->view('layout/dash');
        $this->load->view('templates/footer');
    }


    function wakaf_pesantren_edit($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/wakaf_pesantren"));
        } else {
            $cek_usr = $this->db->get_where("t_data_wakaf", array("id_data_wakaf " => $id));
            if ($cek_usr->num_rows() > 0) {
                $get_data = $this->db->get_where("t_data_wakaf", array("id_data_wakaf" => $id))->row_array();
                $get_pc = $this->db->get_where("t_data_pimpinan", array("id_data_wakaf" => $id))->row_array();
                $get_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $id))->row_array();
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Wakaf Pesantren';
                $data['bred'] = 'Ubah Data Wakaf Pesantren';

                $data['page'] = 'edit';

                $obj = new stdClass;
                $obj->id_data_wakaf = $get_data['id_data_wakaf'];
                $obj->nama_wakif = $get_data['nama_wakif'];
                $obj->alamat_wakif = $get_data['alamat_wakif'];
                $obj->tanah = $get_data['tanah'];
                $obj->luas_tanah = $get_data['luas_tanah'];
                $obj->bangunan = $get_data['bangunan'];
                $obj->luas_bangunan = $get_data['luas_bangunan'];
                $obj->peruntukan = $get_data['peruntukan'];
                $obj->lokasi_wakaf = $get_data['lokasi_wakaf'];
                $obj->persil = $get_data['persil'];
                $obj->bastw_reg = $get_data['bastw_reg'];
                $obj->bastw_tahun = $get_data['bastw_tahun'];
                $obj->ajb = $get_data['ajb'];
                $obj->aiw = $get_data['aiw'];
                $obj->sertifikat = $get_data['sertifikat'];

                $obj->id_data_pengelola = $get_pengelola['id_data_pengelola'];
                // $obj->id_data_wakaf = $get_pengelola['id_data_wakaf'];
                $obj->nama = $get_pengelola['nama'];
                $obj->pengelola = $get_pengelola['pengelola'];
                $obj->sk = $get_pengelola['sk'];
                $obj->lokasi = $get_pengelola['lokasi'];
                $obj->pola_kemitraan = $get_pengelola['pola_kemitraan'];
                $obj->lat = $get_pengelola['lat'];
                $obj->lng = $get_pengelola['lng'];


                $obj->id_data_pimpinan = $get_pc['id_data_pimpinan'];
                // $obj->id_data_wakaf = $get_pc['id_data_wakaf'];
                $obj->ketua_nazir = $get_pc['ketua_nazir'];
                $obj->pimpinan_cabang = $get_pc['pimpinan_cabang'];
                $obj->ketua_pimpinan_cabang = $get_pc['ketua_pimpinan_cabang'];
                $obj->bidgar_wakaf = $get_pc['bidgar_wakaf'];

                $data['bow'] = $obj;

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/wakaf_pesantren');
                $this->load->view('maps/maps_modal');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/wakaf_masjid"));
            }
        }
    }


    function wakaf_pesantren()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Data Wakaf Pesantren';
        $data['bred'] = 'Data Wakaf Pesantren';
        $get_wakaf_masjid = $this->db->get_where("t_data_wakaf", array("ket_g" => "pesantren"));


        $jumlah_data = $get_wakaf_masjid->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/wakaf_pesantren");
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['data'] = $this->M_function->data_xxx('t_data_wakaf', $config['per_page'], $from, "pesantren");


        $this->load->view('templates/header', $data);
        $this->load->view('layout/wakaf_pesantren');
        $this->load->view('layout/addon_css');
        $this->load->view('templates/footer');
    }


    function wakaf_pesantren_add()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf Pesantren';
        $data['bred'] = 'Penerimaan Wakaf Pesantren';

        $data['page'] = 'add';
        $obj = new stdClass;
        $obj->id_data_wakaf = null;
        $obj->nama_wakif = null;
        $obj->alamat_wakif = null;
        $obj->tanah = null;
        $obj->luas_tanah = null;
        $obj->bangunan = null;
        $obj->luas_bangunan = null;
        $obj->peruntukan = null;
        $obj->lokasi_wakaf = null;
        $obj->persil = null;
        $obj->bastw_reg = null;
        $obj->bastw_tahun = null;
        $obj->ajb = null;
        $obj->aiw = null;
        $obj->sertifikat = null;

        $obj->id_data_pengelola = null;
        $obj->id_data_wakaf = null;
        $obj->nama = null;
        $obj->pengelola = null;
        $obj->sk = null;
        $obj->lokasi = null;
        $obj->pola_kemitraan = null;
        $obj->lat = null;
        $obj->lng = null;


        $obj->id_data_pimpinan = null;
        $obj->id_data_wakaf = null;
        $obj->ketua_nazir = null;
        $obj->pimpinan_cabang = null;
        $obj->ketua_pimpinan_cabang = null;
        $obj->bidgar_wakaf = null;

        $data['bow'] = $obj;

        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/wakaf_pesantren');
        $this->load->view('maps/maps_modal');
        $this->load->view('templates/footer');
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    function wakaf_masjid_edit($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/wakaf_masjid"));
        } else {
            $cek_usr = $this->db->get_where("t_data_wakaf", array("id_data_wakaf " => $id));
            if ($cek_usr->num_rows() > 0) {
                $get_data = $this->db->get_where("t_data_wakaf", array("id_data_wakaf" => $id))->row_array();
                $get_pc = $this->db->get_where("t_data_pimpinan", array("id_data_wakaf" => $id))->row_array();
                $get_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $id))->row_array();
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Wakaf Masjid';
                $data['bred'] = 'Ubah Data Wakaf Masjid';

                $data['page'] = 'edit';

                $obj = new stdClass;
                $obj->id_data_wakaf = $get_data['id_data_wakaf'];
                $obj->nama_wakif = $get_data['nama_wakif'];
                $obj->alamat_wakif = $get_data['alamat_wakif'];
                $obj->tanah = $get_data['tanah'];
                $obj->luas_tanah = $get_data['luas_tanah'];
                $obj->bangunan = $get_data['bangunan'];
                $obj->luas_bangunan = $get_data['luas_bangunan'];
                $obj->peruntukan = $get_data['peruntukan'];
                $obj->lokasi_wakaf = $get_data['lokasi_wakaf'];
                $obj->persil = $get_data['persil'];
                $obj->bastw_reg = $get_data['bastw_reg'];
                $obj->bastw_tahun = $get_data['bastw_tahun'];
                $obj->ajb = $get_data['ajb'];
                $obj->aiw = $get_data['aiw'];
                $obj->sertifikat = $get_data['sertifikat'];

                $obj->id_data_pengelola = $get_pengelola['id_data_pengelola'];
                // $obj->id_data_wakaf = $get_pengelola['id_data_wakaf'];
                $obj->nama = $get_pengelola['nama'];
                $obj->pengelola = $get_pengelola['pengelola'];
                $obj->sk = $get_pengelola['sk'];
                $obj->lokasi = $get_pengelola['lokasi'];
                $obj->pola_kemitraan = $get_pengelola['pola_kemitraan'];
                $obj->lat = $get_pengelola['lat'];
                $obj->lng = $get_pengelola['lng'];


                $obj->id_data_pimpinan = $get_pc['id_data_pimpinan'];
                // $obj->id_data_wakaf = $get_pc['id_data_wakaf'];
                $obj->ketua_nazir = $get_pc['ketua_nazir'];
                $obj->pimpinan_cabang = $get_pc['pimpinan_cabang'];
                $obj->ketua_pimpinan_cabang = $get_pc['ketua_pimpinan_cabang'];
                $obj->bidgar_wakaf = $get_pc['bidgar_wakaf'];

                $data['bow'] = $obj;

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/wakaf_masjid');
                $this->load->view('maps/maps_modal');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/wakaf_masjid"));
            }
        }
    }

    function wakaf_masjid()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Data Wakaf Masjid';
        $data['bred'] = 'Data Wakaf Masjid';
        $get_wakaf_masjid = $this->db->get_where("t_data_wakaf", array("ket_g" => "masjid"));


        $jumlah_data = $get_wakaf_masjid->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/wakaf_masjid");
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['data'] = $this->M_function->data_xxx('t_data_wakaf', $config['per_page'], $from, "masjid");


        $this->load->view('templates/header', $data);
        $this->load->view('layout/wakaf_masjid');
        $this->load->view('layout/addon_css');
        $this->load->view('templates/footer');
    }


    function wakaf_masjid_add()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf Masjid';
        $data['bred'] = 'Penerimaan Wakaf Masjid';

        $data['page'] = 'add';
        $obj = new stdClass;
        $obj->id_data_wakaf = null;
        $obj->nama_wakif = null;
        $obj->alamat_wakif = null;
        $obj->tanah = null;
        $obj->luas_tanah = null;
        $obj->bangunan = null;
        $obj->luas_bangunan = null;
        $obj->peruntukan = null;
        $obj->lokasi_wakaf = null;
        $obj->persil = null;
        $obj->bastw_reg = null;
        $obj->bastw_tahun = null;
        $obj->ajb = null;
        $obj->aiw = null;
        $obj->sertifikat = null;

        $obj->id_data_pengelola = null;
        $obj->id_data_wakaf = null;
        $obj->nama = null;
        $obj->pengelola = null;
        $obj->sk = null;
        $obj->lokasi = null;
        $obj->pola_kemitraan = null;
        $obj->lat = null;
        $obj->lng = null;


        $obj->id_data_pimpinan = null;
        $obj->id_data_wakaf = null;
        $obj->ketua_nazir = null;
        $obj->pimpinan_cabang = null;
        $obj->ketua_pimpinan_cabang = null;
        $obj->bidgar_wakaf = null;

        $data['bow'] = $obj;

        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/wakaf_masjid');
        $this->load->view('maps/maps_modal');
        $this->load->view('templates/footer');
    }
}

/* End of file Dash.php */