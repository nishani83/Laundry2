<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model

include '../model/orderitemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$orderID = $_REQUEST['orderID'];

$obi = new orderitem();
$resi = $obi->viewItemsCollected($orderID);
$resl = $obi->viewItemsLeft($orderID);
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
                            <h1 class="m-0 text-dark">Item Summery</h1>
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
                    <h5>Order ID : <?php echo $orderID; ?></h5><br>
                    <h6>Items Collected</h6>
                    <br>



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
                    <br><!-- comment -->
                    <hr>
                    <h6>Items NOT Collected</h6>
                    <br>


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
                            while ($rowl = $resl->fetch_array()) {
                                ?>

                                <tr>
                                    <td>  <?php echo $rowl['orderItemID']; ?></td>
                                    <td> <?php echo $rowl['itemName']; ?></td>
                                    <td><?php echo $rowl['qty']; ?></td>
                                    <td><?php echo $rowl['notes']; ?></td>

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