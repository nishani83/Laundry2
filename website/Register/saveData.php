<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$id = ( $_POST["token"]);

$_SESSION['fName'] = $_POST['first_name'];
$_SESSION['lName'] = $_POST['last_name'];
$_SESSION['phone'] = $_POST['phone'];
header("Location:../../website/register/register_2.php");
?>
