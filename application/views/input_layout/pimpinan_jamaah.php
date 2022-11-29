<div style="padding:20px; clear:both; min-height:600px;">

    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue"><i class="ace-icon fa fa-users smaller-100"></i> <?= $bred ?>
                &nbsp; <small class="blue">[ Form input ]</small></h3>


            <form action="<?= base_url("proses/pimpinan_jamaah_" . $page . "") ?>" method="post"
                class="form-horizontal">

                <br><br>
                <input type="hidden" class="col-xs-10 col-sm-5" id="id_pimpinan_jamaah" name="id_pimpinan_jamaah"
                    autocomplete="off" required="" value="<?= $bow->id_pimpinan_jamaah ?>">

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">PIMPINAN JAMAAH : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="pimpinan_jamaah" name="pimpinan_jamaah"
                            autocomplete="off" required="" value="<?= $bow->pimpinan_jamaah ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">ALAMAT PIMPINAN : </label>

                    <div class="col-sm-9">
                        <textarea type="text" class="col-xs-10 col-sm-5" id="alamat_pimpinan" name="alamat_pimpinan"
                            autocomplete="off" required=""
                            value="<?= $bow->alamat_pimpinan ?>"><?= $bow->alamat_pimpinan ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">NO TELP PIMPINAN : </label>

                    <div class="col-sm-5">
                        <input type="text" class="col-xs-10 col-sm-5" id="no_telp_pimpinan" name="no_telp_pimpinan"
                            autocomplete="off" required="" value="<?= $bow->no_telp_pimpinan ?>"
                            onkeydown="return hanyaAngka(this);">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">EMAIL PIMPINAN : </label>

                    <div class="col-sm-6">
                        <input type="text" class="col-xs-10 col-sm-5" id="email_pimpinan" name="email_pimpinan"
                            autocomplete="off" required="" value="<?= $bow->email_pimpinan ?>">
                    </div>
                </div>


                <br><br>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">KETUA JAMAAH : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="ketua_jamaah" name="ketua_jamaah"
                            autocomplete="off" required="" value="<?= $bow->ketua_jamaah ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">MASA JIHAD : </label>

                    <div class="col-sm-3">
                        <input type="text" class="col-xs-10 col-sm-5" id="masa_jihad" name="masa_jihad"
                            autocomplete="off" required="" value="<?= $bow->masa_jihad ?>">
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
                    <label for="" class="col-sm-3 control-label no-padding-right">NO TELP KETUA : </label>

                    <div class="col-sm-5">
                        <input type="text" class="col-xs-10 col-sm-5" id="no_telp_ketua" name="no_telp_ketua"
                            autocomplete="off" required="" value="<?= $bow->no_telp_ketua ?>"
                            onkeydown="return hanyaAngka(this);">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">EMAIL KETUA : </label>

                    <div class="col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" id="email_ketua" name="email_ketua"
                            autocomplete="off" required="" value="<?= $bow->email_ketua ?>">
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
                    <label for="" class="col-sm-3 control-label no-padding-right">LATITUDE : </label>

                    <div class="col-sm-4">
                        <input type="text" class="col-xs-10 col-sm-5" id="lat" name="latitude" autocomplete="off"
                            required="" value="<?= $bow->latitude ?>" readonly>
                    </div>
                </div>



                <div class="form-group">
                    <label for="" class="col-sm-3 control-label no-padding-right">LONGITUDE : </label>

                    <div class="col-sm-4">
                        <input type="text" class="col-xs-10 col-sm-5" id="lon" name="longitude" autocomplete="off"
                            required="" value="<?= $bow->longitude ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-info"><i
                            class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
                    <a href="<?= base_url('dash/p_jamaah') ?>" class="btn"><i
                            class="ace-icon fa fa-undo bigger-110"></i>Kembali</a>
                </div>

            </form>
        </div>
    </div>
</div>


<script>
function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}
</script>

<script>
function showdet_v2(no, idf, tabel) {
    stat = document.getElementById("det_stat_" + no).value;
    if (stat == "0") {
        $("#detail_" + no).show();
        a = "1";
        $("#det-cls-" + no).addClass("fa-angle-double-up");
        $("#det-cls-" + no).removeClass("fa-angle-double-down");

        $('#load-det_' + no).show();
        $.ajax({
            url: "<?= base_url('ajx/ajx_g_details_tabel') ?>",
            type: "post",
            data: {
                idf,
                tabel
            },
            success: function(msg) {
                // $('#load-det_' + no).hide();
            }
        });

    } else {
        $("#detail_" + no).hide();
        a = "0";
        $("#det-cls-" + no).addClass("fa-angle-double-down");
        $("#det-cls-" + no).removeClass("fa-angle-double-up");

    }
    document.getElementById("det_stat_" + no).value = a;
    val = document.getElementById("det_isi_" + no).value;
    // if (val == "0") {
    //     document.getElementById("det_isi_" + no).value = 1;

    //     $("#detailisi_" + no).html(
    //         "<div class='lds-roller' style='left:calc(50% - 32px);'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>"
    //     );
    //     idf = encodeURI(idf);
    //     $("#detailisi_" + no).load("ajx/" + fileDet + ".php?idf=" + idf, function(responseTxt, statusTxt, xhr) {
    //         if (statusTxt == "success") {}
    //         if (statusTxt == "error") {
    //             alert("Error: " + xhr.status + ": " + xhr.statusText);
    //         }

    //     });

    // }
}

$('#db').attr('class', 'active open');
$('#pimpinan').attr('class', 'active');
</script>