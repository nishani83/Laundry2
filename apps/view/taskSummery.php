
<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php'; //To call employee model
include '../model/taskmodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new task; //To create an object using employee class
$result = $obj->viewAllTask();
$result1 = $obj->viewAllTask();
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
                            <h1 class="m-0 text-dark">Task Summery</h1>
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
                                <?php
                                while ($row = $result->fetch_array()) {
                                    if ($row['designation'] == 'launderer') {
                                        if (strtolower($row['empName']) == "kamal vithana") {

                                            $class = "info-box bg-info";
                                        } else if (strtolower($row['empName']) == "Malini Karunarathne") {

                                            $class = "info-box bg-warning";
                                        }
                                        ?>




                                        <div class="<?php echo $class; ?>">
                                            <?php echo $row['empName']; ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered ">

                                    <thead>
                                        <tr>
                                            <th>To Do</th>
                                            <th>In Progress</th>
                                            <th>Completed</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row1 = $result1->fetch_array()) {
                                            ?>

                                            <tr>

                                                <td>
                                                    <?php
                                                    if ($row1['taskstatus'] == 'todo') {
                                                        echo 'Task ID:' . $row1['taskID'];
                                                        echo 'Due Date:' . $row1['dueDate'];
                                                    }
                                                    ?>

                                                </td>

                                                <?php
                                                if ($row['taskstatus'] == 'inprogress') {
                                                    echo 'Task ID:' . $row1['taskID'];
                                                    echo 'Due Date:' . $row1['dueDate'];
                                                }
                                                ?>

                                                </td>
                                                <td >
                                                    <div class="info-box bg-info">
                                                        <?php
                                                        if ($row1['taskstatus'] == 'completed') {
                                                            echo '<span class="info-box-number">';
                                                            echo 'Task ID:' . $row1['taskID'];
                                                            echo '</span>';
                                                            echo 'Completed Date:' . $row1['completedDate'];
                                                        }
                                                        ?>
                                                    </div>
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

<script type="text/javascript">
    var tab = document.getElementById('taskL');
    tab.className += " active ";
    var tab = document.getElementById('taskMenu');
    tab.className += " menu-open";
    var tab = document.getElementById('taskSummery');
    tab.className += " active";
</script>

<!-- navbar script -->

