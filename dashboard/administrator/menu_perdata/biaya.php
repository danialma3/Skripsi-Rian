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
              <th>Penggugat</th>
              <th>Jenis Pengajuan</th>
              <th>Perihal Perkara</th>
              <th>Tanggal Lapor</th>
              <th>nama_tergugat</th>
              <th>Pekerjaan Tergugat</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat Tergugat</th>
              <th>Biaya</th>
              <th>Aksi Biaya</th>
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
                <td><?php echo $d['pekerjaan_t']; ?></td>
                <td><?php echo $d['tempat_lahir_t']; ?>, <?php echo $d['tgl_lahir_t']; ?></td>
                <td><?php echo $d['alamat_t']; ?></td>


                <?php if ($d['id_biaya']) { ?>
                  <td align="center">
                    <?php $id_biaya = $d["id_biaya"];
                    $id_permohonan = $d["id_permohonan"];
                    $h = mysqli_query($connect, "SELECT * FROM tb_biaya WHERE id_biaya=$id_biaya AND id_permohonan = $id_permohonan");
                    $data = mysqli_fetch_array($h);
                    $total = $data['pendaftaran'] + $data['proses'] + $data['panggilan'] + $data['mediasi'] + $data['pemberitahuan'] + $data['redaksi'] + $data['putusan'] + $data['materai'];
                    ?>
                    <?php echo 'Rp. ' . $total; ?>
                  </td>
                <?php } else { ?>
                  <td align="center">
                    Biaya Kosong
                  </td>
                <?php } ?>


                <!-- AKSI -->

                <?php if ($d['id_biaya']) { ?>
                  <td align="center">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah_biaya-<?= $d['id_biaya'] ?>">
                      Ubah Biaya Sidang
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ubah_biaya-<?= $d["id_biaya"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Biaya</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form enctype="multipart/form-data" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="text" name="id_biaya" class="form-control" id="field1" value="<?= $d["id_biaya"]; ?>">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pendaftaran<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['pendaftaran'] ?>" name="pendaftaran" placeholder="Isikan Biaya Pendaftaran Sidang" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Proses<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['proses'] ?>" name="proses" placeholder="Isikan Biaya Proses" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Panggilan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['panggilan'] ?>" name="panggilan" placeholder="Isikan Biaya Panggilan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Mediasi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['mediasi'] ?>" name="mediasi" placeholder="Isikan Biaya Mediasi" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pemberitahuan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['pemberitahuan'] ?>" name="pemberitahuan" placeholder="Isikan Biaya Pemberitahuan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Redaksi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['redaksi'] ?>" name="redaksi" placeholder="Isikan Biaya Redaksi" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Putusan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['putusan'] ?>" name="putusan" placeholder="Isikan Biaya Putusan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Materai<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" value="<?= $data['materai'] ?>" name="materai" placeholder="Isikan Biaya Materai" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" name="ubah_biaya" class="btn btn-primary">Kirim</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </td>
                <?php } else { ?>
                  <td align="center">
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahBiaya-<?= $d["id_permohonan"]; ?>">
                      Iskan Biaya Sidang
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahBiaya-<?= $d["id_permohonan"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pendaftaran<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="pendaftaran" placeholder="Isikan Biaya Pendaftaran Sidang" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Proses<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="proses" placeholder="Isikan Biaya Proses" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Panggilan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="panggilan" placeholder="Isikan Biaya Panggilan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Mediasi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="mediasi" placeholder="Isikan Biaya Mediasi" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Pemberitahuan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="pemberitahuan" placeholder="Isikan Biaya Pemberitahuan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Redaksi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="redaksi" placeholder="Isikan Biaya Redaksi" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Putusan<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="putusan" placeholder="Isikan Biaya Putusan" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Materai<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="materai" placeholder="Isikan Biaya Materai" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" name="isi_biaya" class="btn btn-primary">Kirim</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </td>
              </tr>
            <?php } ?>
          <?php } ?>
          <!-- Hasil Query -->
          <?php
          if (isset($_POST['isi_biaya']));
          if (isset($_POST['isi_biaya'])) {
            $hasilSidang = $_POST['isi_biaya'];
            $id_permohonan = $_POST['id_permohonan'] ? $_POST['id_permohonan'] : 0;
            $pendaftaran = $_POST['pendaftaran'] ? $_POST['pendaftaran'] : 0;
            $proses = $_POST['proses'] ? $_POST['proses'] : 0;
            $panggilan = $_POST['panggilan'] ? $_POST['panggilan'] : 0;
            $mediasi = $_POST['mediasi'] ? $_POST['mediasi'] : 0;
            $pemberitahuan = $_POST['pemberitahuan'] ? $_POST['pemberitahuan'] : 0;
            $redaksi = $_POST['redaksi'] ? $_POST['redaksi'] : 0;
            $putusan = $_POST['putusan'] ? $_POST['putusan'] : 0;
            $materai = $_POST['materai'] ? $_POST['materai'] : 0;

            // var_dump($tgl_sidang);
            // die;
            $hasil = mysqli_query($connect, "INSERT INTO tb_biaya (id_permohonan, pendaftaran, proses, panggilan, mediasi, pemberitahuan, redaksi, putusan, materai) VALUES ($id_permohonan, $pendaftaran, $proses, $panggilan, $mediasi, $pemberitahuan, $redaksi, $putusan, $materai)");
            $x = mysqli_query($connect, "SELECT LAST_INSERT_ID()");
            $id_terbaru = mysqli_fetch_array($x);
            $id_terbaru = $id_terbaru[0];
            $hasil_id = mysqli_query($connect, "UPDATE tb_permohonan_p SET id_biaya = '$id_terbaru' WHERE id_permohonan = $id_permohonan");
            if ($hasil and $hasil_id) {
              echo '<script language="javascript">alert("Success"); document.location="index.php?menu=biaya";</script>';
            } else {
              echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=biaya";</script>';
            }
          }
          ?>
          <?php
          if (isset($_POST['ubah_biaya']));
          if (isset($_POST['ubah_biaya'])) {
            $id_biaya = $_POST['id_biaya'];
            $pendaftaran = $_POST['pendaftaran'] ? $_POST['pendaftaran'] : 0;
            $proses = $_POST['proses'] ? $_POST['proses'] : 0;
            $panggilan = $_POST['panggilan'] ? $_POST['panggilan'] : 0;
            $mediasi = $_POST['mediasi'] ? $_POST['mediasi'] : 0;
            $pemberitahuan = $_POST['pemberitahuan'] ? $_POST['pemberitahuan'] : 0;
            $redaksi = $_POST['redaksi'] ? $_POST['redaksi'] : 0;
            $putusan = $_POST['putusan'] ? $_POST['putusan'] : 0;
            $materai = $_POST['materai'] ? $_POST['materai'] : 0;

            // var_dump($tgl_sidang);
            // die;
            $hasil = mysqli_query($connect, "UPDATE tb_biaya SET 
            pendaftaran = $pendaftaran,
            proses = $proses,
            panggilan = $panggilan,
            mediasi = $mediasi, 
            pemberitahuan = $pemberitahuan,
            redaksi = $redaksi,
            putusan = $putusan,
            materai = $materai
            WHERE id_biaya = $id_biaya");

            if ($hasil) {
              echo '<script language="javascript">alert("Success"); document.location="index.php?menu=biaya";</script>';
            } else {
              echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=biaya";</script>';
            }
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>