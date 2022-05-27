<?php

//To start the session
if (!isset($_SESSION)) {
    session_start();
}



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

date_default_timezone_set("Asia/colombo");
$msg = base64_encode("Incorrect Email address or Password");

// webcustomer login or not for checkout
if (isset($_POST['web_customer_login']) && $_POST['web_customer_login'] == "webCusLogin") {

    if ($_POST['wc_email'] == "" || $_POST['wc_pass'] == "") {
        header("Location:../../website/cart.php?login=login&msg=$msg");
        exit();
    }

    $wc_email = trim($_POST['wc_email']);
    $wc_pass = sha1(trim($_POST['wc_pass']));

    $obj = new login();
    $result = $obj->loginvalidate($wc_email, $wc_pass);
    $row = $result->fetch_array();

    if ($result->num_rows == 1) {

        $_SESSION['customer_id'] = $row['customerID'];

        header("Location:../../website/order.php");
    } else {
        header("Location:../../website/cart.php?login=login&msg=$msg");
    }
} else {

//Server side validation
    if ($_POST['email'] == "" || $_POST['pass'] == "") {
//To encode the message
//Data passing through URL
        header("Location:../view/login.php?msg=$msg");
        exit();
    }

//Get the values
    $email = trim($_POST['email']); //remove space before and after
    $pass = sha1(trim($_POST['pass'])); //Encript the password to with table field
//Get login details for given user
    $obj = new login();
    $result = $obj->loginvalidate($email, $pass);
    $row = $result->fetch_array();

//$userName = $row['name'];

    if (($result->num_rows == 1) && ($role == '2')) {
        header("Location:../view/dashboardDriver.php");
    } else if (($result->num_rows == 1) && ($role == '3')) {
        header("Location:../view/dashboardLaunderer.php");
    } else if ($result->num_rows == 1) {


        header("Location:../view/dashboard.php");
    } else {
        header("Location:../view/login.php?msg=$msg");
    }
//To get customer details
    $_SESSION['user_info'] = $row;
    $_SESSION['customer_id'] = $row['customerID'];
}
?>
