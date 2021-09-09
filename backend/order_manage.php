<?php
require 'menubar.php';

?>
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





       
    </style>
</head>



<body>


    <div class="header">
        <h1> Order Form </h1>

    </div>

    <form>


        <?php

        require 'connection.php';
        $id = $category_name = $status = '';
        $productname = $sellprice = $buyprice = $quantity = $description = $metatitle = $imagepath = '';
        $getcategory_sql = "SELECT product.*,categories.caterogry_name  from product,categories  where  product.categories_id=categories.caterogry_name order by product.id asc";
        $resultcate = $conn->query($getcategory_sql);

        if ($conn->connect_error) {
            die("connection failed.");
        } else {
            $sql = "SELECT order_table.* ,order_status.status_name  from order_table,order_status where  order_status.id=order_table.order_status ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>Order_ID</th>
                <th>Order Date</th>
                <th>Address</th>
                <th>Payment Type</th>
                <th>Payment Status</th>
                <th>Order Status</th>
            
               
                </tr>
                
                ";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>  
                    <td>
                    <a class='orderlink' href='order_detail.php?id=" . $row['id'] . "' >"
                        . $order_id = $row['id'] .
                        "</a> </td>
                    <td>" . $order_date = $row['added_on'] . "</td>
                    <td>" . $Address = $row['address'] . "<br>" . $row['city'] . "</td>
                    <td>" . $payment_type = $row['payment_type'] . "</td>
                    <td>" . $payment_status = $row['payment_status'] . "</td>
                    <td>" . $order_status = $row['status_name'] . "</td>
                   
                    <td>";
                }
            }
        }

        ?>

    </form>
</body>

</html>