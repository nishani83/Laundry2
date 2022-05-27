<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../model/ordermodel.php';
include '../model/orderitemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$weborderID = $_REQUEST['weborderID'];
//
$obe = new order();
$rese = $obe->viewWebOrder($weborderID);
$person = $user_info['empID'];
$obo = new orderitem();
$reso = $obo->viewItemsByOrder($weborderID);
// $rowe = $rese->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
            var tab = document.getElementById('order');
            tab.className += " active ";
            var tab = document.getElementById('ordersMenu');
            tab.className += "menu-open ";
            var tab = document.getElementById('webOrder');
            tab.className += " active";
        </script>

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
                            <h1 class="m-0 text-dark">View Order Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/webOrder.php">Web Orders</a></li>
                                <li class="active breadcrumb-item">View Order Details</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <?php
            while ($row = $rese->fetch_array()) {
                ?>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Customer/Delivery Information :</h5>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Customer Name : </label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['name']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Customer ID: </label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php echo $row['customerID']; ?>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>City : </label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['city']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Address : </label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php echo $row['address']; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Pickup Date : </label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['pickupDate']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Pickup Time : </label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php
                                if ($row['pickupTime'] == 1) {
                                    echo "9.00-12.00";
                                } else
                                    echo "2.00-5.00";
                                ?>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Contact No :</label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['contactNo']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Provide a Refund :</label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $row['orderID']; ?>">Refund Receipt</button>
                                <?php $status = "pending" ?>
                                <form method="post" enctype="multipart/form-data"  action="../controller/refundcontroller.php?orderID=<?php echo $row['orderID'] ?>& status = <?php echo $status; ?>& person = <?php echo $person; ?> ">
                                    <div class="modal fade" id="modal-<?php echo $row['orderID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Refund Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <input type="text" name="amount" id="amount" placeholder="Amount to Refund" class="form-control"/>
                                                    <input type="text" name="reason" id="amount" placeholder="Reason for Refund" class="form-control"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <hr>

                        <h5>Order Information :</h5>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Order ID :</label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['weborderID']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Order date :</label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php echo $row['orderDate']; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Amount :</label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['amount']; ?>
                            </div>
                            <!--                            <div class="col-md-2 col-sm-6 col-xs-12">
                                                            <label>Discount :</label>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                            Rs.60
                                                        </div>-->
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Assigned Launderer :</label>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <?php echo $row['empName']; ?>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Order Status :</label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <?php echo $row['orderStatus']; ?>
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($rowo = $reso->fetch_array()) {
                                    ?>

                                    <tr>
                                        <td>  <?php echo $rowo['orderItemID']; ?></td>
                                        <td> <?php echo $rowo['itemName']; ?></td>
                                        <td><?php echo $rowo['description']; ?></td>
                                        <td><?php echo $rowo['status']; ?></td>
                                        <td><?php echo $rowo['serviceType']; ?></td>
                                    </tr>
                                <?php } ?>


                            </tbody>

                        </table>

                    </div>
                </div>                                        <?php } ?>
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
