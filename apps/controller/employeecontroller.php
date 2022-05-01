<?php

include '../common/dbconnection.php';
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee();

$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $empID = $obj->addEmployee($arr);

        header("Location:../view/employee.php?status=success");

        break;

    case "update":
        $empID = $_GET['empID'];
        $arr = $_POST;
        $obj->updateEmployee($empID, $arr);
        header("Location:../view/employee.php?status=success");

        break;

    case "deactive":
        $empID = $_GET['empID'];
        $obj->deactiveEmployee($empID);
        header("Location:../view/employee.php?status=success");
        break;

    case "active":
        $empID = $_GET['empID'];
        $obj->activeEmployee($empID);
        header("Location:../view/employee.php?status=success");
        break;

    case "view":
        $empID = $_GET['empID'];

        $obj->viewEmployee($empID);
        header("Location:../view/employee.php?status=success");
        break;
}
