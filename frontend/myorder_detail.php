<?php

include 'header.php';
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">My Order List</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>


<div class="wishlist-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-remove"><span class="nobr">Product Name</span></th>
                                        <th class="product-name"><span class="nobr">Product Image</span></th>
                                        <th class="product-add-to-cart"><span class="nobr">Quantity</span></th>
                                        <th class="product-price"><span class="nobr">Price </span></th>
                                        <th class="product-price"><span class="nobr">Total price </span></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalprice = 0;
                                    $order_id = $_GET['id'];
                                    $user_id = $_SESSION['USER_ID'];
                                    $get_order_sql =
                                        "SELECT distinct(order_detail.id), order_detail.* ,product.product_name,product.images
                                                FROM order_detail,product,order_table WHERE
                                    order_detail.order_id=$order_id and
                                    order_table.user_id=$user_id and
                                    product.id=order_detail.product_id";


                                    $res = mysqli_query($conn, $get_order_sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $totalprice += $row['quantity'] * $row['price'];
                                    ?>


                                        <tr>

                                            <td class="product-add-to-cart">
                                              
                                                    <?php
                                                    echo $row['product_name'] ?>
                                            
                                            </td>
                                            <td class="product-thumbnail"><img src="<?php echo $row['images'] ?>" alt="product-image" height="220px" width="220px"></td>
                                            <td class="product-name"><?php echo $row['quantity']; ?></td>
                                            <td class="product-price"><span class="amount"><?php echo ($row['price']) ?></span></td>
                                            <td class="product-price"><span class="amount"><?php echo ($row['quantity'] * $row['price']) ?></span></td>
                                        </tr>

                                    <?php
                                    }

                                    ?>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class="product-name">Grand Total</td>
                                        <td class="product-price"><span class="amount"><?php echo ($totalprice) ?></span></td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>