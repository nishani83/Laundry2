<?php

class notification {

    public function addNotification($type, $msg, $receiver) {


        $con = $GLOBALS['con'];
        $sql = "INSERT INTO notification (notificationDate,senderID,type,message,notificationStatus,recieverID) VALUES (NOW(),1,'$type','$msg','pending','$receiver')";
        $result = $con->query($sql);
        $notification_id = $con->insert_id;
        return $notification_id;
    }

}

?>