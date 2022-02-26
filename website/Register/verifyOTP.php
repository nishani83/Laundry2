<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$session_otp = $_SESSION['session_otp'];
$user_otp = $_POST['otp'];
echo $session_otp;
echo $user_otp;
if ($session_otp == $user_otp) {
    header("Location:register_3.php");
} else {
    $msg = base64_encode("Invalid OTP. Please try again");
    header("Location:register_2.php?msg=$msg");
}
