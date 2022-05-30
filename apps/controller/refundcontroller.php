<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



include '../common/dbconnection.php';
include '../model/refundmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new refund;

//$result = $obj->viewAschedule($name);
$orderID = $_REQUEST['orderID'];
$amount = $_POST['amount'];
$reason = $_POST['reason'];
$status = strtolower($_REQUEST['status']);
$person = $_REQUEST['person'];

if ($status == "pending") {
    //$scheduleID = $_GET['scheduleID'];

    $obj->addRefund($orderID, $amount, $reason, $status, $person);
    header("Location:../view/viewWebOrder.php?weborderID=$orderID");
}
if ($status == "completed") {
    //$scheduleID = $_GET['scheduleID'];
//    $obj->processOrderItems($orderItemID, $notes, $status);
//    header("Location:../view/viewtaskLaunderer.php?taskID=$taskID");
}

