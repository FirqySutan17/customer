<?php $menu = "information";?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row match-height">

                        <!-- Medal Card -->
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body ">
                                    <h5>Selamat datang <?= $this->session->userdata('name'); ?>,</h5>
                                    <p class="card-text font-small-3">Anda bisa lihat perkembangan anda di sistem kami.</p>
                                    <form method="post" action="">
                                        <input type="month" name="periode" class="form-control" value="<?= $periode ?>">
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-sm">Ubah Periode</button>
                                    </form>
                                    <p class="card-text font-small-3 mt-2">Terakhir diperbarui tanggal <?= date("Y-m-d H:i", strtotime($last_update->LASTUPDATE)) ?></p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->
                        <?php if($this->session->userdata('admin') == "N"): ?>
                            <!-- Statistics Card -->
                            <div class="col-lg-9 col-md-6 col-12">
                                <div class="card card-statistics ">
                                    <div class="card-header">
                                        <h4 class="card-title">Saldo <?= $this->session->userdata('cust_name') ?> di bulan <?= date('F', strtotime($periode)) ?> </h4>

                                    </div>
                                    <div class="card-body statistics-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-primary me-2" style="margin-top:10px;">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up avatar-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">Awal <br/> <?= !empty($remainder->BEGIN_REMAIN) ? number_format($remainder->BEGIN_REMAIN) : 0; ?></h4>
                                                        <!--<p class="card-text font-small-3 mb-0">Rp.<?= number_format($order->AMOUNT, 2); ?></p>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-xl-2 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-warning me-2" style="margin-top:10px;">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">ADR <br/> <?= !empty($remainder->ADR) ? number_format($remainder->ADR) : 0; ?></h4>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info me-2" style="margin-top:10px;">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user avatar-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">Penjualan <br/> <?= !empty($remainder->TOTAL_SALES) ? number_format($remainder->TOTAL_SALES) : 0; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-danger me-2" style="margin-top:10px;">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">Kas Masuk <br/> <?= !empty($remainder->CASH_IN) ? number_format($remainder->CASH_IN) : 0; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-12">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-success me-2" style="margin-top:10px;">
                                                        <div class="avatar-content">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">Akhir <br/> <?= !empty($remainder->ENDING) ? number_format($remainder->ENDING) : 0; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Statistics Card -->
                        <?php endif ?>
                    </div>

                   <div class="row">
                        <?php if($this->session->userdata('admin') == "N"): ?>
                            <!-- User Sidebar -->
                            <div class="col-lg-3 col-md-5 order-1 order-md-0">
                                
                                <!-- Line Chart - Profit -->
                                <!-- <div class="card card-tiny-line-stats">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?= number_format($order->QTY); ?></h3>
                                            <span>Monthly Orders</span>
                                            <br/>
                                            <span>Rp <?= number_format($order->AMOUNT, 2); ?></span>
                                            <br/>
                                            <a href="<?= base_url('order') ?>" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                                        </div>
                                        <div class="avatar bg-light-primary p-50">
                                            <span class="avatar-content">
                                                <i data-feather="layers" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> -->
                                <!--/ Line Chart -->
                                
                                <!-- <div class="card card-tiny-line-stats">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?= number_format($delivery->QTY); ?></h3>
                                            <span>Monthly Deliveries</span>
                                            <br/>
                                            <span>Rp <?= number_format($delivery->AMOUNT, 2); ?></span>
                                            <br/>
                                            <a href="<?= base_url('delivery') ?>" class="btn btn-sm btn-success mt-2">Selengkapnya</a>
                                        </div>
                                        <div class="avatar bg-light-success p-50">
                                            <span class="avatar-content">
                                                <i data-feather="truck" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="card card-tiny-line-stats">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?= number_format($transfer_list->CASH_IN); ?></h3>
                                            <span>Kas Masuk Bulanan</span>
                                            <br/>
                                            <span>Rp <?= number_format($transfer_list->CASH_IN, 2); ?></span>
                                            <br/>
                                            <a href="<?= base_url('list_transfer') ?>" class="btn btn-sm btn-success mt-2">Selengkapnya</a>
                                        </div>
                                        <div class="avatar bg-light-success p-50">
                                            <span class="avatar-content">
                                                <i data-feather="dollar-sign" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Line Chart - Profit -->
                                <div class="card card-tiny-line-stats">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h3 class="fw-bolder mb-75"><?= number_format($invoice->QTY); ?></h3>
                                            <span>Faktur Bulanan</span>
                                            <br/>
                                            <span>Rp <?= number_format($invoice->AMOUNT, 2); ?></span>
                                            <br/>
                                            <a href="<?= base_url('invoice') ?>" class="btn btn-sm btn-info mt-2">Selengkapnya</a>
                                        </div>
                                        <div class="avatar bg-light-info p-50">
                                            <span class="avatar-content">
                                                <i data-feather="credit-card" class="font-medium-4"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Line Chart -->
                            </div>
                            <!--/ User Sidebar -->
                        <?php endif ?>
                        <!-- User Content -->
                        <div class="col-lg-9 col-md-7 order-0 order-md-1">
                            <!--<div class="card ">-->
                            <!--    <div class="card-body">-->
                            <!--        <div id="salesChart"></div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- User Card -->
                            <div class="card ">
                                <div class="card-body">
                                    <!-- <div class="user-avatar-section" style="background-image: url('<?= base_url() ?>/assets/img/wave.svg');height: 100%; background-position: center;background-repeat: no-repeat;background-size: cover;"> -->
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="assets/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" height="110" width="110" alt="User avatar">
                                            <div class="user-info text-center">
                                                <h4><?= $this->session->userdata('full_name'); ?></h4>
                                                <span class="badge bg-light-secondary"><?= $this->session->userdata('role'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1" align="center">Informasi Akun</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nama:</span>
                                                <span><?= $user->FULL_NAME ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Pengguna:</span>
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
                                                        $status = "Ditolak";
                                                    } else {
                                                        $badge = "bg-light-success";
                                                        $status = "Aktif";
                                                    }
                                                ?>
                                                <span class="badge <?= $badge ?>"><?= $status ?></span>
                                            </li>
                                            <!-- <li class="mb-75">
                                                <span class="fw-bolder me-25">Role:</span>
                                                <span><?= $user->IS_ADMIN == "Y" ? "ADMINISTRATOR" : "CUSTOMER" ?></span>
                                            </li> -->
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nomor HP:</span>
                                                <span><?= $user->PHONE ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nama Perusahaan:</span>
                                                <span><?= $user->COMP_NAME ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Alamat Perusahaan:</span>
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
                            <div class="accordion accordion-margin" id="accordionMargin">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingMarginOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="false" aria-controls="accordionMarginOne">
                                           Tentang Kami - PT Super Unggas Jaya
                                        </button>
                                    </h2>
                                    <div id="accordionMarginOne" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-7 col-12">
                                                    <dl class="row mb-0">
                                                        <dt class="col-sm-4 fw-bolder mb-1">Nama Perusahaan:</dt>
                                                        <dd class="col-sm-8 mb-1">PT Super Unggas Jaya</dd>
                                        
                                                        <dt class="col-sm-4 fw-bolder mb-1">Email Penagihan:</dt>
                                                        <dd class="col-sm-8 mb-1">themeselection@ex.com</dd>
                                        
                                                        <dt class="col-sm-4 fw-bolder mb-1">Alamat Penagihan:</dt>
                                                        <dd class="col-sm-8 mb-1">Menara Jamsostek, Lt. 15, Jakarta Selatan, </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-xl-5 col-12">
                                                    <dl class="row mb-0">
                                                        <dt class="col-sm-4 fw-bolder mb-1">Kontak:</dt>
                                                        <dd class="col-sm-8 mb-1">+1 (605) 977-32-65</dd>
                                        
                                                        <dt class="col-sm-4 fw-bolder mb-1">Negara:</dt>
                                                        <dd class="col-sm-8 mb-1">Indonesia</dd>
                                        
                                                        <dt class="col-sm-4 fw-bolder mb-1">Kode Pos:</dt>
                                                        <dd class="col-sm-8 mb-1">403114</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Billing Address -->
                            

                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    
<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>