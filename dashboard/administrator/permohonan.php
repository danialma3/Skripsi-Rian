<?php
$act=(isset($_GET['act']) ? strtolower($_GET['act']) : NULL);//$_GET[act];
if($act=='del'){
    $id=$_GET['id_permohonan'];
    $q=mysqli_query($connect, "DELETE FROM tb_permohonan WHERE id_permohonan='$id'");
    echo"<script>document.location.href='index.php?menu=permohonan'</script>";
}
elseif($act=='edit'){
    $id=$_GET['id_permohonan'];
    $q=mysqli_query($connect, "SELECT * FROM tb_permohonan WHERE id_permohonan='$id'");
    $data=mysqli_fetch_array($q); ?>


    <form action="" method="POST" class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit Data permohonan</h2>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama permohonan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_permohonan" required="required" placeholder="Isikan Nama permohonan" class="form-control col-md-7 col-xs-12" value="<?php echo $data['nama_permohonan'];?>">
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
                  <input type="submit" name="edit" class="btn btn-primary" value="Edit Data permohonan">
                </div>
              </div>
            </div>
          </div>
        </div>
            </form>
<?php
        if(isset($_POST['edit'])){
          $nama_permohonan=$_POST['nama_permohonan'];
          $tmp_lahir=$_POST['tmp_lahir'];
          $tgl_lahir=$_POST['tgl_lahir'];
          $kelamin=$_POST['kelamin'];
          $tmp_tinggal=$_POST['tmp_tinggal'];
          $agama=$_POST['agama'];
          $pendidikan=$_POST['pendidikan'];
          $warganegara=$_POST['warganegara'];
          $pengacara=$_POST['pengacara'];
            $hasil = mysqli_query($connect, "UPDATE tb_permohonan SET nama_permohonan='$nama_permohonan', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', kelamin='$kelamin', tmp_lahir='$tmp_lahir', agama='$agama',pendidikan='$pendidikan',warganegara='$warganegara',pengacara='$pengacara' WHERE id_permohonan='$id'");
              if ($hasil) {
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
              }
              else {
                echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=permohonan";</script>';
              }
          }
}
else { ?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-user"></i> Data permohonan
      <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a></h2>
    <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="table-responsive">
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No permohonan</th>
            <th>Jenis Permohonan</th>
            <th>Nama Pemohon</th>
            <th>Tempat Pemohon</th>
            <th>Nama Termohon</th>
            <th>Nama Baru</th>
            <th>Tanggal Daftar</th>
            <th>Nama Majelis</th>
            <th>ID Panitera</th>
            <th>Tanggal Sidang</th>
            <th>Tanggal Putusan</th>
            <th>Akta</th>
            <th>Biaya</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query=mysqli_query($connect, "SELECT * FROM tb_permohonan");
          while($d=mysqli_fetch_array($query))
           { ?>
          <tr>
            <td><?php echo $d['no_pemohon']; ?></td>
            <td><?php echo $d['jenis_permohonan']; ?></td>
            <td><?php echo $d['nama_pemohon']; ?></td>
            <td><?php echo $d['tempat_pemohon']; ?></td>
            <td><?php echo $d['nama_termohon']; ?></td>
            <td><?php echo $d['nama_baru']; ?></td>
            <td><?php echo $d['tgl_daftar']; ?></td>
            <td><?php echo $d['nama_majelis']; ?></td>
            <td><?php echo $d['id_panitera']; ?></td>
            <td><?php echo $d['tgl_sidang']; ?></td>
            <td><?php echo $d['tgl_putusan']; ?></td>
            <td><?php echo $d['akta']; ?></td>
            <td><?php echo $d['biaya']; ?></td>
            <td align="center"><a class="btn btn-sm btn-danger" href="index.php?menu=permohonan&act=del&id_permohonan=<?php echo $d['id_permohonan'] ?>"><i class="fa fa-trash"></i> </a>
              <a class="btn btn-sm btn-warning" href="index.php?menu=permohonan&act=edit&id_permohonan=<?php echo $d['id_permohonan']; ?>"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-sm btn-success" href="../laporan/surat_putusan.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a></td> 
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
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
						  <h2>Tambah Data Permohonan</h2>
						  <div class="clearfix"></div>
						</div>
						<div class="x_content">
            <br />
              <form id="demo-form2"  enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Permohon<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="no_pemohon" required="required" placeholder="Isikan Nomor Permohonan" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Permohonan<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="jenis_permohonan" required="required" class="form-control col-md-7 col-xs-12">
                      <option value="Hak Asuh Anak">Hak Asuh Anak</option>
                      <option value="Pergantian Nama">Pergantian Nama</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pemohon<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_pemohon" required="required" placeholder="Isikan Nama Pemohon" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Pemohon<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="tempat_pemohon" required="required" placeholder="Isikan Tempat Pemohon" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Termohon<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_termohon" required="required" placeholder="Isikan Nama Termohon" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Baru </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_baru" required="required" placeholder="Isikan Nama Baru" class="form-control col-md-7 col-xs-12">
                  <i>Hanya Diisi Jika Jenis Permohonan Pergantian Nama</i>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Daftar<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tgl_daftar" required="required" placeholder="Isikan Tanggal Daftar" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Majelis<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="nama_majelis" required="required" placeholder="Isikan Nama Majelis" class="form-control col-md-7 col-xs-12">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Akta<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="akta" required="required" placeholder="Isikan Akta" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="number" name="biaya" required="required" placeholder="Isikan Biaya" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="reset" class="btn btn-danger" value="Batal">
                  <input type="submit" name="simpan" class="btn btn-primary" value="Tambah Data Permohonan">
                </div>
              </div>
              </form>
            </div>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['simpan'])){
          $no_pemohon = $_POST['no_pemohon'];
          $jenis_permohonan = $_POST['jenis_permohonan'];
          $nama_pemohon = $_POST['nama_pemohon'];
          $tempat_pemohon = $_POST['tempat_pemohon'];
          $nama_termohon = $_POST['nama_termohon'];
          $nama_baru = $_POST['nama_baru'];
          $tgl_daftar = $_POST['tgl_daftar'];
          $nama_majelis = $_POST['nama_majelis'];
          $id_panitera = $_POST['id_panitera'];
          $tgl_sidang = $_POST['tgl_sidang'];
          $tgl_putusan = $_POST['tgl_putusan'];
          $akta = $_POST['akta'];
          $biaya = $_POST['biaya'];
				   
          if ($jenis_permohonan == "Pergantian Nama") {
            $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan (no_pemohon,jenis_permohonan,nama_pemohon,tempat_pemohon,nama_termohon,nama_baru,tgl_daftar,nama_majelis,id_panitera,tgl_sidang,tgl_putusan,akta,biaya) values ('$no_pemohon','$jenis_permohonan','$nama_pemohon','$tempat_pemohon','$nama_termohon','$nama_baru','$tgl_daftar','$nama_majelis','$id_panitera','$tgl_sidang','$tgl_putusan','$akta','$biaya')");
                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
          }
          else {
            $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan (no_pemohon,jenis_permohonan,nama_pemohon,tempat_pemohon,nama_termohon,tgl_daftar,nama_majelis,id_panitera,tgl_sidang,tgl_putusan,akta,biaya) values ('$no_pemohon','$jenis_permohonan','$nama_pemohon','$tempat_pemohon','$nama_termohon','$tgl_daftar','$nama_majelis','$id_panitera','$tgl_sidang','$tgl_putusan','$akta','$biaya')");

                echo '<script language="javascript">alert("Success"); document.location="index.php?menu=permohonan";</script>';
          
            }
				  }
				?>
		</div>
	</div>
</div>