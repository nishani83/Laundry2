<?php

class order {

    public function viewAllOrders() {
        $con = $GLOBALS['con'];
        $sql = "select * from orders";
        $result = $con->query($sql);
        return $result;
    }

    public function viewCollectionLocations() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT webcustomer.latitude,webcustomer.longitude,customer.address FROM webcustomer left join customer on webcustomer.customerID=customer.customerID left join orders on webcustomer.customerID=orders.customerID where orders.orderStatus='pending' ; ";

        $result = $con->query($sql);
        return $result;
    }

    public function viewPendingOrders() {
        $con = $GLOBALS['con'];
        //sql query
        $d = date($cd);
        //   $sql = "SELECT weborder.weborderID,weborder.pickupDate,weborder.pickupTime,customer.city,count(orderitem.itemID) AS items FROM weborder left join orders on weborder.weborderID=orders.orderID left join customer on customer.customerID=orders.customerID left join orderitem on orderitem.orderID=weborder.weborderID where orders.orderStatus='pending' and pickupDate='$d' group by orderitem.orderID  ; ";
        $sql = "SELECT weborder.weborderID,weborder.pickupDate,weborder.pickupTime,customer.city,count(orderitem.itemID) AS items FROM weborder left join orders on weborder.weborderID=orders.orderID left join customer on customer.customerID=orders.customerID left join orderitem on orderitem.orderID=weborder.weborderID where orders.orderStatus='pending' group by orderitem.orderID  ; ";
        $result = $con->query($sql);
        return $result;
    }

    public function viewCompletedOrders() {
        $con = $GLOBALS['con'];
        //sql query
        //  $sql = "SELECT weborder.weborderID,weborder.deliveryDate,weborder.deliveryTime,customer.city,count(orderitem.itemID) AS items FROM weborder left join orders on weborder.weborderID=orders.orderID left join customer on customer.customerID=orders.customerID left join orderitem on orderitem.orderID=weborder.weborderID where orders.orderStatus='completed' and deliveryDate='$d' group by orderitem.orderID";
        $sql = "SELECT weborder.weborderID,weborder.deliveryDate,weborder.deliveryTime,customer.city,count(orderitem.itemID) AS items FROM weborder left join orders on weborder.weborderID=orders.orderID left join customer on customer.customerID=orders.customerID left join orderitem on orderitem.orderID=weborder.weborderID where orders.orderStatus='completed' group by orderitem.orderID";
        $result = $con->query($sql);
        return $result;
    }

}
?>

