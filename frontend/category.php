<?php
require 'header.php';
require 'connection.php';
// require 'function1.php';
$category_id = $_GET['id'];
$sort_order='';
if (isset($_GET['sort']))
{
    $sort=$_GET['sort'];
    if($sort=='price_high')
    {
        $sort_order= " order by product.Selling_price asc";
    }
    if ($sort == 'price_low') {
        $sort_order = " order by product.Selling_price desc";
    }
    if ($sort == 'new') {
        $sort_order = " order by product.id desc";
    }
    if ($sort == 'old') {
        $sort_order = " order by product.id asc";
    }

}
if ($category_id > 0) {

    $get_product = get_product1($conn, $category_id,$sort_order);
} else {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}

?>

<head>

    <title>Product List</title>
</head>
<script>
    function sort_product(category_id) {
        var sort_product_id = jQuery("#sort_product_id").val();
        window.location.href = "http://localhost/project/frontend/category.php?id="+category_id+"&sort="+sort_product_id;
    



    }
</script>
<div class="ht__bradcaump__area" style="background: rgba(120, 120, 120, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $get_product['0']['caterogry_name'] ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select" onchange="sort_product(<?php echo $category_id ?>)" id="sort_product_id">
                                <option>Default softing</option>
                                <option value="price_low">Sort by price high to low</option>
                                <option value="price_high">Sort by price low to high rating</option>
                                <option value="new">Sort by new first</option>
                                <option value="old">Sort by old first</option>
                            </select>
                        </div>
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>

                    </div>
                    <br><br><br><br><br>
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">

                                <?php

                                foreach ($get_product as $list) {
                                ?>
                                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                        <div class="category">
                                            <div class="ht__cat__thumb">
                                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                                    <?php
                                                    echo "<img src='" . $list['images'] . "' alt='product images'height='250' width='150' <br><br>";
                                                    ?>

                                                </a>
                                            </div>
                                            <div class="fr__hover__info">
                                                <ul class="product__action">
                                                    <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                    <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                    <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="fr__product__inner">
                                                <h4><a href="product-details.html"><?php echo $list['product_name'] ?></a></h4>
                                                <br>
                                                <ul class="fr__pro__prize">
                                                    <li class="old__prize" style="text-decoration:line-through ;text-decoration-style:solid; text-decoration-color:black;"><?php echo $list['Buying_price'] ?></li>
                                                    <br>
                                                    <li><?php echo $list['Selling_price'] ?></li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>




                        </div>
                        <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__product__leftsidebar">

                                <div class="htc__recent__product">
                                    <h2 class="title__line--4">best seller</h2>
                                    <div class="htc__recent__product__inner">

                                        <div class="htc__best__product">
                                            <div class="htc__best__pro__thumb">
                                                <a href="product-details.html">
                                                    <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                                </a>
                                            </div>
                                            <div class="htc__best__product__details">
                                                <h2><a href="product-details.html">Product Title Here</a></h2>
                                                <ul class="rating">
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                    <li class="old"><i class="icon-star icons"></i></li>
                                                </ul>
                                                <ul class="pro__prize">
                                                    <li class="old__prize">$82.5</li>
                                                    <li>$75.2</li>
                                                </ul>
                                            </div>
                                        </div>

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


<?php
require 'footer.php';

?>