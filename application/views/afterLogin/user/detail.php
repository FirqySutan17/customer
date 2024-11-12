<?php $menu = "admin"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="card faq-search" style="background-image: url('<?= base_url();?>assets/vuexy/app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                    <h2><?= $user->FULL_NAME ?></h2>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-user-view-security">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <img class="img-fluid rounded mt-3 mb-2" src="<?= base_url();?>assets/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" height="110" width="110" alt="User avatar" />
                                        <div class="user-info text-center">
                                            <h4><?= $this->session->userdata('full_name'); ?></h4>
                                            <span class="badge bg-light-secondary"><?= $this->session->userdata('role'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="d-flex justify-content-around my-2 pt-75">-->
                                <!--    <div class="d-flex align-items-start me-2">-->
                                <!--        <span class="badge bg-light-primary p-75 rounded">-->
                                <!--            <i data-feather="check" class="font-medium-2"></i>-->
                                <!--        </span>-->
                                <!--        <div class="ms-75">-->
                                <!--            <h4 class="mb-0">1.23k</h4>-->
                                <!--            <small>tes1234567</small>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="d-flex align-items-start">-->
                                <!--        <span class="badge bg-light-primary p-75 rounded">-->
                                <!--            <i data-feather="briefcase" class="font-medium-2"></i>-->
                                <!--        </span>-->
                                <!--        <div class="ms-75">-->
                                <!--            <h5 class="mb-0">PT SUJA</h5>-->
                                <!--            <small>Jakarta</small>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <h4 class="fw-bolder border-bottom pb-50 mb-1"><i data-feather="user" class="font-medium-3 me-1"></i>Detail Akun</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Nama:</span>
                                            <span><?= $user->FULL_NAME ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Pelanggan:</span>
                                            <span><?= $user->EMPNO ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span><?= $user->EMAIL ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            <?php 
                                                $badge = "bg-light-danger"; $status = "Aktif";
                                                if ($user->CONFIRM == "N") {
                                                    $status = "Pending";
                                                } elseif ($user->CONFIRM == "R") {
                                                    $status = "Reject";
                                                } elseif ($user->ISACTIVE == 'N') {
                                                    $status = "Tidak Aktif";
                                                } else {
                                                    $badge = "bg-light-success";
                                                    $status = "Aktif";
                                                }
                                            ?>
                                            <span class="badge <?= $badge ?>"><?= $status ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Role:</span>
                                            <span><?= $user->IS_ADMIN == "Y" ? "ADMINISTRATOR" : "CUSTOMER" ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Nama Perusahaan:</span>
                                            <span><?= $user->COMP_NAME ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Kontak:</span>
                                            <span><?= $user->PHONE ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Alamat:</span>
                                            <span><?= $user->ADDRESS ?></span>
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center pt-2">
                                        <form method="post" action="<?= base_url('user/update-password') ?>">
                                            <input type="hidden" name="id" value="<?= $user->ID_USER ?>">
                                            <button type="submit" onclick="return confirm('Anda yakin ingin atur ulang password?')" class="btn btn-danger me-1 waves-effect waves-float waves-light btn-block">
                                                 Atur Ulang Kata Sandi
                                            </button>
                                        </form>
                                                
                                        <a class="btn btn-primary me-1 waves-effect waves-float waves-light"  href="<?= base_url('user/edit/'.$user->ID_USER) ?>">
                                                Ubah Data
                                        </a> 
                                    </div>

                                    <div class="d-flex justify-content-center pt-2">
                                    <?php if ($user->CONFIRM == 'Y' && $user->ISACTIVE == 'Y'): ?>
                                        
                                            <form method="post" action="<?= base_url('admin/non-active') ?>">
                                                <input type="hidden" name="ID_USER" value="<?=  $user->ID_USER ?>">
                                                <button type="submit" onclick="return confirm('Anda yakin ingin nonaktifkan akun ini?')" class="btn btn-danger me-1 waves-effect waves-float waves-light btn-block">
                                                    Tangguhkan Akun
                                                </button>
                                            </form>
                                        
                                    <?php endif ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- Accordion with margin start -->
                        <section id="accordion-with-margin">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <?php if ($user->CONFIRM == "N"): ?>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingMarginThree">
                                                        <button class="accordion-button collapsed btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginThree" aria-expanded="false" aria-controls="accordionMarginThree">
                                                            <i data-feather="user-check" class="font-medium-3 me-1"></i> Verifikasi Akun
                                                        </button>
                                                    </h2>
                                                    <div id="accordionMarginThree" class="accordion-collapse collapse" aria-labelledby="headingMarginThree" data-bs-parent="#accordionMargin">
                                                        <div class="accordion-body">
                                                            <form action="<?= base_url() ?>admin/detail/<?= $user->ID_USER ?>" method="POST">
                                                                <input type="hidden" name="ID_USER" value="<?= $user->ID_USER ?>" />
                                                                <input type="hidden" name="STATUS" value="Y" />
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="mb-1">
                                                                            <div class="input-group input-group-merge">
                                                                                <select class="select2" id="listCustomer" name="customerIntegration" required></select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary w-50 mt-1">Verifikasi Akun</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item mt-2">
                                                    <h2 class="accordion-header" id="headingRejectAccount">
                                                        <button class="accordion-button collapsed btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#accordionRejectAccount" aria-expanded="false" aria-controls="accordionMarginThree">
                                                             <i data-feather="user-x" class="font-medium-3 me-1"></i> Tolak Akun
                                                        </button>
                                                    </h2>
                                                    <div id="accordionRejectAccount" class="accordion-collapse collapse" aria-labelledby="headingRejectAccount" data-bs-parent="#accordionMargin">
                                                        <div class="accordion-body">
                                                            <form action="<?= base_url() ?>admin/detail/<?= $user->ID_USER ?>" method="POST">
                                                                <input type="hidden" name="ID_USER" value="<?= $user->ID_USER ?>" />
                                                                <input type="hidden" name="STATUS" value="R" />
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <textarea class="form-control" name="REASON" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-danger w-50 mt-1">Tolak Akun</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif ($user->CONFIRM == "Y"): ?>
                                                <h4 class="fw-bolder border-bottom pb-50 mb-1"> <i data-feather="trending-up" class="font-medium-3 me-1"></i>Detail Perusahaan</h4>
                                                <div class="info-container">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <ul class="list-unstyled">
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Kode Pelanggan:</span>
                                                                    <span><?= $user->CUST_CODE ?></span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Nama Lengkap:</span>
                                                                    <span><?= $user->CUST_FULL_NAME ?></span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">No NPWP:</span>
                                                                    <span><?= $user->CUST_NPWP ?></span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Alamat:</span>
                                                                    <span>
                                                                        <?= $user->CUST_ADDRESS ?>
                                                                        <br>
                                                                        <?= $user->CUST_ADDRESS2 ?>
                                                                    </span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">No Fax:</span>
                                                                    <span><?= $user->CUST_FAX ?></span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Status:</span>
                                                                    <?php 
                                                                        $badge = ""; $status = "";
                                                                        if ($user->CUST_STATUS == "03" || $user->CUST_STATUS == 3) {
                                                                            $status = "Stop";
                                                                            $badge  = "bg-light-danger";
                                                                        } elseif ($user->CUST_STATUS == "02" || $user->CUST_STATUS == 2) {
                                                                            $status = "Akun ditangguhkan";
                                                                            $badge  = "bg-light-warning";
                                                                        } else {
                                                                            $badge = "bg-light-success";
                                                                            $status = "Aktif";
                                                                        }
                                                                    ?>
                                                                    <span class="badge <?= $badge ?>"><?= $status ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <ul class="list-unstyled">
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">Nama PIC:</span>
                                                                    <span><?= $user->CUST_PIC_NAME ?> (<?= $user->CUST_PIC_ID ?>)</span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">No Telepon:</span>
                                                                    <span><?= $user->CUST_PHONE ?></span>
                                                                </li>
                                                                <li class="mb-75">
                                                                    <span class="fw-bolder me-25">No. Handphone:</span>
                                                                    <span><?= $user->CUST_MOBILE ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>
<script>
    $(document).ready(function() {
        $("#listCustomer").select2({
            placeholder: "Pilih customer untuk integrasi",
            minimumInputLength: 3,
            ajax: {
                url: '<?= base_url() ?>select2/ajax/customer_notexist',
                dataType: 'json',
                method: 'post',
                data: function (params) {
                    var query = {
                        search: params.term,
                    }
                
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                delay: 300,
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true,
                
            }
        });
    });
</script>