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

    $awal = $_POST['tgl_awal'];
    $akhir = $_POST['tgl_akhir'];
    // var_dump($awal, $akhir);
    // die;

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
                                            <h6>Pidana</h6>
                                            <li><a href="index.php?menu=filter_pidana">Laporan Kasus Pidana</a></li>
                                            <li><a href="index.php?menu=filter_tgl_sidang">Laporan Jadwal Sidang Pidana</a></li>
                                            <li><a href="index.php?menu=filter_tgl_hsl">Laporan Hasil Sidang Pidana</a></li>
                                            <h6>Perdata</h6>
                                            <li><a href="index.php?menu=laporan_perdata">Laporan Kasus Perdata</a></li>
                                            <li><a href="index.php?menu=tgl_sidang_perdata">Laporan Jadwal Sidang Perdata</a></li>
                                            <li><a href="index.php?menu=filter_tgl_hsl_p">Laporan Hasil Sidang Perdata</a></li>
                                            <li><a href="index.php?menu=filter_biaya">Laporan Biaya Sidang Perdata</a></li>
                                            <li><a href="index.php?menu=pilih">Laporan Tugas Hakim Pidana dan Perdata</a></li>>

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

                        <?php require_once 'functions.php'; ?>
                        <!-- conten -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <h2><i class="fa fa-user"></i> Rekapitulasi Biaya Sidang Perdata Dari Tanggal <?= tgl_indo($awal); ?> Sampai Dengan <?= tgl_indo($akhir); ?>
                                            </div>
                                            <div class="col-sm">
                                                <div>
                                                    <span class="pull-right">
                                                        <form method="post" action="../laporan_p/laporan_biaya.php" target="_blank">
                                                            <input type="hidden" name="awal" class="form-control" id="field1" value="<?= $awal ?>">
                                                            <input type="hidden" name="akhir" class="form-control" id="field1" value="<?= $akhir ?>">
                                                            <button class="btn btn-success">Cetak</button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </h2>
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
                                                    <th>Nomor Putusan</th>
                                                    <th>Total Biaya</th>
                                                    <th>Cetak Biaya</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($connect, "SELECT * FROM tb_permohonan_p LEFT JOIN tb_penggugat ON tb_permohonan_p.id_penggugat = tb_penggugat.id_penggugat WHERE tgl_lapor BETWEEN '" . $awal . "' AND '" . $akhir . "';");
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
                                                        <?php if ($d['tgl_putusan']) { ?>

                                                            <td style="width: 18%;">
                                                                <?php
                                                                echo "W15-U13/" . getNomor($d['tgl_putusan'], $d['id_permohonan'], "HK", "01");
                                                                ?>
                                                            </td>

                                                        <?php
                                                        } else { ?>
                                                            <td align="center">
                                                                <?php echo 'Belum Diputuskan!!'; ?>
                                                            <?php } ?>
                                                            </td>
                                                            <?php if ($d['id_biaya']) { ?>
                                                                <td style="width: 15%;">
                                                                    <?php $id_biaya = $d["id_biaya"];
                                                                    $id_permohonan = $d["id_permohonan"];
                                                                    $h = mysqli_query($connect, "SELECT * FROM tb_biaya WHERE id_biaya=$id_biaya AND id_permohonan = $id_permohonan");
                                                                    $data = mysqli_fetch_array($h);
                                                                    $total = $data['pendaftaran'] + $data['proses'] + $data['panggilan'] + $data['mediasi'] + $data['pemberitahuan'] + $data['redaksi'] + $data['putusan'] + $data['materai'];
                                                                    ?>
                                                                    <?php echo rupiah($total); ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td align="center">
                                                                    Biaya Kosong
                                                                </td>
                                                            <?php } ?>
                                                            <td align="center" width="100px"><a class="btn btn-sm btn-success" href="../laporan_p/biaya.php?id_permohonan=<?php echo $d['id_permohonan']; ?>" target="_BLANK"><i class="fa fa-print"></i></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="text-align:right">Total Halaman Ini</th>
                                                    <th colspan="2"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content -->
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
            const formatRupiah = (money) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(money);
            }
            $(document).ready(function() {
                $('#datatable').DataTable({
                    footerCallback: function(row, data, start, end, display) {

                        var api = this.api();

                        // Remove the formatting to get integer data for summation
                        var intVal = function(i) {
                            return typeof i === 'string' ? i.replace(/[\Rp|.]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };

                        // Total over all pages
                        total = api
                            .column(6)
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Total over this page
                        pageTotal = api
                            .column(6, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                return intVal(a) + intVal(b);
                            }, 0);

                        // Update footer
                        $(api.column(6).footer()).html(formatRupiah(pageTotal) + ' (Total Seluruh Halaman ' + formatRupiah(total) + ')');
                    },
                });
            });
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