<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Manage Category
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

        td a#active {
            color: white;
            background-color: green;
            border: 2px ridge green;
            text-decoration: none;
            padding: 4px;
            text-align: center;
        }

       td a#deactive {
           background-color: red;
           color: white;
           text-decoration: none;
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
        <h1> Product Addition Form </h1>
        <a href="add_product.php" class='addproduct'>
            Add Product
        </a>

    </div>

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
            $sql = "SELECT * from product order by product_name asc";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>S.N</th>
                <th>ID</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Selling Price</th>
                <th>Buying Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Meta Title</th>
                <th>Image Path</th>
                <th >Status</th> 
                 <th colspan=2 > </th>
               
                </tr>
                
                ";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>  
                    <td>" . ($serial_num += 1) . "</td>
                    <td>" . $id = $row['id'] . "</td> 
                    <td>" . $category_name = $row['categories_id'] . "</td>
                    <td>" . $productname = $row['product_name'] . "</td>
                    <td>" . $sellprice = $row['Selling_price'] . "</td>
                    <td>" . $buyprice = $row['Buying_price'] . "</td>
                    <td>" . $quantity = $row['Quantity'] . "</td>
                    <td>" . $description = $row['Description'] . "</td>
                    <td>" . $metatitle = $row['Meta_title'] . "</td>
                    <td> <img src='" . $imagepath = $row['images'] . "' alt='productpics' height='180' width='220'></td>
                    <td>";
                    if ($row['status'] == 1) {
                        echo "
                        <a href='?type=status&operation=deactive&id=" . $row['id'] . "' id='active'> Active </a>&nbsp;
                        ";
                        // <a href='?type=status&operation=deactive&id=" . $row['id'] . "' id='active'>Active</a>
                    } else {

                        echo "
                        <a href='?type=status&operation=active&id=" . $row['id'] . "' id='deactive'> Deactive </a>&nbsp;
                        "; }

                    echo "</td>
                    <td> 
                    <a href='?type=delete&id=" . $row['id'] . "' id='delete'> Delete </a>&nbsp;                    
                    </td>
                    <td>
                    <a href='add_product.php?id=" . $row['id'] . "' id='edit'> Edit </a>&nbsp; 
                    </td>
                    </tr>";
                }
            }
        }

        ?>

    </form>
</body>
</html>