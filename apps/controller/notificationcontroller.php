<?php

include '../common/dbconnection.php';

include '../model/notificationmodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obj = new notification();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);
$notificationID = $_REQUEST['notificationID'];

if ($status == "read") {
    //$scheduleID = $_GET['scheduleID'];

    $obj->changeNotificationStatus($notificationID, $status);
    header("Location:../view/dashboardLaunderer.php?");
}
