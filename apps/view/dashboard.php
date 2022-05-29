<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php';
include '../model/ordermodel.php'; //To call order model
include '../model/taskmodel.php'; //To call task model
$obj = new order;
$obj2 = new task; 
$ob = new dbconnection();
$con = $ob->connection();
?>
<html>

    <?php include '../common/include_head.php'; ?>


    <body class="hold-transition sidebar-mini layout-fixed">

        <?php include '../common/include_topbar.php'; ?>
        <!-- Main Sidebar Container -->
        <?php include '../common/include_sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i><i class="fas fa-plus"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pickup Requests</span>
                                    <span class="info-box-number">
                                        10

                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i><i class="fas fa-minus"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Delivery</span>
                                    <span class="info-box-number">4</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Orders</span>
                                    <span class="info-box-number">7</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Sale</span>
                                    <span class="info-box-number">2000</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div  class = "col-sm-8">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">

                                        Alerts and Notifications
                                    </h3>

                                </div>
                                <div class="card-body">
                                    <div  class="callout callout-danger"> Pickup request from customer</div>
                                    <div  class="callout callout-warning"> New user account created</div>
                                    <div  class="callout callout-danger"> Order# OW000010 completed by Sarath Premasiri</div>
                                </div>
                            </div>
                        </div><!-- /.card-header -->
                        <div  class = "col-sm-4">
                            <div class="card bg-gradient-success">


                                <div class="card-body" style="padding:1 !important; ">
                                    <center><div id="datepicker" ></div></center>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->



                    <!-- /.card -->
                    <div class="row">
                        <!-- Left col -->
                        <div  class = "col-sm-6">
                            <!-- solid sales graph -->
                            <div class="card shadow mb-4">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        This Year Income
                                    </h3>


                                </div>

                                <!-- /.card-body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-footer -->

                                <!-- /.card -->
                            </div>
                        </div><!-- comment -->
                        <div  class = "col-sm-6">

                            <div class="card shadow mb-4">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie"></i>
                                        Report by Tasks (This Month)
                                    </h3>


                                </div>

                                <!-- /.card-body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart1"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-footer
                        </div><!-- comment -->
                            </div>
                            <!-- /.card -->

                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Left col -->

        <!-- /.card -->

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include '../common/include_footer.php'; ?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/js/demo.js"></script>
<script>
    $(function () {
        // An array of dates
        var eventDates = {};
        eventDates[ new Date('03/22/2022')] = new Date('03/22/2022');
        eventDates[ new Date('03/10/2022')] = new Date('03/10/2022');

        var deliveryDates = {};
        deliveryDates[ new Date('03/20/2022')] = new Date('03/20/2022');
        deliveryDates[ new Date('03/15/2022')] = new Date('03/15/2022');
        // datepicker
        $('#datepicker').datepicker({
            beforeShowDay: function (date) {
                var highlight = eventDates[date];
                var h = deliveryDates[date];
                if (highlight) {
                    return [true, "event", 'selected'];
                } else if (h) {
                    return [true, "delivery", 'selected'];
                } else {
                    return [true, '', ''];
                }
            }
        });
    });
</script>
</body>

<?php include '../common/include_scripts.php'; ?>
<!-- <script type="text/javascript" src="../assets/js/dashboard.js"></script> -->


<?php 
//  bar chart 
$selected_year = date('Y');
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

// pie chart 
$co = 0;
$chartValues2 = 0;

$month_num = date('m');
$s_year = date('Y');

$status_array = array('todo', 'inprogress', 'completed');
foreach ($status_array as $task_status) {

  $result2 = $obj2->tasksCountMonth($month_num, $s_year, $task_status);
  $row2 = $result2->fetch_assoc();

  if($co==0){
    $chartValues2 = "'".$row2['statuscount']."'";
  }else{
    $chartValues2 .= ",'".$row2['statuscount']."'";
  }
  $co++;
}

?>

<script>
$(document).ready(function () {

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Income',
                data: [<?php echo $chartValues; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
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
    }
});


var ctx = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['todo', 'inprogress', 'completed'],
          datasets: [{
                  label: 'order (%)',
                  data: [<?php echo $chartValues2; ?>],
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

});
</script>

</html>
