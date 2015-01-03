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
  include 'PHPs/functions.php'                 ;
  include 'PHPs/connection_DB_pool_pickem.php' ;
  include 'PHPs/RNbiggamefunctions.php'        ;//added to here from RNbiggameoutput
  $weeknum     = $_SESSION['whichweek']   ;
  $table       = $_SESSION['loginemail']  ;
  $week_as_int = TurnWeekToInt($weeknum)  ;
  $db_1st_id   = CorrelateId($week_as_int);
  
  echo "weeknum=== " . $weeknum;
  echo "<br><br><br><br>";
    echo "weekasint=== " . $week_as_int;

?>
