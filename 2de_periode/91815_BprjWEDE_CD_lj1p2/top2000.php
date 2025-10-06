<?php
session_start();

    include("inc/functions.php");
    htmlhead();
    // if they logged in
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {
        // they get the items in the top2000
        top2000();
    }
    // if they didnt...
    else
    {
        // they get this message
        ?>
        <h3 class="account">please log in to get started</h3>
        <?php
    }
    htmlfoot();
?>