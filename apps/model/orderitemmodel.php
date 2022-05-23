<?php

class orderitem {

    public function viewItemsByOrder($orderID) {
        $con = $GLOBALS['con'];
        $sql = " select orderitem.orderItemID,orderitem.itemID, item.itemName, orderitem.description, orderitem.status,orderitem.qty ,orderitem.form,service.serviceType from orderitem left join item on orderitem.itemID=item.itemID left join service on orderitem.serviceID=service.serviceID where orderitem.orderID='$orderID'";
        $result = $con->query($sql);
        return $result;
    }

    public function viewItemsForLaunderer($orderID) {
        $con = $GLOBALS['con'];
        $sql = " select orderitem.orderItemID,orderitem.itemID, item.itemName, orderitem.description, orderitem.status,orderitem.qty ,orderitem.form,service.serviceType from orderitem left join item on orderitem.itemID=item.itemID left join service on orderitem.serviceID=service.serviceID where orderitem.orderID='$orderID' and orderitem.status='todo'";
        $result = $con->query($sql);
        return $result;
    }

    public function countTodoItems($orderID) {
        $con = $GLOBALS['con'];
        $sql = " select count(orderitem.orderItemID) as count from orderitem  where orderitem.orderID='$orderID' and orderitem.status='todo'";
        $result = $con->query($sql);
        return $result;
    }

    function processOrderItems($orderitemID, $notes, $status) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE orderitem SET status='$status',notes='$notes' WHERE orderitemID='$orderitemID'";

        $result = $con->query($sql);
    }

}
?>


