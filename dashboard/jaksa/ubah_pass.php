<?php
$id = $_GET['nip'];
$query = mysqli_query($connect, "SELECT * FROM tb_pengguna WHERE nip=$id");
while ($d = mysqli_fetch_array($query)) { ?>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Account : <small><?php echo $nama; ?></small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"><br />
        <form id="demo-form2" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Lengkap</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" value="<?php echo $d['nama_pengguna'] ?>" name="nama_pengguna" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" value="<?php echo $d['username'] ?>" name="username" class="form-control col-md-7 col-xs-12">
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
  $query1 = mysqli_query($connect, "SELECT * FROM tb_jaksa WHERE nip=$id");
  while ($c = mysqli_fetch_array($query1)) { ?>


    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <center>
            <h2>Ubah Profile : <small><?php echo $nama; ?></small></h2>
          </center>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"><br />
          <form id="demo-form2" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jaksa<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nama_j" required="required" value="<?php echo $c['nama_j'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pangkat dan Golongan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="pangkat_j" required="required" value="<?php echo $c['pangkat_j'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nip_j" required="required" value="<?php echo $c['nip_j'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Kejaksaan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="asal_kejaksaan" required="required" value="<?php echo $c['asal_kejaksaan'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Kejaksaan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="alamat_kejaksaan" required="required" value="<?php echo $c['alamat_kejaksaan'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="reset" class="btn btn-danger" value="Batal">
                <input type="submit" name="ubah_j" class="btn btn-primary" value="Simpan Perubahan">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
    if (isset($_POST['ubah_j'])) {
      if (isset($_POST['ubah_j'])) {
        $nama_j = $_POST['nama_j'];
        $pangkat_j = $_POST['pangkat_j'];
        $nip_j = $_POST['nip_j'];
        $asal_kejaksaan = $_POST['asal_kejaksaan'];
        $alamat_kejaksaan = $_POST['alamat_kejaksaan'];
        $hasil = mysqli_query($connect, "UPDATE tb_jaksa SET nama_j='$nama_j', pangkat_j='$pangkat_j', nip_j='$nip_j', asal_kejaksaan='$asal_kejaksaan', alamat_kejaksaan='$alamat_kejaksaan' WHERE nip='$id'");
        if ($hasil) {
          echo '<script language="javascript">alert("Success"); document.location="index.php";</script>';
        } else {
          echo '<script language="javascript">alert("Gagal"); document.location="index.php";</script>';
        }
      }
    }
    ?>
<?php
    if (isset($_POST['simpan'])) {
      $nama_pengguna = $_POST['nama_pengguna'];
      $username     = $_POST['username'];
      $password     = $_POST['password'];
      $hasil = mysqli_query($connect, "UPDATE tb_pengguna SET nama_pengguna='$nama_pengguna', username='$username', password='$password' WHERE nip='$id'");
      if ($hasil) {
        echo "<script>
          alert(\"Success!\");
          document.location=\"index.php?menu=home\"
        </script>";
      } else {
        echo "<script>
          alert(\"Gagal\");
          document.location=\"index.php?menu=home\"
        </script>";
      }
    }
  }
}
