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
                            <a class="blue" href="#!" data-id="<?= $key->ID ?>" onclick="print_custom(this)">
                                <i class="ace-icon fa fa-print bigger-130"></i>
                            </a>
                            <a class="green" href="#!" data-id="<?= $key->ID ?>" onclick="edit(this)">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                            <a class="red" href="#!" data-id="<?= $key->ID ?>" onclick="delet(this)">
                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
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


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('vendor/') ?>assets/js/jquery-2.1.4.min.js"></script>
<script>
    function print_custom(x) {
        var id = $(x).data('id');
        $.ajax({
            url: "<?= base_url("ajx/print_custom") ?>",
            type: "post",
            data: {
                id: id,
            },
            success: function(msg) {

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
                    url: "<?= base_url('dash/wakaf_delet_') ?>" + id,
                    type: "POST",
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
            url: "<?= base_url('dash/wakaf_load_form_edit_') ?>" + id,
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