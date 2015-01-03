<?php
session_start();
if (isset($_SESSION['validationcode']))
{
   	$getValidationCode = $_SESSION['validationcode'];
	echo $getValidationCode;
	print_r($_POST);
}
if (isset($_GET['valERR']))
{
$valERR = "Validation Code Incorrect!";	
}
?>

<h3>Enter Validation Code</h3>
<span><?php echo $valERR; ?></span>
<form action="/PHPs/signUp.php" method="POST">

  Enter Code:<input type="text" name="UIvalidationCode"><br>
  <input type="submit" value = "Submit Code">

<form>