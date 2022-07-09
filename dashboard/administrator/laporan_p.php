<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-user"></i> Data Kasus Perdata
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Jaksa Yang Menggugat</th>
                            <th>Jenis Pengajuan</th>
                            <th>Perihal Perkara</th>
                            <th>Tanggal Lapor</th>
                            <th>nama_tergugat</th>
                            <th>Permohonan Sidang Perdata</th>
                            <th>Jadwal Sidang</th>
                            <th>Biaya Sidang</th>
                            <th>Pengusan Hakim</th>
                            <th>Putusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat");
                        while ($d = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $d['nama_p']; ?></td>
                                <td><?php echo $d['jenis_pengajuan']; ?></td>
                                <td><?php echo $d['perihal_perkara']; ?></td>
                                <td><?php echo $d['tgl_lapor']; ?></td>
                                <td><?php echo $d['nama_t']; ?></td>
                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/laporan_gugatan.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/jadwal_j.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/biaya.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/penugasan_hakim.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/keputusan.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>



                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>