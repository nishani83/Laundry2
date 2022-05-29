
<!DOCTYPE html>

<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/customermodel.php'; //To call customer model
include '../apps/model/ordermodel.php'; //To call order model

session_start();

$ob = new dbconnection();
$con = $ob->connection();

if (!isset($_SESSION['customer_id'])) {
    header("Location:../apps/view/login.php");

}else{

    // clear bucket session & total session after come this page //
    unset($_SESSION['my_bucket_total']);
    unset($_SESSION['my_bucket']);

    $obj = new customer; //To create an object using customer class
    $result = $obj->viewCustomer($_SESSION['customer_id']);
    $row = $result->fetch_assoc();

    // update the payment status to paid
    $objus = new order;
    $resultpay = $objus->updatePayStatus($_SESSION['customer_id']);

    // get latest order of the customer 
    $objc = new order;
    $result2 = $objc->viewLatestOrder($_SESSION['customer_id']);
    $row2 = $result2->fetch_assoc();

    // get the list of items of the order 
    $objoi = new order;
    $result3 = $objoi->viewItemsOfOrder($row2['orderID']);

}

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <title>company invoice - Canren Wash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- pdf  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container" id="page-heading">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #<?php echo $row2['orderID'];?>
            </small>
        </h1>

        <div class="page-tools" id="page-tools>
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print" id="print-btn">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF" id="pdf-btn">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0" id="invoice">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                
                <!-- .row -->

               

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle"><?php echo $row['name'];?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                            <?php echo $row2['delivery_address'];?>
                            </div>
                            <div class="my-1">
                               Sri Lanka
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $row['contactNo'];?></b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #<?php echo $row2['orderID'];?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?php echo $row2['orderDate'];?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25"><?php echo ucfirst($row2['payment_status']);?></span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Description</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        <div class="col-2">Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">

                        <?php 
                        $c=1;
                        while ($rows = $result3->fetch_array()) {?>
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1"><?php echo $c; ?></div>
                            <div class="col-9 col-sm-5"><?php echo ucfirst($rows['itemName']); ?> - <?php echo $rows['serviceType']; ?> - <?php echo ($rows['form']==1)?"Fold":"Hang"; ?></div>
                            <div class="d-none d-sm-block col-2"><?php echo $rows['qty']; ?></div>
                            <div class="d-none d-sm-block col-2 text-95"><?php echo number_format((float)$rows['price'], 2, '.', ''); ?></div>
                            <div class="col-2 text-secondary-d2"><?php echo number_format((float)($rows['price']*$rows['qty']), 2, '.', ''); ?> </div>
                        </div>
                        <?php $c++; }?>
                        
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                   

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-6 text-right">
                                    Sub Total
                                </div>
                                <div class="col-6">
                                    <span class="text-120 text-secondary-d1">LKR <?php echo number_format((float)$row2['amount'], 2, '.', ''); ?></span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-6 text-right">
                                    Delivery
                                </div>
                                <div class="col-6">
                                    <span class="text-120 text-secondary-d1">LKR <?php echo number_format((float)$row2['deliveryCharge'], 2, '.', ''); ?></span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-6 text-right">
                                    Discount (0%)
                                </div>
                                <div class="col-6">
                                    <span class="text-110 text-secondary-d1">LKR 0.00</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-6 text-right">
                                    Total Amount
                                </div>
                                <div class="col-6">
                                    <b><span class="text-120 text-success-d3 opacity-2">LKR <?php echo number_format((float)($row2['amount'] + $row2['deliveryCharge']), 2, '.', ''); ?></span></b>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- print and pdf button actions  -->
<script>
    $('#print-btn').click(function (e) { 
        $('#page-heading').hide();
        window.print();
        $('#page-heading').show();
    });

    window.onload = function(){
        document.getElementById("pdf-btn")
        .addEventListener("click", ()=>{
            const invoice = this.document.getElementById("invoice");
            var opt = {
                margin: 0.5,
                filename: 'my_invoice.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
    }
</script>

<script>
$(document).ready(function () {
    localStorage.removeItem('orderPlaced');
});
</script>

<style type="text/css">
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-120 {
    font-size: 120%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>




























</style>

<script type="text/javascript">

</script>
</body>
</html>