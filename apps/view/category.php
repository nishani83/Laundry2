<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/categorymodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new category;
$result = $obj->viewAllCategory();
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
                            <h1 class="m-0 text-dark">Category Management</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="card shadow mb-4">
                    <div class="card-body">

                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <form method="post" action="../controller/categorycontroller.php?status=Add" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label>Name <span>*</span></label>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="text" required="" name="name" id="name" placeholder="Name" class="form-control" />
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label>Image <span>*</span></label>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <input type="file" id="image" name="image" accept="image/*"/>
                                    </div>

                                </div>





                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-success">Add Category</button>                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
                                                    <?php echo $row['categoryID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['categoryName']; ?></br>


                                                </td>
                                                <td>
                                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['categoryImage']); ?>" />
                                                </td>

                                                <td>

                                                    <a href="../view/updateitem.php?itemID=<?php echo $row['itemID']; ?>&status=update">
                                                        <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                                    <a href="../controller/itemcontroller.php?itemID=<?php echo $row['itemID']; ?>&status=<?php echo $label; ?>">
                                                        <button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')">
                                                            <?php echo $label; ?></button></a>
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
