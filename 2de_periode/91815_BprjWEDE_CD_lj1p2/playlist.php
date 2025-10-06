<?php
session_start();

    include("inc/functions.php");
    htmlhead();
    // if they logged in
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        // if they are on the acdc page
        if($_GET["page"] == "ACDC")
        {      
            echo "<div class='mainContainer'>";        
            htmlACDC();
            displaySongs();
            echo "</div>";
        }
        // if they are on the gunsNroses page
        elseif($_GET["page"] == "gunsNroses")
        {
            echo "<div class='mainContainer'>";
            htmlgunsNroses();
            displaySongs();
            echo "</div>";
        }
        // if they are on the ironMaiden page
        elseif($_GET["page"] == "ironMaiden")
        {
            echo "<div class='mainContainer'>";
            htmlironMaiden();
            displaySongs();
            echo "</div>";
        }
        // if they want to log out
        elseif(($_GET["page"] == "logout"))
        {
            session_destroy();
            echo "<h3 class='account'> successfully logged out </h3>";
        }
    }
    // if they didnt log in and are on the login page
    elseif($_GET["page"] == "login")
    {
        login();
    }
        // if they didnt log in and are on the logout page
    elseif(($_GET["page"] == "logout"))
    {
        session_destroy();
        echo "<h3 class='account'> successfully logged out </h3>";
    }
    elseif($_GET["page"] == "oi")
    {
        echo "<div class='mainContainer'>";
        displaySongs();
        echo "</div>";
    }
    // if they didnt log in and are on the register page
    elseif(($_GET["page"] == "register"))
    {
        register();
    }
    //if they didnt log in and are on any other page
    else
    {
        //if they didnt log in and are on any other page
        ?>
        <h3 class="account">please log in to get started</h3>
        <?php
    }
htmlfoot();
?>