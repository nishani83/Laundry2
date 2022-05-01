<?php

class service {

    function addService($arr) {
        $con = $GLOBALS['con'];
        $itemID = $arr['itemID'];
        $price = $arr['price'];
        $serviceID = $arr['service'];
        //    $image = $arr['MyFile'];



        $sql = "INSERT INTO service_item(itemId,serviceID,price) VALUES('$itemID','$serviceID','$price')";
        $result = $con->query($sql) or die($con->error);
    }

    function getServiceCharge($itemID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM service_item where itemID='$itemID'   ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}
