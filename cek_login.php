<?php
include "koneksi.php";
$user = $_POST['username'];
$pw = $_POST['password'];
$q = mysqli_query($connect, "SELECT * FROM tb_pengguna WHERE username='$user' and password='$pw'");
$hit = mysqli_num_rows($q);
if ($hit > 0) {
	while ($d = mysqli_fetch_array($q)) {
		$id = $d['nip'];
		$jabatan = $d['jabatan'];
	}
	if ($jabatan == "administrator") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/administrator/index.php?menu=home';</script>";
	} elseif ($jabatan == "hakim") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/hakim/index.php?menu=home';</script>";
	} elseif ($jabatan == "pimpinan") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/pimpinan/index.php?menu=home';</script>";
	} elseif ($jabatan == "penggugat") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/penggugat/index.php?menu=home';</script>";
	} elseif ($jabatan == "jaksa") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/jaksa/index.php?menu=home';</script>";
	} elseif ($jabatan == "Jaksa") {
		session_start();
		$_SESSION['nip'] = "$id";
		echo "<script>window.location.href='dashboard/jaksa/index.php?menu=home';</script>";
	} else {
		echo "<script>
		alert('Maaf username dan password anda salah! Silahkan coba lagi');
		window.location.href='index.php';
		</script>";
	}
}
