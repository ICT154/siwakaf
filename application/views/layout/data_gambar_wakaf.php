<div class="row">
    <?php
    $no = 1;
    foreach ($gambar as $key) { ?>

        <div class="col-sm-6 ">
            <a href="<?= base_url("uploads/img/gambar_wakaf/" . $key->gambar) ?>" class="big" rel="rel<?= $no ?>">
                <img class="img-responsive" src="<?= base_url("uploads/img/gambar_wakaf/" . $key->gambar) ?>" alt="" title="Image 1">
            </a>
            <button data-id='<?= $key->id_gambar ?>' class="btn btn-danger btn-sm" onclick="delete_gambar_wakaf(this)">
                <i class="ace-icon fa fa-trash icon-only"></i>
            </button>
        </div>
    <?php
        $no++;
    }
    ?>
</div>

<script>
    function delete_gambar_wakaf(x) {
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
                    url: "<?= base_url('ajx/wakaf_delet_gambar') ?>",
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
</script>