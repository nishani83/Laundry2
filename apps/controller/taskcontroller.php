<?php

include '../common/dbconnection.php';
include '../model/taskmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new task();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $obj->addTask($arr);

        header("Location:../view/task.php?status=success");

        break;

    case "update":
        $taskID = $_GET['taskID'];
        $arr = $_POST;
        $obj->updateTask($taskID, $arr);
        header("Location:../view/task.php?status=success");

        break;

    case "deactive":
        $taskID = $_GET['taskID'];
        $obj->deactiveTask($taskID);
        header("Location:../view/task.php?status=success");
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
