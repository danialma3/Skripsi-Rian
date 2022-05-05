<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
	if(!isset($_SESSION['nip'])){
	echo"<script>document.location.href='../'</script>";
	}
	else{unset($_SESSION['nip']);
	echo "<script>
			alert(\"Anda Berhasil Logout\");
			document.location=\"../\"
		</script>";
	}
?>