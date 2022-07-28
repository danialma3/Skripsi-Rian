<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-user"></i> Data Kasus Pidana:
                <!-- <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a> -->
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
                            <th>Pekerjaan Tergugat</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat Tergugat</th>
                            <th>Tanggal Sidang</th>
                            <th>Tanggal Putusan</th>
                            <th>Hasil</th>
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
                                <td><?php echo $d['pekerjaan_t']; ?></td>
                                <td><?php echo $d['tempat_lahir_t']; ?>, <?php echo $d['tgl_lahir_t']; ?></td>
                                <td><?php echo $d['alamat_t']; ?></td>
                                <?php if ($d['tgl_sidang']) { ?>
                                    <td>
                                        <?php echo $d['tgl_sidang']; ?>
                                    </td>
                                <?php } else { ?>
                                    <td align="center">
                                        Panitera Belum Menetukan Tanggal Sidang
                                    </td>
                                <?php } ?>
                                <?php if ($d['tgl_putusan']) { ?>
                                    <td>
                                        <?php echo $d['tgl_putusan']; ?>
                                    </td>
                                <?php } else { ?>
                                    <td align="center">
                                        Anda Belum Memutuskan Tanggal
                                    </td>
                                <?php } ?>
                                <?php if ($d['hasil']) { ?>
                                    <td>
                                        <?php echo $d['hasil']; ?>
                                    </td>
                                <?php } else { ?>
                                    <td align="center">
                                        Anda Belum Memutuskan Hasil
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