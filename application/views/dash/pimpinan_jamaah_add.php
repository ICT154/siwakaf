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


<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal" method="POST" action="<?= base_url('dash/ajx_a_p_jamaah') ?>" id="formpimpinan"
            onsubmit="addpim()">

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">PIMPINAN JAMAAH : </label>
                <div class="col-sm-7">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputPimpinan" name="inputPimpinan"
                        autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ALAMAT : </label>
                <div class="col-sm-9">
                    <textarea name="inputAlamat" id="inputAlamat" required autocomplete="off" cols="40"
                        rows="3"></textarea>
                    <!-- <input type="text" autocomplete="off" class="col-xs-10 col-sm-5" id="inputAlamat" name="inputAlamat"
                        required> -->
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Telp : </label>
                <div class="col-sm-5">
                    <input type="number" autocomplete="off" class="col-xs-10 col-sm-5" id="inputTelp" name="inputTelp">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email : </label>
                <div class="col-sm-7">
                    <input type="email" autocomplete="off" class="col-xs-10 col-sm-5" id="inputEmail" name="inputEmail">
                </div>
            </div>

            <br><br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NAMA KETUA PIMPINAN JAMAAH :
                </label>
                <div class="col-sm-7">
                    <input type="text" autocomplete="off" class="col-xs-10 col-sm-5" id="inputKetuaPimpinan"
                        name="inputKetuaPimpinan" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">MASA JIHAD : </label>
                <div class="col-sm-4">
                    <input type="text" autocomplete="off" class="col-xs-10 col-sm-5" id="inputJihad" name="inputJihad"
                        placeholder="Contoh : 2014 - 2018" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ALAMAT KETUA : </label>
                <div class="col-sm-9">
                    <textarea name="inputKetuaAlamat" id="inputKetuaAlamat" cols="40" rows="3" required
                        autocomplete="off"></textarea>
                    <!-- <input type="text" autocomplete="off" class="col-xs-10 col-sm-5" id="inputKetuaAlamat"
                        name="inputKetuaAlamat"> -->
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Telp : </label>
                <div class="col-sm-5">
                    <input type="number" autocomplete="off" class="col-xs-10 col-sm-5" id="inputKetuaTelp"
                        name="inputKetuaTelp">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email : </label>
                <div class="col-sm-7">
                    <input type="email" autocomplete="off" class="col-xs-10 col-sm-5" id="inputKetuaEmail"
                        name="inputKetuaEmail">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Koordinat </label>
                <label class="col-sm-1 control-label no-padding-right"> Lat. </label>
                <div class="col-sm-2">
                    <input type="text" name="lat" id="lat" class="form-control" value="" maxlength="20"
                        placeholder="misal: -6.27925" required readonly />
                </div>
                <label class="col-sm-1 control-label no-padding-right"> Lon. </label>
                <div class="col-sm-2">
                    <input type="text" name="lon" id="lon" class="form-control" value="" maxlength="20"
                        placeholder="misal: 106.974754" required readonly />
                </div>
                <div class="col-sm-1 action-buttons">
                    <a href="#!" onclick="getMapCoor()" class="green bigger-140 tooltip001 " title="Get Coordinat">
                        <img src=" <?= base_url('vendor/') ?>assets/images/gmaps.gif" width="30px">
                    </a>
                </div>
            </div>

            <?php //require_once('../app_wakaf/application/helpers/map/pel-lltt_f_js.php') 
            ?>

            <br><br>

            <div class="col-md-offset-3 col-md-9">
                <div class="form-group">
                    <button type="submit" class="btn btn-info" id="btnsubmit"><span id="loadinglog"
                            style="display:none; position:relative;"><img
                                src=" <?= base_url('vendor/') ?>assets/images/loading.gif" /></span><i
                            class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                </div>
            </div>
        </form>
        <div class="alert alert-danger" id="pesangagal" style="display:none;">Isilah Data Dengan Benar !</div>
        <div class="alert alert-danger" id="pesanberhasil" style="display:none;">Data Pimpinan Jamaah Berhasil Diisi !
        </div>
        <div class="col-md-offset-3 col-md-9">
            <!-- <button id="btn" class="btn btn-info" onclick="add()">
                <span id="loadinglog" style="display:none; position:relative;"><img
                        src=" <?= base_url('vendor/') ?>assets/images/loading.gif" /></span>
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button> -->
        </div>
    </div>
</div>

<script type="text/javascript">
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}

function addpim() {
    $('#pesangagal').fadeOut();
    $('#loadinglog').show();
    document.getElementById('btnsubmit').disabled = true;
    $.ajax({
        url: $(this).attr('action'),
        type: 'post',
        data: $(this).serialize(),
        success: function(pesan) {
            $('#pesanberhasil').fadeIn();
        }
    });
}
</script>

<script>
$('#db').attr('class', 'active open');
$('#pimpinan').attr('class', 'active');
</script>