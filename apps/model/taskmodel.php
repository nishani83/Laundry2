<?php

class task {

    public function viewVehicleType() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicletype ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewVehicle($vehicleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicle v Left JOIN vehicletype vt ON v.vehicleType = vt.vehicleTypeID WHERE vehicleID='$vehicleID' ORDER BY v.vehicleID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addTask($arr) {
        $taskName = $arr['taskname'];
        $dueDate = $arr['dueDate'];
        $orderID = $arr['orderID'];
        $launderer = $arr['empID'];
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO task (taskName,orderID,dueDate,empID,status) VALUES('$taskName','$orderID','$dueDate','$launderer','active')";
        $result = $con->query($sql) or die($con->error);
        $taskID = $con->insert_id; //Last ID
        return $taskID;
    }

    public function viewAllTask() {
        $con = $GLOBALS['con'];
        //sql query
        //$sql = "SELECT * FROM vehicle v, vehicletype vt where v.vehicleType = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
        $sql = "SELECT * FROM task t Left JOIN employee e ON t.empID=e.empID where e.designation='launderer' ORDER BY t.taskID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function updateVehicle($vehicleID, $arr) {
        $vehicleNo = $arr['vehicleNo'];
        $vehicleTypeID = $arr['vehicleTypeID'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET vehicleNo='$vehicleNo', vehicleType='$vehicleTypeID' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql) or die($con->error);
        return $vehicleID;
    }

    function deactiVevehicle($vehicleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET status='Deactive' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql);
    }

    function activeVehicle($vehicleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET status='Active' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql);
    }

}
