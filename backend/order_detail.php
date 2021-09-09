<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Manage Order
    </title>
    <style>
        form {
            background-color: white;
            box-sizing: border-box;
            margin-left: 341px;
            height: 531px;
            overflow: scroll;
        }

        table {

            border-collapse: collapse;
            width: 100%
        }

        th {
            background-color: gainsboro;
        }

        th,
        td {

            border-bottom: 1.5px solid tan;
            padding: 10px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 18px;
            text-align: center;


        }

        .header {
            border: 1.5px solid whitesmoke;
            background-color: whitesmoke;
            margin: 1% 0% 2% 360px;
            ;
            padding: 10px 22px;
            font-family: 'Courier New', Courier, monospace
        }

        .addproduct {
            text-decoration: none;
            color: grey;
            font-size: large;
            font-family: 'Courier New', Courier, monospace;
            border: 1px solid tan;
            padding: 5px;

        }

        .addproduct:hover {
            background-color: tomato;
            color: whitesmoke;
        }

        td a#delete {
            text-decoration: none;
            color: white;
            background-color: #c94030;
            border: 2px ridge #85ccc0;
            padding: 4px;
            text-align: center;

        }

        td a#delete:hover {
            background-color: red;
        }

        td a#edit {
            background-color: #1c806f;
            border: 2px ridge #85ccc0;
            text-decoration: none;
            color: white;
            padding: 4px;
            text-align: center;

        }

        td a#edit:hover {
            background-color: #7be3e1;
        }

        .activebtn a {
            text-decoration: none;
            color: white;
            background-color: green;
            border: 2px ridge green;
            padding: 4px;
            text-align: center;
        }

        .deactivebtn a {
            text-decoration: none;
            background-color: red;
            color: white;
            border: 2px ridge green;
            padding: 4px;
            text-align: center;
        }
    </style>
</head>

<?php
require 'menubar.php';
?>

<body>


    <div class="header">
        <h1> Order Form </h1>

    </div>
    <div>

        
        <form>
            
            
            <?php

require 'connection.php';
$id = $category_name = $status = '';
$productname = $sellprice = $buyprice = $quantity = $description = $metatitle = $imagepath = '';
$getcategory_sql = "SELECT product.*,categories.caterogry_name  from product,categories  where  product.categories_id=categories.caterogry_name order by product.id asc";
$resultcate = $conn->query($getcategory_sql);

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = $_GET['type'];
    
    if ($type == 'status') {
        $operation = $_GET['operation'];
                $id = $_GET['id'];
                if ($operation == 'active') {
                    $status = '1';
                } else {
                    $status = '0';
                }
                $update_sql = "UPDATE product set status='$status' where id='$id'";
                $conn->query($update_sql);
            }
            
            if ($type == 'delete') {
                $id = $_GET['id'];
                $delete_sql = "DELETE FROM product where id='$id'";
                $conn->query($delete_sql);
            }
        }
        
        
        $serial_num = 0;
        if ($conn->connect_error) {
            die("connection failed.");
        } else {
            $order_id = $_GET['id'];
            $total_price = 0;
            $sql = "SELECT distinct(order_detail.id), order_detail.*
                    ,product.product_name,product.images,
                    order_table.address,order_table.city,order_table.pincode,order_table.order_status
                    FROM order_detail,product,order_table  WHERE 
                    order_table.id=$order_id and order_detail.order_id=$order_id
                    and product.id=order_detail.product_id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Product Name</th>
    <th>Product Image</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total Price</th>
    </tr>
    
    ";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>  
        <td>"
        . $order_id = $row['product_name'] .
        " </td>
        <td> <img src='" . $order_date = $row['images'] . "' alt='product image' width=220px height=150px ></td>
        <td>" . $Address = $row['quantity'] . "</td>
        <td>" . $payment_type = $row['price'] . "</td>
        <td>" . $row['price'] * $row['quantity'] . "</td>";
        
        $order_status=$row['order_status'];
        $total_price += $row['price'] * $row['quantity'];
        $address = $row['address'];
        $city = $row['city'];
        $pincode = $row['pincode'];
    }
    echo
    "<tr><td colspan=3 ></td>
    <td>Grand Total</td>
    <td>" . $total_price . "<td></tr>";
    
}
    $order_status_str=mysqli_fetch_assoc(mysqli_query($conn,"SELECT status_name from order_status where id=$order_status"));
    echo" 
    <tr>
    <th colspan=2 style='border-right:1px solid black'> Address </th>
    <th colspan=3 >
    <Address>".$address." , ".$city." , ".$pincode. "</address>
    </th>
    </tr>
    <tr>
    <th colspan=2 style='border-right:1px solid black'>
    Order Status 
    </th>
    <th colspan=3 >
    ".$order_status_str['status_name']."
    </th>
    </tr>";

}

?>
        
        
    </div>
    
</form>
</div>
</body>

</html>