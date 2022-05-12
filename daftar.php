<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Kepaniteraan Hukum Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <center>
      <h3 style="margin-top: 20px;"><b>Pengajuan Sidang Perkara</b>
    </center>
    <br>
    <div class="row">
      <form id="demo-form2" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="nama_penggugat" required="required" placeholder="Isikan Nama Anda" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Perkara<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select name="jabatan" required="required" class="form-control col-md-7 col-xs-12">
              <option disabled selected>Silahkan Pilih Jenis Perkara</option>
              <option value="Penggugat">Perdata</option>
              <option value="Jaksa">Pidana</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="username" required="required" placeholder="Isikan Nama Username Anda" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" name="password1" required="required" placeholder="Password" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi Password<span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" name="password2" required="required" placeholder="Ulangi Password" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a class="btn btn-danger" herf="index.php">Batal</a>
          <button type="submit" name="simpan" class="btn btn-primary">Daftar</button>
        </div>
    </div>
    </form>
  </div>
  <div class="col-md-12">
    <div>
      <p align="center">
        <hr>©2020 All Rights Reserved Developed By : Subhan Febrianto Privacy and Terms
      </p>
    </div>
  </div>
</body>

</html>
<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];
  $jabatan = $_POST["jabatan"];
  if ($password1 == $password2) {
    $nama_penggugat = $_POST['nama_penggugat'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $hasil = mysqli_query($connect, "INSERT INTO tb_pengguna (nama_pengguna, jabatan, username, password) values ('$nama_penggugat', '$jabatan', '$username', '$password1')");
    if ($hasil) {
      echo '<script language="javascript">alert("Success"); document.location="index.php";</script>';
    } else {
      echo '<script language="javascript">alert("Gagal"); document.location="daftar.php";</script>';
    }
  } elseif ($password1 != $password2) {
    echo '<script language="javascript">alert("Password tidak sama"); document.location="daftar.php";</script>';
  }
}
?>