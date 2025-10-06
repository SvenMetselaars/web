<?php
include("inc/functions.php");

htmlhead("navbar","img/unorderd/GameWorld.png", "pickedbutton", 4);

if ($_GET['page'] == "index")
{
    echo "<div class='blogPage'>";
    // display all blogs
    displayBlog();
    // display the choises of category
    displayCategoryChoice();
    echo "</div>";
}
elseif($_GET['page'] == "create")
{
    ?>
    <div class="register_page">
        <div class="register">
            <div class="r_banner">
                <img src="img/unorderd/background_pic.jpg">
                <h2>Leave a blog here!</h2>
            </div>
            <form action="" method="POST" autocomplete="off" >
                <h1>create Blog</h1>
                <input type="text"     placeholder="title"                name="B_Title"                required/>
                <input type="text"     placeholder="Author Name"                name="B_Name"          required/>
                <input list="categorys" name="B_categorys" placeholder="category" required/>
                <datalist id="categorys">
                    <option value="new product">
                    <option value="product">
                    <option value="console">
                </datalist>
                <textarea name="B_Textarea" rows="5" cols="75" placeholder="type message here" required></textarea>
                <input type="submit"    value="Contact us"                  name="loginButton"          />
                <?php
                // to check if they filled in corectly
                checkBlog();
                ?>
            </form>
        </div>
    </div>
    <?php
    // display category choise
    displayCategoryChoice();
}
else
{
    // display blog
    displayBlog();
    // display category choise
    displayCategoryChoice();
}

htmlFoot("footer");
?>