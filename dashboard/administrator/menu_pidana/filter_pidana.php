<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-user"></i> Tentukan Rentang Tanggal
                <!-- <a class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Tambah Data permohonan</a> -->
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col" style="width: 60rem; height: 450px;">
                <div class="card" style="width: 50rem;">
                    <div class="card-body">
                        <h5 class="card-title">Masukan Rentang Tanggal</h5>
                        <form method="post" action="laporan_pidana.php">
                            <div class="form-group">
                                <div class="mb-2">
                                    <label class="mb-2">Tanggal Awal</label>
                                    <div class="">
                                        <input type="date" name="tgl_awal" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <label class="">Tanggal Akhir</label>
                                <div class="">
                                    <input type="date" name="tgl_akhir" required="required" placeholder="Isikan Tanggal sidang" class="form-control col-md-7 col-xs-12">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="isi_putusan" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>