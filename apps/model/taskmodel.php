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

    public function updateTask($taskID, $arr) {
        $taskName = $arr['taskName'];
        $orderID = $arr['orderID'];
        $dueDate = $arr['dueDate'];
        $endTime = $arr['endTime'];
        $taskstatus = $arr['taskstatus'];
        $empID = $arr['empID'];
        $completedDate = $arr['completedDate'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE task SET taskID = '$taskID', taskName = '$taskName', orderID = '$orderID', dueDate = '$dueDate', endTime = '$endTime', taskstatus = '$taskstatus', empID = '$empID', completedDate = '$completedDate' WHERE taskID = '$taskID'";
        $result = $con->query($sql) or die($con->error);

        return $taskID;
    }

    public function changeStatus($taskID, $status) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE task SET taskstatus = '$status' WHERE taskID = '$taskID'";
        $result = $con->query($sql) or die($con->error);

        return $taskID;
    }

    function addTask($arr) {
        $taskName = $arr['taskname'];
        $dueDate = $arr['dueDate'];
        $orderID = $arr['orderID'];
        $launderer = $arr['empID'];
        $createdDate = date("Y-m-d");
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO task (taskName,orderID,dueDate,empID,taskstatus,createdDate) VALUES('$taskName','$orderID','$dueDate','$launderer','todo','$createdDate')";
        $result = $con->query($sql) or die($con->error);
        $taskID = $con->insert_id; //Last ID
        return $taskID;
    }

    function changeTaskStatus($taskID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE task SET taskstatus = 'inprogress' WHERE taskID = '$taskID'";
        $result = $con->query($sql) or die($con->error);
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

    public function viewLaundererAssignedTasks($laundererID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM task

WHERE empID='$laundererID'
        ORDER BY dueDate";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }


    public function viewLaundererAssignedTasksWithTaskID($laundererID, $taskID) {
      $con = $GLOBALS['con'];
      //sql query
      $sql = "SELECT * FROM task
      WHERE empID='$laundererID' AND taskID = '$taskID'
      ORDER BY dueDate";
      //Execute a query
      $result = $con->query($sql);
      return $result;
    }

    // tasks of month and year 
    public function tasksofmonth($year, $month){
      $con = $GLOBALS['con'];

      $sql = "SELECT task.*, employee.empName
      FROM task
      INNER JOIN employee ON employee.empID = task.empID
      WHERE YEAR(createdDate)='$year' AND MONTH(createdDate) = '$month'";

      $result = $con->query($sql);
      return $result;
    }

    // task availability for selected month 
    public function tasksAvailabilityMonth($year, $month){
      $con = $GLOBALS['con'];

      $sql = "SELECT count(*) as count FROM task WHERE YEAR(createdDate) = '$year' AND MONTH(createdDate) = '$month'";
      $result = $con->query($sql);
      return $result;

    }

    // task count for month
    public function tasksCountMonth($month, $year, $taskstatus){
      $con = $GLOBALS['con'];

      $sql = "SELECT count(*) as statuscount FROM task
      WHERE taskstatus='$taskstatus' AND YEAR(createdDate)='$year' AND MONTH(createdDate)='$month' ";
      $result = $con->query($sql);
      return $result;
    }

  
}
