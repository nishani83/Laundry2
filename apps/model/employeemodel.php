<?php

class employee {

    public function viewAllEmployee() {
        $con = $GLOBALS['con'];
        $sql = "SELECT employee.empID,empName,designation,telephone,email,licenceNo,status FROM employee left join driver on employee.empID=driver.empID ORDER BY employee.empID ; ";
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllDrivers() {
//   $leaveDate = date("yy-mm-dd", strtotime($lDate));

        $con = $GLOBALS['con'];

        //   $sql = "SELECT E.empID,E.empName FROM employee E inner join driver D on E.empID = D.empID where E.status='active' AND E.empID NOT IN (SELECT empID FROM `empleave` WHERE leaveDate = '$leaveDate');";
        //   $sql = "SELECT E.empID,E.empName FROM employee E inner join driver D on E.empID = D.empID where E.status='active' AND E.empID NOT IN (SELECT empID FROM empleave);";
        $sql = "SELECT * FROM employee E inner join driver D on E.empID = D.empID inner join empleave L on E.empID=L.empID where E.status='active' AND E.designation='driver';";
        $result = $con->query($sql);
        return $result;
    }

    public function viewAvailableLaunderers() {
//   $leaveDate = date("yy-mm-dd", strtotime($lDate));

        $con = $GLOBALS['con'];

        //   $sql = "SELECT E.empID,E.empName FROM employee E inner join driver D on E.empID = D.empID where E.status='active' AND E.empID NOT IN (SELECT empID FROM `empleave` WHERE leaveDate = '$leaveDate');";
        $sql = "SELECT E.empID,E.empName FROM employee E  where E.status='active' AND E.designation='launderer';";
        $result = $con->query($sql);
        return $result;
    }

    public function viewAEmployee($empID) {
        $con = $GLOBALS['con'];
        //sql query
        // echo $empID;
        $sql = "SELECT employee.empID, empName, NIC, designation, address, hireDate, telephone, email, licenceNo, status FROM employee left join driver on employee.empID = driver.empID where employee.empID = '$empID'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function checkEmail($email) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM login WHERE email = '$email'";
        $result = $con->query($sql);
        $nor = $result->num_rows;
        return $nor;
    }

    function addEmployee($arr) {
        $name = $arr['name'];
        $NIC = $arr['NIC'];
        $designation = $arr['designation'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $hireDate = $arr['hireDate'];
        $licenceNo = $arr['licenceNo'];

        $con = $GLOBALS['con'];

        //

        $p = sha1('abc'); //encrypted password
        $sqlRole = "select * from userrole where roleName = '$designation'";
        $result = $con->query($sqlRole);
        while ($row = $result->fetch_assoc()) {
            $roleID = $row['roleID'];
        }
        //Insert into login table
        $sqllog = "INSERT INTO login (roleID, password) VALUE ('$roleID', '$p')";
        $resultlog = $con->query($sqllog) or die($con->error);
        $userID = $con->insert_id;

        $sql = "INSERT INTO employee (userID, NIC, empName, telephone, email, address, designation, hireDate, status) VALUES('$userID', '$NIC', '$name', '$contactNo', '$email', '$address', '$designation', '$hireDate', 'Active')";
        $result = $con->query($sql) or die($con->error);
        $empID = $con->insert_id; //Last ID

        $sqldr = "INSERT INTO driver (empID, licenceNo) VALUES('$empID', '$licenceNo')";
        $result = $con->query($sqldr) or die($con->error);

        return $empID;
    }

    function updateEmployee($empID, $arr) {
        $name = $arr['name'];
        $NIC = $arr['NIC'];
        $designation = $arr['designation'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $hireDate = $arr['hireDate'];
        $licenceNo = $arr['licenceNo'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET empID = '$empID', empName = '$name', address = '$address', telephone = '$contactNo', email = '$email', hireDate = '$hireDate', NIC = '$NIC' WHERE empID = '$empID'";
        $result = $con->query($sql) or die($con->error);
        $sqldr = "UPDATE driver SET licenceNo = '$licenceNo' WHERE empID = '$empID'";
        $result = $con->query($sqldr) or die($con->error);
        return $empID;
    }

    function deactiveEmployee($empID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET status = 'deactive' WHERE empID = '$empID'";
        $result = $con->query($sql);
    }

    function activeEmployee($empID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET status = 'active' WHERE empID = '$empID'";
        $result = $con->query($sql);
    }

}
