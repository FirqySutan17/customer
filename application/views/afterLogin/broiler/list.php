<?php $menu = "broiler_list"; ?>
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
                                <h4 class="card-header">Pilihan Data</h4>
                                <div class="card-body">
                                    <form action="<?= base_url('broiler/report') ?>" method="post">
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
                                                        <label class="form-label" for="sdate">Dari Tanggal</label>
                                                        <input class="form-control" name="sdate" type="date" placeholder="Start Date" value="<?= !empty($filter_data['sdate']) ? date("Y-m-d", strtotime($filter_data['sdate'])) : date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="customer">Sampai Tanggal</label>
                                                        <input class="form-control" name="edate" type="date" placeholder="End Date" value="<?= !empty($filter_data['edate']) ?date("Y-m-d", strtotime($filter_data['edate'])) : date('Y-m-d') ?>" />
                                                    </div>
                                                </div>
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
                                            <th>NO</th>
                                            <th>REQUEST</th>
                                            <th>DATE</th>
                                            <th>CUSTOMER</th>
                                            <th>REQ QTY</th>
                                            <th>REQ BW</th>
                                            <th>PLAZMA</th>
                                            <th>FARM</th>
                                            <th>QTY</th>
                                            <th>BW</th>
                                            <th>ORDER STATUS</th>
                                            <th>CONFIRM STATUS</th>
                                            <th>CONFIRM ORDER NO</th>
                                            <th>CONFIRM REMARK</th>
                                            <th>DELIVERY QTY</th>
                                            <th>DELIVERY BW</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order_data as $i => $v): ?>
                                        <tr>
                                            <td style="text-align: center"><?= $i + 1 ?></td>
                                            <td style="text-align: center">#<STRONG><?= $v['REQ_NO'] ?></STRONG></td>
                                            <td style="text-align: center"><?= date('d M Y', strtotime($v['REQ_DATE'])) ?></td>
                                            <td style="text-align: center"><?= $v['FULL_NAME'] ?></td>
                                            <td style="text-align: center"><?= number_format($v['REQ_QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['REQ_BW']) ?></td>
                                            <td style="text-align: center"><?= $v['PLAZMA'] ?> - <?= $v['PLAZMA_NAME'] ?></td>
                                            <td style="text-align: center"><?= $v['FARM'] ?> - <?= $v['FARM_NAME'] ?></td>
                                            <td style="text-align: center"><?= number_format($v['QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['BW']) ?></td>
                                            <td style="text-align: center"><?= $v['STATUS'] == 'N' ? 'ORDERED' : 'CANCELED' ?></td>
                                            <td style="text-align: center"><?= $v['CONFIRM_STATUS'] == 'Y' ? 'CONFIRMED' : 'NOT CONFIRM' ?></td>
                                            <td style="text-align: center">#<STRONG><?= $v['ORDER_NO'] ?></STRONG></td>
                                            <td style="text-align: center"><?= $v['CONFIRM_REMARK'] ?></td>
                                            <td style="text-align: center"><?= number_format($v['DELIVERY_QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['DELIVERY_BW']) ?></td>
                                            <td style="text-align: center">
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
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