<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_perkara'];
    $q=mysqli_query($connect, "DELETE FROM tb_perkara WHERE id_perkara='$id'");
    echo"<script>document.location.href='index.php?menu=jenis_perkara'</script>";
}
elseif($act=='edit'){
    $id=$_GET['id_perkara'];
    $q=mysqli_query($connect, "SELECT * FROM tb_perkara WHERE id_perkara='$id'");
    $data=mysqli_fetch_array($q); ?>
    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data Perkara</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama perkara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_perkara" required="required" placeholder="Isikan Nama perkara" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_perkara']; ?>">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data perkara">
                </div>
              </div>
            </div>
            </form>
<?php
        if(isset($_POST['edit'])){
          $nama_perkara=$_POST['nama_perkara'];
            $hasil = mysqli_query($connect, "UPDATE tb_perkara SET nama_perkara='$nama_perkara' WHERE id_perkara='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=jenis_perkara";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=jenis_perkara";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data perkara
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Perkara</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama perkara</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $no=1;
          $query=mysqli_query($connect, "SELECT * FROM tb_perkara");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $d['nama_perkara']; ?></td>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=jenis_perkara&act=del&id_perkara=<?php echo $d['id_perkara'] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-warning" href="index.php?menu=jenis_perkara&act=edit&id_perkara=<?php echo $d['id_perkara']; ?>"><i class="fa fa-pencil"></i></a></td> 
          </tr>
        <?php $no++; } ?>
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
						  <h2>Tambah Data Perkara</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama perkara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_perkara" required="required" placeholder="Isikan Nama perkara" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Perkara">
                </div>
              </div>
              </form>
            </div>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['simpan'])){
				  $nama_perkara=$_POST['nama_perkara'];
				    $hasil = mysqli_query($connect, "INSERT INTO tb_perkara (nama_perkara) values ('$nama_perkara')");
      				if ($hasil) {
      					echo '<script language="javascript">alert("Success"); document.location="index.php?menu=jenis_perkara";</script>';
      				}
      				else {
      					echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=jenis_perkara";</script>';
      				}
				  }
				?>
		</div>
	</div>
</div>