<?php
// if js gives information
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // conection to database
    $conn = db_connect();

    // if there is an error it shuts down
    if (mysqli_connect_errno())
    {
        die("Connection error: " . mysqli_connect_error());
    }

    // to make it ready to put it into it
    $sql = "INSERT INTO results (result_username, result_tries, result_time)
            VALUES(?, ?, ?)";

    // to prepare it for dangerous itmes
    $stmt = mysqli_stmt_init($conn);

    // if there are dangerous items it shuts down
    if (! mysqli_stmt_prepare($stmt, $sql))
    {
        die(mysqli_error($conn));
    }

    // to get the information js sended and put it in variables
    $username = $_POST['username'];
    $tries = $_POST['tries'];
    $time = $_POST['time'];

    // to say what each item is string or int and what it is
    mysqli_stmt_bind_param($stmt, "sii",
    $username,
    $tries,
    $time
    );
    
    // to put it in the database
    mysqli_stmt_execute($stmt);

    // to send the vieuwer back to startup screen
    header("location: ../index.php");
}

// database conection
function db_connect()
{
    // database settings
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "connectmachine";
    // connect
    $mysqli = new mysqli($host, $user, $pass, $data);
    // check connection
    if($mysqli->connect_errno)
    {
        die("connection with database " . $data . " failed!!");
    } 
    return $mysqli;
}

// get info
function getResults()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM results         
    ORDER BY 
        result_tries ASC, 
        result_time ASC";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $results = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $results;
}

// if js is asking for information
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // to know its json
    header('Content-Type: application/json');

    // get info
    $results = getResults(); 
    
    // if they selected a radiobutton for leaderboard then that dificulty is selected else it is null
    $difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : null;

    $amount = 0;

    // so i can send info to js
    $information = array();
    // loop trough all information
    foreach ($results as $result) {

        // if no radiobutton is selected then all dif else the selected dif and only 5 of them
        if (($difficulty === null || $difficulty === $result["result_dif"]) && $amount < 3) {
            $amount++;

            $information[] = [
                // Default to "Unknown" if username is null
                "player" => $result["result_username"] ?? "Unknown",  
                "tries" => $result["result_tries"],
                "time" => $result["result_time"]
            ];
        }
    }

    // If you just need raw results, use `echo json_encode($results);`
    echo json_encode($information);
}
?>