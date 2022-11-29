<style>
    .card {
        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
        transition: 0.3s;
        width: 95%;
        float: left;
    }

    .card2-txt01 {
        width: 100%;
        height: 100px;
        vertical-align: middle;
        text-align: right;
        font: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif;
        color: #FFFFFF;
        padding-right: 10px;
    }
</style>
<br>
<h3 class="header smaller lighter blue"><i class="ace-icon fa fa-tachometer smaller-90"></i> Dashboard
    <small> <i class="ace-icon fa fa-angle-double-right"></i> overview &amp; stats</small>
</h3>

<div class="row">
    <div class="col-md-15 col-sm-3">
        <div class="card ">
            <div class="card2-txt01" style=" background-color:#63BDFF; font-size:66px; ">
                <b><?= $hit_all ?> </b>
            </div>
            <div>
                <center>
                    <h5><b>Total Wakaf</b></h5>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-15 col-sm-3">
        <div class="card ">
            <div class="card2-txt01" style=" background-color:#63BDFF; font-size:66px; ">
                <b><?= $hit_masjid ?></b>
            </div>
            <div>
                <center>
                    <h5><b>Wakaf Masjid</b></h5>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-15 col-sm-3">
        <div class="card ">
            <div class="card2-txt01" style=" background-color:#63BDFF; font-size:66px; ">
                <b><?= $hit_pesantren ?></b>
            </div>
            <div>
                <center>
                    <h5><b>Wakaf Pesantren</b></h5>
                </center>
            </div>
        </div>
    </div>
    <div class="col-md-15 col-sm-3">
        <div class="card ">
            <div class="card2-txt01" style=" background-color:#63BDFF; font-size:66px; ">
                <b><?= $hit_sawah ?></b>
            </div>
            <div>
                <center>
                    <h5><b>Wakaf Sawah</b></h5>
                </center>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row">
    <div class="col-md-15 col-sm-3">
        <div class="card ">
            <div class="card2-txt01" style=" background-color:#63BDFF; font-size:66px; ">
                <b><?= $hit_lainnya ?></b>
            </div>
            <div>
                <center>
                    <h5><b>Wakaf Lainnya</b></h5>
                </center>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#dash').attr('class', 'active');
    });
</script>