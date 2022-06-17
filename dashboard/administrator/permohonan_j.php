<?php
$act = (isset($_GET['act']) ? strtolower($_GET['act']) : NULL); //$_GET[act];
if ($act == 'del') {
  $id = $_GET['id_permohonan'];
  $q = mysqli_query($connect, "DELETE FROM tb_permohonan WHERE id_permohonan='$id'");
  echo "<script>document.location.href='index.php?menu=permohonan'</script>";
} elseif ($act == 'edit') {
  $id = $_GET['id_permohonan'];
  $q = mysqli_query($connect, "SELECT * FROM tb_permohonan WHERE id_permohonan='$id'");
  $data = mysqli_fetch_array($q);

?>



  <?php
  if (isset($_POST['edit'])) {
    $nama_permohonan = $_POST['nama_permohonan'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelamin = $_POST['kelamin'];
    $tmp_tinggal = $_POST['tmp_tinggal'];
    $agama = $_POST['agama'];
    $pendidikan = $_POST['pendidikan'];
    $warganegara = $_POST['warganegara'];
    $pengacara = $_POST['pengacara'];
    $hasil = mysqli_query($connect, "UPDATE tb_permohonan SET nama_permohonan='$nama_permohonan', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', kelamin='$kelamin', tmp_lahir='$tmp_lahir', agama='$agama',pendidikan='$pendidikan',warganegara='$warganegara',pengacara='$pengacara' WHERE id_permohonan='$id'");
    if ($hasil) {
      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
    } else {
      echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=permohonan";</script>';
    }
  }
} else { ?>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-user"></i> Data permohonan
          <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a>
        </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Jaksa Yang Menggugat</th>
                <th>Jenis Pengajuan</th>
                <th>Perihal Perkara</th>
                <th>Tanggal Lapor</th>
                <th>nama_tergugat</th>
                <th>Pekerjaan Tergugat</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat Tergugat</th>
                <th>Nama Hakim</th>
                <th>Tanggal Sidang</th>
                <th>Tanggal Putusan</th>
                <th>Biaya</th>
                <th>Hasil</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa");
              while ($d = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $d['nama_j']; ?></td>
                  <td><?php echo $d['jenis_pengajuan']; ?></td>
                  <td><?php echo $d['perihal_perkara']; ?></td>
                  <td><?php echo $d['tgl_lapor']; ?></td>
                  <td><?php echo $d['nama_t']; ?></td>
                  <td><?php echo $d['pekerjaan_t']; ?></td>
                  <td><?php echo $d['tempat_lahir_t']; ?>, <?php echo $d['tgl_lahir_t']; ?></td>
                  <td><?php echo $d['alamat_t']; ?></td>
                  <?php if ($d['id_hakim']) { ?>
                    <td align="center">
                      <?php
                      $h = $d['id_hakim'];
                      $hakim = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim = $h ");
                      while ($data = mysqli_fetch_array($hakim)) {
                        echo $data['nama_hakim'];
                      } ?>
                      <?php ?>
                      <br>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editHakim-<?= $d['id_permohonan'] ?>">
                        Ubah Hakim
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editHakim-<?= $d['id_permohonan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih Hakim</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="text" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hakim<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_hakim" required="required" class="form-control col-md-7 col-xs-12">
                                      <?php
                                      $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_hakim");
                                      while ($data_panitera = mysqli_fetch_array($cek_panitera)) { ?>
                                        <option value="<?php echo $data_panitera['id_hakim']; ?>"> <?php echo $data_panitera['nama_hakim']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_hakim" class="btn btn-primary">Kirim</button>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </td>
                  <?php } else { ?>
                    <td align="center">
                      Data Hakim Masih Kosong
                      <br>
                      <!-- Button trigger modal -->
                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahHakim-<?= $d["id_permohonan"]; ?>">
                        Isikan Hakim
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="tambahHakim-<?= $d["id_permohonan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih Hakim</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="text" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hakim <span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_hakim" required="required" class="form-control col-md-7 col-xs-12">
                                      <?php
                                      $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_hakim");
                                      while ($data_panitera = mysqli_fetch_array($cek_panitera)) { ?>
                                        <option value="<?php echo $data_panitera['id_hakim']; ?>"> <?php echo $data_panitera['nama_hakim']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_hakim" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </td>
                  <?php } ?>
                  <!-- edit Hakim -->
                  <?php
                  if (isset($_POST['isi_hakim']));
                  if (isset($_POST['isi_hakim'])) {
                    $id_hakim = $_POST['id_hakim'];
                    $id_permohonan = $_POST['id_permohonan'];
                    // var_dump($id_permohonan);
                    // die;
                    $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET id_hakim = $id_hakim WHERE id_permohonan = $id_permohonan");
                    if ($hasil) {
                      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
                    } else {
                      echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_j";</script>';
                    }
                  }
                  ?>
                  <td><?php echo $d['tgl_sidang']; ?></td>
                  <td><?php echo $d['tgl_putusan']; ?></td>
                  <td><?php echo $d['biaya']; ?></td>
                  <td><?php echo $d['hasil']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Tambah Data Permohonan</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <form enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Permohon<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="no_pemohon" required="required" placeholder="Isikan Nomor Permohonan" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="jenis_permohonan" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="Hak Asuh Anak">Hak Asuh Anak</option>
                        <option value="Pergantian Nama">Pergantian Nama</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pemohon<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nama_pemohon" required="required" placeholder="Isikan Nama Pemohon" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Pemohon<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="tempat_pemohon" required="required" placeholder="Isikan Tempat Pemohon" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Termohon<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nama_termohon" required="required" placeholder="Isikan Nama Termohon" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Baru </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nama_baru" required="required" placeholder="Isikan Nama Baru" class="form-control col-md-7 col-xs-12">
                      <i>Hanya Diisi Jika Jenis Permohonan Pergantian Nama</i>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Daftar<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="tgl_daftar" required="required" placeholder="Isikan Tanggal Daftar" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Majelis<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nama_majelis" required="required" placeholder="Isikan Nama Majelis" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Panitera <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="id_panitera" required="required" class="form-control col-md-7 col-xs-12">
                        <?php
                        $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_panitera");
                        while ($data_panitera = mysqli_fetch_array($cek_panitera)) { ?>
                          <option value="<?php echo $data_panitera['id_panitera']; ?>"> <?php echo $data_panitera['nama_panitera']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Sidang<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="tgl_sidang" required="required" placeholder="Isikan Tanggal Sidang" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Putusan<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="tgl_putusan" required="required" placeholder="Isikan Tanggal Putusan" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Akta<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="akta" required="required" placeholder="Isikan Akta" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="number" name="biaya" required="required" placeholder="Isikan Biaya" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <input type="reset" class="btn btn-danger" value="Batal">
                      <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Permohonan">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php



        if (isset($_POST['simpan'])) {
          $no_pemohon = $_POST['no_pemohon'];
          $jenis_permohonan = $_POST['jenis_permohonan'];
          $nama_pemohon = $_POST['nama_pemohon'];
          $tempat_pemohon = $_POST['tempat_pemohon'];
          $nama_termohon = $_POST['nama_termohon'];
          $nama_baru = $_POST['nama_baru'];
          $tgl_daftar = $_POST['tgl_daftar'];
          $nama_majelis = $_POST['nama_majelis'];
          $id_panitera = $_POST['id_panitera'];
          $tgl_sidang = $_POST['tgl_sidang'];
          $tgl_putusan = $_POST['tgl_putusan'];
          $akta = $_POST['akta'];
          $biaya = $_POST['biaya'];

          if ($jenis_permohonan == "Pergantian Nama") {
            $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan (no_pemohon,jenis_permohonan,nama_pemohon,tempat_pemohon,nama_termohon,nama_baru,tgl_daftar,nama_majelis,id_panitera,tgl_sidang,tgl_putusan,akta,biaya) values ('$no_pemohon','$jenis_permohonan','$nama_pemohon','$tempat_pemohon','$nama_termohon','$nama_baru','$tgl_daftar','$nama_majelis','$id_panitera','$tgl_sidang','$tgl_putusan','$akta','$biaya')");
            echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
          } else {
            $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan (no_pemohon,jenis_permohonan,nama_pemohon,tempat_pemohon,nama_termohon,tgl_daftar,nama_majelis,id_panitera,tgl_sidang,tgl_putusan,akta,biaya) values ('$no_pemohon','$jenis_permohonan','$nama_pemohon','$tempat_pemohon','$nama_termohon','$tgl_daftar','$nama_majelis','$id_panitera','$tgl_sidang','$tgl_putusan','$akta','$biaya')");

            echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
          }
        }

        ?>
    </div>
  </div>
</div>