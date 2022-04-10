<?php

//To start the session
if (!isset($_SESSION)) {
    session_start();
}


if ($_SESSION['s_id'] == "") {
    //ERROR REPORTING
    //error_reporting(E_ERROR | E_WARNING | E_PARSE);
    //To get IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //identify client ip (here used few methods)
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $_SESSION['s_id'] = time() . "_" . $ip; //create session id
}

$s_id = $_SESSION['s_id'];

//if ($_SESSION['cusID'] == "") {
//    $status = 0;
//} else {
//    $status = 1;
//}
//$status;
//To get count from session array
$count = count($_SESSION['user_info']);
//If not login
if ($count == 0) {
    $msg = "Please Login...";
    $msg = base64_encode($msg);
    header("Location:../view/login.php?msg=$msg");
    exit();
}


$user_info = $_SESSION['user_info'];
// print_r($user_info);
$roleID = $user_info['roleID'];

if ($roleID == 1 || $roleID == 2 || $roleID == 3 || $roleID == 4) {
    $userID = $user_info['empID'];
    $userName = $user_info['empName'];

    $roleID = $user_info['roleID'];
} else {
    echo $userName = $user_info['cusName'];
    //  $roleName = $user_info['roleName'];
    echo $userID = $user_info['cusID'];
    echo $roleID = $user_info['roleID'];

//    if ($roleID==1|| $roleID==2 || $roleID==3){
//        $empID = $user_info['empID'];
//        $empName = $user_info['empName'];
//        // $roleName = $user_info['roleName'];
//        $roleID = $user_info['roleID'];
//    }else{
//        $fname = $user_info['cusName'];
//        //  $roleName = $user_info['roleName'];
//        $cusID = $user_info['cusID'];
//        $roleID = $user_info['roleID'];
}


