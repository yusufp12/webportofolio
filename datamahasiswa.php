<?php
error_reporting(0);
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
                        <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa </h1>
                    </div>

                	<!-- DataTales Example -->
                    <div class="card shadow mb-12">
                         <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Email</th>
                                            <th>Telepon(WA)</th>
                                            <th>Instagram</th>
                                            <th>Foto</th>
                                            <th>Alamat</th> 
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include "koneksi.php";

                                        $sql   ="SELECT * FROM tb_mhs b ORDER BY b.nim DESC";
                                        $hasil = mysqli_query($conn, $sql);

                                        $no=1; // deklarasi variable nomor otomatis
                                        while ($data = mysqli_fetch_array($hasil)){
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim'];?></td>
                                            <td><?php echo $data['nama_mhs'];?></td>
                                            <td><?php echo $data['email'];?></td>
                                            <td><?php echo $data['telepon_wa'];?></td>
                                            <td><?php echo $data['ig'];?></td>
                                            <td><?php echo "<img src='gambar_mhs/".$data['foto']."' width='70px' height='70px'/>"; ?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                       

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

    <!-- Coding Hapus -->
	  <script>
        function confirmDelete(delUrl) {
          if (confirm("Yakin Akan Hapus Data ?")) {
           document.location = delUrl;
          }
        }
      </script>

        <?php

        	$aksi = $_GET['aksi'];
            
            if($aksi =='hapus'){     

            	$idnya = $_GET['id'];     
      
                $sql = "DELETE FROM tb_karyawan WHERE id_karyawan ='$idnya'";
                $qryDelete = mysqli_query($conn, $sql);

                if ($qryDelete){
                	?>
                    <script type="text/javascript">
                            alert("Data sukses dihapus");
                            window.location.href = "datakaryawan.php";
                    </script>
                	<?php                    
                }else {
                	?>
                    <script type="text/javascript">
                            alert("Data Gagal dihapus");
                            window.location.href = "datakaryawan.php";
                    </script>
                	<?php 
                }
            }
        ?>

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