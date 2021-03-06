<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php'; //To call employee model
include '../model/vehiclemodel.php'; //To call vehicle model
include '../model/ordermodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee; //To create an object using employee class

$date = $_GET['dateselected'];
//$status = "view";

$result = $obj->viewAvailableDrivers($date); //To get all employees info

$obv = new vehicle; //To create an object using vehicle class
$resv = $obv->viewAllActiveVehicle(); //To get all vehicles info

$obo = new order;
$reso = $obo->viewPendingOrders($date);
$resc = $obo->viewCompletedOrders($date);
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />


    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
            var tab = document.getElementById('schedsuleplan');
            tab.className += " active ";
            var tab = document.getElementById('scheduleMenu');
            tab.className += " menu-open";
            var tab = document.getElementById('scheduleM');
            tab.className += " active";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Begin Page Content -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Schedule Planner</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <section class="content">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="contentdiv">

                            <div class="container-fluid">
                                <div class="row g-3 mb-4 justify-content-left">
                                    <div class="col-sm-5 d-flex align-items-center justify-content-end">
                                        <h5 class="mb-0">Select Date :</h5>
                                    </div>
                                    <div class="col-sm-6">

                                        <input type="text" id="datepicker"  onChange="load_date(this.value)" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card shadow mb-6">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Drivers</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-1" style="">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <?php
//                                                        $cdate = strtotime(dateAsString);
//                                                        $currentdate = date('Y-m-d', $cdate);

                                                        while ($row = $result->fetch_array()) {
                                                            ?>
                                                            <li class="list-group-item">
                                                                <?php
//                                                                if ($row['leaveDate'] != $currentdate)

                                                                echo $row['empName'];
                                                                ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card shadow mb-6">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Vehicles</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-2" style="">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <?php while ($rv = $resv->fetch_array()) { ?>
                                                            <li class="list-group-item">
                                                                <?php echo $rv['vehicleNo']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- comment -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card shadow mb-6">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Pick Up</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-3" style="">
                                                <div class="card-body">
                                                    <table id="example1" class="table table-bordered">
                                                        <tr>
                                                            <th class="table-secondary"></th>
                                                            <th class="table-secondary">Order ID</th>
                                                            <th class="table-secondary">Closest City</th>
                                                            <th class="table-secondary">No of Items</th>
                                                        </tr>
                                                        <tbody>
                                                            <?php while ($rp = $reso->fetch_array()) { ?>
                                                                <tr>

                                                                    <td><input type="checkbox" value="" name="id[]"></td>
                                                                    <td>  <?php echo $rp['weborderID']; ?></td>
                                                                    <td>  <?php echo $rp['city']; ?></td>
                                                                    <td>  <?php echo $rp['items']; ?></td>


                                                                </tr>
                                                            <?php } ?>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td><strong>Total</strong></td><td><strong>4</strong></td>

                                                            </tr>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="card shadow mb-6">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Delivery</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-3" style="">
                                                <div class="card-body">
                                                    <table id="example1" class="table table-bordered ">
                                                        <tr>
                                                            <th rowspan='2' class="table-secondary"> </th>
                                                            <th rowspan='2' class="table-secondary">Order ID</th>
                                                            <th rowspan='2' class="table-secondary">Closest City</th>
                                                            <th colspan='2' class="table-secondary">No of Items</th>
                                                        </tr>
                                                        <tr>

                                                            <th class="table-secondary">Hang</th>
                                                            <th class="table-secondary">Fold</th>
                                                        </tr>
                                                        <tbody>
                                                            <?php while ($rc = $resc->fetch_array()) { ?>
                                                                <tr>

                                                                    <td><input type="checkbox" value="" name="id[]"></td>
                                                                    <td>  <?php echo $rc['weborderID']; ?></td>
                                                                    <td>  <?php echo $rc['city']; ?></td>
                                                                    <td>  <?php echo $rc['items']; ?></td>

                                                                    <td>  5</td>
                                                                </tr>
                                                            <?php } ?>

                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>  <strong>Total</strong></td><td>  <strong>1</strong></td><td>  <strong>5</strong></td></strong>

                                                            </tr>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.container-fluid -->



        <?php include '../common/include_footer.php'; ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <!-- Page level plugins -->
        <!--<script src="../DataTables/datatables.min.js"></script>

        <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>-->


        <script >

                                            $(function () {
                                                $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});
                                            });

                                            function load_date(val)
                                            {
                                                //alert(val)

                                                window.location = "scheduleplan.php?dateselected=" + val;
                                                //header("Location: page2.php?id=".$var);
                                            }

                                            $(document).ready(function () {
                                                $('#example').DataTable();
                                            });
        </script>

    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>

<script src="../plugins/jquery/jquery.min.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/js/demo.js"></script>
</body>

</html>
