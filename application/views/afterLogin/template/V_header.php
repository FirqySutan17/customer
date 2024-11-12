    
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="PT Super Unggas Jaya - CJ Feed and Care">
    <meta name="keywords" content="PT Super Unggas Jaya, CJ Feed and Care, CJ Indonesia">
    <meta name="author" content="Super Unggas Jaya">
    <title>SUJA Mobile</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/img/cj-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/assets/css/style.css">
    <script src="https://kit.fontawesome.com/393f634e5d.js" crossorigin="anonymous"></script>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/plugins/forms/form-validation.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/plugins/charts/apexcharts.css">

    <style>
        .header-navbar .navbar-container ul.navbar-nav li.dropdown-user .dropdown-menu {
            width: 14rem;
            margin-top: 10px;
        }
        .wrap-book {
            border-color: #7367f0 !important;
            background-color: #7367f0 !important;
            color: #fff !important;
            padding: 10px 15px;
            border-radius: 8px;
        }
        .wrap-book svg {
            font-size: 24px;
            display: inline-block;
            margin-top: -3px;
        }
    </style>
    
</head>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><img src="<?= base_url() ?>assets/img/cj-logo.png" height="30px" width="35px">&nbsp;&nbsp;PT Super Unggas Jaya </li>

                </ul>

            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item">
                    <a href="<?= base_url('manual_book') ?>" class="nav-link">
                        <div class="wrap-book">
                            <i class="me-50" data-feather="download"></i> Buku Panduan
                        </div>
                     </a>
                </li>


                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?= $this->session->userdata('full_name'); ?></span><span class="user-status"><?= $this->session->userdata('role'); ?></span></div><span class="avatar"><img class="round" src="<?= base_url();?>assets/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="<?= base_url();?>user"><i class="me-50" data-feather="user"></i> Profil</a>
                        <a class="dropdown-item" href="<?= base_url();?>admin/change-password"><i class="me-50" data-feather="lock"></i> Ubah Kata Sandi</a>
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a> -->
                        <!-- <a class="dropdown-item" href="<?= base_url();?>data"><i class="me-50" data-feather="credit-card"></i> Invoice</a> -->
                        <!-- <a class="dropdown-item" href="<?= base_url();?>faq"><i class="me-50" data-feather="help-circle"></i> FAQ</a> -->
                        <a class="dropdown-item" href="<?= base_url();?>logout"><i class="me-50" data-feather="power"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="<?= base_url() ?>"><span class="brand-logo">
                <img src="<?= base_url() ?>assets/img/cj-logo.png">
                </span>
                        <font size="3px;" color="black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SUJA Sistem</b></font>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item <?= ($menu == 'information') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url() ?>"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Beranda</span></a>
                </li>
                
                <li class=""><a class="d-flex align-items-center" href="<?= base_url();?>broiler"><i data-feather="circle"></i><span class="menu-item text-truncate" >Order Broiler</span></a></li>
                
                <li class="nav-item has-sub "><a class="d-flex align-items-center"><i data-feather="clipboard"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Data <?= $this->session->userdata('admin') == 'N' ? 'Saya' : 'Pelanggan' ?></span></a>
                    <ul class="menu-content">
                        <?php if ($this->session->userdata('admin') == 'N'): ?>
                            <li class="<?= ($menu == 'data') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>data"><i data-feather="circle"></i><span class="menu-item text-truncate" >Grafik Data Penjualan</span></a>
                            </li>
                        <?php endif ?>
                        <li class="<?= ($menu == 'sales_list') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>sales_list"><i data-feather="circle"></i><span class="menu-item text-truncate" >Data Penjualan</span></a>
                        </li>
                        <?php if ($this->session->userdata('admin') == 'N'): ?>
                            <li class="<?= ($menu == 'broiler_list') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>broiler/report"><i data-feather="circle"></i><span class="menu-item text-truncate" >Data Order Broiler</span></a></li>
                        <?php endif ?>
                        <!-- <li class="<?= ($menu == 'list_transfer') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>list_transfer"><i data-feather="circle"></i><span class="menu-item text-truncate" >Data Transfer</span></a>
                        </li> -->
                        <li class="<?= ($menu == 'transfer_confirmation') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>transfer_confirmation"><i data-feather="circle"></i><span class="menu-item text-truncate" >Konfirmasi Transfer</span></a>
                        </li>
                        <?php $currentDate = date("Ymd"); $lastDayCurrentMonth = date("Ymt"); ?>
                        <?php if ($currentDate == $lastDayCurrentMonth): ?>
                            <!-- <li class="<?= ($menu == 'saldo') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>saldo"><i data-feather="circle"></i><span class="menu-item text-truncate" >Konfirmasi Saldo</span></a>
                            </li>
                            <li class="<?= ($menu == 'list_saldo') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>list_saldo"><i data-feather="circle"></i><span class="menu-item text-truncate" >History Saldo</span></a>
                            </li> -->
                        <?php endif ?>
                        <li class="<?= ($menu == 'list_remainder') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>list_remainder"><i data-feather="circle"></i><span class="menu-item text-truncate" >Riwayat AR</span></a>
                        </li>
                    </ul>
                </li>
                
                <li class=" nav-item <?= ($menu == 'user') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url() ?>user"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Profil</span></a>
                </li>
                <?php if ($this->session->userdata('admin') == 'Y'): ?>
                    <li class=" nav-item <?= ($menu == 'admin') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url() ?>admin"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User">Data Pengguna</span></a>
                    </li>

                    <li class=" nav-item <?= ($menu == 'ksaran') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url() ?>kritik-saran"><i data-feather="clipboard"></i><span class="menu-title text-truncate" data-i18n="User">Kritik & Saran</span></a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->