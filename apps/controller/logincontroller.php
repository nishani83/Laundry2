<?php

//To start the session
if (!isset($_SESSION)) {
    session_start();
}
////To set default time zone
date_default_timezone_set("Asia/colombo");
$msg = base64_encode("Incorrect Email address or Password");

//Server side validation
if ($_POST['email'] == "" || $_POST['pass'] == "") {
//To encode the message
    //Data passing through URL
    header("Location:../view/login.php?msg=$msg");
    exit();
}


include '../common/dbconnection.php';
include '../model/loginmodel.php';

//Get the db connection
$ob = new dbconnection();
$con = $ob->connection();

//Get the values
$email = trim($_POST['email']); //remove space before and after
$pass = sha1(trim($_POST['pass'])); //Encript the password to with table field
//Get login details for given user
$obj = new login();
$result = $obj->loginvalidate($email, $pass);
$row = $result->fetch_array();
$role = $row['roleID'];
echo $role;
//$userName = $row['name'];

if (($result->num_rows == 1) && ($role == '2')) {
    header("Location:../view/dashboardDriver.php");
} else if ($result->num_rows == 1) {
    header("Location:../view/dashboard.php");
} else {
    header("Location:../view/login.php?msg=$msg");
}
//To get customer details
$_SESSION['user_info'] = $row;
?>
