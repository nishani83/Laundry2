<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();

$user = "94719496590";
$password = "7152";
$otp = rand(1000, 9999);
$_SESSION['session_otp'] = $otp;
$text = urlencode("Your requeted OTP to register for CanrenWash is {$otp}");
$to = $_POST['mobile'];

$baseurl = "http://www.textit.biz/sendmsg";
$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
$ret = file($url);

$res = explode(":", $ret[0]);

if (trim($res[0]) == "OK") {
    header("Location:register_2.php");
    exit();
} else {
    echo "Sent Failed - Error : " . $res[1];
}


