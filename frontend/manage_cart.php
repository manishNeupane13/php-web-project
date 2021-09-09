<?php
include "connection.php";
include "cart.php";


$id=$_POST['id'];
$quantity=$_POST['quantity'];

$obj= new add_to_cart();
if ($_POST['type']=='add')
{
    $obj->addproduct($id,$quantity);

}
if ($_POST['type']=='delete')
{
    $obj->removeproduct($id);
}
if ($_POST['type']=='update')
{
    $obj->updateproduct($id,$quantity);
}
echo $obj->totalproduct();


?>