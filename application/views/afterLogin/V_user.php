<?php $menu = "user"; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php include 'partials/V_header.php' ?>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/vuexy/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <!-- END: Page CSS-->
</head>

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <?php include 'partials/V_navbar.php' ?>
    <?php include 'partials/V_sidebar.php' ?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-security">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="<?= base_url();?>assets/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" height="110" width="110" alt="User avatar" />
                                            <div class="user-info text-center">
                                                <h4><?= $this->session->userdata('full_name'); ?></h4>
                                                <span class="badge bg-light-secondary"><?= $this->session->userdata('role'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around my-2 pt-75">
                                        <div class="d-flex align-items-start me-2">
                                            <span class="badge bg-light-primary p-75 rounded">
                                                <i data-feather="check" class="font-medium-2"></i>
                                            </span>
                                            <div class="ms-75">
                                                <h4 class="mb-0">1.23k</h4>
                                                <small>tes1234567</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start">
                                            <span class="badge bg-light-primary p-75 rounded">
                                                <i data-feather="briefcase" class="font-medium-2"></i>
                                            </span>
                                            <div class="ms-75">
                                                <h5 class="mb-0">PT SUJA</h5>
                                                <small>Jakarta</small>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Username:</span>
                                                <span>violet.dev</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Billing Email:</span>
                                                <span>vafgot@vultukir.org</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Status:</span>
                                                <span class="badge bg-light-success">Active</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Role:</span>
                                                <span>Administrator</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">NPWP ID:</span>
                                                <span>99009921</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Contact:</span>
                                                <span>+62 8588588900</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Address:</span>
                                                <span>Jl. Mangga, Cikande, Banten.</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1 waves-effect waves-float waves-light" data-bs-target="#editUser" data-bs-toggle="modal">
                                                Edit
                                            </a>
                                            <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect">Suspended</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->

                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- Accordion with margin start -->
                            <section id="accordion-with-margin">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="accordion accordion-margin" id="accordionMargin">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingMarginOne">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginOne" aria-expanded="true" aria-controls="accordionMarginOne">
                                                             Payment Methods
                                                         </button>
                                                     </h2>
                                                     <div id="accordionMarginOne" class="accordion-collapse collapse show" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin">
                                                        <div class="accordion-body">
                                                            <!-- Payment Metods -->
                                                            <div class="card">
                                                                <div class="card-body my-1 py-25">
                                                                    <div class="row gx-4">
                                                                        <div class="col-lg-6">
                                                                            <form id="creditCardForm" class="row gx-2 gy-1 validate-form" onsubmit="return false">
                                                                                
                                                                                <div class="col-12 mt-0">
                                                                                    <label class="form-label" for="addCardNumber">Card Number</label>
                                                                                    <div class="input-group input-group-merge">
                                                                                        <input id="addCardNumber" name="addCard" class="form-control add-credit-card-mask" type="number" placeholder="5637 8172 1290 7898" aria-describedby="addCard2" data-msg="Please enter your credit card number" />
                                                                                        <span class="input-group-text cursor-pointer p-25" id="addCard2">
                                                                                            <span class="add-card-type"></span>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <label class="form-label" for="addCardName">Name On Card</label>
                                                                                    <input type="text" id="addCardName" class="form-control" placeholder="John Doe" />
                                                                                </div>

                                                                                <div class="col-md-12">
                                                                                    <label class="form-label" for="addCardName">Bank</label>
                                                                                    <select class=" form-select" id="addCardName ">
                                                                                        <option hidden>Select Your Bank</option>
                                                                                        <option value="bni">BNI</option>
                                                                                        <option value="mandiri">Mandiri</option>
                                                                                        <option value="BCA">BCA</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="col-12">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="form-check form-switch form-check-primary me-25">
                                                                                            <input type="checkbox" class="form-check-input" id="addSaveCard"  />
                                                                                            <label class="form-check-label" for="addSaveCard">
                                                                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                                                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <label class="form-check-label fw-bolder" for="addSaveCard"> Primary Card? </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12 mt-2 pt-1">
                                                                                    <button type="submit" class="btn btn-primary me-1">Save Changes</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2 mt-lg-0">
                                                                            <h6 class="fw-bolder mb-2">My Billing Card</h6>
                                                                            <div class="added-cards">
                                                                                <div class="cardMaster rounded border p-2 mb-1">
                                                                                    <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                                                        <div class="card-information">
                                                                                            <div class="d-flex align-items-center mb-50">
                                                                                                <h6 class="mb-0">Tom McBride</h6>
                                                                                                <span class="badge badge-light-primary ms-50">Primary</span>
                                                                                            </div>
                                                                                            <span class="card-number">∗∗∗∗ ∗∗∗∗ 9856</span>
                                                                                        </div>
                                                                                        <div class="d-flex flex-column text-start text-lg-end">
                                                                                            <div class="d-flex order-sm-0 order-1 mt-1 mt-sm-0">
                                                                                            </div>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- / Payment Metods -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingMarginTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginTwo" aria-expanded="false" aria-controls="accordionMarginTwo">
                                                         Change Password
                                                     </button>
                                                 </h2>
                                                 <div id="accordionMarginTwo" class="accordion-collapse collapse" aria-labelledby="headingMarginTwo" data-bs-parent="#accordionMargin">
                                                    <div class="accordion-body">
                                                        <!-- Change Password -->
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6 order-md-0 order-1">
                                                                <div class="card-body">
                                                                    <!-- form -->
                                                                    <form class="validate-form" action="">
                                                                        <div class="mb-2">
                                                                            <label for="oldpwd" class="form-label">Old Password</label>
                                                                            <input class="form-control" type="password" name="oldpwd" id="oldpwd">
                                                                        </div>

                                                                        <div class="row mb-1">
                                                                            <div class="col-md-6">
                                                                                <label for="oldpwd1" class="form-label"><font size="1px">New Password</font></label>
                                                                                <input class="form-control" type="password" name="oldpwd1" id="oldpwd">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="oldpwd2" class="form-label"><font size="1px">Confirm New Password</font></label>
                                                                                <input class="form-control" type="password" name="oldpwd2" id="oldpwd">
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary w-100">Change Password</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                                <div class="text-center">
                                                                    <img class="img-fluid text-center" src="assets/img/reset.svg" alt="illustration" width="310" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- / Change Password -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingMarginThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionMarginThree" aria-expanded="false" aria-controls="accordionMarginThree">
                                                        Contact Us
                                                    </button>
                                                </h2>
                                                <div id="accordionMarginThree" class="accordion-collapse collapse" aria-labelledby="headingMarginThree" data-bs-parent="#accordionMargin">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <form action="" method="POST">
                                                                    <div class="mb-1">
                                                                        <div class="input-group input-group-merge">
                                                                            <span class="input-group-text"><i data-feather="align-left"></i></span>
                                                                            <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="Subject" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-1">
                                                                        <div class="input-group input-group-merge">
                                                                            <select class=" form-select" id="addCardName " required>
                                                                                <option hidden>Select Category</option>
                                                                                <option value="ask">Ask</option>
                                                                                <option value="complaint">Complaint</option>
                                                                                <option value="error">Error/Bug in Application</option>
                                                                                <option value="other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <textarea class="form-control"  name="" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="submit" class="btn btn-primary w-100 mt-1">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Accordion with margin end -->

                    

                </div>
                <!--/ User Content -->
            </div>
        </section>
        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Edit User Information</h1>
                            <p>Please update your data in this section.</p>
                        </div>
                        <form id="editUserForm" class="row gy-1 pt-75" onsubmit="return false">
                            <div class="col-12">
                                <label class="form-label" for="modalEditUserFirstName">Full Name</label>
                                <input type="text" id="modalEditUserFirstName" name="fullname" class="form-control" placeholder="John Doe" data-msg="Please enter your Full Name" />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditUserName">Username</label>
                                <input type="text" id="modalEditUserName" name="modalEditUserName" class="form-control" placeholder="john.doe.007" />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditPT">Company</label>
                                <input type="text" id="modalEditPT" name="company" class="form-control" placeholder="PT Mencari Cinta Sejati" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Email:</label>
                                <input type="text" id="modalEditUserEmail" name="modalEditUserEmail" class="form-control"  placeholder="gertrude@gmail.com" />
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">Status</label>
                                <select id="modalEditUserStatus" name="modalEditUserStatus" class="form-select" aria-label="Default select example">
                                    <option selected>Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">Suspended</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">NPWP</label>
                                <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="Tax-8894"/>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserPhone">Contact</label>
                                <input type="text" id="modalEditUserPhone" name="modalEditUserPhone" class="form-control phone-number-mask" placeholder="628588588900"  />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserLanguage">Profile Pict</label>
                                <input type="file" name="pict">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserCountry">Country</label>
                                <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select">
                                    <option value="">Select Value</option>
                                    <option value="Australia">Australia</option>
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
                            <div class="col-12">
                                <div class="d-flex align-items-center mt-1">
                                    <div class="form-check form-switch form-check-primary">
                                        <input type="checkbox" class="form-check-input" id="customSwitch10" checked />
                                        <label class="form-check-label" for="customSwitch10">
                                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                                        </label>
                                    </div>
                                    <label class="form-check-label fw-bolder" for="customSwitch10">Use as a billing address?</label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-2 pt-50">
                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Discard
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Edit User Modal -->
        <!-- upgrade your plan Modal -->
        <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-upgrade-plan">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5 pb-2">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Upgrade Plan</h1>
                            <p>Choose the best plan for user.</p>
                        </div>
                        <form id="upgradePlanForm" class="row pt-50" onsubmit="return false">
                            <div class="col-sm-8">
                                <label class="form-label" for="choosePlan">Choose Plan</label>
                                <select id="choosePlan" name="choosePlan" class="form-select" aria-label="Choose Plan">
                                    <option selected>Choose Plan</option>
                                    <option value="standard">Standard - $99/month</option>
                                    <option value="exclusive">Exclusive - $249/month</option>
                                    <option value="Enterprise">Enterprise - $499/month</option>
                                </select>
                            </div>
                            <div class="col-sm-4 text-sm-end">
                                <button type="submit" class="btn btn-primary mt-2">Upgrade</button>
                            </div>
                        </form>
                    </div>
                    <hr />
                    <div class="modal-body px-5 pb-3">
                        <h6>User current plan is standard plan</h6>
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="d-flex justify-content-center me-1 mb-1">
                                <sup class="h5 pricing-currency pt-1 text-primary">$</sup>
                                <h1 class="fw-bolder display-4 mb-0 text-primary me-25">99</h1>
                                <sub class="pricing-duration font-small-4 mt-auto mb-2">/month</sub>
                            </div>
                            <button class="btn btn-outline-danger cancel-subscription mb-1">Cancel Subscription</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ upgrade your plan Modal -->
        <!-- two factor auth modal -->
        <div class="modal fade" id="twoFactorAuthModal" tabindex="-1" aria-labelledby="twoFactorAuthTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 mx-50">
                        <h1 class="text-center mb-1" id="twoFactorAuthTitle">Select Authentication Method</h1>
                        <p class="text-center mb-3">
                            you also need to select a method by which the proxy
                            <br />
                            authenticates to the directory serve
                        </p>

                        <div class="custom-options-checkable">
                            <input class="custom-option-item-check" type="radio" name="twoFactorAuthRadio" id="twoFactorAuthApps" value="apps-auth" checked />
                            <label for="twoFactorAuthApps" class="custom-option-item d-flex align-items-center flex-column flex-sm-row px-3 py-2 mb-2">
                                <span><i data-feather="settings" class="font-large-2 me-sm-2 mb-2 mb-sm-0"></i></span>
                                <span>
                                    <span class="custom-option-item-title h3">Authenticator Apps</span>
                                    <span class="d-block mt-75">
                                        Get codes from an app like Google Authenticator, Microsoft Authenticator, Authy or 1Password.
                                    </span>
                                </span>
                            </label>

                            <input class="custom-option-item-check" type="radio" name="twoFactorAuthRadio" value="sms-auth" id="twoFactorAuthSms" />
                            <label for="twoFactorAuthSms" class="custom-option-item d-flex align-items-center flex-column flex-sm-row px-3 py-2">
                                <span><i data-feather="message-square" class="font-large-2 me-sm-2 mb-2 mb-sm-0"></i></span>
                                <span>
                                    <span class="custom-option-item-title h3">SMS</span>
                                    <span class="d-block mt-75">We will send a code via SMS if you need to use your backup login method.</span>
                                </span>
                            </label>
                        </div>

                        <button id="nextStepAuth" class="btn btn-primary float-end mt-3">
                            <span class="me-50">Continue</span>
                            <i data-feather="chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- / two factor auth modal -->

        <!-- add authentication apps modal -->
        <div class="modal fade" id="twoFactorAuthAppsModal" tabindex="-1" aria-labelledby="twoFactorAuthAppsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-apps">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 mx-50">
                        <h1 class="text-center mb-2 pb-50" id="twoFactorAuthAppsTitle">Add Authenticator App</h1>

                        <h4>Authenticator Apps</h4>
                        <p>
                            Using an authenticator app like Google Authenticator, Microsoft Authenticator, Authy, or 1Password, scan the
                            QR code. It will generate a 6 digit code for you to enter below.
                        </p>

                        <div class="d-flex justify-content-center my-2 py-50">
                            <img class="img-fluid" src="<?= base_url();?>assets/vuexy/app-assets/images/icons/qrcode.png" width="122" alt="QR Code" />
                        </div>

                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">ASDLKNASDA9AHS678dGhASD78AB</h4>
                            <div class="alert-body fw-normal">
                                If you having trouble using the QR code, select manual entry on your app
                            </div>
                        </div>

                        <form class="row gy-1" onsubmit="return false">
                            <div class="col-12">
                                <input class="form-control" id="authenticationCode" type="text" placeholder="Enter authentication code" />
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="reset" class="btn btn-outline-secondary mt-2 me-1" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <span class="me-50">Continue</span>
                                    <i data-feather="chevron-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / add authentication apps modal-->

        <!-- add authentication sms modal-->
        <div class="modal fade" id="twoFactorAuthSmsModal" tabindex="-1" aria-labelledby="twoFactorAuthSmsTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg two-factor-auth-sms">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 mx-50">
                        <h1 class="text-center mb-2 pb-50" id="twoFactorAuthSmsTitle">`</h1>
                        <h4>Verify Your Mobile Number for SMS</h4>
                        <p>Enter your mobile phone number with country code and we will send you a verification code.</p>
                        <form class="row gy-1 mt-1" onsubmit="return false">
                            <div class="col-12">
                                <input class="form-control phone-number-mask" type="text" placeholder="Mobile number with country code" />
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="reset" class="btn btn-outline-secondary mt-1 me-1" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary mt-1">
                                    <span class="me-50">Continue</span>
                                    <i data-feather="chevron-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / add authentication sms modal-->

    </div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include 'partials/V_footer.php' ?>
<!-- BEGIN: Page Vendor JS-->
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/vendors/js/extensions/polyfill.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/modal-two-factor-auth.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/modal-edit-user.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/app-user-view-security.js"></script>
<script src="<?= base_url();?>assets/vuexy/app-assets/js/scripts/pages/app-user-view.js"></script>
<!-- END: Page JS-->
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
