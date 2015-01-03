<?
/*<!doctype html>
<html>
<head>
<?php include 'PHPs/functions.php'; ?>
</head> 
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>

.test td{
background:#020000;
 }

</style>
</head>

<body>

<?php
function Create_APDO_Object($objectsName)
{
	  $dsn = 'mysql:host=pool_pickem.db.12077161.hostedresource.com;dbname=pool_pickem';
	  $username = 'pool_pickem';
	  $password = 'Aquem!n!213';
	  
	  $objectsName = new PDO($dsn,$username,$password);
	  return $objectsName;
}

function EEmail_And_PW_Valid($email , $password)
{
	  $validationConnect = "";
	  $myConnectObj = Create_APDO_Object($validationConnect);
	  $query = "SELECT *  FROM `shaneenterprises@gmail.com` LIMIT 10";
	  $see_db = $myConnectObj->query($query);
	  $show_db = $see_db->fetchall();
	  
	  return $show_db;
}
/*
$test = EEmail_And_PW_Valid('shaneenterprises@gmail.com','aquemni');
for($i = 0;$i < 10;$i++)
{
  for($j = 0;$j < 10;$j++){  
     echo $test[$j][$i]. "<br>";
     }
}

foreach($test as $value)
{
echo $value. "<br>";

}
<-------commented out!
      $validationConnect = "";
	  $myConnectObj = Create_APDO_Object($validationConnect);
	  $query = "SELECT `userpick` , `answer` FROM `shaneenterprises@gmail.com` LIMIT 10";

$getrow = $myConnectObj->query($query);
$i = 0;
$userpickarray = array();
foreach($getrow as $row)
{
$userpickarray[$i] =  $row['userpick'];
$i++;
}

print_r($userpickarray);
?>
<div>
<table class="test" style="width:400px">
<tr>
  <th>Userpick</th>		
  <th>answer</th>
</tr>
<tr>
  <td><?php echo $userpickarray[0] ?></td>
  <td>0</td>		
</tr>
<tr>
  <td><?php echo $userpickarray[1] ?></td>
  <td>Jackson</td>		
</tr>
<tr>
  <td>3rd</td>
  <td>Doe</td>		
</tr>
</table>
</div>
</body>
</html>*/
?>
<?php
echo "hey";

?>