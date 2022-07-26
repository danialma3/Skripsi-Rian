<?php
$query = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE nip = $nip");
$hakim_nip = mysqli_fetch_array($query);
$id_hakim = $hakim_nip['id_hakim'];
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Isi Hasil Kasus Pidana
        <!-- <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a> -->
      </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Jaksa Yang Menggugat</th>
              <th>Perihal Perkara</th>
              <th>Tanggal Lapor</th>
              <th>Nama Tergugat</th>
              <th>Tanggal Putusan</th>
              <th>Hasil</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa WHERE id_hakim = $id_hakim ");
            while ($d = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $d['nama_j']; ?></td>
                <td><?php echo $d['perihal_perkara']; ?></td>
                <td><?php echo $d['tgl_lapor']; ?></td>
                <td><?php echo $d['nama_t']; ?></td>
                <?php if ($d['tgl_putusan']) { ?>
                  <td>
                    <?php echo $d['tgl_putusan']; ?>
                  </td>
                <?php } else { ?>
                  <td align="center">
                    Anda Belum Memutuskan Tanggal
                  </td>
                <?php } ?>


                <!-- HASIL -->
                <?php if ($d['hasil']) { ?>
                  <td align="center">
                    <?php echo $d['hasil']; ?>
                  </td>
                <?php } else { ?>
                  <td align="center">
                    Hasil Kosong
                  </td>
                <?php } ?>
                <!-- Hasil Query -->

                <!-- AKSI -->
                <?php if ($d['hasil']) { ?>
                  <td align="center">
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
                                <label class="control-label ">Hasil SIdang<span class="required">*</span></label>
                                <div>
                                  <input type="text" name="hasil" required="required" value="<?= $d['hasil'] ?>" class="form-control">
                                </div>
                                <br>
                                <label class="control-label">Diputuskan Tanggal<span class="required">*</span></label>
                                <div>
                                  <input type="date" name="tgl_putusan" required="required" value="<?= $d['tgl_putusan'] ?>" class="form-control">
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
                                <label class="control-label">Isi Hasil Sidang<span class="required">*</span></label>
                                <div>
                                  <input type="text" name="hasil" required="required" placeholder="Isikan Hasil SIdang" class="form-control">
                                </div>
                                <br>
                                <label class="control-label">Diputuskan Tanggal<span class="required">*</span></label>
                                <div>
                                  <input type="date" name="tgl_putusan" required="required" class="form-control">
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
                  $tgl_putusan = $_POST['tgl_putusan'];
                  // var_dump($tgl_sidang);
                  // die;
                  $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET hasil = '$hasilSidang', tgl_putusan = '$tgl_putusan' WHERE id_permohonan = $id_permohonan");
                  if ($hasil) {
                    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=isi_hasil_putusan";</script>';
                  } else {
                    echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=isi_hasil_putusan";</script>';
                  }
                }
                ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>