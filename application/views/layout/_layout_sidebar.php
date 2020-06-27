<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
        <img class="" src="<?php echo base_url('assets/img/logo1.jpeg') ?>"/>
        <div class="sidebar-brand-text mx-3"><?= APP_TITLE ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    
    <?php
    if ($data_user->verifikasi == 0) {         
        echo "<div class='text-danger'>Anda harus verifikasi data terlebih dahulu di menu pofile -> settings!</div>";
    } else if ($data_user->verifikasi == 2) {         
        echo "<div class='text-danger'>Identitas diri anda sedang diverifikasi oleh kasatpel!</div>";
    } else if ($data_user->verifikasi == 1) {         
    ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('dashboard') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>  
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('laporan') ?>">
            <i class="fas fa-fw fa-flag"></i>
            <span>Laporan</span>
        </a>
    </li>   

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>List Users</span>
        </a>
    </li>
    
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>