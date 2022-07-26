  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-user"></i> Tentukan Tanggal Sidang Perdata
          <!-- <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a> -->
        </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Penggugat</th>
                <th>Jenis Pengajuan</th>
                <th>Perihal Perkara</th>
                <th>Tanggal Lapor</th>
                <th>nama_tergugat</th>
                <th>Tanggal Sidang</th>
                <th>Aksi Tanggal Sidang</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat");
              while ($d = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td><?php echo $d['nama_p']; ?></td>
                  <td><?php echo $d['jenis_pengajuan']; ?></td>
                  <td><?php echo $d['perihal_perkara']; ?></td>
                  <td><?php echo $d['tgl_lapor']; ?></td>
                  <td><?php echo $d['nama_t']; ?></td>
                  <!-- TANGGAL SIDANG -->
                  <?php if ($d['tgl_sidang']) { ?>
                    <td align="center">
                      <?php echo $d['tgl_sidang']; ?>
                    <?php } else { ?>
                    <td align="center">
                      Tanggal Kosong
                    </td>
                  <?php } ?>
                  <!-- AKSI -->
                  <!-- TANGGAL SIDANG -->
                  <?php if ($d['tgl_sidang']) { ?>
                    <td align="center">
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
                    $hasil = mysqli_query($connect, "UPDATE tb_permohonan_p SET tgl_sidang = '$tgl_sidang' WHERE id_permohonan = $id_permohonan");
                    if ($hasil) {
                      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan_p";</script>';
                    } else {
                      echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=permohonan_p";</script>';
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