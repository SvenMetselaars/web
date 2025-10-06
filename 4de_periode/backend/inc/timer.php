<?php
include("functions.php");

// timeSpent = current time - start time
$_SESSION['timeSpent'] = microtime(true) - $_SESSION['startTime'];
// timeLeft  =
$_SESSION['timeLeft']  = $_SESSION['maxTime'] - $_SESSION['timeSpent'];

$_SESSION['timeSpentGuess'] = microtime(true) - $_SESSION['timeStartGuess'];

$_SESSION['timeLeftGuess'] = $_SESSION['timeForGuess'] - $_SESSION['timeSpentGuess'];

// return data as json string (each second, defined in main.js)
echo json_encode(array
    (
        "timeSpent" => round($_SESSION['timeSpent'], 1),
        "timeLeft"  => round($_SESSION['timeLeft'], 1),
        "timeLeftGuess"  => round($_SESSION['timeLeftGuess'], 1)
    )
);

?>