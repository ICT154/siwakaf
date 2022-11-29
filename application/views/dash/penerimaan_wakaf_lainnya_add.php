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
        <div class="form-horizontal">

        </div>

        <br><br>
        <form method="post" id="f_add_w_lainnya" class="form-horizontal" onsubmit="a_w_lainnya()"
            enctype="multipart/form-data" action="<?= base_url('dash/ajx_a_w_lainnya') ?>">

            <div class="form-group">

                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">KELOMPOK : </label>
                <div class="col-sm-9">
                    <select name="inputKategori" id="inputKategori" onchange="getform(this)">
                        <?php foreach ($jn as $key) { ?>
                        <option value="<?= $key->id_jenis ?>"><?= $key->jenis_wakaf ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>

            <?php
            $p = rand(10000, 99999);
            $kop = "WAKAF$p";
            ?>

            <input type="hidden" value="<?= $kop ?>" id="idpwak" name="idpwak">
            <div class="form-group">

                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">PIMPINAN JAMAAH : </label>
                <div class="col-sm-9">
                    <select name="inputPimpinan" id="opt_pimpinan">

                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="jen_gan">JENIS WAKAF :
                </label>
                <div class="col-sm-7">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputJenisWakaf" name="inputJenisWakaf" required
                        autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ALAMAT :
                </label>
                <div class="col-sm-9">
                    <textarea type="text" class="col-xs-10 col-sm-5" id="alamat" name="inputAlamatWakaf" required
                        autocomplete="off" readonly></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right"> Koordinat : </label>
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
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NO TELP :
                </label>
                <div class="col-sm-5">
                    <input type="number" class="col-xs-10 col-sm-5" id="inputNoTelpWakaf" name="inputNoTelpWakaf"
                        autocomplete="off" onkeydown="return hanyaAngka(this);">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">EMAIL :
                </label>
                <div class="col-sm-7">
                    <input type="email" class="col-xs-10 col-sm-5" id="inputEmailWakaf" name="inputEmailWakaf"
                        autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">FOTO :
                </label>
                <div class="col-sm-9">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <input type="file" class="col-xs-10 col-sm-5" name="filefoto<?php echo $i; ?>"><br />
                    <?php endfor; ?>
                </div>
            </div>
            <div class="form-group" id="tingkat" style="display: none;">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tingkat :
                </label>
                <div class="col-sm-9">
                    <input type="checkbox" id="tingkat" name="tingkat[]" value="TK"> TK / RA
                    <input type="checkbox" id="tingkat" name="tingkat[]" value="SDIT"> SDIT
                    <input type="checkbox" id="tingkat" name="tingkat[]" value="MDU"> MDU
                    <input type="checkbox" id='tingkat' name="tingkat[]" value="TSANAWIYAH">
                    Tsanawiyah
                    <input type="checkbox" id='tingkat' name="tingkat[]" value="UALIMIN"> Ualimin
                </div>
            </div>

            <br><br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="pen_gan">PENERIMA :
                </label>
                <div class="col-sm-7">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputPenerima" name="inputPenerima" required
                        autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NO TELP :
                </label>
                <div class="col-sm-5">
                    <input type="number" class="col-xs-10 col-sm-5" id="inputNoTelpPenerima" name="inputNoTelpPenerima"
                        autocomplete="off" onkeydown="return hanyaAngka(this);">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">EMAIL :
                </label>
                <div class="col-sm-7">
                    <input type="email" class="col-xs-10 col-sm-5" id="inputEmailPenerima" name="inputEmailPenerima"
                        autocomplete="off">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">STATUS WAKAF :
                </label>
                <div class="col-sm-9">
                    <input type="radio" name="status" id="status" value="wakaf" required>
                    <label for="status">WAKAF</label>
                    <input type="radio" name="status" id="status" value="Ikrar Wakaf" required>
                    <label for="status">IKRAR WAKAF</label>
                    <input type="radio" name="status" id="status" value="Dalam Proses" required>
                    <label for="status">DALAM PROSES</label>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">MUWAKIF :
                </label>
                <div class="col-sm-7">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputMuwakif" name="inputMuwakif" autocomplete=""
                        required>
                </div>
            </div>
            <div class="form-group" id="alamatmuwakif">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ALAMAT :
                </label>
                <div class="col-sm-9">
                    <textarea type="text" class="col-xs-10 col-sm-5" id="inputAlamatMuwakif" name="inputAlamatMuwakif"
                        autocomplete=""></textarea>
                </div>
            </div>

            <br>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No Sertifikat :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputNoSertifikat" name="inputNoSertifikat"
                        autocomplete="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">AJB :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputAjb" name="inputAjb" autocomplete="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">AUW :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputAuw" name="inputAuw" autocomplete="">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Luas Tanah :
                </label>
                <div class="col-sm-3">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputLuasTanah" name="inputLuasTanah"
                        autocomplete="" onkeydown="return hanyaAngka(this);">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Luas Bangunan :
                </label>
                <div class="col-sm-3">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputLuasBangunan" name="inputLuasBangunan"
                        autocomplete="" onkeydown="return hanyaAngka(this);">
                </div>
            </div>

            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ESTIMASI NILAI BANGUNAN :
                </label>
                <div class="col-sm-5">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputEstBang" name="inputEstBang" autocomplete=""
                        onkeydown="return hanyaAngka(this);">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">ESTIMASI NILAI TANAH :
                </label>
                <div class="col-sm-9">
                    <input type="text" class="col-xs-10 col-sm-5" id="inputEstNilai" name="inputEstNilai"
                        autocomplete="" onkeydown="return hanyaAngka(this);">
                </div>
            </div>
            <br>
            <br>

            <!-- <div class="form-horizontal"> -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">SAKSI :
                </label>
                <div class="col-sm-9">
                    <a href="#!" class="btn btn-info" onclick="addsaksi()">Tambah Saksi</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                </label>
                <div class="col-sm-5">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    No
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbsaksi">

                        </tbody>
                    </table>
                </div>
            </div>


            <br>
            <br>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bangunan Lain :
                </label>
                <div class="col-sm-9">
                    <a href="#!" class="btn btn-info" onclick="addbangunan()">Tambah Bangunan Lain</a>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                </label>
                <div class="col-sm-5">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    No
                                </th>
                                <th>
                                    Jenis Bangunan
                                </th>
                                <th>
                                    a/n
                                </th>
                                <th>
                                    Surat Perjanjian
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tbbang">

                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="" id="inven" style="display: none;">
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Inventaris Masjid :
                    </label>
                    <div class="col-sm-9">
                        <a href="#!" class="btn btn-info" onclick="addinven()">Tambah Inventaris</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                    </label>
                    <div class="col-sm-5">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Jenis Inventaris
                                    </th>
                                    <th>
                                        Total Unit
                                    </th>
                                    <th>
                                        Keadaaan
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tinv">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            $k = rand(10000, 99999);
            $kod = "DWKF$k";
            ?>

            <?php
            $kk = rand(10000, 99999);
            $kodk = "temp$k";
            ?>
            <input type="hidden" id="idakt" name="idakt" value="<?= $kod ?>">
            <input type="hidden" id="tempsak" name="tempsak" value="<?= $kodk ?>">
            <br><br>
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-info"> <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit</button>
            </div>
            <!-- </div> -->
        </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalsaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Saksi</h5>
            </div>
            <div class="modal-body" id="editmodal">
                <label for="">Nama Saksi</label>
                <input type="text" class="form-control" id="inputNamaSaksi" name="inputNamaSaksi" autocomplete="off">
                <br>
                <label for="">Status Saksi</label>
                <select class="form-control" name="inputStatusSaksi" id="inputStatusSaksi">
                    <option value="MASIH HIDUP">Ada / Masih Hidup</option>
                    <option value="ALMARHUM">Almarhum</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_saksi()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modaleditsaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Edit Saksi</h5>
            </div>
            <div class="modal-body" id="editsaksi">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_e_saksi()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalbangunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bangunan</h5>
            </div>
            <div class="modal-body" id="editmodal">
                <label for="">Jenis Bangunan</label>
                <select name="inputJenisBang" id="inputJenisBang" class="form-control">
                    <option value="RUMAH">RUMAH</option>
                    <option value="WARUNG">WARUNG</option>
                    <option value="PERPUSTAKAAN">PERPUSTAKAAN</option>
                    <option value="LAIN-LAIN">LAIN LAIN</option>
                </select>
                <br>
                <label for="">Atas Nama (a/n)</label>
                <input type="text" name="inputAtasNama" id="inputAtasNama" class="form-control" autocomplete="off">
                <br>
                <label for="">Surat Perjanjian</label>
                <select name="inputSp" id="inputSp" class="form-control">
                    <option value="ADA">ADA</option>
                    <option value="TIDAK ADA">TIDAK ADA</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_bang()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalbangunanedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bangunan</h5>
            </div>
            <div class="modal-body" id="editmodal">
                <label for="">Jenis Bangunan</label>
                <select name="inputJenisBangEdit" id="inputJenisBangEdit" class="form-control">
                    <option value="RUMAH">RUMAH</option>
                    <option value="WARUNG">WARUNG</option>
                    <option value="PERPUSTAKAAN">PERPUSTAKAAN</option>
                    <option value="LAIN-LAIN">LAIN LAIN</option>
                </select>
                <br>
                <div id="herebang">
                    <!-- <label for="">Atas Nama (a/n)</label> -->
                </div>
                <br>
                <label for="">Surat Perjanjian</label>
                <select name="inputSpEdit" id="inputSpEdit" class="form-control">
                    <option value="ADA">ADA</option>
                    <option value="TIDAK ADA">TIDAK ADA</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_e_bang()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalinven" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris Masjid</h5>
            </div>
            <div class="modal-body" id="editmodal">
                <label for="">Jenis Inventaris</label>
                <select name="inputJenisInven" id="inputJenisInven" class="form-control">
                    <option value="MIMBAR">MIMBAR</option>
                    <option value="AMPLIFIER">AMPLIFIER</option>
                    <option value="SPEAKER DALAM">SPEAKER DALAM</option>
                    <option value="SPEAKER LUAR">SPEAKER LUAR</option>
                    <option value="LEMARI BUKU">LEMARI BUKU</option>
                </select>
                <br>
                <label for="">
                    Total Unit
                </label>
                <input type="number" class="form-control" id="inputUnit" name="inputUnit">
                <br>
                <label for="">Keadaan Unit</label>
                <select name="inputStatInvenUnit" id="inputStatInvenUnit" class="form-control">
                    <option value="BAIK">Baik</option>
                    <option value="RUSAK / TIDAK LAYAK">Rusak / Tidak Layak</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_inven()">Save changes</button>
            </div>
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