
<?php
include '../common/include_head.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
//include '../../apps/common/session.php';
include '../../apps/common/dbconnection.php'; //To get connection string
include '../../apps/model/categorymodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$obj = new category; //To create an object using employee class
$result = $obj->viewAllCategory();
?>
<link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel = "stylesheet" id = "bootstrap-css">
<script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="assets/css/carousel.css" rel = "stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


<body class="hold-transition sidebar-mini layout-fixed">


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php include '../common/include_topbar.php'; ?>

                </div>
                <div class="row mb-2">

                    <div class="row">
                        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                            <div class="MultiCarousel-inner">
                                <?php
                                while ($row = $result->fetch_array()) {
                                    ?>

                                    <a href = "items.php?categoryID=<?php echo $row['categoryID']; ?>" >
                                        <div class = "item">
                                            <div class = "pad15">
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['categoryImage']); ?>"  class = "img-fluid mx-auto d-block"/>

                                                <p><?php echo $row['categoryName']; ?> </p>


                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                                ?>
                            </div>

                            <button class = "btn btn-primary leftLst"><</button>
                            <button class = "btn btn-primary rightLst">></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content" >
            <div class="container-fluid" id="cont">

            </div>
        </section>
    </div>
</div>
<script src="../assets/js/carousel.js"></script>
