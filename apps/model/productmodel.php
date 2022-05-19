<?php

class product {

    public function viewAllProducts() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM item";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewSingleProductWithServices($itemID) {
      $con = $GLOBALS['con'];

      $sql = "SELECT *
              FROM item
              JOIN service_item ON (item.itemID=service_item.itemID)
              JOIN service ON (service.serviceID = service_item.serviceID)
              WHERE item.itemID='$itemID'
              ";

      $result = $con->query($sql);
      return $result;
  }

  public function singleProductFirstServicePrice($itemID) {
    $con = $GLOBALS['con'];

    $sql = "SELECT *
            FROM item
            JOIN service_item ON (item.itemID=service_item.itemID)
            JOIN service ON (service.serviceID = service_item.serviceID)
            WHERE item.itemID='$itemID'
            LIMIT 1
            ";

    $result = $con->query($sql);
    return $result;
}

}

class bucket {

  public function viewBucket($itemID, $method) {
		$con = $GLOBALS['con'];

		$sql = "SELECT item.itemName, service.serviceType, service_item.price
					FROM item
					JOIN service_item ON (item.itemID=service_item.itemID)
					JOIN service ON (service.serviceID = service_item.serviceID)
					WHERE item.itemID='$itemID' AND service.serviceID='$method'
					LIMIT 1
					";

		$result = $con->query($sql);
		return $result;

  }

}
