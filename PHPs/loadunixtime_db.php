<?php
date_default_timezone_set ('America/New_York');//<<--Depending on your source strings, this might change. 
//ie. The timezone in which your source is representing needs to match.
//then grab the timestamp.
//afterwards, if you would like to see a different timezone representation,
//create a DateTime object, FIRST-use ->setTimestamp(), THEN-use ->setTimezone(), THEN ->format() to your liking
               /*<<-----!!IMPORTANT!!----->>
                   
                   -This grabs            >>>   SEP 4, 2014   
                    and turns it into a unix 
                   timestamp, and inserts is onto 
                   the database.
                   (you might need it for 2015!)
         
         
         
              <<-----!!IMPORTANT!!----->>*/

      $host = 'pool_pickem.db.12077161.hostedresource.com';
	  $username = 'pool_pickem';
	  $password = 'Aquem!n!213';
      $database = 'pool_pickem';
      
      
      $db = new MySQLi($host,$username,$password,$database);
      $error_message = $db->connect_error;
      if($error_message != NULL){include '../PHPs/errors_page.php';}
      
$resultstring= array_fill(1,273, NULL);
$timestamps_array = array_fill(1,273, NULL);
$x=1;     
$query = "SELECT `gamedate`,`gametime` FROM `NFLyearSchedule`";
$stmt = $db->query($query);
while($result = $stmt->fetch_assoc())
{
    if($result['gamedate']==NULL || $result['gametime']==NULL)
    {
    $resultstring[$x] =NULL; 
    $x++;
    continue;
    }
    $b=$result['gamedate'];
    $c=$result['gametime'];
$resultstring[$x] = "$b, 2014"." "."$c"; 
$timestamps_array[$x] = strtotime($resultstring[$x]);
$time_represent_LAtz = new DateTime();
$time_represent_LAtz->setTimezone(new DateTimeZone('America/Los_Angeles'));
$time_represent_LAtz->setTimestamp($timestamps_array[$x]);
$LA_timestrings[$x] = $time_represent_LAtz->format('Y-m-d h:i:s:a');
$x++;       
}
$stmt->close();
//print_r($resultstring);
//echo "<br><br><br><br>";
//print_r($timestamps_array);
//echo "<br><br><br><br>";

//var_dump($LA_timestrings);
//$time_represent_LAtz = new DateTime();
//$time_represent_LAtz->setTimezone(new DateTimeZone('America/Los_Angeles'));
//$time_represent_LAtz->setTimestamp(1419801900);
//$LA_timestrings[$x] = $time_represent_LAtz->format('Y-m-d h:i:s:a');
//var_dump($LA_timestrings);
//$count =count($resultstring);
//var_dump($unixresults);

$sql = "UPDATE `pool_pickem`.`NFLyearSchedule` SET `deadline` = ?, `timestamp` = ? WHERE `NFLyearSchedule`.`gameid` = ? LIMIT 1";

	  $stmt = $db->prepare($sql);
 for($x = 1;$x<=272;$x++)
{     
      $stmt->bind_param("sii", $LA_timestrings[$x], $timestamps_array[$x], $x);
	  $stmt->execute();
}
echo "Done!";
?>

