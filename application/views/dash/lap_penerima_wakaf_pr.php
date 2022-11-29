<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-users"></i>&nbsp;&nbsp;<?= $bred; ?>
        <!-- <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/a_p_jamaah') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span> -->
    </h1>
</div>


<table id="simple-table-penerima" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>

            </th>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No. Telp</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $o = 1;
        foreach ($total as $row) { ?>
        <tr>
            <td>

            </td>
            <td>
                <?= $o; ?>
            </td>
            <td>
                <?= $row->nama_penerima; ?>
            </td>
            <td>
                <?= $row->alamat_penerima; ?>
            </td>
            <td>
                <?= $row->email_penerima; ?>
            </td>
            <td>
                <?= $row->no_penerima; ?>
            </td>
        </tr>
        <?php $o++;
        } ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Penerima Wakaf</h5>
            </div>
            <div class="modal-body" id="mod_ed">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="s_pen()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#simple-table-penerima').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf', 'print'
        ]
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js "></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script>
// function s_pen() {
//     var id = $('#inputId').val();
//     var inputNama = $('#inputNama').val();
//     var inputAlamat = $('#inputAlamat').val();
//     var inputNomer = $('#inputNomer').val();
//     var inputEmail = $('#inputEmail').val();


//     if (inputNama == '') {
//         alert('Isi Dengan Benar !');
//     } else {
//         $.ajax({
//             url: "<?= base_url('dash/ajx_s_pen') ?>",
//             type: "post",
//             data: {
//                 id: id,
//                 inputNama: inputNama,
//                 inputAlamat: inputAlamat,
//                 inputNomer: inputNomer,
//                 inputEmail: inputEmail
//             },
//             success: function(msg) {
//                 $('#modalchange').modal('hide');
//                 document.location = '<?= base_url('dash/penerima_wakaf') ?>';
//             }
//         });
//     }
// }

// function e_pen(x) {
//     var id = $(x).data('id');

//     $.ajax({
//         url: "<?= base_url('dash/ajx_e_pen') ?>",
//         type: "post",
//         data: {
//             id: id
//         },
//         success: function(msg) {
//             $('#modalchange').modal('show');
//             $('#mod_ed').html(msg);
//         }
//     });
// }

$('#lap').attr('class', 'active open');
$('#lapen').attr('class', 'active');
</script>