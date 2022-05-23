<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/ordermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();

$obj = new order;
$result = $obj->viewAllOrdersOfUser($_SESSION['customer_id']);

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

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
        * Template Name: Bethany - v4.6.0
        * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css'>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include 'common/header.php'; ?>
    <!-- End Header -->

    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <section id="contact" class="contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12" data-aos="fade-right">
                                        <div class="section-title">
                                            <h2>Order History</h2>
                                            <br><br>
                                        </div>
                                        <!--end carousal-->
                                        <!-- ======= About Section ======= -->
                                        <div class="table-responsive pb-5">
                                            <table id="tbOrderHistory" class="table border ps-table w-100 mb-3">
                                                <thead>
                                                    <tr>
                                                        <th class="font-weight-bold py-2 border-0">Order ID</th>
                                                        <th class="font-weight-bold py-2 border-0 quantity">Order Date</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Total Quantity</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Delivery Date</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Shipping Location</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Grand Total</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Status</th>
                                                        <th class="font-weight-bold py-2 border-0 ">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = $result->fetch_array()) {
                                                        $qty = 0;
                                                        $result2 = $obj->viewItemsOfOrder($row['weborderID']);
                                                        while ($row2 = $result2->fetch_array()) {
                                                            $qty = $qty + $row2['qty'];
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['weborderID'];?></td>
                                                        <td><?php echo $row['orderDate'];?></td>
                                                        <td><?php echo $qty; ?></td>
                                                        <td><?php echo $row['deliveryDate'];?></td>
                                                        <td><?php echo $row['delivery_address'];?></td>
                                                        <td><?php echo number_format($row['amount']+300);?></td>
                                                        <td><?php echo ucfirst($row['orderStatus']);?></td>
                                                        <td><a href="trackorder.php?orderid=<?php echo $row['weborderID'];?>" class="fa fa-eye" title="View"></a></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/plug-ins/1.10.19/pagination/input.js'></script>
    <script src='https://cdn.datatables.net/plug-ins/1.10.19/dataRender/ellipsis.js'></script>
    <script src="assets/js/script.js"></script>

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