<?php

class login {

    public function loginvalidate($email, $pass) {
        $con = $GLOBALS['con'];

        $sql = "SELECT empID,empName,email,roleID,password FROM employee inner join login on employee.userID=login.userID WHERE email='$email' AND password='$pass' AND employee.status='active' ";
        $result = $con->query($sql);

        //web customer login
        if ($result->num_rows == 0) {

          $sql = "SELECT * FROM webcustomer join customer on webcustomer.customerID = customer.customerID WHERE webcustomer.email='$email' AND webcustomer.password='$pass' AND customer.status='active'";
          $result = $con->query($sql);

        }
        // Execute a query

        return $result;
    }

}

?>
