 <!DOCTYPE html>

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
             height: 650px;

         }

         label {
             font-weight: bolder;
             text-align: left;
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
         }

         #imgup {
             border: none;
         }

         .btncont {
             text-align: center;

         }

         .signup {
             background-color: green;
             padding: 15px;
             width: min-content;
             font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
             text-align: center;
             font-size: 14px;
             color: white;


         }

         .signup:hover {
             opacity: 0.8;
         }



         a {
             text-decoration: none;
         }
     </style>

 </head>

 <body>
     <?php
        require 'menubar.php';
        require 'connection.php';

        //variable declerations to inset datainside the database
        $categoryname = '';
        $categorystatus = 0;

        // data inserted or not message variable
        $insertmessage = '';

        //category valriable
        $categoryname = '';
        //executing edit button 
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $id = $_GET['id'];
            $edit_sql = "SELECT * FROM categories where id ='$id'";
            $result = $conn->query($edit_sql);

            // if someone try change id from url then redirecting it to display page
            $check = mysqli_num_rows($result);
            if ($check > 0) {
                $row = $result->fetch_assoc();
                $categoryname = $row['caterogry_name'];
                $status = $row['status'];
            } else {
                //redirecting to dispaly page
                header('location:manage_category.php');
                die();
            }
        }

        $existmsg = '';
        if (isset($_POST['addcate'])) {
            $categoryname = $_POST['cname'];
            $categorystatus = $_POST['status'];
            if ($conn->connect_error) {
                die("Connection failed.");
            } else {

                $sql = "SELECT * FROM categories where caterogry_name ='$categoryname'";
                $result = $conn->query($sql);
                $check1 = mysqli_num_rows($result);

                if ($check1 > 0) {
                    $existmsg = "Already exist ";
                } else {
                    if (isset($_GET['id']) && $_GET['id'] !='') {
                        $update_sql = "UPDATE categories set caterogry_name='$categoryname' , status=$categorystatus where id='$id'";
                        $conn->query($update_sql);
                    } else {
                        $insert_sql = "INSERT INTO categories(caterogry_name,status) values('$categoryname',$categorystatus)";
                        if ($conn->query($insert_sql) == true) {
                            $insertmessage = "  ' !!! New Record inserted !!! ' ";
                        } else {
                            $insertmessage = "Error " . $insert_sql . "<br>" . $conn->error;
                        }
                    }
                }
        ?>
             <script>
                 window.location.href = 'manage_category.php';
             </script>
     <?php
             }
            die();
        }





        ?>
     <form method="POST" action="add_category.php">

         <h1 class="catetxt"> Category Form </h1>
         <br><br>
         <div class="CategName">
             <label for="catlabel">Category Name</label>
             <br><br>
             <input type="text " size='100' name="cname" value="<?php echo $categoryname ?>" required>


         </div>
         <div class="CategName">
             <label for="catlabel">Category Status</label>
             <br><br>
             <input type="number" min='0' max='1' size='100' name="status" value="<?php echo $status ?>" required>


         </div>

         <br><br>
         <div class="btncont">
             <input type="submit" value="Add Category" name="addcate" class="signup"></button>
             <h1><?php echo $existmsg;
                    echo $insertmessage;  ?></h1>

             <br><br>
         </div>
     </form>
     <?php
        require "footer.php";
        ?>

 </body>

 </html>