<!-- Sidebar -->  
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <br><br>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
            <img src="img/logo.jpeg" height="50%" width="100%">
        </div>
    </a>
    <br><br>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    if($_SESSION['level']=="Mhs"){
        ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dataportfoliomhs.php">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Portfolio</span></a>
            </li>
        <?php
    } else {
    ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

     <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="datamahasiswa.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Mahasiswa</span></a>
    </li>

     <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="dataportfoliodosen.php">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Data Portfolio</span></a>
    </li>

    <?php } ?>

 
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar