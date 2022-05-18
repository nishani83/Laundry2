<?php

include '../common/dbconnection.php';
include '../model/itemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new item();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $itemID = $obj->addItem($arr);
        header("Location:../view/item.php?status=success");

        break;

    // case "update":
    //     $itemID = $_GET['itemID'];
    //     $arr = $_POST;
    //     $obj->updateItem($itemID, $arr);
    //     header("Location:../view/item.php?status=success");
    //
    //     break;

    case "deactive":
        $itemID = $_GET['itemID'];
        $obj->deactiveItem($itemID);
        header("Location:../view/item.php?status=success");
        break;

    case "active":
        $itemID = $_GET['itemID'];
        $obj->activeItem($itemID);
        header("Location:../view/item.php?status=success");
        break;

    case "view":
        $itemID = $_GET['itemID'];

        $obj->viewItem($itemID);
        header("Location:../view/item.php?status=success");
        break;
}
