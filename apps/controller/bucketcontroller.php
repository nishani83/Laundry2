<?php 

include '../common/dbconnection.php';

//Get the db connection
$ob = new dbconnection();
$con = $ob->connection();

//To start the session
// if (!isset($_SESSION)) {
  session_start();
// }

// create bucket session if that not exsits 
if(!isset($_SESSION['my_bucket'])){
  $_SESSION['my_bucket']=array();
}

// post data set to bucket session array 
if(isset($_POST['addtobucket'])){

$itemid = $_POST['itemid'];
$method = $_POST['method'];
$form = $_POST['form'];
$qty = $_POST['qty'];

$a = 0;
$X = "";

foreach($_SESSION['my_bucket'] as $x => $result) {
  if(($_SESSION['my_bucket'][$x]['item_id'] == $itemid) && ($_SESSION['my_bucket'][$x]['item_method'] == $method) && ($_SESSION['my_bucket'][$x]['item_form'] == $form)){
    $a = 1;
    $X = $x;
  }
}

// if submit same item same data udate the qty
if($a==1){

  $nbc = array("item_id"=>$itemid, "item_method"=>$method, "item_form"=>$form, "item_qty"=>($_SESSION['my_bucket'][$X]['item_qty']+$qty));
  array_push($_SESSION['my_bucket'],$nbc);
  unset($_SESSION['my_bucket'][$X]);

// ad new item 
}else{

  $nb=array("item_id"=>$itemid, "item_method"=>$method, "item_form"=>$form, "item_qty"=>$qty);
  array_push($_SESSION['my_bucket'],$nb);

}

header("Location:../../website/products.php");

}

// remove an item from bucket session 
if(isset($_POST['action']) && $_POST['action'] == "removeItemFromBucket"){

  $key = $_POST['key'];

  $newCount = sizeof($_SESSION['my_bucket']) - 1;

  unset($_SESSION['my_bucket'][$key]);

  echo $newCount;

}


// check logged or not for checkout 
if(isset($_POST['gotocheckout'])){

  if(isset($_SESSION['customer_id']) && ($_SESSION['customer_id'] != "")){

    if(!isset($_SESSION['my_bucket'])){
      header("Location:../../website/products.php");
    }else{
      header("Location:../../website/order.php");
    }

  }else{

    header("Location:../../website/cart.php?login=login");

  }

}

?>
