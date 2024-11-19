<?php $menu = "broiler_list"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>

    <style>
        table.table-bordered.dataTable th {
            font-size: 10px !important;
            text-transform: uppercase !important;
            padding: 10px 20px !important;
        }

        table.table-bordered.dataTable td {
            font-size: 10px !important;
            text-transform: uppercase !important;
        }
    </style>
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
                <?php echo $this->session->flashdata('message') ?>
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
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Filter">
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
                                <table id="example" class="table table-bordered table-striped" style="font-size:12px">
                                    <thead class="table-light">
                                        <tr>
                                            <th>NO</th>
                                            <th>REQUEST NO</th>
                                            <th style="text-align: center">DATE</th>
                                            <th style="text-align: center">REQ QTY</th>
                                            <th style="text-align: center">REQ BW</th>
                                            <th style="text-align: center">QTY</th>
                                            <th style="text-align: center">BW</th>
                                            <th style="text-align: center">PRICE</th>
                                            <th style="text-align: center">AMOUNT</th>
                                            <th style="text-align: center">ORDER STATUS</th>
                                            <th style="text-align: center">DO STATUS</th>
                                            <th style="text-align: center">CONFIRM ORDER NO</th>
                                            <th style="text-align: center">CONFIRM REMARK</th>
                                            <th style="text-align: center">DELIVERY QTY</th>
                                            <th style="text-align: center">DELIVERY BW</th>
                                            <th style="text-align: center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order_data as $i => $v): ?>
                                        <tr>
                                            <td style="text-align: center"><?= $i + 1 ?></td>
                                            <td style="text-align: center">#<STRONG><?= $v['REQ_NO'] ?></STRONG></td>
                                            <td style="text-align: center"><?= date('d M Y', strtotime($v['REQ_DATE'])) ?></td>
                                            <td style="text-align: center"><?= number_format($v['REQ_QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['REQ_BW']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['BW']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['UP']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['AMOUNT']) ?></td>
                                            <td style="text-align: center"><?= $v['STATUS'] ?></td>
                                            <td style="text-align: center"><?= $v['CONFIRM_STATUS'] ?></td>
                                            <td style="text-align: center">#<STRONG><?= $v['ORDER_NO'] ?></STRONG></td>
                                            <td style="text-align: center"><?= $v['CONFIRM_REMARK'] ?></td>
                                            <td style="text-align: center"><?= number_format($v['DELIVERY_QTY']) ?></td>
                                            <td style="text-align: center"><?= number_format($v['DELIVERY_BW']) ?></td>
                                            <td style="text-align: center">
                                                <?php if ($v['CONFIRM_STATUS'] == 'NOT CONFIRM' && $v['STATUS'] == 'REQUESTED'): ?>
                                                    <a href="javascript:void(0)" onclick="deleteRow(`<?= $v['REQ_NO'] ?>`)" class="btn btn-sm btn-show-detail"><i class="fas fa-xmark text-primary"></i></a>
                                                <?php endif ?>
                                                <?php if ($v['CONFIRM_STATUS'] == 'CONFIRM'): ?>
                                                    <a href="<?= base_url('broiler/pdf/'.$v['REQ_NO']) ?>" target="_blank" class="btn btn-sm btn-show-detail"><i class="fas fa-file-pdf text-danger"></i></a>
                                                <?php endif ?>
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

    <form id="form-cancel" action="<?= base_url('broiler/do_cancel') ?>" method="POST">
        <input type="hidden" id="request_no" name="req_no">
    </form>

<?php include APPPATH.'views/afterLogin/template/V_footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
        $('.select2').select2();
    } );

    function deleteRow(reqNo) {
        Swal.fire({
            type: "warning",
            title: "CANCEL ORDER",
            showCancelButton: true,
            text: "ANDA YAKIN INGIN CANCEL ORDER ?"
        }).then((result) => {
            if (result.value) {
                $("#request_no").val(reqNo);
                $("#form-cancel").submit();
            }
        });
    }
</script>