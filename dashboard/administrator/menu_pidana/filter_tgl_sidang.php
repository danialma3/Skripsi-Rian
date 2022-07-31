<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h2><i class="fa fa-user"></i> Jadwal Sidang</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm" style="width: 40rem;">
                        <form method="post" action="laporan_tgl_sidang.php">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label class="mb-2">Tanggal Awal</label>
                                    <div class="">
                                        <input type="date" name="tgl_awal" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                                <label class="">Tanggal Akhir</label>
                                <div class="">
                                    <input type="date" name="tgl_akhir" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="mt-3">
                                    <button type="submit" name="isi_putusan" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jaksa</th>
                            <th>Jenis Pengajuan</th>
                            <th>Perihal Perkara</th>
                            <th>Tanggal Lapor</th>
                            <th>Nama Tergugat</th>
                            <th>Nomor Kasus</th>
                            <th>Cetak Laporan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa");
                        $no = 1;
                        while ($d = mysqli_fetch_array($query)) {
                            $tgl_lapor = $d["tgl_lapor"];
                        ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $d['nama_j']; ?></td>
                                <td><?php echo $d['jenis_pengajuan']; ?></td>
                                <td><?php echo $d['perihal_perkara']; ?></td>
                                <td><?php echo tgl_indo($d['tgl_lapor']); ?></td>
                                <td><?php echo $d['nama_t']; ?></td>
                                <td><?php echo "W15-U13/" . getNomor($d['tgl_lapor'], $d['id_permohonan'], "PAN", "01"); ?></td>
                                <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan/jadwal_j.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a> Cetak</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>