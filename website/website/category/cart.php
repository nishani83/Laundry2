
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
<link href="../assets/css/products.css" rel = "stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

<link href="../assets/css/item_carousal.css" rel = "stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<style media="screen">

i:hover{
  cursor: pointer;
}

.item_cats:hover{
  text-decoration: none;
}

.item-image{
  width:200px;
  height:200px;
}

</style>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" >
                    <?php include '../common/include_topbar_cart.php'; ?>
                </div>
                <br> <br> <br>

<!-- start of the carousel -->
                <div class="bbb_viewed" >
                  <div class="bbb_viewed_nav_container">
                      <div class="bbb_viewed_nav bbb_viewed_prev" style="position:absolute;top:20%;left:5%"><i class="fas fa-chevron-left" style="font-size:20px"></i></div>
                      <div class="bbb_viewed_nav bbb_viewed_prev" style="position:absolute;top:20%;right:5%"><i class="fas fa-chevron-right" style="font-size:20px"></i></div>
                  </div>
                    <div class="container" >
                        <div class="row">
                            <div class="col">
                                <div class="bbb_main_container">
                                    <div class="bbb_viewed_slider_container">
                                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                                          <?php
                                          while ($row = $result->fetch_array()) {
                                              ?>
                                              <div class="owl-item"> <a class="item_cats" href="items.php?categoryID=<?php echo $row['categoryID']; ?>">
                                                  <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                      <div class="bbb_viewed_image">
                                                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['categoryImage']); ?>" alt="">
                                                      </div>
                                                      <div class="bbb_viewed_content text-center"> <br>
                                                          <div class="bbb_viewed_price"> <h4 style="color:black"><b> <?php echo $row['categoryName']; ?></b></h4> </div>
                                                      </div>
                                                  </div></a>
                                              </div>
                                            <?php
                                          }
                                        ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- end of the carousel -->
                </div>
            </div>

        <section class="content" style="margin:20px">
            <div class="container-fluid" id="cont">
              <?php
              include '../../apps/model/itemmodel.php';
              $ob = new dbconnection();
              $con = $ob->connection();
              $categoryID = 4;
              $ob = new item();
              $res = $ob->viewItemsByCategory($categoryID);
              $row = $res->fetch_array();
              ?>
                      <?php
                      while ($row = $res->fetch_array()) {
                          ?>

                          <div class="col-md-2 mb-4">

                              <div class="card-sl">
                                  <div class="card-image">
                                      <img class="item-image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['itemImage']); ?>" />
                                  </div>


                                  <div class="card-heading">
                                      <?php echo $row['itemName']; ?>
                                  </div>

                                  <a href="serviceModal.php?itemID=<?php echo $row['itemID']; ?>" class="card-button" > Add</a>

                              </div>
                          </div>
                      <?php } ?>
            </div>
        </section>
    </div>
</div>

  <script type="text/javascript">
  $(document).ready(function () {
      $('.item_cats').on("click", function () {
          event.preventDefault();
  //This will run just fine for files stored within  your own domain
          $("#cont").load(this.getAttribute('href'));

  // Load External pages.
          //    $("#cont").html('<object data="' + this.getAttribute('href') + '" />');
      });
  });
  </script>

  <script src="../assets/js/carousel.js" type="text/javascript"> </script>
