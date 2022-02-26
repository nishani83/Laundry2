<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Canren Wash Laundry Management | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/adminlte.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <!--<div class="login-box">
          <div class="login-logo">
            <a href="../../index2.html"><b>CanrenWash</b>Laundry Management</a>
          </div>
           /.login-logo -->
        <div class="container">
            <div class="row">
                <div class="col-4"> &nbsp;</div>
                <div class="col-4">
                    <!--  </div>-->
                    <div class="container">
                        <div class="login-box">
                            <div class="card">
                                <div class="row">
                                    <div class="col">

                                        <div class="login-logo">
                                            <img src="../assets/img/logo.png"></br>
                                            <br> <b>Laundry </b>Management
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body login-card-body">
                                                <p class="login-box-msg">Sign in to start your session</p>
                                                <div class="alert alert-danger" role="alert" id="error" style="display: <?php echo (isset($_REQUEST['msg'])) ? 'block' : 'none' ?>">
                                                    <?php
                                                    //If there is an error
                                                    if (isset($_REQUEST['msg'])) {
                                                        echo base64_decode($_REQUEST['msg']);
                                                    }
                                                    ?>
                                                </div>
                                                <form class="user" action="../controller/logincontroller.php" method="post">
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control" placeholder="Email" id ="email" name="email">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-envelope"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
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
                                                        <!-- /.col -->
                                                        <div class="col-4">
                                                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                </form>

                                                <!--      <div class="social-auth-links text-center mb-3">
                                                        <p>- OR -</p>
                                                        <a href="#" class="btn btn-block btn-primary">
                                                          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                                        </a>
                                                        <a href="#" class="btn btn-block btn-danger">
                                                          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                                                        </a>
                                                      </div>-->
                                                <!-- /.social-auth-links -->

                                                <p class="mb-1">
                                                    <a href="forgot-password.html">I forgot my password</a>
                                                </p>
                                                <p class="mb-0">
                                                    <a href="register.html" class="text-center">Create an Account</a>
                                                </p>
                                            </div>
                                            <!-- /.login-card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.login-box -->
                </div>
            </div>
        </div>



        <!-- jQuery -->
        <script src="../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/js/adminlte.min.js"></script>

    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').submit(function () {
                var email = $('#email').val();
                var pass = $('#pwd').val();
                var errorMessage = $('#error');
                //To check both email and password
                if (email == "" && pass == "") {
                    errorMessage.show();
                    errorMessage.text("Please enter your email and password");
                    return false;
                }
                //To check empty email
                if (email == "") {
                    errorMessage.show();
                    errorMessage.text("Please enter your Email address");
                    return false;
                }
                //To check empty password
                if (pass == "") {
                    errorMessage.show();
                    errorMessage.text("Please enter your password");
                    return false;
                }

            });
        });
    </script>
</html>
