<?php

class schedule {

    public function viewAllSchedule() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN vehicletype vt ON v.vehicleType = vt.vehicleTypeID
        Inner JOIN employee e ON s.driverID=e.empID
        ORDER BY s.scheduleDate DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewSchedule($scheduleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN vehicletype vt ON v.vehicleType = vt.vehicleTypeID
        Inner JOIN employee e ON s.driverID=e.empID
        where s.scheduleID='$scheduleID'
        ORDER BY s.scheduleDate DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewDriverAssignedSchedules($driverID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT s.scheduleID,v.vehicleNo,s.startTime FROM schedule s
        LEFT JOIN vehicle v ON s.vehicleID=v.vehicleID
        LEFT JOIN employee e ON s.driverID=e.empID

WHERE s.driverID='$driverID'
        ORDER BY s.scheduleDate DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewSchedulePendingOrders($scheduleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT s.orderID FROM schedule_weborder s
            LEFT JOIN orders o ON o.orderID=s.orderID
WHERE s.scheduleID='$scheduleID' and o.orderStatus='pending'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewScheduleDeliveryOrders($scheduleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT s.orderID FROM schedule_weborder s
            LEFT JOIN orders o ON o.orderID=s.orderID
WHERE s.scheduleID='$scheduleID' and o.orderStatus='onDelivery'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function scheduleCalendar() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID
        Inner JOIN employee e ON s.driverID=e.empID
        Inner JOIN route r ON r.routeID=s.routeID
        WHERE s.isConfirmed='Approved'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    //view driver's pending schedules
    public function viewMyAllSchedule($userID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID
        Inner JOIN employee e ON s.driverID=e.empID
        Inner JOIN route r ON r.routeID=s.routeID
        WHERE s.driverID='$userID' ORDER BY s.sDate DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewASchedule($scheduleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN employee e ON s.driverID=e.empID
    Inner JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID
        Inner JOIN route r ON r.routeID=s.routeID
        WHERE scheduleID='$scheduleID'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addSchedule($arr) {
        $scheduleDate = $arr['datepicker'];
        $startTime = $arr['starttime'];
        $vehicleID = $arr['vehicleID'];
        $driverID = $arr['driverID'];

        $pickup = $arr['pick'];
        //  $delivery = $arr['del'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO schedule (createdDate,scheduleDate,startTime, vehicleID, driverID, isConfirmed) VALUES(NOW(),'$scheduleDate','$startTime','$vehicleID','$driverID','pending')";
        $result = $con->query($sql)or die($con->error);
        $scheduleID = $con->insert_id;

        $status = "assigned";
        $sql2 = "INSERT INTO empleave(empID,leaveDate,time)VALUES('$driverID','$scheduleDate','$startTime')";
        $result2 = $con->query($sql2) or die($con->error);

        $type = "pickup";

        $query = array();

        foreach ($pickup as $orderID) {
            $sql = "INSERT INTO schedule_weborder(scheduleID, orderID,type) VALUES ('$scheduleID','$orderID','$type')";
            $result = $con->query($sql)or die($con->error);

            echo $orderID;
            // $query[] = "('$scheduleID', '$orderID','$type')";
        }

        //  $con->query('INSERT INTO schedule_weborder(scheduleID, orderID,type) VALUES ' . implode(',', $query));
        return $scheduleID;
    }

    function updateschedule($scheduleID, $arr) {
        $name = $arr['name'];
        $NIC = $arr['NIC'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $longitude = $arr['longitude'];
        $latitude = $arr['latitude'];
        //$scheduleID = $arr['scheduleID'];


        $con = $GLOBALS['con'];
        $sql = "UPDATE schedule SET cusName='$name', NIC='$NIC',cusAddress='$address',contactNo='$contactNo',email='$email',longitude='$longitude',latitude='$latitude' WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql) or die($con->error);
        return $scheduleID;
    }

    function deactiveschedule($scheduleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE schedule SET cusStatus='Deactive' WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql);
    }

    //driver decline schedule
    function declineSchedule($cusID, $scheduleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE schedule SET isConfirmed='Decline' WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql);

        $sql2 = "INSERT INTO scheduleconfirmation (driverID,scheduleID,confirmDate,isConfirmed) VALUES ('$cusID','$scheduleID',Now(),'Decline')";
    }

    function approveSchedule($cusID, $scheduleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE schedule SET isConfirmed='Approve' WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql);

        $sql2 = "INSERT INTO scheduleconfirmation (driverID,scheduleID,confirmDate,isConfirmed) VALUES ('$cusID','$scheduleID',Now(),'Approve')";
    }

    function activeSchedule($scheduleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE schedule SET cusStatus='Active' WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql);
    }

    function deleteSchedule($scheduleID) {
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM `schedule` WHERE scheduleID='$scheduleID'";
        $result = $con->query($sql);
    }

}
