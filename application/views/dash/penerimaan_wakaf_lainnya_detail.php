<style>
.card {
    box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 90%;
    float: left;
    background: #ffffff;
}
</style>

<br><br>
<div class="page-header">
    <h1>
        <?= $bred ?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Detail
        </small>
    </h1>
</div>

<?php
// echo "<pre>";
// print_r($ting);
// echo "</pre>";

?>


<div class="card" id="detail_form">
    <center><b><u>
                <h2>Data <?= $kat['jenis_wakaf'] ?></h2>
            </u></b></center>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">1. PIMPINAN
                        JAMAAH :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pim['pimpinan_jamaah'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">ALAMAT :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pim['alamat_pimpinan'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">No.
                        Telp/Email :
                    </label>
                    <div class="col-sm-9">
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
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $no ?></label>
                        <label for="" style="margin-top: 7px;">Email : <?= $emp; ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">2. Nama Ketua
                        Jamaah :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pim['ketua_jamaah'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">Masa Jihad :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pim['masa_jihad'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">Alamat :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $pim['alamat'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">No.
                        Telp/Email :
                    </label>
                    <div class="col-sm-9">
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
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $no ?></label>
                        <label for="" style="margin-top: 7px;">Email : <?= $emp; ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="kat_gan">3. Jenis
                        Wakaf :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pru['jenis_peruntukan'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">Alamat :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $pim['alamat'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">No.
                        Telp/Email :
                    </label>
                    <div class="col-sm-9">
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
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $no ?></label>
                        <label for="" style="margin-top: 7px;">Email : <?= $emp; ?></label>
                    </div>
                </div>

                <div class="form-group" id="Tingkat">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">4. Tingkat
                        :
                    </label>
                    <?php
                    $tingk = $ting['tingkat'];
                    $array =  explode('|', $tingk);
                    // print_r($array);
                    ?>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">
                            <?php
                            foreach ($array as $key) {
                                echo "<li>$key</li>";
                            }
                            ?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Pengelola">4.
                        Pengelola
                        :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pen['nama_penerima'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px;">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">No.
                        Telp/Email :
                    </label>
                    <div class="col-sm-9">
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
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;"><?= $no ?></label>
                        <label for="" style="margin-top: 7px;">Email : <?= $emp; ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Status">5. Status
                        Wakaf :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $dt['status_wakaf'] ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Muwakif">6. Muwakif :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pem['nama_pemberi'] ?></label>
                    </div>
                </div>

                <div class="form-group" style="margin-top: -100px">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">Alamat :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5"
                            style="margin-top: 7px;"><?= $pem['alamat_pemberi'] ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Sertifikat">7. No.
                        Sertifikat/AJB/AUW :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">Sertifikat :
                            <?php if ($serti['no_sertifikat'] == null) {
                                echo '-';
                            } else {
                                echo $serti['no_sertifikat'];
                            } ?></label>
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">AJB :
                            <?php if ($serti['ajb'] == null) {
                                echo '-';
                            } else {
                                echo $serti['ajb'];
                            } ?></label>
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">AIW :
                            <?php if ($serti['aiw'] == null) {
                                echo '-';
                            } else {
                                echo $serti['aiw'];
                            } ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Luas">8. Luas Tanah
                        :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">Bangunan :
                            <?php
                            if ($lu['luas_bangunan'] == null) {
                                echo 'Rp. -';
                            } else {
                                echo "" . $lu['luas_bangunan'] . " m2";
                            }
                            ?>
                        </label>
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">Tanah :
                            <?php
                            if ($dt['est_nilai_tanah'] == null) {
                                echo 'Rp. -';
                            } else {
                                echo "" . $dt['est_nilai_tanah'] . " m2";
                            }
                            ?></label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Estimasi">9. Estimasi
                        Nilai Bangunan :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">
                            <?php
                            if ($dt['est_nilai_bangunan'] == null) {
                                echo 'Rp. -';
                            } else {
                                echo "Rp. " . number_format($dt['est_nilai_bangunan']) . "";
                            }
                            ?>
                        </label>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Estimasi2">10.
                        Estimasi
                        Nilai Tanah
                        :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-10 col-sm-5" style="margin-top: 7px;">
                            <?php
                            if ($dt['est_nilai_tanah'] == null) {
                                echo 'Rp. -';
                            } else {
                                echo "Rp. " . number_format($dt['est_nilai_tanah']) . "";
                            }
                            ?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">11.
                        Saksi-Saksi
                        :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-9" style="margin-top: 7px;" id="saksihere"><br>

                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Bangunan">12.
                        Bangunan Lain Dilingkungan Tanah Wakaf Masjid :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-9" style="margin-top: 7px;" id="bang_here"><br>

                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="Inventaris">13.
                        Inventaris Masjid :
                    </label>
                    <div class="col-sm-9">
                        <label for="" class="col-xs-9" style="margin-top: 7px;" id="inv_here"><br>

                        </label>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
<input type="hidden" value="<?= $dt['id_penerimaan_wakaf']; ?>" id="inputId" class="inputId">
<input type="hidden" value="<?= $kat['id_jenis'] ?>" id="katwak">


<!-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script> -->