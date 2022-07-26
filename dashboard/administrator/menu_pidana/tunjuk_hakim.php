<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Penunjukan Hakim Kasus Pidana
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
              <th>Nama Hakim</th>
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
                  <?php if ($d['id_hakim']) { ?>
                    <td align="center">
                      <?php
                      $h = $d['id_hakim'];
                      $hakim = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim = $h ");
                      while ($data = mysqli_fetch_array($hakim)) {
                        echo $data['nama_hakim'];
                      } ?>
                    </td>
                  <?php } else { ?>
                    <td align="center">
                      Data Hakim Masih Kosong
                    </td>
                  <?php } ?>

                  <!-- END HAKIM -->

                  <!-- AKSI -->
                  <td align="center">

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
                    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=tunjuk_hakim_p";</script>';
                  } else {
                    echo '<script language="javascript">alert("Gagal coy"); document.location="index.php?menu=tunjuk_hakim_p";</script>';
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