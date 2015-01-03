<body>

<form method="POST" onClick="return LoginIsValid()" action = "PHPs/logIn.php">
    <li id="userlogin"><input type="email" name="email" placeholder="Email"></li>
    <li id="userlogin"><input type="password" name="password" placeholder="Password"></li>
    <li id="userlogin"><input type="submit" value="Login"></li>
</form>

<br>
<p>Not a member yet?</p>
<br>



<form method="POST" action = "index.php?theXML=XMLs/signUp.xml">
    <li id="signupbutton"><input type="submit" value="SignUp"></li> 
</form>
</body>