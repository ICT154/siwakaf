    <?php
    class M_data extends CI_Model
    {
        //https://mega.nz/folder/AS5gmDYT#iWvmTNEb6efxc4dXp9CNvA


        function getAllresultCabang($tabel)
        {

            $res = $this->db->order_by("NAMA_CABANG", "ASC")->get($tabel);
            return $res->result();
        }

        function query($sql)
        {
            return $this->db->query($sql);
        }
        function getRessLog()
        {
            $query = "SELECT * FROM `t_log_history` ORDER BY `t_log_history`.`time` DESC";
            $res = $this->db->query($query);
            return $res->result();
        }

        function joinTbNumRowsById($peruntukan)
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf WHERE id_kategori = '$peruntukan'";
            $res = $this->db->query($query);
            return $res->num_rows();
        }


        function joinTbNumRowsByJenis($peruntukan)
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf WHERE jenis_peruntukan = '$peruntukan'";
            $res = $this->db->query($query);
            return $res->num_rows();
        }

        function joinPerJenis($pimpinan_jamaah, $peruntukan)
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf WHERE jenis_peruntukan = '$peruntukan' AND pimpinan_jamaah = '$pimpinan_jamaah' ";
            $res = $this->db->query($query);
            return $res->num_rows();
        }

        function joinRek($pimpinan_jamaah, $peruntukan)
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf WHERE id_kategori = '$peruntukan' AND pimpinan_jamaah = '$pimpinan_jamaah' ";
            $res = $this->db->query($query);
            return $res->num_rows();
        }

        function up_pemb($nama, $alamat, $id)
        {
            $query = "UPDATE `t_wakaf_pemberi` SET `nama_pemberi` = '$nama', `alamat_pemberi` = '$alamat' WHERE `t_wakaf_pemberi`.`id_pemberi` = '$id';";
            $this->db->query($query);
            redirect('dash/muwakif');
        }

        function del_adm($id)
        {
            $query = "DELETE FROM `t_admin` WHERE `t_admin`.`username` = '$id' ";
            $this->db->query($query);
            redirect('dash/pengguna');
        }

        function into_adm($username, $password, $nama, $email, $id_pimpinan_cabang, $niat)
        {

            $data_admin = array(
                "username" => $username,
                "password" => $password,
                "nama" => $nama,
                "email" => $email,
                "created" => date("Y-m-d H:i:s"),
                "tgl_log_akhir" => "",
                "ip" =>  $this->input->ip_address(),
                "id_pimpinan_cabang" => $id_pimpinan_cabang,
                "NIAT" => $niat
            );

            $this->db->insert("t_admin", $data_admin);

            // $query = "INSERT INTO `t_admin` (`username`, `password`, `nama`, `email`, `created`, `tgl_log_akhir`, `ip`) VALUES ('$username', '$password', '$nama', '$email', '', '', '');";
            // $this->db->query($query);
            redirect('dash/pengguna');
        }

        function change_pw($username, $password)
        {
            $query = "UPDATE `t_admin` SET `password` = '$password' WHERE `t_admin`.`username` = '$username';";
            $this->db->query($query);
        }

        function into_tinven_tem($idinven, $jenisinven, $totalinven, $keaadaninven, $tem)
        {
            $query = "INSERT INTO `t_wakaf_inven_masjid` (`id_inven`, `temp`, `jenis_inven`, `total_unit`, `keadaan_unit`, `id_penerimaan_wakaf`) VALUES ('$idinven', '$tem', '$jenisinven', '$totalinven', '$keaadaninven', 'temp')";
            $this->db->query($query);
        }
        function queJoinTbArr()
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan
        INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf
        INNER JOIN t_wakaf_pemberi ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_pemberi.id_penerimaan_wakaf
        INNER JOIN t_wakaf_penerima ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_penerima.id_penerimaan_wakaf
        INNER JOIN t_wakaf_luas ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_luas.id_penerimaan_wakaf
        INNER JOIN t_wakaf_sertifikat ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_sertifikat.id_penerimaan_wakaf
        INNER JOIN gambar ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = gambar.id_penerimaan_wakaf
        ";

            $res = $this->db->query($query);
            return $res->row_array();
        }
        function queJoinTb()
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan
        INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf
        INNER JOIN t_wakaf_pemberi ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_pemberi.id_penerimaan_wakaf
        INNER JOIN t_wakaf_penerima ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_penerima.id_penerimaan_wakaf
        INNER JOIN t_wakaf_luas ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_luas.id_penerimaan_wakaf
        INNER JOIN t_wakaf_sertifikat ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_sertifikat.id_penerimaan_wakaf
        INNER JOIN gambar ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = gambar.id_penerimaan_wakaf
        ";

            $res = $this->db->query($query);
            return $res->result();
        }

        function queJoinTbShow()
        {
            $query = "SELECT * FROM t_wakaf_akt_penerimaan
        INNER JOIN t_wakaf_peruntukan ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_peruntukan.id_penerimaan_wakaf
        INNER JOIN t_wakaf_pemberi ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_pemberi.id_penerimaan_wakaf
        INNER JOIN t_wakaf_penerima ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_penerima.id_penerimaan_wakaf
        INNER JOIN t_wakaf_luas ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_luas.id_penerimaan_wakaf
        INNER JOIN t_wakaf_sertifikat ON t_wakaf_akt_penerimaan.id_penerimaan_wakaf = t_wakaf_sertifikat.id_penerimaan_wakaf
       
        ";

            $res = $this->db->query($query);
            return $res->result();
        }


        function trx_upd_saksi($idtemp, $id_penerimaan_wakaf, $tb)
        {
            $query = "UPDATE `$tb` SET `id_penerimaan_wakaf` = '$id_penerimaan_wakaf', `temp` = '' WHERE `temp` =  '$idtemp'";
            $this->db->query($query);
        }

        function trx_into_peruntukan($id_peruntukan_wakaf, $jenis_peruntukanwakaf, $alamat_wakaf, $no_telp_Wakaf, $email, $lat, $lng, $id_penerimaan_wakaf)
        {
            $query = "INSERT INTO `t_wakaf_peruntukan`(`id_peruntukan`, `jenis_peruntukan`, `alamat`, `no_telp`, `email`, `lat`, `lng`, `id_penerimaan_wakaf`) VALUES ('$id_peruntukan_wakaf','$jenis_peruntukanwakaf','$alamat_wakaf','$no_telp_Wakaf','$email','$lat','$lng','$id_penerimaan_wakaf')";

            $this->db->query($query);
        }

        function trx_into_gambar($id_peruntukan, $gambar, $id_penerimaan_wakaf)
        {
            $query = "INSERT INTO `gambar`(`id_peruntukan`, `gambar`, `id_penerimaan_wakaf`) VALUES ('$id_peruntukan','$gambar', '$id_penerimaan_wakaf')";

            $this->db->query($query);
        }

        function trx_into_penerima($id_penerima, $id_penerimaan_wakaf, $nama_penerima, $alamat_penerima, $no_penerima, $email_penerima)
        {
            $query = "INSERT INTO `t_wakaf_penerima`(`id_penerima`, `id_penerimaan_wakaf`, `nama_penerima`, `alamat_penerima`, `no_penerima`, `email_penerima`) VALUES ('$id_penerima','$id_penerimaan_wakaf','$nama_penerima','$alamat_penerima','$no_penerima','$email_penerima')";

            $this->db->query($query);
        }

        function trx_into_pemberi($id_pemberi, $id_penerimaan_wakaf, $nama_pemberi, $alamat_pemberi)
        {
            $query = "INSERT INTO `t_wakaf_pemberi`(`id_pemberi`, `id_penerimaan_wakaf`, `nama_pemberi`, `alamat_pemberi`) VALUES ('$id_pemberi','$id_penerimaan_wakaf','$nama_pemberi','$alamat_pemberi')";

            $this->db->query($query);
        }

        function trx_into_serti($id_sertifikat, $no_sertifikat, $ajb, $aiw, $id_penerimaan_wakaf)
        {
            $query = "INSERT INTO `t_wakaf_sertifikat`(`id_sertifikat`, `no_sertifikat`, `ajb`, `aiw`,`id_penerimaan_wakaf`) VALUES ('$id_sertifikat','$no_sertifikat','$ajb','$aiw','$id_penerimaan_wakaf')";

            $this->db->query($query);
        }

        function trx_into_luas($id_luas_wakaf, $id_penerimaan_wakaf, $luas_bangunan, $luas_tanah)
        {
            $query = "INSERT INTO `t_wakaf_luas`(`id_luas_wakaf`, `id_penerimaan_wakaf`, `luas_bangunan`, `luas_tanah`) VALUES ('$id_luas_wakaf','$id_penerimaan_wakaf','$luas_bangunan','$luas_tanah')";

            $this->db->query($query);
        }

        function trx_into_akt($id_penerimaan_wakaf, $pimpinan_jamaah, $id_kategori, $id_jenis, $id_penerima, $id_pemberi, $status_wakaf, $id_sertifikat, $id_luas, $est_nilai_bang, $est_nilai_tan)
        {
            $query = "INSERT INTO `t_wakaf_akt_penerimaan`(`id_penerimaan_wakaf`, `pimpinan_jamaah`, `id_kategori`, `id_jenis`, `id_penerima`, `id_pemberi`, `id_saksi`, `status_wakaf`, `id_sertifikat`, `id_luas_wakaf`, `est_nilai_bangunan`, `est_nilai_tanah`, `id_bangunan_lain`) VALUES ('$id_penerimaan_wakaf','$pimpinan_jamaah','$id_kategori','$id_jenis','$id_penerima','$id_pemberi','','$status_wakaf','$id_sertifikat','$id_luas','$est_nilai_bang','$est_nilai_tan','')";

            $this->db->query($query);
        }

        function up_bang_temp($jbg, $abg, $sbg, $idbg)
        {
            $query = "UPDATE `t_wakaf_bangunan_lain` SET `jenis_bangunan` = '$jbg', `atas_nama_bang` = '$abg', `surat_perjanjian` = '$sbg' WHERE `t_wakaf_bangunan_lain`.`id_bangunan_lain` = '$idbg';";

            $this->db->query($query);
        }

        function into_bang_temp($idbg, $jbg, $abg, $sbg, $temp)
        {
            $query = "INSERT INTO `t_wakaf_bangunan_lain` (`id_bangunan_lain`, `temp`, `jenis_bangunan`, `atas_nama_bang`, `surat_perjanjian`, `id_penerimaan_wakaf`) VALUES ('$idbg', '$temp', '$jbg', '$abg', '$sbg', 'temp');";

            $this->db->query($query);
        }

        function up_saksi_temp($namasaksi, $statussaksi, $idsaksi)
        {
            $query = "UPDATE `t_wakaf_saksi` SET `nama_saksi` = '$namasaksi', `status_saksi` = '$statussaksi' WHERE `t_wakaf_saksi`.`id_saksi` = '$idsaksi'";
            $this->db->query($query);
        }

        function get_coordinates()
        {
            $return = array();
            $this->db->select('latitude', 'longitude');
            $this->db->from('t_pimpinan_jamaah');
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    array_push($return, $row);
                }
            }

            return $return;
        }

        function getWhere($tb, $kol, $id)
        {
            $query = "SELECT * FROM $tb WHERE $kol = '$id' ";
            $res = $this->db->query(
                $query
            );
            return $res->row_array();
        }

        function getWhereResult($tb, $kol, $id)
        {
            $query = "SELECT * FROM $tb WHERE $kol = '$id' ";
            $res = $this->db->query($query);
            return $res->result();
        }

        function getAllresult($tb)
        {
            $query = "SELECT * FROM $tb";
            $res = $this->db->query($query);
            return $res->result();
        }

        function getAllnum_rows($tb)
        {
            $query = "SELECT * FROM $tb";
            $res = $this->db->query($query);
            return $res->num_rows();
        }

        function getWherenum_rows($tb, $kol, $id)
        {
            $query = "SELECT * FROM $tb WHERE $kol = '$id' ";
            $res = $this->db->query($query);
            return $res->num_rows();
        }

        function intojeniswakaf($id, $jenis, $ket, $user)
        {
            $query = "INSERT INTO `t_wakaf_jenis` (`id_jenis`, `jenis_wakaf`, `keterangan`, `add_by`) VALUES ('$id', '$jenis', '$ket', '$user');";
            $this->db->query($query);
            echo "Sukses Menambah Data Jenis ";
        }

        function getDataEditJenisModal($id)
        {
            $query = "SELECT * FROM t_wakaf_jenis WHERE id_jenis = '$id' ";
            $res = $this->db->query($query);
            $ress = $res->row_array();

            echo " 
            <input type='hidden' name='inputKode' id='inputKode' value='" . $ress['id_jenis'] . "'>
        <label for=''>Jenis Wakaf</label>
                <input type='text' class='form-control' id='inputJenis' name='inputJenis' value='" . $ress['jenis_wakaf'] . "'>
                <br>
                <label for=''>Keterangan</label>
                <input type='text' class='form-control' id='inputKeterangan' name='inputKeterangan' value='" . $ress['keterangan'] . "'>";
        }

        function updateJenisWakaf($idjenis, $jenis, $keterangan)
        {
            $query = "UPDATE `t_wakaf_jenis` SET `id_jenis` = '$idjenis', `jenis_wakaf` = '$jenis', `keterangan` = '$keterangan' WHERE `t_wakaf_jenis`.`id_jenis` = '$idjenis'";

            $this->db->query($query);
        }

        function delwhere($tb, $kol, $id)
        {
            $query = "DELETE FROM `$tb` WHERE `$tb`.`$kol` = '$id' ";
            $this->db->query($query);
        }

        function intop_jamaah($pimpinan, $alamatpimpinan, $nomerpimpinan, $emailpimpinan, $ketuapimpinan, $masajihad, $alamatketua, $nomerketua, $emailketua, $lat, $lot)
        {
            $query = "INSERT INTO `t_pimpinan_jamaah` (`pimpinan_jamaah`, `alamat_pimpinan`, `no_telp_pimpinan`, `email_pimpinan`, `ketua_jamaah`, `masa_jihad`, `alamat`, `no_telp_ketua`, `email_ketua`, `latitude`, `longitude`) VALUES ('$pimpinan', '$alamatpimpinan', '$nomerpimpinan', '$emailpimpinan', '$ketuapimpinan', '$masajihad', '$alamatketua', '$nomerketua', '$emailketua','$lat','$lot')";
            $this->db->query($query);
        }

        function up_jamaah($pimpinan, $alamatpimpinan, $nomerpimpinan, $emailpimpinan, $ketuapimpinan, $masajihad, $alamatketua, $nomerketua, $emailketua)
        {
            $query = "UPDATE `t_pimpinan_jamaah` SET `pimpinan_jamaah` = '$pimpinan', `alamat_pimpinan` = '$alamatpimpinan', `no_telp_pimpinan` = '$nomerpimpinan', `email_pimpinan` = '$emailpimpinan', `ketua_jamaah` = '$ketuapimpinan', `masa_jihad` = '$masajihad', `alamat` = '$alamatketua', `no_telp_ketua` = '$nomerketua', `email_ketua` = '$emailketua' WHERE `t_pimpinan_jamaah`.`pimpinan_jamaah` = '$pimpinan'";

            $this->db->query($query);
        }

        function into_tsaksi($idsaksi, $idpen, $temsak, $saksi, $status)
        {
            $query = "INSERT INTO `t_wakaf_saksi` (`id_saksi`, `id_penerimaan_wakaf`,`temp`, `nama_saksi`, `status_saksi`) 
        VALUES ('$idsaksi', '$idpen','$temsak','$saksi', '$status')";

            $this->db->query($query);
        }
    }
