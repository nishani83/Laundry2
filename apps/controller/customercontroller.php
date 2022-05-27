<?php

include '../common/dbconnection.php';
include '../model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $customerID = $obj->addCustomer($arr);

        header("Location:../view/customer.php?status=success");

        break;
    case "addweb":
        echo 'success';
        $arr = $_POST;
        $customerID = $obj->addWebCustomer($arr);

        header("Location:../view/login.php");

        break;

    case "update":
        $customerID = $_GET['customerID'];
        $arr = $_POST;
        $obj->updateCustomer($customerID, $arr);
        header("Location:../view/customer.php?status = success");

        break;

    case "deactive":
        $customerID = $_GET['customerID'];
        $obj->deactiveCustomer($customerID);
        header("Location:../view/customer.php?status = success");
        break;

    case "active":
        $customerID = $_GET['customerID'];
        $obj->activeCustomer($customerID);
        header("Location:../view/customer.php?status = success");
        break;

    case "view":
        $customerID = $_GET['customerID'];

        $obj->viewCustomer($customerID);
        header("Location:../view/customer.php?status = success");
        break;
}
