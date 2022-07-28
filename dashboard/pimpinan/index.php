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
                <center><span>- PIMPINAN -</span></center>
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
                  <li><a><i class="fa fa-cog"></i>Data Kasus<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?menu=pidana">Data Kasus Pidana</a></li>
                      <li><a href="index.php?menu=perdata">Data Kasus Perdata</a></li>
                      <li><a href="index.php?menu=hakim_pidana">Tunjuk Hakim Pidana</a></li>
                      <li><a href="index.php?menu=hakim_perdata">Tunjuk Hakim Perdata</a></li>
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
              if ($menu == "ubah_pass") {
                include "ubah_pass.php";
              }
              if ($menu == "pidana") {
                include "pidana/data_pidana.php";
              }
              if ($menu == "perdata") {
                include "perdata/data_perdata.php";
              }
              if ($menu == "hakim_pidana") {
                include "pidana/hakim_pidana.php";
              }
              if ($menu == "hakim_perdata") {
                include "perdata/hakim_perdata.php";
              }
            } else {
              include "home.php";
            }
            ?>
          </div>
          <footer>
            <div class="pull-right">Sistem Informasi Kepaniteraan Hukum Di Pengadilan Negeri Banjarbaru Kelas II Berbasis Web. Developer : M. SUBHAN FEBRIANTO. All Rights Reserved. </div>
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