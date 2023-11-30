<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajx extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->library('pdf');
        $this->load->model('M_gzl');
        $this->load->model('M_log');
    }

    function wakaf_delet_gambar()
    {
        $id = $this->input->post('id');
        $this->db->where('id_gambar', $id);
        $this->db->delete('gambar');
    }


    function ajx_get_gambar()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('gambar', ['id_penerimaan_wakaf' => $id]);
        if ($data->num_rows() > 0) {
            $data_gambar = $data->result();
            $data = array(
                'gambar' => $data_gambar
            );
            $this->load->view('layout/data_gambar_wakaf', $data);
        } else {
            echo '<div class="col-md-12 text-center">Tidak ada gambar</div> <br><br>';
        }
        // echo $html;
    }

    function print_custom()
    {
        $id_objek_wakaf = $this->input->post('id');

        $data_objek_wakaf = $this->db->get_where("objekwakaf", array("ID  " => $id_objek_wakaf), 1);

        if ($data_objek_wakaf->num_rows() > 0) {
            $data_objek_wakaf = $data_objek_wakaf->row_array();
            $muwakif = $this->db->get_where('muwakif', ['id' => $data_objek_wakaf['MUWAKIF_ID']])->row_array();
            $nadzir = $this->db->get_where('nadzir', ['MUWAKIF_ID' => $data_objek_wakaf['MUWAKIF_ID']])->row_array();

            $html = $this->load->view('layout/print_data_wakaf', array(
                'data_objek_wakaf' => $data_objek_wakaf,
                'muwakif' => $muwakif,
                'nadzir' => $nadzir
            ), true);

            echo "
            <script>
            window.location  = '" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "' + encodeURIComponent('" . base_url('assets/pdfjs/web/viewer.html?file=') . "'))))))))))));
            </script>
            ";

            $this->pdf->to_browser($html, 'html', 'Legal');
        } else {
            echo "Data tidak ditemukan";
        }
    }

    function ajx_d_inv()
    {
        $id = $this->input->post('id');
        $this->db->where('id_inven', $id);
        $this->db->delete('t_wakaf_inven_masjid');
    }


    function ajx_masjid()
    {
        $id = htmlspecialchars($this->input->post('idf'));

        $get_data = $this->db->get_where("t_data_wakaf", array("id_data_wakaf" => $id), 1)->row_array();
        $get_data_pimpinan = $this->db->get_where("t_data_pimpinan", array("id_data_wakaf" => $id), 1)->row_array();
        $get_data_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $id), 1)->row_array();


        if ($get_data_pengelola['ket'] == 'masjid') {
            echo "
            <table width='100%'>
            <tbody>
                <tr>
                    <td width='60%'>
                        <div style='clear:both'></div>
                        <h4>Data Wakaf</h4>
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['nama_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Alamat Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['alamat_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Tanah  </div>
                        <div class='profile-info-value'>" . $get_data['tanah'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Tanah  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_tanah']) . " m2</div>
                        </div>
                        <br>
    
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bangunan  </div>
                        <div class='profile-info-value'>" . $get_data['bangunan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Bangunan  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_bangunan']) . " m2</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Peruntukan  </div>
                        <div class='profile-info-value'>" . $get_data['peruntukan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Persil  </div>
                        <div class='profile-info-value'>" . $get_data['persil'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Reg  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_reg'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Tahun  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_tahun'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AJB  </div>
                        <div class='profile-info-value'>" . $get_data['ajb'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AIW  </div>
                        <div class='profile-info-value'>" . $get_data['aiw'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Sertifikat  </div>
                        <div class='profile-info-value'>" . $get_data['sertifikat'] . "</div>
                        </div>
                        <br>
                        <h4>Data Pimpinan</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Nazir  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_nazir'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bidgar Wakaf </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['bidgar_wakaf'] . "</div>
                        </div>
                        <br>
                        <h4>Pengelola Wakaf</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Masjid </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['nama'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Qoyyim </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['pengelola'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> SK / Surat Tugas </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['sk'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Lokasi </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['lokasi'] . "</div>
                        </div>
                        <br>
                      
                    </td>
                </tr>
            </tbody>
            </table>";
        } else if ($get_data_pengelola['ket'] == 'sawah') {
            echo "
            <table width='100%'>
            <tbody>
                <tr>
                    <td width='60%'>
                        <div style='clear:both'></div>
                        <h4>Data Wakaf</h4>
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['nama_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Alamat Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['alamat_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Tanah  </div>
                        <div class='profile-info-value'>" . $get_data['tanah'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Tanah  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_tanah']) . " m2</div>
                        </div>
                        <br>
    
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bangunan  </div>
                        <div class='profile-info-value'>" . $get_data['bangunan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Bangunan  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_bangunan']) . " m2</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Peruntukan  </div>
                        <div class='profile-info-value'>" . $get_data['peruntukan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Persil  </div>
                        <div class='profile-info-value'>" . $get_data['persil'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Reg  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_reg'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Tahun  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_tahun'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AJB  </div>
                        <div class='profile-info-value'>" . $get_data['ajb'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AIW  </div>
                        <div class='profile-info-value'>" . $get_data['aiw'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Sertifikat  </div>
                        <div class='profile-info-value'>" . $get_data['sertifikat'] . "</div>
                        </div>
                        <br>
                        <h4>Data Pimpinan</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Nazir  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_nazir'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bidgar Wakaf </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['bidgar_wakaf'] . "</div>
                        </div>
                        <br>
                        <h4>Pengelola Wakaf</h4>
    
                       
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Penggarap </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['pengelola'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> SK / Surat Tugas </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['sk'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Lokasi </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['lokasi'] . "</div>
                        </div>
                        <br>

                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pola Kemitraan </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['pola_kemitraan'] . "</div>
                        </div>
                        <br>
                      
                    </td>
                </tr>
            </tbody>
            </table>";
        } else if ($get_data_pengelola['ket'] == 'pesantren') {
            echo "
            <table width='100%'>
            <tbody>
                <tr>
                    <td width='60%'>
                        <div style='clear:both'></div>
                        <h4>Data Wakaf</h4>
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['nama_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Alamat Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['alamat_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Tanah  </div>
                        <div class='profile-info-value'>" . $get_data['tanah'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Tanah  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_tanah']) . " m2</div>
                        </div>
                        <br>
    
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bangunan  </div>
                        <div class='profile-info-value'>" . $get_data['bangunan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Bangunan  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_bangunan']) . " m2</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Peruntukan  </div>
                        <div class='profile-info-value'>" . $get_data['peruntukan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Persil  </div>
                        <div class='profile-info-value'>" . $get_data['persil'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Reg  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_reg'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Tahun  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_tahun'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AJB  </div>
                        <div class='profile-info-value'>" . $get_data['ajb'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AIW  </div>
                        <div class='profile-info-value'>" . $get_data['aiw'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Sertifikat  </div>
                        <div class='profile-info-value'>" . $get_data['sertifikat'] . "</div>
                        </div>
                        <br>
                        <h4>Data Pimpinan</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Nazir  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_nazir'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bidgar Wakaf </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['bidgar_wakaf'] . "</div>
                        </div>
                        <br>
                        <h4>Pengelola Wakaf</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Pesantren </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['nama'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Mudir'am / Mudir </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['pengelola'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> SK / Surat Tugas </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['sk'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Lokasi </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['lokasi'] . "</div>
                        </div>
                        <br>
                      
                    </td>
                </tr>
            </tbody>
            </table>";
        } else {
            echo "
            <table width='100%'>
            <tbody>
                <tr>
                    <td width='60%'>
                        <div style='clear:both'></div>
                        <h4>Data Wakaf</h4>
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Nama Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['nama_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Alamat Wakif  </div>
                        <div class='profile-info-value'>" . $get_data['alamat_wakif'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Tanah  </div>
                        <div class='profile-info-value'>" . $get_data['tanah'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Tanah  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_tanah']) . " m2</div>
                        </div>
                        <br>
    
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bangunan  </div>
                        <div class='profile-info-value'>" . $get_data['bangunan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Luas Bangunan  </div>
                        <div class='profile-info-value'>" . number_format($get_data['luas_bangunan']) . " m2</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Peruntukan  </div>
                        <div class='profile-info-value'>" . $get_data['peruntukan'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Persil  </div>
                        <div class='profile-info-value'>" . $get_data['persil'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Reg  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_reg'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> No. BASTW Tahun  </div>
                        <div class='profile-info-value'>" . $get_data['bastw_tahun'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AJB  </div>
                        <div class='profile-info-value'>" . $get_data['ajb'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> AIW  </div>
                        <div class='profile-info-value'>" . $get_data['aiw'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Sertifikat  </div>
                        <div class='profile-info-value'>" . $get_data['sertifikat'] . "</div>
                        </div>
                        <br>
                        <h4>Data Pimpinan</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Nazir  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_nazir'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Ketua Pimpinan Cabang  </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['ketua_pimpinan_cabang'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Bidgar Wakaf </div>
                        <div class='profile-info-value'>" . $get_data_pimpinan['bidgar_wakaf'] . "</div>
                        </div>
                        <br>
                        <h4>Pengelola Wakaf</h4>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Jenis Wakaf </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['nama'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Pengelola </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['pengelola'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> SK / Surat Tugas </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['sk'] . "</div>
                        </div>
                        <br>
    
                        <div class='profile-info-row'>
                        <div class='profile-info-name'> Lokasi </div>
                        <div class='profile-info-value'>" . $get_data_pengelola['lokasi'] . "</div>
                        </div>
                        <br>
                      
                    </td>
                </tr>
            </tbody>
            </table>";
        }
    }


    function ajx_s_e_inv()
    {
        $jenisinven = htmlspecialchars($this->input->post('jenisinven'));
        $totalinven = htmlspecialchars($this->input->post('unit'));
        $keaadaninven = htmlspecialchars($this->input->post('kead_unit'));
        $tem = htmlspecialchars($this->input->post('id'));
        $data = array(
            'jenis_inven' => $jenisinven,
            'total_unit' => $totalinven,
            'keadaan_unit' => $keaadaninven,
        );
        $this->db->where('id_inven', $tem);
        $this->db->update('t_wakaf_inven_masjid', $data);
    }


    function ajx_e_inv()
    {
        $id = $this->input->post('id');
        $res = $this->db->get_where("t_wakaf_inven_masjid", array("id_inven" => $id))->row_array();
        echo "
        
        <input type='hidden' value='" . $res['id_inven'] . "' id='id_inv_hid'>
        <label for=''>Jenis Inventaris</label>
        <select name='inputJenisInven' id='inputJenisInven_edit' class='form-control'>
            <option value='MIMBAR'>MIMBAR</option>
            <option value='AMPLIFIER'>AMPLIFIER</option>
            <option value='SPEAKER DALAM'>SPEAKER DALAM</option>
            <option value='SPEAKER LUAR'>SPEAKER LUAR</option>
            <option value='LEMARI BUKU'>LEMARI BUKU</option>
        </select>
        <br>
        <label for=''>
            Total Unit
        </label>
        <input type='number' onkeydown='return hanyaAngka(this)' class='form-control' id='inputUnit_edit' name='inputUnit' value='" . $res['total_unit'] . "'>
        <br>
        <label for=''>Keadaan Unit</label>
        <select name='inputStatInvenUnit' id='inputStatInvenUnit_edit' class='form-control'>
            <option value='BAIK'>Baik</option>
            <option value='RUSAK / TIDAK LAYAK'>Rusak / Tidak Layak</option>
        </select>
        ";
    }

    public function ajx_s_in()
    {
        $jenisinven = htmlspecialchars($this->input->post('jenisinven'));
        $totalinven = htmlspecialchars($this->input->post('unit'));
        $keaadaninven = htmlspecialchars($this->input->post('kead_unit'));
        $tem = htmlspecialchars($this->input->post('id_utama'));
        $u = rand(10000, 99999);
        $idinven = "INV$u";


        $data = array(
            'id_inven' => "INV" . rand() . "",
            'jenis_inven' => $jenisinven,
            'total_unit' => $totalinven,
            'keadaan_unit' => $keaadaninven,
            'id_penerimaan_wakaf' => $tem
        );
        $this->db->insert('t_wakaf_inven_masjid', $data);
    }

    public function ajx_gd_inv()
    {
        $tem = htmlspecialchars($this->input->post('id_utama'));
        $res = $this->db->get_where("t_wakaf_inven_masjid", array("id_penerimaan_wakaf" => $tem))->result();

        $j = 1;
        foreach ($res as $row) {
            echo "  <tr>
            <td>
               <a href='#!' class='btn btn-xs btn-info' data-id='$row->id_inven' onclick='e_inv(this)' ><i class='ace-icon fa fa-pencil bigger-120'></i></a>
            <a href='#!' class='btn btn-xs btn-danger' data-id='$row->id_inven' onclick='d_inv(this)'><i class='ace-icon fa fa-trash-o bigger-120s'></i></a>
            </td>
            <td>$j</td>
            <td>$row->jenis_inven</td>
            <td>$row->total_unit</td>
            <td>$row->keadaan_unit</td>
        </tr>";
            $j++;
        }
    }

    public function ajx_d_bang()
    {
        $id = htmlspecialchars($this->input->post('id'));

        $this->db->where('id_bangunan_lain', $id);
        $this->db->delete('t_wakaf_bangunan_lain');
    }

    public function ajx_s_e_bang()
    {
        $jb = htmlspecialchars($this->input->post('jb'));
        $anb = htmlspecialchars($this->input->post('anb'));
        $spb = htmlspecialchars($this->input->post('spb'));
        $idbang = htmlspecialchars($this->input->post('idbang'));
        $data = array(
            'jenis_bangunan' => $jb,
            'atas_nama_bang' => $anb,
            'surat_perjanjian' => $spb
        );
        $this->db->where('id_bangunan_lain', $idbang);
        $this->db->update('t_wakaf_bangunan_lain', $data);
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

    public function ajx_s_bang_temp()
    {
        $jb = htmlspecialchars($this->input->post('jb'));
        $anb = htmlspecialchars($this->input->post('anb'));
        $spb = htmlspecialchars($this->input->post('spb'));
        $tem = htmlspecialchars($this->input->post('id_utama'));


        $data = array(
            'id_bangunan_lain' => "BG" . rand() . "",
            'jenis_bangunan' => $jb,
            'atas_nama_bang' => $anb,
            'surat_perjanjian' => $spb,
            'id_penerimaan_wakaf' => $tem
        );
        $this->db->insert('t_wakaf_bangunan_lain', $data);
    }

    public function ajx_gd_bang()
    {
        $id = htmlspecialchars($this->input->post('id_utama'));
        $res = $this->db->get_where("t_wakaf_bangunan_lain", array("id_penerimaan_wakaf" => $id))->result();
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

    public function ajx_s_e_sak()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $namasaksi = htmlspecialchars($this->input->post('namasaksi'));
        $statussaksi = htmlspecialchars($this->input->post('statussaksi'));

        $data = array(
            'nama_saksi' => $namasaksi,
            'status_saksi' => $statussaksi
        );
        $this->db->where('id_saksi', $id);
        $this->db->update('t_wakaf_saksi', $data);
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

    function ajx_s_saksi_temp()
    {
        $id = htmlspecialchars($this->input->post('id_utama'));
        $namasaksi = htmlspecialchars($this->input->post('namasaksi'));
        $statussaksi = htmlspecialchars($this->input->post('statussaksi'));
        $temsak = htmlspecialchars($this->input->post('temsak'));
        $data = array(
            'id_saksi' => "S" . rand() . "",
            'id_penerimaan_wakaf' => $id,
            'temp' => "",
            'nama_saksi' => $namasaksi,
            'status_saksi' => $statussaksi
        );
        $this->db->insert('t_wakaf_saksi', $data);
    }

    function ajx_d_sak()
    {
        $id = htmlspecialchars($this->input->post('idsa'));
        // $tb = htmlspecialchars($this->input->post('id'));

        if ($id == '') {
            redirect('dash');
        } else {
            $this->db->where(array('id_saksi' => $id));
            $this->db->delete('t_wakaf_saksi');
        }
    }


    function ajx_gd_saksi()
    {
        $id = htmlspecialchars($this->input->post('id_utama'));
        $ress = $this->db->get_where('t_wakaf_saksi', array("id_penerimaan_wakaf" => $id))->result();
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


    function ajx_g_details_tabel_penerimaan()
    {
        $tb = $this->input->post('tabel');
        $idf = $this->input->post('idf');
        $col = $this->input->post('id');
        $res = $this->db->get_where($tb, array($col => $idf), 1)->row_array();
        $kk = $this->db->get_where("t_pimpinan_jamaah", array("pimpinan_jamaah" => $res['pimpinan_jamaah']))->row_array();
        $jw = $this->db->get_where("t_wakaf_jenis", array("id_jenis" => $res['id_kategori']))->row_array();
        $pemberi = $this->db->get_where("t_wakaf_pemberi", array("id_pemberi" => $res['id_pemberi']))->row_array();
        $penerima = $this->db->get_where("t_wakaf_penerima", array("id_penerima" => $res['id_penerima']))->row_array();
        $peruntukan = $this->db->get_where("t_wakaf_peruntukan", array("id_peruntukan" => $res['id_jenis']))->row_array();
        $pimpinan = $this->db->get_where("t_pimpinan_jamaah", array("pimpinan_jamaah" => $res['pimpinan_jamaah']))->row_array();
        $saksi = $this->db->get_where("t_wakaf_saksi", array("id_penerimaan_wakaf" => $res['id_penerimaan_wakaf']))->result();
        echo "
        <table width='100%'>
        <tbody>
            <tr>
                <td width='60%'>
                    <div style='clear:both'></div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Kategori Wakaf  </div>
                    <div class='profile-info-value'>" . $jw['jenis_wakaf'] . "</div>
                    </div>
                    <br>

                    <h4>Data Pimpinan Jamaah</h4>
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $res['pimpinan_jamaah'] . "</div>
                    </div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Alamat Pimpinan  </div>
                    <div class='profile-info-value'>" . $pimpinan['alamat_pimpinan'] . "</div>
                    </div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> No. Telp Pimpinan </div>
                    <div class='profile-info-value'>" . $pimpinan['no_telp_pimpinan'] . "</div>
                    </div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Email Pimpinan  </div>
                    <div class='profile-info-value'>" . $pimpinan['email_pimpinan'] . "</div>
                    </div>
                    <br>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Ketua Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $pimpinan['ketua_jamaah'] . "</div>
                    </div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Alamat Ketua Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $pimpinan['alamat_pimpinan'] . "</div>
                    </div>

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> No. Telp Ketua Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $pimpinan['no_telp_ketua'] . "</div>
                    </div>  

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Email Ketua Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $pimpinan['email_ketua'] . "</div>
                    </div>  

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Masa Jihad Ketua Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $pimpinan['masa_jihad'] . "</div>
                    </div>  

                    <br>
                    <h4>Data Muwakif</h4>
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Muwakif  </div>
                    <div class='profile-info-value'>" . $pemberi['nama_pemberi'] . "</div>
                    </div>  

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Alamat Muwakif  </div>
                    <div class='profile-info-value'>" . $pemberi['alamat_pemberi'] . "</div>
                    </div>  

                    <br>
                    <h4>Data Penerima Wakaf</h4>
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Penerima Wakaf  </div>
                    <div class='profile-info-value'>" . $penerima['nama_penerima'] . "</div>
                    </div>  

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Alamat Penerima Wakaf  </div>
                    <div class='profile-info-value'>" . $penerima['alamat_penerima'] . "</div>
                    </div> 
                    
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> No. Telp Penerima Wakaf  </div>
                    <div class='profile-info-value'>" . $penerima['no_penerima'] . "</div>
                    </div> 

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Email Penerima Wakaf  </div>
                    <div class='profile-info-value'>" . $penerima['email_penerima'] . "</div>
                    </div> 

                    <br>
                    <h4>Data Peruntukan Wakaf</h4>
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Peruntukan Wakaf  </div>
                    <div class='profile-info-value'>" . $peruntukan['jenis_peruntukan'] . "</div>
                    </div> 

                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Alamat Lokasi  </div>
                    <div class='profile-info-value'>" . $peruntukan['alamat'] . "</div>
                    </div> 

                    <br>
                    <h4>Data Saksi</h4>";

        foreach ($saksi as $ki) {
            echo "<div class='profile-info-row'>
                    <div class='profile-info-name'> Nama Saksi  </div>
                    <div class='profile-info-value'>" . $ki->nama_saksi . " - " . $ki->status_saksi . "</div>
                    </div>";
        }

        echo "";
    }
    function ajx_g_details_tabel_pimpinan()
    {
        $tb = $this->input->post('tabel');
        $idf = $this->input->post('idf');
        $col = $this->input->post('id');


        $res = $this->db->get_where($tb, array($col => $idf), 1)->row_array();
        echo "<table width='100%'>
        <tbody>
            <tr>
                <td width='60%'>
                    <div style='clear:both'></div>
                         <div class='profile-info-row'>
                        <div class='profile-info-name'> ID Pimpinan Jamaah  </div>
                        <div class='profile-info-value'>" . $res['id_pimpinan_jamaah'] . "</div>
                    </div>
                    
                    <div class='profile-info-row'>
                    <div class='profile-info-name'> Pimpinan Jamaah  </div>
                    <div class='profile-info-value'>" . $res['pimpinan_jamaah'] . "</div>
                </div>

                <div class='profile-info-row'>
                <div class='profile-info-name'> Alamat Pimpinan  </div>
                <div class='profile-info-value'>" . $res['alamat_pimpinan'] . "</div>
            </div>

            <div class='profile-info-row'>
            <div class='profile-info-name'> No Telp Pimpinan  </div>
            <div class='profile-info-value'>" . $res['no_telp_pimpinan'] . "</div>
        </div>

        <div class='profile-info-row'>
        <div class='profile-info-name'> Email Pimpinan  </div>
        <div class='profile-info-value'>" . $res['email_pimpinan'] . "</div>
    </div>

    <div class='profile-info-row'>
    <div class='profile-info-name'> Ketua Jamaah  </div>
    <div class='profile-info-value'>" . $res['ketua_jamaah'] . "</div>
</div>

<div class='profile-info-row'>
<div class='profile-info-name'> Masa Jihad  </div>
<div class='profile-info-value'>" . $res['masa_jihad'] . "</div>
</div>


<div class='profile-info-row'>
<div class='profile-info-name'> Alamat  </div>
<div class='profile-info-value'>" . $res['alamat'] . "</div>
</div>

<div class='profile-info-row'>
<div class='profile-info-name'> No Telp  </div>
<div class='profile-info-value'>" . $res['no_telp_ketua'] . "</div>
</div>

<div class='profile-info-row'>
<div class='profile-info-name'> Email Ketua   </div>
<div class='profile-info-value'>" . $res['email_ketua'] . "</div>
</div>


<div class='profile-info-row'>
<div class='profile-info-name'> Latittude   </div>
<div class='profile-info-value'>" . $res['latitude'] . "</div>
</div>

<div class='profile-info-row'>
<div class='profile-info-name'> Longitude   </div>
<div class='profile-info-value'>" . $res['longitude'] . "</div>
</div>


        </td>
            </tr>
        </tbody>
    </table>
";
    }
}

/* End of file Ajx.php */