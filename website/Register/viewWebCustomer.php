<!DOCTYPE html>
<?php
include '../../apps/common/dbconnection.php';
//include '../../apps/common/session.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../../apps/model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$customerID = $_REQUEST['customerID'];

$obe = new customer();
$rese = $obe->viewCustomer($customerID);
$rowe = $rese->fetch_array();
?>
<html>

    <link rel="stylesheet" href='../assets/css/custom-styles.css'>
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

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
        <body class="bg-gradient-primary">

            <div class="container">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">

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
                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <label>Referral Code :</label>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <?php echo $rowe['refferalCode']; ?>
                                    </div>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        Share your referral code via
                                    </div>

                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <a href="whatsapp://send?text= Use my Referral Code : <?php echo $rowe['refferalCode']; ?> to get a nice discount from CanrenWash"  data-action="share/whatsapp/share">Share via Whatsapp</a>

                                    </div>
                                </div>

                                <hr>


                            </div>




                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>


        </body>

</html>