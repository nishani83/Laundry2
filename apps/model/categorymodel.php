<?php

class category {

    public function viewAllCategory() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM category  ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCategory($categoryID) {
        $con = $GLOBALS['con'];
        //sql query
        // echo $empID;
        $sql = "SELECT * FROM category where category.categoryID='$categoryID'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addCategory($arr) {
        $categoryname = $arr['name'];
        //    $image = $arr['MyFile'];

        $con = $GLOBALS['con'];

        //
        if (!empty($_FILES["image"]["name"])) {
            // Get file info
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));
            }
        }


        $sql = "INSERT INTO category(categoryName,categoryImage) VALUES('$categoryname','$imgContent')";
        $result = $con->query($sql) or die($con->error);
        $categoryID = $con->insert_id; //Last ID



        return $categoryID;
    }

    function updateCatgory($categoryID, $arr) {
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

    function deactiveCategory($empID) {
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
