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

}
