<?php
session_start();
include_once("../framework/site_func.php");
include_once("../framework/config.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");
    
    $sql = "SELECT * FROM product";
    $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Image</th>
                            <th>Admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $index = 1;
                        while($row_product = mysqli_fetch_array($result))
                        {
                            ########################################################
                            $sql_category = "SELECT * FROM category WHERE category_id=$row_product[product_category_id]";
                            $result_category = mysqli_query($con,$sql_category);
                            if($result_category)
                            {
                                if(mysqli_num_rows($result_category)>0)
                                {
                                    $row_category = mysqli_fetch_array($result_category);
                                    $category_name = $row_category['category_name'];
                                }
                                else
                                {
                                    $category_name = "N/A";
                                }
                            }
                            else
                            {
                                output_msg();
                            }
                            ###############################################
                            
                            $sql_admin = "SELECT * FROM admin WHERE admin_id=$row_product[product_admin_id]";
                            $result_admin = mysqli_query($con,$sql_admin);
                            
                            if($result_admin)
                            {
                                if(mysqli_num_rows($result_admin)>0)
                                {
                                    $row_admin = mysqli_fetch_array($result_admin);
                                    $admin_username = $row_admin['admin_username'];
                                }
                                else
                                {
                                    $admin_username = "N/A";
                                }
                            }
                            else
                            {
                                output_msg();
                            }
                            
                            
                            ################################################
                            ?>
                                <tr>
                                    <td><?php echo $row_product['product_id']; ?></td>
                                    <td><?php echo $row_product['product_name']; ?></td>
                                    <td><?php echo $category_name; ?></td>
                                    <td><?php echo $row_product['product_price']; ?></td>
                                    <td><?php echo $row_product['product_desc']; ?></td>
                                    <td><img src="../imgs/<?php echo $row_product['product_image_name']; ?>" style="width: 100px;""></td>
                                    <td><?php echo $admin_username; ?></td>
                                    <td><a href="edit_product.php?product_id=<?php echo $row_product['product_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    <td>
                                        <button type="button" class="btn btn-link product_row" data-toggle="modal" data-target="#myModal<?php echo $index;?>">
                                          <span style="color: red;" class="glyphicon glyphicon-trash"></span>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmation Message</h4>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to delete this product??
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="button" rel="<?php echo $row_product['product_id']; ?>" class="btn btn-danger prod_delete" data-dismiss="modal">Delete</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            $index++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
        }
        else
        {
            output_msg("f","There is no data");
            redirect(2,"add_product.php");
        }
    }
    else
    {
        output_msg();
    }
    
    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>