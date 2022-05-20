<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



include '../common/dbconnection.php';
include '../model/orderitemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new orderitem;

//$result = $obj->viewAschedule($name);
$orderItemID = $_REQUEST['orderItemID'];
$orderID = $_REQUEST['orderID'];

$status = strtolower($_REQUEST['status']);
$notes = $_POST['notes'];

if ($status == "pickedup") {
    //$scheduleID = $_GET['scheduleID'];

    $obj->pickOrderItems($orderItemID, $notes);
    header("Location:../view/ItemsInSchedule.php?orderID=$orderID");
}
