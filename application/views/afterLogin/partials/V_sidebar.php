<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="<?= base_url();?>assets/vuexy/html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                <img src="assets/img/cj-logo.png">
                </span>
                        <font size="3px;" color="black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SUJA Mobile</b></font>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item has-sub "><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span></a>
                    <ul class="menu-content">
                        <li class="<?= ($menu == 'information') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>"><i data-feather="circle"></i><span class="menu-item text-truncate " data-i18n="Analytics">Information</span></a>
                        </li>
                        <li class="<?= ($menu == 'data') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="<?= base_url();?>data"><i data-feather="circle"></i><span class="menu-item text-truncate" >My Data</span></a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class=" nav-item <?= ($menu == 'user') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="user"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Profile</span></a>
                </li>
                <?php if ($this->session->userdata('admin') == 'Y'): ?>
                    
                <li class=" nav-item <?= ($menu == 'admin') ? 'active' : '' ?>"><a class="d-flex align-items-center" href="admin"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User">Admin</span></a>
                </li>
                
                
                <?php endif ?>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->