<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row top_tiles">
          <center><div class="product_price"><h1 align="center">Hallo, Pimpinan !!!</h1></div>
          <small><i class="fa fa-check"></i> You Logged As Hakim</small><br><h3><small>Sistem Informasi Kepaniteraan Hukum <br>Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</small></h3><br>Silahkan kelola data - data anda<br>Selamat bekerja, jangan lupa logout setelah selesai menggunakan aplikasi ini<hr></center>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="tile-stats">
              <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                <?php
                $a=mysqli_query($connect, "SELECT * FROM tb_gugatan");
                $b=mysqli_num_rows($a);
                echo $b;
                ?>
                </div>
                <h3>Data Gugatan</h3>
                <p>Jumlah data gugatan</p>
          </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="tile-stats">
              <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                <?php
                $a=mysqli_query($connect, "SELECT * FROM tb_banding");
                $b=mysqli_num_rows($a);
                echo $b;
                ?>
                </div>
                <h3>Data Banding</h3>
                <p>Jumlah data banding</p>
          </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="tile-stats">
              <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                <?php
                $a=mysqli_query($connect, "SELECT * FROM tb_kasasi");
                $b=mysqli_num_rows($a);
                echo $b;
                ?>
                </div>
                <h3>Data Kasasi</h3>
                <p>Jumlah data kasasi</p>
          </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="tile-stats">
              <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                <?php
                $a=mysqli_query($connect, "SELECT * FROM tb_eksekusi");
                $b=mysqli_num_rows($a);
                echo $b;
                ?>
                </div>
                <h3>Data Eksekusi</h3>
                <p>Jumlah data eksekusi</p>
          </div>
      </div>
    </div>
  </div>
</div>