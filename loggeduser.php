<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="home.css" />
</head>
<body>
<?php
    if (isset($_SESSION['userstatus']) && $_SESSION['userstatus'] == "loggedin") {
    echo "Welcome to the member's area! ";}
	else{
         echo "<meta http-equiv=\"refresh\" content=\"0;URL=home.php\">";}
?>
<h1> Welcome to Spartaaaaaaaaa COMP344 Assignment 1, 2019 + Mohammad Anim Rahman + 44376936</h1>

<button onclick= "location.href='logout.php';"style="width:auto;">Logout</button>

<div id="id01" class="modal">
</div>
<?php
include("dbconnect.php");
?>
<h3>Lunch/drinks </h3>
<table id= '1' border="1">
<tr>
  <td>Product Name</td>
  <td>Product price</td>
  <td>Product image</td>
</tr>
<?php
$sql = "Select PRODUCTNAME, PRODUCTPRICE From PRODUCT Where PRODUCTType = 'food'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['PRODUCTNAME']}</td>
    <td>{$row['PRODUCTPRICE']}</td>
   </tr>\n";
}
?>
</table>

<h4> Uniforms </h4>
<table id = '2' border="1">
<tr>
  <td>Product Name</td>
  <td>Product price</td>
  <td>Product image</td>
</tr>

<?php
$sqlq = "Select PRODUCTNAME, PRODUCTPRICE From PRODUCT Where PRODUCTType = 'Uniform'";
$queryq = mysqli_query($conn, $sqlq);
while ($row = mysqli_fetch_array($queryq)) {
  echo
   "<tr>
    <td>{$row['PRODUCTNAME']}</td>
    <td>{$row['PRODUCTPRICE']}</td>
    </tr>\n";
}
?>
</table>
</body>
</html>