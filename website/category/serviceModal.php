<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include '../../apps/common/dbconnection.php'; //To get connection string
include '../../apps/model/itemmodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$itemID = $_REQUEST['itemID'];
$ob = new item();
$res = $ob->viewItem($itemID);
$row = $res->fetch_array();
$obj = new service();
$result = $obj->getServiceCharge($itemID)
?>
<div >Customize Your Order

</div>
<div>  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" /></div>
<div>  <?php echo $row['itemName']; ?></div>
<div> Select Method</div>
<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
    <div class="MultiCarousel-inner">



        <div class = "item">
            <div class = "pad15">
                <img src="../../website/assets/img/icons/iron.png"  class = "img-fluid mx-auto d-block"/>

                <p>Iron</p>


            </div>
        </div>
        <button class = "btn btn-primary leftLst"><</button>
        <button class = "btn btn-primary rightLst">></button>

    </div>

    <div> Select Form</div>
    <p>Hang</p>

    <p>Special Notes</p>
    <form>
        <input type="text"  name="notes" id="notes" class="form-control" />
    </form>
</div>
<script src="../assets/js/carousel.js"></script>