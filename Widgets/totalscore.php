<?php
session_start();
include '/PHPs/functions.php';

function Get_Total_Score($table){
// function objectives = 1.store all userpicks into an array 2.store answers into an array 3.compare them with a counter. 4. return counter
    $validationConnect = "";
	$myConnectObj = Create_PDO_Object($validationConnect);
	$query = "SELECT `userpick` , `answer` FROM `$table` ";
    $getrow = $myConnectObj->query($query);
    
$i = 0;
//----this takes all the userpics and answers from a specified table, and stores them in $userpickarray and $answerarray
    $userpickarray = array();
    $answerarray = array();
      foreach($getrow as $row)
      {
        $userpickarray[$i] =  $row['userpick'];
        $answerarray[$i] =  $row['answer'];
        $i++;
      }
  
$correctcounter = 0;
for($i = 0; $i < count($answerarray);$i++)
{
  if (($userpickarray[$i] == $answerarray[$i]) && ($answerarray[$i] != "" || $answerarray[$i] != NULL))
  {
  $correctcounter += 1;
  }
}
return $correctcounter;
}
$thistable = $_SESSION['loginemail'];
$userstotalscore = Get_Total_Score($thistable);
//echo $userstotalscore;

?>