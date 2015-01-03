<?php
include 'PHPs/functions.php';
include 'PHPs/adminwinners.php';


function InsertTheAnswers($x , $y)
{      
	  
	  $allemailsPDO = GetAllEmails();
      $allemails = array();
	  $answers = "";
	  $answers = Create_PDO_Object($SignUpInsert);
	  
	  for($i = 0; $i < count($allemailsPDO); $i++)
		  {
		  $allemails[$i] = $allemailsPDO[$i][email];	
		  }
	  
	  
	  for($i = 0; $i < count($allemailsPDO); $i++)
	  {
		  $tablename = $allemails[$i];
		  
		  //$j's iterations depend on the week. for week one it is 1 thru 16, week two its 17 thru 32 and so on.
		  
		  

          for($j = $x; $j<=$y; $j++)
		  {
		  $weeklyanswers = BringInWinners($j);
		  $answers = "";
	      $answers = Create_PDO_Object($SignUpInsert);
		  $query = "UPDATE `pool_pickem`.`$tablename` SET `answer` = '$weeklyanswers' WHERE `$tablename`.`id`= $j LIMIT 1";
		  /*$statement = $answers->prepare($query);
		  $statement->bindValue(':answer' , $weeklyanswers);
		  $success = $statement->execute();
		  $rowCount = $statement->rowCount();
		  $statement->closeCursor();*/
		  $rowcount = $answers->exec($query);
		  }	
	  }

}
$x = $_GET['x'];
$y = $_GET['y'];

if (isset($x))
(
$weekOne = InsertTheAnswers($x , $y)
)
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<p>This is where you update the winners each week</p>
<p>Make sure the winners array is filled out in adminwinners.php</p>
<form action="/admin.php" method="GET">
X coordinates Here:<input type="text" name="x" id="x"><br>
Y coordinates Here:<input type="text" name="y" id="y"><br>
<input type="submit" value="InsertWinners">

</form>
<p>Reminder: x is starting index and and it stops when less than or = to Y, dont forget the equalsign!</p>
<p>Examples:
Week 1: x = 1 and  y = 16
Week 2: x = 17 and y = 32
Week 3: x = 33 and y = 48
(Watch for how many bye weeks) 
</p>
</body>
</html>