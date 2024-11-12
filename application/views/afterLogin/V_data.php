<?php $menu = "data";?>
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
                    <div class="row">
                        <!-- <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= number_format($order->QTY); ?></h3>
                                        <span>Total Order</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="layers" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= number_format($delivery->QTY); ?></h3>
                                        <span>Total Pengiriman</span>
                                    </div>
                                    <div class="avatar bg-light-danger p-50">
                                        <span class="avatar-content">
                                            <i data-feather="truck" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= number_format($invoice->AMOUNT, 2); ?></h3>
                                        <span>Jumlah Invoice</span>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= !empty($remainder) ? number_format($remainder->ENDING, 2) : 0; ?></h3>
                                        <span>Sisa</span>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                        <!-- User Content -->
                        <div class="col-lg-12 col-md-12 order-0 order-md-1">
                            <!-- <div class="card ">
                                <div class="card-body">
                                    <div id="salesChart"></div>
                                </div>
                            </div> -->
                            <!-- <div class="card ">
                                <div class="card-body">
                                    <div id="orderChart"></div>
                                </div>
                            </div> -->
                            <div class="card ">
                                <div class="card-body">
                                    <div id="deliveryChart"></div>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="card-body">
                                    <div id="invoiceChart"></div>
                                </div>
                            </div>

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
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    
<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>
<script>
    $(document).ready(function() {
        // var data_sales = `<?= $grafik_sales ?>`;
        // var options = {
        //   series: [{
        //     name: "Sales",
        //     data: <?= $grafik_sales ?>
        //     }],
        //       chart: {
        //       height: 350,
        //       type: 'line',
        //       zoom: {
        //         enabled: false
        //       }
        //     },
        //     dataLabels: {
        //       enabled: false
        //     },
        //     stroke: {
        //       curve: 'straight'
        //     },
        //     title: {
        //       text: 'Yearly Sales',
        //       align: 'left'
        //     },
        //     grid: {
        //       row: {
        //         colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        //         opacity: 0.5
        //       },
        //     },
        //     xaxis: {
        //       categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        //     },
        //     yaxis: {
        //       labels: {
        //         formatter: function (value) {
        //             return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        //         }
        //       },
        //     },
        // };

        // var chart = new ApexCharts(document.querySelector("#salesChart"), options);
        // chart.render();

        // var data_order = `<?= $grafik_order ?>`;
        // var options = {
        //   series: [{
        //     name: "Qty",
        //     data: <?= $grafik_order ?>
        //     }],
        //       chart: {
        //       height: 350,
        //       type: 'line',
        //       zoom: {
        //         enabled: false
        //       }
        //     },
        //     dataLabels: {
        //       enabled: false
        //     },
        //     stroke: {
        //       curve: 'straight'
        //     },
        //     title: {
        //       text: 'Yearly Order (dalam Ribuan)',
        //       align: 'left'
        //     },
        //     grid: {
        //       row: {
        //         colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        //         opacity: 0.5
        //       },
        //     },
        //     xaxis: {
        //       categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        //     },
        //     yaxis: {
        //       labels: {
        //         formatter: function (value) {
        //             return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        //         }
        //       },
        //     },
        // };
        // var order = new ApexCharts(document.querySelector("#orderChart"), options);
        // order.render()

        var data_delivery = `<?= $grafik_delivery ?>`;
        var options = {
          series: [{
            name: "Qty",
            data: <?= $grafik_delivery ?>
            }],
              chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: 'Pengiriman Tahunan (dalam Ribuan)',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
              },
            },
        };
         var delivery = new ApexCharts(document.querySelector("#deliveryChart"), options);
        delivery.render()

        var data_invoice = `<?= $grafik_invoice ?>`;
        var options = {
          series: [{
            name: "Amount",
            data: <?= $grafik_invoice ?>
            }],
              chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: false
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: 'Invoice Tahunan (dalam Jutaan)',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                }
              },
            },
        };
         var invoice = new ApexCharts(document.querySelector("#invoiceChart"), options);
        invoice.render()
    });
</script>