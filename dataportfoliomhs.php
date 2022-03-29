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
                        <h1 class="h3 mb-0 text-gray-800">Data Portfolio</h1>
                    </div>

                	<!-- DataTales Example -->
                    <div class="card shadow mb-12">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="tambah_portfolio.php" class="btn btn-primary">Tambah Data</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Tanggal</th>
                                            <th>Tahun Karya</th>
                                            <th>Deskripsi Karya</th>
                                            <th>Bidang Keahlian</th>
                                            <th>Sertifikat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

										<?php
										include "koneksi.php";

										$sql   ="SELECT * FROM tb_portfolio a inner join tb_mhs b on a.nim=b.nim where b.nim='$_SESSION[userid]' ORDER BY a.id_portfolio DESC";
										$hasil = mysqli_query($conn, $sql);

										$no=1; // deklarasi variable nomor otomatis
										while ($data = mysqli_fetch_array($hasil)){
										?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim'];?></td>
                                            <td><?php echo $data['nama_mhs'];?></td>
                                            <td><?php echo $data['tanggal'];?></td> 
                                            <td><?php echo $data['tahun_karya'];?></td> 
                                            <td><?php echo $data['deskripsi_karya'];?></td> 
                                            <td><?php echo $data['bidang_keahlian'];?></td>  
                                            <td><a href="<?php echo "sertifikat_mhs/".$data['sertifikat'].""; ?>" target="_blank"><?php echo "<img src='sertifikat_mhs/".$data['sertifikat']."' width='70px' height='70px'/>"; ?></a></td>
                                            <td>
                                            	<div class="form-button-action">
													<a href="detail_portfolio.php?id=<?php echo $data['id_portfolio']; ?>" data-toggle="tooltip" title="Detail" class="btn btn-link btn-warning" data-original-title="Detail"><i class="fa fa-list"></i></a>&nbsp;
													<a href="ubah_portfolio.php?id=<?php echo $data['id_portfolio']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-link btn-success" data-original-title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
													<a href="javascript:confirmDelete('dataportfoliomhs.php?id=<?php echo $data['id_portfolio']; ?>&aksi=hapus')" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">&nbsp;<i class="fa fa-times"></i>&nbsp;</a>
												</div>
                                            </td>
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
                
                //menampilan data
                $sql   ="SELECT * FROM tb_portfolio WHERE id_portfolio ='$idnya'";
                $hasil = mysqli_query($conn, $sql);
                $row   = mysqli_fetch_array($hasil);

                unlink("foto_karya1/".$row['foto_karya1']); 
                unlink("foto_karya2/".$row['foto_karya2']); 
                unlink("foto_karya3/".$row['foto_karya3']); 
                unlink("foto_karya4/".$row['foto_karya4']); 
                unlink("file_paper/".$row['file_paper']); 

                $sql = "DELETE FROM tb_portfolio WHERE id_portfolio ='$idnya'";
                $qryDelete = mysqli_query($conn, $sql);

                if ($qryDelete){
                	?>
                    <script type="text/javascript">
                            alert("Data sukses dihapus");
                            window.location.href = "dataportfoliomhs.php";
                    </script>
                	<?php                    
                }else {
                	?>
                    <script type="text/javascript">
                            alert("Data Gagal dihapus");
                            window.location.href = "dataportfoliomhs.php";
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