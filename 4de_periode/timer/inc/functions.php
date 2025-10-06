<?php
/**
 * function init to check and / or
 * set session keys and values
 * @param none
 * @return void
 */
function init()
{
    // START OR RESUME EXISTING SESSION
    session_start();
    // CHECK AND/OR SET SESSION KEYS AND VALUES
 
    // game started yet?
    if(!isset($_SESSION['started']))
    {
        $_SESSION['started'] = false;
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
        $_SESSION['maxTime'] = 10;
    }
    // maximum gameplay time in seconds
    if(!isset($_SESSION['random']))
    {
        $_SESSION['random'] = false;
    }
    // number of seconds game in progress
    if(!isset($_SESSION['timeSpent']))
    {
        $_SESSION['timeSpent'] = 0;
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
    elseif(isset($_SESSION['runTime']) && $_SESSION['started'] == true && $_SESSION['gameSuccess'] == false)
    {
        // update runtime
        $_SESSION['runTime'] = microtime(true) - $_SESSION['startTime'];
    }
    // when runtime exceeds max time, reset and start allover again
    if($_SESSION['runTime'] >= $_SESSION['maxTime'])
    {
        session_destroy();
        reload();
    }
}
/**
 * function handle post to check
 * a post request
 * @param none
 * @return void
 */
function handlePost()
{
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if(isset($_POST['startForm']))
        {
            extract($_POST);
            // set session values
            $_SESSION['started']        = true;
            $_SESSION['startTime']      = microtime(true);
            $_SESSION['maxTime']        = $maxTime; // from $_POST
            $_SESSION['random']         = rand(1,100);
            
        }
        if(isset($_POST['resetForm']))
        {
            session_destroy();
        }
        // dd($_SESSION, 1);
        // reload after each POST request!!
        reload();
    }
}
/**
 * function reload will be triggerd
 * after each post request.
 * Reloads current script.
 * @param none
 * @return void
 */
function reload()
{
    header("location:index.php");
}
/**
 * function to show the
 * settings form in which some
 * session settings (key, value)
 * can be set
 * @param none
 * @return void
 */
function showFormStart()
{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Max seconds</label>
        <input type="number" name="maxTime" class="form-control" />
        <input type="submit" name="startForm" value="Start" class="btn btn-primary mbt5" />
    </form>
    <?php
}
/**
 * function to show the
 * play form in which the number can be
 * filled in.
 * Also shows the time in seconds left and passed
 * @param none
 * @return void
 */
function showFormPlay()
{
    $timeLeft = $_SESSION['timeLeft'];
 
    ?>
    <div id="timeSpent" style="float: left; width: 10%;"><?php echo $_SESSION['timeSpent']; ?></div><div id="tS" style="float: left; width: 90%;"> seconds passed...</div>
    <div id="timeLeft" style="float: left; width: 10%;"><?php echo $timeLeft; ?></div><div id="tL" style="float: left; width: 90%;"> seconds left...</div>
    <div>
        <form action="index.php" method="post">
            <input type="text" id="myGuess" placeholder="Your guess.." class="form-control" />
            <button id="btnPlayForm" type="submit" class="btn btn-primary mbt5">Go, guess..</button>
        </form>
    </div>
    <br />
    <?php
}
/**
 * form with only a submit button
 * to quit and reload script from
 * the beginning
 * @param none
 * @return void
 */
function showFormReset()
{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" name="resetForm" id="btnReset" value="Reset!" class="btn btn-warning mbt5" />
    </form>
    <?php
}
/**
 * debug | test function
 * to print contents of a variable
 * @param mixed $var
 * @param boolean $exit
 * @uses var_dump()
 * @return void
 */
function dd($var, $exit = false)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if($exit)
    {
        die("exit script");
    }
}
/**
 * function to print the html
 * head section up to body tag
 * @param none
 * @return void
 */
function htmlHead()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="css/main.css"rel="stylesheet" />
        <title>PHP & jQuery & Ajax Timer Example</title>
    </head>
    <body>
    <header>Guess The Number</header>
    <div class="container custom" style="border: 1px solid green;">
    <?php
}
/**
 * function to print the html
 * footer section from closing body tag
 * up to html closing tag
 * @param none
 * @return void
 */
function htmlFoot()
{
    ?>
    </div>
    <footer>&copy;Peter&nbsp;N&ouml;cker&nbsp;|&nbsp;<?php echo gmdate("d F Y, H:i:s", time()); ?></footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    </body>
    </html>
    <?php
}