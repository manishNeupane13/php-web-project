<?php

include 'header.php';
include 'connection.php';
?>
<title>My order</title>
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
                                        <th class="product-remove"><span class="nobr">Order_ID</span></th>
                                        <th class="product-name"><span class="nobr">Order Date</span></th>
                                        <th class="product-add-to-cart"><span class="nobr">Address</span></th>
                                        <th class="product-price"><span class="nobr">Payment Type </span></th>
                                        <th class="product-stock-stauts"><span class="nobr">Payment Status </span></th>
                                        <th class="product-price"><span class="nobr">Order_status </span></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_id = $_SESSION['USER_ID'];
                                    $get_order_sql = "SELECT order_table.* ,order_status.status_name  from order_table,order_status where order_table.user_id=$user_id and order_status.id=order_table.order_status ";



                                    $res = mysqli_query($conn, $get_order_sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>


                                        <tr>

                                            <td class="product-add-to-cart" style="font-size: 22px;">
                                                <a href="myorder_detail.php?id=<?php echo $row['id'] ?>">
                                                    <?php
                                                    echo $row['id'] ?>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail"><?php echo $row['added_on'] ?></td>
                                            <td class="product-name"><?php echo $row['address'];
                                                                        echo "<br>" . $row['city'] ?></td>
                                            <td class="product-price"><span class="amount"><?php echo $row['payment_type'] ?></span></td>
                                            <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['payment_status'] ?></span></td>
                                            <td class="product-stock-status"><span style=" background-color: tomato;border: 2px solid tomato;padding:3.5px;"><?php echo $row['status_name'] ?></span></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>