<?php
// to start the session
session_start();
// if they aare null not any more!!!1!
if (!isset($_SESSION['loggedin'])) 
{
    $_SESSION["loggedin"] = false;
}
if (!isset($_SESSION['cart'])) 
{
    $_SESSION['cart'] = array();
}
$_SESSION["loggedin"];
function htmlhead($A, $B, $C, $uriself)
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
    <script src="javascript/script.js"></script>
    <link rel="stylesheet" href="css/main.css">      
    <title>GameWorld</title>
</head>
<body>
    <?php
    // to change it bassed on the page they are on
    echo  "<div class='$A'>"
    ?>
        <header>
            <div class="Logo">
                <!-- the home button and picture -->
                <?php
                // to change it bassed on the page they are on
                echo "<a href='index.php?category=index'><img src='$B' height='40px'></a>"
                ?>
            </div>
        </header>
        <nav>
            <div class="navbuttons">
                <?php
                $uri = $_SERVER['REQUEST_URI'];
                $productUri = "/3de_periode/91815_BprjWEDE_CD_lj1p3/products.php?product=index";
                $switchUri = "/3de_periode/91815_BprjWEDE_CD_lj1p3/products.php?product=switch";
                $ps5Uri = "/3de_periode/91815_BprjWEDE_CD_lj1p3/products.php?product=ps5";
                $xboxUri = "/3de_periode/91815_BprjWEDE_CD_lj1p3/products.php?product=xbox";
    	        $x = 0;
                // to get the information individuali
                foreach ($navs as $key => $nav)
                {
                    // to check based on what page they are on so i can higlight
                    $x++;
                    // if they are on the home page
                    if($uri == "/3de_periode/91815_BprjWEDE_CD_lj1p3/")
                    {
                        if($x == 1)
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='$C'"?>><?php echo $nav['nav_name']?></a>
                            <?php 
                        }
                        else
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                            <?php  
                        }
                    }
                    // if they are are on the higligh page (i gave the number with at the php)
                    elseif($uriself == $nav['nav_id'])
                    {
                        // if they are not logged in
                        if($_SESSION['loggedin'] == false)
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='$C'"?>><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                        // if they are logged in there is a logo
                        elseif($_SESSION['loggedin'] == true && 7 == $nav['nav_id'])
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='pickedbuttonimg'"?>><img src="<?php echo $nav['nav_img']?>" class="userimg"></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='$C'"?>><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                    }
                    // if it is not the console page
                    elseif($uri != $switchUri && $nav['nav_link'] != $productUri || $uri != $ps5Uri && $nav['nav_link'] != $productUri || $uri != $xboxUri && $nav['nav_link'] != $productUri)
                    {
                        // same as above
                        if($_SESSION['loggedin'] == false)
                        {
                            // to get the info out the database
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                        elseif($_SESSION['loggedin'] == true && 7 == $nav['nav_id'])
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='navbarbuttonsimg'"?>><img src="<?php echo $nav['nav_img']?>" class="userimg"></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a href="<?php echo $nav['nav_link']?>" <?php echo "class='navbarbuttons'"?>><?php echo $nav['nav_name']?></a>
                            <?php
                        }
                        
                    }
                    // if it is the console page
                    elseif($uriself == "2switch" || $uriself == "2ps5" || $uriself == "2xbox")
                    {
                        ?>
                        <a href="<?php echo $nav['nav_link']?>" <?php echo "class='$C'"?>><?php echo $nav['nav_name']?></a>
                        <?php
                    } 
                    // if not 
                    else
                    {
                        ?>
                        <a href="<?php echo $nav['nav_link']?>" class='navbarbuttons'><?php echo $nav['nav_name']?></a>
                        <?php
                    }                                  
                } 
                ?>                                      
            </div>    
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
// function to get orders from the database
// will return an array with info of orders
function getOrders()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM orders";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $orders = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $orders;
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
    $data = "GameWorld";
    // connect
    $mysqli = new mysqli($host, $user, $pass, $data);
    // check connection
    if($mysqli->connect_errno)
    {
        die("connection with database " . $data . " failed!!");
    } 
    return $mysqli;
}

function getproducts()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM products";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $products = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $products;
}
function getcategorys()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM category";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $Categorys = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $Categorys;
}
function getusers()
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
function displayimg()
{
    ?>
    <div class="carousel">
        <!-- i change the class bassed on how much times you clicked the button -->
        <button onclick="productImageCarousel_Prev()" class="pbxButton"><h2><img src="img/unorderd/arrowLeft.png" width="35px" height="35px"></h2></button>
        <video class="productViewCenterCarousel-image productViewCenterCarousel-image--expanded" src="img/<?php echo $_GET['product'] ?>/0.mp4" controls muted autoplay> </video>
        <img class="productViewCenterCarousel-image" src="img/<?php echo $_GET['product'] ?>/1.jpg">
        <img class="productViewCenterCarousel-image" src="img/<?php echo $_GET['product'] ?>/2.jpg">
        <button onclick="productImageCarousel_Next()" class="pbxButton"><h2><img src="img/unorderd/errowRight.png" width="35px" height="35px"></h2></button>
    </div>
    <?php
}
// to show 6 random games
function displayRandomProductDiv($rndmNmbr1, $rndmNmbr2, $class1, $class2, $class3)
{
    // get info
    $Products = getproducts();
    // 2 random games
    $randomProductID = rand($rndmNmbr1,$rndmNmbr2);
    $randomProductID2 = rand($rndmNmbr1,$rndmNmbr2);
    // while the 2 are the same change again
    while($randomProductID == $randomProductID2)
    {
        $randomProductID = rand($rndmNmbr1,$rndmNmbr2);
    }

    // to show them
    foreach($Products as $key => $Product)
    {
        if ($Product["product_id"] == $randomProductID || $Product["product_id"] == $randomProductID2)
        {
            product($class1, $class2, $class3, $Product);
        }
    }
}

//diferent category show
function displaycategory()
{
    // to get the diferent categorys
    $Categorys = getcategorys();
    $uri = $_SERVER['REQUEST_URI'];
    //if itisi index page
    if($uri == "/3de_periode/91815_BprjWEDE_CD_lj1p3/")
    {
        // to stay at bottom if pressed
        ?>
        <a href="index.php?category=index#bottom" class='pickedbutton'>no filter</a>
        <?php
        // to display the categorys
        foreach($Categorys as $key => $Category)
        {
            ?>
            <a href="index.php?category=<?php echo $Category['category_id']?>#bottom" class="navbarbuttons"><?php echo $Category['category_name'] ?></a>
            <?php
        }
    }
    // if your sill on the index page the  same happens
    elseif($_GET['category'] == "index")
    {
        ?>
        <a href="index.php?category=index#bottom" class='pickedbutton'>no filter</a>
        <?php
        foreach($Categorys as $key => $Category)
        {
            ?>
            <a href="index.php?category=<?php echo $Category['category_id']?>#bottom" class="navbarbuttons"><?php echo $Category['category_name'] ?></a>
            <?php
        }
    }
    else 
    {
        // if your not on the category page same happens this isnt in the databaze
        ?>
        <a href="index.php?category=index#bottom" class="navbarbuttons">no filter</a>
        <?php

        foreach($Categorys as $key => $Category)
        {
            // to higlight the one that is pressed
            if($_GET['category'] == $Category['category_id'])
            {
                ?>
                <a href="index.php?category=<?php echo $Category['category_id']?>#bottom" class='pickedbutton'><?php echo $Category['category_name'] ?></a>
                <?php
            }
            // to not highligh the one that are not pressed
            else
            {
                ?>
                <a href="index.php?category=<?php echo $Category['category_id']?>#bottom" class='navbarbuttons'><?php echo $Category['category_name'] ?></a>
                <?php
            }
        }
    }
}
function createacount()
{
    $users = getusers();
    // to check
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to make the valuebles useable
        extract($_POST);

        // to make one
        if($R_UserFirstName != "" && $R_loginUserLastName != "")
        {
            $r_fullname = $R_UserFirstName . " " . $R_loginUserLastName;
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
        if($R_UserMail == "")
        {
            $errors[] = "Fill in your E-mail";
        }
        if($R_UserTown == "")
        {
            $errors[] = "Fill in the town you live in";
        }
        if($R_UserPostalCode == "")
        {
            $errors[] = "Fill in your postal code";
        }
        if($R_UserStreetName == "")
        {
            $errors[] = "fill in the street you live in";
        }
        if($R_UserHouseNumber == "")
        {
            $errors[] = "fill in your housenumber";
        }
        if($R_UserPhoneNumber == "")
        {
            $errors[] = "fill in your phone number";
        }
        if($R_UserPassword == "")
        {
            $errors[] = "fill in your password";
        }
        if($R_UserPasswordConfirm == "")
        {
            $errors[] = "confirm your password";
        }
        if($R_UserPassword != $R_UserPasswordConfirm)
        {
            $errors[] = "the passwords are not the same";
        }
        foreach($users as $key => $user)
        {
            if($R_UserMail == $user['user_mail'])
            {
                $errors[] = "this email is already used";
            }

        }

        if(isset($errors) && count($errors) > 0)
        {
            echo"<form>";
            echo "<div><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "<li><a href='login.php?page=register'>try again</a></li>";
            echo "</ul>";
            echo "</h3></div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        else
        {
            // to set their defealt role
            $role = "customer";
            // to get all the veriables
            extract($_POST);
            
            //databaze conection
            $host = "localhost";
            $dbname = "gameworld";
            $username = "root";
            $password = "";
        
            $conn = mysqli_connect($host, $username, $password, $dbname);
        
            if (mysqli_connect_errno())
            {
                die("Connection error: " . mysqli_connect_error());
            }
        
            // to make it ready to put it into it
            $sql = "INSERT INTO users (user_firstname, user_lastname, user_mail, user_town, user_postalcode, user_street, user_housenumber, user_phonenumber, user_password, user_role)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
            // to prepare it for dengarus itmes
            $stmt = mysqli_stmt_init($conn);
        
            if (! mysqli_stmt_prepare($stmt, $sql))
            {
                die(mysqli_error($conn));
            }
        
            // to encript the password
            $R_UserPassword = md5($R_UserPassword);
            
            // to say what eacht item is string or int and what it is
            mysqli_stmt_bind_param($stmt, "sssssssiss",
            $R_UserFirstName,
            $R_loginUserLastName,
            $R_UserMail,
            $R_UserTown,
            $R_UserPostalCode,
            $R_UserStreetName,
            $R_UserHouseNumber,
            $R_UserPhoneNumber,
            $R_UserPassword,
            $role
            );
        
            // to do the commant
            mysqli_stmt_execute($stmt);
        
            // to say they requesed a account
            echo "<form>";
            echo "<div>";
            echo "<h2>account made.</h2>";
            echo "</div>";  
            echo "</form>";      
        }
        
    }
}

function loginResult()
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>Login here!</h2>
            </div>
            <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to extract and make variable
        extract($_POST);

        // so i can put them in array
        $errors = array();
        if($L_UserMail == "")
        {
            $errors[] = "fill in your username";
        }
        if($L_UserPassword == "")
        {
            $errors[] = "Fill in your password";
        }

        // If person hasn't filled in everything, all filled in info becomes empty strings
        if($L_UserMail == "" || $L_UserPassword == "")
        {
            $L_UserMail = "";
            $L_UserPassword = "";
        }
        if(isset($errors) && count($errors) > 0)
        {
            echo "<form>";
            echo "<div class='submitted'><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "<li><a href='login.php?page=login'>try again</a></li>";
            echo "</ul>";
            echo "</h3></div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        // if it worked
        else
        {
            // to say they arent logged in
            $_SESSION['loggedin'] = false;
            // to get stuff out of the databaze
            $users = getusers();
            // to encript the password
            $L_UserPassword = md5($L_UserPassword);
            foreach($users as $key => $user)
            {
                // to put info in the session and later use it to say its true
                if($user['user_mail'] == $L_UserMail && $L_UserPassword == $user['user_password'])
                {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $user['user_id'];
                }
            }
            
            if($_SESSION['loggedin'] == true)
            {
                // if it worked they get this
                echo "<form>";
                echo "<div>";
                echo "<h3>successfully logged in</h3>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            elseif($_SESSION['loggedin'] == false)
            {
                // if not this
                echo "<form>";
                echo "<div>";
                echo "<ul>";
                echo "<li><h3>wrong username or password</h3></li>";
                echo "<li><a href='login.php?page=login'>try again</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }            
        }        
    }
    else
    {
            ?>
                <form action="" method="POST" autocomplete="off">
                    <h1>Login</h1>
                    <input type="email"     placeholder="E-Mail"                name="L_UserMail"                   />
                    <input type="password"  placeholder="Password"          name="L_UserPassword"                   />
                    <input type="submit"    value="Sign Up"                     name="loginButton" />
                    <h2>dont have an acount yet? <a href="login.php?page=register">register Here!</a></h2>
                </form>
            </div>
        </div>
        <?php
    }
}

function displaygamecategory()
{
    // this besicly counts the amount of games and choses a random number from them and only show 5 so if there are 13 games and the numer is 5 the showed games are 5 6 7 8 9
    $Products = getproducts();
    $Categorys = getcategorys();
    $counting = 0;
    $counting2 = 0;
    $countingproducts = 0;
    $randomProductID = 1;
    $randomproductID2 = 100;
    $randomproductID3 = 0;
    foreach($Products as $key => $Product)
    {
        if($_GET['category'] == "3") 
        {
            foreach($Products as $key => $Product)
            {
                if($Product['product_category_id'] == 3)
                {
                    $countingproducts++;
                }  
            }
            if($countingproducts >= 6)
            {
                $randomProductID = rand(1,$countingproducts);
                $randomProductIDcopy = $randomProductID;
                while($countingproducts < $randomProductIDcopy + 5)
                {
                    $randomProductIDcopy--;
                    $randomproductID3++;
                    $randomproductID2 = 0;
                }
            }
            foreach($Products as $key => $Product)
            {
                if($Product['product_category_id'] == 3)
                {
                    $randomProductID++;
                    $randomproductID2++;
                    $counting2++;
                    if($randomProductID != $counting2)
                    {
                        $randomProductID--;
                    }
                    if(($randomProductID == $counting2) || ($randomproductID2 <= $randomproductID3))
                    {
                        $counting++;                
                        if($counting <= 5)
                        {
                            if($Product['product_id'] <= 10)
                            {
                                $class1 = "productsswitch"; $class2 = "productswitchimg"; $class3 = "productsswitchinfo";                
                            }
                            elseif(($Product['product_id'] <= 20) && ($Product['product_id'] >= 11))
                            {
                                $class1 = "productsps5"; $class2 = "productps5img"; $class3 = "productsps5info";
                            }
                            elseif(($Product['product_id'] <= 30) && ($Product['product_id'] >= 21))
                            {
                                $class1 = "productsxbox"; $class2 = "productxboximg"; $class3 = "productsxboxinfo";
                            }
                            product($class1, $class2, $class3, $Product);
                        }
                    }
                }     
            }
        }
        elseif($_GET['category'] == $Product['product_category_id'])
        {
            if($Product['product_id'] <= 10)
            {
                $class1 = "productsswitch"; $class2 = "productswitchimg"; $class3 = "productsswitchinfo";                
            }
            elseif(($Product['product_id'] <= 20) && ($Product['product_id'] >= 11))
            {
                $class1 = "productsps5"; $class2 = "productps5img"; $class3 = "productsps5info";
            }
            elseif(($Product['product_id'] <= 30) && ($Product['product_id'] >= 21))
            {
                $class1 = "productsxbox"; $class2 = "productxboximg"; $class3 = "productsxboxinfo";
            }
            product($class1, $class2, $class3, $Product);
        }
    }
}

function accountinfo()
{
    // to display account info
    $users = getusers();
    foreach($users as $key => $user)
    {
        // to get the right info from the right account
        if($user['user_id'] == $_SESSION['user_id'])
        {
            echo "<p>"; 
            echo $user['user_firstname'] . " " . $user['user_lastname'] . "<br>";
            echo $user['user_mail'] . "<br>"; 
            echo $user['user_phonenumber'] . "<br>";
            echo $user['user_postalcode'] . " " . $user['user_town'] . "<br>"; 
            echo $user['user_street'] . " " . $user['user_housenumber'] . "<br>";  
            echo $user['user_role'];
            echo "</p>";
            if ($user['user_role'] == "owner")
            {
                ?>
                <a href="astroidenator/astroidenator_APPR.zip" download="astroidenator_APPR.zip">Download Astroidenator</a>
                <?php
            }
        }
    }
}

function getAbout()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM about";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $abouts = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();


    // return the array
    return $abouts;
}

// do i realy need to explain this?
function displayAbout()
{
    $abouts = getAbout();
    foreach($abouts as $key => $about)
    {
        echo "<h3>" . $about['about_text'] . "</h3>";
    }
}

// to show the items a user has baught
function seeboughtitmes()
{
    echo"<div class='maincontainerbought'>";
    $Products = getproducts();
    $Orders = getOrders();
    // they check the orders
    foreach($Orders as $key => $Order)
    {
        // see if the user id is the same as the logged in user id in session
        if($_SESSION['user_id'] == $Order['order_user_id'])
        {
            // to get every product individualy
            foreach($Products as $key => $Product)
            {
                // to show the right product
                if($Product['product_id'] == $Order['order_product_id'])
                {
                    // to show the right color for each game 
                    if($Product['product_id'] <= 10)
                    {
                        $class1 = "productinfocartswitch";               
                    }
                    elseif(($Product['product_id'] <= 20) && ($Product['product_id'] >= 11))
                    {
                        $class1 = "productinfocartps5";
                    }
                    elseif(($Product['product_id'] <= 30) && ($Product['product_id'] >= 21))
                    {
                        $class1 = "productinfocartxbox";
                    }
                    echo "<div class='$class1'>";
                        echo "<div>";
                        ?> <img src=" <?php echo $Product['product_img'] ?>" class="shoppingcartimg"> <?php
                        echo "</div>";
                        echo "<div class='producttextcart'>";
                            echo "<h2>" . $Product['product_name'] . "</h2>";
                            echo "Amount: " . $Order['order_product_amount'] . "<br /> <br />";
                            echo "Total price: " . $Order['order_product_price']; 
                        echo "</div>";
                    echo "</div>";       
                }
            }
        }
    }
    echo "</div>";
}

function shoppingcartgames()
{

    echo "<div class='shoppingcartgames'>";    
        // to check if there is something in the cart
        if(!empty($_SESSION['cart']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                // to show the right color per console
                if($value['id'] <= 10)
                {
                    $class1 = "productinfocartswitch";               
                }
                elseif(($value['id'] <= 20) && ($value['id'] >= 11))
                {
                    $class1 = "productinfocartps5";
                }
                elseif(($value['id'] <= 30) && ($value['id'] >= 21))
                {
                    $class1 = "productinfocartxbox";
                }
                echo "<div class='$class1'>";
                    echo "<div class='shoppingCartImgs'>";
                    ?> <img src=" <?php echo $value['img'] ?>" class="shoppingcartimg"> <?php
                    echo "</div>";
                    echo "<div class='producttextcart'>";
                        echo "<h2>" . $value['name'] . "</h2>";
                        echo "Amount: " . $value['amount'] . "<br /> <br />";
                        echo "<div class='shoppingcartFlex'>Total price: " . $value['price']; 
                        ?> <button onclick='window.location="winkelwagen.php?product=remove&id=<?php echo $value["id"]?>"'>remove</button></div> <?php
                        clearcart();
                    echo "</div>";
                echo "</div>";
            }
        }
        // if the cart is empty
        else
        {
            echo "<div class='emptycart'>";
            echo "<h2>shopping cart is empty</h2>";
            echo "</div>";
        }
    
    echo "</div>";  
    
}


function shoppingcartbuy()
{
    $totalprice = 0;
    $shippingcost = 20;
    /// if the cart is not empty
    if(!empty($_SESSION['cart']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            // calculate normal price
            $totalprice = $totalprice + $value['price'];
        }
    }

    if($totalprice > 100)
    {
        $shippingcost = 0;
    }

    // normal diispaly
    echo "<div class='containerinfo'>";
    echo "<p>total price:</p>";
    echo "<p>" . $totalprice . "</p>";
    echo "</div> <div class='containerinfo'>";
    echo "<p>shipping cost:</p>";
    echo "<p>" . $shippingcost . "</p>";
    echo "</div>";
    echo "<div class='containerinfo'>";
    ?>
    <form class="loginForm" action="" method="POST" autocomplete="off">
        <input type="text" min="1" placeholder="gift card ode" name="giftcardcode" />
        <br>
        <input type="submit" value="use" class="submitcard" name="r_submit" />    
        <?php
        // to check if the giftcard code worked
            $moneyof = giftcardcheck();
            $totalprice = $totalprice + $shippingcost - $moneyof;
        ?>
    </form>
    <?php
    echo "</div>";
    // it cant be below 0
    if($totalprice <= 0)
    {
        $totalprice = 0;
    }

    echo "<div class='containerinfo'>";
    echo "<p>amount on gift cart:</p>";
    echo "<p>" . $moneyof . "</p>";
    echo "</div><div class='containerinfo getdown'>";
    echo "<p>pay amount:</p>";
    echo "<p>" . $totalprice . "</p>";
    echo "</div>";
    ?>
    <a href="winkelwagen.php?product=addtobaze" class="orderNowA">order now</a>
    <?php   
}

function addtodatabaze()
{
    // if the cart is empy it skipps all this
    if (!empty($_SESSION['cart']))
    {
        //databaze conection
        $host = "localhost";
        $dbname = "gameworld";
        $username = "root";
        $password = "";

        foreach($_SESSION['cart'] as $key => $value)
        {
            // calculation
            $order_product_id = $value['id'];
            $order_product_amount = $value['amount'];
            $order_product_price = $value['price'];
            $user_id = $_SESSION['user_id'];
            $order_date = date("l, d F Y", time());

            // conectino
            $conn = mysqli_connect($host, $username, $password, $dbname);
            
            // if conection failed it as to shut off
            if (mysqli_connect_errno())
            {
                die("Connection error: " . mysqli_connect_error());
            }
    
            // to makt it redy
            $sql = "INSERT INTO orders (order_user_id, order_product_id, order_product_amount, order_product_price, order_date)
                    VALUES(?, ?, ?, ?, ?)";
    
    // to prepare it for dangeres inputs
            $stmt = mysqli_stmt_init($conn);
    
            if (! mysqli_stmt_prepare($stmt, $sql))
            {
                die(mysqli_error($conn));
            }
            
            // to  say what eacht thingg is
            mysqli_stmt_bind_param($stmt, "iiiis",
            $user_id,
            $order_product_id,
            $order_product_amount,
            $order_product_price,
            $order_date
            );
    
            // to put it in databaze
            mysqli_stmt_execute($stmt);

            // empty the cart
            unset($_SESSION['cart'][$key]);
        }
    }
    header("Location: winkelwagen.php?product=index");
}

function giftcardcheck()
{
    // to check if the giftcart code worked
    $moneyof = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        extract($_POST);
        if($giftcardcode == "ilikemonkey") 
        {
            $moneyof = 10;
        }
        elseif($giftcardcode == "pattje72") 
        {
            $moneyof = 99999;
        }
        elseif($giftcardcode == "oimeneer") 
        {
            $moneyof = 100;
        } 
    } 
    return $moneyof;
}

function clearcart()
{
    // if they clicked the remove button they get in here
    if($_GET['product'] == "remove")
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            // to check if they are the same 
            if($value['id'] == $_GET['id'])
            {
                // to unsett only this one
                unset($_SESSION['cart'][$key]);
                // to switch back to page so it can lode
                header("Location: winkelwagen.php?product=index");
            }
        }
    }
}

function shoppingcart($class1)
{  
    // to display the carousel
    displayimg();
    // get info from databaze
    $users = getusers();
    $Products = getproducts();
    echo "<div class='$class1'>";
    // to show product price
    foreach($Products as $key => $Product)
    {
        if($_GET['product'] == $Product['product_id'])
        {
            echo "<h2>" . $Product['product_price'] . "</h2>";
        }
    }
    echo "<p>free delivery</p>";
    echo "<p>orderd before 8:00pm next day at <br>your door</p>";
    // if they are not logged in idk where they live
    if($_SESSION["loggedin"] == false)
    {
        echo "<div class='location'><img src='img/unorderd/pin.png' height='25px'>"; 
        echo "<p>???</p></div>";
        echo "<h2>please login first</h2>";
    }
    // if they are logged in i can show there location
    else
    {
        foreach($users as $key => $user)
        {
            if($user['user_id'] == $_SESSION['user_id'])
            {
                echo "<div class='location'><img src='img/unorderd/pin.png' height='25px'>"; 
                echo "<p>" . $user['user_town'] . " " . $user['user_street'] . " " . $user['user_housenumber'] . "</p></div>";
            }
        }
        ?>
        <form class="loginForm" action="" method="POST">
            <input type="number" min="1" placeholder="amount" name="amount" />
            <br>
            <input type="submit" value="add to cart" class="submitcart" name="r_submit" />    
            <?php
                addtocartcheck();
            ?>
        </form>
        <?php
    }

    echo "</div>";
}

function addtocartcheck()
{
    $Products = getproducts();

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Extract and make variable
        extract($_POST);

        // Validation and error handling
        $errors = array();
        if ($amount <= 0) {
            $errors[] = "Fill in an amount";
        }
        // to display errors
        if (isset($errors) && count($errors) > 0) {
            echo "<ul>";
            foreach ($errors as $key => $errorMessage) {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
        } 
        else 
        {
            $gotIt = false;
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['id'] == $_GET['product'])
                {
                    // if the product is already in sesion it is true
                    $gotIt = true;
                }
            }

            // if it is not already in the shoppingcart
            if($gotIt == false)
            {
                // Add to session arrays
                foreach ($Products as $key => $Product) 
                {
                    // to put it in session
                    if ($_GET['product'] == $Product['product_id']) 
                    {
                        // i put it in a array that ii put in a variable
                        $session_array = array(
                            'id' => $Product['product_id'],
                            'name' => $Product['product_name'],
                            'amount' => $amount,
                            'price' => $Product['product_price'] * $amount,
                            'img' => $Product['product_img']
                        );

                        // i put it in a variable and that i put in a session
                        $_SESSION['cart'][] = $session_array;
                    }
                }
                // to display it worked
                echo "<br>Added to shopping cart";
            } 
            else
            {
                // to display it already was in your cart
                echo "<br>already in shopping cart";
            }  
        }
    }
}

// this basicly show 5 random games if the amount is higer than 5 so it makes a randmom amount and counts 5 above that and shows those 5 idk how to explay it
function displayRandomcategory()
{
    $Products = getproducts();
    $Categorys = getcategorys();
    $counting = 0;
    $counting2 = 0;
    $countingproducts = 0;
    $randomProductID = 1;
    $randomproductID2 = 100;
    $randomproductID3 = 0;
    echo "<div class='categorygames'>";
    foreach($Products as $key => $Product)
    {
        if($_GET['product'] == $Product['product_id'])
        {
            $category = $Product['product_category_id'];
        }
    }
    foreach($Products as $key => $Product)
    {
        if(($_GET['product'] != $Product['product_id']) && ($Product['product_category_id'] == $category))
        {
            $countingproducts++;
        }  
    }
    if($countingproducts >= 6)
    {
        $randomProductID = rand(1,$countingproducts);
        $randomProductIDcopy = $randomProductID;
        while($countingproducts < $randomProductIDcopy + 5)
        {
            $randomProductIDcopy--;
            $randomproductID3++;
            $randomproductID2 = 0;
        }
    }
    foreach($Products as $key => $Product)
    {
        if($Product['product_category_id'] == $category)
        {
            $randomProductID++;
            $randomproductID2++;
            $counting2++;
            if($randomProductID != $counting2)
            {
                $randomProductID--;
            }

            if($_GET['product'] == $Product['product_id'])
            {
                $randomproductID2--;
                $counting2--;
            }
            elseif(($randomProductID == $counting2) || ($randomproductID2 <= $randomproductID3))
            {
                $counting++;                
                if($_GET['product'] == $Product['product_id'])
                {
                    $randomProductID--;
                    $counting--;
                }
                elseif($counting <= 5)
                {
                    if($Product['product_id'] <= 10)
                    {
                        $class1 = "productsswitch"; $class2 = "productswitchimg"; $class3 = "productsswitchinfo";                
                    }
                    elseif(($Product['product_id'] <= 20) && ($Product['product_id'] >= 11))
                    {
                        $class1 = "productsps5"; $class2 = "productps5img"; $class3 = "productsps5info";
                    }
                    elseif(($Product['product_id'] <= 30) && ($Product['product_id'] >= 21))
                    {
                        $class1 = "productsxbox"; $class2 = "productxboximg"; $class3 = "productsxboxinfo";
                    }
                    product($class1, $class2, $class3, $Product);
                }
            }
        }     
    }
    echo "</div>";
}

// to show the product with the right collered classes
function product($class1, $class2, $class3, $Product)
{
    ?>
    <div class="<?php echo $class1 ?>">
        <div class="<?php echo $class2 ?>">
            <img src="<?php echo $Product['product_img'] ?>" class="productimg">
            <div class="position">
                <p class="makeWhite"> € <?php echo $Product['product_price'] ?></p>
                <p class="rating makeWhite"><?php echo $Product['product_rating'] ?></p>   
            </div>                        
        </div>
        <div class="<?php echo $class3 ?>">
            <?php
            echo "<p class='makeWhite'>" . $Product['product_name'] . "</p><br>";
            ?>
                <a href="products.php?product=<?php echo $Product['product_id'] ?>" class="buttoncart">product info</a>
            <?php
        echo "</div>";
    echo "</div>";
}

// to display the information aboutt that game
function infogame($class1)
{
    $Products = getproducts();
    $Categorys = getcategorys();

    foreach($Products as $key => $Product)
    {
        // to show the right product infoo on the page it has to be
        if($_GET['product'] == $Product['product_id'])
        {
            ?>
            <div class="infopage">
                <div>
                    <img src="<?php echo $Product['product_img']?>" height="350px">
                </div>
            <?php
            echo "<div class='productinfopage'>";
            echo "<h2>" . $Product['product_name'] . "</h2>";
            echo "<div class='$class1'><h2>" . $Product['product_price'] . "</h2><h2 class='rating'>";
            echo $Product['product_rating'] . "</h2></div>";
            foreach($Categorys as $key => $Category)
            {
                if($Category['category_id'] == $Product['product_category_id'])
                {
                    echo "<p class='fat'>category: </p>";
                    echo $Category['category_name'];
                }
            }
            echo "<p class='fat'>information: </p> <div class='infopageinfo'>" . $Product['product_info'] . "</div></div>";
            echo "</div>";
        }
    }
}

// to dispaly the products but not realy
function products($x, $class1, $class2, $class3)
{
    // function to display the songs
    // each within its own <div></div>
    // will make use of function getSongs()
    $Products = getproducts();
    // loop through array
    echo "<div class='maincontainer'>";
            foreach($Products as $key => $Product)
            {
                // if it gets to ACDC it goes in here
                if($Product['product_console_id'] == $x)
                {       
                    // here the funcion is that showsthe products
                    echo "<div class='productrow'>";
                    product($class1, $class2, $class3, $Product);    
                    echo "</div>";
                } 
            }
    echo "</div>";
}
function getconsoles()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM consoles";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $consoles = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();

    // return the array
    return $consoles;
}
function getBlogs()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM blogs ORDER BY 'blog_date' DESC";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $blogs = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();

    // return the array
    return $blogs;
}

function getBlogsCategory()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM blog_categorys";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $blogs = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();

    // return the array
    return $blogs;
}
function getComments()
{
    // connect with database
    $db = db_connect();
    // the sql string to be sent to the database
    $sql = "SELECT * FROM blog_comments";
    // execute query and store response in $resource
    $resource = $db->query($sql) or die($db->error);
    // fetch data as an associative array
    $comments = $resource->fetch_all(MYSQLI_ASSOC);
    // close the database connection
    $db->close();

    // return the array
    return $comments;
}
// to show the banners
function banners()
{
    ?>
    <div class="banners_div">
        <a href="products.php?product=switch"><img src="img/unorderd/switch.jpg" class="banners bannerswitch"/></a>
        <a href="products.php?product=ps5"><img src="img/unorderd/ps5.jpg" class="banners bannerps5"/></a>
        <a href="products.php?product=xbox"><img src="img/unorderd/xbox.jpg" class="banners bannerxbox"/></a>
    </div>
    <?php
}

// to show the blogs
function displayBlog()
{
    $blogs = getBlogs();
    $blog_categorys = getBlogsCategory();

    echo "<div class='blogs'>";
        foreach($blogs as $key => $blog)
        {
            // if the blog page is normal all of them get show but if there has been picked a category only from that category is shown
            if($_GET['page'] == "index" || $_GET['page'] == $blog['blog_category_id'])
            {
            ?>
                <a href="blogDetails.php?page=<?php echo $blog['blog_id']?>" class="smoll">
            <?php
            echo "<div class='blog'>";
                echo "<h1>" . $blog['blog_title'] . "</h1>";
                echo "<h3> date: " . $blog['blog_date'];
                echo " | author: " . $blog['blog_author'] . " | ";
                foreach($blog_categorys as $key => $category)
                {
                    if ($category['category_id'] == $blog['blog_category_id'])
                    {
                        echo "category: " . $category['category_name'] . "</h3>";
                    }
                }
                echo "<p class='blog_text'>" . $blog['blog_info'] . "</p>";
            echo "</div>";
            echo "</a>";
            }
        }
    echo "</div>";
}

//to show the categorys they can chosse
function displayCategoryChoice()
{
    echo "<div class='blog_category'><h2>category's</h2>";
    ?>
    <a href="blog.php?page=1" class='Black'>new products</a><br>
    <a href="blog.php?page=2" class='Black'>products</a><br>
    <a href="blog.php?page=3" class='Black'>consoles</a>
    <?php
    echo "<div class='createBlogA'>";
    echo "<a href='blog.php?page=create'>create own blog</a>";
    echo "</div>";
    echo "</div>";
}

// to display the details form the blogs
function displayBlogDetail()
{
    $users = getusers();
    $comments = getComments();
    $blogs = getBlogs();
    $blog_categorys = getBlogsCategory();
    foreach($blogs as $key => $blog)
    {
        // to show only that page
        if($blog['blog_id'] == $_GET['page'])
        {
            echo "<div class='blog_Details'>";
                echo "<h1>" . $blog['blog_title'] . "</h1>";
                echo "<h3> date: " . $blog['blog_date'];
                echo " | author: " . $blog['blog_author'];
                foreach($blog_categorys as $key => $category)
                {
                    if ($category['category_id'] == $blog['blog_category_id'])
                    {
                        echo " | category: " . $category['category_name'] . "</h3>";
                    }
                }
                echo "<p class='blog_text'>" . $blog['blog_info'] . "</p>";
            echo "</div>";
            echo "</a>";
        }
    }
    echo "<h2>Comments</h2>"; 
    echo "<div class='commentRow'>";
    foreach ($comments as $key => $comment)
    {
        // to show the comments
        if($comment['comment_blog_id'] == $_GET['page'])
        {
            echo "<div class='blogcomment'>";
            echo "<h2>" . $comment['comment_name'] . "</h2>";
            echo "<p>" . $comment['comment_text'] . "</p>";
            echo "</div>";
        }
    }
    echo "</div>";
    if($_SESSION['loggedin'] == true)
    {
        // so they can leave a comment
        ?>
        <div class="maincontainerComment">
            <form action="" method="POST" autocomplete="off" class="addCommentForm">
                <h1>leave a comment here</h1>
                <?php
                foreach ($users as $key => $user)
                {
                    if($user['user_id'] == $_SESSION['user_id'])
                    {
                        ?>
                        <input type="text"     placeholder="name"                   name="C_Name"            value="<?php echo $user['user_firstname'] . " " . $user['user_lastname'];?>" />
                        <?php
                    }
                }
                ?>
                <textarea rows="5" cols="75" placeholder="type message here" name="TextareaC" ></textarea>
                <input type="submit"    value="leave comment"                  name="loginButton"      />
                <?php
                $blog = $_GET['page']; 
                addcommentdata($blog);
                ?>
            </form>
        </div>
        <?php
    }// if they are not logged in
    else
    {
        echo "<h2>log in to add a comment</h2>";
    }

}

// so they can add a comment on the right blog
function addcommentdata($blog)
{
    // to check
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to make the valuebles useable
        extract($_POST);

        // so i can put all of them in the array
        $errors = array();
        // if they didnt fill in 
        
        if($C_Name == "")
        {
            $errors[] = "please fill in your name";
        }
        if($TextareaC == "")
        {
            $errors[] = "please fill in your comment";
        }

        if(isset($errors) && count($errors) > 0)
        {
            echo"<form>";
            echo "<div><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        // if no erros
        else
        {
            // to get the variables
            extract($_POST);
            
            // to conect to databaze
            $host = "localhost";
            $dbname = "gameworld";
            $username = "root";
            $password = "";
        
            // to connect
            $conn = mysqli_connect($host, $username, $password, $dbname);
        
            // if no connect close
            if (mysqli_connect_errno())
            {
                die("Connection error: " . mysqli_connect_error());
            }
        
            // to set the comment
            $sql = "INSERT INTO blog_comments (comment_blog_id, comment_name, comment_text)
                    VALUES(?, ?, ?)";
        
            // to prepare
            $stmt = mysqli_stmt_init($conn);
        
            // if preperation failed kill
            if (! mysqli_stmt_prepare($stmt, $sql))
            {
                die(mysqli_error($conn));
            }
            
            // to put varibale in databaze
            mysqli_stmt_bind_param($stmt, "iss",
            $blog,
            $C_Name,
            $TextareaC
            );
        
            mysqli_stmt_execute($stmt);
        }
        
    }
}

function checkBlog()
{
    // to check
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to make the valuebles useable
        extract($_POST);

        // so i can put all of them in the array
        $errors = array();
        // if they didnt fill in 
        
        if($B_Title == "")
        {
            $errors[] = "please fill in the title";
        }
        if($B_Name == "")
        {
            $errors[] = "please fill in your name";
        }
        if($B_categorys == "")
        {
            $errors[] = "please fill in a category";
        }
        if(($B_categorys != "new product") && ($B_categorys != "product") && ($B_categorys != "console"))
        {
            $errors[] = "please fill in a category from the list";
        }
        if($B_Textarea == "")
        {
            $errors[] = "please fill in your Blog";
        }

        if(isset($errors) && count($errors) > 0)
        {
            echo"<form>";
            echo "<div><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        else
        {

            $post_date = date("Y-m-d");

            if($B_categorys == "new product")
            {
                $category = 1;
            }
            if($B_categorys == "product")
            {
                $category = 2;
            }
            if($B_categorys == "console")
            {
                $category = 3;
            }
            
            // look up for explenation
            extract($_POST);
            
            $host = "localhost";
            $dbname = "gameworld";
            $username = "root";
            $password = "";
        
            $conn = mysqli_connect($host, $username, $password, $dbname);
        
            if (mysqli_connect_errno())
            {
                die("Connection error: " . mysqli_connect_error());
            }
        
            $sql = "INSERT INTO blogs (blog_title, blog_category_id, blog_author, blog_date, blog_info)
                    VALUES(?, ?, ?, ?, ?)";
        
            $stmt = mysqli_stmt_init($conn);
        
            if (! mysqli_stmt_prepare($stmt, $sql))
            {
                die(mysqli_error($conn));
            }
            
            mysqli_stmt_bind_param($stmt, "sssss",
            $B_Title,
            $category,
            $B_Name,
            $post_date,
            $B_Textarea
            );
        
            mysqli_stmt_execute($stmt);
            
            echo "thank you for leaving a blog";
        }  
    }
}

function checkContact()
{
    // to check
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // to make the valuebles useable
        extract($_POST);

        // so i can put all of them in the array
        $errors = array();
        // if they didnt fill in 
        
        if($C_email == "")
        {
            $errors[] = "please fill in your email";
        }
        if($C_textarea == "")
        {
            $errors[] = "please fill in your message";
        }

        if(isset($errors) && count($errors) > 0)
        {
            echo"<form>";
            echo "<div><h3>";
            echo "<ul>";
            // Loop through all error messages and print each one of them in a list item
            foreach($errors as $key => $errorMessage)
            {
                echo "<li>" . $errorMessage . "</li>";
            }
            echo "</ul>";
            echo "</h3></div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        else 
        {
            echo "thank you for contacting us";
        }
    }
}

function htmlFoot($A)
{
    echo "<footer class='$A'>" 
    ?>                       <!-- to show da date -->
        &copy; pattje72 | <?php echo date("l, d F Y", time()); ?>
    </footer>
    </body>
    </html>
    <?php
}
?>