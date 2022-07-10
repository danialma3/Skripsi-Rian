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
    $cek_gugatan = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat WHERE tb_permohonan_p.id_permohonan = '$id_permohonan';");
    $jaksa = mysqli_query($connect, "SELECT * FROM tb_jaksa WHERE '" . $_SESSION['nip'] . "'");
    while ($data = mysqli_fetch_array($jaksa)) {
        $data_nama = $data['nama_j'];
        $data_nip = $data['nip_j'];
        $data_nama = $data['nama_j'];
        $data_pangkat = $data['pangkat_j'];
        $data_asal_kejaksaan = $data['asal_kejaksaan'];
        $data_alamat_kejaksaan = $data['alamat_kejaksaan'];
        $jadwal = $data['tgl_sidang'];
    }
}
$data_gugatan = mysqli_fetch_assoc($cek_gugatan);

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Putusan Perdata</title>
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
 <h3 align="center" ><u>Surat Putusan Pengadilan Sidang Perdata</u></h3>
<h4 align="center">Demi Keadilan Berdasarkan Ketuhanan yang Maha Esa</h4><br>
<p> Pengadilan Negeri Banjarbaru Kelas II yang memeriksa dan memutus perkara perdata pada pengadilan tingkat kedua telah menjatuhkan putusan sebagai berikut dalam perkara gugatan antara :</p>
</div>
 <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>';


$html .= '
    <tr>
    <td width="140px">Nama Penggugat</td>
    <td width="30px">:</td>
    <td>' . $data_gugatan['nama_p']  . '</td>
    </tr>
    <tr>
    <td>Berkedudukan</td>
    <td>:</td>
    <td>' . $data_gugatan['alamat_p'] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><h4>Melawan</h4></td>
    </tr>
    <tr>
    <td width="140px">Nama Tergugat</td>
    <td width="30px">:</td>
    <td>' . $data_gugatan['nama_t']  . '</td>
    </tr>
    <tr>
    <td>Berkedudukan</td>
    <td>:</td>
    <td>' . $data_gugatan['alamat_t'] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td><br></td>
    </tr>
    <tr>
    <td colspan="3"><p>Pengadilan Negeri tersebut telah membaca berkas perkara dan telah mendengar kedua belah pihak yang berperkara.</p></td>
    </tr>
    <tr>
    <td colspan="3" align="center"><h4>Tentang Duduk Perkara</h4><br></td>
    </tr>
    <tr>
    <td colspan="3"><p>Menimbang, bahwa Penggugat dengan surat gugatan tertanggal ' . $data_gugatan['tgl_lapor'] . ' yang diterima dan di daftarkan di Kepaniteraan Pengadilan Negeri Banjarbaru Kelas II Telah mengajukan gugatan ' . $data_gugatan["perihal_perkara"] . '.</p><br></td>
    </tr>
    <tr>
    <td colspan="3"><p>Menimbang, bahwa pada hari persidangan telah ditentukan untuk Penggugat dan Tergugat masing-masing menghadap kuasanya tersebut.</p><br></td>
    </tr>
    <tr>
    <td colspan="3"><p>Menimbang, bahwa dengan hal tersebut diatas maka ' . $data_gugatan['hasil'] . '.</p><br></td>
    </tr>
    </thead>
    
    ';
$html .= '</tbody>
    </table>
    <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>
    <tr>
    <td colspan="3">Demikian surat keputusan ini dibuat, agar digunakan sebagaimana mestinya.</td>
    </tr>
    </thead>
    </table><br><br>

<div class="ttd">
Diputuskan di : Banjarbaru<br>
Pada tanggal : ' . $data_gugatan['tgl_putusan'] . '<br>
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
