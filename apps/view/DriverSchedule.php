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
        <?php include '../common/include_sidebar_driver.php'; ?>
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
                                                    <?php
                                                    if ($row['startTime'] == 1) {
                                                        echo "9.00";
                                                    } else {
                                                        echo "2.00";
                                                    }
                                                    ?>


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




                                                        <button type="button" class="btn btn-primary-outline" data-toggle="modal" data-target="#modal-<?php echo $row3['orderID']; ?>">
                                                            <?php echo $row3['orderID']; ?>
                                                        </button>
                                                        <?php $status = "delivered" ?>
                                                        <form method="post" enctype="multipart/form-data"  action="../controller/orderitemcontroller.php?orderID=<?php echo $row3['orderID']; ?>& status=<?php echo $status; ?> ">
                                                            <div class="modal fade" id="modal-<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Note</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <input type="text" name="notes" id="notes" placeholder="Add any sepcial notes" class="form-control"/>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        </br>
                                                    <?php }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php //echo $row['status'];    ?>
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


<!--        <script src="../plugins/jquery/jquery.min.js"></script>-->

        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
<!--        <script src="../assets/js/adminlte.min.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="../../assets/js/demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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
