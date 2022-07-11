<?php
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><?= config("app.name") ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <?php
    if ($_SESSION['admin']['role'] == 'admin') {


    ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu Utama
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=buku">
                <i class="fas fa-fw fa-book"></i>
                <span>Buku</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=pengunjung">
                <i class="fas fa-fw fa-male"></i>
                <span>Pengunjung</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=anggota">
                <i class="fas fa-fw fa-user"></i>
                <span>Anggota</span></a>
        </li>


    <?php } ?>




</ul>
<!--sidebar end-->