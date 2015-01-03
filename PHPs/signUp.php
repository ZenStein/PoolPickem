<?php
session_start();

include 'functions.php';

if (isset($_POST['SUfirstname']))
{
$_SESSION['SUfirstname'] = $_POST['SUfirstname'];
$_SESSION['SUlastname'] = $_POST['SUlastname'];
$_SESSION['SUemail']= $_POST['SUemail'];
$_SESSION['SUpassword'] = $_POST['SUpassword'];
$confirmpassword = $_POST['SUconfirmpassword'];
$allUserInputIsValid = false;
$validationcode;  //this is sent in the email for validation
}
$firstname = $_SESSION['SUfirstname'];
$lastname = $_SESSION['SUlastname'];
$email = $_SESSION['SUemail'];
$password = $_SESSION['SUpassword'];

$UIvalidationCode= $_POST['UIvalidationCode'];
//this checks their input, then sends them to validationcode.xml
if (Email_Is_Unique($email) && Passwords_Match($password , $confirmpassword) && !isset($UIvalidationCode))
{

	$validationcode = ((rand()%1000) + 1000);	
	$_SESSION['validationcode'] = $validationcode;
	
	$to = $email ;
	$subject = "Validation code";
	$message = 'Your validation code is ' . $validationcode;
	$emailsuccess = mail ($to , $subject , $message);

		if($emailsuccess)
		{
		  header('Location: http://www.poolpickem.com/index.php?theXML=XMLs/validationCode.xml');
		  
		}
		else
		{
		  die('Email didn\'t go through!!');	
		}

}
	
if (isset($UIvalidationCode))
{
  	
	if($UIvalidationCode == $_SESSION['validationcode'])
	{
	   $theSignUpInsert = SignUpInsert($firstname , $lastname , $email , $password);
	   $createtableforuser = Create_Email_Table($email);
		$setIDforeverygame = CreateRowsForSeason(256, $email);  
		  if($theSignUpInsert == 1 && $createtableforuser == true)
		  {
		  session_destroy();
		  header('Location: http://www.poolpickem.com/index.php?theXML=XMLs/successSignUp.xml');
		  }else {die('There was an error putting you in our DB');}
		
	}else { header('Location: http://www.poolpickem.com/index.php?theXML=XMLs/validationCode.xml&valERR=EEROR');}
}

die('end of script!');

?>