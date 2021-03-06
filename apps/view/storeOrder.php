<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee; //To create an object using employee class
$result = $obj->viewAllEmployee();
//
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('order');
          tab.className+=" active ";
          var tab = document.getElementById('ordersMenu');
          tab.className+="menu-open ";
          var tab = document.getElementById('storeOrder');
          tab.className+=" active";
        </script>

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
                            <h1 class="m-0 text-dark">Shop Orders Management</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item active">
                                  <a href="../view/addOrder.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-address-card fa-sm text-white-50"></i> Add Order
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
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Return Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          <td>OW000006</td>
                                          <td>Gayan Fernando</td>
                                          <td>2022-04-08</td>
                                          <td>Rs.800</td>
                                          <td>Pending</td>
                                          <td>2022-04-13</td>
                                          <td>
                                              <a href="../view/viewOrder.php?empID=<?php echo $row['empID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>
                                              <a href="../view/updateOrder.php?empID=<?php echo $row['empID']; ?>&status=update">
                                                  <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                              <a href="../view/cancelOrder.php?empID=<?php echo $row['empID']; ?>&status=<?php echo $label; ?>">
                                                  <button type="button" class="btn btn-danger" onclick="return confMessage('Do you wanna cancel this')">
                                                    Cancel</button></a>
                                          </td>
                                      </tr>

                                      <tr>
                                          <td>OW000008</td>
                                          <td>sathya weerawardana</td>
                                          <td>2022-04-09</td>
                                          <td>Rs.1200</td>
                                          <td>Pending</td>
                                          <td>2022-04-15</td>
                                          <td>
                                              <a href="../view/viewOrder.php?empID=<?php echo $row['empID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>
                                              <a href="../view/updateOrder.php?empID=<?php echo $row['empID']; ?>&status=update">
                                                  <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                              <a href="../controller/employeecontroller.php?empID=<?php echo $row['empID']; ?>&status=<?php echo $label; ?>">
                                                  <button type="button" class="btn btn-danger" onclick="return confMessage('Do you wanna cancel this')">
                                                    Cancel</button></a>
                                          </td>
                                      </tr>

                                      <tr>
                                          <td>OW000010</td>
                                          <td>Nimna Perera</td>
                                          <td>2022-04-03</td>
                                          <td>Rs.750</td>
                                          <td>Completed</td>
                                          <td>2022-04-10</td>
                                          <td>
                                              <a href="../view/viewOrder.php?empID=<?php echo $row['empID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>

                                          </td>
                                      </tr>

                                      <tr>
                                          <td>OW000011</td>
                                          <td>santhush gamage</td>
                                          <td>2022-04-15</td>
                                          <td>Rs.1350</td>
                                          <td>Cancelled</td>
                                          <td>2022-04-20</td>
                                          <td>
                                              <a href="../view/viewOrder.php?empID=<?php echo $row['empID']; ?>&status=view"><button type="button" class="btn btn-success"> View</button></a>

                                          </td>
                                      </tr>

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
