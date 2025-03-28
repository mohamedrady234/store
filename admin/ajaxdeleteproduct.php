<?php
include_once("../framework/config.php");
$product_id= $_POST['product_id'];

$sql = "DELETE FROM product WHERE product_id=$product_id";
$result = mysqli_query($con,$sql);
if($result)
{
    echo "yes";
}
else
{
    echo "Error101";
}


?>