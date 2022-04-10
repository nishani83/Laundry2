<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();
include '../model/itemmodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new item;
$itemID = $_REQUEST['itemID'];
$result = $obj->viewItem($itemID);
$row = $result->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!--     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
                                <a href="../view/addemployee.php"
                                   class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="fas fa-address-card fa-sm text-white-50"></i> Add Employee
                                </a>
                            </div>-->
            <!-- .content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Service Price</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="service.php">Service</a></li>
                                <li class="active breadcrumb-item">&nbsp; &nbsp;Add Service Price</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <form method="post" action="../controller/servicecontroller.php?status=Add" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Item </label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">

                                            <?php echo $row['itemName']; ?>
                                            <input type="hidden" id="itemID" name="itemID" value="<?php echo $itemID; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Service <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="service" id="service" required="" class="form-control">
                                                <option value="">Select a Service</option>
                                                <option value="1">Dry Clean</option>
                                                <option value="2">Wash</option>
                                                <option value="3">Press</option>

                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" required="" name="price" id="price" placeholder="Price" class="form-control" />
                                        </div>
                                    </div>




                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->
                    <?php include '../common/include_footer.php'; ?>

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Control sidebar content goes here -->
                    </aside>
                    <!-- /.control-sidebar -->
                </div>
                <!-- ./wrapper -->
                <?php include '../common/include_scripts.php'; ?>

                <!-- Page level plugins -->
                <script src="../DataTables/datatables.min.js"></script>
                <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

                <script type="text/javascript">
                    function confMessage(str) {
                        var r = confirm("Do you want to " + str + " this employee?");
                        if (!r) {
                            return false;
                        }
                    }
                </script>
                <script>
                    $(document).ready(function () {
                        $('#example').DataTable();
                    });
                </script>
                <script>
                    $(document).ready(function () {
                        $('#designation').change(function () {
                            if ($(this).val() == 'driver') {
                                $('#licence').prop("disabled", false);
                            } else {
                                $('#licence').prop("disabled", true);
                            }
                        });

                    });
                </script>
                <!-- jQuery -->
                <script src="../plugins/jquery/jquery.min.js"></script>
                <!-- jQuery UI 1.11.4 -->
                <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
                <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
                <script>
                    $.widget.bridge('uibutton', $.ui.button)
                </script>
                <!-- Bootstrap 4 -->
                <script src="../DataTables/datatables.min.js"></script>
                <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
                <script src="../../bootstrap/js/bootstrap.min.js"></script>
                <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- ChartJS -->
                <script src="../plugins/chart.js/Chart.min.js"></script>
                <!-- Sparkline -->
                <script src="../plugins/sparklines/sparkline.js"></script>
                <!-- JQVMap -->
                <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
                <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
                <!-- jQuery Knob Chart -->
                <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
                <!-- daterangepicker -->
                <script src="../plugins/moment/moment.min.js"></script>
                <script src="../plugins/daterangepicker/daterangepicker.js"></script>
                <!-- Tempusdominus Bootstrap 4 -->
                <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
                <!-- Summernote -->
                <script src="../plugins/summernote/summernote-bs4.min.js"></script>
                <!-- overlayScrollbars -->
                <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
                <!-- AdminLTE App -->
                <script src="../assets/js/adminlte.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="../assets/js/pages/dashboard.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="../assets/js/demo.js"></script>
                </body>
                </html>
