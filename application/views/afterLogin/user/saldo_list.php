<?php $menu = "list_saldo"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">History Saldo</h4>
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Saldo Awal</th>
                                            <th>Nilai Barang Dikirim</th>
                                            <th>Pembayaran Diterima</th>
                                            <th>Potongan</th>
                                            <th>Saldo Akhir</th>
                                            <th>Status</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($saldo_history as $ul):?> 
                                            <tr>
                                                <td><a href="<?= base_url('saldo/'.$ul->YMD) ?>" target="_blank"><?= date("Y-m-d", strtotime($ul->YMD)) ?></a></td>
                                                <td align="right"><?= number_format($ul->BG_REMAIN) ?></td>
                                                <td align="right"><?= number_format($ul->SALES_AMT) ?></td>
                                                <td align="right"><?= number_format($ul->CASH_IN) ?></td>
                                                <td align="right"><?= number_format($ul->CN_AMOUNT) ?></td>
                                                <td align="right"><?= number_format($ul->ED_REMAIN) ?></td>
                                                <td><?= $ul->APPROVED_YN == "N" ? "<span class='text-danger'>REJECTED</span>" : "<span class='text-success'>APPROVED</span>" ?></td>
                                                <td><?= $ul->REMARKS ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>