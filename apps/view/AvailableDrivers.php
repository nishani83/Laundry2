<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include '../common/dbconnection.php';
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee();
$leavedate = $_GET['selecteddate'];
$obj->viewAvailableDrivers($leavedate);

header("Location:../view/scheduleplan.php?status=success");
?>