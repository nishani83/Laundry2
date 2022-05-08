<?php 

include '../common/dbconnection.php';
include '../model/ordermodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new order();


$arr = $_POST;
$response = $obj->addWebOrder($arr);
echo $response;

// unset the bucket session after order placed 
unset($_SESSION['my_bucket']);

?>
