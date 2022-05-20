<?php

class vehicle {

    public function viewVehicleUsage($vehicleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT scheduleDate,empName FROM schedule left join employee on schedule.driverID=employee.empID left join vehicle on schedule.vehicleID=vehicle.vehicleID where vehicle.vehicleID='$vehicleID' ORDER BY scheduleDate DESC  ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllActiveVehicle() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicle where status='active'  ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

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

    function addVehicle($arr) {
        $vehicleNo = $arr['vehicleNo'];
        $vehicleType = $arr['vehicleType'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO vehicle (vehicleNo,vehicleType,status) VALUES('$vehicleNo','$vehicleType','Active')";
        $result = $con->query($sql) or die($con->error);
        $vehicleID = $con->insert_id; //Last ID
        return $vehicleID;
    }

    public function viewAllVehicle() {
        $con = $GLOBALS['con'];
        //sql query
        //$sql = "SELECT * FROM vehicle v, vehicletype vt where v.vehicleType = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
        $sql = "SELECT * FROM vehicle v Left JOIN vehicletype vt ON v.vehicleType = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
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

    function checkVehicle($vehicleNo) {
        $con = $GLOBALS['con'];
        $sql = "SELECT count(vehicleNo) FROM vehicle WHERE vehicleNo='$vehicleNo'";
        $result = $con->query($sql);

        return $result;
    }

}
