<?php
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Jakarta');
ini_set('date.timezone', 'Asia/Jakarta');
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    

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
                        <h1 class="h3 mb-0 text-gray-800">Detail Data Portfolio</h1>
                    </div>

                    <?php

                    include "koneksi.php";

                    //menampilan data
                    $sql   ="SELECT * FROM tb_portfolio WHERE id_portfolio ='$_GET[id]'";
                    $hasil = mysqli_query($conn, $sql);
                    $row   = mysqli_fetch_array($hasil);

                    ?>
                   <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card">
                        <div class="card-body text-dark">

                            <div class="form-group col-md-12">
                                <label>Tahun Karya :</label>
                                <input type="text" class="form-control" placeholder="Tahun Karya" name="tahun_karya" value="<?php echo $row['tahun_karya'];?>" required="" readonly>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Deskripsi Karya :</label>
                                <textarea class="form-control" name="deskripsi_karya" placeholder="Deskripsi Karya" readonly><?php echo $row['deskripsi_karya'];?></textarea> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Bidang Keahlian :</label>
                                <input type="text" class="form-control" placeholder="Bidang Keahlian" name="bidang_keahlian" readonly value="<?php echo $row['bidang_keahlian'];?>" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 1 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya1/".$row['foto_karya1']."' width='70px' height='70px'/>"; ?>
                                <br> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 2 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya2/".$row['foto_karya2']."' width='70px' height='70px'/>"; ?>
                                <br> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 3 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya3/".$row['foto_karya3']."' width='70px' height='70px'/>"; ?>
                                <br> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 4 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya4/".$row['foto_karya4']."' width='70px' height='70px'/>"; ?>
                                <br> 
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>File Paper (format PDF):</label><br>
                                File PDF : <a href="file_paper/<?php echo $row['file_paper'];?>" target="_blank"><?php echo $row['file_paper'];?></a>
                                <br> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Link Video :</label><br>
                                <a href="<?php echo $row['link_video'];?>" target="_blank"><?php echo $row['link_video'];?></a>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Link Paper :</label><br>
                                <a href="<?php echo $row['link_paper'];?>" target="_blank"><?php echo $row['link_paper'];?></a>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Dosen Pembimbing 1 :</label>
                                <input type="text" class="form-control" readonly placeholder="Dosen Pembimbing 1" value="<?php echo $row['dosen_pem1'];?>" name="dosen_pem1" required="">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Dosen Pembimbing 2 :</label>
                                <input type="text" class="form-control" readonly placeholder="Dosen Pembimbing 2" value="<?php echo $row['dosen_pem2'];?>" name="dosen_pem2" required="">
                            </div>
                        
                            <br> 
                            <div class="form-group col-md-12">
                                <button type="button" onclick="history.back();" class="btn btn-primary btn-lg">Kembali</button>
                            </div>
                            
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