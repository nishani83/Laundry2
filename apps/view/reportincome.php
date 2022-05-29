<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
//include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/ordermodel.php'; //To call order model
//
$ob = new dbconnection();
$con = $ob->connection();
$obj = new order; //To create an object using order class
//$result = $obj->viewAllBinAllocation(); //To get all bins info
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>

    <body id="page-top">


        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>

        <script type="text/javascript">
          var tab = document.getElementById('reportincome');
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
                            <h1 class="m-0 text-dark"> Income Report</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">
                                <i class="fa fa-chart-pie"></i> &nbsp; Each Month Income
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reportcustomerIncome.php">
                                <i class="fa fa-table"></i> &nbsp;Earnings from Customers
                            </a>
                        </li>
                    </ul>
                    <div class="year-select d-flex align-center justify-content-end mr-5 mb-4">
                        <?php 
                          if(isset($_POST['selectedYear'])){
                            $s_year = $_POST['selectedYear'];
                          }else{
                            $s_year = date('Y');
                          }
                        ?>
                        <label class="mb-0 mr-2">Year</label>
                        <form action="" id="yearSelect" method="POST">
                          <input type="text" id="datepicker" name="selectedYear" value="<?php echo $s_year;?>" class="mr-5">
                        </form>

                        <button id="print" class="print-btn-style">PRINT</button>

                    </div>
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-md-9" id="print-content">
                                <div class="card">
                                    <h3 class="mt-3 ml-3">Monthly Income - Year <?php echo $s_year;?></h3>
                                    <div class="card-body">
                                        <?php 
                                        $result1 = $obj->getAvailabilityIncomeOfMonth($s_year);
                                        $row1 = $result1->fetch_assoc();
                                        if($row1['count'] > 0){ ?>
                                          <canvas id="myChart" width="400" height="400"></canvas>
                                        <?php }else{ ?> 
                                          <div class="text-center my-5">
                                              <h4>No Result Found.</h4>
                                          </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<?php 

if(isset($_POST['selectedYear'])){
  $selected_year = $_POST['selectedYear'];
}else{
  $selected_year = date('Y');
}

$chartValues = '0';
$totalAmount = 0;
$year = $selected_year;

for($i=1; $i<=12; $i++){

  $totalAmount = 0;
  $month = $i;

  $result = $obj->getIncomeOfMonth($year, $month);
  while ($row = $result->fetch_array()) {
    $totalAmount = $totalAmount + $row['amount'];
  }

  if($i==1){
    $chartValues = "'".$totalAmount."'";
  }else{
    $chartValues .= ",'".$totalAmount."'";
  }
  
}

?>

<!-- chart  -->
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June' ,'July', 'Aug', 'Sep','Oct', 'Nov', 'Dec'],
            datasets: [{
                    label: 'Income',
                    data: [<?php echo $chartValues; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(249, 105, 14, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
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
<!-- datepicker  -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../plugins/datepicker/bootstrap-datepicker.css"/>


<script>
  // date picker 
  $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
  });

  // form submit 
  $("#datepicker").on("change",function(){
    $('form#yearSelect').submit();
  });

  // print 
  $('#print').click(function(){
    $('#print').hide();
    $('.main-footer').hide();
    $('.card').removeClass('shadow');
    window.print();
    $('#print').show();
    $('.main-footer').show();
  });
</script>


</body>

</html>
