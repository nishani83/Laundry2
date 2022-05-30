<?php

class refund {

    function addRefund($orderID, $amount, $reason, $status, $person) {


        $con = $GLOBALS['con'];
        $sql = "INSERT INTO refund (refundDate,orderID,amount,reason,personResponsible,status) VALUES(CURDATE(),'$orderID','$amount','$reason','$person','$status')";
        $result = $con->query($sql) or die($con->error);
        $refundID = $con->insert_id; //Last ID
        return $refundID;
    }

}
