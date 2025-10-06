<?php
// get functions
require("inc/functions.php");
// set session keys and values
init();
// handle post request (if any)
handlePost();
// print html start
htmlHead();
//
if($_SESSION['started'] == false)
{
    // start form
    showFormStart();
}
else
{
    showFormPlay();
    showFormReset();
}
htmlFoot();