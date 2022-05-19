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

$result = $obj->viewItemsByOrder($orderID);
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
                                    <th class="table-secondary">Quantity</th>
                                    <th class="table-secondary">Status</th>
                                </tr>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_array()) {

                                        $class = "btn btn-success";
                                        $label = "Collected";
                                        ?>
                                        <tr>

                                            <td>  <?php echo $row['orderItemID']; ?></td>
                                            <td>  <?php echo $row['itemName']; ?></td>
                                            <td>  <?php echo $row['qty']; ?></td>
                                            <td><button type="button" class="<?php echo $class; ?>" onclick="myFunction.call(this)"><?php echo $label; ?></button></td>

                                        </tr>
                                    <?php } ?>


                            </table>
                            <div class="row mb-2"></div>

                            <div class = "row mb-2"> <div class = "col-sm-6">
                                    <button type = "button" class = "btn btn-info"> Confirm</button>
                                </div></div>
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
<!--/.container-fluid-->



<?php include '../common/include_footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<!-- Page level plugins -->
<!--<script src="../DataTables/datatables.min.js"></script>

<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>-->


<script >
                                                function myFunction() {
                                                    this.toggleClass("btn btn-danger");
                                                    this.textContent = 'Not Collected';

                                                }
                                                ;

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