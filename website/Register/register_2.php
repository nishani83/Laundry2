<!DOCTYPE html>
<?php
include '../../apps/common/dbconnection.php';
$ob = new dbconnection();
$con = $ob->connection();
//$status = $_REQUEST['status'];

session_start();
/* include '../common/session.php'; //To get session info
  include '../common/dbconnection.php'; //To get connection string
  include '../model/commonmodel.php'; //To call common vehicle model



  $obj = new role(); //To create an object using role class
  $result = $obj->viewRole(); //To get all roles' info
  //To set default time zone
  date_default_timezone_set("Asia/colombo");
  $cdate = date("Y-m-d");
  $cid = strtotime($cdate); //Date convert into timestamp

  function getDate1($y)
  {
  $a = floor($y / 4);
  $ctimestamp = time();
  $seconds = (60 * 60 * 24 * 365) * $y + (60 * 60 * 24 * $a);
  $timestamp = $ctimestamp - $seconds;
  $aDate = Date("Y-m-d", $timestamp); //To get date from timestamp
  return $aDate;
  }

  $maxDate = getDate1(18);
  $minDate = getDate1(60); */
?>
<html lang="en">
    <?php include '../common/include_head.php'; ?>
    <link rel="stylesheet" href='../assets/css/custom-styles.css'>
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <body class="bg-gradient-primary">
        <?php include '../common/include_topbar_register.php'; ?>
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img src="../images/logo.png" class="login-logo"/>

                                            <h1 class="h6 text-gray-900 mb-4">Enter your email</h1>
                                        </div>

                                        <div class="alert alert-danger" role="alert" id="error" style="display: <?php echo (isset($_REQUEST['msg'])) ? 'block' : 'none' ?>">
                                            <?php
                                            //If there is an error
                                            if (isset($_REQUEST['msg'])) {
                                                echo base64_decode($_REQUEST['msg']);
                                            }
                                            ?>
                                        </div>
                                        <form method="post" action="verifyOTP.php" enctype="multipart/form-data" id="addCustomer" name="addCustomer">
                                            <div class="form-group">
                                                <input type="text"  name="email" id="email"  class="form-control" onfocusout="checkEmail();" />
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-block" formaction="sendOTPEmail.php">
                                                Verify Email
                                            </button>
                                            </br>
                                            <div class="text-center">

                                                <h1 class="h6 text-gray-900 mb-4">Enter your Verification Code</h1>
                                                <?php //if ($status == "success") { ?>
                                                <h1 class="text-xs text-success mb-4 ">You must have received 4 digit number to your email</h1>
                                                <?php //} ?> </div>

                                            <div class="form-group">
                                                <input type="text" name="otp" id="otp" placeholder="xxxx" class="form-control" onkeyup="EnableDisable(this)"/>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block" disabled="disabled" name="confirm" id="confirm" formaction="verifyOTP.php">
                                                Confirm Verification
                                            </button>

                                        </form>
                                        <hr>
                                        <!--                                        <div class="text-center">
                                                                                    <a class="small" href="otp.php">Problem? Resend OTP via SMS</a>
                                                                                </div>-->
                                        <div class="text-center">
                                            <p class="small" >Step 2 of 4</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?php include '../../apps/common/include_scripts.php'; ?>

    </body>
    <script type="text/javascript">
        function checkEmail()
        {

            if (document.getElementById("email").value.length > 0)
            {

                $.ajax({
                    type: "POST",
                    data: {
                        email: $('#email').val(),
                    },
                    url: "getemail.php",
                    success: function (data)
                    {

                        if (data == 1)
                        {
                            alert("hi");
                            email_state = true;
                            $('#error').show();
                            $('#error').text("Email already exists");
                        }

                    }
                });
            }
        }
    </script>
    <script type="text/javascript">

//        $(document).ready(function () {
//            $('form').submit(function () {
//                var email = $('#email').val();
//                var pass = $('#pass').val();
//                var errorMessage = $('#error');
//                //To check both email and password
//                if (email == "" && pass == "") {
//                    errorMessage.show();
//                    errorMessage.text("Please enter your email and password");
//                    return false;
//                }
//                //To check empty email
//                if (email == "") {
//                    errorMessage.show();
//                    errorMessage.text("Please enter your Email address");
//                    return false;
//                }
//                //To check empty password
//                if (pass == "") {
//                    errorMessage.show();
//                    errorMessage.text("Please enter your password");
//                    return false;
//                }
//
//            });
//        });
    </script>

    <script type="text/javascript">
        function EnableDisable(otp) {
            //Reference the Button.
            var btnSubmit = document.getElementById("confirm");

            //Verify the TextBox value.
            if (otp.value.trim() != "") {
                //Enable the TextBox when TextBox has value.
                btnSubmit.disabled = false;
            } else {
                //Disable the TextBox when TextBox is empty.
                btnSubmit.disabled = true;
            }
        }
        ;
    </script>

</html>
