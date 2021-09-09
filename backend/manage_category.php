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

        .addcate {
            text-decoration: none;
            color: grey;
            font-size: large;
            font-family: 'Courier New', Courier, monospace;
            border: 1px solid tan;
            padding: 5px;

        }

        .addcate:hover {
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

<body>
    <?php
    require 'menubar.php';
    ?>


    <div class="header">
        <h1> Category Addition Form </h1>
        <a href="add_category.php" class='addcate'>
            Add Category
        </a>

    </div>

    <form>


        <?php

        $id = $category_name = $status = '';
        require 'connection.php';
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
                $update_sql = "UPDATE categories set status='$status' where id='$id'";
                $conn->query($update_sql);
            }

            if ($type == 'delete') {
                $id = $_GET['id'];
                $delete_sql = "DELETE FROM categories where id='$id'";
                $conn->query($delete_sql);
            }
            
        }



        $serial_num = 0;
        if ($conn->connect_error) {
            die("connection failed.");
        } else {
            $sql = "SELECT * from categories order by caterogry_name asc";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>S.N</th>
                <th>ID</th>
                <th>Category Name</th>
                <th >Status</th>
                <th></th>
                </tr>
                
                ";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr> 
                    <td>" . ($serial_num += 1) . "</td>
                    <td>" . $id = $row['id'] . "</td> 
                    <td>" . $category_name = $row['caterogry_name'] . "</td>
                    <td>";
                    if ($row['status'] == 1) {
                        echo "<span class ='activebtn' > <a href='?type=status&operation=deactive&id=" . $row['id'] . "'> Active </a></span>";
                    } else {

                        echo "<span class ='deactivebtn' ><a href='?type=status&operation=active&id=" . $row['id'] . "' > Deactive </a> </span>";
                    }

                    echo "</td>
                    <td> 
                    <a href='?type=delete&id=" . $row['id'] . "' id='delete'> Delete </a>  &nbsp;                    
                    <a href='add_category.php?id=" . $row['id'] . "' id='edit'> Edit &nbsp; </a> 
                    </td>
                    </tr>";
                }
            }
        }

        ?>

    </form>





</body>


</html>