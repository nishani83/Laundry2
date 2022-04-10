<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
include '../../apps/common/dbconnection.php'; //To get connection string
include '../../apps/model/itemmodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$categoryID = $_REQUEST['categoryID'];
$ob = new item();
$res = $ob->viewItemsByCategory($categoryID);
$row = $res->fetch_array();
?>
<head>
    <link href="../assets/css/products.css" rel = "stylesheet">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <?php include '../../apps/common/include_head.php'; ?>
    <link href="assets/css/carousel.css" rel = "stylesheet">
</head>






<div class="card-deck">
    <!-- row 1 -->
    <div class="row">
        <?php
        while ($row = $res->fetch_array()) {
            ?>

            <div class="col-md-2 mb-4">

                <div class="card-sl">
                    <div class="card-image">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" />
                    </div>


                    <div class="card-heading">
                        <?php echo $row['itemName']; ?>
                    </div>

                    <a href="serviceModal.php?itemID=<?php echo $row['itemID']; ?>" class="card-button" > Add</a>

                </div>
            </div>
        <?php } ?>
    </div>
</div>









