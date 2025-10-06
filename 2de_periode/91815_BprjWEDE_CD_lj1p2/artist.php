<?php
// so i can check if they logged in
session_start();

    // so i can get things out of there 
    include("inc/functions.php");
    htmlhead();

    // if they are logged in
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        // they get the artist
        artist();
    }
    // if not
    else
    {
        // they get this message
        ?>
        <h3 class="account">please log in to get started</h3>
        <?php
    }
    htmlfoot();
?>