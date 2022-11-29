<div style="padding:20px; clear:both; min-height:600px;">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>


            <form action="<?= base_url("proses/jenis_wakaf_" . $page . "") ?>" method="post" class="form-horizontal">
                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ID JENIS : </label>

                    <div class="col-sm-9"> -->
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_jenis" name="id_jenis" autocomplete="off"
                    required="" value="<?= $bow->id_jenis ?>">
                <!-- </div>
                </div> -->
                <br><br>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">JENIS WAKAF : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="jenis_wakaf" name="jenis_wakaf"
                            autocomplete="off" required="" value="<?= $bow->jenis_wakaf ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">KETERANGAN : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="keterangan" name="keterangan"
                            autocomplete="off" value="<?= $bow->keterangan ?>"><?= $bow->keterangan ?></textarea>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ADD BY : </label>

                    <div class="col-sm-9">
                        <input type="text" class="col-xs-10 col-sm-5" id="add_by" name="add_by" autocomplete="off"
                            required="" value="<?= $bow->add_by ?>">
                    </div>
                </div> -->


                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i
                            class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/j_wakaf') ?>" class="btn"><i
                            class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>

            </form>


        </div>
    </div>
</div>