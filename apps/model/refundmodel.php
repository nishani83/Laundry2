<?php

class refund {

    function addRefund($orderID, $amount, $reason, $status, $person) {


        $con = $GLOBALS['con'];
        $sql = "INSERT INTO refund (refundDate,orderID,amount,reason,personResponsible,status) VALUES('','$vehicleType','Active')";
        $result = $con->query($sql) or die($con->error);
        $vehicleID = $con->insert_id; //Last ID
        return $vehicleID;
    }

}
