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
    }    
    .right-ttd {
        
    }
    </style>
 </head>
 <body> 
 <h3 align="center" ><u>Surat Permohonan Sidang Perdata</u></h3><br>
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
    <td>' . $data_gugatan['nama_p'] . '</td>
    </tr>
    <tr>
    <td>Pekerjaan Pemohon</td>
    <td>:</td>
    <td>' . $data_gugatan['pekerjaan_p'] . '</td>
    </tr>
    <tr>
    <td>Tempat, Tanggal Lahir</td>
    <td>:</td>
    <td>' . $data_gugatan['tmp_lahir_p'] . ', ' . $data_gugatan['tgl_lahir_p'] . '</td>
    </tr>
    <tr>
    <td>Alamat Pemohon</td>
    <td>:</td>
    <td>' . $data_gugatan['alamat_p'] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="3">Dengan ini mengajukan gugatan perdata atas kasus ' . $data_gugatan['perihal_perkara'] . ' terhadap:</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>Nama Termohon</td>
    <td>:</td>
    <td>' . $data_gugatan['nama_t'] . '</td>
    </tr>
    <tr>
    <td>Pekerjaan Termohon</td>
    <td>:</td>
    <td>' . $data_gugatan['pekerjaan_t'] . '</td>
    </tr>
    <tr>
    <td>Tempat, Tanggal Lahir</td>
    <td>:</td>
    <td>' . $data_gugatan['tempat_lahir_t'] . ', ' . $data_gugatan['tgl_lahir_t'] . '</td>
    </tr>
    <tr>
    <td>Alamat Termohon</td>
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
Pembuat Gugatan,<br><br><br><br><br><br>

' . $data_gugatan['nama_p'] . '
</div>
</div>
 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
