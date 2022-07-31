<?php
require_once __DIR__ . '../../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
include "../../koneksi.php";
$awal = $_POST['awal'];
$akhir = $_POST['akhir'];

$cek_eksekusi = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat WHERE tgl_lapor BETWEEN '" . $awal . "' AND '" . $akhir . "';");
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
 <h3 align="center">REKAPITULASI BIAYA SIDANG PERDATA</h3>
 <h4 align="center">Pada Tanggal ' . tgl_indo($awal) . ' Sampai Dengan ' . tgl_indo($akhir) . '</h4>
 <table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama Penggugat</th>
        <th>Nama Tergugat</th>
        <th>Perihal Perkara</th>
        <th>Tanggal Lapor</th>
        <th>Nomor Putusan</th>
        <th>Total Biaya</th>
        </tr>
    </thead>
    <tbody>';
$no = 1;
while ($data_eksekusi = mysqli_fetch_assoc($cek_eksekusi)) {
    $html .= '<tr>
                    <td>' .  $no++ . '</td>
                    <td>' . $data_eksekusi["nama_p"] . '</td>
                    <td>' . $data_eksekusi["nama_t"] . '</td>
                    <td>' . $data_eksekusi["perihal_perkara"] . '</td>
                    <td>' . tgl_indo($data_eksekusi["tgl_lapor"]) . '</td>';

    if ($data_eksekusi["tgl_putusan"]) {
        $html .= '<td>W15-U13/' . getNomor($data_eksekusi["tgl_putusan"], $data_eksekusi['id_permohonan'], "HK", "02") . '</td>';
    } else {
        $html .= '<td>Belum Diputuskan</td>';
    }
    $id_biaya = $data_eksekusi["id_biaya"];
    $id_permohonan = $data_eksekusi["id_permohonan"];
    $h = mysqli_query($connect, "SELECT * FROM tb_biaya WHERE id_biaya=$id_biaya AND id_permohonan = $id_permohonan");
    $data = mysqli_fetch_array($h);
    $total = $data['pendaftaran'] + $data['proses'] + $data['panggilan'] + $data['mediasi'] + $data['pemberitahuan'] + $data['redaksi'] + $data['putusan'] + $data['materai'];
    if ($id_biaya) {
        $html .= '<td align="center">' . rupiah($total) . '</td>';
    } else {
        $html .= '<td align="center">Belum Ada Biaya</td>';
    }
}

$a = mysqli_query($connect, "SELECT SUM(pendaftaran) AS total1, SUM(proses) AS total2,SUM(panggilan) AS total3, SUM(mediasi) AS total4, SUM(pemberitahuan) AS total5, SUM(redaksi) AS total6,SUM(putusan) AS total7,SUM(materai) AS total8 FROM tb_biaya;");
$sumtot = mysqli_fetch_array($a);
$sumtot = $sumtot['total1'] + $sumtot['total2'] + $sumtot['total3'] + $sumtot['total4'] + $sumtot['total5'] + $sumtot['total6'] + $sumtot['total7'] + $sumtot['total8'];
$html .= '
</tr><tr>
<td colspan="6" align="center">TOTAL</td>
<td align="center">' . rupiah($sumtot) . '</td>';
$html .= '</tr>
</tbody> 
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
