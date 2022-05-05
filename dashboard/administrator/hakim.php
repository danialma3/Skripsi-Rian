<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_hakim'];
    $q=mysqli_query($connect, "DELETE FROM tb_hakim WHERE id_hakim='$id'");
    echo"<script>document.location.href='index.php?menu=hakim'</script>";
}
elseif($act=='edit'){
    $id=$_GET['id_hakim'];
    $q=mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim='$id'");
    $data=mysqli_fetch_array($q); ?>


    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data Hakim</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nip" required="required" placeholder="Isikan NIP" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nip']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hakim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_hakim" required="required" placeholder="Isikan Nama Hakim" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_hakim']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Hakim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="jabatan_hakim" required="required" placeholder="Isikan Jabatan Hakim" class="form-control col-md-7 col-xs-12" value="<?php echo $data['jabatan_hakim']; ?>">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data Hakim">
                </div>
              </div>
            </div>
            </form>
<?php
        if(isset($_POST['edit'])){
          $nip=$_POST['nip'];
          $nama_hakim=$_POST['nama_hakim'];
          $jabatan_hakim=$_POST['jabatan_hakim'];
            $hasil = mysqli_query($connect, "UPDATE tb_hakim SET nip='$nip', nama_hakim='$nama_hakim', jabatan_hakim='$jabatan_hakim' WHERE id_hakim='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=hakim";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=hakim";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data Hakim
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Hakim</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama Hakim</th>
            <th>Jabatan Hakim</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query=mysqli_query($connect, "SELECT * FROM tb_hakim");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $d['nip']; ?></td>
            <td><?php echo $d['nama_hakim']; ?></td>
            <td><?php echo $d['jabatan_hakim']; ?></td>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=hakim&act=del&id_hakim=<?php echo $d['id_hakim'] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-warning" href="index.php?menu=hakim&act=edit&id_hakim=<?php echo $d['id_hakim']; ?>"><i class="fa fa-pencil"></i></a></td> 
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
						  <h2>Tambah Data Hakim</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nip" required="required" placeholder="Isikan NIP" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Hakim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_hakim" required="required" placeholder="Isikan Nama Hakim" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Hakim<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="jabatan_hakim" required="required" placeholder="Isikan Jabatan Hakim" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Hakim">
                </div>
              </div>
              </form>
            </div>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['simpan'])){
          $nip=$_POST['nip'];
				  $nama_hakim=$_POST['nama_hakim'];
				  $jabatan_hakim=$_POST['jabatan_hakim'];
				    $hasil = mysqli_query($connect, "INSERT INTO tb_hakim (nip,nama_hakim,jabatan_hakim) values ('$nip','$nama_hakim','$jabatan_hakim')");
      				if ($hasil) {
      					echo '<script language="javascript">alert("Success"); document.location="index.php?menu=hakim";</script>';
      				}
      				else {
      					echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=hakim";</script>';
      				}
				  }
				?>
		</div>
	</div>
</div>