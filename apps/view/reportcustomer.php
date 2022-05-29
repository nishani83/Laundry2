<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/customermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer; //To create an object using customer class
$result = $obj->reportCustomer() //To get all customers info
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
        <script type="text/javascript">
          var tab = document.getElementById('reportcustomer');
          tab.className+=" active";
          var tab = document.getElementById('reportMenu');
          tab.className+=" menu-open";
          var tab = document.getElementById('report');
          tab.className+=" active";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Web Customer Report</h1>
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
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>customer ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <!-- <th>Loyalty Points</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['customerID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['contactNo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['status']; ?>
                                        </td>
                                        <!-- <td>
                                            <?php echo $row['loyaltyPoints']; ?>
                                        </td> -->
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


<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>  

<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/js/demo.js"></script>

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
