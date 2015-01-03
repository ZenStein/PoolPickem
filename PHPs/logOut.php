<?php
session_start();
session_destroy();
header('Location: http://www.poolpickem.com/index.php?theXML=XMLs/notLoggedMain.xml'); 

////<<<<------valuable underneath!
//
//
//session_start();
//include'functions.php';
//                              /*<<<---Objectives--->>>*/
////  Create a unique id to reference  the new table, make sure that it doesnt already exist. 
////  use their form data for the entries for the first row of the table. this first row is 
////  how we will reference the "rules" of the game. Sccop up all the variables                 
////  create the table in the userscreated db.                                     
////  head them out to where they came from, pass some variables through the browser, 
////  saying if successful or not.                                                                             
//                              /*<<<---Objectives--->>>*/  
//$publicprivate = $_POST['publicprivate'];
//
//$usergamePW = $_POST['usergamepw'];
//$confirmusergamepw = $_POST['confirmusergamepw'];
//
//$usergiventablename = $_POST['usergiventablename'];
//
//$unlimitedentries = $_POST['unlimitedentries'];
//$maxplayersallowed =$_POST['maxplayersallowed'];
//
// 
//$entireseason =$_POST['entireseason'];   //<<<---FIXME:    if this is checked, it needs to be converted into a string.
//$whichweek = array();                                    // a string that is dynamic based on the time. ie. if the game 
//for($i = 1;$i<=5;$i++)                                   // starts just before week 6, the string would be "week6week7week8"  etc
//{
//$week = "week" . $i;
//$whichweek[$i]= $_POST[$week];
//$weeksstring .= "$whichweek[$i]";  //<<<---DEVELOPERS NOTE--->>>// this is the string of which weeks the game is for.
//}
//
//
//$picksperweek =$_POST['picksperweek'];
//$setmaxnumpicks =$_POST['setmaxnumpicks'];
//
////var_dump($publicprivate);
///*
//echo $publicprivate;
//echo "<br><br><br>";
//echo $usergamePW;
//echo $confirmusergamepw;
//echo "<br><br><br>";
//echo $usergiventablename;
//echo "<br><br><br>";
//echo $unlimitedentries;
//echo $maxplayersallowed;
//echo "<br><br><br>";
//echo $entireseason;
//echo $whichweek;
//echo "<br><br><br>";
//echo "<br><br><br>";
//echo $picksperweek;
//echo $setmaxnumpicks;
//*/
//
//do{
//$tableidentifier = rand();    
//}while(tablenameisunique($tableidentifier));//<<<---FIXME: Need to write this function, this is just placeholder 
//
//  $solidconnection = "cmon";
//  if(UserCreated_QuickConnect($solidconnection))
//  {
//       $createit = Create_User_CreatedTable($somerandomnumber);
//       if($createit)
//       {
//           header('Location: http://www.poolpickem.com/index.php');  //<<<---FIXME:pass variables through here, so user knows it was successfull
//       }
//  }
//else{die("database connection failed!");}
//
//
?>