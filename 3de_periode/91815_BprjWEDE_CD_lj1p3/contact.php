<?php
include("inc/functions.php");
htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton" , 5);
?>
    <div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>contact us here!</h2>
            </div>
            <form action="" method="POST" autocomplete="off">
                <h1>contact</h1>
                <input type="email"     placeholder="E-Mail"                name="C_email"                 />
                <textarea name="C_textarea" rows="5" cols="75" placeholder="type message here"></textarea>
                <input type="submit"    value="Contact us"                  name="loginButton"      />
                <?php
                // to check if they filled in qorectly
                checkContact();
                ?>
            </form>
        </div>
    </div>
    <?php
htmlFoot("footer");
?>