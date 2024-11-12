<?php $menu = "list_saldo"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="card faq-search" style="background-image: url('<?= base_url();?>assets/vuexy/app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                    <h2>Detail Saldo</h2>
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
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Kepada Yth</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">[ <?= $saldo->CUST ?> ] <?= $saldo->FULL_NAME ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25"><?= $saldo->ADDRESS1 ?></span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">UP : <?= $saldo->CHIEF_NAME ?></span>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Rincian Saldo</h4>
                                        <div class="info-container">
                                            <p>
                                                Dengan hormat,<br/>
                                                Sehubungan dengan pengiriman barang atas nama saudara, maka bersama ini kami informasikan bahwa :
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr style="border-style: hidden;">
                                                            <td>Total nilai barang yang belum dibayar (Saldo Awal) per tanggal <?= date("01 M Y", strtotime("-1 days")) ?></td>
                                                            <td>:</td>
                                                            <td><?= number_format($check_saldo->BG_REMAIN) ?></td>
                                                        </tr>
                                                        <tr style="border-style: hidden;">
                                                            <td>Nilai barang yang dikirim selama tanggal <?= date("d M Y", strtotime($check_saldo->YMD)) ?></td>
                                                            <td>:</td>
                                                            <td><?= number_format($check_saldo->SALES_AMT) ?></td>
                                                        </tr>
                                                        <tr style="border-style: hidden;">
                                                            <td>Pembayaran yang sudah kami terima selama tanggal <?= date("d M Y", strtotime($check_saldo->YMD)) ?></td>
                                                            <td>:</td>
                                                            <td><?= number_format($check_saldo->CN_AMOUNT) ?></td>
                                                        </tr>
                                                        <tr style="border-style: solid;">
                                                            <td>Potongan CN/TRansportasi/Kompensasi selama tanggal <?= date("d M Y", strtotime($check_saldo->YMD)) ?></td>
                                                            <td>:</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr >
                                                            <td>Total nilai barang yang harus dibayar (Saldo Akhir) per tanggal <?= date("d M Y", strtotime($check_saldo->YMD." +1 month")) ?></td>
                                                            <td>:</td>
                                                            <td><?= number_format($check_saldo->ED_REMAIN) ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br/>
                                            <p>Demikianlah informasi yang dapat kami sampaikan, jika informasi tersebut benar kami harapkan Bpk/Ibu/Sdr mencentang kolom setuju yang telah kami sediakan.</p>
                                            <p>Namun jika informasi tersebut berbeda atau ada salah, maka kami harapkan Bpk/Ibu/Sdr mencentang kolom tidak setuju dan mengisi keterangan / alasan, lalu segera hubungi Bag. Credit Control kami paling lambat 14 hari setelah meng-submit jawaban Anda.</p>
                                            <ul class="list-unstyled">
                                                <li class="mb-75">
                                                    <span class="fw-bolder me-25">Nama :</span>
                                                    <span>Chusnul Mashudi</span>
                                                </li>
                                                <li class="mb-75">
                                                    <span class="fw-bolder me-25">No. Telp + Ext :</span>
                                                    <span>021=52995000 Ext 5161</span>
                                                </li>
                                                <li class="mb-75">
                                                    <span class="fw-bolder me-25">No. HP :</span>
                                                    <span>0821 1726 9002</span>
                                                </li>
                                            </ul>
                                            <?php if (!empty($check_saldo)): ?>
                                                <?= $check_saldo->APPROVED_YN == "N" ? "<span class='text-danger'>REJECTED</span>" : "<span class='text-success'>APPROVED</span>" ?>
                                                <p><?= $check_saldo->REMARKS ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>