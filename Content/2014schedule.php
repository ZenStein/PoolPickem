<?php
$UIdeadline = new DateTime("2014-09-04 17:30:00");


             /********these variables tell me which week I am referencing**********/
$weeknum = TurnWeekToInt($_GET['weeknum']);
$startofthisweeksgames = CorrelateId($weeknum);
if($weeknum!=1){$previousweek = ($weeknum - 1);}else{$previousweek = 1;}
if($weeknum!=17){$nextweek = ($weeknum + 1);}else{$nextweek = 17;}
$weeknumSTR = "week$weeknum";
$previousweekSTR = "week$previousweek"; 
$nextweekSTR = "week$nextweek"; 
$_SESSION['whichweek'] = $weeknumSTR; //<--I use this session variable to tell me which weeks picks are being requested 

//these next variables have to be determined dynamically, they will be what is displayed on the board
//$gametitle = array("Thursday Night Football", "Sunday", "Monday Night Football", "Bye Week");








$fullseasonschedule = file_get_contents('/home/content/61/12077161/html/Content/newestschedule.txt');
$finalshedule = explode(",", $fullseasonschedule);
 
 

//the following will create an array of this weeks games
$schedule = array(array());
$j = 0;
for($x=$startofthisweeksgames; $x<($startofthisweeksgames+16); $x++)
{
    $y = 0;
    for($y=0; $y<1; $y++)
    {
    $gameID = "gameID_" . $x;
    $schedule[$gameID]['awayteam'] = $finalshedule[$j];
    $j+=1;
    $schedule[$gameID]['hometeam'] = $finalshedule[$j];
    $j+=1;
    $schedule[$gameID]['weeknumber'] = $finalshedule[$j];
    $j+=1;
    $schedule[$gameID]['day'] = $finalshedule[$j];
    $j+=1;
    $schedule[$gameID]['date'] = $finalshedule[$j];
    $j+=1;
    $schedule[$gameID]['ampm'] = $finalshedule[$j];
    $j+=1; 
    $schedule[$gameID]['tv'] = $finalshedule[$j]; 
    $j+=1;
    }
}
//var_dump($schedule);
//var_dump($schedule["gameID_2"]['awayteam']);
$y = $startofthisweeksgames;
$i = 1;
$weeknum= array();
$awayteam= array();
for($i=1;$i<17;$i++)
{
            $game = "game$i";
  $awayteam[$game]= TurnCityToTeamName(preg_replace('/\s+/', '',$schedule["gameID_$y"]['awayteam']));
  $hometeam[$game]= TurnCityToTeamName(preg_replace('/\s+/', '',$schedule["gameID_$y"]['hometeam']));
   $weeknum[$game]= $schedule["gameID_$y"]['weeknumber'];
   $gameday[$game]= $schedule["gameID_$y"]['day'];
  $gamedate[$game]= $schedule["gameID_$y"]['date'];
  $gametime[$game]= $schedule["gameID_$y"]['ampm']; 
   $channel[$game]= $schedule["gameID_$y"]['tv'];
$datesuffix[$game]= Getdatesuffix($gamedate[$game]);
 $gametitle[$game]= ReturnGameTitle($schedule["gameID_$y"]['day']);
    $gameID[$game]= "game$i";
                $y= ($y+1); 
}

//var_dump($schedule["gameID_2"]['awayteam']);
//echo "<br>";
//var_dump($schedule["gameID_2"]['awayteam']);
//var_dump($schedule["gameID_2"]['hometeam']);
//echo $schedule["gameID_$y"]['awayteam'];
//var_dump($awayteam);
?>