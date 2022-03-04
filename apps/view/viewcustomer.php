<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$customerID = $_REQUEST['customerID'];

$obe = new customer();
$rese = $obe->viewCustomer($customerID);
$rowe = $rese->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
                            <h1 class="m-0 text-dark">View Customer </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/customer.php">Customer</a></li>
                                <li class="active breadcrumb-item">View Customer</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['name']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Address :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['address']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Longitude :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['longitude']; ?>
                        </div><!-- comment -->
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Latitude :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['latitude']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Contact No :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['contactNo']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Email :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['email']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Registered Date :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['RegisteredDate']; ?>
                        </div>
                    </div>
                    <hr>


                </div>




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

</body>

</html>