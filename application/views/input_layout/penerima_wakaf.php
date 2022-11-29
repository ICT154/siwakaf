<div style="padding:20px; clear:both; min-height:600px;">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>
            <form action="<?= base_url("proses/penerima_wakaf_" . $page . "") ?>" method="post" class="form-horizontal">

                <br><br>
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_penerima" name="id_penerima" autocomplete="off"
                    required="" value="<?= $bow->id_penerima ?>">

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NAMA PENERIMA : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="nama_penerima" name="nama_penerima"
                            autocomplete="off" required="" value="<?= $bow->nama_penerima ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ALAMAT PENERIMA : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="alamat_penerima" name="alamat_penerima"
                            autocomplete="off" required=""
                            value="<?= $bow->alamat_penerima ?>"><?= $bow->alamat_penerima ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NO PENERIMA : </label>

                    <div class="col-sm-5">
                        <input type="text" class="col-xs-10 col-sm-5" id="no_penerima" name="no_penerima"
                            autocomplete="off" required="" value="<?= $bow->no_penerima ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">EMAIL PENERIMA : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="email_penerima" name="email_penerima"
                            autocomplete="off" required="" value="<?= $bow->email_penerima ?>">
                    </div>
                </div>



                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i
                            class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/penerima_wakaf') ?>" class="btn"><i
                            class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#db').attr('class', 'active open');
$('#penerima_wakaf').attr('class', 'active');
</script>