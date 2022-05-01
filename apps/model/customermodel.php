<?php

class customer {

    public function viewAllCustomer() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM customer ; ";
        //$sql = "SELECT * FROM customer left join webcustomer on customer.customerID=webcustomer.customerID ORDER BY customer.customerID ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function reportCustomer() {
        $con = $GLOBALS['con'];
        //sql query
        // $sql = "SELECT * FROM customer ; ";
        $sql = "SELECT * FROM customer right join webcustomer on customer.customerID=webcustomer.customerID ORDER BY customer.customerID ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomer($customerID) {
        $con = $GLOBALS['con'];
        //sql query
        // echo $empID;
        $sql = "SELECT * FROM customer left join webcustomer on customer.customerID=webcustomer.customerID where customer.customerID='$customerID'";
        //Execute a query
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    /*
      function checkEmail($email) {
      $con = $GLOBALS['con'];
      $sql = "SELECT * FROM login WHERE email='$email'";
      $result = $con->query($sql);
      $nor = $result->num_rows;
      return $nor;
      }
     */

    function addCustomer($arr) {
        $name = $arr['name'];
        $contactNo = $arr['contactNo'];
        $address = $arr['address'];
        $RegisteredDate = date("Y-m-d");

        $con = $GLOBALS['con'];
        //creating IDs
        $sqlID = "select concat('c',lpad(MAX(substr(customerID,2))+1,5,'0'))customerID FROM customer;";
        $resultID = $con->query($sqlID) or die($con->error);
        while ($rowID = $resultID->fetch_array()) {
            $customerID = $rowID['customerID'];
        }

        $sql = "INSERT INTO customer (customerID,name,address,contactNo,RegisteredDate,status) VALUES('$customerID','$name','$address','$contactNo','$RegisteredDate','Active')";
        $result = $con->query($sql) or die($con->error);

        return $customerID;
    }

    function addWebCustomer($arr) {
        session_start();
        $name = $_SESSION['fName'] . ' ' . $_SESSION['lName'];
        $phone = $_SESSION['phone'];
        $address = $arr['address1'] . ',' . $arr['address2'] . ',' . $arr['city'];
        $email = $_SESSION['email'];
        $longtitude = $arr['longitude'];
        $latitude = $arr['latitude'];
        $RegisteredDate = date("Y-m-d");

        $con = $GLOBALS['con'];
        //creating IDs
        $sqlID = "select concat('c',lpad(MAX(substr(customerID,2))+1,5,'0'))customerID FROM customer;";
        $resultID = $con->query($sqlID) or die($con->error);
        while ($rowID = $resultID->fetch_array()) {
            $customerID = $rowID['customerID'];
        }

        $sql = "INSERT INTO customer (customerID,name,address,RegisteredDate,contactNo,status) VALUES('$customerID','$name','$address','$RegisteredDate','$phone','Active')";
        $result = $con->query($sql) or die($con->error);
        $refferal = "CAN" . substr($customerID, -3) . $name[0] . substr($name, -1);

        $sqlweb = "INSERT INTO webcustomer (customerID,email,longitude,latitude,refferalCode) VALUES('$customerID','$email','$longtitude','$latitude','$refferal')";
        $resultweb = $con->query($sqlweb) or die($con->error);
        return $customerID;
    }

    function updateCustomer($customerID, $arr) {
        $name = $arr['name'];
        $contactNo = $arr['contactNo'];
        $address = $arr['address'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET customerID='$customerID', name='$name',address='$address',contactNo='$contactNo' WHERE customerID='$customerID'";
        $result = $con->query($sql) or die($con->error);
        return $customerID;
    }

    function deactiveCustomer($customerID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET status='Deactive' WHERE customerID='$customerID'";
        $result = $con->query($sql);
    }

    function activeCustomer($customerID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET status='Active' WHERE customerID='$customerID'";
        $result = $con->query($sql);
    }

}
