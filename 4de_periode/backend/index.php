<?php
include("inc/functions.php");

//header
htmlHead();

// only show when they won/lost the game
if($_SESSION['recapScreen'] === true)
{
    $_SESSION['recapScreen'] = false;
    recapScreen();
}
// every situation exept for lost on time
elseif(!isset($_GET['result']))
{
    // if they are logged in own or guest acount
    if($_SESSION["loggedIn"] == 1 || $_SESSION["loggedIn"] == 2)
    {
        // if game isnt started
        if($_SESSION['gameStarted'] == false) 
        {
            setupGame();
        }
        // if game is started
        elseif($_SESSION["gameStarted"] == true)
        {
            playGame();
        }
    }
    // if they didnt log in
    elseif($_SESSION['loggedIn'] == 0)
    {
        $_SESSION["gameResult"] = "play now";
        $_SESSION["gameStarted"] = false;
        $_SESSION["guessedNumber"] = null;
        header("Location: login.php?page=login");
    }
}
// if lost on time
else
{
    $_SESSION["gameResult"] = "you lost";
    $_SESSION["gameStarted"] = false;
    header("location: index.php");
}

// footer
htmlFoot();
?>
