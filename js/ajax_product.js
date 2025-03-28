$(function()
{
    var element_delete;
    
    $(".btndelete").click(function()
    {
        element_delete = $(this).parent().parent();  /// get <tr>
    });
    
    $(".delete_product") .click(function()
    {
        var product_id = $(this).attr("rel");
        
        
        var datasend = {"product_id" : product_id};
        
        $.post("ajax_delete_product.php",datasend,function(output)
        {
            if(output=="yes")
            {
                $(element_delete).fadeOut();
            }
            else
            {
                alert("Error! SQL Error");
            }
        });
    });   
    
});