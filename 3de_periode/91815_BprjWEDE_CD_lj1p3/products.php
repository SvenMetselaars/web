<?php
include("inc/functions.php");
if($_GET['product'] == "index")
{
htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 2);
?>
<div class="bannerall">
    <img src="img/unorderd/bannerall.jpg" class="banner"/>
</div>
<?php
banners();
htmlFoot("footer");
}
elseif($_GET['product'] == "switch")
{
    htmlhead("navbarSwitch", "img/unorderd/GameWorldswitch.png", "pickedbuttonSwitch", "2switch");
    ?>
    <div class="bannerconsoles">
        <img src="img/unorderd/nintendobanner.jpg" class="banner">
    </div>
    <?php
    products(1, "productsswitch", "productswitchimg", "productsswitchinfo");
    htmlFoot("footerswitch");
}
elseif($_GET['product'] == "ps5")
{
    htmlhead("navbarPs5", "img/unorderd/GameWorldps5.png", "pickedbuttonPs5", "2switch");
    ?>
    <div class="bannerconsoles">
        <img src="img/unorderd/ps5banner.jpg" class="banner">
    </div>
    <?php
    products(2, "productsps5", "productps5img", "productsps5info");
    htmlFoot("footerPs5");
}
elseif($_GET['product'] == "xbox")
{
    htmlhead("navbarXbox", "img/unorderd/GameWorldxbox.png", "pickedbuttonXbox", "2switch");
    ?>
    <div class="bannerconsoles">
        <img src="img/unorderd/xboxbanner.jpg" class="banner">
    </div>
    <?php
    products(3, "productsxbox", "productxboximg", "productsxboxinfo");
    htmlFoot("footerXbox");
}
elseif ($_GET['product'] <= 10)
{
    htmlhead("navbarSwitch", "img/unorderd/GameWorldswitch.png", "pickedbuttonSwitch", "2switch");
    echo "<div class='topsideswitch'>";
    infogame("priceratingswitch");
    shoppingcart("shoppingpartswitch");
    echo "</div>";
    displayRandomcategory();
    htmlFoot("footerswitch");
}
elseif(($_GET['product'] <= 20) && ($_GET['product'] >= 11))
{
    htmlhead("navbarPs5", "img/unorderd/GameWorldps5.png", "pickedbuttonPs5", "2ps5");
    echo "<div class='topsideps5'>";
    infogame("priceratingps5");
    shoppingcart("shoppingpartps5");
    echo "</div>";
    displayRandomcategory();
    htmlFoot("footerPs5");
}
elseif(($_GET['product'] <= 30) && ($_GET['product'] >= 21))
{
    htmlhead("navbarXbox", "img/unorderd/GameWorldxbox.png", "pickedbuttonXbox", "2xbox");
    echo "<div class='topsidexbox'>";
    infogame("priceratingxbox");
    shoppingcart("shoppingpartxbox");
    echo "</div>";
    displayRandomcategory();
    htmlFoot("footerXbox");
}

?>