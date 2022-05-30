<!DOCTYPE html>
<?php
include '../common/session.php';
include '../model/schedulemodel.php'; //To call schedule model

include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$obj = new schedule; //To create an object using schedule class
$result = $obj->viewAllPickUp(); //To get all schedules info
$resultc = $obj->todayPickupCountByCity(); //To get all schedules info
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../DataTables/SearchBuilder-1.0.1/css/searchBuilder.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/Buttons-1.7.0/css/buttons.dataTables.min.css">

    <?php include '../common/include_topbar.php'; ?>
    <!-- Main Sidebar Container -->
    <?php include '../common/include_sidebar.php'; ?>
    <script type="text/javascript">
        var tab = document.getElementById('viewAllPickUpDelivery');
        tab.className += " active ";
        var tab = document.getElementById('scheduleMenu');
        tab.className += " menu-open";
        var tab = document.getElementById('scheduleM');
        tab.className += " active";
    </script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- /.content-header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="h3 mb-0 text-gray-800"> Today's Pick up & Delivery</h1>
                    </div>

                    <div class="card shadow col-12">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">Pick up Requests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="viewAllDelivery.php">Completed Delivery</a>
                                </li>
                            </ul>
                            <div class="row g-3 mb-4 justify-content-center">

                            </div>



                            <div class='text-center mb-4'>
                                <?php while ($rowc = $resultc->fetch_array()) { ?>

                                    <?php
                                    if ($rowc['city'] == 'Piliyandala') {
                                        echo '<button type="button" class="btn btn-primary">';
                                        echo ' Piliyandala <span class="badge bg-secondary bg-gradient-secondary">';
                                        echo $rowc['count'];
                                        echo ' </span>';
                                        echo ' </button>';
                                    }
                                    if ($rowc['city'] == 'Bokundara') {
                                        echo '<button type="button" class="btn btn-danger">';
                                        echo ' Bokundara <span class="badge bg-secondary bg-gradient-danger">';
                                        echo $rowc['count'];
                                        echo ' </span>';
                                        echo ' </button>';
                                    }
                                    if ($rowc['city'] == 'Maharagama') {
                                        echo '<button type="button" class="btn btn-warning">';
                                        echo ' Maharagama <span class="badge bg-secondary bg-gradient-warning">';
                                        echo $rowc['count'];
                                        echo ' </span>';
                                        echo ' </button>';
                                    }
                                    if ($rowc['city'] == 'Boralesgamuwa') {
                                        echo '<button type="button" class="btn btn-success">';
                                        echo 'Boralesgamuwa <span class="badge bg-secondary bg-gradient-success">';
                                        echo $rowc['count'];
                                        echo ' </span>';
                                        echo ' </button>';
                                    }
                                    ?>

                                <?php } ?>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Schedule ID</th>
                                            <th>Order ID</th>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Nearest City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <?php echo $row['scheduleID']; ?>
                                                </td>

                                                <td> <?php echo $row['orderID']; ?>

                                                </td>

                                                <td> <?php echo $row['customerID']; ?>

                                                </td>

                                                </td>

                                                <td> <?php echo $row['name']; ?>

                                                </td>

                                                <td> <?php echo $row['city']; ?>

                                                </td>

                                            </tr>




                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>
    <?php include '../common/include_footer.php'; ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../common/include_scripts.php'; ?>

    <!-- Page level plugins -->
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="../DataTables/SearchBuilder-1.0.1/js/dataTables.searchBuilder.min.js"></script>
    <script src="../DataTables/SearchBuilder-1.0.1/js/searchBuilder.bootstrap4.min.js"></script>
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
