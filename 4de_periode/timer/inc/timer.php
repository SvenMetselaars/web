<?php
require("functions.php");
// start or resume session  
session_start();
 
// set session keys
 
// timeSpent = current time - start time
$_SESSION['timeSpent'] = microtime(true) - $_SESSION['startTime'];
// timeLeft  =
$_SESSION['timeLeft']  = $_SESSION['maxTime'] - $_SESSION['timeSpent'];
// return data as json string (each second, defined in main.js)
echo json_encode(array
    (
        "timeSpent" => round($_SESSION['timeSpent'], 1),
        "timeLeft"  => round($_SESSION['timeLeft'], 1)
    )
);