<!DOCTYPE html>

<?php
session_start();
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

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <?php
                            if(isset($_SESSION['user_info']['name'])){
                            $namearr = explode(' ', trim($_SESSION['user_info']['name'])); 
                            $firstname = $namearr[0]; ?>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <li class="link-right dropdown">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; <?php echo $firstname; ?></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="orderhistory.php">Orders History</a>
                                    <a class="dropdown-item" href="../apps/controller/logincontroller.php?logout=logout">Logout</a>
                                </div>
                            </li>

                            <?php }else{ ?>
                              <li class="link-right"><a class="nav-link scrollto header-login-link" onclick="loginPopUpShow();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login </a></li>
                            <?php } ?>
                            <li class="link-right"><a class="getstarted scrollto" href="products.php">Schedule a pickup</a></li>
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

                <div class="carousel-item active" data-bs-interval="10000" >
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
                                <a href="products.php" class="btn-get-started scrollto"> Schedule a Pickup</a>
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



                <!-- ======= About Section ======= -->
                <section id="about" class="about">
                    <div class="container">

                        <div class="row content">
                            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                                <h2>Who we are </h2>
                                <h3>We provide a comprehensive laundry service with outstanding customer service</h3>
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                                <p>
                                    Canren Wash is a medium scaled laundry service provider situated at Piliyandala area
                                    We have been providing our services in washing,pressing and dry cleaning since 2008. Our laundry service is one you can trust. </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> We understand the worth of your attire</li>
                                    <li><i class="ri-check-double-line"></i> We value your personal hygiene</li>
                                    <li><i class="ri-check-double-line"></i> We save your cost and time of laundering</li>
                                    <li><i class="ri-check-double-line"></i> We always get in touch with you</li>
                                </ul>
                                <p class="fst-italic">
                                    Convenience. Simplicity. Satisfaction
                                </p>
                            </div>
                        </div>

                    </div>
                </section><!-- End About Section -->

                <!-- ======= Counts Section ======= -->
                <section id="counts" class="counts">
                    <div class="container">

                        <div class="row counters">

                            <div class="col-lg-3 col-6 text-center">

                                <h2><i class="bx bx-mobile"></i></h2>
                                <p>You Order</p>
                            </div>

                            <div class="col-lg-3 col-6 text-center">
                                <h2><i class="bx bx-trash"></i></h2>
                                <p>We Collect</p>
                            </div>

                            <div class="col-lg-3 col-6 text-center">
                                <h2><i class="bx bxs-t-shirt"></i></h2>
                                <p>We Clean</p>
                            </div>

                            <div class="col-lg-3 col-6 text-center">
                                <h2><i class="bx bxs-truck"></i></h2>
                                <p>We Deliver</p>
                            </div>

                        </div>

                    </div>
                </section><!-- End Counts Section -->

                <!-- ======= Why Us Section ======= -->
                <section id="why-us" class="why-us">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
                                <div class="content">
                                    <h3>Why Choose Canren Wash ?</h3>
                                    <p>
                                        We have been able to successfully take the load off your shoulders, and let you focus on bigger and better things
                                    </p>

                                </div>
                            </div>
                            <div class="col-lg-8 d-flex align-items-stretch">
                                <div class="icon-boxes d-flex flex-column justify-content-center">
                                    <div class="row">
                                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <img src="assets/img/icons/detergent.png" />
                                                <h4>Quality Detergents</h4>
                                                <p>We use most high quality and safe detergant to clean the clothes. From detergents and boosters to bleaches and conditioners we test them before using on your valuable clothes.</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <img src="assets/img/icons/delivery.png" />
                                                <h4>Speed Delivery</h4>
                                                <p>Save your valuable time by letting us pick and deliver for you. Your laundry will be back fresh and clean when you want!</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <img src="assets/img/icons/promotions.png" />
                                                <h4>Promotions at all times</h4>
                                                <p>you can earn loyalty points by placing more and more orders.Not only that you can introduce us to your friends and earn a discount.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End .content-->
                            </div>
                        </div>

                    </div>
                </section><!-- End Why Us Section -->

                <!-- ======= Cta Section ======= -->
                <section id="cta" class="cta">
                    <div class="container">

                        <div class="text-center" data-aos="zoom-in">
                            <h3>Simple solution for your laundry load</h3>
                            <p> Simply enter username and password to use the Canren Wash online portal. Don't have an account? No problem! Just click below</p>
                            <a class="cta-btn" href="#">Sign Up</a>
                        </div>

                    </div>
                </section><!-- End Cta Section -->

                <!-- ======= Services Section ======= -->
                <section id="services" class="services section-bg">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="section-title" data-aos="fade-right">
                                    <h2>Services</h2>
                                    <p>We have best experienced work force and state of the art machinery to provide you a high quality service</p>
                                    <br><!-- comment --><p>

                                        Save 3+ hours per week by having Canren Wash pick up your clothes right from your door and return them freshly cleaned and perfectly folded.
                                        Expect to have your garments returned in 3 days.</p>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-stretch">
                                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                            <div class="icon"><img src="assets/img/icons/shirt.png" /></div>

                                            <h4><a href="">Wash & Iron</a></h4>
                                            <p>All your regular wear garments will be washed, steam ironed and neatly packed for delivery</p>
                                            </br>
                                            <a href="#PriceWash" class="services btn-get-started">Check Price List</a>
                                        </div>

                                    </div>

                                    <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                                            <div class="icon"><img src="assets/img/icons/fold.png" /></div>
                                            <h4><a href="">Wash & Fold</a></h4>
                                            <p>This is the ideal service for your everyday laundry needs.</p>
                                            </br>
                                            <a href="#PriceWash" class="services btn-get-started">Check Price List</a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-stretch mt-4">
                                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                                            <div class="icon"><img src="assets/img/icons/iron.png" /></div>
                                            <h4><a href="">Pressing</a></h4>
                                            <p>Our steam Pressing Service will give the perfect finished look to your clothes.</p>
                                            </br>
                                            <a href="#PriceWash" class="services btn-get-started">Check Price List</a>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-stretch mt-4">
                                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                                            <div class="icon"><img src="assets/img/icons/dry-cleaning.png" /></div>
                                            <h4><a href="">Dry Cleaning</a></h4>
                                            <p>This is the perfect service for items you want professionally cleaned and returned pressed and on a hanger </p>
                                            </br>
                                            <a href="#PriceWash" class="services btn-get-started">Check Price List</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section><!-- End Services Section -->

                <!-- ======= Portfolio Section ======= -->
                <!--    <section id="portfolio" class="portfolio">
                      <div class="container">

                        <div class="section-title" data-aos="fade-left">
                          <h2>Portfolio</h2>
                          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                        </div>

                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                          <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                              <li data-filter="*" class="filter-active">All</li>
                              <li data-filter=".filter-app">App</li>
                              <li data-filter=".filter-card">Card</li>
                              <li data-filter=".filter-web">Web</li>
                            </ul>
                          </div>
                        </div>

                        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <div class="portfolio-wrap">
                              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>-->
                <!--    </section> End Portfolio Section -->

                <!-- ======= Testimonials Section ======= -->
                <section id="testimonials" class="testimonials section-bg">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="section-title" data-aos="fade-right">
                                    <h2>Testimonials</h2>
                                    <p>What our clients say about us</p>
                                </div>
                            </div>
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

                                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                                    <div class="swiper-wrapper">

                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                    Good service. Clean & Fast
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <!--<img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">-->
                                                <h3>Kasun Chathuranga</h3>

                                            </div>
                                        </div><!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                    ???I've been using Simply Laundry for about a year now, and I really enjoy the service!
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <!--<img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">-->
                                                <h3>Vanessa</h3>

                                            </div>
                                        </div><!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                    ???Excellent service! Flexible and really reasonably priced.???
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <!--<img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">-->
                                                <h3>Jayanthi Mayadunna</h3>

                                            </div>
                                        </div><!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                    ???I recently used Canren wash as I do not have the time to do my own laundry or bring my clothes to the dry cleaners. On both of my orders so far, my laundry was returned in perfect condition, smelling like fresh, brand new clothes. Highly recommended business to service your needs!???
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <!--<img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">-->
                                                <h3>Ramali Jude</h3>

                                            </div>
                                        </div><!-- End testimonial item -->

                                        <div class="swiper-slide">
                                            <div class="testimonial-item">
                                                <p>
                                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                                    Highly Recommend
                                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                                </p>
                                                <!--<img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">-->
                                                <h3>Lalith Perera</h3>

                                            </div>
                                        </div><!-- End testimonial item -->

                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section><!-- End Testimonials Section -->

                <!-- ======= Team Section ======= -->
                <!--    <section id="team" class="team">
                      <div class="container">

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="section-title" data-aos="fade-right">
                              <h2>Team</h2>
                              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem.</p>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="row">

                              <div class="col-lg-6">
                                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                  <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                                  <div class="member-info">
                                    <h4>Walter White</h4>
                                    <span>Chief Executive Officer</span>
                                    <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                                    <div class="social">
                                      <a href=""><i class="ri-twitter-fill"></i></a>
                                      <a href=""><i class="ri-facebook-fill"></i></a>
                                      <a href=""><i class="ri-instagram-fill"></i></a>
                                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-6 mt-4 mt-lg-0">
                                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                  <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                                  <div class="member-info">
                                    <h4>Sarah Jhonson</h4>
                                    <span>Product Manager</span>
                                    <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                                    <div class="social">
                                      <a href=""><i class="ri-twitter-fill"></i></a>
                                      <a href=""><i class="ri-facebook-fill"></i></a>
                                      <a href=""><i class="ri-instagram-fill"></i></a>
                                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-6 mt-4">
                                <div class="member" data-aos="zoom-in" data-aos-delay="300">
                                  <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                                  <div class="member-info">
                                    <h4>William Anderson</h4>
                                    <span>CTO</span>
                                    <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                                    <div class="social">
                                      <a href=""><i class="ri-twitter-fill"></i></a>
                                      <a href=""><i class="ri-facebook-fill"></i></a>
                                      <a href=""><i class="ri-instagram-fill"></i></a>
                                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-lg-6 mt-4">
                                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                                  <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                                  <div class="member-info">
                                    <h4>Amanda Jepson</h4>
                                    <span>Accountant</span>
                                    <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                                    <div class="social">
                                      <a href=""><i class="ri-twitter-fill"></i></a>
                                      <a href=""><i class="ri-facebook-fill"></i></a>
                                      <a href=""><i class="ri-instagram-fill"></i></a>
                                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>

                      </div>
                    </section> End Team Section -->

                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4" data-aos="fade-right">
                                <div class="section-title">
                                    <h2>Contact</h2>
                                    <p>Contact us for for any queries via email or phone call.</p>
                                </div>
                            </div>

                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15846.489114681455!2d79.9190161!3d6.8157121!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca3cd88b32dff19!2sCANREN%20WASH!5e0!3m2!1sen!2slk!4v1637077880338!5m2!1sen!2slk"" frameborder="0" allowfullscreen></iframe>

                                <div class="info mt-4">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>No 7C, Colombo Road,Jaliyagoda,Piliyandala</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mt-4">
                                        <div class="info">
                                            <i class="bi bi-envelope"></i>
                                            <h4>Email:</h4>
                                            <p>canrenwash@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="info w-100 mt-4">
                                            <i class="bi bi-phone"></i>
                                            <h4>Call:</h4>
                                            <p>+94 112609 407</p>
                                        </div>
                                    </div>
                                </div>

                                <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                        <div class="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="my-3">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div>
                                    <div class="text-center"><button type="submit">Send Message</button></div>
                                </form>
                            </div>
                        </div>

                    </div>
                </section><!-- End Contact Section -->

            </main><!-- End #main -->

            <!-- login pop up -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                            <button type="button" id="close-login-modal" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="login-logo text-center mb-2">
                                <img src="../apps/assets/img/logo.png" width="200"></br>
                                <br> <b>Laundry </b>Management
                            </div>
                            <!-- If there is an error -->
                            <?php
                            if (isset($_REQUEST['msg'])) { ?>
                                <span class="error-msg text-danger"><?php echo base64_decode($_REQUEST['msg']); ?></span>
                            <?php } ?>
                            <form class="user" action="../apps/controller/logincontroller.php" method="post">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="web_customer_login" value="webCusLogin">
                                    <input type="email" class="form-control" placeholder="Email"  name="wc_email" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text input-icon">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Password"  name="wc_pass" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text input-icon">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
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

            <script src="assets/js/jquery-2.1.1.js"></script>
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

    </body>

<!-- login pop up show  -->
<script>
    <?php if(isset($_REQUEST['login']) && $_REQUEST['login']=="login"){ ?>
    $(window).on('load', function(){ 
        $('#loginModal').modal('show');
    });
    <?php } ?>

    function loginPopUpShow(){
        $('#loginModal').modal('show');
    }

    // close login modal
    $('#close-login-modal').click(function (e) { 
        $('#loginModal').modal('hide');
    });
</script>

</html>
