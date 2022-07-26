<?php
include "../../koneksi.php";
$a = mysqli_query($connect, "SELECT * FROM tb_pengguna where nip='" . $_SESSION['nip'] . "'");
while ($b = mysqli_fetch_array($a)) {
    $nip = $b['nip'];
    $nama = $b['nama_pengguna'];
    $username = $b['username'];
}

$query = mysqli_query($connect, "SELECT * FROM tb_permohonan_p RIGHT JOIN tb_penggugat ON tb_permohonan_p.nip = tb_penggugat.nip AND tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat");

?>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-list"></i> Data Gugatan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Penggugat</th>
                        <th>Jenis Sidang</th>
                        <th>Perihal</th>
                        <th>Nama Tergugat</th>
                        <th>Nama Hakim</th>
                        <th>Tanggal Sidang</th>
                        <th>Tanggal Putusan</th>
                        <th>Hasil</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($e = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?= $e['nama_p']; ?></td>
                            <?php
                            if ($e['jenis_pengajuan'] and $e['perihal_perkara'] and $e['nama_t']) { ?>
                                <td><?= $e['jenis_pengajuan']; ?></td>
                                <td><?= $e['perihal_perkara']; ?></td>
                                <td><?= $e['nama_t']; ?></td>
                            <?php } else { ?>
                                <td align="center" colspan="3"><i>Anda Belum Melengkapi Data Penggugat</i></td>
                            <?php } ?>
                            <?php
                            if ($e['id_hakim'] and $e['tgl_sidang']) { ?>
                                <?php $id_hakim = $e["id_hakim"];
                                $h = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE id_hakim=$id_hakim");
                                $data_hakim = mysqli_fetch_array($h); ?>
                                <td><?= $data_hakim['nama_hakim']; ?></td>
                                <td><?= $e['tgl_sidang']; ?></td>
                                <?php if ($e['tgl_putusan']) { ?>
                                    <td><?= $e['tgl_putusan']; ?></td>
                                <?php } else { ?>
                                    <td>Belum Ada Tanggal Sidang putusan</td>
                                <?php } ?>
                                <?php if ($e['hasil']) { ?>
                                    <td><?= $e['hasil']; ?></td>
                                <?php } else { ?>
                                    <td>Belum Ada Hasil Sidang</td>
                                <?php } ?>
                            <?php } else { ?>
                                <td align="center" colspan="4"><i>Belum Ada Putusan Mohon Tunggu</i></td>
                            <?php } ?>
                            <?php if ($e['id_permohonan']) { ?>
                                <td align="center"><a class="btn btn-sm btn-success" href="../laporan/laporan_gugatan.php?id_permohonan=<?php echo $e['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a>
                                <?php } else { ?>
                                <td align="center"><a class="btn btn-sm btn-success disabled" href="../laporan/laporan_gugatan.php?id_permohonan=<?php echo $e['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a>
                                <?php } ?>
                                <a class="btn btn-sm btn-danger" href="index.php?menu=permohonan&act=del&id_permohonan=<?php echo $e['id_permohonan'] ?>"><i class="fa fa-trash"></i> </a>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>