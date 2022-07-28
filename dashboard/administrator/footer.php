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