<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/itemmodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new item; //To create an object using employee class
$result = $obj->viewAllItem();
//
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
            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Item Management</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            //To check the status
                                            if (strtolower($row['status']) == "active") {
                                                $label = "Deactive";
                                                $class = "btn btn-danger";
                                                $iclass = "glyphicon glyphicon-remove";
                                            } else {
                                                $label = "Active";
                                                $class = "btn btn-info";
                                                $iclass = "glyphicon glyphicon-ok";
                                            }
                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo $row['itemID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['itemName']; ?></br>


                                                </td>
                                                <td>
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" />
                                                </td>

                                                <td>
                                                    <a href="../view/viewitem.php?itemID=<?php echo $row['itemID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>
                                                    <a href="../view/updateitem.php?itemID=<?php echo $row['itemID']; ?>&status=update">
                                                        <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                                    <a href="../controller/itemcontroller.php?itemID=<?php echo $row['itemID']; ?>&status=<?php echo $label; ?>">
                                                        <button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')">
                                                            <?php echo $label; ?></button></a>
                                                    <a href="../view/addservice.php?itemID=<?php echo $row['itemID']; ?>&status=view"><button type="button" class="btn btn-warning"> Add Service Price</button></a>
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
        <script src="../../assets/js/adminlte.min.js"></script>
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
