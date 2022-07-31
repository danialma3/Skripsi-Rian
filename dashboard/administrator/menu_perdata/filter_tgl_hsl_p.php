<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h2><i class="fa fa-user"></i> Data Hasil dan Tanggal Putusan Perkara Perdata</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm" style="width: 40rem;">
                        <form method="post" action="laporan_tgl_hsl_p.php">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label class="mb-2">Tanggal Awal</label>
                                    <div class="">
                                        <input type="date" name="tgl_awal" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                                <label class="">Tanggal Akhir</label>
                                <div class="">
                                    <input type="date" name="tgl_akhir" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
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
                            <th>Nama Penggugat</th>
                            <th>Nama Tergugat</th>
                            <th>Perihal Perkara</th>
                            <th>Tanggal Lapor</th>
                            <th>Jadwal Sidang</th>
                            <th>Tanggal Putusan</th>
                            <th>Nomor Ketetapan</th>
                            <th>Cetak </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat");
                        $no = 1;
                        while ($d = mysqli_fetch_array($query)) {
                            $tgl_lapor = $d["tgl_lapor"];
                        ?>

                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $d['nama_p']; ?></td>
                                <td><?php echo $d['nama_t']; ?></td>
                                <td><?php echo $d['perihal_perkara']; ?></td>
                                <td><?php echo tgl_indo($d['tgl_lapor']); ?></td>
                                <?php if ($d['tgl_sidang']) { ?>
                                    <td><?php echo tgl_indo($d['tgl_sidang']); ?></td>
                                <?php } else { ?>
                                    <td align="center"><u>Tanggal Belum Ditentukan</u></td>
                                <?php } ?>
                                <?php if ($d['tgl_putusan']) { ?>
                                    <td><?php echo tgl_indo($d['tgl_putusan']); ?></td>
                                    <td>
                                        <?php
                                        echo "W15-U13/" . getNomor($d['tgl_putusan'], $d['id_permohonan'], "HK", "01");
                                        ?>
                                    </td>

                                <?php
                                } else { ?>
                                    <td>Belum Diputuskan!!</td>
                                    <td align="center">
                                        <?php echo 'Belum Diputuskan!!'; ?>
                                    <?php }
                                    ?>
                                    </td>

                                    <?php if ($d['tgl_putusan'] and $d['hasil']) { ?>
                                        <td align="center" width="100px">
                                            <a class="btn btn-sm btn-success" href="../laporan/keputusan.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></class=>
                                        </td>
                                    <?php
                                    } else { ?>
                                        <td align="center" width="100px">
                                            <a class="btn btn-sm btn-success" disabled><i class="fa fa-print"></i></a>
                                        </td>
                                    <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>