<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; <?= date("Y")?>&nbsp;<span class="d-none d-sm-inline-block"></span></span><span class="float-md-end d-none d-md-block">PT Super Unggas Jaya</span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url();?>assets/vuexy/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="<?= base_url() ?>assets/vuexy/app-assets/js/scripts/charts/apexcharts.js"></script>
    <!-- END: Page Vendor JS-->
    
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>