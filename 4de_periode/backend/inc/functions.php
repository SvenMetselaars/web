<?php
// Start the session
session_start();

//region session setup
if (!isset($_SESSION['prevGuesses']))
{
    $_SESSION["prevGuesses"] = [];
}
if (!isset($_SESSION['prevTimes']))
{
    $_SESSION["prevTimes"] = [];
}
if (!isset($_SESSION['recapScreen']))
{
    $_SESSION['recapScreen'] = false;
}
if (!isset($_SESSION['allRoundsTime'])) 
{
    $_SESSION["allRoundsTime"] = 0;
}
if (!isset($_SESSION['gameStarted'])) 
{
    $_SESSION["gameStarted"] = false;
}
if (!isset($_SESSION['guessedNumber'])) 
{
    $_SESSION["guessedNumber"] = null;
}
if (!isset($_SESSION['gameResult'])) 
{
    $_SESSION["gameResult"] = "play now";
}
if(!isset($_SESSION['loggedIn']))
{
    $_SESSION['loggedIn'] = 0;
}
if(!isset($_SESSION['allRoundsGuesses']))
{
    $_SESSION['allRoundsGuesses'] = 0;
}
if(!isset($_SESSION['dif_round']))
{
    $_SESSION['dif_round'] = "0";
}

if(!isset($_SESSION['gameSuccess']))
{
    $_SESSION['gameSuccess'] = false;
}
// start time in UNIX timestamp
if(!isset($_SESSION['startTime']))
{
    $_SESSION['startTime'] = false;
}
// maximum gameplay time in seconds
if(!isset($_SESSION['maxTime']))
{
    $_SESSION['maxTime'] = 100;
}
// number of seconds game in progress
if(!isset($_SESSION['timeSpent']))
{
    $_SESSION['timeSpent'] = 0;
}
if(!isset($_SESSION['timeStartGuess']))
{
    $_SESSION['timeStartGuess'] = 0;
}
if(!isset($_SESSION['timeSpentGuess']))
{
    $_SESSION['timeSpentGuess'] = 0;
}
if(!isset($_SESSION['timeForGuess']))
{
    $_SESSION['timeForGuess'] = 10;
}
if(!isset($_SESSION['timeLeftGuess']))
{
    $_SESSION['timeLeftGuess'] = $_SESSION['timeForGuess'] - $_SESSION['timeSpentGuess'];
}
// number of seconds left to finish the 'game'
if(!isset($_SESSION['timeLeft']))
{
    $_SESSION['timeLeft'] = $_SESSION['maxTime'] - $_SESSION['timeSpent'];
}
// on start (or when not set yet) runtime is zero seconds
if(!isset($_SESSION['runTime']))
{
    $_SESSION['runTime'] = 0;
}
// else runTime is current unix timestamp minus unix timestamp of start
// do not update runtime when mysteryNumber is guessed correctly ($_SESSION['gameSuccess'] = true)
elseif(isset($_SESSION['runTime']) && $_SESSION['gameStarted'] == true && $_SESSION['gameSuccess'] == false)
{
    // update runtime
    $_SESSION['runTime'] = microtime(true) - $_SESSION['startTime'];
}

//endregion

// header
function htmlHead()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="sven metselaars">
        <link rel="stylesheet" href="css/main.css">      
        <title>number machine</title>
    </head>
    <body>
        <nav>
            <h1><a href="login.php?page=logout">logout</a></h1>
        </nav>
    <?php
}

//region database

function db_connect()
{
    // database settings
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "numbermachine";
    // connect
    $mysqli = new mysqli($host, $user, $pass, $data);
    // check connection
    if($mysqli->connect_errno)
    {
        die("connection with database " . $data . " failed!!");
    } 
    return $mysqli;
}

function getResults()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM results";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $results = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $results;
}

function getResultsSorted()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM results         
    ORDER BY 
        CASE result_dif
            WHEN 'hard' THEN 1
            WHEN 'medium' THEN 2
            WHEN 'easy' THEN 3
        END,
        result_range DESC, 
        result_guesses ASC, 
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

function getUsers()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM users";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $users = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $users;
}

//endregion

//region setup game

function setupGame()
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="formDiv">
                <form action="" method="POST" autocomplete="off">
                    <h1>setup</h1>
                    <div class="difAmount">
                        <p class="dificulty_p">easy</p>
                        <p class="dificulty_p">medium</p>
                        <p class="dificulty_p">hard</p>
                    </div>
                    <div class="difAmount">
                        <input type="radio" value="easy"    required    name="dif" checked />
                        <input type="radio" value="medium"  required    name="dif" />
                        <input type="radio" value="hard"    required    name="dif" />
                    </div>
                    <input type="number"    placeholder="min"               name="S_min"            required    min="1" />
                    <input type="number"    placeholder="max"               name="S_max"            required    min="1" />
                    <input type="number"    placeholder="amount of tries"   name="S_amountTries"    required    min="1" />
                    <input type="number"    placeholder="time per try"      name="S_TimeTry"        required    min="1" />
                    <input type="number"    placeholder="amount of rounds"  name="S_RoundAmount"    required    min="1" max="99"    />
                    <input type="submit"    value="submit"                  name="setupButton"      required             />   
                    <?php     
                    // to check the stuff they filled in     
                    checkSetupGame();
                    ?>
                </form>
            </div>
            <div class="r_banner">
                <?php
                    // to show game resultss
                    echo "<h1>" . $_SESSION["gameResult"] . "</h1>";
                ?>
                <div class = "difAmount">
                    <p class="dificulty_p">easy</p>
                    <p class="dificulty_p">medium</p>
                    <p class="dificulty_p">hard</p>
                </div>
                <div class="difAmount">
                    <!-- to change dif -->
                    <input type="radio" value="easy" required name="dif_L" onclick="reloadPage(this.value)" />
                    <input type="radio" value="medium" required name="dif_L" onclick="reloadPage(this.value)" /> 
                    <input type="radio" value="hard" required name="dif_L" onclick="reloadPage(this.value)" />
                </div>
                <?php
                // to show leaderboard
                    showLeaderboard();
                ?>
            </div>
        </div>
    </div>
    <?php

}

// to show the leaderboard
function showLeaderboard()
{
    // to get the info from database
    $results = getResultsSorted();
    $users = getUsers();
    echo "<table> <thead> <tr>";  
    echo "<th> user </th>";
    echo "<th> range </th>";
    echo "<th> tries </th>";
    echo "<th> time </th>";
    echo "<th> dif </th>";
    echo "<th> rounds </th>";
    echo "</tr> </thead> <tbody>";
    // go trough results
    foreach($results as $result)
    {
        // go trough users
        foreach($users as $user)
        {
            // if they are the same to each other than it go's trough
            if($user['user_id'] == $result['result_userId'])
            {
                // if dif doesnt exist than print all dificulty's
                if(!isset($_GET["dif"]))
                {
                    echo "<tr class='PlaylistSongs'>";
                    echo "<td>" . $user['user_username'] . "</td>";
                    echo "<td>" . $result['result_range'] . "</td>";
                    echo "<td>" . $result['result_guesses'] . "</td>";
                    echo "<td>" . $result['result_time'] . "</td>";
                    echo "<td>" . $result['result_dif'] . "</td>";
                    echo "<td>" . $result['result_rounds'] . "</td>";
                    echo "</tr>";   
                }
                // if it does exist than print that specific dif
                elseif($_GET["dif"] == $result['result_dif'])
                {
                    echo "<tr class='PlaylistSongs'>";
                    echo "<td>" . $user['user_username'] . "</td>";
                    echo "<td>" . $result['result_range'] . "</td>";
                    echo "<td>" . $result['result_guesses'] . "</td>";
                    echo "<td>" . $result['result_time'] . "</td>";
                    echo "<td>" . $result['result_dif'] . "</td>";
                    echo "<td>" . $result['result_rounds'] . "</td>";
                    echo "</tr>"; 
                }
            }
        }        
    }
    echo "</table> </tbody>";
}

function checkSetupGame()
{
    // if they posted info
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to extract and make variable
        extract($_POST);

        // so i can put them in array
        $errors = array();
        // if min empty
        if($S_min == "")
        {
            $errors[] = "Fill in your min";
        }
        // if max empty
        if($S_max == "")
        {
            $errors[] = "Fill in your max";
        }
        // if amount tries empty
        if($S_amountTries == "")
        {
            $errors[] = "Fill in your amount of tries";
        }
        // if timetry empty
        if($S_TimeTry == "")
        {
            $errors[] = "Fill in your time per tries";
        }
        // if min hirgher than max
        if($S_min > $S_max)
        {
            $errors[] = "min cant be more then max";
        }

        // if there is one int the $errors[] array than print all of them
        if(isset($errors) && count($errors) > 0)
        {
            echo "<div class='submitted'><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
        }
        // if everything is empty
        else
        {
            // things neeeded to start the game
            $amountTime = $S_amountTries * $S_TimeTry;
            unset($_SESSION["prevGuesses"]);
            unset($_SESSION["prevTimes"]);
            $_SESSION["randomNumber"]           = rand($S_min, $S_max);
            $_SESSION["min"]                    = $S_min;
            $_SESSION["max"]                    = $S_max;
            $_SESSION['dif']                    = $dif;
            $_SESSION["gameStarted"]            = true;
            $_SESSION["amoundOfTriesMax"]       = $S_amountTries;
            $_SESSION["amoundOfTries"]          = $S_amountTries;
            $_SESSION['amoundGuessed']          = 0;
            $_SESSION['dif_round']              = 0;
            $_SESSION['startTime']              = microtime(true);
            $_SESSION['maxTime']                = $amountTime; 
            $_SESSION['round']                  = 1;
            $round = 1; 
            $_SESSION["prevGuesses"][$round]    = [];
            $_SESSION['timeForGuess']           = $S_TimeTry;
            $_SESSION['timeStartGuess']         = microtime(true);
            $_SESSION['roundMax']               = $S_RoundAmount;
            $_SESSION['recapScreen']            = false;
            $_SESSION["allRoundsTime"]          = 0;
            $_SESSION['allRoundsGuesses']       = 0;

            header("Refresh:0"); // Reloads the page immediately
            exit();
        }
    }
} 

//endregion

//region game

function playGame()
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="formDiv">
                <form action="" method="POST" autocomplete="off">
                    <h1>Guess</h1>
                    <input type="number"    placeholder="guess here"    name="G_Guess"      required    />
                    <input type="submit"    value="submit"              name="setupButton"              />   
                    <?php     
                    // to check what they filled in     
                    checkGame();
                    ?>
                </form>
            </div>
                <div class="r_banner">
                    <?php
                    if($_SESSION["guessedNumber"] == null)
                    {
                        ?>
                        <img src="img/vraagTeken.png">
                        <?php
                    } 
                    elseif($_SESSION["guessedNumber"] > $_SESSION["randomNumber"])
                    {
                        ?>
                        <img src="img/pijlOmlaag.png">
                        <?php
                    }
                    elseif($_SESSION["guessedNumber"] < $_SESSION["randomNumber"])
                    {
                        ?>
                        <img src="img/pijlOmhoog.png">
                        <?php
                    } 
                    ?>
                </div>
            </div>
        </div>
    <?php
}

function checkGame()
{
    // if they send items
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to extract and make variable
        extract($_POST);

        // if they didnt fill in guess
        if($G_Guess == "")
        {
            echo "<div class='submitted'><h3>";
            echo "<ul>";
            echo "<li> Fill in your guess </li>";
            echo "</ul>";
            echo "</h3></div>";
        }
        // if they filled in everything
        else
        {
            // things i need to update
            $round = $_SESSION['round'];
            $_SESSION["guessedNumber"]          = $G_Guess;
            $_SESSION["prevGuesses"][$round][]  = $G_Guess;
            $_SESSION["amoundOfTries"]--;
            $_SESSION['amoundGuessed']++;
            $_SESSION['timeStartGuess']         = microtime(true);  

            // if they guessed the number
            if($G_Guess == $_SESSION["randomNumber"])
            {
                // if hard/medium is selected they will need to geuss a dif number
                if(($_SESSION['dif'] == "medium" || $_SESSION['dif'] == "hard") && $_SESSION['dif_round'] == 0)
                {
                    $_SESSION["randomNumber"] = rand($_SESSION["min"], $_SESSION["max"]);
                    $_SESSION['dif_round']++;
                }
                // if hard is selected they will need to geuss a dif number again
                elseif($_SESSION['dif'] == "hard" && $_SESSION['dif_round'] == 1)
                {
                    $_SESSION["randomNumber"] = rand($_SESSION["min"], $_SESSION["max"]);
                    $_SESSION['dif_round']++;
                }
                // if they the dif they selected
                else
                {     
                    // round go up
                    $_SESSION['round']++;  
                    $round = $_SESSION['round'];  
                    // if they slected more rounds
                    if($_SESSION['round'] <= $_SESSION['roundMax'])
                    {
                        // basecly restart the game
                        $_SESSION["allRoundsTime"]          = $_SESSION["allRoundsTime"] + $_SESSION['timeSpent'];
                        $_SESSION['allRoundsGuesses']       = $_SESSION['allRoundsGuesses'] + $_SESSION['amoundGuessed'];
                        $_SESSION["randomNumber"]           = rand($_SESSION["min"], $_SESSION["max"]);
                        $_SESSION["amoundOfTries"]          = $_SESSION["amoundOfTriesMax"];
                        $_SESSION['amoundGuessed']          = 0;
                        $_SESSION['dif_round']              = 0;
                        $_SESSION['startTime']              = microtime(true);
                        $_SESSION["prevGuesses"][$round]    = [];
                        $round--;
                        $_SESSION["prevTimes"][$round][]    = $_SESSION['timeSpent'];
                        echo "test";
                        $round++;
                        $_SESSION['timeStartGuess']         = microtime(true);
                        $_SESSION["guessedNumber"] = null;
                    }
                    // if they did all the rounds they slected
                    else
                    {
                        // end the game
                        $_SESSION["allRoundsTime"] = $_SESSION["allRoundsTime"] + $_SESSION['timeSpent'];
                        $_SESSION['allRoundsGuesses'] = $_SESSION['allRoundsGuesses'] + $_SESSION['amoundGuessed'];
                        $_SESSION["gameResult"] = "you won";
                        $_SESSION["gameStarted"] = false;
                        $_SESSION["guessedNumber"] = null;
                        $_SESSION['recapScreen'] = true;
                        $_SESSION["guessedNumber"] = null;
                        $round--;
                        $_SESSION["prevTimes"][$round][]    = $_SESSION['timeSpent'];
                        $round++;
    
                        // send things to database
                        sendToDatabase();
    
                        header("Refresh:0"); // Reloads the page immediately
                        exit();
                    }
                }
            }
            // if they guessed all the tries
            if($_SESSION["amoundOfTries"] <= 0)
            {
                // end game
                $_SESSION["gameResult"] = "you lost";
                unset($_SESSION["prevGuesses"]);
                $_SESSION["gameStarted"] = false;
                $_SESSION['recapScreen'] = true;

                header("Refresh:0"); // Reloads the page immediately
                exit();
            }
        }
    }
    // show all the thing they need to see
    echo "<br>tries left " . $_SESSION["amoundOfTries"] . "<br>";
    // echo $_SESSION["randomNumber"] . "<br>";
    echo "prev guesses: "; 

    // so i know what round they in
    $round = $_SESSION['round'];

    // to show only that round
    foreach ($_SESSION["prevGuesses"][$round] as $guess) {
        echo $guess . ", ";
    }

  
    // more showy stuff
    $timeLeft = $_SESSION['timeLeft'];
    $timeLeftGuess = $_SESSION['timeLeftGuess'];
    echo "<br>on round: " . $round; 
    ?>
    <div> seconds passed...</div><div id="timeSpent" ><?php echo $_SESSION['timeSpent']; ?></div>
    <div> seconds left...</div><div id="timeLeft" ><?php echo $timeLeft; ?></div>
    <div> seconds left...</div><div id="timeLeftGuess" ><?php echo $timeLeftGuess; ?></div>
    <?php
}

//endregion

function recapScreen()
{
    
    ?>
    <div>
        <?php
        // to show all guesses they did
        foreach ($_SESSION["prevGuesses"] as $round => $guesses) 
        {
            foreach ($_SESSION["prevTimes"] as $round_T => $times) 
            {
                if($round_T == $round)
                {
                    echo "<h3>Round $round:</h3>";
                    echo "<h4>guesses:</h4>";
                    echo implode(", ", $guesses);
                    echo "<br>";
                    echo "<h4>time:</h4>";
                    echo implode(", ", $times);
                    echo "<br>";
                }
            }
        }
        ?>
        <div class="goBack">
            <a href="index.php">go back</a>
        </div>
    </div>
    <?php
}

//region login/register page

function checkLogin()
{
    // if they posted info
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to get info from database
        $users = getUsers();

        // to extract and make variable
        extract($_POST);

        // so i can put them in array
        $errors = array();
        // if they didnt fill in username
        if($L_username == "")
        {
            $errors[] = "Fill in your username";
        }
        // if they didnt fill in password
        if($L_password == "")
        {
            $errors[] = "Fill in your password";
        }

        // to show the errors
        if(isset($errors) && count($errors) > 0)
        {
            echo "<div class='submitted'><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
        }
        // if there where no errors
        else
        {
            // encript the password
            $L_password = md5($L_password);
            foreach($users as $user)
            {
                // if the user and password are the same as in the database they get logged in
                if($user['user_username'] == $L_username && $user['user_password'] == $L_password)
                {
                    $_SESSION['loggedIn'] = 1;
                    $_SESSION['userId'] = $user['user_id'];
                    header('location: index.php');
                }
                // if it wasnt the same
                else
                {
                    echo "<ul>";
                    echo "<li>wrong username or password</li>";
                    echo "</ul>";
                }
            }
        }
    }
}

// to check what they filled in
function checkRegister()
{

    // get info
    $users = getusers();
    // if they posted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to extract and make variable
        extract($_POST);

        // so i can put them in array
        $errors = array();

        // go trough all the info from database
        foreach($users as $user)
        {
            // look if they alrady exist
            if($user['user_username'] == $R_username)
            {
                $errors[] = "this username already exist";
            }

            if($user['user_email'] == $R_email)
            {
                $errors[] = "this email is already used";
            }
        }

        // if they didnt fill in email
        if($R_email == "")
        {
            $errors[] = "Fill in your email";
        }
        // if they didnt fill in username
        if($R_username == "")
        {
            $errors[] = "Fill in your username";
        }
        // if they didnt fill in password
        if($R_password == "")
        {
            $errors[] = "Fill in your password";
        }

        // to show what they didnt fill in
        if(isset($errors) && count($errors) > 0)
        {
            echo "<div class='submitted'><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
        }
        // if they filled in everything
        else
        {
            // database conection
            $db = db_connect();           

            // to make it ready to put it into it
            $sql = "INSERT INTO users (user_email, user_username, user_password)
                    VALUES(?, ?, ?)";
        
            // to prepare it for dengarus itmes
            $stmt = mysqli_stmt_init($db);
            
            if (! mysqli_stmt_prepare($stmt, $sql))
            {
                die(mysqli_error($db));
            }
            
            
            // to encript the password
            $R_password = md5($R_password);
            
            // to say what eacht item is string or int and what it is
            mysqli_stmt_bind_param($stmt, "sss",
            $R_email,
            $R_username,
            $R_password
            );

            // to do the commant
            mysqli_stmt_execute($stmt);

            // go to login page
            header("location: login.php?page=login");
        }
    }
}

function login()
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="formDiv">
                <form action="" method="POST" autocomplete="off">
                    <h1>login</h1>
                    <input type="text"          placeholder="username"  name="L_username"   required    />
                    <input type="password"      placeholder="password"  name="L_password"   required    />
                    <input type="submit"        value="submit"          name="L_Button"                 />   
                    <?php          
                    checkLogin();
                    ?>
                </form>
            </div>
            <div class="r_banner">
                <img src="img/background_pic.jpg">
                <h2 class="loginHeader">register <a href="login.php?page=register">here!</a></h2>
                <h2 class="loginHeader">sign in as guest <a href="login.php?page=guest">here!</a></h2>
            </div>
        </div>
    </div>
    <?php
}

function register()
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="formDiv">
                <form action="" method="POST" autocomplete="off">
                    <h1>register</h1>
                    <input type="email"         placeholder="email"     name="R_email"      required    />
                    <input type="text"          placeholder="username"  name="R_username"   required    />
                    <input type="password"      placeholder="password"  name="R_password"   required    />
                    <input type="submit"        value="submit"          name="R_Button"                 />   
                    <?php          
                    checkRegister();
                    ?>
                </form>
            </div>
            <div class="r_banner">
                <img src="img/background_pic.jpg">
                <h2 class="loginHeader">login <a href="login.php?page=login">here!</a></h2>
            </div>
        </div>
    </div>
    <?php
}

//endregion

//region sendToDatabase

function sendToDatabase()
{
    $db = db_connect();           

    // to make it ready to put it into it
    $sql = "INSERT INTO results (result_userId, result_range, result_time, result_guesses, result_dif, result_rounds)
            VALUES(?, ?, ?, ?, ?, ?)";

    // to prepare it for dengarus itmes
    $stmt = mysqli_stmt_init($db);
    
    if (! mysqli_stmt_prepare($stmt, $sql))
    {
        die(mysqli_error($db));
    }
    
    // to get info
    $userid = 2;
    $range = ($_SESSION["max"] - $_SESSION["min"]) + 1;
    $time = $_SESSION["allRoundsTime"];
    $guesses = $_SESSION['allRoundsGuesses'];
    $dif = $_SESSION['dif'];
    $rounds = $_SESSION['roundMax'];

    if($_SESSION['loggedIn'] == 1)
    {
        $userid = $_SESSION['userId'];
    }
    elseif($_SESSION['loggedIn'] == 2)
    {
        $userid = 2;
    }

    // to say what eacht item is string or int and what it is
    mysqli_stmt_bind_param($stmt, "siiisi",
        $userid,
        $range,
        $time,
        $guesses,
        $dif,
        $rounds
    );

    // to do the commant
    mysqli_stmt_execute($stmt);
}

//endregion

function htmlFoot()
{
    ?>
    <footer class='footer'>
        &copy; pattje72 | <?php echo date("l, d F Y", time()); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    </body>
    </html>
    <?php
}
?>