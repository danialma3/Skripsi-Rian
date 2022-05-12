<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row top_tiles">
          <center>
            <div class="product_price">
              <h1 align="center">Hallo, Admin !!!</h1>
            </div>
            <small><i class="fa fa-check"></i> You Logged As Administrator</small><br>
            <h3><small>Sistem Informasi Kepaniteraan Hukum <br>Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</small></h3><br>Silahkan kelola data - data anda<br>Selamat bekerja, jangan lupa logout setelah selesai menggunakan aplikasi ini
            <hr>
          </center>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_pengguna");
            $b = mysqli_num_rows($a);
            echo $b;
            ?>
          </div>
          <h3>Data User</h3>
          <p>Jumlah data user account</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_gugatan");
            $b = mysqli_num_rows($a);
            echo $b;
            ?></div>
          <h3>Gugatan</h3>
          <p>Jumlah Data Gugatan</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-briefcase"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_penggugat");
            $b = mysqli_num_rows($a);
            echo $b;
            ?></div>
          <h3>Penggugat</h3>
          <p>Jumlah Data Penggugat</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-table"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_permohonan");
            $b = mysqli_num_rows($a);
            echo $b;
            ?></div>
          <h3>Permohonan</h3>
          <p>Data Permohonan</p>
        </div>
      </div>
    </div>
  </div>
</div>