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
                                    <div class="col-sm-2 d-flex align-items-center justify-content-end">
                                        <h5 class="mb-0">Select Date :</h5>
                                    </div>
                                    <div class="col-sm-3">

                                        <input type="text" id="datepicker"  onChange="load_date(this.value)" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
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

                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
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
                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Pick Up</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-3" style="">
                                                <div class="card-body">
<!--                                                    <table>
                                                        <tr>
                                                            <th></th> comment
                                                            <th>Order ID</th> comment
                                                            <th>Closest City</th> comment
                                                            <th>No of Pieces</th> comment
                                                        </tr>-->
                                                    <ul class="list-group">
                                                        <?php while ($rp = $reso->fetch_array()) { ?>
                                                            <li class="list-group-item">
                                                                <?php echo $rp['weborderID']; ?> -  <?php echo $rp['city']; ?> - <?php echo $rp['items']; ?> pieces

                                                            </li>

                                                                                                                                                                                                                                                                                                        <!--                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                        <td><input type="checkbox" value="<?php echo $rp['weborderID']; ?>" name="weborderID[]"></td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['weborderID'];                                                                            ?></td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['city'];                                                                            ?>Piliyandala</td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['items'];                                                                            ?></td>
                                                                                                                                                                                                                                                                                                                                                                    </tr>-->
                                                        <?php } ?>
                                                        <!--                                                    </table>-->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Delivery</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-3" style="">
                                                <div class="card-body">
<!--                                                    <table>
                                                        <tr>
                                                            <th></th> comment
                                                            <th>Order ID</th> comment
                                                            <th>Closest City</th> comment
                                                            <th>No of Pieces</th> comment
                                                        </tr>-->
                                                    <ul class="list-group">
                                                        <?php while ($rc = $resc->fetch_array()) { ?>
                                                            <li class="list-group-item">
                                                                <?php echo $rc['weborderID']; ?> - <?php echo $rc['city']; ?> - <?php //echo $rc['items']; ?>4 pieces

                                                            </li>

                                                                                                                                                                                                                                                                                                        <!--                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                        <td><input type="checkbox" value="<?php //echo $rp['weborderID'];                                                                           ?>" name="weborderID[]"></td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['weborderID'];                                                                            ?></td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['city'];                                                                            ?>Piliyandala</td>
                                                                                                                                                                                                                                                                                                                                                                        <td><?php //echo $rp['items'];                                                                            ?></td>
                                                                                                                                                                                                                                                                                                                                                                    </tr>-->
                                                        <?php } ?>
                                                        <!--                                                    </table>-->
                                                    </ul>
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
</body>

</html>