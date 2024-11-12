<?php $menu = "list_remainder"; ?>
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
                    <?php if($this->session->userdata('admin') == "Y"): ?>
                        <div class="card">
                            <h4 class="card-header">Pilihan Data</h4>
                            <div class="card-body">
                                <form action="<?= base_url('list_remainder') ?>" method="post">
                                    <div class="row">
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
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info" name="submit" value="Pilih Data">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Riwayat AR</h4>
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Tanggal</th>
                                            <th>Awal</th>
                                            <th>Penjualan</th>
                                            <th>Pembayaran</th>
                                            <th>Akhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($remainder_history as $ul):?>
                                            <tr>
                                                <td><?= number_format($no) ?></td>
                                                <td><?= date("Y-m-d", strtotime($ul->YMD)) ?></td>
                                                <td align="right"><?= number_format($ul->BEGIN_REMAIN) ?></td>
                                                <td align="right"><?= number_format($ul->SALES) ?></td>
                                                <td align="right"><?= number_format($ul->AMOUNT_IN) ?></td>
                                                <td align="right"><?= number_format($ul->ENDING) ?></td>
                                            </tr>
                                        <?php $no++; endforeach; ?>
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
        $('.select2').select2();
    } );
</script>