<?php 
  $id=$_GET['nip'];
  $query=mysqli_query($connect, "SELECT * FROM tb_pengguna WHERE nip=$id");
  while($d=mysqli_fetch_array($query)) { ?><div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Ubah Profile :  <small><?php echo $nama; ?></small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content"><br/>
      <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text"  required="required" value="<?php echo $d['nama_pengguna'] ?>" name="nama_pengguna" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text"  required="required" value="<?php echo $d['username'] ?>" name="username" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" name="password" required="required" value="<?php echo $d['password'] ?>" placeholder="Isikan password baru anda disini" class="form-control col-md-7 col-xs-12 form-password"><br>
            <input type="checkbox" class="form-checkbox"> Perlihatkan Password
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <input type="reset" class="btn btn-danger" value="Batal">
            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Perubahan">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  if(isset($_POST['simpan'])){
    $nama_pengguna= $_POST['nama_pengguna'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
      $hasil = mysqli_query($connect, "UPDATE tb_pengguna SET nama_pengguna='$nama_pengguna', username='$username', password='$password' WHERE nip='$id'");
      if ($hasil) {
          echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=home\"
        </script>";
      }
      else {
          echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=home\"
        </script>";
      }
  }
}