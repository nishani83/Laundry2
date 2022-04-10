<?php

include '../common/dbconnection.php';
include '../model/servicemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new service();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $obj->addService($arr);

        header("Location:../view/service.php?status=success");

        break;

    case "update":
        $serviceID = $_GET['serviceID'];
        $arr = $_POST;
        $obj->updateService($serviceID, $arr);
        header("Location:../view/service.php?status=success");

        break;

    case "deactive":
        $serviceID = $_GET['serviceID'];
        $obj->deactiveService($serviceID);
        header("Location:../view/service.php?status=success");
        break;

    case "active":
        $serviceID = $_GET['serviceID'];
        $obj->activeService($serviceID);
        header("Location:../view/service.php?status=success");
        break;

    case "view":
        $serviceID = $_GET['serviceID'];

        $obj->viewService($serviceID);
        header("Location:../view/service.php?status=success");
        break;
}
