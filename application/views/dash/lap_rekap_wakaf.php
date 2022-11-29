<br><br>
<!-- Button trigger modal -->

<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-building"></i>&nbsp;&nbsp;<?= $bred ?>
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


<br><br>
<table id="tabelrek" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Kode</th>
            <th rowspan="2">Pimpinan Cabang</th>
            <th rowspan="2">Luas Tanah</th>
            <th colspan="10">
                <center>PERUNTUKAN</center>
            </th>
        </tr>
        <tr>
            <th>Masjid</th>
            <th>Pesantren</th>
            <th>Kebun</th>
            <th>Lapang IED</th>
            <th>SAWAH</th>
            <th>MAKAM</th>
        </tr>
    </thead>
    <tbody id="tabrek">
        <?php
        $u = 1;
        foreach ($tot_pimpinan as $key) : ?>
        <?php $mas = $this->M_data->joinRek($key->pimpinan_jamaah, "JW73086");
            $pes = $this->M_data->joinRek($key->pimpinan_jamaah, "JW70512");
            $kebun = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "kebun");
            $lapang = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "lapang ied");
            $sawah = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "sawah");
            $kuburan = $this->M_data->joinPerJenis($key->pimpinan_jamaah, "kuburan");
            $tot_sawah = $this->M_data->joinTbNumRowsByJenis('sawah');
            $tot_makam = $this->M_data->joinTbNumRowsByJenis('kuburan');
            $tot_ied = $this->M_data->joinTbNumRowsByJenis('lapang ied');
            $tot_kebun = $this->M_data->joinTbNumRowsByJenis('kebun');
            $tot_pes = $this->M_data->joinTbNumRowsById("JW70512");
            $tot_mas = $this->M_data->joinTbNumRowsById("JW73086");
            echo "<tr>
            <td>" . $u++ . "</td>
            <td></td>
            <td>$key->pimpinan_jamaah</td>
            <td></td>
            <td>$mas</td>
            <td>$pes</td>
            <td>$kebun</td>
            <td>$lapang</td>
            <td>$sawah</td>
            <td>$kuburan</td>
        </tr>";
        endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2"></th>
            <th>Jumlah</th>
            <th></th>
            <th><?= $tot_mas ?></th>
            <th><?= $tot_pes ?></th>
            <th><?= $tot_kebun ?></th>
            <th><?= $tot_ied ?></th>
            <th><?= $tot_sawah ?></th>
            <th><?= $tot_makam ?></th>
        </tr>
    </tfoot>
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
// $.ajax({
//     url: "<?= base_url('dash/ajx_d_rekap') ?>",
//     type: "post",
//     data: {},
//     success: function(msg) {
//         $('#tabrek').html(msg);
//     }
// });


$(document).ready(function() {
    $('#tabelrek').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ]
    });
});



$('#lap').attr('class', 'active open');
$('#larek').attr('class', 'active');
</script>