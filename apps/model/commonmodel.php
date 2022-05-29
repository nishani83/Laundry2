<?php

class report {

    public function customersByYear($year) {
        $con = $GLOBALS['con'];
        $array = [];
        //  for ($i = 0; $i < 13; $i++) {
        //  $month = sprintf('%02d', $i);
// $sql = "select * from customer where RegisteredDate LIKE '$year-$month%' ";
        $sql = "select MONTHNAME(RegisteredDate),count(*) as cus from customer where YEAR(RegisteredDate)='2022' group by MONTH(RegisteredDate)";
        $result = $con->query($sql);
        // $number = row_count($result);
        //$array[] = $number;
        //  }
        // echo implode(", ", $array);
        return $result;
    }

}

//member
class role {

    public function viewRole() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM role";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

//product
class category {

    public function viewCategory() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM productcategory";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewACategory($catName) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM productcategory WHERE catName = '$catName'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

//vehicle

class CommonVehicle {

    public function viewVehicleType() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicletype";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewActiveVehicles() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicle WHERE vehicleStatus = 'Active'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

//product size
class size {

    public function viewSize() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM productsize";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

class CommonRoute {

    public function viewActiveRoutes() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM route WHERE routeStatus = 'Active'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

class CommonEmployee {

    public function viewActiveDrivers() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM employee em, role r
WHERE em.roleID = r.roleID AND
empStatus = 'Active' AND
roleName IN ('driver', 'admin')";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewActiveStaff() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM employee em, role r
WHERE em.roleID = r.roleID AND
empStatus = 'Active' AND
roleName IN ('staff', 'admin')";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

class CommonBin {

    public function viewFullBins() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM binallocation ba, bintype bt, binvolume bv WHERE ba.binTypeID = bt.binTypeID AND isBinFull = 'yes' AND bv.binVolumeID = ba.binVolumeID";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

class itemCounts {

    public function countpickup() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT COUNT(orderID) as pickCount FROM orders left join weborder on orders.orderID=weborder.weborderID where orderStatus='pending' and pickupDate=CURDATE()";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function countVehicle() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT COUNT(vehicleID) as vehicleCount FROM vehicle";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function countEmployee() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT COUNT(empID) as empCount FROM employee";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function countGarbage() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT SUM(weight) as garbageCount FROM bintrans";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function countBin() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT COUNT(binAllocationID) as binCount FROM binAllocation";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function countRevenue() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT SUM(paymentAmount) as paymentCount FROM payment";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

}
