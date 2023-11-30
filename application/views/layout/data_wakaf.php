<style>
    #spinner-tabel-form {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }

    .custom-spinner {
        border: 8px solid #f3f3f3;
        /* Light grey */
        border-top: 8px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-database"></i>
        <?= $bred ?>

        <span style="float:right; padding-right:10px;">
            <div id="button-back-tabel" style="display: none;">
                <a href="#!" class="btn btn-primary btn-sm" onclick="back_tabel()">
                    <i class="ace-icon fa fa-arrow-left icon-only"></i>
                    Kembali Ke Tabel
                </a>
            </div>
            <div id="button-add-tabel">
                <a href='#!' class="btn btn-success btn-sm" type="button" onclick="add_wakaf()">
                    <i class="ace-icon fa fa-plus icon-only"></i>
                    Tambah Data Wakaf
                </a>
            </div>
        </span>
    </h1>

</div>

<?= $this->session->flashdata('message'); ?>

<div id="spinner-tabel-form" style="display:none;">
    <div class="custom-spinner"></div>
</div>

<div class="table-responsive" id="tabel-data-wakaf">
    <table id="simple-table-x" class="table  table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Action</th>
                <th>Objek Wakaf No</th>
                <th>Muwakif</th>
                <th>Nadzir</th>
                <th>Jenis Tanah Wakaf ( Luas )</th>
                <th>Fungsi Wakaf ( Luas )</th>
                <th>Pengelola</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($pagin as $key) :
                $muwakif = $this->db->get_where('muwakif', ['ID' => $key->MUWAKIF_ID])->row_array();
                $nadzir = $this->db->get_where('nadzir', ['MUWAKIF_ID' => $key->MUWAKIF_ID])->row_array();
            ?>
                <tr>
                    <td>
                        <?= $i ?>
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs action-buttons">
                            <a class="blue" href="<?= base_url("printx/print/" . $key->ID) ?>" data-id="<?= $key->ID ?>">
                                <i class="ace-icon fa fa-print bigger-130"></i>
                            </a>
                            <a class="green" href="#!" data-id="<?= $key->ID ?>" onclick="edit(this)">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                            <a class="red" href="#!" data-id="<?= $key->ID ?>" onclick="delet(this)">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </a>
                            <a class="info" href="#!" data-id="<?= $key->ID ?>" onclick="upload_gambar(this)">
                                <i class="ace-icon fa fa-folder-open-o bigger-130"></i>
                            </a>
                        </div>
                    </td>
                    <td>
                        <?= $key->NO_OBJEK ?>
                    </td>
                    <td>
                        <?= $muwakif['NAMA_MUWAKIF'] ?>
                    </td>
                    <td>
                        <?= $nadzir['NAMA_NADZIR'] ?>
                    </td>
                    <td>
                        <?= $key->JENIS_TANAH ?>
                    </td>
                    <td>
                        <?= $key->FUNGSI_WAKAF ?> ( <?= $key->LUAS_FUNGSI ?> )
                    </td>
                    <td>
                        <?= $key->NAMA_PENGELOLA ?>
                    </td>
                </tr>
            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>

<div id="form-data-wakaf">

</div>


<div class="modal fade" id="modalgambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Upload Gambar
            </div>
            <div class="modal-body" id="p_show">
                <div id="tabel-image"></div>


                <form action="<?= base_url("proses/upload_images_wakaf") ?>" method="post" enctype="multipart/form-data">

                    <label for="">Upload Gambar : </label>
                    <input type="file" name="gambar_images" id="gambar_images" class="form-control">
                    <input type="hidden" name="upload_gambar_id" id="upload_gambar_id" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('vendor/') ?>assets/js/jquery-2.1.4.min.js"></script>
<script>
    function upload_gambar(x) {
        $("#tabel-image").hide();
        var id = $(x).data('id');
        $("#modalgambar").modal("show");
        $("#upload_gambar_id").val(id);
        $.ajax({
            url: "<?= base_url('ajx/ajx_get_gambar') ?>",
            type: "POST",
            data: {
                id: id,
            },
            success: function(msg) {
                $("#tabel-image").html(msg);
                $("#tabel-image").show();
            }
        });
    }

    function print_custom(x) {
        var id = $(x).data('id');
        $.ajax({
            url: "<?= base_url("ajx/print_custom") ?>",
            type: "post",
            data: {
                id: id,
            },
            success: function(msg) {
                $("#form-data-wakaf").html(msg);
            }
        });
    }

    function delet(x) {
        var id = $(x).data('id');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',

            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('dash/wakaf_delet_') ?>",
                    type: "POST",
                    data: {
                        id: id,
                    },
                    success: function(msg) {
                        Swal.fire(
                            'Terhapus!',
                            'Data Berhasil Dihapus.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });
            }
        })
    }

    function edit(x) {
        $("#spinner-tabel-form").show();
        $("#tabel-data-wakaf").hide();
        $("#button-add-tabel").hide();
        $("#button-back-tabel").show();
        var id = $(x).data('id');
        $.ajax({
            url: "<?= base_url('dash/wakaf_load_form_edit_') ?>",
            type: "POST",
            data: {
                id: id,
            },
            success: function(msg) {
                $("#spinner-tabel-form").hide();
                $("#form-data-wakaf").html(msg);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#spinner-tabel-form").hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    }


    function back_tabel() {
        $("#spinner-tabel-form").show();
        $("#tabel-data-wakaf").show();
        $("#button-add-tabel").show();
        $("#button-back-tabel").hide();
        $("#form-data-wakaf").html('');
        $("#spinner-tabel-form").hide();
    }

    function add_wakaf() {
        $("#spinner-tabel-form").show();
        $("#tabel-data-wakaf").hide();
        $("#button-add-tabel").hide();
        $("#button-back-tabel").show();
        $.ajax({
            url: "<?= base_url('dash/wakaf_load_form_add_') ?>",
            type: "POST",
            success: function(msg) {
                $("#spinner-tabel-form").hide();
                $("#form-data-wakaf").html(msg);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#spinner-tabel-form").hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    }
    $('#data_wakaf_').attr('class', 'active');
</script>