<?php
include 'functions.php';

class TeamNameTypes
{
       private $id;
       private $nickname;
       private $city;
       private $abbr;
       private $conference;
       private $division;
       
private function validate_column_name($columnName)
{
  $isvalid=false; $i=0;
  $validcolumNames = array("id","nickname","city","abbr","conference","division");
  for($i=0;$i<6;$i++)
  {
    if($columnName==$validcolumNames[$i]){$isvalid = true;}
  }
  return $isvalid;
}

private function get_db_resultrow($nickname)
{
  $query     = "SELECT id, city, abbr, conference, division 
                FROM  `allteaminfo` 
                WHERE `nickname` = '$nickname'";  
  $db        = MySQLi_connect_pool_pickem();
  $resultset = $db->query($query);
  $row       = $resultset->fetch_array(MYSQLI_ASSOC);
               if(!$row){die("invalid TeamName for class TeamNameConverter");}
  return $row;
}
   
public function __construct($nickname)
{ 
  $row = $this->get_db_resultrow($nickname);
  $this->id        = $row["id"];
  $this->city      = $row["city"];
  $this->abbr      = $row["abbr"];
  $this->conference= $row["conference"];
  $this->division  = $row["division"];
  $this->nickname  = $nickname;
}

public function get_name_as($columnName)
{
  if($this->validate_column_name($columnName))
  {
    $nametype = $this->$columnName;
    return $nametype;
  }
  else{return "Invalid Column Name: $columnName";}
}
   


}
/**********************************************************************
***********************************************************************
**
**
**           Below is used to test the class TeamNameTypes.
**
**
***********************************************************************
***********************************************************************/

//echo "<br><br><br><br>";
//$greenbay = new TeamNameTypes("Packers");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("id");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("city");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("abbr");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("conference");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("division");
//echo "<br><br><br><br>";
//echo $greenbay->get_name_as("nickname");
//echo "<br><br><br><br>";
//echo "<br><br><br><br>";

/**********************************************************************
***********************************************************************
***********************************************************************/
class NFLyearSched_info_retriever
{
public $someproperty;
  
  
public function __construct()
{
  $this-> someproperty = $someparameter;
}
public function getgamestate()
{
 // return either Active,Over,InProgress. 
}


}//<<-- NFLyearSched_info_retriever closing Bracket
?>

