<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/vehiclemodel.php'; //To call vehicle model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new vehicle; //To create an object using vehicle class
$result = $obj->viewAllVehicle(); //To get all vehicles info
//To get the module name by using page name
$url = $_SERVER['PHP_SELF']; //To get current page
$arrurl = explode("/", $url);
//sort($arrurl);
$ac = count($arrurl);
$page_name = $arrurl[$ac - 1];
$marr = explode(".", $page_name);
$module_name = ucfirst($marr[0]); //To get module name
?>

<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />


    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('vehicle');
          tab.className+=" active ";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Vehicle Management</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item active"> <a href="../view/addvehicle.php"
                                                                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-address-card fa-sm text-white-50"></i> Add Vehicle
                                    </a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Vehicle No</th>
                                    <th>Vehicle Type</th>

                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    //To check the status
                                    if (strtolower($row['status']) == "active") {
                                        $label = "Deactive";
                                        $class = "btn btn-danger";
                                        $iclass = "glyphicon glyphicon-remove";
                                    } else {
                                        $label = "Active";
                                        $class = "btn btn-info";
                                        $iclass = "glyphicon glyphicon-ok";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['vehicleID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['vehicleNo']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['vehicleType']; ?>
                                        </td>

                                        <td>
                                            <?php echo $row['status']; ?>
                                        </td>

                                        <td>
                                            <a href="../view/viewvehicle.php?vehicleID=<?php echo $row['vehicleID']; ?>&status=View" class="btn btn-success">View</a>
                                            <a href="../view/updatevehicle.php?vehicleID=<?php echo $row['vehicleID']; ?>&status=Update" class="btn btn-primary">Update</a>

                                            <a href="../controller/vehiclecontroller.php?
                                               vehicleID=<?php echo $row['vehicleID']; ?>&status=<?php echo $label; ?>" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')">
                                                   <?php echo $label; ?>
                                            </a>
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

    </div>

    <?php include '../common/include_footer.php'; ?>

</div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>

<!-- Page level plugins -->
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
   function confMessage(str) {
       var r = confirm("Do you want to " + str + " this vehicle?");
       if (!r) {
           return false;
       }
   }
</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
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
