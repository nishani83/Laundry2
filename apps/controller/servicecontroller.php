<?php

include '../common/dbconnection.php';
include '../model/categorymodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new category();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $categoryID = $obj->addCategory($arr);

        header("Location:../view/category.php?status=success");

        break;

    case "update":
        $empID = $_GET['categoryID'];
        $arr = $_POST;
        $obj->updateCategory($categoryID, $arr);
        header("Location:../view/category.php?status=success");

        break;

    case "deactive":
        $categoryID = $_GET['categoryID'];
        $obj->deactiveCategory($categoryID);
        header("Location:../view/category.php?status=success");
        break;

    case "active":
        $categoryID = $_GET['categoryID'];
        $obj->activeCategory($categoryID);
        header("Location:../view/category.php?status=success");
        break;

    case "view":
        $categoryID = $_GET['categoryID'];

        $obj->viewCategory($categoryID);
        header("Location:../view/category.php?status=success");
        break;
}
