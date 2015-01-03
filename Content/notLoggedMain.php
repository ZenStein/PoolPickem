<?php

if (isset($_SESSION['loginfailed']))
{
  $greeting = "";
  $loginerror = "Login Error Content Goes here!!";
}
else
{
  $greeting = "Please Login or SignUp.";
  $loginerror = "";	
}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Main</title>
</head>

<body>
<h1 id=""><?php echo $loginerror  .' '  .$greeting; ?></h1>
</body>
</html>
