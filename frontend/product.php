<?php
require 'header.php';

$product_id = $_GET['id'];

if ($product_id > 0) {

    $get_product = get_product_details($conn, $product_id);
} else {
?>
    <script>
        window.location.href = 'index.php'
    </script>
<?php
}


?>
<script>
    function get_val(id, type) {
        quantity = jQuery("#qty").val();
        jQuery.ajax({
            url: "manage_cart.php",
            type: "post",
            data: "id=" + id + "&quantity=" + quantity + "&type=" + type,
            success: function(result) {
                jQuery(".htc__qua").html(result);
                alert(result);
            }



        });

    }
</script>
<title>Product List</title>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <a class="breadcrumb-item" href="category.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['caterogry_name'] ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"> <?php echo $get_product['0']['product_name'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="htc__product__details bg__white ptb--100">
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <?php
                                    foreach ($get_product as $list) {
                                        echo "<img src='" . $list['images'] . "' alt='product images'height='220px' width='220'<br>";

                                    ?>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?php echo $list['product_name'] ?></h2>
                        <ul class="pro__prize">
                            <li class="old__prize" style="text-decoration:line-through;"> <?php echo $list['Buying_price'] ?></li>
                            <br>
                            <li><?php echo $list['Selling_price'] ?></li>
                            <br>
                        </ul>
                        <p class="pro__info">
                            <?php echo $list['Description'] ?>
                        </p>
                        <div class="ht__pro__desc">

                            <div class="sin__desc">
                                <?php
                                        if ($list['Quantity'] > 0) {
                                            $availability_detail = 'In Stock';
                                        } else {
                                            $availability_detail = "Not In Stock";
                                        }



                                ?>
                                <p><span>Availability:</span> <?php echo $availability_detail ?></p>
                            </div>
                            <br>

                            <div class="sin__desc">
                                <p><span> Quantity: </span>
                                    <br>
                                    <select id="qty">
                                        <?php
                                        $i = 0;
                                        for ($i = 1; $i <= $list['Quantity']; $i++) {
                                        ?>
                                            <option>
                                                <?php echo $i ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </p>
                            </div>

                            <div class="sin__desc align--left">
                                <p><span>Categories:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a href="category.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['caterogry_name'] ?></a></li>
                                </ul>
                            </div>
                            <br>
                            <div class="cr__btn">
                                <a href="javascript:void(0)" onclick="get_val('<?php echo $get_product['0']['id'] ?>','add')">Add To Cart </a>
                            </div>


                        </div>
                    </div>
                <?php
                                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <h4 class="ht__pro__title">Description</h4>
                            <p>Formfitting clothing is all about a sweet spot.
                                That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euis
                            </p>

                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed </p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>




<!-- <script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/main.js"></script> -->
<?php
require 'footer.php';
?>