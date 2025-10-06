<?php
$result = "";
$slash = "/";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    extract($_POST);

    // if no gender is selected
    if($gender == "gender")
    {
        $result = "please select a gender";
    }
    // if male is selected
    elseif($gender == "male")
    {
        // if first name is empty
        if($first_name == "")  
        {
            $result = "please fill in your first name";
        }  
        // if not empty
        elseif($first_name != "")
        {
            // if last name is empty
            if($last_name == "")
            {
                $result = "please fill in your last name";
            }
            // not empty
            elseif($last_name != "")
            {
                // f website is empty
                if($website == "")
                {
                    $result = "please fill in your favorite website";
                }
                // not empty
                elseif($website != "")
                {
                    // if month is empty
                    if ($birthday_month == "")
                    {
                        $result = "please fill in your month of birth";
                    }
                    // if they try the 13 month
                    elseif($birthday_month > 12)
                    {
                        $result = "please use a posible month number";
                    }
                    // if day is empty
                    elseif($birthday_day == "")
                    {
                        $result = "please fill in your day of birth";
                    }
                    // if they try the 32 day
                    elseif($birthday_day > 31)
                    {
                        $result = "please use a posible day number";
                    }
                    // if year is empty
                    elseif($birthday_year == "")
                    {
                        $result = "please fill in your year of birth";
                    }
                    // if they try the 2024 year
                    elseif($birthday_year > 2023)
                    {
                        $result = "please use a posible year number";
                    }
                    // so they know what they filled in
                    elseif($birthday_month != "" && $birthday_day != "" && $birthday_year != "")
                    {
                        $result = nl2br("hi mister " . $first_name . " " . $last_name . "\n your email is " . $email . "\n your favorite website is " . $website . "\n you are born on " . $birthday_day . $slash . $birthday_month . $slash . $birthday_year);
                    }
                }   
            }
        }
    }
    // if they chose female
    elseif($gender == "female")
    {
        // if first name is empty
        if($first_name == "")  
        {
            $result = "please fill in your first name";
        }  
        // if not empty
        elseif($first_name != "")
        {
            // if last name is empty
            if($last_name == "")
            {
                $result = "please fill in your last name";
            }
            // not empty
            elseif($last_name != "")
            {
                // f website is empty
                if($website == "")
                {
                    $result = "please fill in your favorite website";
                }
                // not empty
                elseif($website != "")
                {
                    // if month is empty
                    if ($birthday_month == "")
                    {
                        $result = "please fill in your month of birth";
                    }
                    // if they try the 13 month
                    elseif($birthday_month > 12)
                    {
                        $result = "please use a posible month number";
                    }
                    // if day is empty
                    elseif($birthday_day == "")
                    {
                        $result = "please fill in your day of birth";
                    }
                    // if they try the 32 day
                    elseif($birthday_day > 31)
                    {
                        $result = "please use a posible day number";
                    }
                    // if year is empty
                    elseif($birthday_year == "")
                    {
                        $result = "please fill in your year of birth";
                    }
                    // if they try the 2024 year
                    elseif($birthday_year > 2023)
                    {
                        $result = "please use a posible year number";
                    }
                    // so they know what they filled in
                    elseif($birthday_month != "" && $birthday_day != "" && $birthday_year != "")
                    {
                        $result = nl2br("hi miss " . $first_name . " " . $last_name . "\n your email is " . $email . "\n your favorite website is " . $website . "\n you are born on " . $birthday_day . $slash . $birthday_month . $slash . $birthday_year);
                    }
                }   
            }
        }
    }
    // if they chose other
    elseif($gender == "other")
    {
        // if first name is empty
        if($first_name == "")  
        {
            $result = "please fill in your first name";
        }  
        // if not empty
        elseif($first_name != "")
        {
            // if last name is empty
            if($last_name == "")
            {
                $result = "please fill in your last name";
            }
            // not empty
            elseif($last_name != "")
            {
                // f website is empty
                if($website == "")
                {
                    $result = "please fill in your favorite website";
                }
                // not empty
                elseif($website != "")
                {
                    // if month is empty
                    if ($birthday_month == "")
                    {
                        $result = "please fill in your month of birth";
                    }
                    // if they try the 13 month
                    elseif($birthday_month > 12)
                    {
                        $result = "please use a posible month number";
                    }
                    // if day is empty
                    elseif($birthday_day == "")
                    {
                        $result = "please fill in your day of birth";
                    }
                    // if they try the 32 day
                    elseif($birthday_day > 31)
                    {
                        $result = "please use a posible day number";
                    }
                    // if year is empty
                    elseif($birthday_year == "")
                    {
                        $result = "please fill in your year of birth";
                    }
                    // if they try the 2024 year
                    elseif($birthday_year > 2023)
                    {
                        $result = "please use a posible year number";
                    }
                    // so they know what they filled in
                    elseif($birthday_month != "" && $birthday_day != "" && $birthday_year != "")
                    {
                        $result = nl2br("hi " . $first_name . " " . $last_name . "\n your email is " . $email . "\n your favorite website is " . $website . "\n you are born on " . $birthday_day . $slash . $birthday_month . $slash . $birthday_year);
                    }
                }   
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" id="contact_html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sven Metselaars" />
    <link rel="stylesheet" href="css/main.css" />
<!-- title -->
    <title>Document</title>
</head>
<body>
    <form action="calculator.php" method="post" class="othersites">
        <!-- to go too other sites -->
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/index.php"' value="homepage" />
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/projects.php"' value="projects" />
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/calculator.php"' value="calculator" />
    </form>
    <br />
    <h1>contact page</h1>
    <div id="awnser_contacts">
        <?php 
        // here comes the result
            echo $result;
        ?>
    </div>
    <div id="form_contacts">
        <form action="contact.php" method="post">
            <p>your gender</p>
            <!-- your gender selecter -->
            <select name="gender" class="buttons">
                <option value="gender">your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        <br />
        <br />
        <!--for first name -->
        <p>first name</p>
        <input type="text" name="first_name" placeholder="your first name" id="buttons2"/>
        <br />
        <br />
        <!-- for last name -->
        <p>last name</p>
        <input type="text" name="last_name" placeholder="your last name" id="buttons"/>
        <br />
        <br />
        <!-- for email -->
        <p> email</p>
        <input type="email" name="email" required="required" placeholder="your email" class="buttons"/>
        <br />
        <br />
        <!-- for website -->
        <p>favorite website</p>
        <input type="url" name="website" placeholder="favorite website" class="buttons"/>
        <br />
        <br />
        <!-- for time of birth -->
        <p>time of birth</p>
        <input type="number" name="birthday_day" placeholder="day of birth" class="numbers" min = "1"/>
        <input type="number" name="birthday_month" placeholder="month of birth" class="numbers" min = "1"/>
        <input type="number" name="birthday_year" placeholder="year of birth" class="numbers" min = "1"/>
        <br />
        <br />
        <!-- to submit -->
        <input type="submit" name="submit" value="submit" class="srbutton"/>
        <br />
        <br />
        <!-- to reset -->
        <input Type="button" onclick='window.location = "http://localhost/91815_BprjWEDE_CD_lj1p1/contact.php"' value="reset" class="srbutton"/>
    </div>
    </form>
</body>
</html>