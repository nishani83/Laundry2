<!DOCTYPE html>

<?php
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
// include '../apps/common/session.php';
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/productmodel.php'; //To call product model
include '../apps/model/categorymodel.php'; //To call category model
include '../apps/model/itemmodel.php'; //To call item model
$ob = new dbconnection();
$con = $ob->connection();

$objc = new category; //To create an object using employee class
$result_cats = $objc->viewAllCategory();

// $obj = new product;
// $result = $obj->viewAllProducts();
$categoryID = (isset($_REQUEST['categoryID']))?$_REQUEST['categoryID']:4;
$ob = new item();
$result = $ob->viewItemsByCategory($categoryID);


// set bucket count in header 
if(isset($_SESSION['my_bucket']) && sizeof($_SESSION['my_bucket'])){
    $bucketCount = sizeof($_SESSION['my_bucket']);
}else{
    $bucketCount = 0;
}

?>


<html lang="en">

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

    <link rel="stylesheet" href="assets/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="assets/css/product_style.css"> <!-- Resource style -->
    <script src="assets/js/modernizr.js"></script> <!-- Modernizr -->

    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cart_style.css">

    <!-- carousal  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link href="assets/css/item_carousal.css" rel = "stylesheet">

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
         </section> <!-- End Hero -->
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
                        <!--<h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>-->
                    </div>
                </section>
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
  
        <!-- start of the category carousel -->
        <div class="bbb_viewed" >
            <div class="bbb_viewed_nav_container">
                <div class="bbb_viewed_nav bbb_viewed_prev" style="position:absolute;top:20%;left:5%"><i class="fas fa-chevron-left" style="font-size:20px"></i></div>
                <div class="bbb_viewed_nav bbb_viewed_prev" style="position:absolute;top:20%;right:5%"><i class="fas fa-chevron-right" style="font-size:20px"></i></div>
            </div>
            <div class="container" >
                <div class="row">
                    <div class="col">
                        <div class="bbb_main_container">
                            <div class="bbb_viewed_slider_container">
                                <div class="owl-carousel owl-theme bbb_viewed_slider">
                                    <?php
                                    while ($row = $result_cats->fetch_array()) {
                                        ?>
                                        <div class="owl-item"> <a class="item_cats" href="products.php?categoryID=<?php echo $row['categoryID']; ?>#content">
                                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div class="bbb_viewed_image">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['categoryImage']); ?>" alt="">
                                                </div>
                                                <div class="bbb_viewed_content text-center"> <br>
                                                    <div class="bbb_viewed_price"> <h6 style="color:black"><b> <?php echo $row['categoryName']; ?></b></h6> </div>
                                                </div>
                                            </div></a>
                                        </div>
                                    <?php
                                    }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of the category carousel -->


        <!-- items section  -->
        <section id="content" class="contact">

            <ul class="cd-items cd-container">
                <?php 
                while ($row = $result->fetch_array()) {
                ?>
                <li class="cd-item">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" alt="Item Preview">
                    <a data-id="<?php echo $row['itemID']; ?>" data-name="<?php echo $row['itemName']; ?>" data-itemimage="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" class="cd-trigger">Quick View</a>
                </li> <!-- cd-item -->
                <?php } ?>
            </ul> <!-- cd-items -->

            <div class="cd-quick-view">
               
                <div class="cd-slider-wrapper">
                    <ul class="cd-slider">
                        <li class="selected"><img src="" alt=""></li>
                        <!-- <li><img src="assets/img/products_img/bed.jpg" alt="Product 2"></li>
                        <li><img src="assets/img/products_img/frock.jpg" alt="Product 3"></li> -->
                    </ul> <!-- cd-slider -->

                    <ul class="cd-slider-navigation">
                        <li><a class="cd-next" href="#0">Prev</a></li>
                        <li><a class="cd-prev" href="#0">Next</a></li>
                    </ul> <!-- cd-slider-navigation -->
                </div> <!-- cd-slider-wrapper -->

                <div class="cd-item-info">
                    <h2 id="item_title"></h2>
                    <p>Variations</p>
                    <form action="../apps/controller/bucketcontroller.php" method="POST" id="item-form">
                        <label for="cars">Select Method:</label>
                        <select name="method" id="methods">

                        </select>
                        <br><br>
                        <label for="cars">Select Form:</label>
                        <select name="form" id="form">
                            <option value="1">Fold</option>
                            <option value="2">Hang</option>
                        </select>
                        <br><br>
                        <label for="">Qty:</label>
                        <input type="number" name="qty" min="1" value="1">
                        <input type="text" class="mt-2" id="methodvalue" value="" readonly>
                        <input type="hidden" id="itemid" name="itemid" value="">
                        <ul class="cd-item-action mt-2">
                            <li><button type="submit" class="add-to-cart" name="addtobucket">Add to Bucket</button></li>
                            <!-- <li><a href="#0">Learn more</a></li> -->
                        </ul> <!-- cd-item-action -->
                    </form>
                </div> <!-- cd-item-info -->
                <span class="cd-close">Close</span>
            </div> <!-- cd-quick-view -->

        </section><!-- End items Section -->
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
                    <!--<div class="col-lg-4 col-md-6 footer-newsletter">
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
        <!--<div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>-->
        </div>
    </footer>
    <!-- End Footer -->

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

    <script src="assets/js/jquery-2.1.1.js"></script>
    <script src="assets/js/velocity.min.js"></script>
    <script src="assets/js/products_main.js"></script>
    <!-- Resource jQuery -->

    <!-- carousal  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <script src="assets/js/carousel.js" type="text/javascript"> </script>

</body>

<!-- Quick view btn click, view single product data -->
<script>

$('.cd-trigger').click(function (e) { 

    var itemid = $(this).data('id');
    var itemName = $(this).data('name');
    var itemimg = $(this).data('itemimage');
   
    $.ajax({
        type: 'post',
        dataType:'json',
        url: '../apps/controller/productcontroller.php',
        data: { action:"getItemData", id:itemid },
        success:function(res){
            $(".cd-quick-view .cd-item-info #methods").html(res.options);
            $('.cd-quick-view .cd-item-info #methodvalue').val(res.price1);
        }
    });

    $('.cd-quick-view .cd-item-info #item_title').text(itemName);
    $('.cd-quick-view .cd-item-info #item-form #itemid').val(itemid);
    $('.cd-quick-view .cd-slider img').attr("src",itemimg);

});

// when select the method change price
$('#methods').on('change', function() {
   var Price = $(this).find(':selected').data('price');
   $('.cd-quick-view .cd-item-info #methodvalue').val(Price);
   
});

// close modal clear form 
$('.cd-quick-view .cd-close').click(function (e) { 
    $('.cd-quick-view .cd-item-info #item-form')[0].reset();
});

</script>


</html>