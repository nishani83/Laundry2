<?php

include '../common/dbconnection.php';
include '../model/schedulemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule();

$status = strtolower($_REQUEST['status']);
$arr = $_POST;
// $arr_2 = $_POST['pick'];
// echo "<pre>".print_r($arr)."</pre>";
switch ($status) {
    case "add":
        $arr = $_POST;
        $empID = $obj->addSchedule($arr);

        header("Location:../view/schedule.php?status=success");
        echo $empID;
        break;
    case "view":
        $scheduleID = $_GET['scheduleID'];

        $obj->viewSchedule($scheduleID);
        header("Location:../view/schedule.php?status=success");
        break;
}
//
?>
