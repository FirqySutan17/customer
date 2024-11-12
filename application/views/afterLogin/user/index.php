<?php $menu = "admin"; ?>
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
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= $user_total ?></h3>
                                        <span>Pengguna</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= $user_active ?></h3>
                                        <span>Pengguna Aktif</span>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?= $user_pending ?></h3>
                                        <span>Pengguna Tertunda</span>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user-x" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h4 class="card-title">Data Pengguna</h4>
                            <?php if ($this->session->userdata('empno') == '999999'): ?>
                                <!-- <button type="button" class="btn btn-sm pull-right btn-info" style="margin-bottom: 3px;" data-toggle="modal" data-target="#modals-slide-in"> Tambah Pengguna</button> -->
                                <a href="<?= base_url().'user/add' ?>" class="btn btn-sm pull-right btn-info"><i class="fa fa-plus"></i> Tambah Pengguna</a>
                            <?php endif ?> 
                            <form method="POST" action="">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="role">Role</label>
                                        <select name="role" class="form-control">
                                            <option <?= $filter['role'] == "all" ? "selected" : "" ?> value="all">- SEMUA -</option>
                                            <option <?= $filter['role'] == "cust" ? "selected" : "" ?> value="cust">CUSTOMER</option>
                                            <option <?= $filter['role'] == "admin" ? "selected" : "" ?> value="admin">ADMINISTRATOR</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="status">Status</label>
                                        <select name="status" class="form-control">
                                            <option <?= $filter['status'] == "all" ? "selected" : "" ?> value="all">- SEMUA -</option>
                                            <option <?= $filter['status'] == "pending" ? "selected" : "" ?> value="pending">Pending</option>
                                            <option <?= $filter['status'] == "aktif" ? "selected" : "" ?> value="aktif">Aktif</option>
                                            <option <?= $filter['status'] == "non_aktif" ? "selected" : "" ?> value="non_aktif">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-info" name="submit" value="Pilih Data">
                                    </div>
                                </div>
                            </form>
                            <div class="card-datatable table-responsive pt-0">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th>ID Pengguna</th>
                                            <th>Role</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th align="center">Reg Date</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($user_list as $ul):?>
                                            <?php 
                                                $badge = "bg-light-danger"; $status = "Active";
                                                if ($ul->CONFIRM == "N") {
                                                    $status = "Pending";
                                                } elseif ($ul->CONFIRM == "R") {
                                                    $status = "Reject";
                                                } elseif ($ul->ISACTIVE == 'N') {
                                                    $status = "Non Active";
                                                } else {
                                                    $badge = "bg-light-success";
                                                    $status = "Active";
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo $no; $no++; ?></td>
                                                <td><?=$ul->EMPNO;?></td>
                                                <td><?= $ul->IS_ADMIN == 'Y' ? "ADMINISTRATOR" : "CUSTOMER" ?></td>
                                                <td><?=$ul->FULL_NAME;?></td>
                                                <td><?=$ul->PHONE;?></td>
                                                <td><?=$ul->EMAIL;?></td>
                                                <td><span class="badge <?= $badge ?>"><?= $status ?></span></td>
                                                <td><?= date("Y-m-d", strtotime($ul->REG_DATE)) ?></td>
                                                <td><a href="<?= base_url().'admin/detail/'.$ul->ID_USER ?>" class="btn btn-success btn-sm">Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Modal to add new user starts-->
                        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in" role="dialog">
                            <div class="modal-dialog">
                                <form class="add-new-user modal-content pt-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" name="user-fullname" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-uname">ID Pengguna</label>
                                            <input type="text" id="basic-icon-default-uname" class="form-control dt-uname" placeholder="Web Developer" name="user-name" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-email">Email</label>
                                            <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" name="user-email" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-contact">Kontak</label>
                                            <input type="text" id="basic-icon-default-contact" class="form-control dt-contact" placeholder="+1 (609) 933-44-22" name="user-contact" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="basic-icon-default-company">Perusahaan</label>
                                            <input type="text" id="basic-icon-default-company" class="form-control dt-contact" placeholder="PIXINVENT" name="user-company" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="country">Negara</label>
                                            <select id="country" class="select2 form-select">
                                                <option value="Australia">USA</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Canada">Canada</option>
                                                <option value="China">China</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Korea">Korea, Republic of</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Russia">Russian Federation</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="user-role">Role Pengguna</label>
                                            <select id="user-role" class="select2 form-select">
                                                <option value="subscriber">Subscriber</option>
                                                <option value="editor">Editor</option>
                                                <option value="maintainer">Maintainer</option>
                                                <option value="author">Author</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label" for="user-plan">Select Plan</label>
                                            <select id="user-plan" class="select2 form-select">
                                                <option value="basic">Basic</option>
                                                <option value="enterprise">Enterprise</option>
                                                <option value="company">Company</option>
                                                <option value="team">Team</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-1 data-submit">Kirim</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->
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
    } );
</script>