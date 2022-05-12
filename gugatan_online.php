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
      <center><h3 style="margin-top: 20px;"><b>Pengajuan Sidang Perkara</b></center>
      <br>
    <div class="row"><form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_penggugat" required="required" placeholder="Isikan Nama Penggugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kelamin" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_lahir" required="required" placeholder="Isikan Tempat Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_lahir" required="required" placeholder="Isikan Tanggal Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Tinggal<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_tinggal" required="required" placeholder="Isikan Tempat Tinggal" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="agama" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                  </select>
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pendidikan" required="required" placeholder="Isikan Pendidikan" class="form-control col-md-7 col-xs-12">
                </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga Negara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="warganegara" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div>  
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengajuan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_sidang" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    include "koneksi.php";
                    $cek = mysqli_query($connect, "SELECT * FROM tb_sidang");
                    while ($data = mysqli_fetch_array($cek)) { ?>
                    <option value="<?php echo $data['id_sidang']; ?>"><?php echo $data['ket_sidang']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>           
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengacara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pengacara" required="required" placeholder="Isikan Nama Pengacara" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Penggugat">
                </div>
              </div>
              </form>
    </div>
    <div class="col-md-12">
        <div><p align="center"><hr>©2020 All Rights Reserved Developed By : Subhan Febrianto Privacy and Terms</p></div>
    </div>
</body>
</html>
<?php
  include "koneksi.php";
    if(isset($_POST['simpan'])){
          $nama_penggugat=$_POST['nama_penggugat'];
          $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
          $id_sidang = $_POST['id_sidang'];
          $date = date('now');
            $hasil = mysqli_query($connect, "INSERT INTO tb_penggugat (nama_penggugat,tmp_lahir,tgl_lahir,kelamin,tmp_tinggal,agama,pendidikan,warganegara,pengacara,id_sidang,tgl) values ('$nama_penggugat','$tmp_lahir','$tgl_lahir','$kelamin','$tmp_tinggal','$agama','$pendidikan','$warganegara','$pengacara','$id_sidang','$date')");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php";</script>';
              }
    }
?>