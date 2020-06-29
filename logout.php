<?php
session_start();
echo "COMP344 Assignment 1, 2019 + Mohammad Anim Rahman + 44376936";
if (isset($_SESSION['userstatus']) && $_SESSION['userstatus'] == "loggedin"){
session_destroy();
echo 'You have been logged out. <a href="home.php">Go back to homepage</a>';
}
else {
    echo 'You are not logged in';
}
?>