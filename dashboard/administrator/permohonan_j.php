<?php
$act = (isset($_GET['act']) ? strtolower($_GET['act']) : NULL); //$_GET[act];
if ($act == 'del') {
  $id = $_GET['id_permohonan'];
  $q = mysqli_query($connect, "DELETE FROM tb_permohonan_j WHERE id_permohonan='$id'");
  if ($q) {
    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
  } else {
    echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=permohonan_j";</script>';
  }
  echo "<script>document.location.href='index.php?menu=permohonan_j'</script>";
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
                <th>Hasil</th>
                <th>Aksi</th>
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


                  <!-- HAKIM -->
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
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
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
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
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
                  <!-- END HAKIM -->



                  <!-- TANGGAL SIDANG -->
                  <?php if ($d['tgl_sidang']) { ?>
                    <td align="center">
                      <?php echo $d['tgl_sidang']; ?>
                      <br>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editsidang-<?= $d['id_permohonan'] ?>">
                        Ubah Tanggal Sidang
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editsidang-<?= $d['id_permohonan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal Sidang</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Sidang<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_sidang" required="required" value="<?= $d['tgl_sidang'] ?>" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_sidang" class="btn btn-primary">Kirim</button>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </td>
                  <?php } else { ?>
                    <td align="center">
                      Tanggal Kosong
                      <br>
                      <!-- Button trigger modal -->
                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahsidang-<?= $d["id_permohonan"]; ?>">
                        Isikan Tanggal
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="tambahsidang-<?= $d["id_permohonan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tanggal Putusan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Sidang<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_sidang" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_sidang" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </td>
                  <?php } ?>
                  <!-- edit TANGGAL SIDANG -->
                  <?php
                  if (isset($_POST['isi_sidang']));
                  if (isset($_POST['isi_sidang'])) {
                    $tgl_sidang = $_POST['tgl_sidang'];
                    $id_permohonan = $_POST['id_permohonan'];
                    // var_dump($tgl_sidang);
                    // die;
                    $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET tgl_sidang = '$tgl_sidang' WHERE id_permohonan = $id_permohonan");
                    if ($hasil) {
                      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
                    } else {
                      echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_j";</script>';
                    }
                  }
                  ?>
                  <!-- END TANGGAL SIDANG -->




                  <!-- TANGGAL PUTUSAN -->
                  <?php if ($d['tgl_putusan']) { ?>
                    <td align="center">
                      <?php echo $d['tgl_putusan']; ?>
                      <br>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPutusan-<?= $d['id_permohonan'] ?>">
                        Ubah Tanggal Putusan
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editPutusan-<?= $d['id_permohonan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal Putusan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Putusan<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_putusan" required="required" value="<?= $d['tgl_putusan'] ?>" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_putusan" class="btn btn-primary">Kirim</button>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </td>
                  <?php } else { ?>
                    <td align="center">
                      Tanggal Kosong
                      <br>
                      <!-- Button trigger modal -->
                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahsidang-<?= $d["id_permohonan"]; ?>">
                        Isikan Tanggal
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="tambahsidang-<?= $d["id_permohonan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tanggal Putusan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Putusan<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_putusan" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_putusan" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </td>
                  <?php } ?>
                  <!-- edit TANGGAL PUTUSAN -->
                  <?php
                  if (isset($_POST['isi_putusan']));
                  if (isset($_POST['isi_putusan'])) {
                    $tgl_putusan = $_POST['tgl_putusan'];
                    $id_permohonan = $_POST['id_permohonan'];
                    // var_dump($tgl_sidang);
                    // die;
                    $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET tgl_putusan = '$tgl_putusan' WHERE id_permohonan = $id_permohonan");
                    if ($hasil) {
                      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
                    } else {
                      echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_j";</script>';
                    }
                  }
                  ?>
                  <!-- END TANGGAL PUTUSAN -->


                  <!-- HASIL -->

                  <?php if ($d['hasil']) { ?>
                    <td align="center">
                      <?php echo $d['hasil']; ?>
                      <br>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editHasil-<?= $d['id_permohonan'] ?>">
                        Ubah Hasil Sidang
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editHasil-<?= $d['id_permohonan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Isi Hasil Persidangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Hasil SIdang<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="hasil" required="required" value="<?= $d['hasil'] ?>" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_hasil" class="btn btn-primary">Kirim</button>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                    </td>
                  <?php } else { ?>
                    <td align="center">
                      Hasil Kosong
                      <br>
                      <!-- Button trigger modal -->
                      <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahHasil-<?= $d["id_permohonan"]; ?>">
                        Iskan Hasil Sidang
                      </a>

                      <!-- Modal -->
                      <div class="modal fade" id="tambahHasil-<?= $d["id_permohonan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Hasil</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form enctype="multipart/form-data" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Hasil Sidang<span class="required">*</span></label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="hasil" required="required" placeholder="Isikan Hasil SIdang" class="form-control col-md-7 col-xs-12">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_hasil" class="btn btn-primary">Kirim</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </td>
                  <?php } ?>
                  <!-- Hasil Query -->
                  <?php
                  if (isset($_POST['isi_hasil']));
                  if (isset($_POST['isi_hasil'])) {
                    $hasilSidang = $_POST['hasil'];
                    $id_permohonan = $_POST['id_permohonan'];
                    // var_dump($tgl_sidang);
                    // die;
                    $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET hasil = '$hasilSidang' WHERE id_permohonan = $id_permohonan");
                    if ($hasil) {
                      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
                    } else {
                      echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_j";</script>';
                    }
                  }
                  ?>


                  <!-- AKSI -->
                  <td>
                    <a class="btn btn-sm btn-success" href="../laporan/laporan_gugatan_pidana.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a>
                    <a class="btn btn-sm btn-danger" href="index.php?menu=permohonan_j&act=del&id_permohonan=<?php echo $d['id_permohonan'] ?>"><i class="fa fa-trash"></i> </a>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-<?= $d['id_permohonan'] ?>"><i class="fa fa-pencil"></i></a>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit-<?= $d['id_permohonan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Permogonan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                              <div class="">
                                <input type="hidden" name="id_permohonan" class="form-control" id="field1" value="<?= $d["id_permohonan"]; ?>">
                                <?php
                                $id_p = $d['id_permohonan'];
                                $cek = mysqli_query($connect, "SELECT * FROM tb_permohonan_j Where id_permohonan = $id_p");
                                $data1 = mysqli_fetch_array($cek);
                                // var_dump($data1); 
                                ?>
                                <div class="form-group" align="center">
                                  <label class="control-label">Nama Tegugat<span class="required">*</span></label>
                                  <div class="">
                                    <input type="input" name="nama" value="<?= $data1['nama_t']; ?>" class="form-control">
                                  </div>
                                  <label class="">Perihal Perkara<span class="required">*</span></label>
                                  <div class="">
                                    <input type="input" name="perihal_perkara" value="<?= $data1['perihal_perkara']; ?>" class="form-control ">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" name="isi_hasil" class="btn btn-primary">Kirim</button>
                              </div>
                            </div>
                        </div>
                      </div>
                      </form>
                  </td>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat (Jaksa)<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="id_pengguna" required="required" class="form-control col-md-7 col-xs-12">
                        <?php
                        $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_jaksa");
                        while ($data_panitera = mysqli_fetch_array($cek_panitera)) { ?>
                          <option value="<?php echo $data_panitera['nip']; ?>"> <?php echo $data_panitera['nama_j']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select name="jenis_permohonan" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="Gugatan">Gugatan</option>
                        <option value="Banding">Banding</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal Perkara<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="perihal_perkara" required="required" placeholder="Isikan Perkara" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lapor<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="tgl_lapor" required="required" placeholder="Isikan Tanggal Laor" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tergugat<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="nama_t" required="required" placeholder="Isikan Nama Tergugat" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Tergugat<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="pekerjaan_t" required="required" placeholder="Isikan Pekerjaan Tergugat" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir Tergugat</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="tempat_lahir_t" required="required" placeholder="Isikan Tempat Lahir Tergugat" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir Tergugat<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="tgl_lahir_t" required="required" placeholder="Isikan Tanggal Lahir Tergugat" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tegugat<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="alamat_t" required="required" placeholder="Isikan Alamat Tergugat" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" name="biaya" required="required" placeholder="Isikan Biaya" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Sidang<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="hasil" required="required" placeholder="Isikan Hasil" class="form-control col-md-7 col-xs-12">
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

  $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan_j ()");
  if ($hasil) {
    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_j";</script>';
  } else {
    echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_j";</script>';
  }
}

?>
</div>
</div>
</div>