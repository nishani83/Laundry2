<?php

class notification {

    public function addNotification($msg, $receiver) {


        $con = $GLOBALS['con'];
        $sql = "INSERT INTO notification (notificationDate,senderID,message,notificationStatus,recieverID) VALUES (NOW(),1,'$msg','pending','$receiver')";
        $result = $con->query($sql);
        $notification_id = $con->insert_id;
        return $notification_id;
    }

    public function viewNotification($empID) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM notification where recieverID='$empID'  AND notificationStatus='pending'";
        $result = $con->query($sql);
        return $result;
    }

    public function changeNotificationStatus($notificationID, $status) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE notification SET notificationStatus = '$status' WHERE notificationID = '$notificationID'";
        $result = $con->query($sql) or die($con->error);

        return $orderID;
    }

}

?>