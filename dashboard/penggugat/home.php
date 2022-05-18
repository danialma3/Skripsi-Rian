<?php
if (!isset($_SESSION['nip'])) {
  echo "<script>document.location.href='../index.php'</script>";
} else {
  include "../../koneksi.php";
  $q = mysqli_query($connect, "SELECT * FROM tb_pengguna where nip='" . $_SESSION['nip'] . "'");
  while ($d = mysqli_fetch_array($q)) {
    $nip = $d['nip'];
    $nama = $d['nama_pengguna'];
    $username = $d['username'];
  }
}

?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row top_tiles">
          <center>
            <div class="product_price">
              <h1 align="center">Hallo, <?= $nama; ?> !!! Silahkan Tambah Gugatan Dengan Terlebih Dahulu Mengisi Biodata Penggugat</h1>
            </div>
            <small><i class="fa fa-check"></i> You Logged As User</small><br>
            <h3><small>Sistem Informasi Kepaniteraan Hukum <br>Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</small></h3><br>Silahkan kelola data - data anda<br>Selamat bekerja, jangan lupa logout setelah selesai menggunakan aplikasi ini
            <hr>
          </center>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <center>
              <h2>Isikan Data Penggugat: <small><?php echo $nama; ?></small></h2>
            </center>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <form id="demo-form2" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_p" required="required" placeholder="Isikan Nama Penggugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Penggugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pekerjaan_p" required="required" placeholder="Isikan Pekerjaan Penggugat" class="form-control col-md-7 col-xs-12">
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
                  <input type="text" name="tmp_lahir_p" required="required" placeholder="Isikan Tempat Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_lahir_p" required="required" placeholder="Isikan Tanggal Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Tinggal<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="alamat_p" required="required" placeholder="Isikan Tempat Tinggal" class="form-control col-md-7 col-xs-12">
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
        if (isset($_POST['simpan'])) {

          $nama_p = $_POST['nama_p'];
          $pekerjaan_p = $_POST['pekerjaan_p'];
          $tmp_lahir_p = $_POST['tmp_lahir_p'];
          $tgl_lahir_p = $_POST['tgl_lahir_p'];
          $kelamin = $_POST['kelamin'];
          $alamat_p = $_POST['alamat_p'];
          $agama = $_POST['agama'];
          $pendidikan = $_POST['pendidikan'];
          $warganegara = $_POST['warganegara'];
          $pengacara = $_POST['pengacara'];
          $hasil = mysqli_query($connect, "INSERT INTO tb_penggugat (nip, nama_p, pekerjaan_p,tmp_lahir_p,tgl_lahir_p,kelamin,alamat_p,agama,pendidikan,warganegara,pengacara) values ('$nip','$nama_p', '$pekerjaan_p','$tmp_lahir_p','$tgl_lahir_p','$kelamin','$alamat_p','$agama','$pendidikan','$warganegara','$pengacara')");
          if ($hasil) {
            echo '<script language="javascript">alert("Success"); document.location="index.php";</script>';
          } else {
            echo '<script language="javascript">alert("Gagal"); document.location="index.php";</script>';
          }
        }
      }
      ?>

    </div>
  </div>
</div>