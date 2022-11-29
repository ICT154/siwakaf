<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>


<body>
    <div class="container">
        <input type="hidden" value="<?= $dt['id_penerimaan_wakaf']; ?>" id="inputId" class="inputId">
        <input type="hidden" value="<?= $kat['id_jenis'] ?>" id="katwak">
        <center>
            <h1><b><u>Data <?= $kat['jenis_wakaf'] ?></u></b></h1>
        </center>
        <br>
        <label id="jen_gan">1. PIMPINAN
            JAMAAH : <?= $pim['pimpinan_jamaah'] ?>
        </label><br><br>
        <label id="jen_gan"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; ALAMAT :
            <?= $pim['alamat_pimpinan'] ?>
        </label><br><br>
        <?php if ($pim['no_telp_pimpinan'] == '0') {
            $no = "-";
        } else {
            $no = $pim['no_telp_pimpinan'];
        }
        if ($pim['email_pimpinan'] == null) {
            $emp = '-';
        } else {
            $emp = $pim['email_pimpinan'];
        }
        ?>
        <label id="jen_gan">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
            &nbsp; No. Telpon/Email :
            <?= $no ?> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Email : <?= $emp; ?>
        </label><br><br>

        <label id="jen_gan">2. Nama Ketua Jamaah : <?= $pim['ketua_jamaah'] ?>
        </label><br><br>
        <label id="jen_gan"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Masa Jihad :
            <?= $pim['masa_jihad'] ?>
        </label><br><br>
        <label id="jen_gan"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;
            &nbsp;
            &nbsp;&nbsp;Alamat :
            <?= $pim['alamat'] ?>
        </label><br><br>
        <?php if ($pim['no_telp_ketua'] == '0') {
            $no = "-";
        } else {
            $no = $pim['no_telp_ketua'];
        }
        if ($pim['email_ketua'] == null) {
            $emp = '-';
        } else {
            $emp = $pim['email_ketua'];
        }
        ?>
        <label id="jen_gan">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
            &nbsp; No. Telpon/Email :
            <?= $no ?> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; Email : <?= $emp; ?>
        </label><br><br>

        <label id="kat_gan">3. Jenis
            Wakaf :
        </label> &nbsp;<?= $pru['jenis_peruntukan'] ?>
        <br><br>
        <label id="jen_gan">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp;Alamat :
        </label>&nbsp;<?= $pru['alamat'] ?>
        <?php if ($pru['no_telp'] == '0') {
            $no = "-";
        } else {
            $no = $pru['no_telp'];
        }
        if ($pru['email'] == null) {
            $emp = '-';
        } else {
            $emp = $pru['email'];
        }
        ?>

        <br><br>
        <label id="jen_gan">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;No.
            Telp/Email :
        </label>
        <?= $no ?>&nbsp; &nbsp;&nbsp; Email : <?= $emp; ?>
        <br><br>

        <div id="Tingkat" style="display: none;">
            <?php
            $tingk = $ting['tingkat'];
            $array =  explode('|', $tingk);
            // print_r($array);
            ?>
            <label id="Tingkat2">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;4. Tingkat
                : <?php
                    foreach ($array as $key) {
                        echo "&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;";
                        echo "<li>$key</li>";
                    }
                    ?>
            </label>
        </div>

        <label id="Pengelola">4.
            Pengelola
            :
        </label>&nbsp;<?= $pen['nama_penerima'] ?>
        <br><br>
        <label id="jen_gan">No.
            Telp/Email :
        </label>
        <?php if ($pen['no_penerima'] == '0') {
            $no = "-";
        } else {
            $no = $pen['no_penerima'];
        }
        if ($pen['email_penerima'] == null) {
            $emp = '-';
        } else {
            $emp = $pen['email_penerima'];
        }
        ?>
        <?= $no ?> &nbsp;&nbsp;Email : <?= $emp; ?>
        <br><br>

        <label id="Status">5. Status
            Wakaf :
        </label>
        <label><?= $dt['status_wakaf'] ?></label>
        <br><br>
        <label id="Muwakif">6. Muwakif :
        </label>
        <label><?= $pem['nama_pemberi'] ?></label>
        <br><br>
        <label id="jen_gan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat :
        </label> <label><?= $pem['alamat_pemberi'] ?></label>
        <br><br>
        <label id="Sertifikat">7. No.
            Sertifikat/AJB/AUW :&nbsp;&nbsp;
            <?php if ($serti['no_sertifikat'] == null) {
                echo '-';
            } else {
                echo $serti['no_sertifikat'];
            } ?>
            <label>&nbsp;&nbsp;AJB :&nbsp;&nbsp;
                <?php if ($serti['ajb'] == null) {
                    echo '-';
                } else {
                    echo $serti['ajb'];
                } ?></label>
            <label>&nbsp;&nbsp;AIW :&nbsp;&nbsp;
                <?php if ($serti['aiw'] == null) {
                    echo '-';
                } else {
                    echo $serti['aiw'];
                } ?></label>ss
        </label>
        <br><br>

        <label id="Luas">8. Luas Tanah
            :
        </label>
        <label>Bangunan :
            <?php
            if ($lu['luas_bangunan'] == null) {
                echo '&nbsp;&nbsp;-&nbsp;&nbsp;';
            } else {
                echo "&nbsp;&nbsp;" . $lu['luas_bangunan'] . " m2&nbsp;&nbsp;";
            }
            ?>
        </label>
        <label>Tanah :
            <?php
            if ($lu['luas_bangunan'] == null) {
                echo '&nbsp;&nbsp;-&nbsp;&nbsp;';
            } else {
                echo "&nbsp;&nbsp;" . $lu['luas_bangunan'] . " m2&nbsp;&nbsp;";
            }
            ?>
        </label>
        <br><br>

        <label id="Estimasi">9. Estimasi
            Nilai Bangunan :
        </label>
        <?php
        if ($dt['est_nilai_bangunan'] == null) {
            echo 'Rp. -';
        } else {
            echo "Rp. " . number_format($dt['est_nilai_bangunan']) . "";
        }
        ?>
        <br><br>
        <label id="Estimasi2">10.
            Estimasi
            Nilai Tanah
            :
        </label>
        <?php
        if ($dt['est_nilai_tanah'] == null) {
            echo 'Rp. -';
        } else {
            echo "Rp. " . number_format($dt['est_nilai_tanah']) . "";
        }
        ?>

        <br><br>
        <label id="jen_gan">11.
            Saksi-Saksi
            :
        </label>
        <br>
        <?php
        foreach ($sak as $key) {
            echo "Nama Saksi : " . $key->nama_saksi . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status Saksi : " . $key->status_saksi . "<br>";
        }
        ?>
        <!-- <label id="saksihere"><br>
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
        </label> -->
        <br><br>

        <label id="Bangunan">12.
            Bangunan Lain Dilingkungan Tanah Wakaf Masjid :
        </label>
        <br>

        <?php
        foreach ($bang as $key) {
            echo "Jenis Bangunan : " . $key->jenis_bangunan . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a/n : " . $key->atas_nama_bang . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surat Perjanjian : " . $key->surat_perjanjian . "<br>";
        }
        ?>
        <!-- <label id="bang_here"><br>

        </label> -->
        <br><br>

        <label id="Inventaris">13.
            Inventaris Masjid :
        </label>
        <br>

        <?php
        foreach ($inv as $key) {
            echo "Jenis Inventaris : " . $key->jenis_inven . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Unit : " . $key->total_unit . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keadaan : " . $key->keadaan_unit . "<br>";
        }
        ?>
        <!-- <label id="inv_here"><br>

        </label> -->




        <br><br><br><br>
    </div>



</body>

</html>