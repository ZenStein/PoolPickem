<?php
//
//
//
//                NOTICE!!!
//                NOTICE!!!
//
//   THIS PAGE HAS BEEN DEPRECATED, NO LONGER IN USE!!!!
//
//

include ("RNbiggamefunctions.php");
include ("connection_DB_pool_pickem.php");
$weeknum = $_GET['weeknum'];// example->week1
(!isset($weeknum)) ? $weeknum="week1":$_SESSION['whichweek'] = $weeknum;
 
 /*
************************<<<---Objectives--->>>**************************
*                                      
*        js calls this script to see whose playing for a given week.                                     
*        this script produces a result string for js.                              
*                                      
************************<<<---Objectives--->>>**************************
*/ /****THIS TELLS ME WHICH WEEK IS BEING REFERENCED BY THE USER*******/
               $weeknumforDBquery = getweekstring($weeknum);// example-> Week 01
$query  = ('
            SELECT awayteam, hometeam, gameday, gamedate, gametime, network
            FROM `NFLyearSchedule` 
            WHERE week =? 
          ');
          
$result = $db->prepare($query);              
$result->bind_param("s",$weeknumforDBquery);
$result->execute();
$result->bind_result($awayB, $homeB, $dayB, $date, $time, $network);

$count = 0;
$resultstring = "";
while($result->fetch())
{
    $count+=1;
    $away = TurnCityToTeamName($awayB);
    $home = TurnCityToTeamName($homeB);
    $day = ReturnGameTitle($dayB);
    $resultstring .="$away,$home,$day,$date,$time,$network,";
}
$result->close();
$db->close();
//preg_replace('/[\x00-\x1F\x7F]/', '', $resultstring);//REMOVES HIDDEN CHARACTERS
urlencode($resultstring);
echo $resultstring;
?>
