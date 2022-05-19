<?php 

include '../common/dbconnection.php';
include '../model/productmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new product();

if(isset($_POST['action']) && $_POST['action'] == "getItemData"){
  
  $options = "";
  $c = 0;
  $presult = $obj->viewSingleProductWithServices($_POST['id']);
  $presult2 = $obj->singleProductFirstServicePrice($_POST['id']);

  while ($row = $presult->fetch_array()) {
      $c++;
      $options .= '<option value="'.$row['serviceID'].'" id="price_'.$c.'" data-price="'.$row['price'].'">'.$row['serviceType'].'</option>';
  }

  $row2 = $presult2->fetch_assoc();

  $j_result['options'] = $options;
  $j_result['price1'] = $row2['price'];
  echo json_encode($j_result);
  exit;

  // echo $options;
}



?>
