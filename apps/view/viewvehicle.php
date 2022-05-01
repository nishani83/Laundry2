<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call role model
include '../model/vehiclemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info
//To get vehicle info
$vehicleID = $_REQUEST['vehicleID'];
$obj = new vehicle();
$result = $obj->viewVehicle($vehicleID);
$row = $result->fetch_array();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Waste Management</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script type="text/javascript" src="../JQuery/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/leftsidebar-styles.css">
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4e352e5914.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/leftsidebar.js"></script>
</head>

<body>

    <body>
        <div class="page-wrapper green-theme">
            <div class="header">
                <?php
                include '../common/include_header.php';
                ?>
            </div>

            <div>
                <?php
                include '../common/include_leftsidebar.php';
                ?>
            </div>

            <div id="mainbody">
                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/vehicle.php">Vehicle Management</a></li>
                        <li class="active breadcrumb-item">View Vehicle</li>
                    </ol>
                </div>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-10">

                            <div id="contentdiv">
                                <div class="dash">Vehicle Details</div>
                                <hr />
                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-md-12 col-sm-6 col-xs-12">

                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Vehicle No :</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['vehicleNo']; ?>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Vehicle Type :</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['vehicleType']; ?>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Capacity (volume) :</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['capacity']; ?>
                                                    <span id="show"></span>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Odometer (km) :</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['odometer']; ?>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Description :</label>
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['vehicleDescription']; ?>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>

                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <label>Availability :</label> 
                                                </div>
                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                    <?php echo $row['vehicleStatus']; ?>
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <?php include '../common/include_footer.php'; ?>
                </div>
    </body>

</html>