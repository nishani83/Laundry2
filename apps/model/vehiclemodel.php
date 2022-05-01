<?php

class vehicle {

//    public function viewAllEmployee() {
//        $con = $GLOBALS['con'];
//        //sql query
//        $sql = "SELECT employee.empID,empName,designation,telephone,email,licenceNo,status FROM employee left join driver on employee.empID=driver.empID ORDER BY employee.empID ; ";
//        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
//        //Execute a query
//        $result = $con->query($sql);
//        return $result;
//    }

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

    public function viewAEmployee($empID) {
        $con = $GLOBALS['con'];
        //sql query
        // echo $empID;
        $sql = "SELECT employee.empID,empName,NIC,designation,address,hireDate,telephone,email,licenceNo,status FROM employee left join driver on employee.empID=driver.empID where employee.empID='$empID'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function checkEmail($email) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM login WHERE email='$email'";
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

        $p = substr(sha1(microtime()), rand(0, 26), 5); //encrypted password
        $sqlRole = "select * from userrole where roleName='$designation'";
        $result = $con->query($sqlRole);
        while ($row = $result->fetch_assoc()) {
            $roleID = $row['roleID'];
        }
        //Insert into login table
        $sqllog = "INSERT INTO login (roleID,password) VALUE ('$roleID','$p')";
        $resultlog = $con->query($sqllog) or die($con->error);
        $userID = $con->insert_id;

        $sql = "INSERT INTO employee (userID,NIC,empName,telephone,email,address,designation,hireDate,status) VALUES('$userID','$NIC','$name','$contactNo','$email','$address','$designation','$hireDate','Active')";
        $result = $con->query($sql) or die($con->error);
        $empID = $con->insert_id; //Last ID

        $sqldr = "INSERT INTO driver (empID,licenceNo) VALUES('$empID','$licenceNo')";
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
        $sql = "UPDATE employee SET empID='$empID', empName='$name',address='$address',telephone='$contactNo',email='$email',hireDate='$hireDate', NIC='$NIC' WHERE empID='$empID'";
        $result = $con->query($sql) or die($con->error);
        $sqldr = "UPDATE driver SET licenceNo='$licenceNo' WHERE empID='$empID'";
        $result = $con->query($sqldr) or die($con->error);
        return $empID;
    }

    function deactiveEmployee($empID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET status='Deactive' WHERE empID='$empID'";
        $result = $con->query($sql);
    }

    function activeEmployee($empID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET status='Active' WHERE empID='$empID'";
        $result = $con->query($sql);
    }

}