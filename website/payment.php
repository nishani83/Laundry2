<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

if(isset($_SESSION['my_bucket_total'])){
    $session_bucket_total = $_SESSION['my_bucket_total'];
    $bucketCount = sizeof($_SESSION['my_bucket']);
}else{
    $session_bucket_total = 0;
    header("Location:products.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include 'common/header.php'; ?>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- <section id="hero" class="d-flex align-items-center">
           <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
             <h1>Your New Online Presence with Canren</h1>
             <h2>We are team of talented designers making websites with Bootstrap</h2>
             <a href="#about" class="btn-get-started scrollto">Get Started</a>
           </div>
         </section><!-- End Hero -->

    <!--end carousal-->
    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <section id="contact" class="contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12" data-aos="fade-right">
                                        <div class="section-title">

                                            <h2>Place Order</h2>
                                            <br><br>
                                            <article class="card">
                                                <header class="card-header"> Washing Basket Total (LKR) </header>
                                                <div class="card-body row">

                                                    <div class="col-12"> <strong>Sub Total:</strong> <br><?php echo number_format((float)$session_bucket_total, 2, '.', ''); ?> </div>
                                                    <div class="col-12"> <strong>Delivery Charge:</strong> <br>300.00 </div>
                                                    <div class="col-12"> <strong>Discount:</strong> <br>0% </div>
                                                    <div class="col-12"> <strong>Grand Total:</strong> <br><?php echo number_format((float)($session_bucket_total+300), 2, '.', ''); ?> </div>
                                                </div>
                                            </article>
                                            <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                                                <!-- Set up a container element for the button -->
                                                <div id="paypal-button-container"></div>

                                                <!-- Include the PayPal JavaScript SDK -->
                                                <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

                                                <script>

                                                    var payamount = "<?php echo number_format((float)(($session_bucket_total+300)*0.0028), 2, '.', ''); ?>";

                                                    // Render the PayPal button into #paypal-button-container
                                                    paypal.Buttons({

                                                        // Set up the transaction
                                                        createOrder: function(data, actions) {
                                                            return actions.order.create({
                                                                purchase_units: [{
                                                                    amount: {
                                                                        value: payamount
                                                                    }
                                                                }]
                                                            });
                                                        },

                                                        // Finalize the transaction
                                                        onApprove: function(data, actions) {
                                                            return actions.order.capture().then(function(orderData) {
                                                                // Successful capture! For demo purposes:
                                                                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                                // var transaction = orderData.purchase_units[0].payments.captures[0];
                                                                // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                                                                // Replace the above to show a success message within this page, e.g.
                                                                // const element = document.getElementById('paypal-button-container');
                                                                // element.innerHTML = '';
                                                                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                                // Or go to another URL:  actions.redirect('thank_you.html');
                                                                actions.redirect('http://localhost/laundrymgt/website/invoice.php');
                                                            });
                                                        }


                                                    }).render('#paypal-button-container');
                                                </script>
                                                <div class="col-6 form-group">

                                                    <a href="invoice.php" class="btn btn-warning">Complete Payment</a>

                                                    <!-- <input class="btn btn-warning" type="button" value="Complete Payment"> -->
                                                </div>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/jquery-2.1.1.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://app.payhere.co/embed/embed.js"></script>

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