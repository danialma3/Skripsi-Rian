<?php
session_start();
if (!isset($_SESSION['nip'])) {
  echo "<script>document.location.href='../index.php'</script>";
} else {
  include "../../koneksi.php";
  $q = mysqli_query($connect, "SELECT * FROM tb_pengguna where nip='" . $_SESSION['nip'] . "'");
  while ($d = mysqli_fetch_array($q)) {
    $nip = $d['nip'];
    $nama = $d['nama_pengguna'];
    $username = $d['username'];
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Kepaniteraan Hukum Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../assets/css/animate.min.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="../../assets/css/icheck/flat/green.css" rel="stylesheet">
    <link href="../../assets/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/highcharts.js"></script>
    <script type="text/javascript">
      function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function(oFREvent) {
          document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
      };
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.form-checkbox').click(function() {
          if ($(this).is(':checked')) {
            $('.form-password').attr('type', 'text');
          } else {
            $('.form-password').attr('type', 'password');
          }
        });
      });
    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;"><a href="index.php?menu=home" class="site_title">
                <center><span>ADMINISTRATOR</span></center>
              </a>
            </div>
            <div class="clearfix"></div>
            <div class="profile">
              <div class="profile_pic"><img src="../../assets/images/user.png" alt="..." class="img-circle profile_img"></div>
              <div class="profile_info"><span>Welcome,</span>
                <h2><?php echo $nama; ?></h2>
              </div>
            </div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu" style="margin-top:100px">
                  <li><a href="index.php?menu=home"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-cog"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?menu=gugatan_jaksa">Data Gugatan Jaksa</a></li>
                      <li><a href="index.php?menu=gugatan_penggugat">Data Gugatan Penggugat</a></li>
                      <li><a href="index.php?menu=permohonan_j">Data Permohonan Jaksa</a></li>
                      <li><a href="index.php?menu=permohonan_p">Data Permohonan Penggugat</a></li>
                      <li><a href="index.php?menu=hakim">Data Hakim</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gears"></i> Menu Panitera Pidana <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?menu=tunjuk_hakim_p">Penunjukan Hakim</a></li>
                      <li><a href="index.php?menu=tgl_sidang_p">Tentukan Tanggal Sidang</a></li>
                      <li><a href="index.php?menu=tgl_putusan_p">Tentukan Tanggal Putusan</a></li>
                      <li><a href="index.php?menu=hasil_sidang_p">Hasil Persidangan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gears"></i> Menu Panitera Perdata <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?menu=tunjuk_hakim">Penunjukan Hakim</a></li>
                      <li><a href="index.php?menu=tgl_sidang">Tentukan Tanggal Sidang</a></li>
                      <li><a href="index.php?menu=tgl_putusan">Tentukan Tanggal Putusan</a></li>
                      <li><a href="index.php?menu=hasil_sidang">Hasil Persidangan</a></li>
                      <li><a href="index.php?menu=biaya">Biaya</a></li>
                    </ul>
                  </li>

                  <h3>Laporan</h3>
                  <li><a><i class="fa fa-book"></i> Data Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?menu=laporan_j">Laporan Kasus Pidana</a></li>
                      <li><a href="index.php?menu=laporan_p">Laporan Kasus Perdata</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>
              <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../assets/images/user.png" height="60px" alt="">Hallo, <?php echo $username; ?> !
                    <span class=" fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="index.php?menu=ubah_pass&nip=<?php echo $nip; ?>">Ubah Account</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main">
          <div class="row">
            <?php
            if (isset($_GET['menu'])) {
              $menu = $_GET['menu'];
              if ($menu == "home") {
                include "home.php";
              }
              if ($menu == "penggugat") {
                include "penggugat.php";
              }
              if ($menu == "permohonan_j") {
                include "permohonan_j.php";
              }
              if ($menu == "permohonan_p") {
                include "permohonan_p.php";
              }
              if ($menu == "hakim") {
                include "hakim.php";
              }
              if ($menu == "gugatan_jaksa") {
                include "gugatan_jaksa.php";
              }
              if ($menu == "gugatan_penggugat") {
                include "gugatan_penggugat.php";
              }
              if ($menu == "kasasi") {
                include "kasasi.php";
              }
              if ($menu == "eksekusi") {
                include "eksekusi.php";
              }
              if ($menu == "banding") {
                include "banding.php";
              }
              if ($menu == "peninjauan") {
                include "peninjauan.php";
              }
              // if($menu=="jenis_perkara"){include "jenis_perkara.php";}
              if ($menu == "ubah_pass") {
                include "ubah_pass.php";
              }
              if ($menu == "laporan_j") {
                include "laporan_j.php";
              }
              if ($menu == "laporan_p") {
                include "laporan_p.php";
              }
              if ($menu == "tunjuk_hakim") {
                include "menu_perdata/tunjuk_hakim.php";
              }
              if ($menu == "tgl_sidang") {
                include "menu_perdata/tgl_sidang.php";
              }
              if ($menu == "tgl_putusan") {
                include "menu_perdata/tgl_putusan.php";
              }
              if ($menu == "hasil_sidang") {
                include "menu_perdata/hasil_sidang.php";
              }
              if ($menu == "biaya") {
                include "menu_perdata/biaya.php";
              }
              if ($menu == "tunjuk_hakim_p") {
                include "menu_pidana/tunjuk_hakim.php";
              }
              if ($menu == "tgl_sidang_p") {
                include "menu_pidana/tgl_sidang.php";
              }
              if ($menu == "tgl_putusan_p") {
                include "menu_pidana/tgl_putusan.php";
              }
              if ($menu == "hasil_sidang_p") {
                include "menu_pidana/hasil_sidang.php";
              }
            } else {
              include "home.php";
            }
            ?>
          </div>
          <footer>
            <div class="pull-right">Sistem Informasi Kepaniteraan Hukum Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web. Developer : M. Subhan Febrianto. All Rights Reserved. </div>
            <div class="clearfix"></div>
          </footer>
        </div>
      </div>
    </div>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../../assets/js/icheck/icheck.min.js"></script>
    <script src="../../assets/js/custom.js"></script>
    <script src="../../assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="../../assets/js/datatables/dataTables.buttons.min.js"></script>
    <script src="../../assets/js/datatables/buttons.bootstrap.min.js"></script>
    <script src="../../assets/js/datatables/jszip.min.js"></script>
    <script src="../../assets/js/datatables/pdfmake.min.js"></script>
    <script src="../../assets/js/datatables/vfs_fonts.js"></script>
    <script src="../../assets/js/datatables/buttons.html5.min.js"></script>
    <script src="../../assets/js/datatables/buttons.print.min.js"></script>
    <script src="../../assets/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="../../assets/js/datatables/dataTables.keyTable.min.js"></script>
    <script src="../../assets/js/datatables/dataTables.responsive.min.js"></script>
    <script src="../../assets/js/datatables/responsive.bootstrap.min.js"></script>
    <script src="../../assets/js/datatables/dataTables.scroller.min.js"></script>
    <script src="../../assets/js/chartjs/chart.min.js"></script>
    <script src="../../assets/js/pace/pace.min.js"></script>
    <script>
      var handleDataTableButtons = function() {
          "use strict";
          0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
            dom: "Bfrtip",
            buttons: [{
              extend: "copy",
              className: "btn-sm"
            }, {
              extend: "csv",
              className: "btn-sm"
            }, {
              extend: "excel",
              className: "btn-sm"
            }, {
              extend: "pdf",
              className: "btn-sm"
            }, {
              extend: "print",
              className: "btn-sm"
            }],
            responsive: !0
          })
        },
        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons()
            }
          }
        }();
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });
      });
      TableManageButtons.init();
    </script>
    <script>
      Chart.defaults.global.legend = {
        enabled: false
      };
    </script>
  </body>

  </html>
<?php
}
?>
