<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../model/schedulemodel.php';
include '../model/ordermodel.php';
include '../model/orderitemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$scheduleID = $_REQUEST['scheduleID'];

$obe = new schedule();
$rese = $obe->viewSchedule($scheduleID);
$rowe = $rese->fetch_array();

$obo = new order();
$reso = $obo->viewPendingOrdersBySchedule($scheduleID);
$resd = $obo->viewDeliveryOrdersBySchedule($scheduleID);

$obi = new orderitem();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">View Schedule </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/schedule.php">Schedule</a></li>
                                <li class="active breadcrumb-item">View Schedule</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Schedule Information :</h5>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Schedule ID : </label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['scheduleID']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Created Date : </label>
                        </div>
                        <div class="col-md-8">
                            <?php echo $rowe['createdDate']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Schedule Date :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['scheduleDate']; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Start Time :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php
                            if ($rowe['startTime'] == 1) {
                                echo "9.00-12.00";
                            } else {
                                echo "2.00-5.00";
                            }
                            ?>
                        </div>
                    </div>




                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Assigned Driver :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['empName']; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <label>Assigned Vehicle :</label>
                        </div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <?php echo $rowe['vehicleNo']; ?>
                        </div>
                    </div>
                    <hr>

                    <h5>Pending Order Information :</h5>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>

                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowo = $reso->fetch_array()) {
                                ?>

                                <tr>
                                    <td>  <?php echo $rowo['orderID']; ?></td>
                                    <td> <?php echo $rowo['name']; ?></td>
                                    <td><?php echo $rowo['address']; ?></td>
                                    <td><?php echo $rowo['city']; ?></td>
                                    <td> <a href="../view/viewitemsummery.php?orderID=<?php echo $rowo['orderID']; ?>&status=View">
                                            <button type="button" class="btn btn-success"> </i> View Items</button></a>

                                        <?php
                                        $orderID = $rowo['orderID'];
                                        $resi = $obi->viewItemsCollected($orderID);
                                        ?>


                                        <!-- Modal -->

                                        <form method="post" enctype="multipart/form-data"  action=" ">
                                            <div class="modal fade" id="modal-<?php echo $rowo['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Items Collected</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <table id="example1" class="table table-bordered table-striped">

                                                                <thead>
                                                                    <tr>

                                                                        <th>Order Item ID</th>
                                                                        <th>Item Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Notes</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    while ($rowi = $resi->fetch_array()) {
                                                                        ?>

                                                                        <tr>
                                                                            <td>  <?php echo $rowi['orderItemID']; ?></td>
                                                                            <td> <?php echo $rowi['itemName']; ?></td>
                                                                            <td><?php echo $rowi['qty']; ?></td>
                                                                            <td><?php echo $rowi['notes']; ?></td>
                                                                        </tr>
                                                                    <?php } ?>


                                                                </tbody>

                                                            </table>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>

                    </table>
                    <hr>

                    <h5>Delivery Order Information :</h5>
                    <br>
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>

                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowd = $resd->fetch_array()) {
                                ?>

                                <tr>
                                    <td>  <?php echo $rowd['orderID']; ?></td>
                                    <td> <?php echo $rowd['name']; ?></td>
                                    <td><?php echo $rowd['address']; ?></td>
                                    <td><?php echo $rowd['city']; ?></td>

                                </tr>
                            <?php } ?>


                        </tbody>

                    </table>

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
<script src="../assets/js/adminlte.min.js"></script>

</body>

</html>