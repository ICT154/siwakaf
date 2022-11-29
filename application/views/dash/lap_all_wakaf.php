<style>
@media print {
    .header-print {
        display: table-header-group;
    }
}
</style>
<br><br>
<!-- Button trigger modal -->

<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-building"></i>&nbsp;&nbsp;Laporan Data Penerimaan Wakaf
        <!-- <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Static &amp; Dynamic Tables
        </small> -->
        <!-- <span style="float:right; padding-right:10px;">
            <a href='<?= base_url('dash/p_w_lainnya') ?>' class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span> -->
    </h1>
</div>

<!-- 
<div class="row">
    <div class="col-xs-4">

        <select name="optfil" id="optfil" class="form-control" onchange="fil(this)">

        </select>

    </div>
</div> -->

<br><br>
<table id="tabelwakaflap" class="table table-bordered table-hover">
    <thead>
        <div class="header-print" id="dt-header">
            <!-- <tr>
                <th><img src="<?= base_url('vendor/assets/images/Logo_Persis.png') ?>" alt="" width="30"></th>
                <th colspan="8">

                    <center>
                        Data
                    </center>

                </th>
            </tr> -->

            <tr>
                <th>

                </th>
                <th>
                    No
                </th>
                <th>
                    Id Penerimaan
                </th>
                <th>
                    Kategori Wakaf
                </th>
                <th>
                    Pimpinan Jamaah
                </th>
                <th>
                    Pewakaf
                </th>
                <th>
                    Pengelola / Penerima
                </th>
                <th>
                    Peruntukan
                </th>
                <th>
                    Lokasi Wakaf
                </th>
            </tr>
        </div>


    </thead>
    <tbody id="tabwak">

        <?php
        $u = 1;
        foreach ($res as $key) { ?>
        <?php

            // echo base_url('dash/det_pen_wakaf/' . str_replace(array('=', '+', '/'), array('', '', ''), $this->encryption->encrypt($key->id_penerimaan_wakaf)) . '');
            ?>
        <tr>
            <td>

            </td>
            <td>
                <?= $u; ?>
            </td>
            <td>
                <?= $key->id_penerimaan_wakaf ?>
            </td>
            <td>
                <?php
                    if ($key->id_kategori === 'JW66095') {
                        echo "Wakaf Lainnya";
                    } elseif ($key->id_kategori == 'JW70512') {
                        echo "Wakaf Pesantren ";
                    } else {
                        echo "Wakaf Masjid";
                    }
                    ?>
            </td>
            <td>
                <?= $key->pimpinan_jamaah ?>
            </td>
            <td>
                <?= $key->nama_pemberi ?>
            </td>
            <td>
                <?= $key->nama_penerima ?>
            </td>
            <td>
                <?= $key->jenis_peruntukan ?>
            </td>
            <td>
                <?= $key->alamat ?>
            </td>
        </tr>

        <?php
            $u++;
        }
        ?>
    </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>




<script>
$(document).ready(function() {
    $('#tabelwakaflap').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ]
    });
});
</script>

<script>
// function fil(x) {
//     var id = x.value;
//     // alert(id);
//     if (id == 'JW70512') {
//         $.ajax({
//             url: "<?= base_url("dash/ajx_g_tb_w") ?>",
//             type: 'post',
//             data: {
//                 id: id
//             },
//             success: function(msg) {
//                 $('#tabwak').html(msg);
//             }
//         });
//     }
// }


// $.ajax({
//     url: "<?= base_url('dash/ajx_g_kat') ?>",
//     type: "post",
//     data: {},
//     success: function(pesan) {
//         $('#optfil').html(pesan);
//     }
// });



function pil() {
    $('#modaledit').modal('show');

}
$('#lap').attr('class', 'active open');
$('#lapall').attr('class', 'active');
</script>