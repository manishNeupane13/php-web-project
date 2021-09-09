<?php

function prx($arr)
{
    print_r($arr);
    
}
function get_safe_value($conn,$str)
{
    if ($str=!"")
    {
        return mysqli_real_escape_string($conn,$str);
    }
}


function get_product($con,$type='',$limit)
{
    $sql= " SELECT * FROM product where  status=1 ";
    if ($type == 'latest')
    {
        $sql= $sql."order by id desc";
       

    }
    if ($limit !='')
    {
        $sql=$sql." limit $limit";
        
    }
    $result=mysqli_query($con,$sql);

    $data=array();
    while ($row=mysqli_fetch_assoc($result))
    {
        $data[]=$row;
    }
    return $data;


}
function get_product1($con,$category_id='',$sort_order='')
{
    
    $sql = "SELECT product.*,categories.caterogry_name from product,categories  where  product.status=1 ";
    if ($category_id != '') {
        $sql = $sql . " and product.categories_id=$category_id";
        
        
    }
    $sql = $sql . " and product.categories_id=categories.id";
    if ($sort_order !='')
    {
        $sql=$sql.$sort_order;
    }
    
    $result = mysqli_query($con, $sql);
    

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
function get_product_details($con, $product_id = '')
{
    $sql = "SELECT product.*,categories.caterogry_name from product,categories  where  product.status=1 ";
    if ($product_id != '') {
        $sql = $sql . " and product.id=$product_id";
    }
    $sql =$sql." and product.categories_id=categories.id";
   
    $result = mysqli_query($con, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function get_search_product($conn,$str='')
{
     $sql= "SELECT * from product where  product.product_name  like'%$str%' or product.Description like'%$str%' or product.Meta_title like '%$str%'"; 
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

 

?>
