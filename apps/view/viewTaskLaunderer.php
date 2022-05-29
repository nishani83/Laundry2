<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call common vehicle model
include '../model/taskmodel.php';
include '../model/orderitemmodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$taskID = $_REQUEST['taskID'];

$obe = new task();
$rese = $obe->viewTask($taskID);
$rowe = $rese->fetch_array();
$orderID = $rowe['orderID'];
$obo = new orderitem();
$res = $obo->viewItemsForLaunderer($orderID);
?>
<html>

    <?php include '../common/include_head.php'; ?>
    <link href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar_launderer.php'; ?>

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
                            <h1 class="m-0 text-dark">View Task </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href=a href="../view/dashboardLaunderer.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../view/LaundererTask.php">Task</a></li>
                                <li class="active breadcrumb-item">View Task</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div>
                <section class="content">
                    <div class="card shadow mb-4">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Task ID : </label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['taskID']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Task Name :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['taskName']; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Order ID :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['orderID']; ?>
                                </div><!-- comment -->
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Due Date :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['dueDate']; ?>
                                </div>
                            </div>




                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>Item ID</th>

                                                <th>Item Name</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Service </th><!-- comment -->
                                                <th>Form </th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            while ($row = $res->fetch_array()) {
                                                $count++;
                                                ?>
                                                <tr>


                                                    <td>
                                                        <?php echo $row['orderItemID']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['itemName']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['description']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $row['qty']; ?>

                                                    </td>

                                                    <td>
                                                        <?php echo $row['serviceType']; ?>

                                                    </td><!-- comment -->
                                                    <td>
                                                        <?php echo $row['form']; ?>

                                                    </td>
                                                    <td>   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $row['orderItemID']; ?>">
                                                            Completed
                                                        </button>




                                                        <!-- Modal -->
                                                        <?php $status = "completed" ?>
                                                        <form method="post" enctype="multipart/form-data"  action="../controller/orderitemcontroller.php?orderItemID=<?php echo $row['orderItemID']; ?>& status=<?php echo $status; ?>&taskID=<?php echo $taskID; ?>  ">
                                                            <div class="modal fade" id="modal-<?php echo $row['orderItemID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Note</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <input type="text" name="notes" id="notes" placeholder="Add any sepcial notes" class="form-control"/>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>

                                                </tr>





                                                <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
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
<script src="../assets/js/adminlte.min.js"></script>
</body>

</html>
