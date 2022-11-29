<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-users"></i>
        <?= $bred ?>
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Form Input
        </small>
        <!-- <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/adm_a') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span> -->
    </h1>
</div>


<form action="<?= base_url('dash/ajx_a_adm') ?>" method="post" class="form-horizontal" onsubmit="a_adm()">


    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Nama : </label>

        <div class="col-sm-9">
            <input type="text" class="col-xs-10 col-sm-5" id="inputNama" name="inputNama" autocomplete="off" required>
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Username : </label>

        <div class="col-sm-9">
            <input type="text" class="col-xs-10 col-sm-5" id="inputUsername" name="inputUsername" autocomplete="off"
                required>
        </div>
    </div>


    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Email : </label>

        <div class="col-sm-9">
            <input type="email" class="col-xs-10 col-sm-5" id="inputEmail" name="inputEmail" autocomplete="off"
                required>
        </div>
    </div>
    <div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-info"><i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
        <a href="<?= base_url('dash/pengguna') ?>" class="btn"><i class="ace-icon fa fa-undo bigger-110"></i>Simpan</a>
    </div>


</form>
<br><br><br>
<em>* untuk data baru. [ password = username ] </em>

<script>
function a_adm() {
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        success: function(pesan) {

        }
    });
}

$('#set').attr('class', 'active open');
$('#pengg').attr('class', 'active');
</script>