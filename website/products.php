<!DOCTYPE html>
<html lang="en">

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
    $categoryID = (isset($_REQUEST['categoryID'])) ? $_REQUEST['categoryID'] : 4;
    $ob = new item();
    $result = $ob->viewItemsByCategory($categoryID);

// set bucket count in header
    if (isset($_SESSION['my_bucket']) && sizeof($_SESSION['my_bucket'])) {
        $bucketCount = sizeof($_SESSION['my_bucket']);
    } else {
        $bucketCount = 0;
    }
    ?>

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Canren Wash - Products</title>
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

        <link rel="stylesheet" href="assets/css/products_reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="assets/css/products_style.css"> <!-- Resource style -->
        <script src="assets/js/modernizr.js"></script> <!-- Modernizr -->

        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/cart_style.css">

        <!-- =======================================================
            * Template Name: Bethany - v4.6.0
            * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
            * Author: BootstrapMade.com
            * License: https://bootstrapmade.com/license/
            ======================================================== -->

        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/count_style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            /*Mobile Menu shop by category*/

            *,
            *:before,
            *:after {
                box-sizing: border-box;
            }

            .atozdeals-mobile-section {
                display: block;
                margin-top: 50px;
                vertical-align: top;
                padding: 10px 20px 0;
            }

            .atozdeals-mobile-menu {
                font-size: 16px;
                margin-bottom: 10px;
            }

            .atozdeals-mobile-menu.l-big {
                font-size: 18px;
            }

            .atozdeals-mobile-menu.l-medium {
                font-size: 14px;
            }

            .atozdeals-mobile-menu.l-small {
                font-size: 12px;
            }

            .atozdeals-mobile-menu ul {
                max-width: 100%;
                border: 1px solid #ddd;
                border-radius: 1em;
                background: #fff;
                margin: 0 auto;
                overflow: hidden;
            }

            .atozdeals-mobile-menu li {
                width: 11.11%;
                list-style: none;
                float: left;
                text-align: center;
            }

            .atozdeals-mobile-menu .icon {
                display: block;
                padding: 1em;
                position: relative;
                font-family: "Roboto Condensed", "Arial Narrow", Arial;
                text-transform: uppercase;
                text-decoration: none;
                color: #999;
                border-radius: 5px;
                overflow: hidden;
                -moz-transition: color 0.4s ease 0.15s;
                -o-transition: color 0.4s ease 0.15s;
                -webkit-transition: color 0.4s ease;
                -webkit-transition-delay: 0.15s;
                transition: color 0.4s ease 0.15s;
            }

            .atozdeals-mobile-menu .icon span,
            .atozdeals-mobile-menu .icon:before {
                position: relative;
                display: block;
                z-index: 5;
                -moz-transition: -moz-transform 0.35s ease-in-out, text-shadow 0.35s ease-in-out;
                -o-transition: -o-transform 0.35s ease-in-out, text-shadow 0.35s ease-in-out;
                -webkit-transition: -webkit-transform 0.35s ease-in-out, text-shadow 0.35s ease-in-out;
                transition: transform 0.35s ease-in-out, text-shadow 0.35s ease-in-out;
            }

            .atozdeals-mobile-menu .icon span {
                width: calc(100% + 1.6em);
                margin-left: -0.8em;
                font-family: cursive;
                overflow: hidden;
                font-size: small;
            }

            .atozdeals-mobile-menu .icon:before {
                width: 2.4em;
                font: normal 1.6em/1 FontAwesome;
                color: #fff;
                margin: 0.7em auto 1.2em;
            }

            .atozdeals-mobile-menu .icon:after {
                content: "";
                display: inline-block;
                width: 14em;
                height: 14em;
                position: absolute;
                top: 0;
                left: 50%;
                margin: 0 0 0 -7em;
                background-color: #15a1d5;
                z-index: 1;
                border-radius: 100%;
                transform-origin: 50% 7.5%;
                -moz-transform: scale(0.28);
                -ms-transform: scale(0.28);
                -webkit-transform: scale(0.28);
                transform: scale(0.28);
                -moz-transition: -moz-transform 0.35s cubic-bezier(0.83, -0.6, 0.68, 0.99);
                -o-transition: -o-transform 0.35s cubic-bezier(0.83, -0.6, 0.68, 0.99);
                -webkit-transition: -webkit-transform 0.35s cubic-bezier(0.83, -0.6, 0.68, 0.99);
                transition: transform 0.35s cubic-bezier(0.83, -0.6, 0.68, 0.99);
            }

            .atozdeals-mobile-menu .icon:hover {
                color: #fff;
            }

            .atozdeals-mobile-menu .icon:hover:after {
                -moz-transform: scale(1) translateY(-3.5em);
                -ms-transform: scale(1) translateY(-3.5em);
                -webkit-transform: scale(1) translateY(-3.5em);
                transform: scale(1) translateY(-3.5em);
            }

            .atozdeals-mobile-menu [class*='music']:after,
            .atozdeals-mobile-menu [class*='map']:after {
                background-color: #15a1d5;
            }

            .atozdeals-mobile-menu [class*='bag']:after,
            .atozdeals-mobile-menu [class*='auto']:after {
                background-color: #15a1d5;
            }

            .atozdeals-mobile-menu [class*='truck']:after,
            .atozdeals-mobile-menu [class*='auto']:after {
                background-color: #15a1d5;
            }

            .atozdeals-mobile-menu [class*='rocket']:after,
            .atozdeals-mobile-menu [class*='plane']:after {
                background-color: #15a1d5;
            }

            .atozdeals-mobile-menu.l-rounded .icon {
                -webkit-transition-delay: 0s;
                transition-delay: 0s;
            }

            .atozdeals-mobile-menu.l-rounded .icon:after {
                -webkit-transition-duration: 0.25s;
                transition-duration: 0.25s;
            }

            .atozdeals-mobile-menu.l-rounded .icon:hover:before {
                -moz-transform: translateY(-0.2em);
                -ms-transform: translateY(-0.2em);
                -webkit-transform: translateY(-0.2em);
                transform: translateY(-0.2em);
                text-shadow: 0.1em 4px 0 rgba(0, 0, 0, 0.1);
                text-shadow: 0.1em 4px 0 0.3em rgba(0, 0, 0, 0.1);
            }

            .atozdeals-mobile-menu.l-rounded .icon:hover span {
                -moz-transform: translateY(-1.3em);
                -ms-transform: translateY(-1.3em);
                -webkit-transform: translateY(-1.3em);
                transform: translateY(-1.3em);
            }

            .atozdeals-mobile-menu.l-rounded .icon:hover:after {
                -moz-transform: scale(0.46) translateY(-0.3em);
                -ms-transform: scale(0.46) translateY(-0.3em);
                -webkit-transform: scale(0.46) translateY(-0.3em);
                transform: scale(0.46) translateY(-0.3em);
                -moz-box-shadow: 0 0.2em 0 0.15em rgba(0, 0, 0, 0.1);
                -webkit-box-shadow: 0 0.2em 0 0.15em rgba(0, 0, 0, 0.1);
                box-shadow: 0 0.2em 0 0.15em rgba(0, 0, 0, 0.1);
            }

            /*Mobile menu shop by category*/
        </style>
    </head>

    <body>

        <!-- ======= Header ======= -->
        <?php include 'common/header.php'; ?>
        <!-- End Header -->


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
            <div class="atozdeals-mobile-section">

                <div class="atozdeals-mobile-menu l-rounded">
                    <ul>
                        <?php
                        while ($row = $result_cats->fetch_array()) {
                            if (isset($_GET['categoryID']) && $_GET['categoryID'] == $row['categoryID']) {
                                $activeCat = "active";
                            } else {
                                $activeCat = "";
                            }
                            ?>
                            <li class="<?php echo $activeCat; ?>">
                                <a href="products.php?categoryID=<?php echo $row['categoryID']; ?>#content" class="icon">
                                    <div class="category_image">
                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['categoryImage']); ?>" alt="">
                                    </div>
                                    <span><?php echo $row['categoryName']; ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!--end carousal-->
            <main id="main">

                <!-- ======= About Section ======= -->
                <section id="content" class="contact">


                    <ul class="cd-items cd-container">
                        <?php
                        while ($row = $result->fetch_array()) {
                            ?>
                            <li class="cd-item">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" alt="Item Preview">
                                <a data-id="<?php echo $row['itemID']; ?>" data-name="<?php echo $row['itemName']; ?>" data-itemimage="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" class="cd-trigger"  style="background-color: rgba(26, 86, 216, 0.673);">Quick View</a>
                            </li> <!-- cd-item -->
                        <?php } ?>
                    </ul> <!-- cd-items -->

                    <div class="cd-quick-view product-view-modal">
                        <div class="cd-slider-wrapper">
                            <ul class="cd-slider">
                                <li class="selected"><img src="" alt=""></li>
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
                                <select name="method" id="methods" class="mb-3">

                                </select>
                                <br>
                                <label for="cars">Select Form:</label>
                                <select name="form" id="form" class="mb-3">
                                    <option value="1">Fold</option>
                                    <option value="2">Hang</option>
                                </select>
                                <br>

                                <div class="product-count">
                                    <button class="button-count no-active" disabled>-</button>
                                    <input type="text" readonly class="number-product" name="qty" min="1" value="1">
                                    <button class="button-count">+</button>
                                </div>
                                <br>
                                <h2>Price : <span id="methodvalue"></span></h2>
                                <input type="hidden" id="itemid" name="itemid" value="">
                                <ul class="cd-item-action mt-2">
                                    <li><button class="add-to-cart" name="addtobucket">Add to cart</button></li>
                                </ul> <!-- cd-item-action -->
                            </form>
                        </div> <!-- cd-item-info -->
                        <a href="#0" class="cd-close">Close</a>
                    </div> <!-- cd-quick-view -->
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

            <script src="assets/js/jquery-2.1.1.js"></script>
            <script src="assets/js/velocity.min.js"></script>
            <script src="assets/js/products_main.js"></script> <!-- Resource jQuery -->
            <script src="assets/js/count_script.js"></script>

            <?php include 'common/scripts.php'; ?>

            <!-- Quick view btn click, view single product data -->
            <script>

                $('.button-count').click(function (e) {
                    e.preventDefault();
                });

                $('.cd-trigger').click(function (e) {

                    var itemid = $(this).data('id');
                    var itemName = $(this).data('name');
                    var itemimg = $(this).data('itemimage');

                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '../apps/controller/productcontroller.php',
                        data: {action: "getItemData", id: itemid},
                        success: function (res) {
                            $(".cd-quick-view .cd-item-info #methods").html(res.options);
                            $('.cd-quick-view .cd-item-info #methodvalue').text(res.price1);
                        }
                    });

                    $('.cd-quick-view .cd-item-info #item_title').text(itemName);
                    $('.cd-quick-view .cd-item-info #item-form #itemid').val(itemid);
                    $('.cd-quick-view .cd-slider img').attr("src", itemimg);

                });

                // when select the method change price
                $('#methods').on('change', function () {
                    var Price = $(this).find(':selected').data('price');
                    $('.cd-quick-view .cd-item-info #methodvalue').text(Price);

                });

                // close modal clear form
                $('.cd-quick-view .cd-close').click(function (e) {
                    $('.cd-quick-view .cd-item-info #item-form')[0].reset();
                });

            </script>


    </body>

</html>