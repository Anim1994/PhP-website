<?php
echo "“COMP344 Assignment 1, 2019” + “Mohammad Anim Rahman” + “44376936”";
include("dbconnect.php");
session_start();

$L_username=$_POST["uname"];
$L_password=$_POST["psw"];
 // store session data

 $sql = "SELECT USERNAME FROM TBLUSERS WHERE USERNAME = '$L_username' and PASSWORD = '$L_password'";
      $query = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($query);

      if($count == 1) {
         $_SESSION['userstatus'] = "loggedin";
         echo "<p>The session \"$L_username\" has been generated. </p>";
         echo "<meta http-equiv=\"refresh\" content=\"2;URL=loggeduser.php\">";
	}else {
         echo "Your Login Name or Password is invalid. Returning to hompage";
         echo "<meta http-equiv=\"refresh\" content=\"2;URL=home.php\">";
      	}
?>