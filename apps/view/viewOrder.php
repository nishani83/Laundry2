<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$empID = $_REQUEST['empID'];

$obe = new employee();
$rese = $obe->viewAEmployee($empID);
$rowe = $rese->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('order');
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
                            <h1 class="m-0 text-dark">View Order Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/storeOrder.php">Shop Orders</a></li>
                                <li class="active breadcrumb-item">View Order Details</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Customer/Delivery Information :</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Customer Name : </label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            Gayan Fernando
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Customer ID: </label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            c00006
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>City : </label>
                        </div>
                        <div class="col-md-8">
                            Piliyandala
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Address : </label>
                        </div>
                        <div class="col-md-8">
                            23,Kahapola,piliyandala
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Contact No :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            0781267844
                        </div>
                    </div>

                    <hr>

                    <h5>Order Information :</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Order ID :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            OW000006
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Amount :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            Rs.800
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Order Date :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            2022-04-08
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Return Date :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            2022-04-13
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Assigned Launderer :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            Sarath Premasiri
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Order Status :</label>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            Pending
                        </div>
                    </div>

                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Service</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>1</td>
                              <td>Blouse</td>
                              <td>-</td>
                              <td>Completed</td>
                              <td>---</td>
                          </tr>

                          <tr>
                              <td>4</td>
                              <td>Abaya</td>
                              <td>-</td>
                              <td>Completed</td>
                              <td>---</td>
                          </tr>

                          <tr>
                              <td>3</td>
                              <td>Saree</td>
                              <td>-</td>
                              <td>Completed</td>
                              <td>---</td>
                          </tr>

                        </tbody>

                    </table>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include '../common/include_footer.php'; ?>

</div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>
<script src="../assets/js/adminlte.min.js"></script>

</body>

</html>
