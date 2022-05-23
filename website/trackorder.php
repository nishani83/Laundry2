<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/ordermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();

if(!isset($_GET['orderid']) || $_GET['orderid'] == ""){
    header("Location:index.html");
}

$obj = new order;
$result = $obj->viewOrderDetailsByOrderID($_GET['orderid']);
$row = $result->fetch_assoc();

$result2 = $obj->viewItemsOfOrder($_GET['orderid']);

?>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Canren Wash - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <style>@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #15a1d5
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #15a1d5;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}


.btn-warning {
    color: #ffffff;
    background-color: #15a1d5;
    border-color: #15a1d5;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #15a1d5;
    border-color: #15a1d5;
    border-radius: 1px
}</style>

        <link href="assets/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Bethany - v4.6.0
        * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <!-- ======= Header ======= -->
        <?php include 'common/header.php'; ?>
        <!-- End Header -->
		
		    <main id="main">

                <div style="height: 50px;"></div>
               
                <section id="contact" class="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" data-aos="fade-right">
                                <div class="section-title">
                                    <h2>Order Details</h2>
                                </div>

                                <article class="card">
                                    <header class="card-header"> Order ID: <?php echo $_GET['orderid'];?> </header>
                                    <header class="card-header"> Order Date: <?php echo $row['orderDate']; ?> </header>
                                    <div class="card-body">
                                        
                                        <article class="card">
                                            <div class="card-body row">
                                                <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $row['deliveryDate']; ?> </div>
                                                <div class="col"> <strong>Shipping To:</strong> <br> <?php echo $row['name']; ?> | <i class="fa fa-phone"></i> <?php echo $row['contactNo']; ?> </div>

                                                <?php 
                                                $orderStatus = "";
                                                if($row['orderStatus'] == "pending"){
                                                    $orderStatus = "Order Placed";
                                                }elseif($row['orderStatus'] == "topickup"){
                                                    $orderStatus = "Ready to Pickup";
                                                }elseif ($row['orderStatus'] == "cancel") {
                                                    $orderStatus = "Cancelled";
                                                }elseif($row['orderStatus'] == "ondelivery") {
                                                    $orderStatus = "Ready to Delivery";
                                                }elseif($row['orderStatus'] == "completed"){
                                                    $orderStatus = "Completed";
                                                }
                                                ?>

                                                <div class="col"> <strong>Status:</strong> <br> <?php echo ucfirst($orderStatus); ?> </div>
                                            </div>
                                        </article>

                                        <?php if($row['orderStatus'] != "cancel"){?>
                                        <div class="track">

                                            <?php
                                            $first_step_done = "";
                                            $second_step_done = "";
                                            $third_step_done = "";
                                            $fourth_step_done = "";
                                            if($row['orderStatus'] == "completed"){
                                                $first_step_done = "active";
                                                $second_step_done = "active";
                                                $third_step_done = "active";
                                                $fourth_step_done = "active";
                                            }elseif($row['orderStatus'] == "ondelivery"){
                                                $first_step_done = "active";
                                                $second_step_done = "active";
                                                $third_step_done = "active";
                                            }elseif($row['orderStatus'] == "topickup"){
                                                $first_step_done = "active";
                                                $second_step_done = "active";
                                            }elseif($row['orderStatus'] == "pending") {
                                                $first_step_done = "active";
                                            }
                                            ?>

                                            <div class="step <?php echo $first_step_done?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                            <div class="step <?php echo $second_step_done?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Ready to Pickup</span> </div>
                                            <div class="step <?php echo $third_step_done?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Ready to Delivery</span> </div>
                                            <div class="step <?php echo $fourth_step_done?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Completed</span> </div>
                                            
                                        </div>
                                        <?php }?>
                                        
                                            <table class="table">
                                                <thead align="center">
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Washing Method</th>
                                                        <th>Delivery Form</th>
                                                        <th>Unit Price LKR</th>
                                                        <th>Quantity</th>
                                                        <th>Total LKR</th>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">
                                                <?php
                                                $subtotal = 0;
                                                while($rowItems = $result2->fetch_array()){?>
                                                    <tr>
                                                        <td><?php echo ucfirst($rowItems['itemName']); ?></td>
                                                        <td><?php echo $rowItems['serviceType']; ?></td>
                                                        <td><?php echo ($rowItems['form']==1)?"Fold":"Hang"; ?></td>
                                                        <td><?php echo $rowItems['price']; ?></td>
                                                        <td><?php echo $rowItems['qty']; ?></td>
                                                        <td><?php echo $rowItems['price']*$rowItems['qty']; ?></td>
                                                    </tr>
                                                <?php 
                                                $subtotal = $subtotal + ($rowItems['price']*$rowItems['qty']);
                                                }?>
                                                </tbody>
                                            </table>

                                            <article class="card">
                                                <header class="card-header"> Washing Basket Total (LKR) </header>
                                                <div class="card-body row">
                                                    
                                                    <div class="col"> <strong>Sub Total:</strong> <br><?php echo number_format((float)$subtotal, 2, '.', ''); ?></div>
                                                    <div class="col"> <strong>Delivery Charge:</strong> <br>300.00 </div>
                                                    <div class="col"> <strong>Discount:</strong> <br>0% </div>
                                                    <div class="col"> <strong>Grand Total:</strong> <br><?php echo number_format((float)$subtotal+300, 2, '.', ''); ?> </div>
                                                </div>
                                            </article>
                                       
                                        <hr> <a href="orderhistory.php" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Orders</a>
                                    </div>
                                </article>
                            </div>

                        
                        </div>
                         
                    </div>
                </section><!-- End Contact Section -->

            </main><!-- End #main -->

            <!-- ======= Footer ======= -->
            <footer id="footer">

                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 footer-contact">
                                <h3>Canren Wash</h3>
                                <p>
                                    No 7C, Colombo Road, Jaliyagoda,Piliyandala <br><br>
                                    <strong>Phone:</strong> +94 112609 407<br>
                                    <strong>Email:</strong> canrenwash@gmail.com<br>
                                </p>
                            </div>

                            <div class="col-lg-2 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Our Services</h4>
                                <ul>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Dry Cleaning</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Wash & Fold</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Wash & Iron</a></li>
                                    <li><i class="bx bx-chevron-right"></i> <a href="#">Pressing</a></li>

                                </ul>
                            </div>

                            <!--          <div class="col-lg-4 col-md-6 footer-newsletter">
                                        <h4>Join Our Newsletter</h4>
                                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                                        <form action="" method="post">
                                          <input type="email" name="email"><input type="submit" value="Subscribe">
                                        </form>
                                      </div>-->

                        </div>
                    </div>
                </div>

                <div class="container d-md-flex py-4">

                    <div class="me-md-auto text-center text-md-start">
                        <div class="copyright">
                            &copy; Copyright <strong><span>Canren Wash</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
                            Designed by <a href="https://bootstrapmade.com/">N.D.Gunasekara</a>
                        </div>
                    </div>
                    <!--      <div class="social-links text-center text-md-right pt-3 pt-md-0">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                          </div>-->
                </div>
            </footer><!-- End Footer -->

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            <!-- Vendor JS Files -->
            <script src="assets/vendor/aos/aos.js"></script>
            <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>
            <script src="assets/vendor/purecounter/purecounter.js"></script>
            <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>

            <?php include 'common/scripts.php'; ?>

    </body>

    <script>
        $(document).ready(function () {
            <?php if(!isset($_SESSION['customer_id'])) { ?>
                $('#loginModal').modal('show');
            <?php } ?>
        });
    </script>

</html>