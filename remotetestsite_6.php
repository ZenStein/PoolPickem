<?php
//
//  $host     = 'pool_pickem.db.12077161.hostedresource.com';
//  $username = 'pool_pickem';
//  $password = 'Aquem!n!213';
//  $database = 'pool_pickem';
//  
//  $db = new MySQLi($host,$username,$password,$database);
//  $error_message = $db->connect_error;
//  if($error_message != NULL){die("connection error!!");}
//$i=1;
//$timestamps_array = array_fill(1, 7, NULL);  
//$query = "SELECT `timestamp` FROM `NFLyearSchedule` WHERE `gameid`>0 LIMIT 6";
//$result = $db->prepare($query);
//$result->execute();
//$result->bind_result($timestamp);
//
//while($result->fetch())
//{
//   $timestamps_array[$i]=$timestamp;
//   $i++;
//}
//var_dump($timestamps_array);



//$newyork_timezone = new DateTimeZone('America/New_York');
//$UTC_tz = new DateTimeZone('UTC');
//$LA_timezone= new DateTimeZone('America/Los_Angeles');
//echo "<br><br><br><br>";
//
$deadline = new DateTime('@1409877000');
echo "Default timestamp: " . ($deadline->getTimestamp()) . "<br>";
echo "Default datetime: " . $deadline->format('Y-m-d H:i:s') . "<br>";

$deadline = new DateTime('@1409877000');
$deadline->setTimezone(new DateTimeZone('America/Los_Angeles'));
echo "LA datetime: " . $deadline->format('Y-m-d H:i:s') . "<br>";

$deadline = new DateTime('@1409877000');
$deadline->setTimestamp(1409877000-25200);
echo "LA datetime: " . $deadline->format('Y-m-d H:i:s') . "<br>";
echo "offset: " . $deadline->getOffset() . "<br>";
//echo "<br>";
//echo $deadline->getTimestamp();
//echo "<br><br><br><br>";
//$deadline2 = new DateTime;
//$deadline2->setTimezone($newyork_timezone);
//$deadline2->setTimestamp($timestamps_array[2]);
//echo $deadline2->format('Y-m-d H:i:s');



////default timezone
//$date = new DateTime('2014-9-5 00:30:00');
//echo 'Default timezone: '.$date->getTimestamp()."<br>";
//echo 'default offset : '.$date->getOffset()."<br>";
//
////America/New_York
//$date = new DateTime('2014-9-5 00:30:00', new DateTimeZone('America/New_York'));
//echo 'America/New_York: '.$date->getTimestamp().'<br />'."\r\n";
//echo 'newyork offset : '.$date->getOffset()."<br>";
//
////LA
//$date = new DateTime('2014-9-5 00:30:00', new DateTimeZone('America/Los_Angeles'));
//echo 'LA: '.$date->getTimestamp().'<br />'."\r\n";
//echo 'LA offset : '.$date->getOffset()."<br>";
//
////UTC
//$date = new DateTime('2014-9-5 00:30:00', new DateTimeZone('UTC'));
//echo 'UTC: '.$date->getTimestamp().'<br />'."\r\n";
//echo 'UTC offset : '.$date->getOffset()."<br>";
//
//echo 'WORK AROUND<br />'."\r\n";
//// WORK AROUND
////default timezone
//$date = new DateTime('2014-9-5 00:30:00');
//echo 'Default timezone: '.($date->getTimestamp() + $date->getOffset()).'<br />'."\r\n";
//echo "Default formatted: ".($date->format('Y-m-d H:i:s'))."<br>";
////America/New_York
//$date = new DateTime('2014-9-5 00:30:00', new DateTimeZone('America/New_York'));
//
//$NYstamp = ($date->getTimestamp() + $date->getOffset());
//$date->setTimestamp($NYstamp);
//echo "NY formatted: ".($date->format('Y-m-d H:i:s'))."<br>";
//
////LA
//$date = new DateTime('2014-9-5 00:30:00', new DateTimeZone('America/Los_Angeles'));
//$LAstamp = ($date->getTimestamp() + $date->getOffset());
//$date->setTimestamp($LAstamp);
//echo "LA formatted: ".($date->format('Y-m-d H:i:s'))."<br>";

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>