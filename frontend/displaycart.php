<?php

include "header.php";
include "connection.php";
if (($_SESSION['cart'] == null)) {

?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php

}




?>
<script>
    function delete_val(id, type) {
        if (type == 'update') {
            var quantity = jQuery("#" + id + "qty").val();
            console.log(quantity);
        } else {
            var quantity = jQuery("#qty").val();
        }

        jQuery.ajax({
            url: "manage_cart.php",
            type: "post",
            data: 'id=' + id + "&type=" + type + "&quantity=" + quantity,
            success: function(result) {
                if (type == 'update' || type == 'delete') {
                    window.location.href = window.location.href;

                }
                jQuery(".htc__qua").html(result);
                console.log('id=' + id + "&type=" + type + "&quantity=" + quantity)
            }

        });
    }
</script>
<title>Cart List</title>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/banner.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">shopping cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION['cart'] as $key => $val) {
                                    $product_array = get_product_details($conn, $key);
                                    $product_name = $product_array[0]['product_name'];
                                    $product_old_price = $product_array[0]['Buying_price'];
                                    $product_price = $product_array[0]['Selling_price'];
                                    $product_image = $product_array[0]['images'];
                                    $product_quantity = $val['qty'];

                                ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="<?php echo $product_image ?>" alt="product img" /></a></td>
                                        <td class="product-name"><a href="#"><?php echo $product_name ?>y</a>
                                            <ul class="pro__prize">
                                                <li class="old__prize" style="text-decoration:line-through ;text-decoration-style:solid; text-decoration-color:black;"><?php echo $product_old_price ?></li>
                                                <li><?php echo $product_price ?></li>
                                            </ul>
                                        </td>
                                        <td class=" product-price"><span class="amount"><?php echo $product_price ?></span>
                                        </td>
                                        <td class="product-quantity"><input type="number" id="<?php echo $key ?>qty" value="<?php echo $product_quantity ?>" />
                                            <br><br>

                                            <a href=" javascript:void(0)" onclick=" delete_val('<?php echo $product_array['0']['id'] ?>','update')"> <span class="btn btn-warning" >update</span> </a>
                                                    <br>
                                        </td>
                                        <td class="product-subtotal"><?php echo ($product_quantity * $product_price) ?></td>
                                        <td class="product-remove"><a href="javascript:void(0) " onclick="delete_val('<?php echo $product_array['0']['id'] ?>','delete')"><i class="icon-trash icons"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="index.php">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">

                                    <a href="checkout.php">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>