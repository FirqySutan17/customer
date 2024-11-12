<?php $menu = "user"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="card faq-search" style="background-image: url('<?= base_url();?>assets/vuexy/app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                    <h2><?= $user['FULL_NAME'] ?></h2>
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
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                        <!-- Accordion with margin start -->
                        <section id="accordion-with-margin">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="fw-bolder border-bottom pb-50 mb-1">Edit Detail Akun</h4>
                                            <div class="info-container">
                                                <form action="<?= base_url('user/update') ?>" class="form-horizontal" method="post">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                <label class="form-label" for="name">Nama</label>
                                                                <input type="hidden" name="id" value="<?= $user['ID_USER'] ?>">
                                                                <input class="form-control" name="name" id="name" type="text" value="<?= $user['FULL_NAME'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                <label class="form-label" for="email">Email</label>
                                                                <input class="form-control" name="email" id="email" type="text" value="<?= $user['EMAIL'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                <label class="form-label" for="phone">Nomor Telepon</label>
                                                                <input class="form-control" name="phone" id="phone" type="text" value="<?= $user['PHONE'] ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group" style="margin-bottom: 10px">
                                                                <label class="form-label" for="address">Alamat</label>
                                                                <textarea class="form-control" name="address"><?= $user['ADDRESS'] ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group" style="margin-bottom: 10px; float: right; margin-top: 10px">
                                                                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                                                            </div>
                                                        </div>
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