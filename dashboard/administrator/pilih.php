<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row top_tiles">
          <center>
            <div class="product_price">
              <h1 align="center">Silahkan Pilih Jenis Perkara</h1>
            </div>
          </center>
        </div>
        <div class="col-md-12 col-sm-4 col-xs-12"">
          <div class=" animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count">
              <?php
              $a = mysqli_query($connect, "SELECT * FROM tb_permohonan_j WHERE id_hakim != '' ");
              $b = mysqli_num_rows($a);
              echo $b;
              ?>
            </div>
            <a href="index.php?menu=hkm_pidana">
              <h3>Laporan Tugas Hakim Pidana</h3>
            </a>
            <p>Klik Untuk Lihat</p>
          </div>
        </div>
        <div class=" animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-user"></i></div>
            <div class="count">
              <?php
              $a = mysqli_query($connect, "SELECT * FROM tb_permohonan_p WHERE id_hakim != ''");
              $b = mysqli_num_rows($a);
              echo $b;
              ?>
            </div>
            <a href="index.php?menu=hkm_pidana">
              <h3>Laporan Tugas Hakim perdata</h3>
            </a>
            <p>Klik Untuk Lihat</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>