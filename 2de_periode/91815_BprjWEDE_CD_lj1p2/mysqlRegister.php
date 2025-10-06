<?php
session_start();

include("inc/functions.php");

// to make it a variable
$firstname = $_POST["r_firstname"];
$lastname = $_POST["r_lastname"];
$age = $_POST["r_age"];
$gender = $_POST["r_gender"];
$email = $_POST["r_email"];
$number = $_POST["r_number"];
$username = $_POST["r_username"];
$password = $_POST["r_password"];

//to make conection
$host = "localhost";
$user = "root";
$pass = "";
$data = "radiogaga";
// connect
$mysqli = new mysqli($host, $user, $pass, $data);

// check connection
if($mysqli->connect_errno)
{
    die("connection with database " . $data . " failed!!");
} 

// to put it in the databaze
$sql = "INSERT INTO accounts(firstname, lastname, age, gender, email, phone, username, password)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

// to conect to the databaze
$stmt = mysqli_stmt_init($mysqli);

// so i can execute
if (! mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($mysqli));
}

// to put the items in the databaze
mysqli_stmt_bind_param($stmt, "ssississ",
    $firstname,
    $lastname,
    $age,
    $gender,
    $email,
    $number,
    $username,
    $password);

mysqli_stmt_execute($stmt);

htmlhead();


echo "<h2 class='account'>account made</h2>";

htmlfoot();
?>