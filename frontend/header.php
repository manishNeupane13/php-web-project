<?php

require 'connection.php';
require 'function1.php';
require 'cart.php';



$category_sql = "SELECT * from categories where status=1 order by caterogry_name asc";
$category_array = array();


$result = $conn->query($category_sql);

while ($row = mysqli_fetch_assoc($result)) {
    $category_array[] = $row;
}

$obj = new add_to_cart();

$totalproduct = $obj->totalproduct();


?>
<!DOCTYPE HTML>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" text="text/css" href="header.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" text="text/css" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>




    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logoecom.PNG" alt="logo images" height='120px' width='150px'></a>
                                </div>
                            </div>
                            <form action="search.php" method="GET">
                            <div class="search">
                                <ul class=searchbar>
                                    <li>
                                             <input type="text" placeholder="search entire store here ..............." name="search" style="font-size: 14px;">
                                            &emsp;<button type="submit"><i class="fa fa-search" style="padding: 6px;;"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php
                                        foreach ($category_array as $list) {
                                        ?>
                                            <li><a href="category.php?id=<?php echo $list['id'] ?>">
                                                    <?php
                                                    echo $list['caterogry_name']
                                                    ?>
                                                </a></li>
                                        <?php
                                        } ?>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
                                            foreach ($category_array as $list) {
                                            ?>
                                                <li><a href="category.php?id=<?php echo $list['id'] ?>">
                                                        <?php
                                                        echo $list['caterogry_name']
                                                        ?>
                                                    </a></li>
                                            <?php
                                            } ?>


                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">

                                    <div class="header__account">
                                        <?php

                                        if (isset($_SESSION['USER_LOGIN'])) {
                                            echo '<a href="logout.php">
                                        <i class="icon-user icons"></i> logout </a>';;
                                        } else {
                                            echo '<a href="signin.php">
                                       <i class="icon-user icons">
                                            </i>login</a>';
                                        }
                                        ?>

                                    </div>
                                    <div class="header__account">
                                        <?php

                                        
                                         echo '<a href="myorder.php">My Order </a>';;
                                     
                                        ?>

                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="displaycart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="displaycart.php"><span class="htc__qua"><?php echo $totalproduct; ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="mobile-menu-area"></div>
                </div>
            </div>

        </header>