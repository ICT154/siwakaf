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


<div class="page-header" id="">
    <h1>
        <i class="ace-icon fa fa-building"></i>&nbsp;&nbsp;<?= $bred ?>
        <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/p_w_lainnya') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span>
    </h1>
</div>


<div class="col-xs-12" style="overflow-x: auto;">
    <div class="table-responsive">
        <table id="simsple-table" class="table  table-bordered table-hover">
            <thead>
                <tr class="tblhead">
                    <th class="tblhead">

                    </th>
                    <th class="tblhead">No</th>
                    <th class="tblhead">KATEGORI WAKAF</th>
                    <th class="tblhead">PIMPINAN JAMAAH</th>
                    <th class="tblhead">PEWAKAF</th>
                    <th class="tblhead">PENGELOLA / PENERIMA</th>
                    <th class="tblhead">PERUNTUKAN</th>
                    <th class="tblhead">LOKASI WAKAF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->uri->segment('3') + 1;
                foreach ($data as $row) {
                    $kk = $this->db->get_where("t_pimpinan_jamaah", array("pimpinan_jamaah" => $row->pimpinan_jamaah))->row_array();
                    $jw = $this->db->get_where("t_wakaf_jenis", array("id_jenis" => $row->id_kategori))->row_array();
                    $pemberi = $this->db->get_where("t_wakaf_pemberi", array("id_pemberi" => $row->id_pemberi))->row_array();
                    $penerima = $this->db->get_where("t_wakaf_penerima", array("id_penerima" => $row->id_penerima))->row_array();
                    $peruntukan = $this->db->get_where("t_wakaf_peruntukan", array("id_peruntukan" => $row->id_jenis))->row_array();
                ?>
                <tr>
                    <td>
                        <a href="<?= base_url("dash/edit_penerimaan_wakaf/" . $row->id_penerimaan_wakaf . "") ?>"
                            class="blue bigger-140 show-details-btn " title="" data-original-title="Show Details">
                            <i class="ace-icon fa fa-pencil"></i><span class="sr-only"></span>
                        </a>
                        &nbsp;
                        <a href="#!"
                            onclick="showdet_v2('<?= $no; ?>', '<?= $row->id_penerimaan_wakaf ?>', 't_wakaf_akt_penerimaan','id_penerimaan_wakaf')"
                            class="green bigger-140 show-details-btn tooltip001" title=""
                            data-original-title="Show Details">
                            <i class="ace-icon fa fa-angle-double-down" id="det-cls-<?= $no; ?>"></i><span
                                class="sr-only"></span>
                        </a>
                        &nbsp;

                        <a href="#!" data-id="<?= $row->id_penerimaan_wakaf ?>" class="red" onclick="del(this)">
                            <i class="ace-icon fa fa-trash-o bigger-130 tooltip001" data-toggle="tooltip"
                                title="Hapus"></i>
                        </a>
                        &nbsp;



                    </td>
                    <td><?= $no; ?></td>
                    <td><?= $jw['jenis_wakaf'] ?></td>
                    <td><?= $kk['ketua_jamaah'] ?></td>
                    <td><?= $pemberi['nama_pemberi']; ?></td>
                    <td><?= $penerima['nama_penerima'] ?></td>
                    <td><?= $peruntukan['jenis_peruntukan'] ?></td>
                    <td><?= $peruntukan['alamat'] ?></td>


                </tr>
                <tr class="detail-row" id="detail_<?php echo $no; ?>">
                    <td colspan="8">

                        <input type="hidden" id="det_stat_<?= $no; ?>" value="0">
                        <input type="hidden" id="det_isi_<?= $no; ?>" value="1">
                        <div class="table-detail" id="detailisi_<?= $no; ?>">
                            <div id="load-det_<?= $no; ?>" style="display: none;">
                                <center>
                                    <img src="<?= base_url('vendor/assets/images/loading.gif') ?>" alt="" width="20px">
                                </center>
                            </div>
                        </div>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function del(x) {
    var id = $(x).data('id');
    var tb = "t_pimpinan_jamaah";
    var id_tb = "id_pimpinan_jamaah";
    Swal.fire({
        title: 'Apa anda yakin ?',
        text: "Anda akan menghapus data ini !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, saya yakin !'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url('ajx_delete/ajx_delete_peruntukan') ?>",
                type: "post",
                data: {
                    tb,
                    id,
                    id_tb
                },
                success: function(msg) {
                    $('.page-header').html(msg);
                }
            });
        }
    })
}

function showdet_v2(no, idf, tabel, id) {
    stat = document.getElementById("det_stat_" + no).value;
    if (stat == "0") {
        $("#detail_" + no).show();
        a = "1";
        $("#det-cls-" + no).addClass("fa-angle-double-up");
        $("#det-cls-" + no).removeClass("fa-angle-double-down");

        $('#load-det_' + no).show();
        $.ajax({
            url: "<?= base_url('ajx/ajx_g_details_tabel_penerimaan') ?>",
            type: "post",
            data: {
                idf,
                tabel,
                id
            },
            success: function(msg) {
                $('#load-det_' + no).hide();
                $("#detailisi_" + no).html(msg);
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

}
$('#pen').attr('class', 'active open');
$('#penwak').attr('class', 'active');
</script>