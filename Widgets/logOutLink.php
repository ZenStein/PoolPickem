<?php
$thistable = $_SESSION['loginemail']; 
if(isset($thistable)){
include 'PHPs/connection_DB_pool_pickem.php';

$thistable = $_SESSION['loginemail'];

$userspick = array();
$correctanswer = array();
$i = 0;
$query = "SELECT userpick, answer FROM `$thistable`";
$result = $db->prepare($query);              
$result->execute();
$result->bind_result($fetchedpick,$fetchedanswer);
    
while($result->fetch())
{
$userspick[$i] = $fetchedpick;
$correctanswer[$i] = $fetchedanswer;
$i+=1;     
}


  
$correctcounter = 0;
for($i = 0; $i < count($userspick);$i++)
{
  if (($userspick[$i] == $correctanswer[$i]) && ($userspick[$i] != "" || $userspick[$i] != NULL))
  {
  $correctcounter += 1;
  }
}
}//<<--I.E.
else{$correctcounter="No Score";}
?>

<body onLoad="startTime()">
<div id="widgetscontainer">

  <div id="widgetswrapper">
    
<div class="personalinwidget"><div class="boardlabel" id="overallranking">time</div><div class="playerboard" id="clienttime"></div></div>

    <div class="personalinwidget"><div class="boardlabel" id="totalscore">total score</div><div class="playerboard" id="playerstotalscore"><?php echo $correctcounter;?></div></div>
    <div class="personalinwidget"><div class="boardlabel" id="overallranking">overall ranking</div><div class="playerboard" id="playeroverallranking">25</div></div>
    <div class="personalinwidget"><div class="boardlabel" id="weeklyranking">weekly ranking</div><div class="playerboard" id="playerweeklyranking">335</div></div>
    <div class="personalinwidget"> <form method="GET" action = "PHPs/logOut.php"><input type="submit" value="LogOut"></form></div>
  </div>

</div>

</body>



