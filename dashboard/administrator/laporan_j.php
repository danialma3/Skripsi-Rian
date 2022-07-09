<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-user"></i> Data permohonan
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
                            <th>Permohonan Sidang</th>
                            <th>Jadwal Sidang</th>
                            <th>Pengusan Hakim</th>
                            <th>Putusan</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa");
                        while ($d = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $d['nama_j']; ?></td>
                                <td><?php echo $d['jenis_pengajuan']; ?></td>
                                <td><?php echo $d['perihal_perkara']; ?></td>
                                <td><?php echo $d['tgl_lapor']; ?></td>
                                <td><?php echo $d['nama_t']; ?></td>
                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan/laporan_gugatan_pidana.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan/jadwal_j.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan/penugasan_hakim.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan/keputusan.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>