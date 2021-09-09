<?php
include 'cart.php';
include 'connection.php';
include 'function1.php';

if ($_POST['type'] == 'register') {
    $error=0;

    if (empty($_POST['email'])) {
              $error++;
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['fname'])) {
        
        $error++;
    } else {
        $firstname = $_POST['fname'];
    }
    if (empty($_POST['lname'])) {
               $error++;
    } else {
        $lastname = $_POST['lname'];
    }
    if (empty($_POST['number'])) {
        
        $error++;
    } else {
        $number = $_POST['number'];
    }
    if (empty($_POST['psw'])) {
                $error++;
    }
    else{

        $password1=$_POST['password'];
    }
    if($error==0)
    {

        if ($conn->connect_error) {
            die("connnction cannnot be established");
        } else {
            $password1 = md5($password1);
            $sql = "INSERT INTO user_login(Email,FirstName,LastName,Contact_Number,password)values('$email','$firstname','$lastname','$number','$password1')";
            if ($conn->query($sql) == True) {
                
                
                
            } 
            else {
                echo "Error" . $sql . "<br>" . $conn->error;
            }
        }
    }
    } 
    
    else if ($_POST['type'] == "login") {
    
    $username1 = $_POST['username'];
    $password1 = $_POST['password'];

    if ($conn->connect_error) {
        die("connnction cannnot be established");
    }
     else {

        $password1 = md5($password1);
        $sql1 = "SELECT * FROM user_login where Email='$username1' and password='$password1'";
        $result = $conn->query($sql1);



        $check = mysqli_num_rows($result);

        if ($result->num_rows > 0) 
        {
            $row = $result->fetch_assoc();

            if (strcmp($password1, $row['password']) == 0) 
            {
            
                $_SESSION['USER_LOGIN'] ='yes';
                $_SESSION['USER_NAME'] = $row['Email'];
                $_SESSION['USER_ID'] = $row['id'];
            
              

            }
            else 
            {

                echo "Login Unsucessfull";
            }

        }
        else 
        {
            echo " Enter valid credentials.";
        }
    }
    $conn->close();
}









?>