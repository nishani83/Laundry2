<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$empID = $_REQUEST['empID'];

//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info

$obe = new employee();
$rese = $obe->viewAEmployee($empID);
$rowe = $rese->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>
        <script type="text/javascript">
          var tab = document.getElementById('order');
          tab.className+=" active";
        </script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Cancelling Order </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/storeOrder.php">Store Order</a></li>
                                <li class="active breadcrumb-item">Cancel an Order</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="../controller/employeecontroller.php?status=Update&empID=<?php echo $empID; ?>" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Refund Amount <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="number" required="" name="refundAmount"  placeholder="Amount" class="form-control" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Reason For Cancel <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea name="cancelReason" id="cancelReason" class="form-control" placeholder="Enter the Reason" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-success">Proceed</button>
                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
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
