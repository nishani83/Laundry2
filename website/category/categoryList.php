<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
//include '../../apps/common/session.php';
include '../../apps/common/dbconnection.php'; //To get connection string
include '../../apps/model/categorymodel.php'; //To call employee model
$ob = new dbconnection();
$con = $ob->connection();
$obj = new category; //To create an object using employee class
$result = $obj->viewAllCategory();

//
?>
<link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel = "stylesheet" id = "bootstrap-css">
<script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="assets/css/carousel.css" rel = "stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



<!-- Template Main CSS File -->

<!------ Include the above in your HEAD tag ---------->
<body>





    <div class="row">
        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
                <?php
                while ($row = $result->fetch_array()) {
                    $categoryID = $row['$categoryID'];
                    ?>

                    <a href = "items.php?category=$categoryID" >
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
                <!--                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/trouser.png" class = "img-fluid mx-auto d-block" alt = "img2">
                                        <p>Trousers</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/baby.png" class = "img-fluid mx-auto d-block" alt = "img3">
                                        <p>Baby</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/saree.png" class = "img-fluid mx-auto d-block" alt = "img4">
                                        <p>Saree</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/blanket.png" class = "img-fluid mx-auto d-block" alt = "img5">
                                        <p>Bedding & Linen</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/suit.png" class = "img-fluid mx-auto d-block" alt = "img6">
                                        <p>Suits</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/uniform.png" class = "img-fluid mx-auto d-block" alt = "img7">
                                        <p>School Uniform</p>

                                    </div>
                                </div>
                                <div class = "item">
                                    <div class = "pad15">
                                        <img src = "../images/category/nightdress.png" class = "img-fluid mx-auto d-block" alt = "img8">
                                        <p>Night Wear</p>

                                    </div>
                                </div>

                -->






            </div>
            <button class = "btn btn-primary leftLst"><</button>
            <button class = "btn btn-primary rightLst">></button>
        </div>
    </div>

</body><!--comment-->
<script type = "text/javascript">
    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();

        $(window).resize(function () {
            ResCarouselSize();
        });

//this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);

                if (bodyWidth >= 1200) {
                    incno = itemsSplit[3];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                } else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                } else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


//this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            } else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

//It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });
</script>
<!-- comment -->