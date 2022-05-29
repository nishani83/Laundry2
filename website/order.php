<!DOCTYPE html>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../apps/common/dbconnection.php'; //To get connection string
include '../apps/model/customermodel.php'; //To call customer model

session_start();

$ob = new dbconnection();
$con = $ob->connection();

if (!isset($_SESSION['my_bucket']) || $_SESSION['my_bucket'] == "") {
    header("Location:products.php");
} else {

    $bucketCount = sizeof($_SESSION['my_bucket']);

    $obj = new customer; //To create an object using customer class
    $result = $obj->viewCustomer($_SESSION['customer_id']);
    $row = $result->fetch_assoc();
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
                        <form id="order-form" method="post">
                            <div class="row">
                                <div class="col-8">
                                    <section id="contact" class="contact">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12" data-aos="fade-right">
                                                    <div class="section-title">
                                                        <h2>Checkout</h2>

                                                    </div>

                                                    <div class="php-email-form mt-4" data-aos="fade-up" data-aos-delay="100">
                                                        <div class="row">
                                                            <p>Recipient Details</p>
                                                            <hr>
                                                            <input type="hidden" name="customerid" value="<?php echo $_SESSION['customer_id']; ?>">
                                                            <div class="col-md-4 form-group">
                                                                <?php
                                                                $namearr = explode(' ', trim($row['name']));
                                                                ?>
                                                                <input type="text" name="fname" class="form-control" id="name" placeholder="First Name" value="<?php echo $namearr[0]; ?>" required readonly>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" name="lname" class="form-control" id="name" placeholder="Last Name" value="<?php echo trim(strstr($row['name'], " ")) ?>" required readonly>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" name="phone" class="form-control" id="name" placeholder="Mobile Number" value="<?php echo $row['contactNo']; ?>" required readonly>
                                                            </div>
                                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $row['email']; ?>" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="php-email-form mt-4" data-aos="fade-up" data-aos-delay="100">

                                                        <div class="row">
                                                            <p>Delivery Details</p>
                                                            <hr>
                                                            <?php
                                                            $addr = explode(',', $row['address']);
                                                            ?>
                                                            <div class="col-md-4 form-group">
                                                                <select name="deliverydestination" required class="form-control">
                                                                    <option value="" selected disabled>Destination</option>
                                                                    <option value="Home">Home</option>
                                                                    <option value="Office">Office</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" name="houseno" class="form-control" id="" placeholder="House Number" value="<?php echo $addr[0]; ?>" required>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <input type="text" name="street" class="form-control" id="" placeholder="Street" value="<?php echo $addr[1]; ?>" required>
                                                            </div>
                                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                                <input type="text" class="form-control" name="city" id="" placeholder="City" value="<?php echo $addr[2]; ?>" required>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <textarea class="form-control" name="deliveryinstruc" rows="5" placeholder="Pickup & Delivery Instruction"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <div class="php-email-form mt-4" data-aos="fade-up" data-aos-delay="100">
                                                        <div class="row">
                                                            <p>Delivery Timeline</p>
                                                            <hr>
                                                            <div class="col-md-4 form-group">
                                                                <p>Pickup Date</p>
                                                                <input type="date" name="pickupdate" class="form-control" id="pickupdate" min="<?php echo date('Y-m-d', strtotime("+1 days")) ?>" onchange="setdate()" required>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <p>Pickup Time</p>
                                                                <select name="pickuptime" id="pickuptime" class="form-control" required>
                                                                    <option value="">Select a Time</option>
                                                                    <option value="1">9.00-12.00</option>
                                                                    <option value="2">2.00-5.00</option>
                                                                </select>

                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <p>Delivery Date</p>
                                                                <input type="date" name="deliverydate" class="form-control" id="deliverydate" placeholder="" min="" required>
                                                            </div>


                                                        </div>

                                                        <br>

                                                    </div>
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
<!--                                                                <input type="hidden" name="orderamount" value="<?php //echo $_SESSION['my_bucket_total'];  ?>">-->
                                                                <div class="col-12"> <strong>Sub Total:</strong> <br><?php echo number_format((float) $_SESSION['my_bucket_total'], 2, '.', ''); ?> </div>
                                                                <div class="col-12"> <strong>Delivery Charge:</strong> <br>300.00 </div>
                                                                <div class="col-12"> <strong>Discount:</strong> <br>0% </div>
                                                                <div class="col-12"> <strong>Grand Total:</strong> <br><?php echo number_format((float) ($_SESSION['my_bucket_total'] + 300), 2, '.', ''); ?></div>
                                                                <input type="hidden" name="orderamount" value="<?php echo number_format((float) ($_SESSION['my_bucket_total'] + 300), 2, '.', ''); ?>">
                                                            </div>
                                                            <input type="hidden" name="deliverycharge" value="300">
                                                        </article>
                                                        <div class="php-email-form mt-4">

                                                            <input type="submit" class="from-control place-order-btn" name="place-order" value="Place Order">

                                                            <a href="payment.php" class="goto-pay-btn d-none">Continue to Payment</a>

                                                            <div class="paynow-txt mb-2 d-none">
                                                                <p style="color: red;"><b>You Must Pay Now for Complete the Order</b></p>
                                                            </div>
                                                            <!-- Set up a container element for the button -->
                                                            <div id="paypal-button-container" class="d-none"></div>

                                                            <!-- Include the PayPal JavaScript SDK -->
                                                            <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

                                                            <script>
                                                                    // Render the PayPal button into #paypal-button-container

                                                                    var payamount = "<?php echo number_format((float) (($_SESSION['my_bucket_total'] + 300) * 0.0028), 2, '.', ''); ?>";

                                                                    paypal.Buttons({

                                                                        // Set up the transaction
                                                                        createOrder: function (data, actions) {
                                                                            return actions.order.create({
                                                                                purchase_units: [{
                                                                                        amount: {
                                                                                            value: payamount
                                                                                        }
                                                                                    }]
                                                                            });
                                                                        },

                                                                        // Finalize the transaction
                                                                        onApprove: function (data, actions) {
                                                                            return actions.order.capture().then(function (orderData) {
                                                                                // Successful capture! For demo purposes:
                                                                                // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                                                // var transaction = orderData.purchase_units[0].payments.captures[0];

                                                                                // alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                                                                                // Replace the above to show a success message within this page, e.g.
                                                                                // const element = document.getElementById('paypal-button-container');
                                                                                // element.innerHTML = '';
                                                                                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                                                // Or go to another URL:
                                                                                actions.redirect('http://localhost/laundrymgt/website/invoice.php');
                                                                            });
                                                                        }


                                                                    }).render('#paypal-button-container');
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
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

            <!-- Template Main JS File -->
            <script src="assets/js/jquery-2.1.1.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="https://app.payhere.co/embed/embed.js"></script>

            <?php include 'common/scripts.php'; ?>

            <script>

                                                                    // datepicker delivery date set
                                                                    function setdate() {
                                                                        var x = document.getElementById("pickupdate").value;
                                                                        var pickDate = new Date(x);
                                                                        pickDate.setDate(pickDate.getDate() + 4);
                                                                        var newDate = pickDate.toISOString().slice(0, 10);
                                                                        document.getElementById("deliverydate").min = newDate;
                                                                    }


                                                                    // ORDER FORM SUBMIT AJAX
                                                                    $('#order-form').on('submit', function (e) {
                                                                        e.preventDefault();

                                                                        var data = $('#order-form').serialize();

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: '../apps/controller/ordercontroller.php',
                                                                            data: data,
                                                                            success: function (res) {
                                                                                if (res == 1) {
                                                                                    localStorage.setItem("orderPlaced", "1");
                                                                                    window.location.href = "http://localhost/laundrymgt/website/payment.php";
                                                                                }
                                                                            }
                                                                        });

                                                                    });

            </script>

            <script>
                $(document).ready(function () {

                    // if didn't login show login modal
<?php if (!isset($_SESSION['customer_id'])) { ?>
                        $('#loginModal').modal('show');
<?php } ?>

                    // if come to this page again wihout complete the order, show continue to pay btn
                    if (localStorage.getItem("orderPlaced") == "1") {
                        $('.place-order-btn').addClass('d-none');
                        $('.goto-pay-btn').removeClass('d-none');
                    }
                });
            </script>

    </body>

</html>