<!doctype html>
<html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Bootstrap 4 Carousel with Multiple Items</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        <link rel="stylesheet" href="assets/css/carousel.css">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top menu -->
        <?php include 'include_topbar.php'; ?>
        <!-- Top content -->
        <div class="top-content">
            <div class="container-fluid">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                            <img src="../images/category/dress.png" class="img-fluid mx-auto d-block" alt="img1">
                            <div class="carousel caption-top">Dress</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/trouser.png" class="img-fluid mx-auto d-block" alt="img2">
                            <div class="carousel caption-top">Trouser</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/baby.png" class="img-fluid mx-auto d-block" alt="img3">
                            <div class="carousel caption-top">baby suits</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/saree.png" class="img-fluid mx-auto d-block" alt="img4">
                            <div class="carousel caption-top">Saree</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/blanket.png" class="img-fluid mx-auto d-block" alt="img5">
                            <div class="carousel caption-top">Bedding & Linen</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/suit.png" class="img-fluid mx-auto d-block" alt="img6">
                            <div class="carousel caption-top">Suits</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/uniform.png" class="img-fluid mx-auto d-block" alt="img7">
                            <div class="carousel caption-top">School Uniform</div>
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="../images/category/nightdress.png" class="img-fluid mx-auto d-block" alt="img8">
                            <div class="carousel caption-top">Night Wear</div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Section 1 -->
        <div class="section-1-container section-container">
            <div class="container">
                <div class="row">
                    <div class="col section-1 section-description wow fadeIn">
                        <h1>Bootstrap 4 Carousel with Multiple Items</h1>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p>
                            This is a free <strong>Carousel</strong> template with <strong>Multiple Items</strong> made with
                            the <strong>Bootstrap 4</strong> framework. Check it out now. Download it, customize and use it as you like!
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 section-1-box wow fadeInUp">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section-1-box-icon">
                                    <i class="fas fa-magic"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3>Branding</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInDown">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section-1-box-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3>Web design</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 section-1-box wow fadeInUp">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="section-1-box-icon">
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h3>Social media</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="section-2-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col section-2 section-description wow fadeIn">
                    </div>
                </div>
                <div class="row">
                    <div class="col section-2-box wow fadeInLeft">
                        <h3>Section 2</h3>
                        <p class="medium-paragraph">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                            Ut wisi enim ad minim veniam, quis nostrud.
                            Exerci tation ullamcorper suscipit <a href="#">lobortis nisl</a> ut aliquip ex ea commodo consequat.
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                            Ut wisi enim ad minim veniam, quis nostrud.
                            Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="section-3-container section-container">
            <div class="container">

                <div class="row">
                    <div class="col section-3 section-description wow fadeIn">
                        <h2>Section 3</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 section-3-box wow fadeInLeft">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-3-box-icon">
                                    <i class="fas fa-paperclip"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>Ut wisi enim ad minim</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Ut wisi enim ad minim veniam, quis nostrud.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 section-3-box wow fadeInLeft">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-3-box-icon">
                                    <i class="fas fa-pencil-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>Sed do eiusmod tempor</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Ut wisi enim ad minim veniam, quis nostrud.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 section-3-box wow fadeInLeft">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-3-box-icon">
                                    <i class="fas fa-cloud"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>Quis nostrud exerci tat</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Ut wisi enim ad minim veniam, quis nostrud.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 section-3-box wow fadeInLeft">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="section-3-box-icon">
                                    <i class="fab fa-google"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3>Minim veniam quis nostrud</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.
                                    Ut wisi enim ad minim veniam, quis nostrud.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Section 4 -->
        <div class="section-4-container section-container section-container-image-bg">
            <div class="container">
                <div class="row">
                    <div class="col section-4 section-description wow fadeInLeftBig">
                        <h2>Section 4</h2>
                        <p>
                            Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                            aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer-container">

            <div class="container">
                <div class="row">

                    <div class="col">
                        &copy; Bootstrap 4 Carousel with Multiple Items. Download it for free on <a href="https://azmind.com">AZMIND</a>.
                    </div>

                </div>
            </div>

        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-3.3.1.min.js"></script>
        <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>