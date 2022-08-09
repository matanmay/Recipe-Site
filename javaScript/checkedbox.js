$(document).ready(function()
{
    //This function is to add line through about what was checked in groceries
    $(".checked").click(function()
    {

        let n = $(this).val(); //getting the id of the text
        let text = document.getElementById(n); // getting the element we want to add css attribute 
        // If the checkbox is checked, add or remove the attribute
        if ($(this).is(':checked')) 
        {   
            $(text).css("text-decoration", "line-through");
        } 
        else 
        {
            $(text).css("text-decoration", "");  
        }
    });

        //This function is to add line through about what was checked in groceries
        $(".checkedAction").click(function()
        {
    
            let n = $(this).val(); //getting the id of the text
            let text = document.getElementById(n); // getting the element we want to add css attribute 
            // If the checkbox is checked, add or remove the attribute
            if ($(this).is(':checked')) 
            {   
                $(text).css("text-decoration", "line-through");
            } 
            else 
            {
                $(text).css("text-decoration", "");  
            }
        });

});