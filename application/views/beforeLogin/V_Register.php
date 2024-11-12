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
    <title>Registrasi - PT Suja</title>
    <link rel="apple-touch-icon" href="<?= base_url();?>assets/vuexy/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/vuexy/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/forms/select/select2.min.css">
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
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/plugins/forms/form-wizard.css">
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
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100" src="<?= base_url();?>assets/img/register.png" alt="multi-steps" />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">

                            <div class="width-700 mx-auto">
                                <div class="bs-stepper register-multi-steps-wizard shadow-none">
                                    <div class="bs-stepper-header px-0" role="tablist" >
                                        <div class="step" data-target="#account-details" role="tab" id="account-details-trigger">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="home" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Akun</span>
                                                    <span class="bs-stepper-subtitle">Buat akun baru untuk perusahaan Anda</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                      <div class="bs-stepper-content px-0 mt-4">
                                        <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                            <div class="content-header mb-2">
                                                <h2 class="fw-bolder mb-75">Informasi Akun</h2>
                                                <span>Masukkan data Anda secara lengkap</span>
                                            </div>                                             
                                            <form action="<?= base_url()?>register/insert" method="POST">

                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="username">ID Pengguna <span class="text-danger">*</span></label>
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="adminsuja" required />
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="admin@suja.com" aria-label="john.doe" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="password">Kata Sandi <span class="text-danger">*</span></label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="confirm-password">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="first-name">Nama Lengkap <span class="text-danger">*</span></label>
                                                        <input type="text" name="full_name" id="full-name" class="form-control" placeholder="Nama lengkap anda..." required />
                                                    </div>
                                                   
                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="mobile-number">Nomor HP <span class="text-danger">*</span></label>
                                                        <input type="number" name="mobile_number" id="mobile-number" class="form-control mobile-number-mask" placeholder="Nomor HP anda..." required />
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="area-address">Nama Perusahaan <span class="text-danger">*</span></label>
                                                        <input type="text" name="company" id="area-address" class="form-control" placeholder="Nama Perusahaan anda.." required  />
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="home-address">Alamat Perusahaan <span class="text-danger">*</span></label>
                                                        <textarea maxlength="195" class="form-control" placeholder="Address" name="address"required ></textarea>
                                                    </div>

                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="company-website">Link Website Perusahaan</label>
                                                        <input type="text" name="company_website" id="company-website" class="form-control" placeholder="Link website perusahaan Anda" aria-label="johndoe" />
                                                    </div>
                                                    
                                                </div>

                                            <div class="d-flex justify-content-between mt-2">
                                                <button type="submit" class="btn btn-primary btn-submit">
                                                    <span class="align-middle d-sm-inline-block d-none">Daftar Akun</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/auth-register.js"></script>
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