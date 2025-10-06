<?php
include("inc/functions.php");
htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 7);
if(($_SESSION['loggedin'] == true && $_GET['page'] == "login") || ($_SESSION['loggedin'] == true && $_GET['page'] == "register"))
{
    ?>            
    <div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>Account info</h2>
            </div>
            <form action="login.php?page=logout" method="POST" autocomplete="off">
            <?php
            accountinfo();
            ?>
            <input type="button"    value="see bought items" onclick='window.location="winkelwagen.php?product=bought"'>
            <p>if you log out your shopping cart will be emptyed two</p>
            <input type="submit"    value="log out" name="loginButton" />
            </form>
        </div>
    </div>           
    <?php  
}
elseif($_GET['page'] == "logout") 
{
    session_destroy();
    header("Location: login.php?page=login");
}
elseif($_GET['page'] == "login") 
{
    loginResult();
}
elseif($_GET['page'] == "register")
{
    ?>            
    <div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>Register Here!</h2>
            </div>
            <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        createacount();  
    }
    else
    {
            ?>
                <form action="login.php?page=register" method="POST" autocomplete="off">
                    <h1>Register</h1>
                    <div class="formHalf">
                        <input type="text"      placeholder="First Name"            name="R_UserFirstName"               />
                        <input type="text"      placeholder="Surname"               name="R_loginUserLastName"           />
                    </div>
                    <input type="email"         placeholder="E-Mail"                name="R_UserMail"                    />
                    <div class="formHalf">
                        <input type="text"      placeholder="Town/Village"          name="R_UserTown"                    />
                        <input type="text"      placeholder="Postal Code"           name="R_UserPostalCode"              />
                    </div>
                    <div class="formHalf">
                        <input type="text"      placeholder="Street Name"           name="R_UserStreetName"              />
                        <input type="text"      placeholder="House Number"          name="R_UserHouseNumber"             />
                    </div>
                    <input type="number"        placeholder="Phone Number"          name="R_UserPhoneNumber"             />
                    <div class="formHalf">
                        <input type="password"  placeholder="Password"              name="R_UserPassword"                />
                        <input type="password"  placeholder="Confirm Password"      name="R_UserPasswordConfirm"         />
                    </div>
                    <input type="submit"        value="Sign Up"                     name="loginButton" />
                    <h2>Already have an account? <a href="login.php?page=login">Log in here!</a></h2>
                </form>
            </div>
        </div>
        <?php
    }  
}
htmlFoot("footer");
?>