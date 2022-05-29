<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */




error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string

include '../model/orderitemmodel.php';
$ob = new dbconnection();
$con = $ob->connection();
$obj = new orderitem; //To create an object using employee class

$orderID = $_REQUEST['orderID'];

$result = $obj->viewItemsByOrderInSchedule($orderID);
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />


    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar_driver.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Begin Page Content -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Items in the Order</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <section class="content">

                <div class="card shadow mb-6">
                    <!-- Card Header - Accordion -->

                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapse-3" style="">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <tr>

                                    <th class="table-secondary">Order Item ID</th>
                                    <th class="table-secondary">Item Name</th>
                                    <th class="table-secondary">Description</th>
                                    <th class="table-secondary">Quantity</th><!-- comment -->
                                    <th class="table-secondary">Actions<th>
                                </tr>
                                <tbody>
                                    <?php while ($row = $result->fetch_array()) { ?>
                                        <tr>


                                            <td>  <?php echo $row['orderItemID']; ?></td>
                                            <td>  <?php echo $row['itemName']; ?></td>
                                            <td>  <?php echo $row['Description']; ?></td>
                                            <td>  <?php echo $row['qty']; ?></td><!-- comment -->
                                            <td>   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $row['orderItemID']; ?>">
                                                    Picked Up
                                                </button>




                                                <!-- Modal -->
                                                <?php $status = "pickedup" ?>
                                                <form method="post" enctype="multipart/form-data"  action="../controller/orderitemcontroller.php?orderItemID=<?php echo $row['orderItemID']; ?>& status=<?php echo $status; ?>&orderID=<?php echo $orderID; ?>  ">
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
                                    <?php } ?>


                            </table>


                        </div>
                    </div>
                </div>
        </div>



    </div>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- /.container-fluid -->



<?php include '../common/include_footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- Page level plugins -->
<!--<script src="../DataTables/datatables.min.js"></script>

<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>-->


<script >


</script>

</div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>
</body>

</html>