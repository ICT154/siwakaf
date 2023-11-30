<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-users"></i>
        <?= $bred ?>
        <!-- <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Form Input
        </small> -->
        <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/adm_a') ?>" class="btn btn-outline-success"><i class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i></a>
        </span>
    </h1>
</div>

<?= $this->session->flashdata('message'); ?>
<table id="simple-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>

            </th>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $u = 1;
        foreach ($adm as $key) {
        ?>
            <tr>
                <td>
                    <a href="<?= base_url('dash/adm_e/' . $key->username) ?>" class="btn btn-xs btn-info    "><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                    <button class="btn btn-xs btn-danger" data-id="<?= $key->username ?>" onclick="del(this)"><i class="ace-icon fa fa-trash bigger-120"></i></button>


                </td>
                <td><?= $u ?></td>
                <td><?= $key->username ?></td>
                <td><?= $key->nama ?></td>
                <td><?= $key->email ?></td>
            </tr>
        <?php
            $u++;
        }
        ?>
    </tbody>
</table>



<script>
    function del(x) {
        var id = $(x).data('id');
        // alert(id);
        var r = confirm("Apa Anda Yakin ?");

        if (r = true) {
            $.ajax({
                url: "<?= base_url('dash/ajx_del_adm') ?>",
                type: "post",
                data: {
                    id: id
                },
                success: function(msg) {
                    // document.location = '/pengguna';
                }
            });
        }
    }

    $('#set').attr('class', 'active open');
    $('#pengg').attr('class', 'active');
</script>