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

    public function viewAllDriverBinCollection($driverID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN vehicle v ON s.vehicleID=v.vehicleID
        Inner JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID
        Inner JOIN employee e ON s.driverID=e.empID
        Inner JOIN route r ON r.routeID=s.routeID
WHERE s.driverID='$driverID' AND s.isConfirmed='Active'
        ORDER BY s.sDate DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewScheduleBins($scheduleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM schedule s
        Inner JOIN garbageloc g ON g.scheduleID=s.scheduleID
    INNER JOIN binallocation ba ON ba.binAllocationID = g.binAllocationID
INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
WHERE s.scheduleID='$scheduleID'";
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
        $driverID = $arr['driverID'];
        $routeID = $arr['routeID'];
        $vehicleID = $arr['vehicleID'];
        $sDate = $arr['sDate'];
        $start = $arr['start'];
        $end = $arr['end'];
        $startOdo = $arr['startOdo'];
        $binLoc = $arr['binLoc'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO schedule (driverID,routeID, vehicleID, sDate,startTime,endTime,startMeter, isConfirmed) VALUES('$driverID','$routeID','$vehicleID','$sDate','$start','$end','$startOdo','Approved')";
        $result = $con->query($sql);

        $scheduleID = $con->insert_id;
        $query = array();

        foreach ($binLoc as $binLocId) {
            $query[] = "('$scheduleID', '$binLocId')";
        }

        $con->query('INSERT INTO garbageloc(scheduleID, binAllocationID) VALUES ' . implode(',', $query));
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
