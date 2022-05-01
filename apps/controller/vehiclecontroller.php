<?php

include '../common/dbconnection.php';
include '../model/vehiclemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new vehicle();
//$result = $obj->viewAvehicle($name);


$status = strtolower($_GET['status']);

if ($status == "add") {
    $arr = $_POST;
    $vehicleID = $obj->addVehicle($arr);
    header("Location:../view/vehicle.php?vehicleID=$vehicleID");
}

if ($status == "update") {
    $vehicleID = $_REQUEST['vehicleID'];
    $arr = $_POST;
    print_r($arr);

    //to call update vehicle method
    $vehicleID = $obj->updateVehicle($vehicleID, $arr);
    header("Location:../view/vehicle.php?vehicleID");
}

if ($status == "active") {
    $vehicleID = $_GET['vehicleID'];
    $obj->activeVehicle($vehicleID);
    header("Location:../view/vehicle.php");
}

if ($status == "deactive") {
    $vehicleID = $_GET['vehicleID'];
    $obj->deactiveVehicle($vehicleID);
    header("Location:../view/vehicle.php");
}
