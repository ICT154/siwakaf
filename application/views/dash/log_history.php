<br><br>
<div class="page-header">
    <h1>
        <i class="ace-icon fa fa-users"></i>&nbsp;&nbsp;<?= $bred ?>
        <!-- <span style="float:right; padding-right:10px;">
            <a href="<?= base_url('dash/a_p_jamaah') ?>" class="btn btn-info"><i
                    class="ace-icon glyphicon glyphicon-plus bigger-125 green"></i>Tambah</a>
        </span> -->
    </h1>
</div>

<table id="simple-table" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>

            </th>
            <th>No</th>
            <th>Time</th>
            <th>Action</th>
            <th>Username</th>
            <th>IP</th>
            <th>Device</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $o = 1;
        foreach ($log as $row) { ?>
        <tr>
            <td>
            </td>
            <td>
                <?= $o; ?>
            </td>
            <td>
                <?= $row->time; ?>
            </td>
            <td>
                <?= $row->log_name; ?>
            </td>
            <td>
                <?= $row->username; ?>
            </td>
            <td>
                <?= $row->ip; ?>
            </td>
            <td>
                <?= $row->device; ?>
            </td>
        </tr>
        <?php $o++;
        } ?>
    </tbody>
</table>

<script>
$('#set').attr('class', 'active open');
$('#log').attr('class', 'active');
</script>