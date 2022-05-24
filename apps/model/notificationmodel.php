<?php

class notification {

    public function addNotification($type, $msg, $arr) {

        $reciever = $arr['empID'];
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO notification (notificationDate,senderID,type,message,notificationStatus,receiverID) VALUES (NOW(),1,'$type','$msg','pending','$reciever')";
        $result = $con->query($sql);
        $notification_id = $con->insert_id;
        return $notification_id;
    }

}

?>