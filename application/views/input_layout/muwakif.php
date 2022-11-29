<div style="padding:20px; clear:both; min-height:600px;">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>
            <form action="<?= base_url("proses/muwakif_" . $page . "") ?>" method="post" class="form-horizontal">
                <!-- <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ID PEMBERI : </label>

                    <div class="col-sm-9"> -->
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_pemberi" name="id_pemberi" autocomplete="off" required="" value="<?= $bow->id_pemberi ?>">
                <!-- </div>
                </div> -->

                <br><br>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NAMA PEMBERI : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="nama_pemberi" name="nama_pemberi" autocomplete="off" required="" value="<?= $bow->nama_pemberi ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ALAMAT PEMBERI : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="alamat_pemberi" name="alamat_pemberi" autocomplete="off" required="" value="<?= $bow->alamat_pemberi ?>"><?= $bow->alamat_pemberi ?>
                        </textarea>
                    </div>
                </div>


                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/muwakif') ?>" class="btn"><i class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#db').attr('class', 'active open');
    $('#muwakif').attr('class', 'active');
</script>