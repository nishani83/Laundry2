
<!-- header  -->
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
                    <li class="link-left"><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li class="link-left"><a class="nav-link scrollto" href="index.html#about">About</a></li>
                    <li class="link-left"><a class="nav-link scrollto" href="index.html#services">Services</a></li>
                    <li class="link-left"><a class="nav-link scrollto " href="index.html#rewards">Referrals and Rewards</a></li>
                    <li class="link-left"><a class="nav-link scrollto" href="index.html#contact">Contact</a></li>

                    <?php
                    if (isset($_SESSION['user_info']['name'])) {
                        $namearr = explode(' ', trim($_SESSION['user_info']['name']));
                        $firstname = $namearr[0];
                        ?>

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="link-right dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; <?php echo $firstname; ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="orderhistory.php">Orders History</a>
                                <a class="dropdown-item" href="../apps/controller/logincontroller.php?logout=logout">Logout</a>
                            </div>
                        </li>

                    <?php } else { ?>
                        <li class="link-right"><a class="nav-link scrollto header-login-link" onclick="loginPopUpShow();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login </a></li>
<?php } ?>

                    <li class="link-right"><a class="getstarted scrollto" id='cart-button' href="cart.php">Show Cart <span id="bucket-count"><?php echo $bucketCount; ?><span></a></li>
                                    </ul>
                                    <i class="bi bi-list mobile-nav-toggle"></i>
                                    </nav><!-- .navbar -->

                                    </div><!-- End Header Container -->
                                    </div>
                                    </header>

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
                                                    <?php if (isset($_REQUEST['msg'])) { ?>
                                                        <span class="error-msg text-danger"><?php echo base64_decode($_REQUEST['msg']); ?></span>
                                                    <?php } ?>
                                                    <form class="user" action="../apps/controller/logincontroller.php" method="post">
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="web_customer_login" value="webCusLogin">
                                                            <input type="email" class="form-control" placeholder="Email" id ="email" name="wc_email" required>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text input-icon">
                                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <input type="password" class="form-control" placeholder="Password" id="pass" name="wc_pass" required>
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