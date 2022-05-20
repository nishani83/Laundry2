<?php

class orderitem {

    public function viewItemsByOrder($orderID) {
        $con = $GLOBALS['con'];
        $sql = " select orderitem.orderItemID,orderitem.itemID, item.itemName, orderitem.description, orderitem.status from orderitem left join item on orderitem.itemID=item.itemID where orderitem.orderID='$orderID' and orderitem.status<>'pickedup'";
        $result = $con->query($sql);
        return $result;
    }

    function pickOrderItems($orderitemID, $notes) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE orderitem SET status='pickedup',notes='$notes' WHERE orderitemID='$orderitemID'";

        $result = $con->query($sql);
    }

}
?>


