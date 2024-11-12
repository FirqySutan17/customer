<?php $menu = "transfer_confirmation"; ?>
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
                            <form action="<?= base_url('transfer_confirmation') ?>" method="post">
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
                            <h4 class="card-title">Konfirmasi Transfer</h4>
                            <br>
                            <?php if($this->session->userdata('admin') != "Y"): ?>
                                <a href="<?= base_url('transfer_confirmation/add') ?>" class="btn btn-primary btn-sm">Tambah</a>
                            <?php endif ?>
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>No Transfer</th>
                                            <th>Tanggal Transfer</th>
                                            <th>Bank</th>
                                            <th>Jumlah Total</th>
                                            <th width="35%">Keterangan</th>
                                            <th>Gambar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; foreach ($transfer_history as $ul):?> 
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $ul->TRANSFER_NO ?></td>
                                                <td><?= date("Y-m-d", strtotime($ul->TRANSFER_DATE)) ?></td>
                                                <td><?= $ul->BANK.' '.$ul->BANK_ACCOUNT_NO ?></td>
                                                <td><?= number_format($ul->TOTAL_AMT) ?></td>
                                                <td><?= $ul->DESKRIPSI ?></td>
                                                <td><a href="<?= base_url('upload/transfer_confirmation/'.$ul->IMAGE) ?>" class="btn btn-sm btn-info" target="_blank">Lihat Gambar</a></td>
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
        $('.select2').select2();
    } );
</script>