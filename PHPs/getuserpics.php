<?php
    /*
    ************************<<<---Objectives--->>>**************************
    *                                      
    *        js calls this script to see whose playing for a given week.                                     
    *        this script produces a result string for js.                              
    *                                      
    ************************<<<---Objectives--->>>**************************
    */
  session_start()                         ;
  include 'functions.php'                 ;
  include 'connection_DB_pool_pickem.php' ;
  include 'RNbiggamefunctions.php'        ;//added to here from RNbiggameoutput
  $weeknum     = $_SESSION['whichweek']   ;
  $table       = $_SESSION['loginemail']  ;
  $week_as_int = TurnWeekToInt($weeknum)  ;
  $db_1st_id   = CorrelateId($week_as_int);
  $db_last_id = $db_1st_id+15;
  $userpicks = array();
  $x = 0;
  $query = "SELECT `userpick` 
            FROM `$table` 
            WHERE `id`>=? AND `id`<=? 
            LIMIT 16";
  $stmt  = $db->prepare($query);              
  $stmt       ->bind_param("ii", $db_1st_id,$db_last_id);
  $stmt       ->execute();
  $stmt       ->bind_result($fetchedpick);
  for($x=0; $x<16; $x++)
  {
    $stmt->fetch();
    (isset($fetchedpick)) ? $userpicks[$x]=$fetchedpick:$userpicks[$x]=NULL;
  }
  $stmt->close();
   
           /****THE FOLLOWING TELLS ME WHICH WEEK IS BEING REFERENCED BY THE USER*******/
                 $weeknumforDBquery = getweekstring($weeknum);  // example-> Week 01
  $query  = ('
              SELECT awayteam, hometeam, network, timestamp, 
              awayscore, homescore, winner
              FROM `NFLyearSchedule` 
              WHERE week =? 
            ');
            
  $result = $db->prepare($query);              
  $result      ->bind_param("s",$weeknumforDBquery);
  $result      ->execute();
  $result      ->bind_result( $awayB, $homeB, $network, $game_stamp, 
                              $awayscore, $homescore, $winner  );
  
  $count = 0;
  $resultstring = "";
  $datetimestring = array_fill(0, 16, NULL);
  $x=0;
  $i=0;
  while($result->fetch())
  {
    $count+=1;
    ($userpicks[$x]==$awayB) ? $userpicks[$x]=0:$userpicks[$x]=1;
    $resultstring .="$awayB,$homeB,$game_stamp,$network,$userpicks[$x],$awayscore,$homescore,$winner,"; 
    $x++;
    $i++;
  }
  $result->close();
  $db    ->close();
  //preg_replace('/[\x00-\x1F\x7F]/', '', $resultstring);//REMOVES HIDDEN CHARACTERS
  urlencode($resultstring);
  echo $resultstring;
//  echo "<br><br><br><br>";
//  print_r($datetimestring);
?>
