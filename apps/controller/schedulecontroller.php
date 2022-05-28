<?php

include '../common/dbconnection.php';
include '../model/schedulemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule();

$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $empID = $obj->addSchedule($arr);

        header("Location:../view/schedule.php?status=success");
        echo $empID;
        break;
}
?>
