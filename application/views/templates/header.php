<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="shortcut icon" href="<?= base_url('vendor/assets/images/Logo_Persis.png') ?>" type="favicon/ico" />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/style.css">


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <!-- text fonts -->
    <link rel=" stylesheet" href="<?= base_url('vendor/') ?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/ace.min.css" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?= base_url('vendor/') ?>assets/js/ace-extra.min.js"></script>
    <script src="<?= base_url('vendor/') ?>assets/js/jquery-2.1.4.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <div class="row">
                <div class="col-sm-12" style="background:#FFFFFF; min-height:50px; ">

                    <div class="col-sm-4">
                        <a href="index.php" class="navbar-brand">
                            <img src="<?= base_url('vendor/assets/images/Logo_Persis.png') ?>"
                                style="float:left;  margin-left: 0px" height="60px">

                        </a>
                    </div>

                    <div class="col-sm-8 h2 blue"
                        style="font-size: 35px; color: #438EB9; text-shadow: 1px 1px 1px #000; font-weight: bold;"
                        align="right">
                        Sistem Informasi Manajemen Wakaf PD Persis
                    </div>
                </div>
            </div>
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <!-- <div class="navbar-header pull-left">
                <a href="<?= base_url('dash') ?>" class="navbar-brand">
                    <small>
                        <img src="<?= base_url('vendor/assets/images/Logo_Persis.png') ?>" alt="" width="30">
                        Sistem Informasi Manajemen Wakaf PD Persis
                    </small>
                </a>
            </div> -->

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">

                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?= base_url('vendor/') ?>assets/images/avatars/user.jpg"
                                alt="Jason's Photo" />
                            <span class="user-info">
                                <small>Welcome,</small>
                                <?= $user['username'] ?>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul
                            class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                            <li>
                                <a href="<?= base_url('dash/profil') ?>">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?= base_url('dash/logout') ?>">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar responsive ace-save-state">
            <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {}
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="ace-icon fa fa-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="ace-icon fa fa-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="ace-icon fa fa-users"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="ace-icon fa fa-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- /.sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="" id="dash">
                    <a href="<?= base_url('dash') ?>">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <!-- <li class="" id="pet">
                    <a href="<?= base_url('dash/peta') ?>">
                        <i class="menu-icon fa fa-globe"></i>
                        <span class="menu-text"> Peta </span>
                    </a>

                    <b class="arrow"></b>
                </li> -->

                <li class="" id="pet2">
                    <a href="<?= base_url('dash/peta_') ?>">
                        <i class="menu-icon fa fa-globe"></i>
                        <span class="menu-text"> Peta </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                <!-- <li class="" id="pet3">
                    <a href="<?= base_url('dash/petav3') ?>">
                        <i class="menu-icon fa fa-globe"></i>
                        <span class="menu-text"> Peta v3 </span>
                    </a>

                    <b class="arrow"></b>
                </li> -->

                <li class="" id="db">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-database"></i>
                        <span class="menu-text">
                            Database
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <!-- <li class="" id="kategoriwakaf">
                            <a href="<?= base_url('dash/j_wakaf') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kategori Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li> -->

                        <li class="" id="wakaf_masjid_">
                            <a href="<?= base_url('dash/wakaf_masjid') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Wakaf Masjid
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_pesantren_">
                            <a href="<?= base_url('dash/wakaf_pesantren') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Wakaf Pesantren
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_sawah_">
                            <a href="<?= base_url('dash/wakaf_sawah') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Wakaf Tanah Darat / Sawah
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_lainnya_">
                            <a href="<?= base_url('dash/wakaf_lainnya') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Wakaf Lainnya
                            </a>

                            <b class="arrow"></b>
                        </li>



                    </ul>
                </li>

                <li class="" id="pen">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text"> Aktifitas </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="" id="penwak">
                            <a href="<?= base_url('dash/wakaf_masjid_add') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Penerimaan Wakaf Masjid
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_pesantren">
                            <a href="<?= base_url('dash/wakaf_pesantren_add') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Penerimaan Wakaf Madrasah / Pesantren
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_sawaf">
                            <a href="<?= base_url('dash/wakaf_sawah_add') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Penerimaan Wakaf Tanah Darat / Sawah
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li class="" id="wakaf_lainnya">
                            <a href="<?= base_url('dash/wakaf_lainnya_add') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Penerimaan Wakaf Lainnya
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <!-- <li class="" id="lap">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text"> Laporan </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="" id="lapall">
                            <a href="<?= base_url('dash/lap_wakaf') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Laporan Penerimaan Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="lapalldet">
                            <a href="<?= base_url('dash/lap_wakaf_det') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Laporan Detail Penerimaan Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="lapmuw">
                            <a href="<?= base_url('dash/lap_muw') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Laporan Data Pemberi Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="lapen">
                            <a href="<?= base_url('dash/lap_pen') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Laporan Data Penerima Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="" id="larek">
                            <a href="<?= base_url('dash/lap_rek') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Laporan Data Rekapitulasi Wakaf
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li> -->

                <li class="" id="set">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-gear"></i>
                        <span class="menu-text"> Setting </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="" id="prof">
                            <a href="<?= base_url('dash/profil') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Profil
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="" id="pengg">
                            <a href="<?= base_url('dash/pengguna') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Pengguna
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="" id="log">
                            <a href="<?= base_url('dash/log_history') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Log History
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                    data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="<?= base_url('dash') ?>">Home</a>
                        </li>
                        <li class="active"><?= $bred ?></li>
                    </ul><!-- /.breadcrumb -->



                </div>

                <div class="page-content">
                    <div class="ace-settings-container" id="ace-settings-container">
                        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                            <i class="ace-icon fa fa-cog bigger-130"></i>
                        </div>

                        <div class="ace-settings-box clearfix" id="ace-settings-box">
                            <div class="pull-left width-50">
                                <div class="ace-settings-item">
                                    <div class="pull-left">
                                        <select id="skin-colorpicker" class="hide">
                                            <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                        </select>
                                    </div>
                                    <span>&nbsp; Choose Skin</span>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                        id="ace-settings-navbar" autocomplete="off" />
                                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                        id="ace-settings-sidebar" autocomplete="off" />
                                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                        id="ace-settings-breadcrumbs" autocomplete="off" />
                                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"
                                        autocomplete="off" />
                                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                        id="ace-settings-add-container" autocomplete="off" />
                                    <label class="lbl" for="ace-settings-add-container">
                                        Inside
                                        <b>.container</b>
                                    </label>
                                </div>
                            </div><!-- /.pull-left -->

                            <div class="pull-left width-50">
                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"
                                        autocomplete="off" />
                                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                                </div>

                                <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"
                                        autocomplete="off" />
                                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                                </div>

                                <!-- <div class="ace-settings-item">
                                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"
                                        autocomplete="off" />
                                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                                </div> -->
                            </div><!-- /.pull-left -->
                        </div><!-- /.ace-settings-box -->
                    </div><!-- /.ace-settings-container -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <!-- PAGE CONTENT ENDS -->