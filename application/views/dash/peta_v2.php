<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-users"></i>
        <?= $bred ?>
        <!-- <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Form Input
            </small> -->
        <!-- <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/adm_a') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span> -->
    </h1>
</div>




<?php echo $map['js']; ?>

<?php echo $map['html']; ?>


<div id="adlst"
    style="position:absolute; left:919px; top:106px; z-index:8000; border: #CCCCCC solid 1px; padding:10px; cursor:move; background:#FFFF99;"
    class="boxshadow">
    <div style="padding: 10px">
        <!-- <input id="wakaf_masjid" type="checkbox" value="1" onClick="legend00()" checked> &nbsp; -->
        <img src="<?= base_url('vendor/assets/') ?>images/mark_dot_blue.gif" width="12px"> Wakaf Masjid
        <br>
        <!-- <input id="wakaf_pesantren" type="checkbox" value="1" onClick="legend00()" checked> &nbsp; -->
        <img src="<?= base_url('vendor/assets/') ?>images/mark_dot_red.gif" width="12px"> Wakaf Pesantren <br>

        <!-- <input id="wakaf_sawah" type="checkbox" value="1" onClick="legend00()" checked> &nbsp; -->
        <img src="<?= base_url('vendor/assets/') ?>images/mark_dot_yellow.gif" width="12px"> Wakaf Lainnya <br>

    </div>
</div>

<br><br>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script>
$('#pet2').attr('class', 'active');
</script>