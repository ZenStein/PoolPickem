<?php

function Create_PDO_Object($objectsName)
{
	  $dsn = 'mysql:host=pool_pickem.db.12077161.hostedresource.com;dbname=pool_pickem';
	  $username = 'pool_pickem';
	  $password = 'Aquem!n!213';
	  
	  $objectsName = new PDO($dsn,$username,$password);
	  return $objectsName;
}


function Email_Is_Unique($email)
{
      $validationConnect = "";
	  $checkEmailObj = Create_PDO_Object($validationConnect);
	  $query = "SELECT COUNT(*) FROM Members WHERE email = '$email' ";
	  $see_db = $checkEmailObj->query($query);
	  $show_db = $see_db->fetch();
	  
	  return ($show_db[0] == 1) ? false:true;	
}
$email = $_REQUEST['email'];
$checkedemail = Email_Is_Unique($email);

if (!$checkedemail)
{
echo "That email already exists in our DB";	
}
	
	



?>


