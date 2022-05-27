<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //to get driver,vehicle,schedule info from common class

include '../model/employeemodel.php';
include '../model/vehiclemodel.php';
include '../model/ordermodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$date = $_GET['dateselected'];
$obe = new Employee();
//$ree = $obe->viewAvailableDrivers($date);
$ree = $obe->viewAvailableDrivers();

$obv = new vehicle();
$revt = $obv->viewVehicleType();

$rev = $obv->viewAllActiveVehicle(); //To get all vehicles info


$vehicleRows = array();
while ($r = $rev->fetch_assoc()) {
    $vehicleRows[] = $r;
}
$vehicleJson = json_encode($vehicleRows);

$obo = new order;
//$reso = $obo->viewPendingOrders($date);
//$resc = $obo->viewCompletedOrders($date);

$reso = $obo->viewPendingOrdersAll();
$pickupRows = array();
while ($rp = $reso->fetch_assoc()) {
    $pickupRows[] = $rp;
}
$pickupJson = json_encode($pickupRows);

$resc = $obo->viewCompletedOrdersAll();
$deliveryRows = array();
while ($rd = $resc->fetch_assoc()) {
    $deliveryRows[] = $rd;
}
$deliveryJson = json_encode($deliveryRows);
?>

<html lang="en">


    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!--     <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
                                <a href="../view/addemployee.php"
                                   class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                    <i class="fas fa-address-card fa-sm text-white-50"></i> Add Employee
                                </a>
                            </div>-->
            <!-- .content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Schedule</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="schedule.php">Schedule</a></li>
                                <li class="active breadcrumb-item">&nbsp; &nbsp;Add Schedule</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="card-body">
                                <form method="post" action="../controller/schedulecontroller.php?status=Add" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Schedule Date <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" id="datepicker"  onChange="load_date(this.value)" >

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Schedule Start Time <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="scheduleID" id="scheduleID" class="form-control" required>
                                                <option value="">Select a Time</option>
                                                <option value="1">9.00-12.00</option>
                                                <option value="2">2.00-5.00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Driver Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="driverID" id="driverID" class="form-control" required>
                                                <option value="">Select a Driver</option>
                                                <?php
                                                while ($rowe = $ree->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $rowe['empID']; ?>">
                                                        <?php echo $rowe['empName']; ?>
                                                    </option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Vehicle Type <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="vehicleTypeID" id="vehicleTypeID" class="form-control" required>
                                                <option value="">Select a Vehicle Type</option>
                                                <?php
                                                while ($rowvt = $revt->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $rowvt['vehicleTypeID']; ?>">
                                                        <?php echo $rowvt['vehicleType']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Vehicle <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="vehicleID" id="vehicleID" class="form-control" required>
                                                <option value="">Select a Vehicle</option>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>PickUp Requests <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="pick" multiple="multiple" id="pick" class="form-control" required>
                                                <?php
                                                //  while ($rowb = $reso->fetch_assoc()) {
                                                ?>
                                                    <!--<option value="<?php //echo $rowb['weborderID'];                                                                                  ?>">-->
                                                <?php //echo $rowb['items'] . " pieces" . $rowb['customerID'];  ?>
                                                </option>
                                                <?php //}
                                                ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Delivery<span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="del" id="del" class="form-control" required multiple="multiple">
                                                <?php
                                                // while ($rowd = $resc->fetch_assoc()) {
                                                ?>
<!--                                                <option value="<?php //echo $rowd['weborderID'];                                      ?>">
                                                <?php //echo $rowd['items'] . " pieces";  ?>
                                                </option>-->
                                                <?php //}
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

                <?php include '../common/include_footer.php'; ?>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../common/include_scripts.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/adminlte.min.js"></script>
    <script src="../plugins/Bootstrap-4-Multi-Select-BsMultiSelect/dist/js/BsMultiSelect.bs4.min.js"></script>
    <script>
                                                function load_date(val)
                                                {


                                                    // window.location = "addschedule.php?dateselected=" + val;
                                                    //header("Location: page2.php?id=".$var);
                                                    // function () {
                                                    //$("#pick").bsMultiSelect();
//                                                        $("#del").bsMultiSelect();
                                                    //$("#pick").select2();
                                                    let pickups =<?php echo $pickupJson; ?>;
                                                    let delivery =<?php echo $deliveryJson; ?>;
                                                    let deliverySelect = $("#del");
                                                    let pickupSelect = $("#pick");
                                                    let dateSelected = val;
                                                    if (dateSelected) {
                                                        pickupSelect.empty();
                                                        $.each(pickups, function (index, item) {
                                                            if (dateSelected === item.pickupDate) {
                                                                var $option = $('<option></option>')
                                                                        .attr('value', item.weborderID)
                                                                        .text(item.items + " pieces  " + item.weborderID + " " + item.city)
                                                                        .prop('selected', true);
                                                                $('#pick').append($option).change();
                                                                //$("#pick").append($("<option></option>").val(item.weborderID).html(item.items + "pieces  " + item.weborderID + " " + item.city));
                                                            }
                                                        });
                                                        deliverySelect.empty();
                                                        $.each(delivery, function (index, item) {
                                                            if (dateSelected === item.deliveryDate) {
                                                                var $option = $('<option></option>')
                                                                        .attr('value', item.weborderID)
                                                                        .text(item.items + " pieces  " + item.weborderID + " " + item.city)
                                                                        .prop('selected', true);
                                                                $('#del').append($option).change();
                                                                //$("#del").append($("<option></option>").val(item.weborderID).html(item.items + "pieces  " + item.weborderID + " " + item.city));
                                                            }
                                                        });
                                                    }
                                                }

                                                //  }

//




                                                $(function ()
                                                {
                                                    $("#datepicker").datepicker({dateFormat: 'yy-mm-dd', minDate: 0}
                                                    );
                                                    let vehicles = <?php echo $vehicleJson; ?>;
                                                    $("#vehicleTypeID").change(
                                                            function () {
                                                                let vehicleSelect = $("#vehicleID");
                                                                let vehicleTypeId = $(this).val();
                                                                if (vehicleTypeId) {
                                                                    vehicleSelect.empty();
                                                                    vehicleSelect.append($("<option></option>").val("").html("Select a Vehicle"));
                                                                    $.each(vehicles, function (index, item) {
                                                                        if (vehicleTypeId == item.vehicleType) {
                                                                            vehicleSelect.append($("<option></option>").val(item.vehicleID).html(item.vehicleNo));
                                                                        }
                                                                    });
                                                                } else {
                                                                    vehicleSelect.empty();
                                                                    vehicleSelect.append($("<option></option>").val("").html("Select a Vehicle"));
                                                                }
                                                            });
                                                }
//
                                                );





    </script>
</body>

</html>