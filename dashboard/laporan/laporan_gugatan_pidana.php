<?php
session_start();
$id_penggugat = $_GET['id_penggugat'];
$id_permohonan = $_GET['id_permohonan'];

if (!isset($_SESSION['nip'])) {
    echo "<script>document.location.href='../index.php'</script>";
} else {
    include "../../koneksi.php";
    require_once __DIR__ . '../../../assets/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $c = mysqli_query($connect, "SELECT * FROM tb_penggugat where nip='" . $_SESSION['nip'] . "'");
    while ($d = mysqli_fetch_array($c)) {
        $id_penggugat = $d['id_penggugat'];
    }
    $cek_gugatan = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa WHERE tb_permohonan_j.id_permohonan = '$id_permohonan';");
    $jaksa = mysqli_query($connect, "SELECT * FROM tb_jaksa WHERE '" . $_SESSION['nip'] . "'");
    while ($data = mysqli_fetch_array($jaksa)) {
        $data_nama = $data['nama_j'];
        $data_nip = $data['nip_j'];
        $data_nama = $data['nama_j'];
        $data_pangkat = $data['pangkat_j'];
        $data_asal_kejaksaan = $data['asal_kejaksaan'];
        $data_alamat_kejaksaan = $data['alamat_kejaksaan'];
    }
}
$data_gugatan = mysqli_fetch_assoc($cek_gugatan);

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Laporan Surat Permohonan Sidang Perdata</title>
    <style>
    .ttd {
        width: 300px;
        margin-left: 400px;
    }
    .left {
        position:fixed;
    }
    .right {
        margin-left:50px;
        width = 90%;
    }    
    .right-ttd {
        
    }
    </style>
 </head>
 <body> 
 <div class="left">
 <center><img src="../../assets/images/kejaksaan_logo.png" width="38%"></center>
</div>
<div class="right">
  <h2 align="center">' . $data_asal_kejaksaan . '</h2>
  <p align="center">' . $data_alamat_kejaksaan . '<br>
</div>
<hr>
 <h3 align="center" ><u>Surat Permohonan Sidang Pidana</u></h3><br>
 <div class="ttd">
Banjarbaru, ' . $data_gugatan['tgl_lapor'] . '<br>
Kepada Yth. Ketua Pengadilan Negeri kelas II<br>
di - <br>
Banjarbaru<br><br><br>
</div>
</div>
 <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>';


$html .= '
    <tr>
    <td width="150px">Nama Pemohon</td>
    <td width="30px">:</td>
    <td>' . $data_nama . '</td>
    </tr>
    <tr>
    <td>Pangkat</td>
    <td>:</td>
    <td>' . $data_pangkat . '</td>
    </tr>
    <tr>
    <td>NIP</td>
    <td>:</td>
    <td>' . $data_nip . '</td>
    </tr>
    <tr>
    <td>Jabatan</td>
    <td>:</td>
    <td>Jaksa Penuntut Umum</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="3">Dengan ini mengajukan gugatan pidana atas kasus ' . $data_gugatan['perihal_perkara'] . ' terhadap:</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>Nama Tersangka</td>
    <td>:</td>
    <td>' . $data_gugatan['nama_t'] . '</td>
    </tr>
    <tr>
    <td>Pekerjaan Tersangka</td>
    <td>:</td>
    <td>' . $data_gugatan['pekerjaan_t'] . '</td>
    </tr>
    <tr>
    <td>Tempat, Tanggal Lahir</td>
    <td>:</td>
    <td>' . $data_gugatan['tempat_lahir_t'] . ', ' . $data_gugatan['tgl_lahir_t'] . '</td>
    </tr>
    <tr>
    <td>Alamat Tersangka</td>
    <td>:</td>
    <td>' . $data_gugatan['alamat_t'] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </thead>
    ';
$html .= '</tbody>
    </table>
    <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>
    <tr>
    <td colspan="3">Demikian surat permohonan ini saya berharap Ketua Pengadilan Tinggi Kelas II Banjarbaru dapat memfasilitasi jadwal sidang dan memanggil Tergugat agar berada pada persidangan.</td>
    </tr>
    </thead>
    </table><br><br>

<div class="ttd">
Jaksa Penuntut Umum,<br><br><br><br><br><br>

' . $data_nama . '<br>
' . $data_pangkat . '<br>
' . $data_nip . '
</div>
</div>
 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
