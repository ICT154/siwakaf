<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {

        $data['title'] = 'PERSIS';
        // $this->load->view('templates/log_header', $data);
        $this->load->view('login/login_v2', $data);
        // $this->load->view('templates/log_footer');

    }

    public function ajxlogin()
    {

        $user = $this->input->post('user');
        $pass = htmlspecialchars($this->input->post('pass'));
        $a = array(
            ' ', '"', "'", 'or'
        );
        $b = array('noinjectxxxxxx', 'noinjectxxxxxx', 'noinjectxxxxxx', 'noinjectxxxxxxss');


        $u = str_replace($a, $b, $user);
        $p = str_replace(" ", "noinjectxxxxxx", $pass);

        // $user = $this->input->post('user');


        $count = $this->M_login->masuk($u, $p);
        if ($count > 0) {
            $data = [
                'user' => $user
            ];
            $this->session->set_userdata($data);





            echo " <div class='x' style:'color:green;'>Login Berhasil</div>
            <script>document.location='dash';</script>";
            //redirect('dash');
        } else {
            echo " <div class='x' style:'color:red;'>Username / Password Salah</div>";
            //redirect(base_url('auth'));
        }
    }
}