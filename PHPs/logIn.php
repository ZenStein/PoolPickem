<?php
session_start();
include 'functions.php';

$user_email = $_POST['email'];
$user_password = $_POST['password'];
$_SESSION['loginfailed'] = false;

if(Email_And_PW_Valid($user_email,$user_password))
{
  $_SESSION['loginemail'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password']; 
  
  header('Location: http://www.poolpickem.com/index.php');
  exit;
}
else 
{
  $_SESSION['loginfailed'] = true;
  header('Location: http://www.poolpickem.com/index.php?theXML=XMLs/notLoggedMain.xml'); 
}

?>