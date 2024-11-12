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
    <title>Change Password - PT SUJA</title>
    <link rel="apple-touch-icon" href="<?= base_url();?>assets/img/cj-logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/img/cj-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
    
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="<?= base_url();?>">
                            <img src="<?= base_url();?>assets/img/cj-logo.png" height="45px" width="50px">
                            <h2 class="brand-text ms-1" style="color:black;">Super Unggas Jaya</h2>

                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <!-- <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="<?= base_url();?>assets/img/login.svg" alt="Login Super Unggas Jaya Appliction" height="70%" width="70%"/></div>
                        </div> -->
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-12 align-items-center auth-bg px-2 p-lg-5" style="background-image: url('assets/img/pattern.webp'); width: 30%; display: flex; align-items: center; justify-content: center; margin: auto;">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <?php echo $this->session->flashdata('message') ?>
                                <h2 class="card-title fw-bold mb-1" style="text-align: center; margin: auto">Change Password</h2>
                                <!-- <p class="card-text mb-2">Silahkan masuk ke akun Anda</p> -->
                                <?php echo form_open('admin/change-password', array('id' => 'passwordForm'))?>
									<div class="mb-1">
                                        <label class="form-label" for="old-password">Old Password</label>
										<input class="form-control" type="password" name="oldpass" id="old-password" placeholder="Old Pass"/>
										<?php echo form_error('oldpass', '<div class="error">', '</div>')?>
                                    </div>

									<div class="mb-1">
                                        <label class="form-label" for="new-password">New Password</label>
										<input class="form-control" type="password" name="password" id="-new-password" placeholder="New Password"/>
										<?php echo form_error('password', '<div class="error">', '</div>')?>
                                    </div>

									<div class="mb-1">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
										<input class="form-control" type="password" name="passconf" id="confirm-password" placeholder="Confirm Password"/>
										<?php echo form_error('passconf', '<div class="error">', '</div>')?>
                                    </div>

									<button type="submit" tabindex="4" class="btn btn-outline-primary btn-page-block-overlay" style="margin: auto; display: flex">Submit</button>
									
								<?php echo form_close(); ?>
                                <!-- <p class="text-center mt-2"><span>Belum punya akun?</span><a href="register"><span>&nbsp;Buat Akun disini</span></a></p> -->
                                </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/auth-login.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <!-- END: Page JS-->
   
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            
        })
    </script>
</body>

<!-- END: Body-->

</html>