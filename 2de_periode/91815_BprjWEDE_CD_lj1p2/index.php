<?php
// so i can check if they logged in
session_start();

// to get things out of this file
    include("inc/functions.php");
    htmlhead();

    //if they logged in
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        // they get the posters
        posters();
    }
    //if not...
    else
    {
        // they get this message
        ?>
        <h3 class="account">please log in to get started</h3>
        <?php
    }
htmlfoot();
?>