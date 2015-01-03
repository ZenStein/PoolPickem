<?php



$fullseasonschedule = file_get_contents(urlencode ('finalNFLschedule.txt'));
$finalshedule = explode(",", $fullseasonschedule);
 
 
$schedule = array();
$j = 0;
for($x=1; $x<273; $x++)
{
    $y = 0;
    for($y=0; $y<1; $y++)
    {
    $schedule[$x]['awayteam'] = $finalshedule[$j];
    $j+=1;
    $schedule[$x]['hometeam'] = $finalshedule[$j];
    $j+=1;
    $schedule[$x]['weeknumber'] = $finalshedule[$j];
    $j+=1;
    $schedule[$x]['day'] = $finalshedule[$j];
    $j+=1;
    $schedule[$x]['date'] = $finalshedule[$j];
    $j+=1;
    $schedule[$x]['ampm'] = $finalshedule[$j];
    $j+=1; 
    $schedule[$x]['tv'] = $finalshedule[$j]; 
    $j+=1;
    }
}
$dayNdate = $schedule[1]['day'] . " " . $schedule[1]['date'];
?>