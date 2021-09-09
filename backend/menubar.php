<?php
        if (isset($_SESSION['ADMIN_LOGIN'])&& $_SESSION['ADMIN_LOGIN']!='')
        {

        }
        else
        {
            header('location:signin.php');
            die();
        }
        ?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <title>
        Menu bar
    </title>
    <style>
        .logocls {
            border: 2px solid whitesmoke;
            background-color: whitesmoke;
        }

        .welcometxt {
            float: right;
            font-size: 20px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;
            margin-top: 3%;
        }

        .nabar {
            border: 2px solid whitesmoke;
            background-color: whitesmoke;
            width: 350px;
            float: left;
            height: 750px;


        }

        li {

            padding: 20px;
            width: fit-content;
            text-align: center;
            border-left: 1px solid tan;
            border-bottom: 1px solid tan;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: bolder;
            font-size: larger;

        }

        a {
            text-decoration: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
            color: black;


        }

        /* menu styling */
        h3 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            padding-left: 45px;
            text-decoration: underline;
            color: gray;
        }

        li a:hover {
            color: tomato;
        }

        #logout {
            float: right;
        }

        #logout:hover {
            display: block;
            color: red;

        }

        tr td a:hover {
            background-color:aqua;
            color: red;
            opacity: 0.9;
            width: max-content;
        }
    </style>

</head>

<body>



    <div class=logocls>
        <img src="logoecom.PNG" width="350" height="180">
        <span class="welcometxt">

            W E L - C O M E &ensp;&ensp; A D M I N
            <br>
            <br>
            <a href="logout.php" id="logout">
                <img src="logout.png" width="50px" height="50px" title="logout">
            </a>

        </span>



    </div>
    <div class="nabar">
        <br>
        <h3>M e n u</h3>
        <br>
        <ul class="navbar" style="list-style-type: none;">

            <li class="menu-item-has-children dropdown">
                <a href="manage_category.php">Categories Management</a>

            </li>
            <br><br>
            <li class="menu-item-has-children dropdown">
                <a href="manage_product.php">Product Management</a>

            </li>
            <br><br>
            <li class="menu-item-has-children dropdown">
                <a href="user_manage.php">User Management</a>

            </li>
            <br><br>
            <li class="menu-item-has-children dropdown">
                <a href="order_manage.php">Order Management</a>

            </li>
            <br><br>

        </ul>

    </div>


</body>

</html>