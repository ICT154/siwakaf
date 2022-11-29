<div style="padding:20px; clear:both; min-height:600px;">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>
            <form action="<?= base_url("proses/peruntukan_" . $page . "") ?>" method="post" class="form-horizontal">

                <br><br>
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_peruntukan" name="id_peruntukan"
                    autocomplete="off" required="" value="<?= $bow->id_peruntukan ?>">


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">JENIS PERUNTUKAN : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="jenis_peruntukan" name="jenis_peruntukan"
                            autocomplete="off" required="" value="<?= $bow->jenis_peruntukan ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ALAMAT : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="alamat" name="alamat" autocomplete="off"
                            required="" value="<?= $bow->alamat ?>"><?= $bow->alamat ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NO TELP : </label>

                    <div class="col-sm-5">
                        <input type="text" class="col-xs-10 col-sm-5" id="no_telp" name="no_telp" autocomplete="off"
                            required="" value="<?= $bow->no_telp ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">EMAIL : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="email" name="email" autocomplete="off"
                            required="" value="<?= $bow->email ?>">
                    </div>
                </div>


                <br><br>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right"> <a href="#!" onclick="getMapCoor()"
                            title="Get Coordinat">
                            <img src=" <?= base_url('vendor/') ?>assets/images/gmaps.gif" width="30px">
                        </a></label>

                    <div class="col-sm-4">

                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LAT : </label>

                    <div class="col-sm-6">
                        <input type="text" class="col-xs-10 col-sm-5" id="lat" name="lat" autocomplete="off" required=""
                            value="<?= $bow->lat ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LNG : </label>

                    <div class="col-sm-6">
                        <input type="text" class="col-xs-10 col-sm-5" id="lon" name="lng" autocomplete="off" required=""
                            value="<?= $bow->lng ?>" readonly>
                    </div>
                </div>


                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i
                            class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/perunt_wakaf') ?>" class="btn"><i
                            class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>



            </form>
        </div>
    </div>
</div>

<script>
$('#db').attr('class', 'active open');
$('#peruntukan').attr('class', 'active');
</script>