<?php

class orderitem {

    public function viewItemsByOrder($orderID) {
        $con = $GLOBALS['con'];
        $sql = " select orderitem.orderItemID,orderitem.itemID, item.itemName, orderitem.description, orderitem.status from orderitem left join item on orderitem.itemID=item.itemID where orderitem.orderID='$orderID'";
        $result = $con->query($sql);
        return $result;
    }

}
?>


