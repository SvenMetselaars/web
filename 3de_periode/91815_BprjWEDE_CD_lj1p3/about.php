<?php
include("inc/functions.php");
htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 6);
?>
<div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>about us</h2>
            </div>
            <form action="" method="POST" autocomplete="off">
                <?php
                // to display the about (out of data baze)
                displayAbout()
                ?>
            </form>
        </div>
    </div>
<?php
htmlFoot("footer");
?>