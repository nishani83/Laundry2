<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/schedulemodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule; //To create an object using employee class
$driverID = $user_info['empID'];
$result = $obj->viewDriverAssignedSchedules($driverID);
//
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
            var tab = document.getElementById('employee');
            tab.className += " active ";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">My Schedules</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

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
                                            <th>Schedule ID</th>
                                            <th>Start Time</th>
                                            <th>Assigned Vehicle</th>
                                            <th>Pick Ups</th>
                                            <th>Deliveries</th>
                                            <th>Cities</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            ?>

                                            <tr>

                                                <td>
                                                    <?php echo $row['scheduleID'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['startTime']; ?>


                                                </td>
                                                <td>
                                                    <?php echo $row['vehicleNo']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $scheduleID = $row['scheduleID'];
                                                    $result2 = $obj->viewSchedulePendingOrders($scheduleID);
                                                    while ($row2 = $result2->fetch_array()) {
                                                        ?>
                                                        <a href="ItemsInSchedule.php?orderID=<?php echo $row2['orderID']; ?>">
                                                            <?php echo $row2['orderID']; ?></a>
                                                        </br>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <?php
                                                    $scheduleID = $row['scheduleID'];
                                                    $result3 = $obj->viewScheduleDeliveryOrders($scheduleID);
                                                    while ($row3 = $result3->fetch_array()) {
                                                        ?>
                                                        <a href="ItemsInSchedule.php?orderID=<?php echo $row3['orderID']; ?>" <?php echo $row3['orderID']; ?></a>
                                                            </br>
                                                    <?php }
                                                    ?>
                                                </td>
                                                <td>
                                                        <?php //echo $row['status'];   ?>
                                                </td>
                                                <td>
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

        <!-- Page level plugins -->


        <script type="text/javascript">
            function confMessage(str) {
                var r = confirm("Do you want to " + str + " this employee?");
                if (!r) {
                    return false;
                }
            }
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
        <script src="../../assets/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            });
        </script>
    </body>
</html>
