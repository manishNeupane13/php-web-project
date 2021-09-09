<?php
include "header.php";
// require "cart.php";


if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}

?>
<title>Check out</title>
<script>
    function delete_val(id, type) {

        var quantity = jQuery("#qty").val();


        jQuery.ajax({
            url: "manage_cart.php",
            type: "post",
            data: 'id=' + id + "&type=" + type + "&quantity=" + quantity,
            success: function(result) {
                if (type == 'delete') {
                    window.location.href = window.location.href;

                }
                jQuery(".htc__qua").html(result);
                console.log('id=' + id + "&type=" + type + "&quantity=" + quantity)
            }

        });
    }

    function user_registration(type) {


        var fname = jQuery("#fname").val();
        var lname = jQuery("#lname").val();
        var email = jQuery("#emailaddress").val();
        var phone = jQuery("#number").val();
        var password = jQuery("#psw").val();
        jQuery.ajax({
            url: "loginfunction.php",
            type: "post",
            data: 'type=' + type + '&fname=' + fname + '&lname=' + lname + '&email=' + email + "&number=" + phone + "&password=" + password,
            success: function(result) {

                alert(result);
                window.location.href = window.location.href;
            }



        });

    }

    function user_login(type) {
        var username = jQuery("#username").val();
        var password = jQuery("#pswd").val();
        jQuery.ajax({
            url: "loginfunction.php",
            type: "post",
            data: 'type=' + type + '&username=' + username + "&password=" + password,
            success: function(result) {
                jQuery(".require").html(result);
                alert(result);
                window.location.href = window.location.href;
            }



        });

    }
</script>

<?php
$cart_total = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $product_array = get_product_details($conn, $key);
    $product_price = $product_array[0]['Selling_price'];
    $product_quantity = $val['qty'];
    $cart_total += ($product_price * $product_quantity);
}

if (isset($_SESSION['USER_LOGIN']) && isset($_POST['submit'])) {
    prx($_POST);
    $user_id = $_SESSION['USER_ID'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $payment_type = $_POST['payment_type'];
    if ($payment_type == 'COD') {
        $payment_status = "cash on delivery";
    } else {
        $payment_status = "Online payment";
    }
    $order_status = "1";
    $added_on = date("Y-m-d h:i:s");



    $sql = "INSERT INTO order_table(user_id,address, city, pincode, total_price,payment_type,payment_status, order_status,added_on) 
        VALUES ($user_id,'$address','$city','$pincode','$cart_total','$payment_type','$payment_status','$order_status','$added_on')";
    echo $sql;
    mysqli_query($conn, $sql);


    //get latest id from the data base

    $orderid = mysqli_insert_id($conn);
    foreach ($_SESSION['cart'] as $key => $val) {
        $product_array = get_product_details($conn, $key);
        $product_price = $product_array[0]['Selling_price'];
        $product_quantity = $val['qty'];
        $order_detail_sql = "INSERT INTO order_detail(order_id,product_id,quantity,price) 
        VALUES ('$orderid','$key','$product_quantity','$product_price')";
        mysqli_query($conn, $order_detail_sql);
    }
    unset($_SESSION['cart']);
?>
    <script>
        window.location.href = "thank_you.php";
    </script>
<?php





}


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
                            <span class="breadcrumb-item active">Check Out </span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">

                            <?php if (!isset($_SESSION['USER_LOGIN'])) {
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="#">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="email" id="username">
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" id="pswd">
                                                        </div>
                                                        <p class="require"></p>
                                                        <div class="dark-btn">
                                                            <a href="javascript:void(0)" onclick=" user_login('login') ">LogIn</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="col-md-6">
                                                <div class="checkout-method__login">

                                                    <h5 class="checkout-method__title">Register</h5>
                                                    <div class="single-input">
                                                        <label for="user-email">First Name</label>
                                                        <input type="text" id="fname" required>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-email">Last Name</label>
                                                        <input type="text" id="lname" required>
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="user-email">Email Address</label>
                                                        <input type="email" id="emailaddress" required>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-pass">contact Number</label>
                                                        <input type="text" id="number" required>
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="user-pass">Password</label>
                                                        <input type="password" id="psw" required>
                                                    </div>
                                                    <div class="dark-btn">
                                                        <a href="javascript:void(0)" onclick=" user_registration('register') ">Register</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="accordion__title">
                                Address Information
                            </div>
                            <form method="post">


                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Street Address" name="address">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="City/State" name="city" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" placeholder="Post/code/zip" name="pincode">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="accordion__hide">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            Cash On Delivery&nbsp;&nbsp;<input type="radio" name="payment_type" value="COD">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Online payment&nbsp;&nbsp;<input type="radio" name="payment_type" value="pay_online">

                                        </div>
                                        <br>

                                        <div class="single-method">
                                            <input type="submit" name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {

                            $product_array = get_product_details($conn, $key);
                            $product_name = $product_array[0]['product_name'];
                            $product_old_price = $product_array[0]['Buying_price'];
                            $product_price = $product_array[0]['Selling_price'];
                            $product_image = $product_array[0]['images'];
                            $product_quantity = $val['qty'];
                            $cart_total += ($product_price * $product_quantity);

                        ?>
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="<?php echo $product_image ?>" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="#"><?php echo $product_name ?></a>
                                    <span class="price"><?php echo ($product_price * $product_quantity) ?></span>
                                </div>
                                <div class="single-item__remove">
                                    <a href="javascript:void(0)" onclick="delete_val('<?php echo $product_array['0']['id'] ?>','delete')"><i class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>sub total</h5>
                                <span class="price"><?php echo $cart_total ?></span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Delivery Charge</h5>
                                <span class="price"><?php echo $delivery_cost = 70 ?></span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Order total</h5>
                            <span class="price"><?php echo ($cart_total + $delivery_cost) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    include 'footer.php';
    ?>