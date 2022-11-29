<br><br>
<div class="page-header" id="">
    <h1>
        <i class="ace-icon fa fa-building"></i>&nbsp;&nbsp;<?= $bred ?>
        <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/wakaf_masjid_add') ?>" class="btn btn-info"><i class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i></a>
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
                    <th class="tblhead">NO</th>
                    <th class="tblhead">NAMA MUWAKIF</th>
                    <th class="tblhead">PENGELOLA</th>
                    <th class="tblhead">LOKASI WAKAF</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = $this->uri->segment('3') + 1;
                foreach ($data as $row) {
                    $get_pengelola = $this->db->get_where("t_data_pengelola", array("id_data_wakaf" => $row->id_data_wakaf), 1)->row_array();
                ?>
                    <tr>
                        <td>
                            <a href="#!" onclick="showdet_v2('<?= $no; ?>', '<?= $row->id_data_wakaf ?>', 't_data_wakaf','id_data_wakaf')" class="green bigger-140 show-details-btn tooltip001" title="" data-original-title="Show Details">
                                <i class="ace-icon fa fa-angle-double-down" id="det-cls-<?= $no; ?>"></i><span class="sr-only"></span>
                            </a>
                            &nbsp;

                            <a href='<?= base_url("dash/wakaf_lainnya_edit/" . $row->id_data_wakaf . "") ?>' class="green">
                                <i class="ace-icon fa fa-pencil bigger-130 tooltip001" data-toggle="tooltip" title="Edit"></i>
                            </a>
                            &nbsp;

                            <a href="#!" data-id="<?= $row->id_data_wakaf ?>" class="red" onclick="del(this)">
                                <i class="ace-icon fa fa-trash-o bigger-130 tooltip001" data-toggle="tooltip" title="Hapus"></i>
                            </a>
                        </td>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_wakif ?></td>
                        <td><?= $get_pengelola['nama'] ?></td>
                        <td><?= $get_pengelola['lokasi'] ?></td>
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
    $('#db').attr('class', 'active open');
    $('#wakaf_lainnya_').attr('class', 'active');


    function showdet_v2(no, idf, tabel, id) {
        stat = document.getElementById("det_stat_" + no).value;
        if (stat == "0") {
            $("#detail_" + no).show();
            a = "1";
            $("#det-cls-" + no).addClass("fa-angle-double-up");
            $("#det-cls-" + no).removeClass("fa-angle-double-down");

            $('#load-det_' + no).show();
            $.ajax({
                url: "<?= base_url('ajx/ajx_masjid') ?>",
                type: "post",
                data: {
                    idf
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

    function del(x) {
        var id = $(x).data('id');
        // var tb = "t_data_";
        var id_tb = "";
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
                    url: "<?= base_url('ajx_delete/ajx_delete_v2') ?>",
                    type: "post",
                    data: {
                        // tb,
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
</script>