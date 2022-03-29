<?php
  session_start();
  session_destroy(); 
  echo "<meta http-equiv='refresh' content='0; url=index.php'>";
  echo "<script>window.alert('Logout Berhasil');
        window.location=('index.php')</script>";
?>