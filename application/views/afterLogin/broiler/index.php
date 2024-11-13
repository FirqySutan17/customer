<?php $menu = ""; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
    <!-- BEGIN: Content-->
    <style>
        label {
            font-weight: 700;
            font-size: 16px;
        }
        h5 {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            font-weight: 700;
            margin-top: 15px;
        }
    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h4 class="card-header">Filter Data</h4>
                                <div class="card-body">
                                    <form action="<?= base_url('broiler') ?>" method="post">
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
                                                <label class="form-label" for="no_order">No Pemesanan</label>
                                                <input class="form-control" name="no_order" id="no_order" type="text" value="<?= !empty($filter_data['no_order']) ? $filter_data['no_order'] : '' ?>" />
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
                        
                    </div> -->
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <?php echo $this->session->flashdata('message') ?>
                            <div class="card-datatable table-responsive pt-0" style="overflow: hidden;">
                                <form id="orderForm" action="<?= base_url();?>broiler/do_create" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                                            
                                                <label for="exampleInputEmail1" class="form-label">TANGGAL</label>
                                                <input type="date" name="req_date" class="form-control" style="font-size: 14px; width: 100%" value="<?php echo date('Y-m-d') ?>" readonly>

                                        </div>
                                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                                            
                                                <label for="exampleInputPassword1" class="form-label">KODE CUSTOMER</label>
                                                <input type="text" class="form-control" style="font-size: 14px; width: 100%" value="<?= $this->session->userdata('cust'); ?>" readonly>
                                         
                                        </div>
                                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                                                <label for="exampleInputPassword1" class="form-label">NAMA</label>
                                                <input type="text" class="form-control" style="font-size: 14px; width: 100%" value="<?= $this->session->userdata('name'); ?>" readonly>
                                        </div>
                                        <div class="col-md-6 col-sm-12" style="margin-bottom: 15px;">
                                                <label for="exampleInputPassword1" class="form-label">PHONE</label>
                                                <input type="text" class="form-control" style="font-size: 14px; width: 100%" value="<?= $this->session->userdata('phone'); ?>" readonly>
                                        </div>
                                    </div>
                                    <h5>FORMULIR ORDER</h5>
                                    <div class="row">
                                        <div class="col-12" style="margin-bottom: 15px;">
                                            <label for="exampleInputEmail1" class="form-label">NAMA</label>
                                            <input type="text" class="form-control" style="font-size: 14px; width: 100%" value="<?= $this->session->userdata('cust'); ?> - <?= $this->session->userdata('name'); ?>" readonly>
                                        </div>
                                        <div class="col-md-4 col-sm-12" style="margin-bottom: 15px;">
                                            <label for="exampleInputPassword1" class="form-label">QTY (EKOR)</label>
                                            <input id="qty" type="number" name="qty" class="form-control" style="font-size: 14px; width: 100%" placeholder="CONTOH : 10">
                                        </div>
                                        <div class="col-md-4 col-sm-12" style="margin-bottom: 15px;">
                                            <label for="exampleInputPassword1" class="form-label">BERAT (KG)</label>
                                            <input id="bw" type="number" name="bw" class="form-control" style="font-size: 14px; width: 100%" placeholder="CONTOH : 100" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
                                        </div>
                                        <div class="col-12" style="margin-bottom: 15px;">
                                            <label for="exampleInputPassword1" class="form-label">CATATAN</label>
                                            <textarea type="text" name="remark" class="form-control" style="font-size: 14px; width: 100%" placeholder="Tulis catatan disini.." rows="5"></textarea>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary" style="width: 100%" onclick="validateForm()">KIRIM ORDER</button>
                                </form>
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

<script>
    function validateForm() {
        const qty = document.getElementById("qty").value;
        const bw = document.getElementById("bw").value;

        
        if (qty === "" || bw === "") {
            console.log(qty);
            alert("Mohon untuk mengisi form QTY / BW");
        } else {
            console.log(qty);
            document.getElementById("orderForm").submit();
        }
    }
</script>