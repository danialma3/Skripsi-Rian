<?php
$query = mysqli_query($connect, "SELECT * FROM tb_hakim WHERE nip = $nip");
$hakim_nip = mysqli_fetch_array($query);
$id_hakim = $hakim_nip['id_hakim'];
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row top_tiles">
          <center>
            <div class="product_price">
              <h1 align="center">Hallo, Hakim !!!</h1>
            </div>
            <small><i class="fa fa-check"></i> You Logged As Hakim</small><br>
            <h3><small>Sistem Informasi Kepaniteraan Hukum <br>Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</small></h3><br>Silahkan kelola data - data anda<br>Selamat bekerja, jangan lupa logout setelah selesai menggunakan aplikasi ini
            <hr>
          </center>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-12 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-user"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_hakim");
            $b = mysqli_num_rows($a);
            echo $b;
            ?>
          </div>
          <h3>Data Hakim</h3>
          <p>Jumlah data hakim yang tersedia didalam database</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-list"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat WHERE id_hakim = $id_hakim");
            $b = mysqli_num_rows($a);
            echo $b;
            ?></div>
          <h3>Perdata</h3>
          <p>Anda Memiliki Tugas Kasus</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-briefcase"></i></div>
          <div class="count">
            <?php
            $a = mysqli_query($connect, "SELECT * FROM tb_permohonan_j LEFT JOIN tb_jaksa ON tb_permohonan_j.id_penggugat = tb_jaksa.id_jaksa WHERE id_hakim = $id_hakim");
            $b = mysqli_num_rows($a);
            echo $b;
            ?></div>
          <h3>Pidana</h3>
          <p>Anda Memiliki Tugas Kasus</p>
        </div>
      </div>
    </div>
  </div>
</div>