

<?php

//EDIT BELUM



$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_gugatan'];
    $q=mysqli_query($connect, "DELETE FROM tb_gugatan WHERE id_gugatan='$id'");
    echo"<script>document.location.href='index.php?menu=gugatan'</script>";
}
elseif($act=='edit'){
    $id=$_GET['id_gugatan'];
    $q=mysqli_query($connect, "SELECT * FROM tb_gugatan WHERE id_gugatan='$id'");
    $data=mysqli_fetch_array($q); ?>


    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data Gugatan</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama gugatan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_gugatan" required="required" placeholder="Isikan Nama gugatan" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_gugatan'];?>">
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
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data gugatan">
                </div>
              </div>
            </div>
          </div>
        </div>
            </form>
<?php
        if(isset($_POST['edit'])){
          $nama_gugatan=$_POST['nama_gugatan'];
          $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
            $hasil = mysqli_query($connect, "UPDATE tb_gugatan SET nama_gugatan='$nama_gugatan', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', kelamin='$kelamin', tmp_lahir='$tmp_lahir', agama='$agama',pendidikan='$pendidikan',warganegara='$warganegara',pengacara='$pengacara' WHERE id_gugatan='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=gugatan";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=gugatan";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-list"></i> Data Gugatan
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Gugatan</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No Perkara</th>
            <th>Kategori</th>
            <th>Nama Penggugat</th>
            <th>Nama Hakim</th>
            <th>Nama Panitera</th>
            <th>Tanggal Sidang</th>
            <th>Tanggal Putusan</th>
            <th>Hasil</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query=mysqli_query($connect, "SELECT * FROM tb_gugatan");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $d['no_perkara']; ?></td>
            <td><?php echo $d['kategori']; ?></td>
            <td><?php $id_penggugat = $d['id_penggugat']; 
                      $cek_penggugat = mysqli_query($connect, "SELECT * FROM tb_penggugat WHERE id_penggugat='$id_penggugat'");
                      $data_penggugat = mysqli_fetch_array($cek_penggugat);
                      echo $data_penggugat['nama_penggugat'];
            ?></td>
            <td><?php $id_hakim = $d['id_hakim']; 
                      $cek_hakim = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim='$id_hakim'");
                      $data_hakim = mysqli_fetch_array($cek_hakim);
                      echo $data_hakim['nama_hakim'];
            ?></td>
            <td><?php $id_panitera = $d['id_panitera']; 
                      $cek_panitera = mysqli_query($connect, "SELECT * FROM tb_panitera WHERE id_panitera='$id_panitera'");
                      $data_panitera = mysqli_fetch_array($cek_panitera);
                      echo $data_panitera['nama_panitera'];
            ?></td>
            <td><?php echo $d['tgl_sidang']; ?></td>
            <td><?php echo $d['tgl_putusan']; ?></td>
            <td><?php echo $d['hasil']; ?></td>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=gugatan&act=del&id_gugatan=<?php echo $d['id_gugatan'] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-warning" href="index.php?menu=gugatan&act=edit&id_gugatan=<?php echo $d['id_gugatan']; ?>"><i class="fa fa-pencil"></i></a></td> 
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
						  <h2>Tambah Data Gugatan</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Perkara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="no_perkara" required="required" placeholder="Isikan No Perkara" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="kategori" required="required" placeholder="Isikan Kategori" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_penggugat" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    $cek_penggugat = mysqli_query($connect, "SELECT * FROM tb_penggugat");
                    while ($data_penggugat = mysqli_fetch_array($cek_penggugat)) { ?>
                      <option value="<?php echo $data_penggugat['id_penggugat']; ?>"> <?php echo $data_penggugat['nama_penggugat']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hakim <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_hakim" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    $cek_hakim = mysqli_query($connect, "SELECT * FROM tb_hakim");
                    while ($data_hakim = mysqli_fetch_array($cek_hakim)) { ?>
                      <option value="<?php echo $data_hakim['id_hakim']; ?>"> <?php echo $data_hakim['nama_hakim']; ?></option>
                    <?php } ?>
                  </select>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hasil<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="hasil" required="required" placeholder="Isikan Hasil Sidang" class="form-control col-md-7 col-xs-12">
                  </textarea>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Gugatan">
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
          $kategori = $_POST['kategori'];
          $id_penggugat = $_POST['id_penggugat'];
          $id_hakim = $_POST['id_hakim'];
          $id_panitera = $_POST['id_panitera'];
          $tgl_sidang = $_POST['tgl_sidang'];
          $tgl_putusan = $_POST['tgl_putusan'];
          $hasil = $_POST['hasil'];
				    $hasil = mysqli_query($connect, "INSERT INTO tb_gugatan (no_perkara,kategori,id_penggugat,id_hakim,id_panitera,tgl_sidang,tgl_putusan,hasil) values ('$no_perkara','$kategori','$id_penggugat','$id_hakim','$id_panitera','$tgl_sidang','$tgl_putusan','$hasil')");
      				if ($hasil) {
      					echo '<script language="javascript">alert("Success"); document.location="index.php?menu=gugatan";</script>';
      				}
      				else {
      					echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=gugatan";</script>';
      				}
				  }
				?>
		</div>
	</div>
</div>