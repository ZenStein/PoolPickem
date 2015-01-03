<?php
date_default_timezone_set ('UTC');
//$LA_timezone= new DateTimeZone('America/Los_Angeles');
//$UTC_timezone= new DateTimeZone('UTC');
//$Mountain_timezone= new DateTimeZone('America/Phoenix');
//$newyork_timezone = new DateTimeZone('America/New_York');
//
//$gametime_reference_LA_tz = new DateTime('2014-09-07 13:00:00', $newyork_timezone);
//$offset = $gametime_reference_LA_tz->getOffset();
//echo $offset/3600;
//echo "<br><br><br><br>";
//echo 3600*4;




//   ned to add 14400 seconds to all timestamp times, this will get it aligned 
//with UTC time, then we can deduct 7 hours from that to get LA time,
// Which LA time will be the default,




$DateFromUNIX = new DateTime;//('@1410148800');
$DateFromUNIX->setTimestamp(1410146700-21600);
$DateFromUNIX->setTimezone(new DateTimeZone('America/Los_Angeles'));
echo $DateFromUNIX->format('Y-m-d h:i:sa P');
//$LA = new DateTime;
//$LA->setTimestamp(1410120000);
//$LA->setTimezone($LA_timezone);
//
//$newyork = new DateTime;
//$newyork->setTimestamp(1410120000);
//$newyork->setTimezone($newyork_timezone);
//
//echo $servertime->format('D-M-Y h:i:s');
//echo "<br><br><br><br>";
//echo $LA->format('D-M-Y h:i:s');
//echo "<br><br><br><br>";
//echo $newyork->format('D-M-Y h:i:s');
//  THU	SEP 4 8:30 PM

//$example_deadline_date=new DateTime("2014-09-07 10:00:00");
//$example_deadline_date->setTimezone($UTC_timezone);
//
//echo $example_deadline_date->getTimestamp();
//     offset 14400

//  $host     = 'pool_pickem.db.12077161.hostedresource.com';
//  $username = 'pool_pickem';
//  $password = 'Aquem!n!213';
//  $database = 'pool_pickem';
//  
//  $db = new MySQLi($host,$username,$password,$database);
//  $error_message = $db->connect_error;
//  if($error_message != NULL){die("connection error!!");}
//
//  
////$gameid = array_fill(1, 273, NULL);
//$timestamps_array = array_fill(1, 272, NULL);
//$temp_timestamps_array = array_fill(1, 272, NULL);
//$i=1;
//$query = "SELECT `timestamp` FROM `NFLyearSchedule` WHERE `gameid`>0 LIMIT 272";
//$result = $db->prepare($query);
//$result->execute();
//$result->bind_result($timestamp);
//
//while($result->fetch())
//{
//   $timestamps_array[$i]=$timestamp;
//   $i++;
//}
////var_dump($timestamps_array);
//
//for($i=1;$i<=272;$i++)
//{
// //echo "old= " . $timestamps_array[$i] . "<br>"; 
// $temp_timestamps_array[$i] = $timestamps_array[$i]+14400;
// $timestamps_array[$i]=$temp_timestamps_array[$i];
// //echo "new= " . $timestamps_array[$i] . "<br><br><br>"; 
//  
//}
//
//for($i=1;$i<=272;$i++)
//{
//$somevar=$someval;
//$queryupdate = "UPDATE `pool_pickem`.`NFLyearSchedule` 
//                   SET `timestamp`= $timestamps_array[$i] 
//                 WHERE `NFLyearSchedule`.`gameid`= ?";
//$stmt = $db->prepare($queryupdate);
//$stmt->bind_param('i',$i);                 
//$stmt->execute();
//if($stmt->affected_rows != 1){die("didn\'t complete the update");}
//}
//echo "completed!";
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