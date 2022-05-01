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
                            <h1 class="m-0 text-dark">View Employee </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/employee.php">Employee</a></li>
                                <li class="active breadcrumb-item">View Employee</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Personal Information :</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Name : </label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['empName']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Designation : </label>
                        </div>
                        <div class="col-md-8">
                            <?php echo $rowe['designation']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>ID Number :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['NIC']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Licence Number :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['licenceNo']; ?>
                        </div>
                    </div>




                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Hire Date :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['hireDate']; ?>
                        </div>
                    </div>
                    <hr>

                    <h5>Contact Information :</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Contact No :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['telephone']; ?>
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
                            <label>Address :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['address']; ?>
                        </div>
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