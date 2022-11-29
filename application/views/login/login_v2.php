<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url('vendor/assets/images/Logo_Persis.png') ?>" type="favicon/ico" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/ace.min.css" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style>
    .window {
        width: 853px;
        height: 485px;
        background: #fff;
        border-radius: 10px;
        position: relative;
        padding: 10px;
        box-shadow: 9px 21px 18px rgba(0, 0, 0, .4);
        text-align: left;
        margin: auto;
        margin-top: auto;
        margin-bottom: auto;
        margin-top: 5%;
        margin-bottom: 0;
        opacity: 0.9;
        filter: alpha(opacity=90);
    }
    </style>
</head>

<body class="login-layout light-login">

    <div class="window" style="padding: 25px; " id="wind">



        <div style="width: 350px; float:left; padding:10px 0 0 0;" align="center">
            <img src="<?= base_url('vendor/') ?>assets/images/persis-removebg-preview.png" alt="">
            <br>
            <font style="color: #006A1D"><b style="font-size:21px">
                    SISTEM INFORMASI MANAJEMEN <br>
                    WAKAF (SIWAKAF)<br>
                </b></font>
            <div class="tampildisini"></div>
            <form>
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" id="username" class="form-control" name="username" autocomplete="off"
                                required="" placeholder="Username">
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="form-control" placeholder="Password" id="password" required
                                autocomplete="off" name="inputPassword">
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                    </label>

                    <div class="space"></div>

                    <div class="clearfix">
                        <!-- <label class="inline">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"> Remember Me</span>
                                                    </label> -->

                        <button type="button" id="btnlog" class="width-35 pull-right btn btn-sm btn-primary"
                            onclick="login()">
                            <span id="loadinglog" style="display:none; position:relative;"><img
                                    src="<?= base_url('vendor/') ?>assets/images/loading.gif" /></span>
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">Login</span>
                        </button>

                    </div>

                    <div class="space-4"></div>
                </fieldset>
            </form>
        </div>

        <div style="float:right; width:400px;" align="center">

            <br><br>

            <img style="border-radius: 30px; padding:20px; " src="<?= base_url('vendor/') ?>assets/images/pd-persis.png"
                alt="" width="420px" height="372px">




        </div>

        <br><br><br>
        <div style="clear:both; height:30px"></div>
        <div style="clear:both; height:30px"></div>
        <div style="clear:both; height:30px"></div>
        <div style="clear:both; height:30px"></div>
        <div style="clear:both; height:30px"></div>
    </div>

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <!-- <script src="<?php //base_url('vendor/') 
                        ?>assets/js/jquery-2.1.4.min.js"></script> -->

    <script src="<?= base_url('vendor/') ?>assets/js/jquery-3.4.1.min.js"></script>
    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

    <script>
    function login() {
        var user = $('#username').val();
        var pass = $('#password').val();
        $('#loadinglog').show();
        if (user != "" && pass != "") {
            $('#loadinglog').show();
            document.getElementById('btnlog').disabled = true;

            //  your voice is     
            //     my favorite sound :) 

            $.ajax({
                url: '<?= base_url('auth/ajxlogin') ?>',
                type: 'post',
                data: {
                    user: user,
                    pass: pass
                },
                success: function(pesan) {
                    if (data = '') {
                        alert('gagal');
                        $('#loadinglog').hide();
                    } else {
                        $('#loadinglog').hide();
                        $('.tampildisini').html(pesan);
                        //$('#logtext').html(data);
                        document.getElementById('btnlog').disabled = false;
                    }
                }
            });
        } else {
            alert('Harap Isi Dahulu');
            $('#loadinglog').hide();
        }
    }
    </script>


    <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write(
        "<script src='<?= base_url('vendor/') ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible'); //hide others
            $(target).addClass('visible'); //show target
        });
    });



    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
    </script>
</body>

</html>