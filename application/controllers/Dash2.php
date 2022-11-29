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
        if ($this->session->userdata('user') == '') {
            redirect('auth');
        }
    }


    function wakaf_lainnya_add()
    {
    }

    function edit_penerimaan_wakaf($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/pen_wakaf"));
        } else {
            $cek_usr = $this->db->get_where("t_wakaf_akt_penerimaan", array("id_penerimaan_wakaf " => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Edit Penerimaan Wakaf';
                $data['bred'] = 'Edit Penerimaan Wakaf';
                $data['jn'] = $this->M_data->getAllresult('t_wakaf_jenis');

                $res = $cek_usr->row_array();
                $peruntukan = $this->db->get_where("t_wakaf_peruntukan", array("id_peruntukan" => $res['id_jenis']))->row_array();
                $penerima = $this->db->get_where("t_wakaf_penerima", array("id_penerimaan_wakaf" => $res['id_penerimaan_wakaf']))->row_array();
                $pemberi = $this->db->get_where("t_wakaf_pemberi", array("id_penerimaan_wakaf" => $res['id_penerimaan_wakaf']))->row_array();
                $serti = $this->db->get_where("t_wakaf_sertifikat", array("id_penerimaan_wakaf" => $res['id_penerimaan_wakaf']))->row_array();
                $tnh = $this->db->get_where("t_wakaf_luas", array("id_penerimaan_wakaf" => $res['id_penerimaan_wakaf']))->row_array();




                $obj = new Stdclass;
                $obj->jenis_wakaf = $peruntukan['jenis_peruntukan'];
                $obj->alamat_peruntukan = $peruntukan['alamat'];
                $obj->lat_peruntukan = $peruntukan['lat'];
                $obj->lng_peruntukan = $peruntukan['lng'];
                $obj->telp_peruntukan = $peruntukan['no_telp'];
                $obj->email_peruntukan = $peruntukan['email'];
                $obj->penerima_nama = $penerima['nama_penerima'];
                $obj->penerima_telp = $penerima['no_penerima'];
                $obj->email_penerima = $penerima['email_penerima'];
                $obj->pemberi = $pemberi['nama_pemberi'];
                $obj->alamat_pemberi = $pemberi['alamat_pemberi'];
                $obj->no_serti = $serti['no_sertifikat'];
                $obj->ajb = $serti['ajb'];
                $obj->aiw = $serti['aiw'];
                $obj->tanah = $tnh['luas_tanah'];
                $obj->bangunan = $tnh['luas_bangunan'];
                $obj->tnh_est = $res['est_nilai_tanah'];
                $obj->tnh_bg = $res['est_nilai_bangunan'];
                $obj->id_utama = $res['id_penerimaan_wakaf'];

                $data['bow'] = $obj;

                $this->load->view('templates/header', $data);
                $this->load->view('penerimaan/penerimaan_wakaf');
                $this->load->view('penerimaan/penerimaan_Wakaf_js');
                $this->load->view('maps/maps_modal.php');
                // $this->load->view('maps/maps_modal_2.php');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/pen_wakaf"));
            }
        }
    }


    function peta_()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peta';
        $data['bred'] = 'Peta';
        $data['peta'] = $this->M_data->queJoinTb();
        $data['key'] = "";
        // $data['pep'] = $this->M_data->queJoinTbArr();

        $this->load->view('templates/header', $data);
        $this->load->view('peta/peta');
        // $this->load->view('peta/peta_js');
        $this->load->view('templates/footer');
    }

    public function pen_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf';
        $data['bred'] = 'Penerimaan Wakaf';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');
        // $data['res'] = $this->M_data->queJoinTbShow();


        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_wakaf_akt_penerimaan")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/pen_wakaf");
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
        $data['data'] = $this->M_function->data('t_wakaf_akt_penerimaan', $config['per_page'], $from);

        $this->load->view('templates/header', $data);
        $this->load->view('dash/penerimaan_wakaf');
        $this->load->view('templates/footer');
    }


    function edit_peruntukan($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/perunt_wakaf"));
        } else {
            $cek_usr = $this->db->get_where("t_wakaf_peruntukan", array("id_peruntukan " => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Peruntukan';
                $data['bred'] = 'Ubah Data Peruntukan';

                $res = $cek_usr->row_array();
                $obj = new Stdclass;
                $obj->id_peruntukan = $res['id_peruntukan'];
                $obj->jenis_peruntukan = $res['jenis_peruntukan'];
                $obj->alamat = $res['alamat'];
                $obj->no_telp = $res['no_telp'];
                $obj->email = $res['email'];
                $obj->lat = $res['lat'];
                $obj->lng = $res['lng'];
                // $obj->id_penerimaan_wakaf = $res['id_peruntukan'];
                // $obj->date_g = $res['id_peruntukan'];

                $data['bow'] = $obj;
                $data['page'] = "edit";

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/peruntukan_wakaf');
                $this->load->view('maps/maps_modal.php');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/perunt_wakaf"));
            }
        }
    }

    public function perunt_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peruntukan Wakaf';
        $data['bred'] = 'Peruntukan Wakaf';
        // $data['total'] = $this->M_data->getAllresult('t_wakaf_peruntukan');

        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_wakaf_peruntukan")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/perunt_wakaf");
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
        $data['data'] = $this->M_function->data('t_wakaf_peruntukan', $config['per_page'], $from);


        $this->load->view('templates/header', $data);
        $this->load->view('dash/peruntukan_wakaf');
        $this->load->view('maps/maps_modal');
        $this->load->view('templates/footer');
    }


    function edit_penerima_wakaf($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/penerima_wakaf"));
        } else {
            $cek_usr = $this->db->get_where("t_wakaf_penerima", array("id_penerima " => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Penerima';
                $data['bred'] = 'Ubah Data Penerima';

                $res = $cek_usr->row_array();
                $obj = new Stdclass;
                $obj->id_penerima = $res['id_penerima'];
                $obj->id_penerimaan_wakaf = $res['id_penerimaan_wakaf'];
                $obj->nama_penerima = $res['nama_penerima'];
                $obj->alamat_penerima = $res['alamat_penerima'];
                $obj->no_penerima = $res['no_penerima'];
                $obj->email_penerima = $res['email_penerima'];
                $obj->date_g = $res['date_g'];

                $data['bow'] = $obj;
                $data['page'] = "edit";

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/penerima_wakaf');
                $this->load->view('maps/maps_modal.php');
                $this->load->view('templates/footer');
            } else {
            }
        }
    }

    public function penerima_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerima';
        $data['bred'] = 'Penerima';
        // $data['total'] = $this->M_data->getAllresult('t_wakaf_penerima');


        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_wakaf_penerima")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/muwakif");
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
        $data['data'] = $this->M_function->data('t_wakaf_penerima', $config['per_page'], $from);


        $this->load->view('templates/header', $data);
        $this->load->view('dash/penerima_wakaf');
        $this->load->view('templates/footer');
    }


    function edit_muwakif($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/muwakif"));
        } else {
            $cek_usr = $this->db->get_where("t_wakaf_pemberi", array("id_pemberi " => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Data Muwakif';
                $data['bred'] = 'Ubah Data Muwakif';
                //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

                $res = $cek_usr->row_array();
                $obj = new Stdclass;
                $obj->id_pemberi = $res['id_pemberi'];
                // $obj->id_penerimaan_wakaf = null;
                $obj->nama_pemberi = $res['nama_pemberi'];
                $obj->alamat_pemberi = $res['alamat_pemberi'];
                // $obj->date_g = null;

                $data['bow'] = $obj;
                $data['page'] = "edit";

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/muwakif');
                $this->load->view('maps/maps_modal.php');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/muwakif"));
            }
        }
    }

    public function muwakif()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Muwakif';
        $data['bred'] = 'Muwakif';
        // $data['total'] = $this->M_data->getAllresult('t_wakaf_pemberi');

        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_wakaf_pemberi")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/muwakif");
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
        $data['data'] = $this->M_function->data('t_wakaf_pemberi', $config['per_page'], $from);

        $this->load->view('templates/header', $data);
        $this->load->view('dash/muwakif');
        $this->load->view('templates/footer');
    }

    function add_jamaah()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Tambah Pimpinan Jamaah';
        $data['bred'] = 'Tambah Pimpinan Jamaah';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $obj = new Stdclass;
        $obj->id_pimpinan_jamaah = null;
        $obj->pimpinan_jamaah = null;
        $obj->alamat_pimpinan = null;
        $obj->no_telp_pimpinan = null;
        $obj->email_pimpinan = null;
        $obj->ketua_jamaah = null;
        $obj->masa_jihad = null;
        $obj->alamat = null;
        $obj->no_telp_ketua = null;
        $obj->email_ketua = null;
        $obj->latitude = null;
        $obj->longitude = null;

        $data['bow'] = $obj;
        $data['page'] = "add";

        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/pimpinan_jamaah');
        $this->load->view('maps/maps_modal.php');
        $this->load->view('templates/footer');
    }


    function e_p_jamaah($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/p_jamaah"));
        } else {
            $cek_usr = $this->db->get_where("t_pimpinan_jamaah", array("id_pimpinan_jamaah " => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Pimpinan Jamaah';
                $data['bred'] = 'Ubah Pimpinan Jamaah';
                //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

                $res = $cek_usr->row_array();

                $obj = new Stdclass;
                $obj->id_pimpinan_jamaah = $res['id_pimpinan_jamaah'];
                $obj->pimpinan_jamaah = $res['pimpinan_jamaah'];
                $obj->alamat_pimpinan = $res['alamat_pimpinan'];
                $obj->no_telp_pimpinan = $res['no_telp_pimpinan'];
                $obj->email_pimpinan = $res['email_pimpinan'];
                $obj->ketua_jamaah = $res['ketua_jamaah'];
                $obj->masa_jihad = $res['masa_jihad'];
                $obj->alamat = $res['alamat'];
                $obj->no_telp_ketua = $res['no_telp_ketua'];
                $obj->email_ketua = $res['email_ketua'];
                $obj->latitude = $res['latitude'];
                $obj->longitude = $res['longitude'];

                $data['bow'] = $obj;
                $data['page'] = "edit";

                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/pimpinan_jamaah');
                $this->load->view('maps/maps_modal.php');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/p_jamaah"));
            }
        }
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

    public function petav3()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peta';
        $data['bred'] = 'Peta';
        $data['peta'] = $this->M_data->queJoinTb();
        $data['key'] = "";
        $data['pep'] = $this->M_data->queJoinTbArr();
        $this->load->view('templates/header', $data);
        $this->load->view('dash/peta_v3');
        $this->load->view('dash/peta_v3_js');
        $this->load->view('templates/footer');
    }

    public function petav2()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peta';
        $data['bred'] = 'Peta';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $config['center'] = '-7.03503043508787, 107.71006070141564'; //Coordinate tengah peta
        //$config['center'] = 'Ciparay, Bandung, Jawa Barat'; //Coordinate tengah peta
        // $config['zoom'] = 10;
        $config['zoom'] = 12;
        $config['geocodeCaching'] = TRUE;
        $this->googlemaps->initialize($config);

        //$mark = $this->M_data->getAllresult('t_wakaf_peruntukan');

        $mark = $this->M_data->queJoinTb();

        foreach ($mark as $koor) {
            if ($koor->id_kategori == 'JW70512') {

                $marker = array();
                $marker['icon'] = base_url('vendor/assets/images/mark_dot_red.gif');
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            } else if ($koor->id_kategori == 'JW73086') {
                $marker = array();
                $marker['icon'] = base_url('vendor/assets/images/mark_dot_blue.gif');
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            } else if ($koor->id_kategori = 'JW66095') {
                $marker = array();
                $marker['icon'] =  base_url("vendor/assets/images/mark_dot_yellow.gif");
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            } else if ($koor->jenis_peruntukan = 'Kebun') {
                $marker = array();
                $marker['icon'] = base_url('vendor/assets/images/mark_dot_yellow.gif');
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            } else if ($koor->jenis_peruntukan = 'Lapang Ied') {
                $marker = array();
                $marker['icon'] = base_url('vendor/assets/images/mark_dot_brown.gif');
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            } elseif ($koor->jenis_peruntukan = 'kuburan') {
                $marker = array();
                $marker['icon'] = base_url('vendor/assets/images/mark_dot_grey.gif');
                // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';s
                //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
                $marker['position'] = $koor->lat . ',' . $koor->lng;
                $marker['animation'] = "DROP";
                $urlgambar = base_url("uploads/$koor->gambar");
                $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
                $this->googlemaps->add_marker($marker);
            }
        }

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('templates/header', $data);
        $this->load->view('dash/peta_v2');
        $this->load->view('templates/footer');
    }


    public function ajx_d_rekap()
    {
        $res = $this->M_data->getAllresult('t_pimpinan_jamaah');
        $u = 1;
        foreach ($res as $key) :
            $mas = $this->M_data->joinRek($key->pimpinan_jamaah, "JW73086");
            $pes = $this->M_data->joinRek($key->pimpinan_jamaah, "JW70512");
            $kebun = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "kebun");
            $lapang = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "lapang ied");
            $sawah = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "sawah");
            $kuburan = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "kuburan");
            echo "<tr>
            <td>$u</td>
            <td></td>
            <td>$key->pimpinan_jamaah</td>
            <td></td>
            <td>$mas</td>
            <td>$pes</td>
            <td>$kebun</td>
            <td>$lapang</td>
            <td>$sawah</td>
            <td>$kuburan</td> 
            </tr>";
            $u++;
        endforeach;
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Dashboard';
        $data['bred'] = 'Dashboard';
        $data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_akt_penerimaan');
        $data['hit_pemberi'] = $this->M_data->getAllnum_rows('t_wakaf_pemberi');
        $data['hit_penerima'] = $this->M_data->getAllnum_rows('t_wakaf_penerima');
        $data['hit_pimpinan'] = $this->M_data->getAllnum_rows('t_pimpinan_jamaah');
        $data['hit_kategori'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/index');
        $this->load->view('templates/footer');
    }

    public function lap_rek()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Laporan Data Rekapitulasi Wakaf';
        $data['bred'] = 'Laporan Data Rekapitulasi Wakaf';
        $data['tot_pimpinan'] = $this->M_data->getAllresult('t_pimpinan_jamaah');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/lap_rekap_wakaf');
        $this->load->view('templates/footer');
    }

    public function lap_pen()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Laporan Data Penerima Wakaf';
        $data['bred'] = 'Laporan Data Penerima Wakaf';
        $data['total'] = $this->M_data->getAllresult('t_wakaf_penerima');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/lap_penerima_wakaf_pr');
        $this->load->view('templates/footer');
    }

    public function lap_muw()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Laporan Data Pemberi Wakaf';
        $data['bred'] = 'Laporan Data Pemberi Wakaf';
        $data['total'] = $this->M_data->getAllresult('t_wakaf_pemberi');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/lap_pemberi_wakaf_pr');
        $this->load->view('templates/footer');
    }

    public function ajx_del_akt_w()
    {

        $id = htmlspecialchars($this->input->post('idjenis'));
        $this->db->query("DELETE FROM `t_wakaf_akt_penerimaan` WHERE `t_wakaf_akt_penerimaan`.`id_penerimaan_wakaf` = '$id'");
        redirect('dash/pen_wakaf');

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "DELETE DATA WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);
    }

    public function ajx_s_per()
    {
        $inputPeruntukan = htmlspecialchars($this->input->post('inputPeruntukan'));
        $inputAlamat = htmlspecialchars($this->input->post('inputAlamat'));
        $id = htmlspecialchars($this->input->post('id'));
        $inputNomer = htmlspecialchars($this->input->post('inputNomer'));
        $inputEmail = htmlspecialchars($this->input->post('inputEmail'));

        $lat = htmlspecialchars($this->input->post('lat'));
        $lon = htmlspecialchars($this->input->post('lon'));

        $query = "UPDATE `t_wakaf_peruntukan` SET `jenis_peruntukan` = '$inputPeruntukan', `alamat` = '$inputAlamat', `no_telp` = '$inputNomer', `email` = '$inputEmail', `lat` = '$lat', `lng` = '$lon' WHERE `t_wakaf_peruntukan`.`id_peruntukan` = '$id';";
        $this->db->query($query);

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "UPDATE PERUNTUKAN WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);
    }

    public function ajx_s_pen()
    {
        $inputNama = htmlspecialchars($this->input->post('inputNama'));
        $inputAlamat = htmlspecialchars($this->input->post('inputAlamat'));
        $id = htmlspecialchars($this->input->post('id'));
        $inputNomer = htmlspecialchars($this->input->post('inputNomer'));
        $inputEmail = htmlspecialchars($this->input->post('inputEmail'));

        $query = "UPDATE `t_wakaf_penerima` SET `nama_penerima` = '$inputNama', `alamat_penerima` = '$inputAlamat', `no_penerima` = '$inputNomer', `email_penerima` = '$inputEmail' WHERE `t_wakaf_penerima`.`id_penerima` = '$id';";

        $this->db->query($query);

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "UPDATE PENERIMA WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);
    }

    public function ajx_e_per()
    {
        $id = $this->input->post('id');
        $res = $this->M_data->getWhere('t_wakaf_peruntukan', 'id_peruntukan', $id);

        echo " <label for=''>Jenis Peruntukan</label>
        <input type='text' class='form-control' id='inputPeruntukan' name='inputPeruntukan' autocomplete='off' value='$res[jenis_peruntukan]'>
        <label for=''>Alamat</label>
        <input type='text' class='form-control' id='inputAlamat' name='inputAlamat' autocomplete='off' value='$res[alamat]'>

        <label for=''>No Telp</label>
        <input type='text' class='form-control' id='inputNomer' name='inputNomer' autocomplete='off' value='$res[no_telp]'>

        <label for=''>Email</label>
        <input type='text' class='form-control' id='inputEmail' name='inputEmail' autocomplete='off' value='$res[email]'>
        <label for=''>Lat</label>
        <input type='text' name='lat' id='lat' class='form-control' value='$res[lat]' maxlength='20'
        placeholder='misal: -6.27925' onkeyup='noac00(this.id);' required />
        <label for=''>Longitude</label>
        <input type='text' name='lon' id='lon' class='form-control' value='$res[lng]' maxlength='20'
        placeholder='misal: 106.974754' onkeyup='noac00(this.id);' required />

        <a href='#!' onclick='getMapCoor()'>Ubah Koordinat Lokasi</a>

        <input type='hidden' value='$res[id_peruntukan]' name='inputId' id='inputId'>
        ";
    }

    public function ajx_e_pen()
    {
        $id = $this->input->post('id');
        $res = $this->M_data->getWhere('t_wakaf_penerima', 'id_penerima', $id);

        echo "<label for=''>Nama</label>
        <input type='text' class='form-control' id='inputNama' name='inputNama' autocomplete='off' value='$res[nama_penerima]'>
        <label for=''>Alamat</label>
        <input type='text' class='form-control' id='inputAlamat' name='inputAlamat' autocomplete='off' value='$res[alamat_penerima]'>

        <label for=''>No Telp</label>
        <input type='text' class='form-control' id='inputNomer' name='inputNomer' autocomplete='off' value='$res[no_penerima]'>

        <label for=''>Email</label>
        <input type='text' class='form-control' id='inputEmail' name='inputEmail' autocomplete='off' value='$res[email_penerima]'>

        <input type='hidden' value='$res[id_penerima]' name='inputId' id='inputId'>";
    }

    public function ajx_s_pem()
    {
        $inputNama = htmlspecialchars($this->input->post('inputNama'));
        $inputAlamat = htmlspecialchars($this->input->post('inputAlamat'));
        $id = htmlspecialchars($this->input->post('id'));

        $this->M_data->up_pemb($inputNama, $inputAlamat, $id);
        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "UPDATE PEMBERI WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);
        redirect('dash/muwakif');
    }

    public function ajx_e_pem()
    {
        $id = $this->input->post('id');

        $res = $this->M_data->getWhere('t_wakaf_pemberi', 'id_pemberi', $id);
        echo " <label for=''>Nama</label>
        <input type='text' class='form-control' id='inputNama' name='inputNama' autocomplete='off' value='$res[nama_pemberi]'>
        <label for=''>Alamat</label>
        <input type='text' class='form-control' id='inputAlamat' name='inputAlamat' autocomplete='off' value='$res[alamat_pemberi]'>
        <input type='hidden' value='$res[id_pemberi]' name='inputId' id='inputId'>
        ";
    }

    public function ajx_del_adm()
    {
        $name = htmlspecialchars($this->input->post('id'));
        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "DELETE PETUGAS";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);
        $this->db->query("DELETE FROM `t_admin` WHERE `t_admin`.`username` = '$name' ");
        //$this->M_data->del_adm($id);
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

    public function ajx_a_adm()
    {
        $username = htmlspecialchars($this->input->post('inputUsername'));
        $nama = htmlspecialchars($this->input->post('inputNama'));
        $email = htmlspecialchars($this->input->post('inputEmail'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "TAMBAH PETUGAS";
        $name = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $name, $ip, $device, $time);


        $this->M_data->into_adm($username, $username, $nama, $email);
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

                $user = $this->session->userdata('user');
                $id = rand(9999, 100000);
                $ip = $_SERVER['REMOTE_ADDR'];
                $logname = "UBAH PASSWORD PETUGAS";
                $username = $user;
                $device = $_SERVER['HTTP_USER_AGENT'];
                require_once("../siwakaf/application/helpers/date-time.php");
                $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
                $this->M_login->log($id, $logname, $username, $ip, $device, $time);

                redirect('dash/profil');
            } else {

                $user = $this->session->userdata('user');
                $id = rand(9999, 100000);
                $ip = $_SERVER['REMOTE_ADDR'];
                $logname = "GAGAL UBAH PASSWORD PETUGAS";
                $username = $user;
                $device = $_SERVER['HTTP_USER_AGENT'];
                require_once("../siwakaf/application/helpers/date-time.php");
                $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
                $this->M_login->log($id, $logname, $username, $ip, $device, $time);

                echo "<div class='alert alert-danger'>
                Password Baru Tidak Sama  !
                </div>";
            }
        } else {

            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "GAGAL UBAH PASSWORD PETUGAS";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);

            echo "<div class='alert alert-danger'>
            Password Lama Salah !
            </div>";
        }
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


    public function lap_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Laporan Penerimaan Wakaf';
        $data['bred'] = 'Laporan Penerimaan Wakaf';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');
        $data['res'] = $this->M_data->queJoinTbShow();

        $this->load->view('templates/header', $data);
        $this->load->view('dash/lap_all_wakaf');
        $this->load->view('templates/footer');
    }

    public function lap_wakaf_det_pr($idw)
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf';
        $data['bred'] = 'Penerimaan Wakaf';
        //$data['total'] = $this->M_data->getAllresult('t_wakaf_peruntukan');
        $data['dt'] = $this->M_data->getWhere('t_wakaf_akt_penerimaan', 'id_penerimaan_wakaf', $idw);
        $data['pim'] = $this->M_data->getWhere('t_pimpinan_jamaah', 'pimpinan_jamaah', $data['dt']['pimpinan_jamaah']);
        $data['pru'] = $this->M_data->getWhere('t_wakaf_peruntukan', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['pen'] = $this->M_data->getWhere('t_wakaf_penerima', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['pem'] = $this->M_data->getWhere('t_wakaf_pemberi', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['serti'] = $this->M_data->getWhere('t_wakaf_sertifikat', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['lu'] = $this->M_data->getWhere('t_wakaf_luas', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['kat'] = $this->M_data->getWhere('t_wakaf_jenis', 'id_jenis', $data['dt']['id_kategori']);
        $data['ting'] = $this->M_data->getWhere('t_wakaf_tingkat_pesantren', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['sak'] = $this->M_data->getWhereResult('t_wakaf_saksi', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['bang'] = $this->M_data->getWhereResult('t_wakaf_bangunan_lain', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['inv'] = $this->M_data->getWhereResult('t_wakaf_inven_masjid', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);


        //getWhere($tb, $kol, $id)

        $ress = $this->M_data->getWherenum_rows('t_wakaf_akt_penerimaan', 'id_penerimaan_wakaf', $idw);
        if ($ress > 0) {
            $this->load->view('templates/css', $data);
            $this->load->view('dash/lap_det_wakaf_pr', $data);
            $this->load->view('dash/penerimaan_wakaf_detail_js.php');
            $this->load->view('templates/js');

            $html = $this->output->get_output();
            // Load pdf library

            $np = "Detail Data Wakaf";
            $this->load->library('pdf');
            $this->pdf->loadHtml($html);
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->render();
            // Output the generated PDF (1 = download and 0 = preview)
            $this->pdf->stream("" . $np . "", array("Attachment" => 0));


            // $html = $this->output->get_output();
            // // Load pdf library
            // $this->load->library('pdf');
            // $this->pdf->loadHtml($html);
            // $this->pdf->setPaper('A4', 'landscape');
            // $this->pdf->render();
            // // Output the generated PDF (1 = download and 0 = preview)
            // $this->pdf->stream("html_contents.pdf", array("Attachment" => 0));
        } else {
            redirect('dash/pen_wakaf');
        }
    }

    public function lap_wakaf_det()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Laporan Detail Data Penerimaan Wakaf';
        $data['bred'] = 'Laporan Detail Data Penerimaan Wakaf';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');
        $data['res'] = $this->M_data->queJoinTbShow();

        $this->load->view('templates/header', $data);
        $this->load->view('dash/lap_det_wakaf');
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "LOGOUT";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->session->unset_userdata(array('user' => ''));
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function ajx_s_in()
    {

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "MENAMBAH INVENTARIS MASJID TEMP";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $jenisinven = htmlspecialchars($this->input->post('jenisinven'));
        $totalinven = htmlspecialchars($this->input->post('unit'));
        $keaadaninven = htmlspecialchars($this->input->post('kead_unit'));
        $tem = htmlspecialchars($this->input->post('tem'));
        $u = rand(10000, 99999);
        $idinven = "INV$u";
        $this->M_data->into_tinven_tem($idinven, $jenisinven, $totalinven, $keaadaninven, $tem);
    }

    public function det_pen_wakaf($idw)
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf';
        $data['bred'] = 'Penerimaan Wakaf';
        //$data['total'] = $this->M_data->getAllresult('t_wakaf_peruntukan');
        $data['dt'] = $this->M_data->getWhere('t_wakaf_akt_penerimaan', 'id_penerimaan_wakaf', $idw);
        $data['pim'] = $this->M_data->getWhere('t_pimpinan_jamaah', 'pimpinan_jamaah', $data['dt']['pimpinan_jamaah']);
        $data['pru'] = $this->M_data->getWhere('t_wakaf_peruntukan', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['pen'] = $this->M_data->getWhere('t_wakaf_penerima', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['pem'] = $this->M_data->getWhere('t_wakaf_pemberi', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['serti'] = $this->M_data->getWhere('t_wakaf_sertifikat', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['lu'] = $this->M_data->getWhere('t_wakaf_luas', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $data['kat'] = $this->M_data->getWhere('t_wakaf_jenis', 'id_jenis', $data['dt']['id_kategori']);
        $data['ting'] = $this->M_data->getWhere('t_wakaf_tingkat_pesantren', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);
        $sak = $this->M_data->getWhereResult('t_wakaf_saksi', 'id_penerimaan_wakaf', $data['dt']['id_penerimaan_wakaf']);


        //getWhere($tb, $kol, $id)

        $ress = $this->M_data->getWherenum_rows('t_wakaf_akt_penerimaan', 'id_penerimaan_wakaf', $idw);
        if ($ress > 0) {
            $this->load->view('templates/header', $data, $sak);
            $this->load->view('dash/penerimaan_wakaf_lainnya_detail', $sak);
            $this->load->view('dash/penerimaan_wakaf_detail_js.php');
            $this->load->view('templates/footer');
        } else {
            redirect('dash/pen_wakaf');
        }
    }

    function ajx_g_tb_w()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $res =  $this->M_data->getWhereResult('t_wakaf_akt_penerimaan', 'id_kategori', $id);

        foreach ($res as $key) {
            echo "
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            ";
        }
    }

    function ajx_g_kat()
    {
        $res =  $this->M_data->getAllresult('t_wakaf_jenis');
        echo "<option value='' selected>-- FILTER --</option>";
        foreach ($res as $key) {
            echo "<option value='$key->id_jenis'>$key->jenis_wakaf</option>";
        }
    }

    function ajx_g_s_w()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $sak = $this->M_data->getWhereResult('t_wakaf_saksi', 'id_penerimaan_wakaf', $id);
        $u = 1;
        foreach ($sak as $key) {
            echo "<label for='' class=''
                                style='margin-top: 7px;'>" . $u++ . ".&nbsp;&nbsp;" . $key->nama_saksi . "</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='" . $key->status_saksi . "' readonly><br>";
        }
    }

    public function ajx_g_b_w()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $sak = $this->M_data->getWhereResult('t_wakaf_bangunan_lain', 'id_penerimaan_wakaf', $id);
        $u = 1;
        foreach ($sak as $key) {
            echo "<label for='' class=''
                                style='margin-top: 7px;'>" . $u++ . ".&nbsp;&nbsp;" . $key->jenis_bangunan . " : a/n " . $key->atas_nama_bang . "</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='Surat Perjanjian " . $key->surat_perjanjian . "' readonly><br>";
        }
    }

    public function ajx_g_in_w()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $sak = $this->M_data->getWhereResult('t_wakaf_inven_masjid', 'id_penerimaan_wakaf', $id);
        $u = 1;
        foreach ($sak as $key) {
            echo "<label for='' class=''
                                style='margin-top: 7px;'>" . $u++ . ".&nbsp;&nbsp;" . $key->jenis_inven . " : " . $key->total_unit . "</label>&nbsp;&nbsp;&nbsp;&nbsp;Keadaan Unit &nbsp;&nbsp;&nbsp;&nbsp;<input type='text' value='" . $key->keadaan_unit . "' readonly ><br>";
        }
    }







    public function ajx_a_w_lainnya()
    {
        // upload to peruntukan wakaf
        $jwakaf = htmlspecialchars($this->input->post('inputJenisWakaf'));
        $awakaf = htmlspecialchars($this->input->post('inputAlamatWakaf'));
        $no_telp_Wakaf = htmlspecialchars($this->input->post('inputNoTelpWakaf'));
        $email_peruntukan_wakaf = htmlspecialchars($this->input->post('inputEmailWakaf'));
        $latwakaf = htmlspecialchars($this->input->post('lat'));
        $lonwakaf = htmlspecialchars($this->input->post('lon'));
        $idpwak = htmlspecialchars($this->input->post('idpwak'));
        $s = rand(10000, 99999);
        $id_peruntukan_wakaf = "PRUWAK$s";
        $this->M_data->trx_into_peruntukan($id_peruntukan_wakaf, $jwakaf, $awakaf, $no_telp_Wakaf, $email_peruntukan_wakaf, $latwakaf, $lonwakaf, $idpwak);

        //upload gambar peruntukan 
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        for ($i = 1; $i <= 3; $i++) {
            if (!empty($_FILES['filefoto' . $i]['name'])) {
                if (!$this->upload->do_upload('filefoto' . $i)) {
                    $this->upload->display_errors();
                } else {
                    $result = $this->upload->data();
                    $gambar = $result['file_name'];
                    $this->M_data->trx_into_gambar($id_peruntukan_wakaf, $gambar, $idpwak);
                }
            }
        }

        //upload to penerima wakaf
        $penerima = htmlspecialchars($this->input->post('inputPenerima'));
        $no_penerima = htmlspecialchars($this->input->post('inputNoTelpPenerima'));
        $email_penerima = htmlspecialchars($this->input->post('inputEmailPenerima'));
        $alamat_penerima = '';
        $o = rand(10000, 99999);
        $id_penerima = "IDPEN$o";
        $this->M_data->trx_into_penerima($id_penerima, $idpwak, $penerima, $alamat_penerima, $no_penerima, $email_penerima);

        //upload to pemberi
        $muwafik = htmlspecialchars($this->input->post('inputMuwakif'));
        $alamatmuwakif = str_replace(array("\\r\\n", "\\r", "\\n"), "", htmlspecialchars($this->input->post('inputAlamatMuwakif')));
        $h = rand(10000, 99999);
        $id_pemberi = "IDPEM$h";
        $this->M_data->trx_into_pemberi($id_pemberi, $idpwak, $muwafik, $alamatmuwakif);

        //upload to sertifikat
        $noserti = htmlspecialchars($this->input->post('inputNoSertifikat'));
        $noajb = htmlspecialchars($this->input->post('inputAjb'));
        $noauw = htmlspecialchars($this->input->post('inputAuw'));
        $u = rand(10000, 99999);
        $id_sertifikat = "IDSER$u";
        $this->M_data->trx_into_serti($id_sertifikat, $noserti, $noajb, $noauw, $idpwak);

        //upload to luas
        $luast = htmlspecialchars($this->input->post('inputLuasTanah'));
        $luastb = htmlspecialchars($this->input->post('inputLuasBangunan'));
        $j = rand(10000, 99999);
        $id_luas_wakaf = "IDLU$j";
        $this->M_data->trx_into_luas($id_luas_wakaf, $idpwak, $luastb, $luast);

        //upload tingkat pesantren
        //$cekbox = htmlspecialchars($this->input->post('tingkat'));
        $chk = "";
        foreach ($this->input->post('tingkat') as $chk1) {
            $chk .= $chk1 . "|";
        }
        $y = rand(10000, 99999);
        $id_tingkat = "TKTPS$y";
        $this->db->query("INSERT INTO `t_wakaf_tingkat_pesantren` (`id_tingkat`, `id_penerimaan_wakaf`, `tingkat`) VALUES ('$id_tingkat', '$idpwak', '$chk')");

        // upload to trx ahir
        $pimpinan = htmlspecialchars($this->input->post('inputPimpinan'));
        $id_kategori = htmlspecialchars($this->input->post('inputKategori'));
        $estbang = htmlspecialchars($this->input->post('inputEstBang'));
        $esttan = htmlspecialchars($this->input->post('inputEstNilai'));
        $status = htmlspecialchars($this->input->post('status'));
        $this->M_data->trx_into_akt($idpwak, $pimpinan, $id_kategori, $id_peruntukan_wakaf, $id_penerima, $id_pemberi, $status, $id_sertifikat, $id_luas_wakaf, $estbang, $esttan);


        $tempsak = htmlspecialchars($this->input->post('tempsak'));
        $this->M_data->trx_upd_saksi($tempsak, $idpwak, 't_wakaf_saksi');
        $this->M_data->trx_upd_saksi($tempsak, $idpwak, 't_wakaf_bangunan_lain');
        $this->M_data->trx_upd_saksi($tempsak, $idpwak, 't_wakaf_inven_masjid');

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "MENAMBAH DATA WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        redirect('dash/pen_wakaf');

        //$hit = $this->M_data->getWherenum_rows('t_wakaf_saksi', 'temp', $tempsak);
    }

    public function ajx_s_e_bang()
    {
        $jb = htmlspecialchars($this->input->post('jb'));
        $anb = htmlspecialchars($this->input->post('anb'));
        $spb = htmlspecialchars($this->input->post('spb'));
        $idbang = htmlspecialchars($this->input->post('idbang'));

        if ($idbang == '') {
            redirect('dash');
        } else {
            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "UBAH DATA BANGUNAN LAINNYA";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);

            $this->M_data->up_bang_temp($jb, $anb, $spb, $idbang);
        }
    }

    public function ajx_e_bang()
    {
        $id = htmlspecialchars($this->input->post('id'));

        if ($id == '') {
            redirect('dash');
        } else {
            $res =  $this->M_data->getWhere('t_wakaf_bangunan_lain', 'id_bangunan_lain', $id);

            echo "
            <input type='hidden' value='$res[id_bangunan_lain]' id='inputIdBang' name='inputIdBang'>
            <label for=''>Atas Nama (a/n)</label>
            <input type='text' name='inputNamaBangEdit' id='inputNamaBangEdit' class='form-control' autocomplete='off' value='$res[atas_nama_bang]'>";

            //echo $res['atas_nama_bang'];
        }
    }

    public function ajx_d_bang()
    {
        $id = htmlspecialchars($this->input->post('id'));

        if ($id == '') {
            redirect('dash');
        } else {
            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "DELETE DATA BANGUNAN LAINNYA";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);
            $this->M_data->delwhere('t_wakaf_bangunan_lain', 'id_bangunan_lain', $id);
        }
    }

    public function ajx_gd_inv()
    {
        $tem = htmlspecialchars($this->input->post('tem'));
        $res = $this->M_data->getWhereResult('t_wakaf_inven_masjid', 'temp', $tem);

        $j = 1;
        foreach ($res as $row) {
            echo "  <tr>
            <td>
            </td>
            <td>$j</td>
            <td>$row->jenis_inven</td>
            <td>$row->total_unit</td>
            <td>$row->keadaan_unit</td>
        </tr>";
            $j++;
        }
    }

    public function ajx_gd_bang()
    {
        $id = htmlspecialchars($this->input->post('tem'));

        $res = $this->M_data->getWhereResult('t_wakaf_bangunan_lain', 'temp', $id);

        $j = 1;
        foreach ($res as $row) {
            echo "  <tr>
            <td>
            <a href='#!' class='btn btn-xs btn-info' data-id='$row->id_bangunan_lain' onclick='e_bang(this)' ><i class='ace-icon fa fa-pencil bigger-120'></i></a>
            <a href='#!' class='btn btn-xs btn-danger' data-id='$row->id_bangunan_lain' onclick='d_bang(this)'><i class='ace-icon fa fa-trash-o bigger-120s'></i></a>
            </td>
            <td>$j</td>
            <td>$row->jenis_bangunan</td>
            <td>$row->atas_nama_bang</td>
            <td>$row->surat_perjanjian</td>
        </tr>";
            $j++;
        }
    }

    public function ajx_s_bang_temp()
    {
        $jb = htmlspecialchars($this->input->post('jb'));
        $anb = htmlspecialchars($this->input->post('anb'));
        $spb = htmlspecialchars($this->input->post('spb'));
        $tem = htmlspecialchars($this->input->post('tem'));

        $k = rand(10000, 99999);
        $idbg = "BG$k";

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "TAMBAH DATA BANGUNAN LAINNYA TEMP";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->into_bang_temp($idbg, $jb, $anb, $spb, $tem);
    }





    public function ajx_s_e_sak()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $namasaksi = htmlspecialchars($this->input->post('namasaksi'));
        $statussaksi = htmlspecialchars($this->input->post('statussaksi'));

        if ($id == '') {
            redirect('dash');
        } else {
            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "TAMBAH SAKSI WAKAF";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);
            $this->M_data->up_saksi_temp($namasaksi, $statussaksi, $id);
        }
    }

    public function ajx_e_sak()
    {
        $id = htmlspecialchars($this->input->post('idsa'));
        if ($id == '') {
            redirect('dash');
        } else {
            $res =  $this->M_data->getWhere('t_wakaf_saksi', 'id_saksi', $id);

            echo "  
            <input type='hidden' value='$res[id_saksi]' id='inputIdSaksi' name='inputIdSaksi'>
            <label for=''>Nama Saksi</label>
            <input type='text' class='form-control' id='inputNamaSaksiEdit' name='inputNamaSaksiEdit' autocomplete='off' value='$res[nama_saksi]'>
            <br>
            <label for=''>Status Saksi</label>
            <select class='form-control' name='inputStatusSaksiEdit' id='inputStatusSaksiEdit'>
                <option value='MASIH HIDUP'>Ada / Masih Hidup</option>
                <option value='ALMARHUM'>Almarhum</option>
            </select>";
        }
    }

    public function ajx_d_sak()
    {
        $id = htmlspecialchars($this->input->post('idsa'));

        if ($id == '') {
            redirect('dash');
        } else {
            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "DELETE DATA SAKSI";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);

            $this->M_data->delwhere('t_wakaf_saksi', 'id_saksi', $id);
        }
    }

    public function ajx_s_saksi_temp()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $namasaksi = htmlspecialchars($this->input->post('namasaksi'));
        $statussaksi = htmlspecialchars($this->input->post('statussaksi'));
        $temsak = htmlspecialchars($this->input->post('temsak'));

        if ($namasaksi === '') {
            redirect('dash');
        } else {
            $p = rand(10000, 99999);
            $idsaksi = "S$p";

            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "TAMBAH DATA SAKSI TEMP";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);

            $this->M_data->into_tsaksi($idsaksi, 'temp', $temsak, $namasaksi, $statussaksi);
        }
    }

    public function ajx_gd_saksi()
    {
        $id = htmlspecialchars($this->input->post('temsak'));
        $ress = $this->M_data->getWhereResult('t_wakaf_saksi', 'temp', $id);
        $i = 1;
        foreach ($ress as $row) {
            echo " <tr>
            <td>
            <a href='#!' class='btn btn-xs btn-info' data-id='$row->id_saksi' onclick='e_sak(this)' ><i class='ace-icon fa fa-pencil bigger-120'></i></a>
            <a href='#!' class='btn btn-xs btn-danger' data-id='$row->id_saksi' onclick='d_sak(this)'><i class='ace-icon fa fa-trash-o bigger-120s'></i></a>
            </td>
            <td>" . $i . "</td>
            <td>$row->nama_saksi</td>
            <td>$row->status_saksi</td>
        </tr>";
            $i++;
        }
    }

    public function ajx_gd_pimpinan()
    {
        $ress = $this->M_data->getAllresult('t_pimpinan_jamaah');

        foreach ($ress as $row) {
            echo "<option value='$row->pimpinan_jamaah'>$row->pimpinan_jamaah</option>";
        }
    }

    public function p_w_lainnya()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Penerimaan Wakaf Lainnya';
        $data['bred'] = 'Penerimaan Wakaf Lainnya';
        $data['jn'] = $this->M_data->getAllresult('t_wakaf_jenis');
        //  $data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/penerimaan_wakaf_lainnya_add');
        $this->load->view('dash/penerimaan_wakaf_js.php');
        $this->load->view('maps/maps_modal.php');
        $this->load->view('templates/footer');
    }


    public function peta()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Peta';
        $data['bred'] = 'Peta';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $config['center'] = '-7.03503043508787, 107.71006070141564'; //Coordinate tengah peta
        //$config['center'] = 'Ciparay, Bandung, Jawa Barat'; //Coordinate tengah peta
        // $config['zoom'] = 10;
        $config['zoom'] = 10;
        $config['geocodeCaching'] = TRUE;
        $this->googlemaps->initialize($config);

        //$mark = $this->M_data->getAllresult('t_wakaf_peruntukan');

        $mark = $this->M_data->queJoinTb();

        foreach ($mark as $koor) {
            $marker = array();
            // $marker['icon'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Logo_Persis.png/600px-Logo_Persis.png';
            //$marker['icon'] = base_url('vendor/assets/images/avatars/home.png');
            $marker['position'] = $koor->lat . ',' . $koor->lng;
            $marker['animation'] = "DROP";
            $urlgambar = base_url("uploads/$koor->gambar");
            $marker['infowindow_content'] = "<div class='carousel slide' data-ride='carousel'><div class='carousel-inner'><div class='item active'><img src='$urlgambar' width='300px' alt='Demo 1'></div></div></div><p><h5>-- Infomarsi Tanah Wakaf -- </h5>Jenis Wakaf : $koor->jenis_peruntukan  <br>Lokasi Wakaf : $koor->alamat<br> Luas Tanah : $koor->luas_tanah M2<br> Luas Bangunan : $koor->luas_bangunan m2 <br>No. Sertifikat : $koor->no_sertifikat <br> AJB : $koor->ajb <br> AIW : $koor->aiw <br> Estimasi Nilai Bangunan : $koor->est_nilai_bangunan <br> Estimasi Nilai Tanah : $koor->est_nilai_tanah <br><br><h5>-- Infomarsi Muwakif -- </h5> Muwakif : $koor->nama_pemberi <br> Alamat Muwakif : $koor->alamat_pemberi <br><br> <h5>-- Infomarsi Penerima / Pengelola -- </h5> Nama : $koor->nama_penerima <br> Alamat : $koor->alamat_penerima <br> No. Telp : $koor->no_penerima <br> Email : $koor->email_penerima <br> </p>";
            $this->googlemaps->add_marker($marker);
        }

        // $marker = array();
        // $marker['position'] = '-7.03431739684084, 107.70762026491343';
        // //$marker['cursor'] = 'hey';
        // $marker['infowindow_content'] = "<h4> Lokasi Wakaf </h4>";

        // $marker['animation'] = "BOUNCE";

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('templates/header', $data);
        $this->load->view('dash/peta');
        $this->load->view('templates/footer');
    }




    public function p_jamaah()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Pimpinan Jamaah';
        $data['bred'] = 'Pimpinan Jamaah';
        // $data['pin'] = $this->M_data->getAllresult('t_pimpinan_jamaah');


        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_pimpinan_jamaah")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/j_wakaf");
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
        $data['data'] = $this->M_function->data('t_pimpinan_jamaah', $config['per_page'], $from);


        $this->load->view('templates/header', $data);
        $this->load->view('dash/pimpinan_jamaah');
        $this->load->view('templates/footer');
    }

    public function a_p_jamaah()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Tambah Pimpinan Jamaah';
        $data['bred'] = 'Tambah Pimpinan Jamaah';
        //$data['hit_jenis'] = $this->M_data->getAllnum_rows('t_wakaf_jenis');

        $this->load->view('templates/header', $data);
        $this->load->view('dash/pimpinan_jamaah_add');
        $this->load->view('maps/maps_modal.php');
        $this->load->view('templates/footer');
    }





    public function j_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Kategori Wakaf';
        $data['bred'] = 'Kategori Wakaf';
        // $data['jen'] = $this->M_data->getAllresult('t_wakaf_jenis');

        $this->load->library('pagination');

        $jumlah_data = $this->db->get("t_wakaf_jenis")->num_rows();
        $this->load->library('pagination');
        $config['base_url'] = base_url("dash/j_wakaf");
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
        $data['data'] = $this->M_function->data('t_wakaf_jenis', $config['per_page'], $from);

        $this->load->view('templates/header', $data);
        $this->load->view('dash/wakaf_jenis');
        $this->load->view('templates/footer');
    }

    public function a_j_wakaf()
    {
        $user = $this->session->userdata('user');
        $data['page'] = "add";
        $obj = new Stdclass;
        $obj->id_jenis = null;
        $obj->jenis_wakaf = null;
        $obj->keterangan = null;
        $obj->add_by = null;
        $data['bow'] = $obj;
        $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
        $data['title'] = 'Wakaf | Tambah Kategori Wakaf';
        $data['bred'] = 'Tambah Kategori Wakaf';



        $this->load->view('templates/header', $data);
        $this->load->view('input_layout/jenis_wakaf');
        $this->load->view('templates/footer');
    }

    function e_j_wakaf($id = null)
    {
        if ($id == '') {
            redirect(base_url("dash/j_wakaf"));
        } else {
            $cek_usr = $this->db->get_where("t_wakaf_jenis", array("id_jenis" => $id));
            if ($cek_usr->num_rows() > 0) {
                $user = $this->session->userdata('user');
                $dt = $cek_usr->row_array();
                $data['page'] = "edit";
                $obj = new Stdclass;
                $obj->id_jenis = $dt['id_jenis'];
                $obj->jenis_wakaf = $dt['jenis_wakaf'];
                $obj->keterangan = $dt['keterangan'];
                // $obj->add_by = null;
                $data['bow'] = $obj;
                $data['user'] = $this->M_data->getWhere('t_admin', 'username', $user);
                $data['title'] = 'Wakaf | Ubah Kategori Wakaf';
                $data['bred'] = 'Ubah Kategori Wakaf';
                $this->load->view('templates/header', $data);
                $this->load->view('input_layout/jenis_wakaf');
                $this->load->view('templates/footer');
            } else {
                redirect(base_url("dash/j_wakaf"));
            }
        }
    }

    public function ajx_a_j_wakaf()
    {
        $user = $this->session->userdata('user');
        $idjenis = htmlspecialchars($this->input->post('idkode'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));

        if ($jenis === '') {
            redirect(base_url('dash'));
        } else {
            $user = $this->session->userdata('user');
            $id = rand(9999, 100000);
            $ip = $_SERVER['REMOTE_ADDR'];
            $logname = "TAMBAH JENIS WAKAF";
            $username = $user;
            $device = $_SERVER['HTTP_USER_AGENT'];
            require_once("../siwakaf/application/helpers/date-time.php");
            $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
            $this->M_login->log($id, $logname, $username, $ip, $device, $time);
            $this->M_data->intojeniswakaf($idjenis, $jenis, $keterangan, $user);
        }
    }

    public function ajx_e_j_wakaf()
    {
        $id = htmlspecialchars($this->input->post('idjenis'));

        $this->M_data->getDataEditJenisModal($id);
    }

    public function ajx_s_e_j_wakaf()
    {
        $idjenis = htmlspecialchars($this->input->post('idkode'));
        $jenis = htmlspecialchars($this->input->post('jenis'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "UBAH JENIS WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->updateJenisWakaf($idjenis, $jenis, $keterangan);
    }

    public function del_j_wakaf()
    {
        $idjenis = htmlspecialchars($this->input->post('idjenis'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "DELETE JENIS WAKAF";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->delwhere('t_wakaf_jenis', 'id_jenis', $idjenis);
    }

    public function ajx_a_p_jamaah()
    {
        //data pimpinan
        $pimja = htmlspecialchars($this->input->post('inputPimpinan'));
        $pimat = htmlspecialchars($this->input->post('inputAlamat'));
        $pimno = htmlspecialchars($this->input->post('inputTelp'));
        $pimel = htmlspecialchars($this->input->post('inputEmail'));

        //data pimpinan jamaah
        $ket = htmlspecialchars($this->input->post('inputKetuaPimpinan'));
        $kehad = htmlspecialchars($this->input->post('inputJihad'));
        $kemat = htmlspecialchars($this->input->post('inputKetuaAlamat'));
        $keno = htmlspecialchars($this->input->post('inputKetuaTelp'));
        $kemel = htmlspecialchars($this->input->post('inputKetuaEmail'));
        $lat = htmlspecialchars($this->input->post('lat'));
        $lon = htmlspecialchars($this->input->post('lon'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "TAMBAH PIMPINAN JAMAAH";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->intop_jamaah($pimja, $pimat, $pimno, $pimel, $ket, $kehad, $kemat, $keno, $kemel, $lat, $lon);
        redirect(base_url('dash/p_jamaah'));
    }

    public function ajx_e_p_jamaah()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $res['p'] = $this->M_data->getWhere('t_pimpinan_jamaah', 'pimpinan_jamaah', $id);
        //  print_r($res);
        echo "
         <label for=''>Pimpinan Jamaah</label>&nbsp;&nbsp;<small style='color:red;'>( Tidak dapat Diubah )</small>
                <input type='text' class='form-control' id='inputPimpinan' name='inputPimpinan' autocomplete='off'
                    required value='" . $res['p']['pimpinan_jamaah'] . "' readonly=''>
                <br>
                <label for=''>Alamat Pimpinan</label>
                <textarea class='form-control' name='inputAlamat' id='inputAlamat' required autocomplete='off' cols='3'
                    rows='3'>" . $res['p']['alamat_pimpinan'] . "</textarea>
                <br>
                <label for=''>No Telp Pimpinan</label>
                <input type='number' autocomplete='off' class='form-control' id='inputTelp' name='inputTelp'  value='" . $res['p']['no_telp_pimpinan'] . "'>
                <br>
                <label for=''>Email Pimpinan</label>
                <input type='email' autocomplete='off' class='form-control' id='inputEmail' name='inputEmail' value='" . $res['p']['email_pimpinan'] . "'>
                <br><br>
                <label for=''>Ketua Jamaah</label>
                <input type='text' autocomplete='off' class='form-control' id='inputKetuaPimpinan'
                    name='inputKetuaPimpinan' required value='" . $res['p']['ketua_jamaah'] . "'>
                <br>
                <label for=''>Masa Jihad</label>
                <input type='text' autocomplete='off' class='form-control' id='inputJihad' name='inputJihad'
                    placeholder='Contoh : 2014 - 2018' required value='" . $res['p']['masa_jihad'] . "'>
                <br>
                <label for=''>Alamat Ketua</label>
                <textarea name='inputKetuaAlamat' id='inputKetuaAlamat' cols='30' rows='3' required autocomplete='off'
                    class='form-control'>" . $res['p']['alamat'] . "</textarea>
                <br>
                <label for=''>No Telp Ketua</label>
                <input type='number' autocomplete='off' class='form-control' id='inputKetuaTelp' name='inputKetuaTelp' value='" . $res['p']['no_telp_ketua'] . "'>
                <br>
                <label for=''>Email</label>
                <input type='email' autocomplete='off' class='form-control' id='inputKetuaEmail' name='inputKetuaEmail' value='" . $res['p']['email_ketua'] . "'>";
    }

    public function ajx_s_e_p_jamaah()
    {
        //data pimpinan
        $pimja = htmlspecialchars($this->input->post('inputPimpinan'));
        $pimat = htmlspecialchars($this->input->post('inputAlamat'));
        $pimno = htmlspecialchars($this->input->post('inputTelp'));
        $pimel = htmlspecialchars($this->input->post('inputEmail'));

        //data pimpinan jamaah
        $ket = htmlspecialchars($this->input->post('inputKetuaPimpinan'));
        $kehad = htmlspecialchars($this->input->post('inputJihad'));
        $kemat = htmlspecialchars($this->input->post('inputKetuaAlamat'));
        $keno = htmlspecialchars($this->input->post('inputKetuaTelp'));
        $kemel = htmlspecialchars($this->input->post('inputKetuaEmail'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "UBAH DATA PIMPINAN JAMAAH";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->up_jamaah($pimja, $pimat, $pimno, $pimel, $ket, $kehad, $kemat, $keno, $kemel);
        redirect(base_url('dash/p_jamaah'));
    }

    public function ajx_del_p_jamaah()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $user = $this->session->userdata('user');
        $id = rand(9999, 100000);
        $ip = $_SERVER['REMOTE_ADDR'];
        $logname = "DELETE DATA PIMPINAN JAMAAH";
        $username = $user;
        $device = $_SERVER['HTTP_USER_AGENT'];
        require_once("../siwakaf/application/helpers/date-time.php");
        $time = $th_00 . "-" . $bl_00 . "-" . $hr_00 . " " . $jm_00 . ":" . $mn_00 . ":" . $dt_00;
        $this->M_login->log($id, $logname, $username, $ip, $device, $time);

        $this->M_data->delwhere('t_pimpinan_jamaah', 'pimpinan_jamaah', $id);
    }
}
