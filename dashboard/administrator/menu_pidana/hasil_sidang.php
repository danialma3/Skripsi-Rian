<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data permohonan
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
              <th>Jenis Pengajuan</th>
              <th>Perihal Perkara</th>
              <th>Tanggal Lapor</th>
              <th>nama_tergugat</th>
              <th>Pekerjaan Tergugat</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat Tergugat</th>
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
                    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=hasil_sidang_p";</script>';
                  } else {
                    echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=hasil_sidang_p";</script>';
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