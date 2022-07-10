<?php
session_start();
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
    }
    $query = mysqli_query($connect, "SELECT * FROM tb_biaya WHERE id_permohonanx = '$id_permohonan'");
}
$data_gugatan = mysqli_fetch_assoc($cek_gugatan);
$biaya = mysqli_fetch_assoc($query);


$html = '
<!DOCTYPE html>
 <html>
 <head>
    <title>Jadwal Sidang Perdata</title>
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
 <h3 align="center" ><u>Biaya Panjar Sidang Perdata</u></h3><br>
 <div class="ttd">

</div>
</div>
 <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <thead>';


$html .= '
    <tr>
    <td colspan="3">Biaya sidang perkara perdata atas nama Saudara/ i:</td>
    </tr>
    <tr>
    <td width="150px">Nama</td>
    <td width="30px">:</td>
    <td>' . $data_gugatan["nama_p"] . '</td>
    </tr>
    <tr>
    <td>Pekerjaann</td>
    <td>:</td>
    <td>' . $data_gugatan["pekerjaan_p"] . '</td>
    </tr>
    <tr>
    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td>' . $data_gugatan["alamat_p"] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td colspan="3">Melaporkan gugatan sidang atas kasus ' . $data_gugatan['perihal_perkara'] . ' Melawan:</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>Nama Perseorangan/ Perusahaan</td>
    <td>:</td>
    <td>' . $data_gugatan["nama_t"] . '</td>
    </tr>
    <tr>
    <td>Pekerjaan/ Bidang</td>
    <td>:</td>
    <td>' . $data_gugatan["pekerjaan_t"] . '</td>
    </tr>
    <tr>
    <tr>
    <td>Alamat</td>
    <td>:</td>
    <td>' . $data_gugatan["alamat_t"] . '</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    
    </thead>
    </table><br><br>
    <table border="1" cellspacing="0" class="text-center">
    <tbody>
        <tr>
            <td width="36" valign="top">
                <p>
                    No
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Uraian Biaya
                </p>
            </td>
            <td width="350" valign="top">
                <p>
                    Harga
                </p>
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    1
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Biaya Pendaftaran
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['pendaftaran'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    2
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Biaya Proses
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['proses'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    3
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Biaya Panggilan
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['panggilan'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    4
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Mediasi
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['mediasi'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    5
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Pemberitahuan
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['pemberitahuan'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    6
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Redaksi Sidang
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['redaksi'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    7
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Redaksi Putusan
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['putusan'] . '
            </td>
        </tr>
        <tr>
            <td width="36" valign="top">
                <p>
                    8
                </p>
            </td>
            <td width="300" valign="top">
                <p>
                    Materai
                </p>
            </td>
            <td width="350" valign="top">
            Rp. ' . $biaya['materai'] . '
            </td>
        </tr>
    </tbody>
</table>
</div>

 </body>
 </html>
 ';
$mpdf->WriteHTML($html);
$mpdf->Output();
