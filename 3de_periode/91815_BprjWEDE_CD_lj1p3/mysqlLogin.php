<?php
//to check if they logged in
session_start();

//to declear these variables
$firstname = "";
$lastname = "";

// to use this 
include("inc/functions.php");
extract($_POST);
// connect with database
$db = db_connect();
// the sql string to be sent to the database
$sql = "SELECT * FROM accounts";
// execute query and store response in $resource
$resource = $db->query($sql) or die($db->error);
// fetch data as an associative array
$accounts = $resource->fetch_all(MYSQLI_ASSOC);
// close the database connection
$db->close();

// the nav bar
htmlhead("navbar","img/GameWorld.png", "pickedbutton", 6);

// to sicle trough all the account in my databaze
foreach($accounts as $key => $account)
{
    // if they already logged in and still got here
    if(isset($_SESSION['username']) && isset($_SESSION['password']))
    {

    }
    // if they werent logged in yet
    else
    {
        // to save thim in these variables
        if($account["username"] == $l_username && $account["password"] == $l_password)
        {
            // so i can check if they are logged in
            $_SESSION['username'] = $l_username;
            $_SESSION['password'] = $l_password;

            // so i can call them out by name
            $firstname = $account["firstname"];
            $lastname = $account["lastname"];
        } 
    }
}
// if they logged in
if(isset($_SESSION['username']) && isset($_SESSION['password']))
{
    ?>
    <h3 class="account">welcome <?php echo $firstname . " " . $lastname ?></h3>
    <?php
}
// if they didnt do it right
else
{
    ?>
    <h3 class="account">wrong username or password</h3> 
    <?php
}

htmlFoot("footer");
?>