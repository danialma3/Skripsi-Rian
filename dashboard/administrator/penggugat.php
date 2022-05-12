<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_penggugat'];
    $q=mysqli_query($connect, "DELETE FROM tb_penggugat WHERE id_penggugat='$id'");
    if ($q) {
      echo '<script language="javascript">alert("Success"); document.location="index.php?menu=penggugat";</script>';
    }
    else {
      echo '<script language="javascript">alert("Gagal! Data penggugat ini telah terdaftar di beberapa sidang."); document.location="index.php?menu=penggugat";</script>';
    }
}
elseif($act=='edit'){
    $id=$_GET['id_penggugat'];
    $q=mysqli_query($connect, "SELECT * FROM tb_penggugat WHERE id_penggugat='$id'");
    $data=mysqli_fetch_array($q); ?>


    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data Penggugat</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_penggugat" required="required" placeholder="Isikan Nama Penggugat" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_penggugat'];?>">
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
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="warganegara" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="<?php echo $data['warganegara'];?>"><?php echo $data['warganegara'];?></option>
                    <option value="<?php echo $data['warganegara'];?>">--- Pilih Baru ---</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
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
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data Penggugat">
                </div>
              </div>
            </div>
          </div>
        </div>
            </form>
<?php
        if(isset($_POST['edit'])){
          $nama_penggugat=$_POST['nama_penggugat'];
          $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
            $hasil = mysqli_query($connect, "UPDATE tb_penggugat SET nama_penggugat='$nama_penggugat', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', kelamin='$kelamin', tmp_lahir='$tmp_lahir', agama='$agama',pendidikan='$pendidikan',warganegara='$warganegara',pengacara='$pengacara' WHERE id_penggugat='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=penggugat";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=penggugat";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data penggugat
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data Penggugat</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nama Penggugat</th>
            <th>Jenis Kelamin</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Tempat Tinggal</th>
            <th>Agama</th>
            <th>Pendidikan</th>
            <th>Warganegara</th>
            <th>Tanggal</th>
            <th>Nama Pengacara</th>
            <th>Pengajuan Sidang</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query=mysqli_query($connect, "SELECT * FROM tb_penggugat");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $d['nama_penggugat']; ?></td>
            <td><?php echo $d['kelamin']; ?></td>
            <td><?php echo $d['tmp_lahir'].', '.$d['tgl_lahir'] ?></td>
            <td><?php echo $d['tmp_tinggal']; ?></td>
            <td><?php echo $d['agama']; ?></td>
            <td><?php echo $d['pendidikan']; ?></td>
            <td><?php echo $d['warganegara']; ?></td>
            <td><?php echo $d['tgl']; ?></td>
            <td><?php echo $d['pengacara']; ?></td>
            <td><?php
            $id_sidang = $d['id_sidang'];
            $cek = mysqli_query($connect, "SELECT * FROM tb_sidang WHERE id_sidang='$id_sidang'");
            $data = mysqli_fetch_array($cek);
            echo $data['ket_sidang']; ?></td>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=penggugat&act=del&id_penggugat=<?php echo $d['id_penggugat'] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-warning" href="index.php?menu=penggugat&act=edit&id_penggugat=<?php echo $d['id_penggugat']; ?>"><i class="fa fa-pencil"></i></a></td> 
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
						  <h2>Tambah Data Penggugat</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penggugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_penggugat" required="required" placeholder="Isikan Nama Penggugat" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kelamin" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="Laki - Laki">Laki - Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_lahir" required="required" placeholder="Isikan Tempat Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_lahir" required="required" placeholder="Isikan Tanggal Lahir" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Tinggal<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tmp_tinggal" required="required" placeholder="Isikan Tempat Tinggal" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="agama" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pendidikan" required="required" placeholder="Isikan Pendidikan" class="form-control col-md-7 col-xs-12">
                </div>
              </div>  
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga Negara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="warganegara" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengajuan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="id_sidang" required="required" class="form-control col-md-7 col-xs-12">
                    <?php
                    include "koneksi.php";
                    $cek = mysqli_query($connect, "SELECT * FROM tb_sidang");
                    while ($data = mysqli_fetch_array($cek)) { ?>
                    <option value="<?php echo $data['id_sidang']; ?>"><?php echo $data['ket_sidang']; ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>                  
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengacara<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="pengacara" required="required" placeholder="Isikan Nama Pengacara" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Penggugat">
                </div>
              </div>
              </form>
            </div>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['simpan'])){
				  $nama_penggugat=$_POST['nama_penggugat'];
				  $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
          $id_sidang = $_POST['id_sidang'];
          $date = date('now');
				    $hasil = mysqli_query($connect, "INSERT INTO tb_penggugat (nama_penggugat,tmp_lahir,tgl_lahir,kelamin,tmp_tinggal,agama,pendidikan,warganegara,pengacara,tgl,id_sidang) values ('$nama_penggugat','$tmp_lahir','$tgl_lahir','$kelamin','$tmp_tinggal','$agama','$pendidikan','$warganegara','$pengacara','$date','$id_sidang')");
      				if ($hasil) {
      					echo '<script language="javascript">alert("Success"); document.location="index.php?menu=penggugat";</script>';
      				}
      				else {
      					echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=penggugat";</script>';
      				}
				  }
				?>
		</div>
	</div>
</div>