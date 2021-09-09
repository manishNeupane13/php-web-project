<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Add product
    </title>
    <style>
        form {
            background-color: whites;
            padding: 20px;
            box-sizing: border-box;
            margin-left: 351px;
            overflow: scroll;
            height: 650px;




        }

        label {
            font-weight: bolder;
            text-align: left;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 18px;


        }

        input,
        select {
            padding: 12px 20px;
            margin: 8px 0px;
            display: inline-block;
            border: 1px solid purple;
            box-sizing: border-box;
            width: 80%;
            border-radius: 2.5%;
            font-size: 16px;
        }




        #imgup {
            border: none;
        }


        .btncont {
            text-align: center;
        }

        .signup {

            padding: 15px;
            width: min-content;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-align: center;
            font-size: 14px;
            color: white;
            background-color: green;


        }

        button:hover {
            opacity: 0.8;
        }



        a {
            text-decoration: none;
        }
    </style>

</head>

<?php

require 'menubar.php';
require 'connection.php';

//variable declerations
// for showing during update process
$category_name = $productname1 = $sellprice = $buyprice = $quantity1 = $description1 = $metatitle = $imagepath = '';
//variable for adding product 
$categoryname = $productname = $spreice = $bprice = $quantity = $description = $mtitle = '';
$status = 1;



//image saving director name
$_target_dir = '../frontend/imagesdb/';



//executing edit button 
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $edit_sql = "SELECT * FROM product where id ='$id'";
    $result = $conn->query($edit_sql);


    // if someone try change id from url then redirecting it to display page
    $check = mysqli_num_rows($result);

    if ($check > 0) {
        $row = $result->fetch_assoc();
        $category_name = $row['categories_id'];
        $productname1 = $row['product_name'];
        $sellprice = $row['Selling_price'];
        $buyprice = $row['Buying_price'];
        $quantity1 = $row['Quantity'];
        $description1 = $row['Description'];
        $metatitle = $row['Meta_title'];
        $imagepath = $row['images'];
    } else {
        //redirecting to dispaly page
        header('location:manage_category.php');
        die();
    }
}

//action of submit and add data inside the database
if (isset($_POST['addproduct'])) {




    $categoryname = $_POST['category'];
    $productname = $_POST['pname'];
    $spreice = $_POST['sprice'];
    $bpreice = $_POST['bprice'];
    $quantity = $_POST['quantity'];
    $description = $_POST['desc'];
    $mtitle = $_POST['mtitle'];
    $target_file = $_target_dir . basename($_FILES['fileToUpload']['name']);
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    $target_file;

    if ($conn->connect_error) {
        die("Connection failed.");
    } else {

        $sql = "SELECT * FROM product where product_name ='$productname'";
        $result = $conn->query($sql);
        $check1 = mysqli_num_rows($result);

        if ($check1 > 0) {
            $existmsg = "Already exist ";
        } else {


            //updating product after inserting
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $update_sql = "UPDATE product set categories_id='$categoryname', product_name='$productname', Selling_price='$spreice', Buying_price='$bpreice', Quantity='$quantity', Description='$description', Meta_title='$mtitle', images='$target_file'where id='$id'";
                $result = $conn->query($update_sql);
            } else {

                $insert_sql = "INSERT INTO product(categories_id, product_name, Selling_price, Buying_price, Quantity, Description, Meta_title, images,status)
                  values('$categoryname','$productname','$spreice','$bpreice','$quantity','$description','$mtitle','$target_file',$status)";


                if ($conn->query($insert_sql) == true) {
                    $insertmessage = "  ' !!! New Record inserted !!! ' ";
                 ?>
                    <script>
                        window.location.href = 'manage_product.php';
                    </script>
                   <?php
                } else {
                    $insertmessage = "Error " . $insert_sql . "<br>" . $conn->error;
                }
            }
        }
    }
}

//getting categorylist for updating as default

$getcategory_sql = "SELECT id , caterogry_name from categories order by id asc ";
$result = $conn->query($getcategory_sql);


?>

<body>
    <form method="POST" enctype="multipart/form-data" action=<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>>
        <div class='producttxt'>
            <h1>
                Product Form
            </h1>
        </div>
        <div class="category">
            <label for="cat">Categories </label><br><br>
            <select id="category" name="category" placeholder="<?php echo $category_name ?>">
                <option>Select Categories</option>
                <?php while ($row = $result->fetch_assoc()) {

                    if ($row['id'] == $category_name) {
                        echo "<option value=" . $row['id'] . " >" . $row['caterogry_name'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id'] . ">" . $row['caterogry_name'] . "</option>";
                    }
                }

                ?>

            </select>


        </div>
        <br><br>
        <div class="productname">
            <label for="product_name">Product Name</label>
            <br><br>
            <input type="text " size='100' name="pname" value="<?php echo $productname1 ?>" required>


        </div>
        <br><br>
        <div class="sellprice">

            <label for="sprice">Selling Price </label>
            <br><br>
            <input type="number" min='1' name="sprice" size='100' value="<?php echo $sellprice ?>" required>

        </div>
        <br><br>
        <div class="bprice">

            <label for="bprice">Buying Price</label>
            <br><br>
            <input type="number" min='1' name="bprice" size='100' value="<?php echo $buyprice ?>" required>

        </div>
        <br><br>
        <div class="quantityclass">
            <label for="quan">Quanity</label>
            <br><br>
            <input type="text" name="quantity" size='100' value="<?php echo $quantity1 ?>" required>
        </div>
        <div class="descont">
            <br><br>
            <label for="deslabel">Description </label>
            <br><br>
            <input type="text" name="desc" size='100' value="<?php echo $description1 ?>" required>

        </div>
        <div class="metacont">
            <br><br>
            <label for="metalabel">Meta Titile </label>
            <br><br>
            <input type="text" name="mtitle" value="<?php echo $metatitle ?>" size='100' required>

        </div>
        <div class="imgcont">
            <br><br>
            <label for="imglabel">Image Upload </label>
            <br><br>
            <input type="file" id="imgup" name='fileToUpload' value="<?php echo $imagepath ?>" required>

        </div>
        <br><br>
        <div class="btncont">
            <input type="submit" name="addproduct" value="Add Product" class="signup"></button>
            <br><br>
        </div>
    </form>

    <?php
    require 'footer.php';
    ?>

</body>

</html>