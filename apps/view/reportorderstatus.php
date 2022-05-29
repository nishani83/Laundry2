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
                            <h1 class="m-0 text-dark"> Order Status</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4">
                        <li class="nav-item">
                            <a class="nav-link" href="reportorder.php">
                                <i class="fa fa-table"></i> &nbsp;Order Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">
                                <i class="fa fa-chart-pie"></i> &nbsp; Order Status
                            </a>
                        </li>
                    </ul>
                    <div class="year-select d-flex align-center justify-content-end mb-3">
                        <?php 
                          if(isset($_POST['selectedYear']) && isset($_POST['selectedMonth'])){
                            $s_year = $_POST['selectedYear'];
                            $s_month = date("F", strtotime($_POST['selectedMonth']));
                            $month_num = date("m", strtotime($_POST['selectedMonth']));
                          }else{
                            $s_year = date('Y');
                            $s_month = date('F');
                            $month_num = date('m');
                          }
                        ?>
                        <form action="" id="ym_search" method="POST" class="d-flex align-center justify-content-end">
                          <div class="form-group mb-0">
                            <label for="" class="mb-0">Month</label>
                            <input type="text" id="datepicker1" name="selectedMonth" value="<?php echo $s_month;?>" class="mr-4">
                          </div>
                          <div class="form-group mb-0">
                            <label for="" class="mb-0">Year</label>
                            <input type="text" id="datepicker2" name="selectedYear" value="<?php echo $s_year;?>" class="mr-5">
                          </div>
                        </form>
                        <button id="print" class="print-btn-style mr-3">PRINT</button>
                    </div>
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card">
                                    <h3 class="mt-3 ml-3">Order Status of the Month - <?php echo $s_month;?> | Year <?php echo $s_year;?></h3>
                                    <div class="card-body">
                                        <?php
                                        $result1 = $obj->getAvailabilityofOrder($s_year, $month_num);
                                        $row1 = $result1->fetch_assoc();
                                        if($row1['count'] > 0){ ?>
                                        <div class="chart-area">
                                          <canvas id="myChart1"></canvas>
                                        </div>
                                        <?php }else{ ?>
                                          <div class="text-center">
                                            <h3>No Result Found</h3>
                                          </div>
                                        <?php }?>
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
<!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a> -->

<?php include '../common/include_scripts.php'; ?>


<?php 
$co = 0;
$chartValues = 0;

$status_array = array('pending', 'topickup', 'cancel', 'ondelivery', 'completed');
foreach ($status_array as $order_status) {

  $result = $obj->orderStatusCount($month_num, $s_year, $order_status);
  $row = $result->fetch_assoc();

  if($co==0){
    $chartValues = "'".$row['statuscount']."'";
  }else{
    $chartValues .= ",'".$row['statuscount']."'";
  }
  
  $co++;

}

?>


<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['pending', 'topickup', 'cancel', 'ondelivery', 'completed'],
            datasets: [{
                    label: 'order (%)',
                    data: [<?php echo $chartValues; ?>],
                    backgroundColor: [
                        '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                    ],

                    hoverOffset: 4
                }]
        },

        options: {
            maintainAspectRatio: 1,
            tooltips: {

                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {

                            let datasets = ctx.chart.data.datasets;

                            if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                                let sum = 0;
                                datasets.map(dataset => {
                                    sum += dataset.data[ctx.dataIndex];
                                });
                                let percentage = Math.round((value / sum) * 100) + '%';
                                return percentage;
                            } else {
                                return percentage;
                            }
                        },
                        color: '#fff',
                    }
                }
            },
            legend: {
                display: true
            },
            cutoutPercentage: 30,

        }


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
  $("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
  });

  $("#datepicker1").datepicker({
    format: "M",
    viewMode: "months", 
    minViewMode: "months"
  });

  $("#datepicker1").on("change",function(){
    $('form#ym_search').submit();
  });

  $("#datepicker2").on("change",function(){
    $('form#ym_search').submit();
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
