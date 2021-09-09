<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Login
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            margin-left: 30%;
            margin-right: 30%;
            background-color: #0d163b;
            border: 4px outset #0d163b;
            padding: 25px;
            color: white;
            text-align: center;




        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        .loginletter {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            font-style: oblique;

        }


        form input[type=text],
        form input[type=password] {
            font-size: 16px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: none;
            color: white;
            border-bottom: 2px solid purple;
            background-color: #0d163b;
            cursor: pointer;


        }

        ::placeholder {
            color: white;
        }


        .submit,
        .signupcont input {
            background-color: #d982c6;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

        }

        .signupcont {
            border-top: 2px solid black;
        }

        .newaccounttxt {
            color: whitesmoke;
            font-size: 20px;
            font-weight: bolder;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {

            color: pink;
            padding: 10px 18px;
            font-weight: bolder;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-style: normal;
            background-color: #85edcc;


        }

        .avatar {
            border-radius: 50%;
            width: 40%;
        }

        .containermain {
            padding: 16px;
        }

        .btomcontainer {
            padding-bottom: 25px;
        }

        .psw {
            float: right;

        }

        .remember {
            float: left;
        }

        a {
            text-decoration: none;
            color: white;
            font-weight: 600;

        }

        a:hover {
            text-decoration: solid;
            color: tomato;
        }

        @media only screen and (max-width:1000px) {


            form {
                display: block;
                text-align: center;
                margin-left: 3%;
                margin-right: 3%;

            }

            .submit {
                width: 60%;
            }


            .cancelbtn {
                width: 20%;
            }

            .psw {

                float: right;

            }

            .remember {
                float: left;

            }

        }
    </style>

</head>

<body>
    <?php
    $username1 = $usernameerr = $passworderr = $password1 = " ";
    $login_err = " ";
    $error = 0;
    //getting data from html
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
        if (empty($_POST['uname'])) {
            $usernameerr = "Username is required";
            $error++;
        } else {
            $username1 = $_POST['uname'];
        }
        if (empty($_POST['psw'])) {
            $passworderr = "password is required";
            $error++;
        } else {
            $password1 = stripslashes($_POST['psw']);
        }
    }

    //creating database

    if ($error == 0) {
        $server = 'localhost';
        $username = "root";
        $password = "";
        $db = "e-commmerce";
        $conn = new mysqli($server, $username, $password, $db);
        if ($conn->connect_error) {
            die("connnction cannnot be established");
        } else {

            $password1 = md5($password1);
            $sql1 = "SELECT * FROM user_login where Email='$username1' and password='$password1'";
            $result = $conn->query($sql1);



            $check = mysqli_num_rows($result);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (strcmp($password1, $row['password']) == 0) {
                    $_SESSION['USER_LOGIN']='yes';
                    $_SESSION['USER_NAME'] = $row['Email'];
                    $_SESSION['USER_ID'] = $row['id'];

                    

    ?>
                    <script>
                        window.location.href = "index.php";
                    </script>
    <?php
                } 
               
            } 
        }
        $conn->close();
    }




    ?>

    <?php
    if (isset($_POST['startnew'])) {
    ?>
        <script>
            window.location.href = "newregister.php";
        </script>
    <?php
    }
    ?>


    <div class="from">

        <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="imgcontainer">
                <img src="../frontend/images/avatar.png" alt="profile pic " title="display pic" class="avatar">
                <br><br>
                <span class="loginletter">W E L - C O M E</span>
            </div>
            <div class="containermain">
                <!-- <label for="uname"><b>Username</b></label><br><br> -->
                <input type="text" placeholder="&#x1f464;&emsp; Username" name="uname">
                <span style="color: red;"><?php echo $usernameerr ?></span>
                <br><br>
                <!-- <label for="psw"><b>Passowrd</b></label> -->
                <br><br>
                <input type="password" placeholder="&#x1f512;&emsp; Password" name="psw">
                <span style="color:red;"><?php echo $passworderr ?></span>
                <br><br>
               
            </div>


            <div class="btomcontainer">

                <span class="remember"> <input type="checkbox" checked="checked" name="remember" size=10> Remember me
                </span>
                <span class="psw"> <a href="">Forgot password ? </a></span>


                <!-- <button type="button" class="cancelbtn">Cancel </button> -->

            </div>
            <br><br>
            <button type="submit" name="submit" class="submit"> Get Started </button>
            <br><br>


            <!-- <form action="newregister.php" method="POST"> -->

            <div class="signupcont">
                <br><br>
                <span class="newaccounttxt">New Visitor</span>
                <br>
                <br>
                <a href="newregister.php">

                    <button type="submit" name="startnew" class="submit">Start Here</button>
                </a>
                <!-- </form> -->
            </div>

        </form>
    </div>
</body>

</html>
<?php
include 'footer.php'; ?>