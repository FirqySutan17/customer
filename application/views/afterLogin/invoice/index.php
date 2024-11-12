<?php $menu = ""; ?>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h4 class="card-header">Filter Data</h4>
                                <div class="card-body">
                                    <form action="<?= base_url('invoice') ?>" method="post">
                                        <div class="row">
                                            <?php if($this->session->userdata('admin') == "Y"): ?>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="customer">Pelanggan</label>
                                                    <select class="select2" name="customer">
                                                        <?php if (!empty($list_customer)): ?>
                                                            <?php foreach ($list_customer as $ls): ?>                                                        
                                                                <option <?= $filter_data['customer'] == $ls->CUST ? "selected" : "" ?> value="<?= $ls->CUST ?>"><?= $ls->SHORT_NAME ?></option>
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
                                            <div class="col-md-6">
                                                <label class="form-label" for="item">Item</label>
                                                <select name="item" class="select2">
                                                    <option value="">- ALL -</option>
                                                    <?php foreach($items as $item): ?>
                                                        <option <?php if($filter_data['item'] == $item->ITEM) { echo 'selected'; } ?> value="<?= $item->ITEM ?>"><?= $item->ITEM." - ".$item->SHORT_NAME ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="no_invoice">Nomor Invoice</label>
                                                <input class="form-control" name="no_invoice" id="no_invoice" type="text" value="<?= !empty($filter_data['no_invoice']) ? $filter_data['no_invoice'] : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-info" name="submit" value="Filter">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No Invoice</th>
                                            <th>Tanggal Invoice</th>
                                            <th>No Pemesanan</th>
                                            <th>Item</th>
                                            <th>Nama</th>
                                            <th>Harga Unit</th>
                                            <th>Kuantitas</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalQTY = 0; $totalAmount = 0; $nomor = 1; ?>
                                        <?php foreach ($invoice_data as $ul):?> 
                                             <?php 
                                                $item = $ul->ITEM; $isBW = $item[0].$item[1];
                                                $isBW != 86 ? $totalQTY += $ul->QTY : $totalQTY += $ul->BW;
                                                $totalAmount += $ul->AMOUNT;
                                            ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><a href="<?= base_url('invoice/pdf/'.$ul->INVOICE_NO) ?>"><?= $ul->INVOICE_NO ?></a></td>
                                                <td><?= date("Y-m-d", strtotime($ul->INVOICE_DATE)) ?></td>
                                                <td><?= $ul->ORDER_NO ?></td>
                                                <td><?= $ul->ITEM ?></td>
                                                <td><?= $ul->SHORT_NAME ?></td>
                                                <td align="right"><?= $isBW != 86 ? number_format($ul->QTY) : number_format($ul->BW) ?></td>
                                                <td align="right"><?= number_format($ul->UP) ?></td>
                                                <td align="right"><?= number_format($ul->AMOUNT) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" align="right">TOTAL</td>
                                            <td align="right"><?= number_format($totalQTY) ?></td>
                                            <td align="right"><?= number_format($totalAmount) ?></td>
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