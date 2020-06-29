<?php session_start(); 
echo "“COMP344 Assignment 1, 2019” + “Mohammad Anim Rahman” + “44376936”";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="home.css" />
</head>
<body>
<?php
    if (isset($_SESSION['userstatus']) && $_SESSION['userstatus'] == "loggedin") {
    echo "Welcome to the member's area! ";
    echo "<meta http-equiv=\"refresh\" content=\"1;URL=loggeduser.php\">";}
?>
<h1> Welcome to Spartaaaaaaaaa</h1>
<form action="loginformz.html" method="post">
    <input type="submit" value="login link" />
</form>

<p> Register to see full version of the site</p>
<button onclick= "location.href='phase2digimon.html';" style="width:auto;">Registration</button>
</body>
</html>