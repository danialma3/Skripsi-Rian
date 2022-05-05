<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_eksekusi'];
    $q=mysqli_query($connect, "DELETE FROM tb_eksekusi WHERE id_eksekusi='$id'");
    echo"<script>document.location.href='index.php?menu=eksekusi'</script>";
}

elseif($act=='edit_putusan'){
    $id=$_GET['id_eksekusi']; ?>
    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tambah Putusan Eksekusi</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Putusan <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="no_putusan" required="required" placeholder="Isikan No Putusan" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tenggal Putusan <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_putusan" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hasil <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="hasil_eksekusi" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan_putusan" class="btn btn-primary" value="Simpan Hasil Putusan">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
  <?php 
      if(isset($_POST['simpan_putusan'])){
          $no_putusan=$_POST['no_putusan'];
          $hasil = $_POST['hasil_eksekusi'];
          $tgl_putusan = $_POST['tgl_putusan'];
            $hasil = mysqli_query($connect, "UPDATE tb_eksekusi SET no_putusan='$no_putusan', hasil_eksekusi='$hasil', tgl_putusan='$tgl_putusan' WHERE id_eksekusi='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=eksekusi";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=eksekusi";</script>';
              }
        }
} 
elseif($act=='edit'){
    $id=$_GET['id_eksekusi'];
    $q=mysqli_query($connect, "SELECT * FROM tb_eksekusi WHERE id_eksekusi='$id'");
    $data=mysqli_fetch_array($q); ?>


    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data eksekusi</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama eksekusi<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_eksekusi" required="required" placeholder="Isikan Nama eksekusi" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_eksekusi'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kelamin" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="<?php echo $data['kelamin'];?>"><?php echo $data['kelamin'];?></option>
                    <option value="<?php echo $data['kelamin'];?>">--- Pilih Baru ---</option>
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_lahir" required="required" placeholder="Isikan Tempat Lahir" class="form-control col-md-7 col-xs-12"value="<?php echo $data['tmp_lahir'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_lahir" required="required" placeholder="Isikan Tanggal Lahir" class="form-control col-md-7 col-xs-12" value="<?php echo $data['tgl_lahir'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Tinggal<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_tinggal" required="required" placeholder="Isikan Tempat Tinggal" class="form-control col-md-7 col-xs-12" value="<?php echo $data['tmp_tinggal'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="agama" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="<?php echo $data['agama'];?>"><?php echo $data['agama'];?></option>
                    <option value="<?php echo $data['agama'];?>">--- Pilih Baru ---</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                  </select>
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pendidikan" required="required" placeholder="Isikan Pendidikan" class="form-control col-md-7 col-xs-12" value="<?php echo $data['pendidikan'];?>">
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga Negara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="warganegara" required="required" placeholder="Isikan Warganegara Asal" class="form-control col-md-7 col-xs-12" value="<?php echo $data['warganegara'];?>">
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengacara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pengacara" required="required" placeholder="Isikan Nama Pengacara" class="form-control col-md-7 col-xs-12" value="<?php echo $data['pendidikan'];?>">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data eksekusi">
                </div>
              </div>
            </div>
          </div>
        </div>
            </form>
      <?php
        if(isset($_POST['edit'])){
          $nama_eksekusi=$_POST['nama_eksekusi'];
          $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
            $hasil = mysqli_query($connect, "UPDATE tb_eksekusi SET nama_eksekusi='$nama_eksekusi', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', kelamin='$kelamin', tmp_lahir='$tmp_lahir', agama='$agama',pendidikan='$pendidikan',warganegara='$warganegara',pengacara='$pengacara' WHERE id_eksekusi='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=eksekusi";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=eksekusi";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data eksekusi
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data eksekusi</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No Perkara</th>
            <th>Penggugat</th>
            <th>Nama Tergugat</th>
            <th>Alamat Tergugat</th>
            <th>Pekerjaan Tergugat</th>
            <th>Hakim</th>
            <th>Panitera</th>
            <th>Tanggal eksekusi</th>
            <th>Tanggal Putusan</th>
            <th>Hasil</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query=mysqli_query($connect, "SELECT * FROM tb_eksekusi");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $d['no_perkara']; ?></td>
            <td><?php $id_penggugat = $d['id_penggugat'];
            $cek_penggugat = mysqli_query($connect, "SELECT * FROM tb_penggugat WHERE id_penggugat='$id_penggugat'");
            $data_penggugat = mysqli_fetch_array($cek_penggugat);
            echo $data_penggugat['nama_penggugat']; ?></td>
            <td><?php echo $d['nama_tergugat']; ?></td>
            <td><?php echo $d['alamat_tergugat']; ?></td>
            <td><?php echo $d['pekerjaan_tergugat']; ?></td>
            <td><?php $id_hakim = $d['id_hakim'];
            $cek_hakim = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim='$id_hakim'");
            $data_hakim = mysqli_fetch_array($cek_hakim);
            echo $data_hakim['nama_hakim']; ?></td>
            <td><?php $id_panitera = $d['id_panitera'];
            $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_panitera WHERE id_panitera='$id_panitera'");
            $data_panitera = mysqli_fetch_array($cek_panitera);
            echo $data_panitera['nama_panitera']; ?></td>
            <td><?php echo $d['tgl_eksekusi']; ?></td>
            <?php
              if($d['no_putusan']=="") { ?>
                <td colspan="2"><i>Putusan Belum Ada</i> <br><a href="index.php?menu=eksekusi&act=edit_putusan&id_eksekusi=<?php echo $d['id_eksekusi']; ?>" class="btn btn-sm btn-success">Isikan Putusan</a></td> 
            <?php } else { ?>
            <td><?php echo $d['tgl_putusan']; ?></td>
            <td><?php echo $d['hasil_eksekusi']; ?></td>
          <?php } ?>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=eksekusi&act=del&id_eksekusi=<?php echo $d['id_eksekusi'] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-warning" href="index.php?menu=eksekusi&act=edit&id_eksekusi=<?php echo $d['id_eksekusi']; ?>"><i class="fa fa-pencil"></i></a></td> 
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
    <form action="" method="POST" class="form-horizontal form-label-left">
      <div class="modal-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tambah Data Eksekusi</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <br />
            <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Perkara <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="no_perkara" required="required" placeholder="Isikan Nomor Perkara" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Penggugat <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_penggugat" required="required" class="form-control col-md-7 col-xs-12">
                    <?php 
                    $cek_penggugat = mysqli_query($connect, "SELECT * FROM tb_penggugat");
                    while ($data_penggugat = mysqli_fetch_array($cek_penggugat)) { ?>
                     <option value="<?php echo $data_penggugat['id_penggugat']; ?>"><?php echo $data_penggugat['nama_penggugat']; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tergugat <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_tergugat" required="required" placeholder="Isikan Nama Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Tergugat <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="alamat_tergugat" required="required" placeholder="Isikan Alamat Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Tergugat <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pekerjaan_tergugat" required="required" placeholder="Isikan Pekerjaan Tergugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hakim <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_hakim" required="required" class="form-control col-md-7 col-xs-12">
                    <?php 
                    $cek_hakim = mysqli_query($connect, "SELECT * FROM tb_hakim");
                    while ($data_hakim = mysqli_fetch_array($cek_hakim)) { ?>
                     <option value="<?php echo $data_hakim['id_hakim']; ?>"><?php echo $data_hakim['nama_hakim']; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Panitera <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_panitera" required="required" class="form-control col-md-7 col-xs-12">
                    <?php 
                    $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_panitera");
                    while ($data_panitera = mysqli_fetch_array($cek_panitera)) { ?>
                     <option value="<?php echo $data_panitera['id_panitera']; ?>"><?php echo $data_panitera['nama_panitera']; ?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal eksekusi <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_eksekusi" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data eksekusi">
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
        if(isset($_POST['simpan'])){
          $no_perkara = $_POST['no_perkara'];
          $id_penggugat = $_POST['id_penggugat'];
          $nama_tergugat = $_POST['nama_tergugat'];
          $alamat_tergugat = $_POST['alamat_tergugat'];
          $pekerjaan_tergugat = $_POST['pekerjaan_tergugat'];
          $id_hakim = $_POST['id_hakim'];
          $id_panitera = $_POST['id_panitera'];
          $tgl_eksekusi = $_POST['tgl_eksekusi'];
            $hasil = mysqli_query($connect, "INSERT INTO tb_eksekusi (no_perkara, id_penggugat, nama_tergugat,alamat_tergugat,pekerjaan_tergugat,id_panitera,id_hakim,tgl_eksekusi) values ('$no_perkara','$id_penggugat','$nama_tergugat','$alamat_tergugat','$pekerjaan_tergugat','$id_panitera','$id_hakim','$tgl_eksekusi')");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=eksekusi";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=eksekusi";</script>';
              }
          }
        ?>
    </div>
  </div>
</div>