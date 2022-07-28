<?php
session_start();
require 'functions.php';
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
        $lapor = $data['tgl_lapor'];
    }
}
$data_gugatan = mysqli_fetch_assoc($cek_gugatan);

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title></title>
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
    }    
    .right-ttd {
        
    }
    </style>
 </head>
 <body> 
 <div class="left">
 <center><img src="../../assets/images/logo.png" width="32%"></center>
</div>
<div class="right">
<h2 align="center">PENGADILAN NEGERI BANJARBARU KELAS II</h2>
<p align="center">Jl. A. Yani Km. 18,5 Banjarbaru</p><br>
</div>
<hr>
 <h3 align="center" ><u>Penunjukan Ketua Hakim</u></h3>
 <h4 align="center" >Nomor : W15-U13/' . getNomor($data_gugatan["tgl_putusan"], $data_gugatan['id_permohonan'], "HK", "01") . '</h4>
 <h4 align="center" >"Demi Keadilan Berdasarkan Ketuhanan Yang Maha Esa"</h4><br>
 <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>';


$html .= '
    <br>
    <tr>
    <td>Membaca</td>
    <td>:</td>
    <td>Berdasarkan perkara pidana yang dilimpahkan oleh jaksa Penuntut Umum Pada Kejaksaan ' . $data_asal_kejaksaan . ' dengan surat permohonan tanggal ' . tgl_indo($data_gugatan['tgl_lapor']) . '</td>
    </tr>
    <br>
    <tr>
    <td>Terdakwa</td>
    <td>:</td>
    <td>' . $data_gugatan['nama_t'] . '</td>
    </tr>
    <tr>
    <td>Menimbang</td>
    <td>:</td>
    <td>Memeriksa dan mengadili perkara tersebut diatas perlu ditetapkan hakim yang mengadili sebagaimana tertera dalam penetapan dibawah ini</td>
    </tr>
    <tr>
    <td>Mengingat</td>
    <td>:</td>
    <td>- Undang-undang RI No. 48 Tahun 2009 Tentang Kekuasaan Kehakiman</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <br>
    <tr>
    <td align="center" colspan="3">-----MENETAPKAN----</td>
    </tr>
    <br>
    <br>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>Nama Ketua Hakim</td>
    ';
$id_hakim = $data_gugatan["id_hakim"];
$hakim = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE  id_hakim = $id_hakim");
$hakim = mysqli_fetch_assoc($hakim);
$html .= '
    <td>:</td>
    <td >' . $hakim['nama_hakim'] . '</td>
    </tr>
    </thead>
    ';
$html .= '</tbody>
    </table><br>
    <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>
    <tr>
    <td colspan="3"> Untuk memeriksa dan mengadili perkara tersebut diatas .</td>
    </tr>
    </thead>
    </table><br><br>

<div class="ttd">
Ketua Pengadilan Negeri Banjarbaru Kelas II,<br><br><br><br><br><br>

Benny Sudarsono, SH., MH<br>
Pembina (IV/a)<br>
19781214 200212 1 005
</div>
</div>
 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
