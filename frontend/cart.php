<?php
session_start();
include "connection.php";





class add_to_cart
{

    function addproduct($id, $quantity)
    {
        
        
        $_SESSION['cart'][$id]['qty'] = $quantity;
    }
    function updateproduct($id, $quantity)
    {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['qty'] = $quantity;
        }
    }
    function removeproduct($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }
    function emptyproduct()
    {
        unset($_SESSION['cart']);
    }

    function totalproduct()
    {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } 
        else {
            return 0;
        }
        
    
    }
}



?>
