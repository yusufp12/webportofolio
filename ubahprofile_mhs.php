<?php
session_start();
if(!isset($_SESSION['status'])){
    ?>
    <script>
        alert("Silakan login terlebih dahulu...!");
    </script>
    <?php
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php include "title.php"; ?></title>
    <?php include "favicon.php"; ?>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">  

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Profile Mahasiswa</h1>
                    </div>

                    <?php

                    include "koneksi.php";

                    if(isset($_POST['btnSimpan'])) {
                        
                        $nik            = $_POST['nik'];
                        $nama_mhs       = $_POST['nama_mhs'];
                        $email          = $_POST['email'];
                        $alamat         = $_POST['alamat'];
                        $telepon_wa     = $_POST['telepon_wa'];
                        $ig             = $_POST['ig'];
                        $password       = $_POST['password'];

                         // Ambil Data Gambar Foto
                         $nama_file    = $_FILES['foto']['name'];
                         $ukuran_file  = $_FILES['foto']['size'];
                         $tipe_file    = $_FILES['foto']['type'];
                         $tmp_file     = $_FILES['foto']['tmp_name'];
 
                         // Set path folder tempat menyimpan gambarnya
                         $path         = "gambar_mhs/".$nama_file; 

                        if(!empty($tmp_file)){ // jika upload foto

                            move_uploaded_file($tmp_file, $path); 

                            if(empty($password)){
                                $sql = "UPDATE tb_mhs SET nama_mhs='$nama_mhs', email='$email', alamat='$alamat', telepon_wa='$telepon_wa', 
                                ig='$ig', foto='$nama_file' WHERE nim='$_SESSION[userid]' ";
                            }else {
                                $sql = "UPDATE tb_mhs SET nama_mhs='$nama_mhs', email='$email', alamat='$alamat', telepon_wa='$telepon_wa', 
                                ig='$ig', password='$password', foto='$nama_file' WHERE nim='$_SESSION[userid]' ";
                            }

                        } else { //jika tidak upload

                            if(empty($password)){
                                $sql = "UPDATE tb_mhs SET nama_mhs='$nama_mhs', email='$email', alamat='$alamat', telepon_wa='$telepon_wa', 
                                ig='$ig' WHERE nim='$_SESSION[userid]' ";
                            }else {
                                $sql = "UPDATE tb_mhs SET nama_mhs='$nama_mhs', email='$email', alamat='$alamat', telepon_wa='$telepon_wa', 
                                ig='$ig', password='$password' WHERE nim='$_SESSION[userid]' ";
                            }

                        }                                
                        
                        $qryInsert = mysqli_query($conn, $sql);

                        if($qryInsert){
                            ?>
                            <script>
                                alert("Profile Berhasil Diupdate");
                            </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                            }else {
                            ?>
                            <script>
                                alert("Profile Gagal Diupdate");
                            </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0; url=ubahprofile_mhs.php'>";
                            } 

                    }

                      //menampilan data
                      $sql   ="SELECT * FROM tb_mhs WHERE nim='$_SESSION[userid]'";
                      $hasil = mysqli_query($conn, $sql);
                      $row   = mysqli_fetch_array($hasil);

                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card">
                        <div class="card-body text-dark">

                            <div class="form-group col-md-12">
                                <label>NIM :</label>
                                <input type="text" class="form-control" placeholder="NIM" readonly name="nim" required="" value="<?php echo $row['nim']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Nama Mahasiswa :</label>
                                <input type="text" class="form-control" placeholder="Nama Mhs" name="nama_mhs" required="" value="<?php echo $row['nama_mhs']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Email :</label>
                                <input type="text" class="form-control" placeholder="email" name="email"  required="" value="<?php echo $row['email']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Telepon (WA):</label>
                                <input type="text" class="form-control" placeholder="Telepon (WA)" name="telepon_wa"  required="" value="<?php echo $row['telepon_wa']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Instagram :</label>
                                <input type="text" class="form-control" placeholder="Instagram" name="ig"  required="" value="<?php echo $row['ig']; ?>">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Alamat :</label>
                                <textarea class="form-control" placeholder="Alamat" name="alamat" required=""><?php echo $row['alamat']; ?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto  :</label><br>
                                <?php echo "<img src='gambar_mhs/".$row['foto']."' width='70px' height='70px'/>"; ?>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="Foto" name="foto">
                            </div>
                            
                           
                            <div class="form-group col-md-12">
                                <label>Password :</label><br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                         
                            <br>
                            <input type="submit" class="btn btn-success btn-sm fa fa-save" value="Simpan" name="btnSimpan"> 
                            <a href="dashboard.php" class="btn btn-primary btn-sm">Kembali</a>
                        </div>
                    </div>   
                   </form>                      

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include "logout_modal.php";?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>