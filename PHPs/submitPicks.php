<?php
session_start();
include 'functions.php';
$gettablename = $_SESSION['loginemail'];
$whichweek = TurnWeekToInt($_GET['form']);
$weekasSTR = $_GET['form']; 
//$weeklygamecount = count($_POST);
$id = CorrelateId($whichweek);

for ($i = 0; $i < 16; $i++)
{
 $j = $i + 1;
 $game = $j;
 $gameradio = "game$j";
 $userpick = $_POST[$gameradio];
 if(!isset($userpick))
{
$id += 1;
continue;
}
else
{
//echo $gettablename. " , ". $id. " , ". $whichweek. " , ", $game. " , ". $userpick. " , ". "<br>";
$submitweeklypicks = AddWeeklySubmission( $gettablename , $id , $whichweek , $game , $userpick );
$id += 1;
}
}


//                                          <<---FIXME--->> 
//              need to evaluate if the picks were submitted successfully. 
//              right now, $successfullsubmission is being used as a placeholder
//                                          <<---FIXME--->>
$successfullsubmission = true; 
if($successfullsubmission)
{
 $testecho = "u Da Shit ma DUDE!!";
 header("Location: http://www.poolpickem.com/index.php?theXML=XMLs/weekOne.xml&weeknum=$weekasSTR");    
}
?>