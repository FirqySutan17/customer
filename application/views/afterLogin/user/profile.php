<?php $menu = "user"; ?>
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
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Detail Akun</h4>
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
                                                    $status = "Tertunda";
                                                } elseif ($user->CONFIRM == "R") {
                                                    $status = "Tertolak";
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
                                        <a class="btn btn-primary me-1 waves-effect waves-float waves-light"  href="<?= base_url('profile/edit') ?>">
                                            Ubah
                                        </a>                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <?php if ($user->IS_ADMIN == "N"): ?>
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- Accordion with margin start -->
                            <section id="accordion-with-margin">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if ($user->CONFIRM == "Y"): ?>
                                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Detail Perusahaan</h4>
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
                                                                                $status = "Suspended";
                                                                                $badge  = "bg-light-warning";
                                                                            } else {
                                                                                $badge = "bg-light-success";
                                                                                $status = "Active";
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
                                                                        <span class="fw-bolder me-25">No Handphone:</span>
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
                    <?php endif ?>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>