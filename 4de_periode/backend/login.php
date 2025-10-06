<?php
include("inc/functions.php");

htmlhead();

if($_GET['page'] == "logout")
{
    session_destroy();
    header('location: login.php?page=login');
}
elseif($_SESSION['gameStarted'] == false)
{
    if($_GET['page'] == "login") 
    {
        login();
    }
    elseif($_GET['page'] == "register")
    {
        register();
    }
    elseif($_GET['page'] == "guest")
    {
        $_SESSION['loggedIn'] = 2;
        header('location: index.php');
    }
}
else
{
    header('location: index.php');
}


htmlFoot();
?>