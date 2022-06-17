<?php

//EDIT BELUM
if (isset($_POST['tambah'])) {

  if (isset($_POST['tambah'])) {
    $id_penggugat = $_POST['id_penggugat'];
    $nama_t = $_POST['nama_t'];
    $pekerjaan_t = $_POST['pekerjaan_t'];
    $tempat_lahir_t = $_POST['tempat_lahir_t'];
    $tgl_lahir_t = $_POST['tgl_lahir_t'];
    $alamat_t = $_POST['alamat_t'];
    $jenis_pengajuan = $_POST['jenis_pengajuan'];
    $perihal_perkara = $_POST['perihal_perkara'];
    $tgl_pengajuan = date("Y-m-d");
    // var_dump($nama_t);
    // var_dump($pekerjaan_t);
    // var_dump($tempat_lahir_t);
    // var_dump($tgl_lahir_t);
    // var_dump($alamat_t);
    // var_dump($jenis_pengajuan);
    // var_dump($perihal_perkara);
    // var_dump($tgl_pengajuan);
    // var_dump($id_penggugat);
    // die;

    $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan_j (jenis_pengajuan, perihal_perkara, tgl_lapor, nama_t, pekerjaan_t, tempat_lahir_t, tgl_lahir_t, alamat_t, id_penggugat) VALUES ('$jenis_pengajuan', '$perihal_perkara', '$tgl_pengajuan', '$nama_t', '$pekerjaan_t', '$tempat_lahir_t', '$tgl_lahir_t', '$alamat_t', '$id_penggugat')");
    if ($hasil) {
      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=gugatan_jaksa";</script>';
    } else {
      echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=gugatan_jaksa";</script>';
    }
  }
}



$act = (isset($_GET['act']) ? strtolower($_GET['act']) : NULL); //$_GET[act];
if ($act == 'del') {
  $id = $_GET['id_permohonan'];
  $q = mysqli_query($connect, "DELETE FROM tb_permohonan_j WHERE tb_permohonan_j.id_permohonan='$id'");
  if ($q) {
    echo '<script language="javascript">alert("Success"); document.location="index.php?menu=gugatan_jaksa";</script>';
  } else {
    echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=gugatan_jaksa";</script>';
  }
} elseif ($act == 'edit') {
  $id = $_GET['id_permohonan'];
  $q = mysqli_query($connect, "SELECT * FROM tb_permohonan_j WHERE id_permohonan='$id'");
  $data = mysqli_fetch_array($q); ?>


  <form action="" method="post" class="form-horizontal form-label-left">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Data Gugatan</h2>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <br />
          <form id="demo-form2" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tergugat<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nama_t" required="required" value="<?= $data['nama_t']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Tergugat<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="input" name="pekerjaan_t" required="required" value="<?= $data['pekerjaan_t']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir Tergugat<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="input" name="tempat_lahir_t" required="required" value="<?= $data['tempat_lahir_t']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir Tergugat<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" name="tgl_lahir_t" required="required" value="<?= $data['tgl_lahir_t']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tergugat<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="alamat_t" required="required" value="<?= $data['alamat_t']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengajuan<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="jenis_pengajuan" required="required" class="form-control col-md-7 col-xs-12">
                  <?php
                  include "koneksi.php";
                  $cek = mysqli_query($connect, "SELECT * FROM tb_sidang");
                  while ($data1 = mysqli_fetch_array($cek)) { ?>
                    <option value="<?php echo $data1['ket_sidang']; ?>"><?php echo $data1['ket_sidang']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal Perkara<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="perihal_perkara" required="required" value="<?= $data['perihal_perkara']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Jaksa Penuntut<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="id_penggugat" required="required" class="form-control col-md-7 col-xs-12">
                  <?php
                  include "koneksi.php";
                  $cek = mysqli_query($connect, "SELECT * FROM tb_jaksa");
                  while ($data = mysqli_fetch_array($cek)) { ?>
                    <option value="<?php echo $data['id_jaksa']; ?>"><?php echo $data['nama_j']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="reset" class="btn btn-danger" value="Batal">
                <input type="submit" name="edit" class="btn btn-primary" value="Edit Data gugatan">
              </div>
            </div>
        </div>
      </div>
    </div>
  </form>
  <?php
  if (isset($_POST['edit'])) {

    if (isset($_POST['edit'])) {
      $id_penggugat = $_POST['id_penggugat'];
      $nama_t = $_POST['nama_t'];
      $pekerjaan_t = $_POST['pekerjaan_t'];
      $tempat_lahir_t = $_POST['tempat_lahir_t'];
      $tgl_lahir_t = $_POST['tgl_lahir_t'];
      $alamat_t = $_POST['alamat_t'];
      $jenis_pengajuan = $_POST['jenis_pengajuan'];
      $perihal_perkara = $_POST['perihal_perkara'];
      $tgl_pengajuan = date("Y-m-d");
      // var_dump($nama_t);
      // var_dump($pekerjaan_t);
      // var_dump($tempat_lahir_t);
      // var_dump($tgl_lahir_t);
      // var_dump($alamat_t);
      // var_dump($jenis_pengajuan);
      // var_dump($perihal_perkara);
      // var_dump($tgl_pengajuan);
      // var_dump($id_penggugat);
      // die;
      $hasil = mysqli_query($connect, "UPDATE tb_permohonan_j SET jenis_pengajuan = '$jenis_pengajuan', perihal_perkara = '$perihal_perkara', tgl_lapor = '$tgl_pengajuan', nama_t = '$nama_t', pekerjaan_t = '$pekerjaan_t', tempat_lahir_t = '$tempat_lahir_t', tgl_lahir_t = '$tgl_lahir_t', alamat_t = '$alamat_t', id_penggugat = '$id_penggugat' WHERE id_permohonan ='$id'");
      if ($hasil) {
        echo '<script language="javascript">alert("Success"); document.location="index.php?menu=gugatan_jaksa";</script>';
      } else {
        echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=gugatan_jaksa";</script>';
      }
    }
  }
} else { ?>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><i class="fa fa-list"></i> Data Gugatan
          <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Gugatan</a>
        </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama Jaksa</th>
              <th>Jenis Sidang</th>
              <th>Perihal</th>
              <th>Nama Tergugat</th>
              <th>Nama Hakim</th>
              <th>Tanggal Sidang</th>
              <th>Tanggal Putusan</th>
              <th>Hasil</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa");
            while ($e = mysqli_fetch_array($query)) { ?>
              <tr>
                <?php
                if ($e['nama_j'] and $e['jenis_pengajuan'] and $e['perihal_perkara'] and $e['nama_t']) { ?>
                  <td><?= $e['nama_j']; ?></td>
                  <td><?= $e['jenis_pengajuan']; ?></td>
                  <td><?= $e['perihal_perkara']; ?></td>
                  <td><?= $e['nama_t']; ?></td>
                <?php } else { ?>
                  <td align="center" colspan="4"><i>Anda Belum Melengkapi Data Penggugat</i></td>
                <?php } ?>
                <?php
                if ($e['nama_hakim'] and $e['tgl_sidang'] and $e['tgl_putusan']) { ?>
                  <td><?= $e['nama_hakim']; ?></td>
                  <td><?= $e['tgl_sidang']; ?></td>
                  <td><?= $e['tgl_putusan']; ?></td>
                  <?php if ($e['hasil']) { ?>
                    <td><?= $e['hasil']; ?></td>
                  <?php } else { ?>
                    <td>Belum Ada Hasil Sidang</td>
                  <?php } ?>
                <?php } else { ?>
                  <td align="center" colspan="4"><i>Belum Ada Putusan Mohon Tunggu</i></td>
                <?php } ?>
                <td align="center">
                  <a class="btn btn-sm btn-success" href="../laporan/laporan_gugatan_pidana.php?id_permohonan=<?php echo $e['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a>
                  <a class="btn btn-sm btn-danger" href="index.php?menu=gugatan_jaksa&act=del&id_permohonan=<?php echo $e['id_permohonan'] ?>"><i class="fa fa-trash"></i> </a>
                  <a class="btn btn-sm btn-warning" href="index.php?menu=gugatan_jaksa&act=edit&id_permohonan=<?php echo $e['id_permohonan']; ?>"><i class="fa fa-pencil"></i></a>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php } ?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            <h2>Tambah Data Gugatan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form id="demo-form2" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_t" required="required" placeholder="Isikan Nama Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="input" name="pekerjaan_t" required="required" placeholder="Isikan Pekerjaan Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="input" name="tempat_lahir_t" required="required" placeholder="Isikan Tempat Lahir Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_lahir_t" required="required" placeholder="Isikan Tanggal Lahir Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="alamat_t" required="required" placeholder="Isikan Alamat Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengajuan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="jenis_pengajuan" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    include "koneksi.php";
                    $cek = mysqli_query($connect, "SELECT * FROM tb_sidang");
                    while ($data = mysqli_fetch_array($cek)) { ?>
                      <option value="<?php echo $data['ket_sidang']; ?>"><?php echo $data['ket_sidang']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal Perkara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="perihal_perkara" required="required" placeholder="Isikan Perihal Perkara Yang Anda Ajukan" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Jaksa Penuntut<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_penggugat" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    include "koneksi.php";
                    $cek = mysqli_query($connect, "SELECT * FROM tb_jaksa");
                    while ($data = mysqli_fetch_array($cek)) { ?>
                      <option value="<?php echo $data['id_jaksa']; ?>"><?php echo $data['nama_j']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="tambah" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php

    ?>
  </div>
</div>
</div>