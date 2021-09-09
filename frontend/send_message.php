<?php

require 'connection.php';
require 'function1.php';

prx($_POST);



$name =$_POST["name"];

$mobile =$_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];
$added_on = date('Y-m-d h:i:s');
$sql = "INSERT INTO contact_us(name,email,mobile,comment,added_on)values('$name','$mobile','$email','$message','$added_on')";

// mysqli_query($conn,$sql);
if ($conn->query($sql) == true) {
    $insertmessage = "  ' !!! New Record inserted !!! ' ";
    echo "<br>".$insertmessage;
} else {
    $insertmessage = "Error " . $sql . "<br>" . $conn->error;
    
}


?>