<?php
include("inc/functions.php");

htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 3);
if($_SESSION['loggedin'] == true)
{
    echo "<div class='shoppingcartmain'><div><div class='shoppingcart'>";      
        
    if($_GET['product'] == "addtobaze")
    {
        //to add them to data baze
        addtodatabaze();
    }
    elseif($_GET['product'] == "bought")
    {
        // to show the bougthitmes
        seeboughtitmes();
    }
    else
    {    
        // to show the shopping cart
        shoppingcartgames();
        echo "</div></div><div><div class='buymaincontainer'>";
        // to make the buyable place
        shoppingcartbuy();
        echo "</div></div></div>";
    }
}
else
{
    header("Location: login.php?page=login");
}
htmlFoot("footer");

?>