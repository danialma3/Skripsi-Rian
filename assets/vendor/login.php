<?php 

session_start();
require 'lib/koneksi.php';

$nama_pengguna  = $_POST['pegguna'];
$kata_sandi = $_POST['sandi'];

$query = mysqli_query($conn, "SELECT * FROM usertb WHERE nama_pengguna = '$nama_pengguna' AND kata_sandi = '$kata_sandi' ");
$jmlbaris = mysqli_num_rows($query);
if ($jmlbaris > 0) {
	$row = mysqli_fetch_assoc($query);
	$_SESSION['userid'] = $row['userid']; 
    $_SESSION['level']  = $row['level'];
    echo "berhasil";
}
else {
    
    // header("location:index.php?pesan=gagal");
    echo "gagal";
}

 ?>