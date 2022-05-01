<!DOCTYPE html>
<?php
// include '../../apps/common/dbconnection.php';
// $ob = new dbconnection();
// $con = $ob->connection();
// session_start();
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
    <style>
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        var marker;
        function showMarker() {
            const myLatLng = {lat: getLat(), lng: getLongt()};
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: myLatLng,
            });

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
            google.maps.event.addListener(map, 'click', function (event) {

                latLng = event.latLng;

                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
                console.log("Marker");

                var longt = document.getElementById("longitude");
                var lat = document.getElementById("latitude");

                if (marker && marker.setMap) {
                    marker.setMap(null);

                }

                marker = new google.maps.Marker({position: latLng, map: map});

                longt.value = event.latLng.lng();
                lat.value = event.latLng.lat();

            });

        }
        function getLongt() {
            var longt = document.getElementById("longitude").value;
            return parseFloat(longt);

        }
        function getLat() {
            var lat = document.getElementById("latitude").value;
            return parseFloat(lat);
        }
        // Initialize and add the map


        function initMap() {

            // The location of Uluru
            const uluru = {lat: 6.815914502326588, lng: 79.91900536824919};
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: uluru,
            });
            // The marker, positioned at Uluru
            //  const marker = new google.maps.Marker({
            //    position: uluru,
            //  map: map,
            // });

            google.maps.event.addListener(map, 'click', function (event) {

                latLng = event.latLng;

                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
                console.log("Marker");

                var longt = document.getElementById("longitude");
                var lat = document.getElementById("latitude");

                if (marker && marker.setMap) {
                    marker.setMap(null);

                }

                marker = new google.maps.Marker({position: latLng, map: map});

                longt.value = event.latLng.lng();
                lat.value = event.latLng.lat();

            });
        }


    </script>

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
                                <div id="map"></div>

                                <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!--                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByqPQH8ZaM1SYOMhHJ58ndIyJOGJHnNdo&callback=initMap"></script>-->
                                <!--<!-- comment -->
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA9WxUzanm0I39BNWrrMouIkURepq_Oxc&libraries=places &callback=initMap"></script>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h6 text-gray-900 mb-4">Enter your Address</h1>

                                            <form method="post" action="../../apps/controller/customercontroller.php?status=AddWeb" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <input type="text"  name="address1" id="addess1"   class="form-control" placeholder="Address Line 1"/>
                                                </div>
                                                <input type="hidden" name="ëmail" id="email" value="<?php echo ($_SESSION['email']) ?>"/>
                                                <div class="form-group">
                                                    <input type="text"  name="address2" id="addess2"  class="form-control" placeholder="Address Line 2"/>
                                                </div>
                                                <select name="city" id="city"  class="form-control">
                                                    <option value="">Select a City</option>
                                                    <option value="piliyandala">Piliyandala</option>
                                                    <option value="bokundara">Bokundara</option>
                                                    <option value="maharagama">Maharagama</option>
                                                    <option value="boralesgamuwa">Boralesgamuwa</option>
                                                    </option>

                                                </select>
                                        </div>
                                    </div></div>

                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">

                                            <h1 class="h6 text-gray-900 mb-4">Fill or click the location in the map</h1>
                                        </div>

                                        <div class="alert alert-danger" role="alert" id="error" style="display: <?php echo (isset($_REQUEST['msg'])) ? 'block' : 'none' ?>">
                                            <?php
                                            //If there is an error
                                            if (isset($_REQUEST['msg'])) {
                                                echo base64_decode($_REQUEST['msg']);
                                            }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="text"  name="longitude" id="longitude"  class="form-control" placeholder="longtitude"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  name="latitude" id="latitude"  class="form-control" placeholder="latitude"/>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-block"  onclick="showMarker()">
                                                Show on Map
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" value="submit">
                                                Finish
                                            </button>
                                        </div>

                                        </form>

                                        <hr>

                                        <div class="text-center">
                                            <p class="small" >Step 3 of 3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>



    </body>
    <script type="text/javascript">
        $(document).ready(function () {

            $('form').submit(function () {
                var email = $('#email').val();
                var pass = $('#pass').val();
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
