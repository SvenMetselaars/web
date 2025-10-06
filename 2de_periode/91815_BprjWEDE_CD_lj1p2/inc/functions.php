<?php

function htmlhead()
{
    // to get information out of the databaze
    $navs = getNav();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="sven metselaars">
    <link rel="stylesheet" href="css/main.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">       
    <title>Patio Radio</title>
</head>
<body>
    <div class="navbar">
        <header>
            <div class="Logo">
                <!-- the home button and picture -->
                <a href="index.php"><img src="img/radio.jpg" height="100px"></a>
                <?php
                // if they are logged in
                if(isset($_SESSION['username']) && isset($_SESSION['password']))
                {
                    // to show the text
                    echo "<h2 class='topleft'>the patio radio <br />
                    where only real music is played</h2>";
                    
                }
                // if they arnt logged in
                else
                {
                    // secret (i had to do this because of cas)
                    echo "<h2 class='topleft'>the pat<a href='playlist.php?page=oi' class='oi'>io<a> radio <br />
                    where only real music is played </h2>";
                    
                }
                ?>
            </div>
        </header>
        <nav>
            <h2>
                <?php
                // to count
                $x = 0;
                // if they are logged in
                if(isset($_SESSION['username']) && isset($_SESSION['password']))
                {
                    // to get the information
                    foreach ($navs as $key => $nav)
                    { 
                        //gets up every foreach
                        $x++;
                        // if x is 5 the info of the databaze is what i need
                        if($x == 5)
                        {
                            // to use the info from the databaze
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                        // if it is 1 to 3 it goes in here (there are others in the databaze that i dont need so i filter them out this way)
                        elseif($x < 4)
                        {
                            // if the x matches the id so if the id matches with x i get the info out of the databaze but if it is 4 i dont get it no more
                            if($nav['nav_id'] == $x)
                            {
                                // to get the info out the databaze
                                ?>
                                <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                                <?php
                            }
                        }
                    }
                    
                }
                // if they arent logged in
                else
                {
                    //to make all the navs into 1 per
                    foreach ($navs as $key => $nav)
                    { 
                        // to make it go up again
                        $x++;
                        // to get the info i need
                        if($x == 3 || $x == 4)
                        {
                            // to use the info
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                    }              
                }
                ?>
            </h2>
        </nav>
    </div>
<?php
}
// function to get nav from the database
// will return an array with info of nav
function getNav()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM nav";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $navs = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $navs;
}
// functions file
// function to create a database object
// will be used by all other functions
// that need a database connection
function db_connect()
{
    // database settings
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
    return $mysqli;
}
// function to get songs from the database
// will return an array with info of songs
function getSongs()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM muziek";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $Songs = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $Songs;
}
// function to display the songs
// each within its own <div></div>
// will make use of function getSongs()
function displaySongs()
{
    $Songs = getSongs();
    ?> 
    <div class="artistsongs">
        <table>
            <thead>
                <tr>
                    <th>name</th>
                    <th>artist</th>
                    <th>song</th>
                </tr>
            </thead>
            <tbody>  
                <?php
                echo "<video src='video/" . $_GET["page"] . ".mp4' controls autoplay mute width=648> </video>";
                //
                // loop through array
                foreach($Songs as $key => $Song)
                {
                    // if it gets to ACDC it goes in here
                    if($Song["album_artist"] == $_GET["page"])
                    {
                        // to show the title of the song
                        echo "<tr> <td> <h3>" . $Song["album_title"] . "</h3> </td>";
                        // break
                        echo "<br />";
                        echo "<td> <h3>" . $Song["album_artist"] . "</h3> </td>";
                        // to close php
                        ?>
                            <td>
                                <!-- to make the song a audio -->     <!-- to open php and get the audio out of the databaze and close it again -->
                                <audio controls type="media/mp3" src="<?php echo $Song['album_song'] ?>"></audio>
                            </td>
                        </tr>                 
                        <?php
                    }      
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
}
// function to get nav from the database
// will return an array with info of nav
function getTop2000()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM brpj_top2000_2023";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $tops = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $tops;
}
function top2000()
{
    // tp get the info
    $tops = getTop2000();
    // all the html but in php?!
    echo "<div class='top2000_table'> <table> <thead> <tr>";  
    echo "<th> song position </th>";
    echo "<th> song title </th>";
    echo "<th> song artist </th>";
    echo "<th> song year </th>";
    echo "</tr> </thead> <tbody>";

    // sort the songs based of the position instead of the id
    usort($tops, function($a, $b) {
        return $a['songPosition'] - $b['songPosition'];
    });
    //to get all the information and do it one for one
    foreach ($tops as $key => $top) 
    {
        // if they match this i can higligh them (these are the artist i used)
        if($top['songArtist'] == "AC/DC" || $top['songArtist'] == "Iron Maiden" || $top['songArtist'] == "Guns N' Roses")
        {
            // to show info
            echo "<tr class='PlaylistSongs'>";
            echo "<td>" . $top['songPosition'] . "</td>";
            echo "<td>" . $top['songTitle'] . "</td>";
            echo "<td>" . $top['songArtist'] . "</td>";
            echo "<td>" . $top['songYear'] . "</td>";
            echo "</tr>";
        }
        // if not
        else
        {
            // to show info
            echo "<tr class='outlineTop2000'>";
            echo "<td>" . $top['songPosition'] . "</td>";
            echo "<td>" . $top['songTitle'] . "</td>";
            echo "<td>" . $top['songArtist'] . "</td>";
            echo "<td>" . $top['songYear'] . "</td>";
            echo "</tr>";
        }
    }
    // to end them
    echo "</tbody> </table> </div>";
}
function getartist()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM artist";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $artists = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $artists;
}
function artist()
{    
    // to get all the info
    $artists = getartist();

    //html in php
    echo "<div class='artist_container'>";

         //to get all the information and do it one for one
        foreach ($artists as $key => $artist) 
        {
            // again to show the stuff
            echo "<div class='artist'>";
            echo "<h2>" . $artist['artist_name'] . "</h2>";
            ?> <img src="<?php echo $artist['artist_pic']?>" width=200 heigth=200> <?php
            echo "<p>" . $artist['artist_info'] . "</p>";
            echo "<ul> <li>" . $artist['artist_song1'] . "</li>";
            echo "<li>" . $artist['artist_song2'] . "</li>";
            echo "<li>" . $artist['artist_song3'] . "</li> </ul>";
            echo "</div>";
        }

        // end of div
    echo "</div>";
}
// to show the posters i used
function posters()
{
?>
<div class="posters">
    <div class="poster ACDC">
        <a href="playlist.php?page=ACDC"><img src="img/ACDC.jpg" alt="pic of ACDC" class="poster ACDCimg"></a>
    </div>
    <div class="poster gunsnroses">
        <a href="playlist.php?page=gunsNroses"><img src="img/gunsnroses.jpg" alt="pic of guns n roses" class="poster gunsnrosesImg"></a>
    </div>
    <div class="poster ironMaiden">
        <a href="playlist.php?page=ironMaiden"><img src="img/ironMaiden.jpg" alt="pic of iron maiden" class="poster ironMaidenImg"></a>
    </div>
</div>
<?php
}
// to make the one you use the top one
function  htmlgunsNroses()
{
?>
<div class="poster_posters">
    <div class="gunsnroses_gnr">
        <a href="playlist.php?page=gunsNroses"><img src="img/gunsnroses.jpg" alt="pic of guns n roses" class="poster_gnr gunsnrosesImg_gnr"></a>
    </div>
    <div class="ironMaiden_gnr">
        <a href="playlist.php?page=ironMaiden"><img src="img/ironMaiden.jpg" alt="pic of iron maiden" class="poster_gnr ironMaidenImg_gnr"></a>
    </div>
    <div class="ACDC_gnr">
        <a href="playlist.php?page=ACDC"><img src="img/ACDC.jpg" alt="pic of ACDC" class="poster_gnr ACDCimg_gnr"></a>
    </div>
</div>
<?php
}
// to make the one you use the top one
function  htmlironMaiden()
{
?>
<div class="poster_posters">
    <div class="ironMaiden_gnr">
        <a href="playlist.php?page=ironMaiden"><img src="img/ironMaiden.jpg" alt="pic of iron maiden" class="poster_imd ironMaidenImg_imd"></a>
    </div>
    <div class="ACDC_gnr">
        <a href="playlist.php?page=ACDC"><img src="img/ACDC.jpg" alt="pic of ACDC" class="poster_imd ACDCimg_imd"></a>
    </div>
    <div class="gunsnroses_gnr">
        <a href="playlist.php?page=gunsNroses"><img src="img/gunsnroses.jpg" alt="pic of guns n roses" class="poster_imd gunsnrosesImg_imd"></a>
    </div>
</div>
<?php
}
// to make the one you use the top one
function  htmlACDC()
{
?>
<div class="poster_posters">
    <div class="ACDC_gnr">
        <a href="playlist.php?page=ACDC"><img src="img/ACDC.jpg" alt="pic of ACDC" class="poster_ACDC ACDCimg_ACDC"></a>
    </div>
    <div class="gunsnroses_gnr">
        <a href="playlist.php?page=gunsNroses"><img src="img/gunsnroses.jpg" alt="pic of guns n roses" class="poster_ACDC gunsnrosesImg_ACDC"></a>
    </div>
    <div class="ironMaiden_gnr">
        <a href="playlist.php?page=ironMaiden"><img src="img/ironMaiden.jpg" alt="pic of iron maiden" class="poster_ACDC ironMaidenImg_ACDC"></a>
    </div>
</div>
<?php
}

// so if they didnt fill all of it in
function registerResult()
{
    // to check
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to make the valuebles useable
        extract($_POST);

        // to make one
        if($r_firstname != "" && $r_lastname != "")
        {
            $r_fullname = $r_firstname . " " . $r_lastname;
        }
        else
        {
            $r_fullname = "";
        }

        // so i can put all of them in the array
        $errors = array();
        // if they didnt fill in 
        if($r_fullname == "")
        {
            $errors[] = "Fill in your (full) name";
        }
        if($r_age == "")
        {
            $errors[] = "Fill in your age";
        }
        if($r_email == "")
        {
            $errors[] = "Fill in your E-Mail";
        }
        if($r_number == "")
        {
            $errors[] = "Fill in your phone number";
        }
        if($r_username == "")
        {
            $errors[] = "fill in your username";
        }
        if($r_password == "")
        {
            $errors[] = "fill in your password";
        }

        // If person hasn't filled in everything, all filled in info becomes empty strings
        if($r_fullname == "" || $r_age == "" || $r_email == "" || $r_number == "" || $r_username == "" || $r_password == "")
        {
            $r_fullname = "";
            $r_age = "";
            $r_email = "";
            $r_number = "";
            $r_username = "";
            $r_password = "";
        }
        if(isset($errors) && count($errors) > 0)
        {
            echo "<h3>Please...</h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
        }
        else
        {
            
           echo "<h3>you made an accound <br />click <a href='login.php'>here</a> to login</h3>";
            
        }
        
    }
}

function loginResult()
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to extract and make variable
        extract($_POST);

        // so i can put them in array
        $errors = array();
        if($l_username == "")
        {
            $errors[] = "fill in your username";
        }
        if($l_password == "")
        {
            $errors[] = "Fill in your password";
        }

        // If person hasn't filled in everything, all filled in info becomes empty strings
        if($l_username == "" || $l_password == "")
        {
            $l_username = "";
            $l_password = "";
        }
        if(isset($errors) && count($errors) > 0)
        {
            echo "<h3>Please...</h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
        }
        // if it worked
        else
        {
            
           echo "<h3>successfully logged in</h3>";
            
        }
        
    }
}
function login()
{
    ?>
    <form action="mysqlLogin.php" method="POST">
        <div id="login">
            <label>username</label>
            <div class="inputname">
                <input type="text" id="username" name="l_username" required="required"/><br />
            </div>
            <div class="password">
                <label>password</label><br />
            </div>
            <div class="inputpassword"> 
                <input type="password" id="password" name="l_password" required="required"/><br />
            </div>
            <div class="buttons">
                <input type="submit" value="login" class="submit" />
                <input type="button" onclick='window.location="login.php"' value="reset" class="reset" />
            </div>
            <p>make a account <a href="playlist.php?page=register">here</a></p>
            <?php
            //to check if they filled everything in
            loginResult()
            ?>
        </div>
    </form>
    <?php
}
function register()
{
    ?>
    <form class="loginForm" action="mysqlRegister.php" method="POST">
        <div class="register">
            <label>Name</label>
            <div class="r_name">
                <input type="text" placeholder="First" name="r_firstname" class="r_firstname" required="required"/>
                <input type="text" placeholder="Last" name="r_lastname" class="r_lastname" required="required"/>
            </div>
    
            <div class="byside">
                <label class="age">Year of birth</label>
                <label class="lblgender">Gender</label>
            </div>

            <div class="byside">
                <input type="date" placeholder="0" class="number" min="0" name="r_age" required="required"/>
        
                <select name="r_gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
    
            <label>E-mail</label>
            <input type="email" placeholder="example@outlook.com" name="r_email" required="required"/>
    
            <label>Phone number</label>
            <input type="tel" placeholder="+31 06 123456578" name="r_number" required="required"/>
    
            <div class="r_user">
                <label class="r_username">Username</label>
                <label class="r_password">Password</label>
            </div>

            <div class="r_inputuser">
                <input type="text" name="r_username"class="r_submit" required="required"/>
                <input type="password" name="r_password" required="required"/>
            </div>
            <div class="buttons">
                <input type="submit" value="register" class="submit" name="r_submit" />
                <input type="button" onclick='window.location ="register.php"' value="reset" class="reset" name="r_reset" />
            </div>
            <div >
            <?php
            // to check if they filled everything in
            registerResult();
            ?>
            </div>
        </div>
    </form>
    <?php
}
function contactResult()
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // All names become variables
        extract($_POST);

        if($contactPage_formFirstName != "" && $contactPage_formSurname != "")
        {
            $contactPage_formName = $contactPage_formFirstName . " " . $contactPage_formSurname;
        }
        else
        {
            $contactPage_formName = "";
        }

        // so i can put them in the array
        $errors = array();
        if($contactPage_formName == "")
        {
            $errors[] = "Fill in your (full) name";
        }
        if($contactPage_formEmail == "")
        {
            $errors[] = "Fill in your E-Mail";
        }
        if($contactPage_formPhone == "")
        {
            $errors[] = "Fill in your phone number";
        }
        if($contactPage_formMessage == "")
        {
            $errors[] = "Fill in the message you wish to send";
        }

        // If person hasn't filled in everything, all filled in info becomes empty strings
        if($contactPage_formName == "" || $contactPage_formEmail == "" || $contactPage_formPhone == "" || $contactPage_formMessage == "")
        {
            $contactPage_formName = "";
            $contactPage_formEmail = "";
            $contactPage_formPhone = "";
            $contactPage_formMessage = "";
        }
        if(isset($errors) && count($errors) > 0)
        {
            echo "<h3>Please...</h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
        }
        else
        {
            echo "<h3 class='contactPage_formMessageSentText'>thank you $contactPage_formName for contacting the patio radio</h3>";
        }
    }
}
function htmlFoot()
{
    ?>
    <div style="clear: both;"></div>
    </div>
        <footer>                        <!-- to show da date -->
        &copy; pattje72 | <?php echo date("l, d F Y", time()); ?>
    </footer>
    </body>
    </html>
    <?php
}
?>