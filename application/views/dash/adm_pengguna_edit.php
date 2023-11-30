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


<form action="<?= base_url('dash/ajx_e_adm') ?>" method="post" class="form-horizontal" onsubmit="a_adm()">

    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Nama : </label>

        <div class="col-sm-9">
            <input type="text" class="col-xs-10 col-sm-5" id="inputNama" name="inputNama" autocomplete="off" required value="<?= $adm['nama'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Username : </label>

        <div class="col-sm-9">
            <input type="text" class="col-xs-10 col-sm-5" id="inputUsername" name="inputUsername" autocomplete="off" required value="<?= $adm['username'] ?>">
        </div>
    </div>

    <?php
    if ($user['username'] == "siwakaf") { ?>
        <div class="form-group">
            <label for="" class="col-sm-3 control-label no-padding-right">Password : </label>

            <div class="col-sm-9">
                <input type="text" class="col-xs-10 col-sm-5" id="password" name="password" autocomplete="off" required value="<?= $adm['password'] ?>">
            </div>
        </div>
    <?php } else { ?>

        <input type="hidden" class="col-xs-10 col-sm-5" id="password" name="password" autocomplete="off" required value="<?= $adm['password'] ?>">

    <?php }
    ?>


    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Email : </label>

        <div class="col-sm-9">
            <input type="email" class="col-xs-10 col-sm-5" id="inputEmail" name="inputEmail" autocomplete="off" required value="<?= $adm['email'] ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">Pimpinan Cabang : </label>

        <div class="col-sm-9">
            <select name="pimpinan_cabang" id="pimpinan_cabang" class="col-xs-10 col-sm-5">
                <option value="">-- Pilih Pimpinan Cabang --</option>
                <?php foreach ($pimpinan_cabang as $key) { ?>
                    <option value="<?= $key ?>"><?= $key ?></option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="" class="col-sm-3 control-label no-padding-right">NIAT : </label>

        <div class="col-sm-9">
            <input type="text" class="col-xs-10 col-sm-5" id="niat" name="niat" autocomplete="off" required value="<?= $adm['NIAT'] ?>">
        </div>
    </div>



    <div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-info"><i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
        <a href="<?= base_url('dash/pengguna') ?>" class="btn"><i class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
    </div>

    <input type="hidden" name="username_hidden" id="username_hidden" value="<?= $adm['username'] ?>">

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