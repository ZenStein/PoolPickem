<?php

function Create_PDO_Object($objectsName)
{
	  $dsn = 'mysql:host=localhost;dbname=Pool_Pickem';
	  $username = 'root';
	  $password = 'password';
	  
	  $objectsName = new PDO($dsn,$username,$password);
	  return $objectsName;
}

function Email_And_PW_Valid($email , $password)
{
	  $validationConnect = Create_PDO_Object($validationConnect);
	  $query = "SELECT COUNT(*) FROM Members WHERE email = '$email' AND password = '$password' ";
	  $see_db = $validationConnect->query($query);
	  $show_db = $see_db->fetch();
	  
	  return ($show_db[0] == 1) ? true:false;
}
function My_Passwords_Match()
{
     //compare the two parameters, return true of false
	 return true;
}


function Tester()
{
	 return "your tester fired off";
}

function SignUpInsert()
{
  	//inserts the userinput into the db.
	return true;
}
function Email_Is_Unique($email)
{
    //check inputted email against db. return t or f	
	return true;
}








function Passwords_Match($password , $confirmpassword)
{
	// compare two parameters, make sure they are equal. return t or f
	return true;
}

function Email_Is_Validated($userinputtedcode, $sentcode)
{
	//if these two match up. update the db to say true under the email validation section
	return true;
}


?>