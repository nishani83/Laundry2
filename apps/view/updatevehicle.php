<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection stringinclude '../model/commonmodel.php'; //To call common vehicle model
include '../model/vehiclemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obj = new vehicle(); //To create an object using vehicle class
$result = $obj->viewVehicleType(); //To get all vehicle type info

$vehicleID = $_REQUEST['vehicleID'];
$obu = new vehicle();
$resultu = $obu->viewVehicle($vehicleID);
$rowu = $resultu->fetch_array();
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

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Edit Vehicle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item active"> <a href="../view/updatevehicle.php"
                                                                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-address-card fa-sm text-white-50"></i> Edit Vehicle
                                    </a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="post" action="../controller/vehiclecontroller.php?status=Update&vehicleID=<?php echo $vehicleID; ?>" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Vehicle No <span>*</span></label>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" required="" name="vehicleNo" id="vehicleNo" placeholder="Vehicle No" class="form-control" value="<?php echo $rowu['vehicleNo'] ?>" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label>Vehicle Type <span>*</span></label>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <select name="vehicleTypeID" required="" id="vehicleTypeID" class="form-control">
                                    <option value=""><?php echo $rowu['vehicleType'] ?></option>
                                    <?php while ($row = $result->fetch_array()) { ?>
                                        <option value="<?php echo $row[0]; ?>">
                                            <?php echo ucwords($row[1]); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <div class="col-md-3 col-sm-6 col-xs-12"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-outline-secondary">Clear</button>
                            </div>
                        </div>
                    </form>
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

</body>

</html>