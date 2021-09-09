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
        <h1> User Information </h1>

    </div>

    <form>


        <?php

        require 'connection.php';
       


        $serial_num = 0;
        if ($conn->connect_error) {
            die("connection failed.");
        } else {
            $sql =  "SELECT * from user_login order by id asc";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>  
                    <td>".$row['id'] . "</td>
                    <td>" .$row['FirstName'] . "</td>
                    <td>" . $row['LastName'] ."</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Contact_Number'] . "</td>
                    </tr>";
                }
            }
        }

        ?>

    </form>
</body>

</html>