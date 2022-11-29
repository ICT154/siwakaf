<div style="padding:20px; clear:both; min-height:600px;">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-building"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>
            <form action="<?= base_url("proses/wakaf_sawah_" . $page . "") ?>" method="post" class="form-horizontal">



                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ID DATA WAKAF : </label> -->

                <!-- <div class="col-sm-9"> -->
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_data_wakaf" name="id_data_wakaf" autocomplete="off" required="" value="<?= $bow->id_data_wakaf ?>">
                <!-- </div>
                </div> -->

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NAMA WAKIF : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" id="nama_wakif" name="nama_wakif" autocomplete="off" required="" value="<?= $bow->nama_wakif ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ALAMAT WAKIF : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="alamat_wakif" name="alamat_wakif" autocomplete="off" required="" value="<?= $bow->alamat_wakif ?>"><?= $bow->alamat_wakif ?></textarea>
                    </div>
                </div>

                <br><br>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">TANAH : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="tanah" name="tanah" autocomplete="off" required="" value="<?= $bow->tanah ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LUAS TANAH : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-2" id="luas_tanah" name="luas_tanah" autocomplete="off" required="" value="<?= $bow->luas_tanah ?>"> &nbsp;&nbsp; m2
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">BANGUNAN : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="bangunan" name="bangunan" autocomplete="off" required="" value="<?= $bow->bangunan ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LUAS BANGUNAN : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-2" id="luas_bangunan" name="luas_bangunan" autocomplete="off" required="" value="<?= $bow->luas_bangunan ?>"> &nbsp;&nbsp; m2
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">PERUNTUKAN : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="peruntukan" name="peruntukan" autocomplete="off" required="" value="<?= $bow->peruntukan ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LOKASI WAKAF : </label>
                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="lokasi_wakaf" name="lokasi_wakaf" autocomplete="off" required="" value="<?= $bow->lokasi_wakaf ?>"><?= $bow->lokasi_wakaf ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">PERSIL : </label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-2" id="persil" name="persil" autocomplete="off" required="" value="<?= $bow->persil ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NO. BASTW REG : </label>
                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-2" id="bastw_reg" name="bastw_reg" autocomplete="off" required="" value="<?= $bow->bastw_reg ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NO. BASTW TAHUN : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-2" id="bastw_tahun" name="bastw_tahun" autocomplete="off" required="" value="<?= $bow->bastw_tahun ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">AJB : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-3" id="ajb" name="ajb" autocomplete="off" required="" value="<?= $bow->ajb ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">AIW : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-3" id="aiw" name="aiw" autocomplete="off" required="" value="<?= $bow->aiw ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">SERTIFIKAT : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-3" id="sertifikat" name="sertifikat" autocomplete="off" required="" value="<?= $bow->sertifikat ?>">
                    </div>
                </div>




                <br><br>






                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">KETUA NAZIR : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="ketua_nazir" name="ketua_nazir" autocomplete="off" required="" value="<?= $bow->ketua_nazir ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">PIMPINAN CABANG : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="pimpinan_cabang" name="pimpinan_cabang" autocomplete="off" required="" value="<?= $bow->pimpinan_cabang ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">KETUA PIMPINAN CABANG : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="ketua_pimpinan_cabang" name="ketua_pimpinan_cabang" autocomplete="off" required="" value="<?= $bow->ketua_pimpinan_cabang ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">BIDGAR WAKAF : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="bidgar_wakaf" name="bidgar_wakaf" autocomplete="off" required="" value="<?= $bow->bidgar_wakaf ?>">
                    </div>

                </div>





                <br><br>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">Penggarap : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="nama" name="nama" autocomplete="off" required="" value="<?= $bow->nama ?>">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">MUDIR'AM / MUDIR : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-4" id="pengelola" name="pengelola" autocomplete="off" required="" value="<?= $bow->pengelola ?>">
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">SK / SURAT TUGAS : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="sk" name="sk" autocomplete="off" required="" value=""><?= $bow->sk ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LOKASI : </label>

                    <div class="col-sm-9">
                        <textarea readonly type="text" class="col-xs-10 col-sm-5" id="alamat" name="lokasi" autocomplete="off" required="" value="<?= $bow->lokasi ?>"><?= $bow->lokasi ?></textarea> &nbsp;&nbsp;&nbsp; <a href="#!" onclick="getMapCoor()" class="green bigger-140 tooltip001 " title="Get Coordinat">
                            <img src=" <?= base_url('vendor/') ?>assets/images/gmaps.gif" width="40px">
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">POLA KEMITRAAN : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="pola_kemitraan" name="pola_kemitraan" autocomplete="off" required="" value="<?= $bow->pola_kemitraan ?>"><?= $bow->pola_kemitraan ?></textarea>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LAT : </label>

                    <div class="col-sm-9"> -->
                <input type="hidden" class="col-xs-10 col-sm-5" id="lat" name="lat" autocomplete="off" required="" value="<?= $bow->lat ?>">
                <!-- </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LNG : </label>

                    <div class="col-sm-9"> -->
                <input type="hidden" class="col-xs-10 col-sm-5" id="lon" name="lng" autocomplete="off" required="" value="<?= $bow->lng ?>">
                <!-- </div>
    </div> -->


                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/wakaf_sawah') ?>" class="btn"><i class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    new AutoNumeric('#luas_tanah', 'integer');
    new AutoNumeric('#luas_bangunan', 'integer');
    $('#pen').attr('class', 'active open');
    $('#wakaf_pesantren').attr('class', 'active');
</script>