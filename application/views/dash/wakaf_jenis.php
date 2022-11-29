<style>
.tblhead {
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #E8B835), color-stop(1, #FF6633));
    background-color: rgba(0, 0, 0, 0);
    background: -moz-linear-gradient(center top, #E8B835 5%, #FF6633 100%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#E8B835', endColorstr='#FF6633');
    background-color: #E8B835;
    color: #FFFFFF;
    font-weight: bold;
    border-left: 1px solid #0070A8;
}

.pging_0 {
    text-decoration: none;
    display: inline-block;
    padding: 2px 8px;
    margin: 1px;
    color: #FFFFFF;
    border: 1px solid #CCCCCC;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #BABABA), color-stop(1, #363636));
    background-color: rgba(0, 0, 0, 0);
    background: -moz-linear-gradient(center top, #BABABA 5%, #363636 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#BABABA', endColorstr='#363636');
    background-color: #BABABA;
    font-size: 10px;
}
</style>
<br><br>
<!-- Button trigger modal -->


<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-building"></i>&nbsp;&nbsp;Kategori Wakaf
        <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/a_j_wakaf') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span>
    </h1>
</div>

<!-- <br><br> -->
<div class="col-xs-12" style="overflow-x: auto;">
    <div class="table-responsive">
        <table id="simsple-table" class="table  table-bordered table-hover">
            <thead>
                <tr class="tblhead">
                    <th class="tblhead">

                    </th>
                    <th class="tblhead">No</th>
                    <th class="tblhead">Kode Jenis Wakaf</th>
                    <th class="tblhead">Jenis Wakaf</th>
                    <th class="tblhead">Ket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->uri->segment('3') + 1;
                foreach ($data as $row) {
                ?>
                <tr>
                    <td>
                        <a href='<?= base_url("dash/konstruksi_edit/" . $row->id_jenis . "") ?>' class="green">
                            <i class="ace-icon fa fa-pencil bigger-130 tooltip001" data-toggle="tooltip"
                                title="Edit"></i>
                        </a>

                        <a href="#!" data-id="<?= $row->id_jenis ?>" class="red" onclick="del_j(this)">
                            <i class="ace-icon fa fa-trash-o bigger-130 tooltip001" data-toggle="tooltip"
                                title="Hapus"></i>
                        </a>



                    </td>
                    <td><?= $row->id_jenis ?></td>
                    <td>
                        <?= $row->jenis_wakaf ?>
                    </td>
                    <td>
                        <?= $row->keterangan; ?>
                    </td>


                </tr>
                <?php $no++;
                } ?>
                <tr>
                    <td colspan="14" style="background-color: #DBEAE7">


                        <center>
                            <?= $this->pagination->create_links(); ?>
                        </center><br>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function edit(x) {
    var idjenis = $(x).data('idjen');
    //alert(idjenis);
    $.ajax({
        url: '<?= base_url('dash/ajx_e_j_wakaf') ?>',
        type: 'post',
        data: {
            idjenis: idjenis
        },
        success: function(pesan) {
            $('#modaledit').modal('show');
            $('#editmodal').html(pesan);
        }
    });
}

function s_edit() {
    var idkode = $('#inputKode').val();
    var jenis = $('#inputJenis').val();
    var keterangan = $('#inputKeterangan').val();
    document.getElementById('btn').disabled = true;

    if (idkode != '' && jenis != '') {
        $.ajax({
            url: '<?= base_url('dash/ajx_s_e_j_wakaf') ?>',
            type: 'post',
            data: {
                idkode: idkode,
                jenis: jenis,
                keterangan: keterangan
            },
            success: function(pesan) {
                document.getElementById('btn').disabled = false;
                document.location = '<?= base_url('dash/j_wakaf') ?>';
            }
        });
    } else {
        alert('Harap Isi Jenisnya ')
        document.getElementById('btn').disabled = false;
    }
}

function del_j(b) {
    var idjenis = $(b).data('idjen');
    var r = confirm("Apa Anda Yakin ?");
    if (r == true) {
        $.ajax({
            url: '<?= base_url('dash/del_j_wakaf') ?>',
            type: 'post',
            data: {
                idjenis: idjenis
            },
            success: function(pesan) {
                alert('Berhasil Dihapus');
            }
        });
    } else {

    }
}
</script>


<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Wakaf</h5>
            </div>
            <div class="modal-body" id="editmodal">



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn" class="btn btn-primary" onclick="s_edit()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
$('#db').attr('class', 'active open');
$('#kategoriwakaf').attr('class', 'active');
</script>