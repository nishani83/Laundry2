<!DOCTYPE html>
<html lang="en">

<?php
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
// include '../apps/common/session.php';
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/productmodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new bucket;

// set bucket count in header 
if(isset($_SESSION['my_bucket']) && sizeof($_SESSION['my_bucket'])){
    $bucketCount = sizeof($_SESSION['my_bucket']);
}else{
    $bucketCount = 0;
}

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
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
        * Template Name: Bethany - v4.6.0
        * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.html"><span>Canren</span></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="logo.png" alt="" class="img-fluid"></a>-->
                </div>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li class="link-left"><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li class="link-left"><a class="nav-link scrollto" href="#about">About</a></li>
                        <li class="link-left"><a class="nav-link scrollto" href="#services">Services</a></li>
                        <li class="link-left"><a class="nav-link scrollto " href="#rewards">Referrals and Rewards</a></li>

                        <li class="link-left"><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        <li class="link-right"><a class="nav-link scrollto" href="../website/Register/register_1.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register </a></li>
                        <li class="link-right"><a class="getstarted scrollto" id='cart-button' href="cart.php">Show Cart <span id="bucket-count"><?php echo $bucketCount; ?><span></a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div><!-- End Header Container -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero" class="d-flex align-items-center">
           <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
             <h1>Your New Online Presence with Canren</h1>
             <h2>We are team of talented designers making websites with Bootstrap</h2>
             <a href="#about" class="btn-get-started scrollto">Get Started</a>
           </div>
         </section><!-- End Hero -->
    <!-- carousal --->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">


        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="10000">
                <section id="hero" class="d-flex align-items-center">
                    <img src="images/banner1.jpg" class="d-block w-100" alt="...">

                    <div class="carousel-caption d-none d-md-block">

                        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                            <h1>We Take Pride in Your Appearance</h1>
                            <h2>Most cost effective high quality laundry service at your convenience </h2>
                            <a href="#services" class="navbar btn-get-started">Check Our Services</a>

                        </div>

                        <!-- <h5>First slide label</h5>
                             <p>Some representative placeholder content for the first slide.</p>-->
                    </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <section id="hero" class="d-flex align-items-center">
                    <img src="images/banner2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                            <h1>Say Goodbye to Your Laundry Day</h1>
                            <h2>We pick, We wash, We deliver at your doorstep</h2>
                            <a href="category/cart.php" class="btn-get-started scrollto"> Schedule a Pickup</a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="carousel-item">
                <section id="hero" class="d-flex align-items-center">
                    <img src="images/banner3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
                            <h1>Your Friend is Our Friend</h1>
                            <h2>*Refer a friend and earn a free wash worth Rs.1000/=</h2>
                            <a href="#referral" class="btn-get-started scrollto">Refer a Friend</a>
                        </div>
                    </div>
                </section>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--end carousal-->

        <main id="main">
            <section id="contact" class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <section id="contact" class="contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-right">
                                            <div class="section-title">
                                                <h2>Cart</h2>

                                            </div>

                                            <table class="table">
                                                <thead align="center">
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Washing Method</th>
                                                        <th>Delivery Form</th>
                                                        <th>Unit Price LKR</th>
                                                        <th>Quantity</th>
                                                        <th>Total LKR</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody align="center">

                                                    <?php 

                                                    $subTotal = 0;

                                                    if(isset($_SESSION['my_bucket']) && (!empty($_SESSION['my_bucket']))){
                                                    foreach($_SESSION['my_bucket'] as $x => $result) {
                                                        $result = $obj->viewBucket($_SESSION['my_bucket'][$x]['item_id'], $_SESSION['my_bucket'][$x]['item_method']);
                                                        $row = $result->fetch_assoc();
                                                        
                                                        $b_form = ($_SESSION['my_bucket'][$x]['item_form']==1)?"Fold":"Hang";
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['itemName']; ?></td>
                                                        <td><?php echo $row['serviceType']; ?></td>
                                                        <td><?php echo $b_form; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php echo $_SESSION['my_bucket'][$x]['item_qty']; ?></td>
                                                        <td><?php echo $_SESSION['my_bucket'][$x]['item_qty']*$row['price']; ?></td>
                                                        <td data-itemsubtotal="<?php echo $_SESSION['my_bucket'][$x]['item_qty']*$row['price']; ?>"><i class="fa fa-trash bucket-remove-item" data-arrayid="<?php echo $x; ?>"></i></td>
                                                    </tr>
                                                    <?php
                                                    $subTotal += $_SESSION['my_bucket'][$x]['item_qty']*$row['price'];
                                                    $_SESSION['my_bucket_total'] = $subTotal;
                                                    }}else{ ?>
                                                        <tr><td colspan="7">Your Bucket is Empty</td></tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </section><!-- End Contact Section -->
                        </div>
                        <div class="col">
                            <section id="contact" class="contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-right">
                                            <div class="section-title">

                                                <h2>Place Order</h2>
                                                <br>
                                                <article class="card">
                                                    <header class="card-header"> Washing Basket Total (LKR) </header>
                                                    <div class="card-body row">
                                                        <div class="col-12"> <strong>Sub Total:</strong> <br><span id="cart-subtot"><?php echo number_format((float)$subTotal, 2, '.', ''); ?></span> </div>
                                                        <div class="col-12"> <strong>Delivery Charge:</strong> <br>300.00 </div>
                                                        <div class="col-12"> <strong>Discount:</strong> <br>0% </div>
                                                        <div class="col-12"> <strong>Grand Total:</strong> <br> <span id="cart-grandtot"><?php echo number_format((float)$subTotal+300, 2, '.', ''); ?></span> </div>
                                                    </div>
                                                </article>
                                                <form action="../apps/controller/bucketcontroller.php" method="post" role="form" class="checkout-form mt-4">
                                                    <!-- Set up a container element for the button -->
                                                    <input class="btn btn-warning" type="submit" name="gotocheckout" value="Checkout">

                                                    <a href="products.php" class="btn btn-warning" type="button">Back to Shopping</a>
                                                    <!-- Include the PayPal JavaScript SDK -->
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                        </div>

                    </div>
            </section>


            <!-- ======= About Section ======= -->









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


        <!-- login pop up -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login-logo text-center mb-2">
                            <img src="../apps/assets/img/logo.png" width="200"></br>
                            <br> <b>Laundry </b>Management
                        </div>
                        <?php
                        //If there is an error
                        if (isset($_REQUEST['msg'])) {
                            echo base64_decode($_REQUEST['msg']);
                        }
                        ?>
                        <form class="user" action="../apps/controller/logincontroller.php" method="post">
                            <div class="input-group mb-3">
                                <input type="hidden" name="web_customer_login" value="webCusLogin">
                                <input type="email" class="form-control" placeholder="Email" id ="email" name="wc_email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" id="pass" name="wc_pass">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <p>If not sign up <a href="Register/register_1.php"> Sign Up</a> here.</p>
                    </div>
                </div>
            </div>
        </div>                    

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assets/js/jquery-2.1.1.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="https://app.payhere.co/embed/embed.js"></script>

</body>

<!-- remove an item from bucket session -->
<script>
$('.bucket-remove-item').click(function (e) { 
    e.preventDefault();
    var key = $(this).data('arrayid');
    var $item = $(this).closest("tr");
    var itemSubTot = $(this).closest("td").data('itemsubtotal');
    var currentSubTot = $('#cart-subtot').text();
    var newSubTot = (currentSubTot-itemSubTot)+'.00';
    var newGrandTot = ((currentSubTot-itemSubTot)+300)+'.00';

    $.ajax({
        type: 'post',
        url: '../apps/controller/bucketcontroller.php',
        data: { action:"removeItemFromBucket", key:key },
        success:function(res){
            $item.remove();
            $('#cart-subtot').text(newSubTot);
            $('#cart-grandtot').text(newGrandTot);
            $('#bucket-count').text(res);
        }
    });

});
</script>

<!-- login pop up show  -->
<script>
    <?php if(isset($_REQUEST['login']) && $_REQUEST['login']=="login"){ ?>
    $(window).on('load', function(){ 
        $('#loginModal').modal('show');
    });
    <?php } ?>
</script>

</html>