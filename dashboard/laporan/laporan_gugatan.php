<?php
session_start();
$id_penggugat = $_GET['id_penggugat'];
if (!isset($_SESSION['nip'])) {
    echo "<script>document.location.href='../index.php'</script>";
} else {
    include "../../koneksi.php";
    require_once __DIR__ . '../../../assets/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $cek_gugatan = mysqli_query($connect, "SELECT * FROM tb_permohonan LEFT JOIN tb_penggugat ON tb_permohonan.id_penggugat = tb_penggugat.id_penggugat WHERE tb_permohonan.id_penggugat = $id_penggugat;");
}

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Laporan Data Gugatan</title>
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
        margin-top:50px;
        margin-left:1000px;
    }
    </style>
 </head>
 <body> 
 <div class="left">
    <center><img src="../../assets/images/logo.png" width="32%"></center>
 </div>
 <div class="right">
     <h2 align="center">KEPANITERAAN HUKUM <br>PENGADILAN NEGERI BANJARBARU KELAS II</h2>
     <p align="center">Jl. A. Yani Km. 18,5 Banjarbaru<br>
     Telp. (0511) 4705562, Fax. (0511) 4705356</p>
 </div>
 <hr>
 <h3 align="center">Berkas Perkara</h3>
 <table border="0" cellpadding="15" cellspacing="0" width="100%">
    <thead>';
$data_gugatan = mysqli_fetch_assoc($cek_gugatan);

$html .= '
    <tr>
    <td>Kasus</td>
    <td>:</td>
    <td>' . $data_gugatan['jenis_permohonan'] . '</td>
    </tr>
    <tr>
    <td>Nama Pemohon</td>
    <td>:</td>
    <td>' . $data_gugatan['nama_pemohon'] . '</td>
    </tr>
    <tr>
    <td>Alamat Pemohon</td>
    <td>:</td>
    <td>' . $data_gugatan['nama_termohon'] . '</td>
    </tr>
    <tr>
    <td>Nama Termohon</td>
    <td>:</td>
    <td>' . $data_gugatan['tmp_tinggal'] . '</td>
    </tr>
    </thead>
    </tbody>
    ';
$html .= '</tbody> 
</table>

<div class="right-ttd">
Banjarbaru, ' . date('d F Y') . '<br>
Ketua Pengadilan Negeri Banjarbaru<br><br><br><br><br><br>

__________________________________
</div>
</div>
 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
