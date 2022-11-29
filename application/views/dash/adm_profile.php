    <br><br>
    <div class="page-header">
        <h1>

            <i class="ace-icon fa fa-user"></i>
            <?= $bred ?>
            <!-- <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Form Input
            </small> -->
        </h1>
    </div>

    <?php
    //print_r($user)
    ?>

    <div class="profile-user-info profile-user-info-striped">
        <div class="profile-info-row">
            <div class="profile-info-name"> Username : </div>

            <div class="profile-info-value">
                <span class="editable" id="username"><?= $user['username'] ?></span>
            </div>
        </div>


        <div class="profile-info-row">
            <div class="profile-info-name"> Password : </div>

            <div class="profile-info-value">
                <span class="editable" id="username">
                    <input type="password" value="<?= $user['password'] ?>" readonly style="border: 0px">
                    &nbsp;&nbsp;&nbsp;<button class="tooltip001 btn btn-white btn-success btn-sm btn-bold"
                        onclick="s_m_e()"><i class="ace-icon fa fa-pencil "></i>Edit</button>
                </span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Email : </div>

            <div class="profile-info-value">
                <span class="editable" id="username"><?= $user['email'] ?></span>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalchange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                </div>
                <div class="modal-body">
                    <label for="">Password Lama</label>
                    <input type="password" class="form-control" id="inputPassLama" name="inputPassLama">
                    <label for="">Password Baru</label>
                    <input type="password" class="form-control" id="inputPassBar" name="inputPassBar">
                    <label for="">Konfir Password Baru</label>
                    <input type="password" class="form-control" id="inputPassBarKon" name="inputPassBarKon">
                    <br>
                    <div id="pss">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="e_p()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function s_m_e() {
        // alert('asdas');
        $('#modalchange').modal('show');
    }

    function e_p() {
        var l = $('#inputPassLama').val();
        var pb = $('#inputPassBar').val();
        var pbk = $('#inputPassBar').val();

        $.ajax({
            url: "<?= base_url('dash/ajx_c_p_a') ?>",
            type: "post",
            data: {
                l: l,
                pb: pb,
                pbk: pbk
            },
            success: function(msg) {
                $('#pss').html(msg);
                $('#inputPassLama').val("");
                $('#inputPassBar').val("");
                $('#inputPassBar').val("");
            }
        });

    }


    $('#set').attr('class', 'active open');
    $('#prof').attr('class', 'active');
    </script>