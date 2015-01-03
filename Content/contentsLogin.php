<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<h3>LogIn</h3>


<form method="POST" onClick="return LoginIsValid()" action = "PHPs/login.php">


E-mail<input type="email" name="email"><br>
Password<input type="password" name="password"><br>
<input type="submit" value="submit">

</form>

<p>Have You Registered?<a href = "index.php?theXML=XMLs/signUp.xml">SignUp</a></p>
</body>
</html>