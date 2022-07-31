<?php
require_once __DIR__ . '../../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
include "../../koneksi.php";
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

$cek_eksekusi = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa WHERE tgl_lapor BETWEEN '" . $awal . "' AND '" . $akhir . "';");
require_once 'functions.php';
$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Laporan Data Eksekusi</title>
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
     <h2 align="center">KEPANITERAAN HUKUM <br>PENGADILAN NEGERI BANJARBARU KELAS II</h2>
     <p align="center">Jl. A. Yani Km. 18,5 Banjarbaru<br>
     Telp. (0511) 4705562, Fax. (0511) 4705356</p>
 </div>
 <hr>
 <h3 align="center">REKAPITULASI DATA JADWAL PIDANA</h3>
 <h4 align="center">Pada Tanggal ' . tgl_indo($awal) . ' Sampai Dengan ' . tgl_indo($akhir) . '</h4>
 <table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Jaksa</td>
            <td>Jenis Gugatan</td>
            <td>Perihal Perkara</td>
            <td>Tanggal Lapor</td>
            <td>Tanggal Sidang</td>
            <td>Nama Tegugat</td>
            <td>Nomor Kasus</td>
        </tr>
    </thead>
    <tbody>
    </tbody>';
$no = 1;
while ($data_eksekusi = mysqli_fetch_assoc($cek_eksekusi)) {
    $dt = $data_eksekusi['no_putusan'];
    $html .= '<tr>
                    <td>' . $no . '</td>
                    <td>' . $data_eksekusi["nama_j"] . '</td>
                    <td>' . $data_eksekusi["jenis_pengajuan"] . '</td>
                    <td>' . $data_eksekusi["perihal_perkara"] . '</td>
                    <td>' . tgl_indo($data_eksekusi["tgl_lapor"]) . '</td>
                    <td>' . tgl_indo($data_eksekusi["tgl_sidang"]) . '</td>
                    <td>' . $data_eksekusi["nama_t"] . '</td>
                    <td>W15-U13/' . getNomor($data_eksekusi["tgl_lapor"], $data_eksekusi['id_permohonan'], "PAN", "01") . '</td>
                </tr>';
    $no++;
}
$html .= '</tbody> 
</table>

<div class="right-ttd">
Banjarbaru,' . date('d F Y') . '<br>
Ketua Pengadilan Negeri Banjarbaru<br><br><br><br>

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
