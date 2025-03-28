<?php
include_once("header.php");

if(isset($_POST['submit']))
{
    $search = validate($_POST['search']);
    
    $sql = "SELECT * FROM product WHERE product_name like '%$search%'";
    
    $result = mysqli_query($con,$sql);
    if($result)
    {
        $result_num =mysqli_num_rows($result);
        if(mysqli_num_rows($result)>0)
        {
            output_msg("s","Found [$result_num] Times");
            ?>
                <div class="row">
                    <?php
                        while($row=mysqli_fetch_array($result))
                        {
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                      <img src="imgs/<?php echo $row['product_image_name']; ?>" style="width: 60%; height: 250px;">
                                      <div class="caption">
                                        <h3><?php echo substr($row['product_name'],0,20); ?></h3>
                                        <p>
                                            <?php echo substr($row['product_desc'],0,100)."....."; ?>                                    </p>
                                        <p><a href="product_details.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                                      </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    
                </div>
            <?php
        }
        else
        {
            output_msg("f","Found [0] Times");
        }
    }
    else
    {
        output_msg();
    }
    
}
else
{
    output_msg("f","Unexpected Error!");
}


include_once("footer.php");

?>