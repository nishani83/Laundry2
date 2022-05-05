<?php

class task {

    public function viewTask($taskID) {
        $con = $GLOBALS['con'];
        //sql query
        //$sql = "SELECT * FROM vehicle v, vehicletype vt where v.vehicleType = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
        $sql = "SELECT * FROM task t Left JOIN employee e ON t.empID=e.empID where e.designation='launderer' and t.taskID='$taskID'";

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
        $sql = "INSERT INTO task (taskName,orderID,dueDate,empID,status) VALUES('$taskName','$orderID','$dueDate','$launderer','todo')";
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

}
