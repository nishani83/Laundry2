<!DOCTYPE html>
<?php
//To start the session
if (!isset($_SESSION)) {
    session_start();
}
date_default_timezone_set("Asia/colombo");

//$user_info = $_SESSION['user_info'];
//$out = date("Y-m-d") . " " . date('H:i:s');
include '../common/dbconnection.php';
$ob = new dbconnection();
$con = $ob->connection();

unset($_SESSION['user_info']); //To remove session by session
header("Location:login.php"); //To redirect within 3 second
?>