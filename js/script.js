$(function(){
    
    var element_hide;
    var product_id;
    $(".product_row").click(function(){
        
        element_hide = $(this).parent().parent();
        
        
        
        });
    
    $(".prod_delete").click(function()
    {
        product_id = $(this).attr("rel");
        
        var datasent = {"product_id":product_id};
        
        $.post('ajaxdeleteproduct.php',datasent,function(output){
            
            if(output=="yes")
            {
                $(element_hide).hide();
            }
            else
            {
                alert(output);
            }
            
        });
        
    });
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $("#inp_username").blur(function(){
        
        var inp_username = $(this).val();
        var datasent = {"admin_username":inp_username};
        $.post("ajaxcheckusername.php",datasent,function(output){
            
            if(output=="taken")
            {
                $("#username_error").show();
            }
            else
            {
                $("#username_error").hide();
            }
            
            });
        
        });
    
    
    
    
    });