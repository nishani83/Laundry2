<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/ordermodel.php'; //To call customer model
//
$ob = new dbconnection();
$con = $ob->connection();
$obj = new order; //To create an object using customer class
$result = $obj->viewAllOrders() //To get all customers info
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../plugins/SearchBuilder-1.0.1/css/searchBuilder.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/Buttons-1.7.0/css/buttons.dataTables.min.css">

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed" id="page-top">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Web Order Report</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">
                                <i class="fa fa-table"></i> &nbsp; Table view
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportcustomerregistration.php">
                                <i class="fa fa-chart-pie"></i> &nbsp; Chart view
                            </a>
                        </li>
                    </ul>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Amount</th>
                                    <th>Return Date</th>
                                    <th>Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['orderID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['orderDate']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['amount']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['returnDate']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['orderStatus']; ?>
                                        </td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->



        <?php include '../common/include_footer.php'; ?>

    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>

<!-- Page level plugins -->
<script src="../plugins/datatables.min.js"></script>
<script src="../plugins/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/SearchBuilder-1.0.1/js/dataTables.searchBuilder.min.js"></script>
<script src="../plugins/SearchBuilder-1.0.1/js/searchBuilder.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'QBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
</body>

</html>