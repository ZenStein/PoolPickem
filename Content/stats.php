<?php
session_start();
include'/PHPs/functions.php';

//3 function that grab 1,2,3 place.
$allemails = GetAllEmails();
//print_r($allemails);
for($i = 0; $i < count($allemails);$i++)
{
$everyemailarray[$i] = $allemails[$i]['email'];
} 
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
//$myConnectObj->closeCurser();
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

function FirsTnLastName($tablenamess)
{
$OBJfirstnlast = Create_PDO_Object($validationConnect);
$sql = "SELECT `firstname`,`lastname` FROM `Members` WHERE `email` = '$tablenamess' LIMIT 0, 30";
$findwholename = $OBJfirstnlast->prepare($sql);
$findwholename->execute();
$getwholename = $findwholename->fetch();
$findwholename->closeCursor();
return $getwholename;
}

$examplescore = array();
$examplenames = array();

for($i = 0; $i < count($everyemailarray);$i++)
{
$allscore[$i] = Get_Total_Score($everyemailarray[$i]);

$allfullnames[$i] = FirsTnLastName($everyemailarray[$i]);
//echo $allfullnames[$i]['firstname'] . " " . $allfullnames[$i]['lastname'] . " " . $allscore[$i] . "<br>";

$completenameandscore[$i] = array( $allfullnames[$i]['firstname'], 
                                         $allfullnames[$i]['lastname'] , 
                                         $allscore[$i]                   );

}
//$completenameandscore[0][0]// breakdown of this array. 
//the first[] corresponds to a block of the data. 
//second[] contains all the values for the block. 0 = firstname, 1 = lastname, 2 = total score. 

$j = 0;
for($x = 0; $x < count($everyemailarray); $x++)
{
if($completenameandscore[$x][2] > $j)
{
$thewinner = array($completenameandscore[$x][0], $completenameandscore[$x][1], $completenameandscore[$x][2]);
$j = $completenameandscore[$x][2];
}
}

//echo "this winner is " . $thewinner[0] . " " . $thewinner[1] . " with a score of " . $thewinner[2];

$indexmarker = count($completenameandscore) - 1;
$temp = "";
for($x = 0; $x < $indexmarker; $x++)
{
   for($y = $x; $y >= 0; $y--)
   {
      if($completenameandscore[$y][2] < $completenameandscore[$y+1][2])
      {
         $temp1 = $completenameandscore[$y+1][0];
         $temp2 = $completenameandscore[$y+1][1];
         $temp3 = $completenameandscore[$y+1][2];
            
         
         
         $completenameandscore[$y+1][0] = $completenameandscore[$y][0];
         $completenameandscore[$y+1][1] = $completenameandscore[$y][1];
         $completenameandscore[$y+1][2] = $completenameandscore[$y][2];
         
         
         $completenameandscore[$y][0] = $temp1;
         $completenameandscore[$y][1] = $temp2;
         $completenameandscore[$y][2] = $temp3;
      }
   }
}
/*
for($i = 0;$i < count($completenameandscore); $i ++)
{
for($y = 0;$y < 3; $y ++)
{
echo $completenameandscore[$i][$y] . "  "; 
}
}*/



/*print_r($completenameandscore);
echo "<br><br>";
print_r($thewinner);*/
?>
<!DOCTYPE html>
<html>
<head>
<style>
table,th,td
{
border:3px solid white;
border-collapse:collapse;
color:rgba(255,255,255,1.00);
}
th,td
{
padding:5px;
}
</style>

</head>
<body>

<div id="leaderboard">
<table style="width:400px">
<tr>
  <th id="rankcolumn">Rank</th>
  <th>Name</th>		
  <th>Score</th>
</tr>
<tr>
  <td>1st</td>
  <td><?php echo $completenameandscore[0][0]. " ". $completenameandscore[0][1]; ?> </td>		
  <td><?php echo $completenameandscore[0][2]; ?> </td>
</tr>
<tr>
  <td>2nd</td>
  <td><?php echo $completenameandscore[1][0]. " ". $completenameandscore[1][1]; ?> </td>		
  <td><?php echo $completenameandscore[1][2]; ?> </td>
</tr>
<tr>
  <td>3rd</td>
  <td><?php echo $completenameandscore[2][0]. " ". $completenameandscore[2][1]; ?> </td>		
  <td><?php echo $completenameandscore[2][2]; ?> </td>
</tr>
</table>
</div>

</body>
</html>
