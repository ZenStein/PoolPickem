<?php
session_start();
include'functions.php';
                              /*<<<---Objectives--->>>*/
//  Create a unique id to reference  the new table, make sure that it doesnt already exist. 
//  use their form data for the entries for the first row of the table. this first row is 
//  how we will reference the "rules" of the game. Sccop up all the variables                 
//  create the table in the userscreated db.                                     
//  head them out to where they came from, pass some variables through the browser, 
//  saying if successful or not.                                                                             
                              /*<<<---Objectives--->>>*/  
$email = $_SESSION['loginemail'];
$publicprivate = $_POST['publicprivate'];
if($publicprivate == "private")
{
$usergamePW = $_POST['usergamepw'];
$confirmusergamepw = $_POST['confirmusergamepw'];
}
$usergiventablename = $_POST['usergiventablename'];

$unlimitedentries = $_POST['unlimitedentries'];
if(isset($unlimitedentries))
{
$maxplayersallowed =10000;
}
else{$maxplayersallowed =$_POST['maxplayersallowed'];} 

$buyin = $_POST['buyin'];

$whichweek = array();                                    
for($i = 1;$i<=5;$i++)                                   
{
$week = "week" . $i;
$whichweek[$i]= $_POST[$week];
$weeksstring .= "$whichweek[$i]";  //<<<---DEVELOPERS NOTE--->>>// this is the string of which weeks the game is for.
}

$picksperweek =$_POST['picksperweek'];
if($picksperweek == true)
{
$numberofpicks = 16;
}
else{$numberofpicks =$_POST['setmaxnumpicks'];}


//var_dump($publicprivate);
/*
echo $publicprivate;
echo "<br>";
echo "Only if private:" . $usergamePW . "<br>";
echo "Only if private:" . $confirmusergamepw. "<br>";
echo "<br><br><br>";
echo "Tablename:" . $usergiventablename . "<br>";
echo "<br>";
echo "Either 10000 or set of max players:" . $maxplayersallowed;
echo "<br><br>";
echo "buyin amount:" . $buyin;
echo "<br><br>";
echo "wweekstring. entire season should show entire string:" . $weeksstring;
echo "<br><br><br>";
echo "<br>";
echo "picks per week. either set num or 16:" . $numberofpicks;
*/

if(!isset($tableidentifier))
{
$tableidentifier = rand();//<<<---FIXME: Need to write a function thaty verifies that this is unique. this is just placeholder 
}    


  $solidconnection = "cmon";
  if(UserCreated_QuickConnect($solidconnection))
  {
       $createit = Create_User_CreatedTable($tableidentifier);
       if($createit)
       {
             /* now that the table has been created,      *
              * we INSERT into the first row all of       *
              * the 'rules' of the game. these 'rules     *
              * are stored in the POST variables up top.  */   
          $setrules = InsertUserCreated($tableidentifier,$email, $publicprivate,$usergamePW,$usergiventablename,$maxplayersallowed,$buyin,$weeksstring,$numberofpicks);
          if($setrules)
          {
          header('Location: http://www.poolpickem.com/index.php');  //<<<---FIXME:pass variables through here, so user knows it was successfull
          }
          else{die("Failed to insert data onto table");}
       
       }else{die("Table was not created!");}
  
}else{die("database connection failed!");}

?>