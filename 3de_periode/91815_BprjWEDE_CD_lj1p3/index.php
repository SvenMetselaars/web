<?php
include("inc/functions.php");
htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 1);
$uri = $_SERVER['REQUEST_URI'];
?>
<div class="bannerall">
    <img src="img/unorderd/bannerall.jpg" class="banner"/>
</div>
<?php
banners();
echo "<div class='categorypicker'>";
displaycategory();
echo "</div>";
if ($uri == "/3de_periode/91815_BprjWEDE_CD_lj1p3/")
{
    echo "<div class='random_games'>";
    displayRandomProductDiv("1", "10", "productsswitch", "productswitchimg", "productsswitchinfo");
    displayRandomProductDiv("11", "20", "productsps5", "productps5img", "productsps5info");
    displayRandomProductDiv("21", "30", "productsxbox", "productxboximg", "productsxboxinfo");
    echo "</div>";
}
elseif($_GET['category'] == "index")
{
    echo "<div class='random_games'>";
    displayRandomProductDiv("1", "10", "productsswitch", "productswitchimg", "productsswitchinfo");
    displayRandomProductDiv("11", "20", "productsps5", "productps5img", "productsps5info");
    displayRandomProductDiv("21", "30", "productsxbox", "productxboximg", "productsxboxinfo");
    echo "</div>";
}
else
{
    echo "<div class='random_games'>";
    displaygamecategory();
    echo "</div>";
}
echo "<br><a id='bottom'></a>";
htmlFoot("footer");
?>