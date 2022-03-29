<!-- Topbar -->  
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
         
      
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_user']; ?></span>
                <?php
                if($_SESSION['level']=="Mhs"){
                ?>
                    <?php echo "<img class='img-profile rounded-circle' src='gambar_mhs/".$_SESSION['foto']."'/>"; ?>
                <?php } else { ?>
                    <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg">
                <?php } ?>
               
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <?php
                if($_SESSION['level']=="Mhs"){
                ?>
                    <a class="dropdown-item" href="ubahprofile_mhs.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ubah Profile
                    </a>
                <?php } else { ?>
                    <a class="dropdown-item" href="ubahprofile_dosen.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ubah Profile
                    </a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar