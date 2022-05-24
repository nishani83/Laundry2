<?php

class order {

    public function viewAllOrders() {
        $con = $GLOBALS['con'];
        $sql = "select * from orders";
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllWebOrders() {
        $con = $GLOBALS['con'];
        $sql = "select weborder.weborderID,customer.name,weborder.pickupDate from orders left join weborder on orders.orderID=weborder.weborderID left join customer on customer.customerID=orders.orderID";
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

    // webcustomer place an order
    public function addWebOrder($arr) {

        session_start();

        $con = $GLOBALS['con'];

        $pickupdate = $arr['pickupdate'];
        $pickuptime = $arr['pickuptime'];
        $deliverydate = $arr['deliverydate'];
        $deliverycharge = $arr['deliverycharge'];
        $delivery_destination = $arr['deliverydestination'];
        $delivery_address = $arr['houseno'] . ", " . $arr['street'] . ", " . $arr['city'];
        $delivery_instruc = $arr['deliveryinstruc'];

        $orderdate = date('Y-m-d');
        $amount = $arr['orderamount'];
        $customerid = $arr['customerid'];

        // generate next order id
        $sql = "SELECT weborderID FROM weborder ORDER BY weborderID DESC LIMIT 1";
        $result = $con->query($sql);
        $rowid = $result->fetch_assoc();

        if (empty($rowid)) {
            $newOrderID = 'OW000001';
        } else {
            $str2 = substr($rowid['weborderID'], 2);
            $new_id = $str2 + 1;
            $newOrderID = 'OW' . sprintf("%06d", $new_id);
        }

        $sqlweborder = "INSERT INTO weborder (weborderID, pickupDate, pickupTime, deliveryDate, deliveryCharge, delivery_destination, delivery_address, deliveryt_instruc, payment_status) VALUES('$newOrderID','$pickupdate','$pickuptime','$deliverydate','$deliverycharge','$delivery_destination','$delivery_address','$delivery_instruc','pending')";
        $con->query($sqlweborder) or die($con->error);

        $sqlorder = "INSERT INTO orders (orderID, orderDate, amount, orderStatus, customerID) VALUES('$newOrderID','$orderdate','$amount','pending','$customerid')";
        $con->query($sqlorder) or die($con->error);

        foreach ($_SESSION['my_bucket'] as $x => $arr_result) {
            $itemID = $_SESSION['my_bucket'][$x]['item_id'];
            $qty = $_SESSION['my_bucket'][$x]['item_qty'];
            $serviceid = $_SESSION['my_bucket'][$x]['item_method'];
            $form = $_SESSION['my_bucket'][$x]['item_form'];

            $sqlorderitem = "INSERT INTO orderitem (itemID, qty, status, orderID, serviceID, form) VALUES('$itemID','$qty','incompleted','$newOrderID','$serviceid','$form')";
            $con->query($sqlorderitem) or die($con->error);
        }

        return 1;
    }

    // get latest order details
    public function viewLatestOrder($userid) {
        $con = $GLOBALS['con'];

        $sql = "SELECT orders.orderID, orders.orderDate, orders.amount, weborder.delivery_address, weborder.payment_status, weborder.deliveryCharge
      FROM orders
      INNER JOIN weborder ON orders.orderID = weborder.weborderID
      WHERE orders.customerID = '$userid'
      ORDER BY orders.orderID DESC LIMIT 1";

        $result = $con->query($sql);
        return $result;
    }

    public function viewItemsOfOrder($orderID) {

        $con = $GLOBALS['con'];

        $sql = "SELECT orderitem.*, item.itemName, service.serviceType, service_item.price
      FROM orderitem
      LEFT JOIN item ON orderitem.itemID = item.itemID
      LEFT JOIN service ON orderitem.serviceID = service.serviceID
      RIGHT JOIN service_item ON (service_item.serviceID = service.serviceID) AND (service_item.itemID = item.itemID)
      WHERE orderitem.orderID = '$orderID'";

        $result = $con->query($sql);
        return $result;
    }

    // update payment status
    public function updatePayStatus($userid) {

        $con = $GLOBALS['con'];

        $sql = "SELECT * FROM orders
      INNER JOIN weborder ON orders.orderID = weborder.weborderID
      WHERE orders.customerID='$userid' ORDER BY orders.orderID DESC LIMIT 1";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $orderid = $row['orderID'];

        $sql = "UPDATE weborder SET payment_status = 'paid' WHERE weborderID = '$orderid'";
        $paychange = $con->query($sql) or die($con->error);
        return $paychange;
    }

}
?>

