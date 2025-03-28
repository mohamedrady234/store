<?php
include_once("header.php");
?>
<div class="container-contact100">
    <div class="wrap-contact100">
        <?php
            if(isset($_POST['submit']))
            {
                $name = validate($_POST['name']);
                $email = validate($_POST['email']);
                $phone = validate($_POST['phone']);
                $message = validate($_POST['message']);
                
                if($name!=NULL and $email!=NULL and $phone!=NULL and $message!=NULL)
                {
                    $full_message = "
                                    MY name is $name <br>
                                    Phone is $phone <br>
                                    Email is $email <br>
                                    Message : $message
                                    ";
                    $to = "Admin@itgate.com";
                    $subject = "You have a message from $name";
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    if(mail($to,$subject,$message,$headers))
                    {
                        output_msg("s","Message sent");
                    }
                    else
                    {
                        output_msg("f","Error!");
                    }
                }
                else
                {
                    output_msg("f","Error! Please fill all data");
                }
            }
            else
            {
        ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                   <span class="contact100-form-title">
                      Get in Touch
                   </span>
                   <div class="wrap-input100">
                      <input class="input100" id="name" type="text" name="name" placeholder="Name">
                      <label class="label-input100" for="name">
                         <span class="lnr lnr-user"></span>
                      </label>
                   </div>
                   <div class="wrap-input100">
                      <input class="input100" id="email" type="text" name="email" placeholder="Email">
                      <label class="label-input100" for="email">
                         <span class="lnr lnr-envelope"></span>
                      </label>
                   </div>
                   <div class="wrap-input100">
                      <input class="input100" id="phone" type="text" name="phone" placeholder="Phone">
                      <label class="label-input100" for="phone">
                         <span class="lnr lnr-phone-handset"></span>
                      </label>
                   </div>
                   <div class="wrap-input100">
                      <textarea class="input100" name="message" placeholder="Your message..."></textarea>
                   </div>
                   <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-danger">
                      <span class="glyphicon glyphicon-send"></span>
                      </button>
                   </div>
                </form>
            <?php
                
            }
            ?>
    </div>
 </div>
<?php
include_once("footer.php");
?>