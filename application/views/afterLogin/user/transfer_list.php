<?php $menu = "list_transfer"; ?>
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
                    <div class="card">
                        <h4 class="card-header">Pilihan Data</h4>
                        <div class="card-body">
                            <form action="<?= base_url('list_transfer') ?>" method="post">
                                <div class="row">
                                    <?php if($this->session->userdata('admin') == "Y"): ?>
                                        <div class="col-md-6">
                                            <label class="form-label" for="customer">Pelanggan</label>
                                            <select class="select2" name="customer">
                                                <?php if (!empty($list_customer)): ?>
                                                    <?php foreach ($list_customer as $ls): ?>                                                        
                                                        <option <?= $filter_data['customer'] == $ls->CUST ? "selected" : "" ?> value="<?= $ls->CUST ?>"><?= $ls->CUST.' - '.$ls->SHORT_NAME ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div> 
                                    <?php endif ?>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="customer">Dari Tanggal</label>
                                                <input class="form-control" name="sdate" type="date" placeholder="Start Date" value="<?= !empty($filter_data['sdate']) ? date("Y-m-d", strtotime($filter_data['sdate'])) : date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="customer">Sampai Tanggal</label>
                                                <input class="form-control" name="edate" type="date" placeholder="End Date" value="<?= !empty($filter_data['edate']) ?date("Y-m-d", strtotime($filter_data['edate'])) : date('Y-m-d') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-info" name="submit" value="Pilih Data">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Riwayat Transfer</h4>
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No Transfer</th>
                                            <th>Tanggal Mutasi</th>
                                            <th>Bank</th>
                                            <th>Jumlah Total</th>
                                            <th>Penyelesaian Pembayaran</th>
                                            <th>Sisa Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalSettled = 0; $totalAmount = 0; $totalRemain = 0; ?>
                                        <?php $no = 1; foreach ($transfer_history as $ul):?>
                                            <?php $totalSettled += $ul->OFFSET_AMOUNT; $totalAmount += $ul->CASH_AMOUNT; $totalRemain += $ul->REMAIN_AMOUNT; ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ul->CASH_NO ?></td>
                                                <td><?= date("Y-m-d", strtotime($ul->REKENING_DATE)) ?></td>
                                                <td><?= $ul->BANK.' '.$ul->BANK_ACCOUNT_NO ?></td>
                                                <td align="right"><?= number_format($ul->CASH_AMOUNT) ?></td>
                                                <td align="right"><?= number_format($ul->OFFSET_AMOUNT) ?></td>
                                                <td align="right"><?= number_format($ul->REMAIN_AMOUNT) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right">TOTAL</td>
                                            <td align="right"><?= number_format($totalAmount) ?></td>
                                            <td align="right"><?= number_format($totalSettled) ?></td>
                                            <td align="right"><?= number_format($totalRemain) ?></td>
                                        </tr>
                                    </tfoot>
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
        $('.select2').select2();
    } );
</script>