<?php

include("dbconnect.php");
echo "COMP344 Assignment 1, 2019 + Mohammad Anim Rahman + 44376936";

$username=$_POST["username"];
$password=$_POST["password"];
$f_name=$_POST["f_name"];
$street_no=$_POST["street_no"];
$street_name=$_POST["street_name"];
$suburb=$_POST["suburb"];
$state=$_POST["state"];
$postcode=$_POST["postcode"];
$email=$_POST["email"];
$no_child=$_POST["no_child"];
$s_name=$_POST["s_name"];
$s_class=$_POST["s_class"];
$credit=$_POST["credit"];
$expiryMonth=$_POST["exMonth"];
$expiryYear=$_POST["exYear"];

//check for empty form fields
$required = array('username', 'f_name', 'street_no', 'street_name', 'suburb', 'state', 'no_child');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
if ($error) {
  echo "All fields are required.";
}

//setup and assign the email format values
$from = "prithve6969@gmail.com";
$to = $_POST["email"];
$subject = "registration";
$message = "Name: ".$username."\r\n";
foreach($s_name as $key => $n ) {
    $message .= "student name: $n \r\n";
    $message .= "class: $s_class[$key] \r\n";
}
$message .= "COMP344 Assignment 1, 2019 + Mohammad Anim Rahman + 44376936\n". "Email sent from mohammad-anim.rahman@students.mq.edu.au and Your verification id: ".rand()." \r\n";
$headers = "From:" . $from;

//check for email spam
function spamcheck($field)
{
//filter_var() sanitizes the e-mail
//address using FILTER_SANITIZE_EMAIL
$field = filter_var($field, FILTER_SANITIZE_EMAIL);
//filter_var() validates the e-mail
//address using FILTER_VALIDATE_EMAIL
if (filter_var($field, FILTER_VALIDATE_EMAIL)){
return TRUE;
}
else{
return FALSE;
}
}

$mailcheck = spamcheck($to);

//check if entered fields are in correct format
if ($mailcheck == FALSE){
    echo "Invalid receiver's email address.";
    }
else if (spamcheck($from) == FALSE){
    echo "Invalid sender's email address.";
}
if (!preg_match("/^[A-Za-z](?=[^\d]*\d)(?=[^A-Za-z]*[A-Za-z])[A-Za-z0-9]{5,9}$/", $password)){
    echo "password format wrong, must contain a small alphabet, capital alphabet and a number";
    }
if (!preg_match("/^[0-9]{4}$/", $postcode)){
    echo "postcode format wrong";
}
if (!preg_match("/^[0-9]{10}$/", $credit)){
    echo "credit card format wrong";
}
//check credit expiry date

$expires = \DateTime::createFromFormat('mY', $expiryMonth.$expiryYear);
$now     = new \DateTime();

if ($expires < $now) {
    echo "invalid expiry date info";
}

//check if username exists already
$sqlx = "SELECT username FROM TBLUSERS WHERE username='".$username."'";
if( mysqli_num_rows(mysqli_query($conn, $sqlx)) > 0){
    echo "Username already exists, choose a different one";
}
else {
    $sql = "INSERT INTO TBLUSERS (USERNAME, PASSWORD, FULLNAME, street_number, street_name, suburb, state, postcode, EMAIL, children_number, Children_name, Children_class, creditcard, exp_month, exp_year) VALUES ('$username', '$password', '$f_name','$street_no', '$street_name', '$suburb','$state','$postcode','$email','$no_child','$s_name', '$s_class', '$credit', '$expiryMonth','$expiryYear')";
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Thank you for registration, COMP344 Assignment 1, 2019 + Mohammad Anim Rahman + 44376936\n";
    mail($to, $subject, $message, $headers);
        echo "<p>You will now be redirected\n The email has been sent to</p>";
        echo "<p>$to</p>";
         echo "<meta http-equiv=\"refresh\" content=\"2;URL=home.php\">";
}       else {
            echo "Error: Query did not succeed";
}
}
?>

