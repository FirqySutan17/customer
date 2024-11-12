<?php $menu = "user"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="card faq-search" style="background-image: url('<?= base_url();?>assets/vuexy/app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                    <h2>Tambah Data Pengguna</h2>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-user-view-security">
                <div class="row">
                    <!-- User Sidebar -->
                    <!-- <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0"> -->
                        <!-- User Card -->
                        <!-- <div class="card">
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
                                            <span><?= $user['FULL_NAME'] ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Pengguna:</span>
                                            <span><?= $user['EMPNO'] ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span><?= $user['EMAIL'] ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            <?php 
                                                $badge = "bg-light-danger"; $status = "Aktif";
                                                if ($user['CONFIRM'] == "N") {
                                                    $status = "Tertunda";
                                                } elseif ($user['CONFIRM'] == "R") {
                                                    $status = "Ditolak";
                                                } else {
                                                    $badge = "bg-light-success";
                                                    $status = "Aktif";
                                                }
                                            ?>
                                            <span class="badge <?= $badge ?>"><?= $status ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Nama Perusahaan:</span>
                                            <span><?= $user['COMP_NAME'] ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Kontak:</span>
                                            <span><?= $user['PHONE'] ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Alamat:</span>
                                            <span><?= $user['ADDRESS'] ?></span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div> -->
                        <!-- /User Card -->
                    <!-- </div> -->
                    <!--/ User Sidebar -->

                    <div class="col-xl-12 col-lg-12 col-md-12 order-0 order-md-1">
                        <!-- Accordion with margin start -->
                        <section id="accordion-with-margin">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card" style="width: 60%; margin: auto">
                                        <div class="card-body">
                                            <div class="info-container">
                                            <form action="<?= base_url('user/store') ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="username">ID Pengguna</label>
                                                        <input type="text" name="username" id="username" class="form-control" placeholder="adminsuja" />
                                                    </div>
                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="admin@suja.com" aria-label="john.doe" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="first-name">Nama Lengkap</label>
                                                        <input type="text" name="full_name" id="full-name" class="form-control" placeholder="Nama lengkap anda..." />
                                                    </div>
                                                
                                                    <div class="col-12 mb-1">
                                                        <label class="form-label" for="mobile-number">Nomor HP</label>
                                                        <input type="number" name="mobile_number" id="mobile-number" class="form-control mobile-number-mask" placeholder="Nomor HP anda..." />
                                                    </div>
                                                    
                                                </div>

                                                <div class="d-flex justify-content-between mt-2" style="float: right">
                                                <button type="submit" class="btn btn-primary btn-submit">
                                                    <span class="align-middle d-sm-inline-block d-none">Kirim</span>
                                                    <i data-feather="chevron-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                                </div>

                                            </form>
                                            </div>
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