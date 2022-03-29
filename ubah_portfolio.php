<?php
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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Data Portfolio</h1>
                    </div>

                    <?php

                    include "koneksi.php";
                    
                    if(isset($_POST['btnSimpan'])) {

                        $nim             = $_SESSION['userid']; 
                        $tanggal         = date('Y-m-d'); 
                        $tahun_karya     = $_POST['tahun_karya']; 
                        $deskripsi_karya = $_POST['deskripsi_karya']; 
                        $bidang_keahlian = $_POST['bidang_keahlian']; 
                        $link_video      = $_POST['link_video']; 
                        $link_paper      = $_POST['link_paper'];  
                        $dosen_pem1      = $_POST['dosen_pem1']; 
                        $dosen_pem2      = $_POST['dosen_pem2']; 

                        // Ambil Data Foto Karya1
                        $nama_file    = $_FILES['fotok1']['name'];
                        $ukuran_file  = $_FILES['fotok1']['size'];
                        $tipe_file    = $_FILES['fotok1']['type'];
                        $tmp_file     = $_FILES['fotok1']['tmp_name'];
                        // Set path folder tempat menyimpan gambarnya
                        $path         = "foto_karya1/"."fotokarya1.".date('His', time()).".png"; 
                        $foto_karya1  = "fotokarya1.".date('His', time()).".png"; 

                        // Ambil Data Foto Karya2
                        $nama_file2    = $_FILES['fotok2']['name'];
                        $ukuran_file2  = $_FILES['fotok2']['size'];
                        $tipe_file2    = $_FILES['fotok2']['type'];
                        $tmp_file2     = $_FILES['fotok2']['tmp_name'];
                        // Set path folder tempat menyimpan gambarnya
                        $path2         = "foto_karya2/"."fotokarya2.".date('His', time()).".png"; 
                        move_uploaded_file($tmp_file2, $path2); 
                        $foto_karya2  = "fotokarya2.".date('His', time()).".png"; 

                        // Ambil Data Foto Karya3
                        $nama_file3    = $_FILES['fotok3']['name'];
                        $ukuran_file3  = $_FILES['fotok3']['size'];
                        $tipe_file3    = $_FILES['fotok3']['type'];
                        $tmp_file3     = $_FILES['fotok3']['tmp_name'];
                        // Set path folder tempat menyimpan gambarnya
                        $path3         = "foto_karya3/"."fotokarya3.".date('His', time()).".png"; 
                        move_uploaded_file($tmp_file3, $path3); 
                        $foto_karya3  = "fotokarya3.".date('His', time()).".png"; 

                        // Ambil Data Foto Karya4
                        $nama_file4    = $_FILES['fotok4']['name'];
                        $ukuran_file4  = $_FILES['fotok4']['size'];
                        $tipe_file4    = $_FILES['fotok4']['type'];
                        $tmp_file4     = $_FILES['fotok4']['tmp_name'];
                        // Set path folder tempat menyimpan gambarnya
                        $path4         = "foto_karya4/"."fotokarya4.".date('His', time()).".png"; 
                        move_uploaded_file($tmp_file4, $path4); 
                        $foto_karya4  = "fotokarya4.".date('His', time()).".png"; 

                        if(!empty($tmp_file)){ // jika upload foto
                            move_uploaded_file($tmp_file, $path); 
                            $sql = "UPDATE tb_portfolio SET foto_karya1='$foto_karya1' WHERE id_portfolio='$_GET[id]'";
                            mysqli_query($conn, $sql);
                        }
                        if(!empty($tmp_file2)){ // jika upload foto
                            move_uploaded_file($tmp_file2, $path2); 
                            $sql = "UPDATE tb_portfolio SET foto_karya2='$foto_karya2' WHERE id_portfolio='$_GET[id]'";
                            mysqli_query($conn, $sql);
                        }
                        if(!empty($tmp_file3)){ // jika upload foto
                            move_uploaded_file($tmp_file3, $path3); 
                            $sql = "UPDATE tb_portfolio SET foto_karya3='$foto_karya3' WHERE id_portfolio='$_GET[id]'";
                            mysqli_query($conn, $sql);
                        }
                        if(!empty($tmp_file4)){ // jika upload foto
                            move_uploaded_file($tmp_file4, $path4); 
                            $sql = "UPDATE tb_portfolio SET foto_karya4='$foto_karya4' WHERE id_portfolio='$_GET[id]'";
                            mysqli_query($conn, $sql);
                        }
                        if(!empty($_FILES['paper']['tmp_name'])){ // jika upload foto
                            // Ambil Data Foto paper
                            $tipe_file = $_FILES['paper']['type']; //mendapatkan mime type
                            if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
                            {
                                $nama_file_paper = trim($_FILES['paper']['name']);
                                //mengganti nama pdf
                                $nama_baru = "paper".date('His', time()).".pdf"; 
                                $file_temp = $_FILES['paper']['tmp_name']; //data temp yang di upload
                                $folder    = "file_paper"; //folder tujuan

                                $path5         = "file_paper/"."paper".date('His', time()).".pdf"; 

                                move_uploaded_file($file_temp, $path5); //fungsi upload

                                $sql = "UPDATE tb_portfolio SET file_paper='$nama_baru' WHERE id_portfolio='$_GET[id]'";

                                mysqli_query($conn, $sql);
                                
                            } else
                            {
                                ?>
                                <script>
                                    alert("File Bukan PDF!!!");
                                </script>
                                <?php
                                echo "<meta http-equiv='refresh' content='0; url=ubah_portfolio.php'>";
                            }
                        }

                        $sql = "UPDATE tb_portfolio SET tahun_karya='$tahun_karya', deskripsi_karya='$deskripsi_karya', 
                        bidang_keahlian='$bidang_keahlian', link_video='$link_video', link_paper=
                        '$link_paper', dosen_pem1='$dosen_pem1', dosen_pem2='$dosen_pem2' WHERE id_portfolio='$_GET[id]'";

                        $qryInsert = mysqli_query($conn, $sql);
                        if($qryInsert){
                            ?>
                            <script>
                                alert("Berhasil Simpan Data");
                            </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0; url=dataportfoliomhs.php'>";
                        }else {
                            ?>
                            <script>
                                alert("Gagal Tambah Data");
                            </script>
                            <?php
                            echo "<meta http-equiv='refresh' content='0; url=ubah_portfolio.php'>";
                        } 
                        

                    }

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
                                <input type="text" class="form-control" placeholder="Tahun Karya" name="tahun_karya" value="<?php echo $row['tahun_karya'];?>" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Deskripsi Karya :</label>
                                <textarea class="form-control" name="deskripsi_karya" placeholder="Deskripsi Karya" ><?php echo $row['deskripsi_karya'];?></textarea> 
                            </div>

                            <div class="form-group col-md-12">
                                <label>Bidang Keahlian :</label>
                                <input type="text" class="form-control" placeholder="Bidang Keahlian" name="bidang_keahlian" value="<?php echo $row['bidang_keahlian'];?>" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 1 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya1/".$row['foto_karya1']."' width='70px' height='70px'/>"; ?>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="Foto Karya 1" name="fotok1">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 2 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya2/".$row['foto_karya2']."' width='70px' height='70px'/>"; ?>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="Foto Karya 2" name="fotok2">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 3 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya3/".$row['foto_karya3']."' width='70px' height='70px'/>"; ?>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="Foto Karya 3" name="fotok3">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Foto Karya 4 (format JPG/PNG/JPEG):</label><br>
                                <?php echo "<img src='foto_karya4/".$row['foto_karya4']."' width='70px' height='70px'/>"; ?>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="Foto Karya 4" name="fotok4">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>File Paper (format PDF):</label><br>
                                File PDF : <a href="file_paper/<?php echo $row['file_paper'];?>" target="_blank"><?php echo $row['file_paper'];?></a>
                                <br>
                                *jika tidak berubah, kosongkan saja.
                                <input type="file" class="form-control" placeholder="File Paper" name="paper">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Link Video :</label>
                                <input type="text" class="form-control" placeholder="Link Video" name="link_video" value="<?php echo $row['link_video'];?>" required="">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Link Paper :</label>
                                <input type="text" class="form-control" placeholder="Link Paper" name="link_paper" value="<?php echo $row['link_paper'];?>" required="">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Dosen Pembimbing 1 :</label>
                                <input type="text" class="form-control" placeholder="Dosen Pembimbing 1" value="<?php echo $row['dosen_pem1'];?>" name="dosen_pem1" required="">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label>Dosen Pembimbing 2 :</label>
                                <input type="text" class="form-control" placeholder="Dosen Pembimbing 2" value="<?php echo $row['dosen_pem2'];?>" name="dosen_pem2" required="">
                            </div>
                        
                            <br>
                            <input type="submit" class="btn btn-success btn-sm" value="Simpan" name="btnSimpan"> 
                            <a href="dataportfoliomhs.php" class="btn btn-primary btn-sm">Kembali</a>
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