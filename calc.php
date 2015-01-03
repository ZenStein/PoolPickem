<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>My Calculator</title>
</head>

<body>
<?PHP
$n1 = $n2 = $num1err = $num2err = $result = $answer =  "";
$num1inputIsValid = false;
$num2inputIsValid = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $n1 = test_input($_POST["num1"]);
   $n2 = test_input($_POST["num2"]);		
   
   if (($n1 != "") && (is_numeric($n1))){
   $num1inputIsValid = true;
   }
   else{$num1err = "A number, and number ONLY is Required here.";
   }
   if (($n2 != "") && (is_numeric($n2))){
   $num2inputIsValid = true;
   }
   else{$num2err = "A number, and number ONLY is Required here.";
   }

//this  post code only executes when the all user input is valid.
   
   if(($num1inputIsValid == true) && ($num2inputIsValid == true)){
      if ($_POST['op'] == "Add"){
		 $answer = $n1 + $n2;
		 $result = "By adding $n1 and $n2 you get $answer ";
	  }
	  if ($_POST['op'] == "Subtract"){
		
		$answer = $n1 - $n2;
		$result = "By subtracting $n1 from $n2 you get $answer";
	  }
	  if ($_POST['op'] == "Multiply"){
		
		$answer = $n1 * $n2;
		$result = "By multiplying $n1 and $n2 you get $answer";
	  }
	  if ($_POST['op'] == "Divide"){
		
		$answer = $n1 / $n2;
		$result = "By dividing $n1 and $n2 you get $answer";
	  }
   }
}





function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<p><span class="error">* required field.</span></p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       First Number<input type="text" name="num1" />
       <span class="error">* <?php echo $num1err;?></span><br>
       Second Number<input type="text" name="num2" />
       <span class="error">* <?php echo $num2err;?></span><br>
       +<input type="radio" name="op" value="Add" />
       -<input type="radio" name="op" value="Subtract" />
       *<input type="radio" name="op" value="Multiply" />
       /<input type="radio" name="op" value="Divide" /> <br>
       <input type="submit" value="calculate!"/><br>
    </form>
<?php
echo "<h2>Your Answer:</h2>";
echo "$result <br><br><br>";
?>




</body>
</html>