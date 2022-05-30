<?php

include '../common/dbconnection.php';
include '../model/schedulemodel.php';
include '../model/notificationmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule();
$obn = new notification();
$status = strtolower($_REQUEST['status']);
$arr = $_POST;
// $arr_2 = $_POST['pick'];
// echo "<pre>".print_r($arr)."</pre>";
switch ($status) {
    case "add":
        $arr = $_POST;
        $scheduleID = $obj->addSchedule($arr);

        $msg = "Scedule assigned : Schedule ID - " . $scheduleID;
        $receiver = $arr['driverID'];
        $obn->addNotification($msg, $receiver);

        header("Location:../view/schedule.php?status=success");

        break;
    case "view":
        $scheduleID = $_GET['scheduleID'];

        $obj->viewSchedule($scheduleID);
        header("Location:../view/schedule.php?status=success");
        break;
}
//
?>
