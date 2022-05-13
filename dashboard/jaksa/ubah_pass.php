<?php
$id = $_GET['nip'];
$query = mysqli_query($connect, "SELECT * FROM tb_pengguna WHERE nip=$id");
while ($d = mysqli_fetch_array($query)) { ?><div class="col-md-12 col-sm-12 col-xs-12">
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
              <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Perubahan">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['simpan'])) {
    $nama_penggugat = $_POST['nama_penggugat'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelamin = $_POST['kelamin'];
    $tmp_tinggal = $_POST['tmp_tinggal'];
    $agama = $_POST['agama'];
    $pendidikan = $_POST['pendidikan'];
    $warganegara = $_POST['warganegara'];
    $pengacara = $_POST['pengacara'];
    $id_sidang = $_POST['id_sidang'];
    $date = date("Y-m-d");
    $hasil = mysqli_query($connect, "INSERT INTO tb_penggugat (nip, nama_penggugat,tmp_lahir,tgl_lahir,kelamin,tmp_tinggal,agama,pendidikan,warganegara,pengacara,id_sidang,tgl) values ('$nip','$nama_penggugat','$tmp_lahir','$tgl_lahir','$kelamin','$tmp_tinggal','$agama','$pendidikan','$warganegara','$pengacara','$id_sidang','$date')");
    if ($hasil) {
      echo '<script language="javascript">alert("Success"); document.location="index.php";</script>';
    } else {
      echo '<script language="javascript">alert("Gagal"); document.location="index.php";</script>';
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
