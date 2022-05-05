<?php
require_once __DIR__ . '../../../assets/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode'=>'utf-8','format'=>'A4-L']);
 include "../../koneksi.php";
 $cek_peninjauan = mysqli_query($connect, "SELECT * FROM tb_peninjauan");

$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Laporan Data Peninjauan Kembali</title>
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
 <h3 align="center">LAPORAN DATA PENINJAUAN KEMBALI</h3>
 <table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <td>No</td>
            <td>No Perkara</td>
            <td>Penggugat</td>
            <td>Nama Tegugat</td>
            <td>Alamat Tergugat</td>
            <td>Pekerjaan Tergugat</td>
            <td>Hakim</td>
            <td>Panitera</td>
            <td>Banding</td>
            <td>Kasasi</td>
            <td>Tgl Putusan</td>
            <td>Hasil</td>
        </tr>
    </thead>
    <tbody>
    </tbody>';
            $no=1;
              while ($data_peninjauan = mysqli_fetch_assoc($cek_peninjauan)) {
                $html .= '<tr>
                    <td>'. $no .'</td>
                    <td>'. $data_peninjauan["no_perkara"] .'</td>
                    <td>'. $data_peninjauan["id_penggugat"] .'</td>
                    <td>'. $data_peninjauan["nama_tergugat"] .'</td>
                    <td>'. $data_peninjauan["alamat_tergugat"] .'</td>
                    <td>'. $data_peninjauan["pekerjaan_tergugat"] .'</td>
                    <td>'. $data_peninjauan["id_hakim"] .'</td>
                    <td>'. $data_peninjauan["id_panitera"] .'</td>
                    <td>'. $data_peninjauan["id_banding"] .'</td>
                    <td>'. $data_peninjauan["id_kasasi"] .'</td>
                    <td>'. $data_peninjauan["tgl_putusan"] .'</td>
                    <td>'. $data_peninjauan["hasil_tinjauan"] .'</td>
                </tr>'; $no++; }
    $html .= '</tbody> 
</table>

<div class="right-ttd">
Banjarbaru, 12 Februari 2020<br>
Ketua Pengadilan Negeri Banjarbaru<br><br><br><br><br><br>

__________________________________
</div>
</div>
 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
 ?>