<?php
  session_start();
  include 'functions.php';
  include 'connection_DB_pool_pickem.php';
  
  $table = $_SESSION['loginemail'];
  $weekint = $_GET['weekint'];
  $weeknum = "week".$weekint; 
  $week_as_int = TurnWeekToInt($weeknum);
  $db_1st_id = CorrelateId($week_as_int);
  $userpicks = array();
  
  for ($i = 1; $i <= 16; $i++)
  {
    (isset($_POST["game$i"])) ? $userpicks[$i-1] = $_POST["game$i"]:$userpicks[$i-1] = NULL;
  }
  
  $query = "UPDATE `$table` SET `userpick`=? WHERE `id`=?";
  $result = $db->prepare($query);
  
  for($i=0;$i<16;$i++)
  {
    if($userpicks[$i]==NULL){continue;}
    $id=($db_1st_id+$i);
    $pick2update=$userpicks[$i];
    $result->bind_param("si", $pick2update, $id);
    $result->execute();
  }
  if($result->affected_rows==1)
  {
    $result->close();
    $db->close();
    header("Location: http://www.poolpickem.com/index.php?theXML=XMLs/weeklyGames.xml&weekint=$weekint&submitted=yes");
  }
  else{die("didn't submit");}
  //$result->close();
  //$db->close();
  //if($successfullsubmission)
  //{
  // $testecho = "u Da Shit ma DUDE!!";
  // header("Location: http://www.poolpickem.com/index.php?theXML=XMLs/weekOne.xml&weeknum=$weekasSTR");    
  //}

?>