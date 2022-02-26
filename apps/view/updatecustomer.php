<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$customerID = $_REQUEST['customerID'];

//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info

$obe = new customer();
$rese = $obe->viewCustomer($customerID);
$rowe = $rese->fetch_array();
?>
<html>

    <?php include '../common/include_head.php'; ?>
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
                            <h1 class="m-0 text-dark">Update Customer </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/customer.php">Employee</a></li>
                                <li class="active breadcrumb-item">Update Customer</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Main content -->
            <section class="content">

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="../controller/customercontroller.php?status=Update&customerID=<?php echo $customerID; ?>" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Name <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" required="" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $rowe['name']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea name="address" id="address" class="form-control" placeholder="Address" ><?php echo $rowe['address']; ?></textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Contact No <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" required="" name="contactNo" id="contactNo" placeholder="Contact No" class="form-control" value="<?php echo $rowe['contactNo']; ?>" />
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-success">Save</button>
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

</body>

</html>