<br><br>
<div class="page-header">
    <h1>
        <?= $bred ?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Form Input
        </small>
    </h1>
</div>

<?php

$kod = rand(10000, 99999);
$kode = "JW$kod";

?>

<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">KODE : </label>
                <div class="col-sm-9">
                    <input type="text" id="inputKode" name="inputKode" placeholder="" class="col-xs-10 col-sm-5"
                        readonly value="<?= $kode ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">KATEGORI : </label>
                <div class="col-sm-9">
                    <input type="text" autocomplete="off" id="inputJenis" name="inputJenis" placeholder=""
                        class="col-xs-10 col-sm-5" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">KETERANGAN : </label>
                <div class="col-sm-9">
                    <textarea name="inputKeterangan" id="inputKeterangan" cols="30" rows="3"
                        class="col-xs-10 col-sm-5"></textarea>
                </div>
            </div>

        </form>
        <div class="alert alert-success" id="pesanberhasil" style="display:none; position:relative;"></div>
        <div class="alert alert-danger" id="pesangagal" style="display:none; position:relative;">Silahkan Isi Kolom Yang
            Tersedia</div>

        <div class="col-md-offset-3 col-md-9">
            <button id="btn" class="btn btn-info" onclick="add()">
                <span id="loadinglog" style="display:none; position:relative;"><img
                        src=" <?= base_url('vendor/') ?>assets/images/loading.gif" /></span>
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
            <a href="<?= base_url('dash/j_wakaf') ?>" class="btn"><i
                    class="ace-icon fa fa-undo bigger-110"></i>Batal</a>
        </div>
    </div>
</div>

<script type="text/javascript">
function add() {
    // alert('hay');
    $('#loadinglog').show();
    document.getElementById('btn').disabled = true;
    var idkode = $('#inputKode').val();
    var jenis = $('#inputJenis').val();
    var keterangan = $('#inputKeterangan').val();

    if (idkode != '' && jenis != '') {
        //alert('please fill the blank');
        $('#pesangagal').fadeOut();
        $('#loadinglog').hide();
        $.ajax({
            url: '<?= base_url('dash/ajx_a_j_wakaf') ?>',
            type: 'post',
            data: {
                idkode: idkode,
                jenis: jenis,
                keterangan: keterangan
            },
            success: function(pesan) {
                $('#pesanberhasil').fadeIn();
                $('#pesanberhasil').html(pesan);
                $('#loadinglog').hide();
                document.getElementById('btn').disabled = false;
                // document.location = '<?= base_url('dash/j_wakaf') ?>';
            }
        });
    } else {
        //alert('please fill the blank');
        $('#pesangagal').fadeIn();
        //$('#pesangagal').fadeOut();
        $('#loadinglog').hide();
        document.getElementById('btn').disabled = false;
    }

}
</script>

<script>
$('#db').attr('class', 'active open');
$('#kategoriwakaf').attr('class', 'active');
</script>