<!DOCTYPE html>
<html>

<head>
    <Title>
        Sign up
    </Title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body {
        margin-left: 30%;
        margin-right: 30%;
    }

    form {
        background-color: whitesmoke;
        border: 4px outset grey;
        padding: 20px;
        box-sizing: border-box;

    }

    label {
        font-weight: bolder;
        text-align: left;

    }

    input {
        padding: 12px 20px;
        margin: 8px 0px;
        display: inline-block;
        border: 1px solid purple;
        box-sizing: border-box;
        width: 80%;
        border-radius: 2.5%;
    }

    .btncont {
        text-align: center;
    }

    .signup {
        background-color: green;
        width: 30%;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        padding: 8px 0;
        text-align: center;
        color: white;


    }

    button:hover {
        opacity: 0.8;
    }

    .othersigncont {

        text-align: center;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        background-color: tomato;
        cursor: pointer;
        text-decoration: turquoise;
        opacity: 0.8;
    }

    .othersignopt {
        padding: auto;
        margin-bottom: 2%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        color: black;
    }

    .fb,
    .google {
        padding: 8px 10px;
        margin: 3% 3%;
        border: 1px solid grey;
        border-radius: 8px;


    }

    @media only screen and (max-width:1000px) {
        body {
            margin-left: 2%;
            margin-right: 2%;
        }

        form {
            display: inline-block;
            text-align: center;

        }

        input,
        .signup {
            width: 80%;
        }



    }
</style>

<body>

    <?php
    $email = $firstname = $lastname = $number = $password1 = $confimpwd = "";
    $emailerror = $fnameerr = $lnameerr = $numbererr = $passworderr = $confimpwderr = $passwordmismatch = "";
    $error = 0;
    //getting request 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['email'])) {
            $emailerror = "* required";
            $error++;
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['fname'])) {
            $fnameerr = " * required";
            $error++;
        } else {
            $firstname = $_POST['fname'];
        }
        if (empty($_POST['lname'])) {
            $lnameerr = "* required";
            $error++;
        } else {
            $lastname = $_POST['lname'];
        }
        if (empty($_POST['number'])) {
            $numbererr = "* required";
            $error++;
        } else {
            $number = $_POST['number'];
        }
        if (empty($_POST['psw'])) {
            $passworderr = "* required";
            $error++;
        } else {
            $password1 = $_POST['psw'];

            if (empty($_POST['cpsw'])) {
                $confimpwderr = "confrim your password";
                $error++;
            } else {
                $confimpwd =  $_POST['cpsw'];
                if ($password1 != $confimpwd) {
                    $passwordmismatch = "Both password must match";
                    $error++;
                }
            }
        }
    }

    //creating database
    if ($error==0)
    {
        $server='localhost';
        $username="root";
        $password="";
        $db="e-commmerce";
        $conn=new mysqli($server,$username,$password,$db);
        if($conn->connect_error)
        {
            die("connnction cannnot be established");
        }
        else{
            $password1=md5($password1);
            $sql="INSERT INTO newregistry(Email,FirstName,LastName,Contact_Number,password)values('$email','$firstname','$lastname','$number','$password1')";
            if ($conn->query($sql)==True)
            {
                echo"New record inserted";
            }
            else
            {
                echo "Error".$sql."<br>".$conn->error;
            }
         echo "connection ";
         header('location:signin.php');
        }

    }


    ?>




    <form method="POST" action=<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>>
        <div class="mailcont">
            <label for="email">E-mail </label><br><br>
            <input type="text " placeholder="Valid Email Address" size='100' name='email'>
            <span style="color:red;"><?php echo $emailerror ?></span>

        </div>
        <br><br>
        <div class="fistnamecont">
            <label for="firstname">First Name </label>
            <br><br>
            <input type="text " placeholder="First Name  " size='100' name="fname">
            <span style="color:red;"><?php echo $fnameerr ?></span>

        </div>
        <br><br>
        <div class="lastnamecont">

            <label for="email">Last Name </label>
            <br><br>
            <input type="text " placeholder="Last Name" name="lname" size='100'>
            <span style="color:red;"><?php echo $lnameerr ?></span>
        </div>
        <br><br>
        <div class="contactcont">

            <label for="email">Contact Number </label>
            <br><br>
            <input type="number" placeholder="Phone Number" name="number" size='100'>
            <span style="color:red;"><?php echo $numbererr ?></span>
        </div>
        <br><br>
        <div class="pswcont">
            <label for="email">Password </label>
            <br><br>
            <input type="password" placeholder="New Password" name="psw" size='100'>
            <span style="color:red;"><?php echo $passworderr ?></span>
            <br><br>
            <label for="email">Confirm Password </label>
            <br><br>
            <input type="password" placeholder="Confrim  Password" name="cpsw" size='100'>
            <span style="color:red;"><?php echo $confimpwderr ?></span>
        </div>
        <br><br>
        <div class="btncont">
            <button type="submit" class="signup"> Signup</button>
            <span style="color:red;"><?php echo $passwordmismatch ?></span>

            <br><br>
        </div>
        <br><br>
        <div class="othersigncont">
            <label for="othersign"><span class="othersignopt">
                    ________________Or sign Up Using_______________
                </span>
            </label>
            <br><br>

            <a class="fb" href="https://www.facebook.com/ " alt=" facebook sign up link " title="Signup Using FaceBook">
                <i class="fa fa-facebook"></i>
            </a>
            <a class="google" href="https://accounts.google.com/" alt=" google sign up link " title="Signup Using Google">
                <i class="fa fa-google"></i>

            </a>
            <br><br>

        </div>
    </form>
</body>

</html>