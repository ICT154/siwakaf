<form class="form-horizontal" id="form-submit_edit" method="post" action="<?= base_url("proses/data_wakaf_sv_edit") ?>">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA MUWAKIF</h3>
        </label>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Objek Wakaf </label>

        <div class="col-sm-7">
            <input type="number" id="objek_no" value="<?= $data_objek_wakaf['NO_OBJEK'] ?>" name="objek_no" placeholder="Nama Mufakif..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Muwakif </label>

        <div class="col-sm-7">
            <input type="text" id="nama_muwakif" name="nama_muwakif" value="<?= $muwakif['NAMA_MUWAKIF'] ?>" placeholder="Nama Mufakif..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Muwakif</label>

        <div class="col-sm-9">
            <textarea name="alamat_muwakif" id="alamat_muwakif" class="col-xs-10 col-sm-5">     <?= $muwakif['ALAMAT_MUWAKIF'] ?></textarea>
        </div>
    </div>



    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA NADZIR</h3>
        </label>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Nadzhir </label>

        <div class="col-sm-7">
            <input type="text" id="nama_nadzhir" name="nama_nadzhir" value="<?= $nadzir['NAMA_NADZIR'] ?>" placeholder="Nama Nadzhir..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Nadzhir</label>

        <div class="col-sm-9">
            <textarea name="alamat_nadzhir" id="alamat_nadzhir" class="col-xs-10 col-sm-5"><?= $nadzir['ALAMAT_NADZIR'] ?></textarea>
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA JENIS TANAH WAKAF</h3>
        </label>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Tanaf Wakaf </label>

        <div class="col-sm-9">
            <input type="text" id="jenis_tanah_wakaf" value=" <?= $data_objek_wakaf['JENIS_TANAH'] ?>" name="jenis_tanah_wakaf" placeholder="Jenis Tanah Wakaf..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Tanah (m2) </label>

        <div class="col-sm-3">
            <input type="number" id="luas_tanah_wakaf" value="<?= $data_objek_wakaf['LUAS_TANAH'] ?> " name="luas_tanah_wakaf" placeholder="Luas Tanah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Bangunan (m2) </label>
        <div class="col-sm-3">
            <input type="number" id="luas_bangunan_wakaf" name="luas_bangunan_wakaf" placeholder="Luas Bangunan..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori Wakaf </label>
        <div class="col-sm-3">
            <select name="kategori_wakaf" id="kategori_wakaf" class="col-xs-10 col-sm-5">
                <option value="MASJID">MASJID</option>
                <option value="PESANTREN">PESANTREN</option>
                <option value="SAWAH">SAWAH</option>
                <option value="KEBUN/TNH KOSONG">KEBUN / TANAH KOSONG</option>
                <option value="TANAH KUBURAN">TANAH KUBURAN</option>
                <option value="LAPANG IED">LAPANG IED</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Tanah</label>

        <div class="col-sm-9">
            <textarea name="alamat_tanah" id="alamat_tanah" class="col-xs-10 col-sm-5"><?= $data_objek_wakaf['LOKASI_TANAH'] ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">LOKASI : </label>

        <div class="col-sm-9">
            <textarea readonly type="text" class="col-xs-10 col-sm-5" id="alamat" name="lokasi" autocomplete="off" required=""></textarea> &nbsp;&nbsp;&nbsp; <a href="#!" onclick="getMapCoor()" class="green bigger-140 tooltip001 " title="Get Coordinat">
                <img src=" <?= base_url('vendor/') ?>assets/images/gmaps.gif" width="40px">
            </a>
        </div>
    </div>

    <input type="hidden" class="col-xs-10 col-sm-5" id="lat" name="lat" autocomplete="off" required="" value="">
    <input type="hidden" class="col-xs-10 col-sm-5" id="lon" name="lng" autocomplete="off" required="" value="">

    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA FUNGSI WAKAF</h3>
        </label>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fungsi Wakaf </label>

        <div class="col-sm-9">
            <input type="text" id="fungsi_wakaf" value="<?= $data_objek_wakaf['FUNGSI_WAKAF'] ?>" name="fungsi_wakaf" placeholder="Fungsi Wakaf..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Tanah (m2) </label>

        <div class="col-sm-3">
            <input type="number" id="luas_tanah_wakaf_fungsi" value="<?= $data_objek_wakaf['LUAS_FUNGSI'] ?>" name="luas_tanah_wakaf_fungsi" placeholder="Luas Tanah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Bangunan (m2) </label>

        <div class="col-sm-3">
            <input type="number" id="luas_bangunan_wakaf_fungsi" name="luas_bangunan_wakaf_fungsi" placeholder="Luas Tanah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pengelola </label>

        <div class="col-sm-7">
            <input type="text" id="nama_pengelola" value="<?= $data_objek_wakaf['NAMA_PENGELOLA'] ?>" name="nama_pengelola" placeholder="Nama Pengelola..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA STATUS WAKAF</h3>
        </label>
    </div>


    <!-- <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. BASTW </label>

        <div class="col-sm-7">
            <input type="number" id="nama_pengelola" name="nama_pengelola" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div> -->

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kategori Sertifikat </label>

        <div class="col-sm-7">
            <select name="kategori_sertifikat" id="kategori_sertifikat" class="col-xs-10 col-sm-5">
                <option value="BELUM">BELUM</option>
                <option value="BERITA ACARA">BERITA ACARA</option>
                <option value="DALAM PROSES">DALAM PROSES</option>
                <option value="SERTIFIKAT">SERTIFIKAT</option>
                <option value="AIW">AIW</option>
                <option value="AJB">AJB</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. BASTW </label>

        <div class="col-sm-7">
            <input type="text" id="nomor_bastw" name="nomor_bastw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required value="<?= $data_objek_wakaf['BASTW_NOMOR'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal BASTW </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_bastw" name="tgl_bastw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required value="<?= $data_objek_wakaf['TANGGAL_BASTW'] ?>">
        </div>
    </div>
    <br>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. AWI / PPAIW </label>

        <div class="col-sm-7">
            <input type="text" id="no_awi_ppawi" name="no_awi_ppawi" placeholder="No AWI / PPAIW..." class="col-xs-10 col-sm-5" autocomplete="off" value="<?= $data_objek_wakaf['AIW_NOMOR'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal AWI / PPAIW </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_awi_ppaiw" name="tgl_awi_ppaiw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" value="<?= $data_objek_wakaf['AIW_NOMOR'] ?>">
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. SERTIFIKAT / AJB </label>

        <div class="col-sm-7">
            <input type="text" id="no_sertifikat_ajb" name="no_sertifikat_ajb" placeholder="No Sertifikat / Ajb..." class="col-xs-10 col-sm-5" autocomplete="off" value="<?= $data_objek_wakaf['SERTIFIKAT_NOMOR'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal SERTIFIKAT / AJB </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_sertifikat_ajb" name="tgl_sertifikat_ajb" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" value="<?= $data_objek_wakaf['TANGGAL_SERTIFIKAT'] ?>">
        </div>
    </div>


    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA JAMAAH</h3>
        </label>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jamaah </label>

        <div class="col-sm-7">
            <input type="text" id="jamaah" name="jamaah" placeholder="jamaah..." class="col-xs-10 col-sm-5" autocomplete="off" required value="<?= $data_objek_wakaf['JAMAAH'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ranting </label>

        <div class="col-sm-7">
            <input type="text" id="ranting" name="ranting" placeholder="ranting..." class="col-xs-10 col-sm-5" autocomplete="off" required value="<?= $data_objek_wakaf['RANTING'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cabang </label>

        <div class="col-sm-7">
            <input type="text" id="cabang" name="cabang" placeholder="cabang..." class="col-xs-10 col-sm-5" autocomplete="off" readonly value="<?= $user['id_pimpinan_cabang'] ?>">
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NGOP TANAH </label>

        <div class="col-sm-7">
            <input type="text" id="ngoptanah" name="ngoptanah" placeholder="NGOP TANAH..." class="col-xs-10 col-sm-5" autocomplete="off" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NGOP BANGUNAN </label>

        <div class="col-sm-7">
            <input type="text" id="ngopbangunan" name="ngopbangunan" placeholder="NGOP BANGUNAN..." class="col-xs-10 col-sm-5" autocomplete="off" value="" required>
        </div>
    </div>


    <input type="hidden" name="id_objek_wakaf" id="id_objek_wakaf" value="<?= $data_objek_wakaf['ID'] ?>">

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-success" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn btn-info" onclick="back_tabel()">
                <i class="ace-icon fa fa-arrow-left bigger-110"></i>
                Kembali Ke Tabel
            </button>
        </div>
    </div>

</form>