<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/leavemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new leave; //To create an object using employee class
$laundererID = $user_info['empID'];
$result = $obj->viewLeave($laundererID);

//
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar_launderer.php'; ?>
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
                            <h1 class="m-0 text-dark">My Tasks</h1>
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
                                            <th>Task ID</th>
                                            <th>Assigned Date</th>
                                            <th>Due Date</th>
                                            <th>Task Name</th>
                                            <th>Task Status</th>
                                            <th>Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            ?>

                                            <tr>

                                                <td>
                                                    <?php echo $row['taskID'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['createdDate']; ?>


                                                </td>
                                                <td>
                                                    <?php echo $row['dueDate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['taskName']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $orderID = $row['orderID'];
                                                    $taskID = $row['taskID'];

                                                    $res = $obo->countTodoItems($orderID);
                                                    $s = 'completed';
                                                    $nor = $res->fetch_assoc();

                                                    if ($nor['count'] == 0) {

                                                        $re = $obj->changeStatus($taskID, $s);
                                                        $resTS = $obj->viewLaundererAssignedTasksWithTaskID($laundererID, $taskID);
                                                        $rowTS = $resTS->fetch_assoc();
                                                        $row['taskstatus'] = $rowTS['taskstatus'];
                                                    }

                                                    if (($row['taskstatus']) == "todo") {
                                                        echo " <span class= \"right badge badge-danger\"> ";
                                                        echo $row['taskstatus'];
                                                        echo "</span>";
                                                    } else if (($row['taskstatus']) == "inprogress") {
                                                        echo " <span class= \"right badge badge-warning\"> ";
                                                        echo $row['taskstatus'];
                                                        echo "</span>";
                                                    } else {
                                                        echo " <span class= \"right badge badge-success\"> ";
                                                        echo $row['taskstatus'];
                                                        echo "</span>";
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <a href="../view/viewtaskLaunderer.php?taskID=<?php echo $row['taskID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>

                                                    <?php if ($row['taskstatus'] != "todo") { ?>
                                                        <button type="button" id="startbutton" class="btn btn-danger" disabled >start</button>
                                                        <?php
                                                    } else {

                                                        $status = "inprogress";
                                                        ?>
                                                        <a href="../controller/taskcontroller.php?empID=<?php echo $laundererID; ?>&taskID=<?php echo $row['taskID']; ?>&status=<?php echo $status; ?>">
                                                            <button type="button" id="startbutton" class="btn btn-danger" onclick=" disableButton(this)">
                                                                Start</button>   </a>
                                                    <?php } ?>
                                                    </button>   </a>                                            </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
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
        <script type="text/javascript">
            function disableButton(btn) {
                document.getElementById(btn.id).disabled = true;

            }
        </script>

        <script src="../plugins/jquery/jquery.min.js"></script>

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
