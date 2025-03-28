<?php
include_once("header.php");

?>
    <!-- Start of slider -->
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             <!-- Indicators -->
             <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             </ol>
           
             <!-- Wrapper for slides -->
             <div class="carousel-inner" role="listbox">
                <?php
                    $sql = "SELECT * FROM product ORDER BY product_id DESC limit 3";
                    $result = mysqli_query($con,$sql);
                    
                    if($result)
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            $index = 1;
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                                    <div class="item <?php if($index==1) { echo "active"; $index++; } ?>">
                                        <img src="imgs/<?php echo $row['product_image_name']; ?>" style="width: 60%; height: 400px;margin:auto;">
                                        <div class="carousel-caption" style="background: #000;width: 40%;margin:auto;opacity: 0.7;">
                                          <?php
                                            echo $row['product_name'];
                                          ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }
                
                ?>
               
             </div>
           
             <!-- Controls -->
             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
          </div>
       </div>
       <div class="col-md-2"></div>
    </div>
    
    <!-- End of slider -->

    <!-- Start of latest products -->
    <div class="row">
      <br><br>
      <h3><span class="glyphicon glyphicon-thumbs-up"></span> <span style="margin-left: 1%;text-decoration: underline;">Latest products</span></h3>
      
      <?php
        
        $sql = "SELECT * FROM product ORDER BY product_id DESC limit 10";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="imgs/<?php echo $row['product_image_name']; ?>" style="width: 60%; height: 250px;">
                              <div class="caption">
                                <h3><?php echo substr($row['product_name'],0,20); ?></h3>
                                <p>
                                    <?php
                                        echo substr($row['product_desc'],0,150);
                                    ?>
                                </p>
                                <p><a href="product_details.php?pid=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                              </div>
                            </div>
                        </div>
                    <?php
                }
            }
        }
      
      ?>
      
      
   </div>

<?php


include_once("footer.php");

?>