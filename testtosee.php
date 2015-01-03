<?php
include'PHPs/connection_DB_pool_pickem.php';

/*
$mydate = date('l \t\h\e jS');

echo $mydate;

$date = new DateTime('2001-01-01');
$date->add(new DateInterval('P10D'));
echo $date->format('Y-m') . "\n";
*/
$fetcheddates = array();
$runit = array();
$again = array();
$x=0;
$query = "SELECT `deadline` FROM `NFLyearSchedule` WHERE `gameid`>=1 AND `gameid`<=3";
$stmt = $db->query($query);
while ($result = $stmt->fetch_assoc()){
   $fetcheddates[$x] = new DateTime($result['deadline']);
    $again[$x]= $fetcheddates[$x]->getTimestamp();
   
   echo $again[$x] . " ";
   $x+=1;
}
//var_dump($again);
?>
