<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include '../common/dbconnection.php'; //To get connection string
$ob = new dbconnection();
$con = $ob->connection();
include '../model/vehiclemodel.php';
$obj = new vehicle;
$vehicleNo = $_REQUEST['vehicleNo'];

$nor = $obj->checkVehicle($vehicleNo);
$result = $nor->fetch_assoc();
if ($result['count'] > 0) {
    echo('1');
} else {
    echo('0');
}
?>


