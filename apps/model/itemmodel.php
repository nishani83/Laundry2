<?php

class item {

    public function viewItemsByCategory($categoryID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM item where categoryID='$categoryID'   ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewItem($itemID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM item where itemID='$itemID'   ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllItem() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM item  ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addItem($arr) {
        $itemname = $arr['name'];
        $catID = $arr['catID'];
       // $image = $arr['MyFile'];

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

        $sql = "INSERT INTO item(itemName,itemImage,categoryID) VALUES('$itemname','$imgContent','$catID')";
        $result = $con->query($sql) or die($con->error);
        $itemID = $con->insert_id; //Last ID

        return $itemID;
    }

    function deactiveItem($itemID) { //when the button is deactive
        $con = $GLOBALS['con'];
        $sql = "UPDATE item SET status='Deactive' WHERE itemID='$itemID'";
        $result = $con->query($sql);
    }

    function activeItem($itemID) { //when the buttton is active
        $con = $GLOBALS['con'];
        $sql = "UPDATE item SET status='Active' WHERE itemID=$itemID";
        $result = $con->query($sql);
    }

}
