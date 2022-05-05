<?php
require_once __DIR__ . '../../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
include "../../koneksi.php";
$id_permohonan = $_GET['id_permohonan'];
$cek_permohonan = mysqli_query($connect, "SELECT * FROM tb_permohonan WHERE id_permohonan='$id_permohonan'");
$data_permohonan = mysqli_fetch_assoc($cek_permohonan);

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Surat Putusan</title>
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
        margin-left:700px;
    }
    </style>
 </head>
 <body> 
 <div class="left">
    <center><img src="../../assets/images/logo.png" width="32%"></center>
 </div>
 <div class="right">
     <h2 align="center">PENGADILAN NEGERI BANJARBARU KELAS II</h2>
     <p align="center">Jl. A. Yani Km. 18,5 Banjarbaru<br>
     Telp. (0511) 4705562, Fax. (0511) 4705356</p>
 </div>
 <hr>
 <h3 align="center">Surat Putusan ' . $data_permohonan['jenis_permohonan'] . '</h3>
 <ol>
 <p><b>Menetapkan</b></p>
    <li>Mengabulkan Permohonan Pemohon</li>
    <li>Memberikan Izin Hak Asuh Anak Kepada : ' . $data_permohonan['nama_pemohon'] . '</li>
    <li>Membebankan Biaya Permohonan Sebesar : Rp. ' . $data_permohonan['biaya'] . '</li>
    <li>Tanggal Sidang : ' . $data_permohonan['tgl_sidang'] . '</li>
</ol>


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
