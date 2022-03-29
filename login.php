<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql   = "SELECT * FROM tb_mhs WHERE nim='$username' AND password='$password'";
$hasil = mysqli_query($conn, $sql);
$row   = mysqli_num_rows($hasil); // cek jumlah data
$check = mysqli_fetch_array($hasil); // ambil data per row

if($row > 0){
	$_SESSION['nama_user'] = $check['nama_mhs'];
	$_SESSION['userid']    = $check['nim'];
	$_SESSION['foto']      = $check['foto'];
	$_SESSION['status']    = 'login';
	$_SESSION['level']     = 'Mhs';

	header("location:dashboard.php");	
}else {

	$sql   = "SELECT * FROM tb_dosen WHERE nidn='$username' AND password='$password'";
	$hasil = mysqli_query($conn, $sql);
	$row   = mysqli_num_rows($hasil); // cek jumlah data
	$check = mysqli_fetch_array($hasil); // ambil data per row

	if($row > 0){
		$_SESSION['nama_user'] = $check['nama_dosen'];
		$_SESSION['userid']    = $check['nidn'];
		$_SESSION['status']    = 'login';

		header("location:dashboard.php");	
	}else {
		?>
		<script>
			alert("Maaf, Anda Gagal Login");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
}

?>

