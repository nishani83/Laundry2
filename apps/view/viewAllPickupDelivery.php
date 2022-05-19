<!DOCTYPE html>
<?php
include '../common/session.php';
//include '../model/binmodel.php';

include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

//$cusID = $cusID;
//$obj = new garbagePoints();
//$result = $obj->viewCustomerAddedPoints($cusID);
//$row = $result->fetch_array();
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
      tab.className+=" active ";
      var tab = document.getElementById('scheduleMenu');
      tab.className+=" menu-open";
      var tab = document.getElementById('scheduleM');
      tab.className+=" active";
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
                                    <a class="nav-link active" href="#">Pick up Requests</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Completed Delivery</a>
                                </li>
                            </ul>
                            <div class="row g-3 mb-4 justify-content-center">

                            </div>

                            <div class='text-center mb-4'>
                                <button type="button" class="btn btn-primary">
                                    Piliyandala <span class="badge bg-secondary bg-gradient-secondary">3</span>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    Bokundara <span class="badge bg-secondary bg-gradient-danger">1</span>
                                </button>
                                <button type="button" class="btn btn-warning">
                                    Maharagama <span class="badge bg-secondary bg-gradient-warning">1</span>
                                </button>
                                <button type="button" class="btn btn-success">
                                    Boralesgamuwa <span class="badge bg-secondary bg-gradient-success">0</span>
                                </button>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>OrderID</th>
                                            <th>Order Date</th>
                                            <th>Customer Name</th>
                                            <th>Nearest City</th>
                                            <th>Item Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--                                --><?php
//                                while ($row = $result->fetch_array()) {
//
                                        ?>
                                        <tr>

                                            <td>OW000001
                                                <!--                                            --><?php //echo $row['binType'];                                       ?>

                                            <td>
                                                <!--                                            --><?php //echo $row['points'];                                       ?>
                                                02-04-2022
                                            </td>

                                            <td>
                                                Nimna Perera
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>
                                            <td>
                                                Piliyandala
                                                <!--                                            --><?php //echo $row['addPoints'];                                       ?>
                                            </td>


                                            <td>
                                                5
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <!--                                            --><?php //echo $row['binType'];                                       ?>
                                                OW000002
                                            <td>
                                                <!--                                            --><?php //echo $row['points'];                                       ?>
                                                02-04-2022
                                            </td>

                                            <td>
                                                Chathuri Fernando
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>
                                            <td>
                                                Piliyandala
                                                <!--                                            --><?php //echo $row['addPoints'];                                       ?>
                                            </td>


                                            <td>
                                                7
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>OW000003
                                                <!--                                            --><?php //echo $row['binType'];                                       ?>

                                            <td>
                                                <!--                                            --><?php //echo $row['points'];                                       ?>
                                                03-04-2022
                                            </td>

                                            <td>
                                                Gimhana Perera
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>
                                            <td>
                                                Maharagama
                                                <!--                                            --><?php //echo $row['addPoints'];                                       ?>
                                            </td>


                                            <td>
                                                1
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <!--                                            --><?php //echo $row['binType'];                                       ?>
                                                OW000004
                                            <td>
                                                <!--                                            --><?php //echo $row['points'];                                       ?>
                                                03-04-2022
                                            </td>

                                            <td>
                                                Umesha Walisundara
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>
                                            <td>
                                                Bokundara
                                                <!--                                            --><?php //echo $row['addPoints'];                                       ?>
                                            </td>


                                            <td>
                                                8
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>

                                        </tr>
                                        <tr>

                                            <td>
                                                <!--                                            --><?php //echo $row['binType'];                                       ?>
                                                OW000005
                                            <td>
                                                <!--                                            --><?php //echo $row['points'];                                       ?>
                                                04-04-2022
                                            </td>

                                            <td>
                                                Nikitha Nivedh
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>
                                            <td>
                                                Piliyandala
                                                <!--                                            --><?php //echo $row['addPoints'];                                       ?>
                                            </td>


                                            <td>
                                                4
                                                <!--                                            --><?php //echo $row['addDate'];                                       ?>
                                            </td>

                                        </tr>
                                        <!--                                --><?php //}                                       ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" style="text-align:right">
                                                <strong></strong>
                                            </td>
                                            <td>
                                                <strong></strong>
                                            </td>

                                            <td>
                                                <strong>Total</strong>
                                            </td>
                                            <td> <strong>25</strong></td>
                                        </tr>
                                    </tfoot>
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
</body>

</html>
