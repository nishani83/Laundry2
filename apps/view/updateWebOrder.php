<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

// $orderID = $_REQUEST['orderID'];

//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info

// $obe = new order();
// $rese = $obe->viewAOrder($orderID);
// $rowe = $rese->fetch_array();
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
                            <h1 class="m-0 text-dark">Update Order </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboard.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/webOrder.php">Web Orders</a></li>
                                <li class="active breadcrumb-item">Update Order Details</li>
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
                                    <label>Assign Launderer <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <select class="form-control" name="">
                                    <option value="">Select an Employee</option>
                                    <option value="">Sarath Premasiri</option>
                                    <option value="">Kamal Vithana</option>
                                  </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Return Date <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="date"  name="hireDate" id="hireDate" placeholder="Hire Date" class="form-control" value="<?php echo $rowe['hireDate']; ?>" />
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
                <br>

                <div class="card shadow mb-4">
                    <div class="card-body">
                      <div style="width:80%">
                        <label>Update the collected Order Item List <span>*</span></label>
                        <form method="post" action="../controller/employeecontroller.php?status=Update&empID=<?php echo $empID; ?>" enctype="multipart/form-data">
                          <table id="example1" class="table table-bordered table-striped">

                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Item</th>
                                      <th>Availability</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Blouse</td>
                                    <td> <input type="checkbox" name="available" value=""> &nbsp Collected </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>Abaya</td>
                                    <td> <input type="checkbox" name="available" value=""> &nbsp Collected </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Saree</td>
                                    <td> <input type="checkbox" name="available" value=""> &nbsp Collected </td>
                                </tr>
                              </tbody>
                          </table>
                          <div class="row mb-3">
                              <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:right;">
                                  <button type="submit" class="btn btn-warning">Update</button>
                                  <button type="reset" class="btn btn-outline-secondary">Clear</button>
                              </div>
                          </div>
                        </form>
                    </div> </div>
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
