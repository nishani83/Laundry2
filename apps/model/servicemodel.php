<?php

class item {

    public function viewItemByCategory($categoryID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM item where categoryID='$categoryID'   ; ";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}
