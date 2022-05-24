<?php

include '../common/dbconnection.php';
include '../model/taskmodel.php';
include '../model/notificationmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new task();
$obn = new notification();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $obj->addTask($arr);
        $type = "task";
        $msg = "new task assigned";
        $obn->addNotification($type, $msg, $arr);
        header("Location:../view/task.php?status=success");

        break;

    case "update":
        $taskID = $_GET['taskID'];
        $arr = $_POST;
        $obj->updateTask($taskID, $arr);
        header("Location:../view/task.php?status=success");

        break;

    case "inprogress":
        $taskID = $_GET['taskID'];
        $empID = $_GET['empID'];
        $obj->changeTaskStatus($taskID);
        header("Location:../view/laundererTask.php?empID=$empID");
        break;

    case "active":
        $taskID = $_GET['taskID'];
        $obj->activeTask($taskID);
        header("Location:../view/task.php?status=success");
        break;

    case "view":
        $taskID = $_GET['taskID'];

        $obj->viewTask($taskID);
        header("Location:../view/task.php?status=success");
        break;
}
