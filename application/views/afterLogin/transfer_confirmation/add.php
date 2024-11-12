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
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Tambah Konfirmasi Transfer</h4>
                            <form action="<?= base_url('transfer_confirmation/add') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="BANK_ACCOUNT">Transfer Ke <span class="text-danger">*</span></label>
                                            <select class="select2" name="BANK_ACCOUNT">
                                                <?php if (!empty($bank_account)): ?>
                                                    <?php foreach ($bank_account as $vl): ?>
                                                        <option value="<?= $vl->BANK.'|'.$vl->BANK_ACCOUNT_NO ?>"><?= $vl->BANK.' - '.$vl->BANK_ACCOUNT_NO ?></option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="TRANSFER_NO">No Transfer <span class="text-danger">*</span></label>
                                            <input type="text" name="TRANSFER_NO" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="TRANSFER_DATE">Tanggal Transfer <span class="text-danger">*</span></label>
                                            <input type="date" name="TRANSFER_DATE" class="form-control" value="<?= date('Y-m-d') ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="AMOUNT">Jumlah <span class="text-danger">*</span></label>
                                            <input type="number" name="AMOUNT" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="BANK_CHARGE">Jumlah Tagihan Bank</label>
                                            <input type="number" name="BANK_CHARGE" class="form-control" value="0">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="DESCRIPTION">Keterangan</label>
                                            <textarea class="form-control" name="DESCRIPTION"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="DESCRIPTION">Unggah Gambar</label>
                                            <input type="file" name="IMAGE" accept="image/*" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <a href="<?= base_url('transfer_confirmation') ?>" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        $('.select2').select2();
    } );
</script>