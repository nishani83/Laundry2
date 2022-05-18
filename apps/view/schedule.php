<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/schedulemodel.php'; //To call schedule model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule; //To create an object using schedule class
$result = $obj->viewAllSchedule(); //To get all schedules info
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('schedule');
          tab.className+=" active ";
          var tab = document.getElementById('scheduleMenu');
          tab.className+=" menu-open";
          var tab = document.getElementById('scheduleM');
          tab.className+=" active";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Schedule Management</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item active"> <a href="addschedule.php"
                                                                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-address-card fa-sm text-white-50"></i> Add Schedule
                                    </a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Driver Name</th>
                                            <th>Vehicle Type</th>
                                            <th>Vehicle No</th>

                                            <th>Schedule Date</th>
                                            <th>Start Time</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo $row['scheduleID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['empName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['vehicleType']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['vehicleNo']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $row['scheduleDate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['startTime']; ?>
                                                </td>

                                                <td>
                                                    <a href="../view/viewschedule.php?scheduleID=<?php echo $row['scheduleID']; ?>&status=View">
                                                        <button type="button" class="btn btn-success"> </i> View</button></a>

                                                    <a href="../view/updateschedule.php?scheduleID=<?php echo $row['scheduleID']; ?>&status=Update">
                                                        <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                                    <!--                                            <a href="../controller/schedulecontroller.php?scheduleID=--><?php //echo $row['scheduleID'];          ?><!--&status=Delete">-->
                                                    <!--                                                <button type="button" class="btn btn-danger" onclick="return confMessage()">Delete</button></a>-->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
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
        <!-- ./wrapper -->
        <?php include '../common/include_scripts.php'; ?>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Page level plugins -->
        <script src="../DataTables/datatables.min.js"></script>
        <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
            function confMessage() {
                var r = confirm("Do you want to delete this schedule ?");
                if (!r) {
                    return false;
                }
            }
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({"bSort": false});
            });
        </script>

        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../assets/js/demo.js"></script>
        <!-- page script -->
    </body>

</html>
