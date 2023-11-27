<form class="form-horizontal" id="form-submit" method="post" action="<?= base_url("proses/data_wakaf_sv") ?>">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA MUWAKIF</h3>
        </label>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No Objek Wakaf </label>

        <div class="col-sm-7">
            <input type="number" id="objek_no" name="objek_no" placeholder="Nama Mufakif..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Muwakif </label>

        <div class="col-sm-7">
            <input type="text" id="nama_muwakif" name="nama_muwakif" placeholder="Nama Mufakif..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Muwakif</label>

        <div class="col-sm-9">
            <textarea name="alamat_muwakif" id="alamat_muwakif" class="col-xs-10 col-sm-5"></textarea>
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
            <input type="text" id="nama_nadzhir" name="nama_nadzhir" placeholder="Nama Nadzhir..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Nadzhir</label>

        <div class="col-sm-9">
            <textarea name="alamat_nadzhir" id="alamat_nadzhir" class="col-xs-10 col-sm-5"></textarea>
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
            <input type="text" id="jenis_tanah_wakaf" name="jenis_tanah_wakaf" placeholder="Jenis Tanah Wakaf..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Tanah (m2) </label>

        <div class="col-sm-3">
            <input type="number" id="luas_tanah_wakaf" name="luas_tanah_wakaf" placeholder="Luas Tanah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat Tanah</label>

        <div class="col-sm-9">
            <textarea name="alamat_tanah" id="alamat_tanah" class="col-xs-10 col-sm-5"></textarea>
        </div>
    </div>

    <br>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
            <h3 style="text-align: center;">DATA FUNGSI WAKAF</h3>
        </label>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fungsi Wakaf </label>

        <div class="col-sm-9">
            <input type="text" id="fungsi_wakaf" name="fungsi_wakaf" placeholder="Fungsi Wakaf..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Luas Tanah (m2) </label>

        <div class="col-sm-3">
            <input type="number" id="luas_tanah_wakaf_fungsi" name="luas_tanah_wakaf_fungsi" placeholder="Luas Tanah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Pengelola </label>

        <div class="col-sm-7">
            <input type="text" id="nama_pengelola" name="nama_pengelola" placeholder="Nama Pengelola..." class="col-xs-10 col-sm-5" autocomplete="off" required>
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
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. BASTW </label>

        <div class="col-sm-7">
            <input type="number" id="nomor_bastw" name="nomor_bastw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal BASTW </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_bastw" name="tgl_bastw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>
    <br>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. AWI / PPAIW </label>

        <div class="col-sm-7">
            <input type="number" id="no_awi_ppawi" name="no_awi_ppawi" placeholder="No AWI / PPAIW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal AWI / PPAIW </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_awi_ppaiw" name="tgl_awi_ppaiw" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. SERTIFIKAT / AJB </label>

        <div class="col-sm-7">
            <input type="number" id="no_sertifikat_ajb" name="no_sertifikat_ajb" placeholder="No Sertifikat / Ajb..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal SERTIFIKAT / AJB </label>

        <div class="col-sm-4">
            <input type="date" id="tgl_sertifikat_ajb" name="tgl_sertifikat_ajb" placeholder="No BASTW..." class="col-xs-10 col-sm-5" autocomplete="off" required>
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
            <input type="text" id="jamaah" name="jamaah" placeholder="jamaah..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ranting </label>

        <div class="col-sm-7">
            <input type="text" id="ranting" name="ranting" placeholder="ranting..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cabang </label>

        <div class="col-sm-7">
            <input type="text" id="cabang" name="cabang" placeholder="cabang..." class="col-xs-10 col-sm-5" autocomplete="off" required>
        </div>
    </div>


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