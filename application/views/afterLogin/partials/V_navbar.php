<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block"><img src="assets/img/cj-logo.png" height="30px" width="35px">&nbsp;&nbsp;PT Super Unggas Jaya </li>

            </ul>

        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Search Anyting" tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>


            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?= $this->session->userdata('full_name'); ?></span><span class="user-status"><?= $this->session->userdata('role'); ?></span></div><span class="avatar"><img class="round" src="<?= base_url();?>assets/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <a class="dropdown-item" href="user"><i class="me-50" data-feather="user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <!-- <a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a> -->
                <a class="dropdown-item" href="data"><i class="me-50" data-feather="credit-card"></i> Invoice</a>
                <a class="dropdown-item" href="faq"><i class="me-50" data-feather="help-circle"></i> FAQ</a>
                <a class="dropdown-item" href="logout"><i class="me-50" data-feather="power"></i> Logout</a>
            </div>
        </li>
    </ul>
</div>
</nav>