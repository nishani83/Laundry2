<!DOCTYPE html>
<?php
include '../../apps/common/dbconnection.php';
include '../model/ordermodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new order;
$result = $obj->viewCollectionLocations();
while ($row = $result->fetch_assoc()) {
    // $name = $row['name'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    $link = $row['address'];
    //  $status = $row['locstatus'];

    $locations_php[] = array($latitude, $longitude, $link); //, 'markericon' => $locationMarkerIcon
}
// session_start();
/* include '../common/session.php'; //To get session info
  include '../common/dbconnection.php'; //To get connection string
  include '../model/commonmodel.php'; //To call common vehicle model



  //To create an object using role class
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
            height: 500px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }
    </style>
    <script>
        var locations = Object.values(<?php echo json_encode($locations_php); ?>);
// var locations = [
//            ['Test 1', 28.648608, 77.250925],
//            ['Test 2', 28.618174, 77.242686],
//            ['Test 3', 28.663973, 77.241656],
//            ['Test 4', 28.620585, 77.228609],
//            ['Test 5', 28.636219, 77.213846],
//            ['Test 6', 28.622658, 77.277704]
//        ];

        function InitMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: new google.maps.LatLng(6.815914502326588, 79.91900536824919),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();
            var iconBase = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                    map: map,
                    icon: iconBase
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][2]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }



    </script>

    <body onload="InitMap();">
        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('collectionmap');
          tab.className+=" active ";
          var tab = document.getElementById('scheduleMenu');
          tab.className+=" menu-open";
          var tab = document.getElementById('scheduleM');
          tab.className+=" active";
        </script>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">



                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div id="map"></div>

                                <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!--                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByqPQH8ZaM1SYOMhHJ58ndIyJOGJHnNdo&callback=initMap"></script>-->
                                <!--<!-- comment -->
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA9WxUzanm0I39BNWrrMouIkURepq_Oxc&libraries=places &callback=initMap"></script>


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

    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../assets/js/demo.js"></script>

</html>
