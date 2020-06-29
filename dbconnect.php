<?php

$servername = "ash.science.mq.edu.au";
$username = "44376936";
$password = "TW9oYW1tYWQg";
$database = "44376936";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

if (mysqli_connect_errno()) 
{
 die("Connection failed to database: " . mysqli_connect_error());
}

// Use database 
mysqli_select_db($conn, $database);


?> 



