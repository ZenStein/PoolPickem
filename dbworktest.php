<?php	//$myConnectObj = Create_PDO_Object($validationConnect);
	  $host = 'pool_pickem.db.12077161.hostedresource.com';
	  $username = 'pool_pickem';
	  $password = 'Aquem!n!213';
	  $database = 'pool_pickem';
      $db = new MySQLi($host,$username,$password,$database);
      $myerrormessage = $db->connect_error;
      
      if ($myerrormessage != NULL){echo "Da PLane BOSS Da Plane!!!!";}
    $tablename = "shaneenterprises@gmail.com";
    $query = "SHOW TABLES FROM pool_pickem";
    $query22 = "SELECT userpick, answer FROM shane LIMIT 6";
    $result = $db->query($query22);
    //$test = $result->num_rows;
   
    /*$query = $db->query("SHOW TABLES FROM pool_pickem");
    $db->fetch_assoc($query);*/
   $myarray = array(); 
    for($i = 0;$i<6 ;$i++)
{
$getrow = $result->fetch_assoc();
$myarray[$i] = $getrow;
}
var_dump($myarray);

?>