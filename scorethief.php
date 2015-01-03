<?php
include'PHPs/functions.php';

$weekint=3;//<<--temprorary. this variable needs to be passed to this script, regarding the week as an integer.

$tester = "http://www.nfl.com/scores/2014/REG".$weekint;//change REG1(which is week one) to REG2 (for week two)
$mytest = file_get_contents($tester);
//$mytest2 = file_get_contents($tester);


$rawteamnamesfilter = "/([A-Z]{2,3})\">{1}([A-Z]{1}|49)[a-z]+<\/a>/";//regEX to grab rough version of team names
$scorefilter = "/(<p class=\"total-score\">)[0-9-#]*/";//regEX to grab scores for week of games
$filter = "/([A-Z]{1}|49)[a-z]+/";//regEX to get clean version of team names
$getseasonrecord="/\([0-9]{1}-{1}[0-9]{1}-{1}[0-9]{1}\)/";
$getintfromscore = "/([0-9]{1,3}|[#]{1}|[--]{2})/"; //this grabs the last two substrings, and makes sure they are both integers
preg_match_all($rawteamnamesfilter, $mytest, $rawteamnames);
preg_match_all($scorefilter, $mytest, $scores);
$teamnamestostring="";
for($i=0;$i<32;$i++){$teamnamestostring .= $rawteamnames[0][$i];} //this is taking a raw sample of teamnames and putting them in a string so i can filter them further
preg_match_all($filter, $teamnamestostring, $trimmedteammatches);
preg_match_all($getseasonrecord, $mytest, $seasonrecord);

for($i = 0;$i<32 ;$i++)
{
$finalteamnames[$i] = $trimmedteammatches[0][$i];
$finalscores[$i] = $scores[0][$i];
}

$scoreSTRING = "";
for($i = 0;$i<32 ;$i++)
{
  $scoreSTRING .= $finalscores[$i];
}
if(preg_match_all($getintfromscore, $scoreSTRING, $scoresasINT))
{
for($i = 0;$i<32 ;$i++)
{
if($scoresasINT[0][$i]=="#"){$scoresasINT[0][$i]="--";}
}
}
$backtoSTRING = "";
for($i = 0;$i<32;$i++)
{
$j = $i+1;
$teamnameforSTRING = $finalteamnames[$i];
$scoreASintFORstring = $scoresasINT[0][$i];
$backtoSTRING .= "$j,$teamnameforSTRING,$scoreASintFORstring, \n";
}

//echo $backtoSTRING;

$myfile = fopen("myfirstnewfileEVER.txt", "w") or die("Unable to open file!");
$txt = $backtoSTRING;
fwrite($myfile, $txt);
fclose($myfile);
$scoreset=file_get_contents("myfirstnewfileEVER.txt");
$finalsetexplode = explode(",", $scoreset);
$i=0;
$temptoconvertweekint = $weekint;
if($weekint<10){$weekint="0".$temptoconvertweekint;} 
$weekstring="Week ". $weekint;

$finalset=array();
$j=CorrelateId($weekint);
$x=0;
for($i=0;$i<95;$i+=6)
{
//skipped i because it is unecessary id number
$awayteam=$finalsetexplode[$i+1];
$awayscore=$finalsetexplode[$i+2];
//skipped 3 because it is unecessary id number
$hometeam=$finalsetexplode[$i+4];
$homescore=$finalsetexplode[$i+5];	

$x++;
$game = "game".$x;
//"gameid"=>"$j"     <<--example sample
$finalset[$game]=array("gameid"=>"$j","awayteam"=>"$awayteam","hometeam"=>"$hometeam","week"=>"$weekstring","awayscore"=>"$awayscore","homescore"=>"$homescore" );
$j++; 	
}
$ATeamHTeam_from_db = array_fill(0, 16, NULL);
$x=1;
$j=CorrelateId($weekint);
for($i=$j;$i<=$j+15;$i++)
{
$gameid=$i;
$db = MySQLi_connect_pool_pickem();
$query = "SELECT `awayteam`, `hometeam` FROM `NFLyearSchedule` WHERE `gameid`= $i";
$result = $db->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$game="game".$x;
$ATeamHTeam_from_db[$game]=array("gameid"=>$gameid, "awayteam"=>$row['awayteam'], "hometeam"=>$row['hometeam']);
$x++;
}
//var_dump($ATeamHTeam_from_db);
//echo $ATeamHTeam_from_db[15][1];
//$ATeamHTeam_from_db
$arrayofwinners= getWinners($finalset);
$final_ordered_winners_array = array();
$x=0;
$i=0;
$k=1;
//var_dump($arrayofwinners);
//echo "<br><br><br><br>";
//echo "<br><br><br><br>";
//var_dump($ATeamHTeam_from_db);


for($x=1;$x<=16;$x++)
{
  for($i=1;$i<=16;$i++)
  {
    $gamex="game".$x;
    $gamei="game".$i;
    if(($arrayofwinners[$gamei]==$ATeamHTeam_from_db[$gamex]['awayteam']) || ( $arrayofwinners[$gamei] == $ATeamHTeam_from_db[$gamex]['hometeam']))
    {
      $final_ordered_winners_array[$gamex] = $arrayofwinners[$gamei];     
    }
    if(($finalset[$gamei]['awayteam']==$ATeamHTeam_from_db[$gamex]['awayteam'])&&
       ($finalset[$gamei]['hometeam']==$ATeamHTeam_from_db[$gamex]['hometeam']))
    {
      $final_ordered_scores_array[$gamex] = array("awayscore"=>$finalset[$gamei]['awayscore'],"homescore"=>$finalset[$gamei]['homescore']);    
    }
    
  }
}
$j=CorrelateId($weekint);
for($i=1;$i<=16;$i++)
{
$game="game".$i;
$Ascore= $final_ordered_scores_array[$game]['awayscore'];
$Hscore=$final_ordered_scores_array[$game]['homescore'];
$somevar=$someval;
$queryupdate = "UPDATE `pool_pickem`.`NFLyearSchedule` 
                   SET `awayscore`= ?, `homescore`= ?, `winner`=?
                 WHERE `NFLyearSchedule`.`gameid`= ?";
$stmt = $db->prepare($queryupdate);
$stmt->bind_param('sssi', $Ascore, $Hscore, $arrayofwinners[$game], $j);                 
$stmt->execute();
$j++;  
}





//print_r($final_ordered_winners_array);

//$key = array_search($needle, $haystack);
//array_push($existing_array, $appended_value, $appended_value2);
//print_r($finalset);
//echo "<br><br><br><br>";
//print_r($arrayofwinners);
echo "scores for week ". $weekint." have been added successfully";
?>