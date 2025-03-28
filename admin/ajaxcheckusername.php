<?php
include_once("../framework/config.php");

$admin_username = $_POST['admin_username'];

$sql = "SELECT * FROM admin WHERE admin_username='$admin_username'";
$result=mysqli_query($con,$sql);
if($result)
{
    if(mysqli_num_rows($result)>0)
    {
        echo "taken";
    }
    else
    {
        echo "av";
    }
}
else
{
    echo "Error101";
}

?>