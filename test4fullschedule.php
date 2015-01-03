<?php

 $url = 'http://www.nfl.com/liveupdate/scorestrip/ss.xml';
 $response_xml_data = file_get_contents($url);
 if(!$response_xml_data){echo "ERROR!";}

 $xml = simplexml_load_string($response_xml_data);
 $test = $xml->gms->g[1]['h'];//<--look at week1stolen.php to see xml layout. 
 echo $test;
 //print_r($test);
 echo "<br><br>";
 
 $fullseasonschedule = file_get_contents(urlencode ('finalNFLschedule.txt'));
 //print_r($fullseasonschedule);
 $finalshedule = explode(",", $fullseasonschedule);
 
 $i = 0;
 echo $finalshedule[0];
/*for($i = 6;$i<count($finalshedule);$i++)
{
    if($i%8 === 0)
    {
    echo $finalshedule[$i] . "<br>";
    }
    else{echo $finalshedule[$i] . " ";}
}*/


/*
for($i = 0;$i<count($finalshedule);$i++)      //<<<---This grabs entire set of everything!
{
if($i == 6 ||($i%7 == 6 && $i!=7 && $i!=0))   //<<<---This grabs entire set of everything!
{
echo $finalshedule[$i] . "<br>";              //<<<---This grabs entire set of everything!
}
else{echo $finalshedule[$i] . " ";}
}
*/


/*echo "<br><br><br><br><br>";
for($i = 0;$i<21 ;$i++)
{
echo $finalshedule[$i] . "<br>";   
}*/
$j = 0;
$schedule = array();
echo "<h3>GET dat n time test</h3>";
$x=0;
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
$gameindex = 184;
echo $schedule[$gameindex]['awayteam'] . $schedule[$gameindex]['hometeam'] . $schedule[$gameindex]['tv'];

?> 