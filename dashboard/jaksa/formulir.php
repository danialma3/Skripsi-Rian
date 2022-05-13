<?php
$nip = $_GET['nip'];

?>

<div class="container">
    <center>
        <h3 style="margin-top: 20px;"><b>Pengajuan Sidang Perkara Perdata</b>
    </center>
    <br>
    <div class="row">
        <form id="demo-form2" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Tergugat<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="nama_tergugat" required="required" placeholder="Isikan Nama Tergugat" class="form-control col-md-7 col-xs-12">
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
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="reset" class="btn btn-danger" value="Batal">
                    <input type="submit" name="simpan" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12">
        <div>
            <p align="center">
                <hr>©2020 All Rights Reserved Developed By : Subhan Febrianto Privacy and Terms
            </p>
        </div>
    </div>
</div>
</body>

</html>
<?php


if (isset($_POST['simpan'])) {

    $c = mysqli_query($connect, "SELECT * FROM tb_penggugat where nip = $nip");
    while ($d = mysqli_fetch_array($c)) {
        $id_penggugat = $d['id_penggugat'];
    }
    $nama_t = $_POST['nama_tergugat'];
    $pekerjaan_t = $_POST['pekerjaan_t'];
    $tempat_lahir_t = $_POST['tempat_lahir_t'];
    $tgl_lahir_t = $_POST['tgl_lahir_t'];
    $alamat_t = $_POST['alamat_t'];
    $jenis_pengajuan = $_POST['jenis_pengajuan'];
    $perihal_perkara = $_POST['perihal_perkara'];
    $tgl_pengajuan = date("Y-m-d");
    $hasil = mysqli_query($connect, "INSERT INTO tb_permohonan (jenis_pengajuan, perihal_perkara, tgl_lapor, nama_t, pekerjaan_t, tempat_lahir_t, tgl_lahir_t, alamat_t, id_panitera, nama_hakim, tgl_sidang, tgl_putusan, biaya, hasil, id_penggugat) values ('$jenis_pengajuan', '$perihal_perkara', $tgl_pengajuan, '$nama_t', '$pekerjaan_t', '$tempat_lahir_t', $tgl_lahir_t, '$alamat_t', 2, '', 0000-00-00, 0000-00-00, '', '', 2)");
    if ($hasil) {
        echo '<script language="javascript">alert("Success"); document.location="index.php?menu=formulir&nip=' . $nip . '";</script>';
    } else {
        echo '<script language="javascript">alert("Gagal"); document.location="index.php?menu=formulir&nip=' . $nip . '";</script>';
    }
}
?>