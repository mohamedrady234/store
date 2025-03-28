<?php
include_once("header.php");

if(isset($_GET['cid']))
{
    $category_id = intval($_GET['cid']);
    $sql = "SELECT * FROM product WHERE product_category_id = $category_id";
}
else
{
    $sql = "SELECT * FROM product";
}

$result = mysqli_query($con,$sql);
if($result)
{
    if(mysqli_num_rows($result)>0)
    {
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
        output_msg("f","This category doesn't have any products");
    }
}
else
{
    output_msg();
}


include_once("footer.php");

?>