<?php $menu = "ksaran"; ?>
<?php include APPPATH.'views/afterLogin/template/V_header.php'; ?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="card faq-search" style="background-image: url('<?= base_url();?>assets/vuexy/app-assets/images/banner/banner.png')">
                <div class="card-body text-center">
                    <h2>Kritik & Saran</h2>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-user-view-security">
                <div class="row">
                   <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-body">
                        <form>
                            <div class="mb-2">
                                <label for="messageBox" class="form-label" style="font-size: 16px">Pesan</label>
                                <textarea type="text" class="form-control" id="messageBox" placeholder="Tulis kritik & saran disini.." rows="7"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">Kirim</button>
                        </form>
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