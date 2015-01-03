<?php
function MySQLi_connect_pool_pickem()
{
  $host     = 'pool_pickem.db.12077161.hostedresource.com';
  $username = 'pool_pickem';
  $password = 'Aquem!n!213';
  $database = 'pool_pickem';
  
  $db = new MySQLi($host,$username,$password,$database);
  $error_message = $db->connect_error;
  if($error_message != NULL){include '../PHPs/errors_page.php';}
  return $db;   
}

function Create_PDO_Object($objectsName)
{
  $dsn         = 'mysql:host=pool_pickem.db.12077161.hostedresource.com;dbname=pool_pickem';
  $username    = 'pool_pickem';
  $password    = 'Aquem!n!213';
  $objectsName = new PDO($dsn,$username,$password);
  return $objectsName;
}

function UserCreated_QuickConnect($connection_name)
{
  $dsn      = 'mysql:host=UserCreatedGames.db.12077161.hostedresource.com;dbname=UserCreatedGames';
  $username = 'UserCreatedGames';
  $password = 'Aquem!n!213';
  
  $connection_name = new PDO($dsn,$username,$password);
  return $connection_name;
}

function MySQLi_connect_usercreated()
{
  $host     = 'UserCreatedGames.db.12077161.hostedresource.com';
  $username = 'UserCreatedGames';
  $password = 'Aquem!n!213';
  
  //$connection_name = new MySQLi($dsn,$username,$password);
  $link     = mysqli_connect($host,$username,$password,$username);
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else{return $link;}  
}

function Create_User_CreatedTable($tablesid)
{
  $sql               = "CREATE TABLE `UserCreatedGames`.`$tablesid` (`id` INT(255) NOT NULL, `regduser` VARCHAR(255) NULL, `publicprivate` VARCHAR(255) NULL, `thispw` VARCHAR(255) NULL, `gamename` VARCHAR(255) NULL, `maxplayers` INT(255) NULL, `buyin` INT(255) NULL, `whichweeks` VARCHAR(255) NULL, `picksperweek` INT(255) NULL, PRIMARY KEY (`id`)) ENGINE = MyISAM";    
  $validationConnect = "101010";
  $myConnectObj      = UserCreated_QuickConnect($validationConnect);
  $myConnectObj->exec($sql);
  return true;//<<<---FIXME: This needs to truly evaluate!

}

function InsertUserCreated($tableidentifier, $email, $publicORprivate, $password, $gamename, $maxplayers, $buyin, $whichweeks, $picksperweek)
{
  //incomplete!!!!!!!!!
  $sql = 'INSERT INTO `UserCreatedGames`.`$tableidentifier` (`id`, `regduser`, `publicprivate`, `thispw`, `gamename`, `maxplayers`, `buyin`, `whichweeks`, `picksperweek`) VALUES (\'4567\', \'shaneenterprises@gmail.com\', \'public\', \'aquemini\', \'firstmadegame\', \'10\', \'10\', \'weeks1weeks2\', \'4\');';
  //incomplete!!!!!!!!!
}

function Email_And_PW_Valid($email,$password)
{
  $query = 'SELECT COUNT(id) 
           FROM Members 
           WHERE email = ? 
           AND password = ?';
  $db    = MySQLi_connect_pool_pickem();
  $stmt  = $db->query($query);
  $stmt  = $db->prepare($query);
  $stmt->bind_param("ss",$email,$password);
  $stmt->execute();
  $stmt->bind_result($found);
  $stmt->fetch();
  return ($found == 1) ? true:false;
}

function tablenameisunique($tableid)
{
  return true;//<<<---FIXME:this needs to check all usercreated tables, and make sure the random number is unique
}

function My_Passwords_Match($Userspassword , $Usersconfirmpassword)
{
  //compare the two parameters, return true or false
  //<<<---FIXME: need to finish!
  return true;
}

function Tester()
{
  echo "your tester fired off";
}

function SignUpInsert($firstname , $lastname , $email , $password)
{
  $query            = 'INSERT INTO Members (firstname , lastname , email , password ) 
                       VALUES (:firstname , :lastname , :email , :password)';
  $THISSignUpInsert = "";
  $THISSignUpInsert = Create_PDO_Object($SignUpInsert);
  $statement        = $THISSignUpInsert->prepare($query);
  $statement->bindValue(':firstname',$firstname);
  $statement->bindValue(':lastname',$lastname);
  $statement->bindValue(':email',$email);
  $statement->bindValue(':password',$password);
  $success          = $statement->execute();
  $myrowCount       = $statement->rowCount();
  $statement->closeCursor();
  return($myrowCount);
}

function CreateRowsForSeason($numOfRows , $tablename)
{
  $createrows = "";
  $createrows = Create_PDO_Object($SignUpInsert);
  
  for($i = 1;$i<=$numOfRows; $i++)
  {
    $query     = "INSERT INTO `pool_pickem`.`$tablename` (`id`) VALUES (:id);";
    $statement = $createrows->prepare($query);
    $statement->bindValue(':id' , $i);
    $success   = $statement->execute();
    $rowCount  = $statement->rowCount();
    $statement->closeCursor();
  }
}

function Email_Is_Unique($email)
{
  $query   = "SELECT COUNT(*) 
              FROM Members 
              WHERE email = '$email' "; 
  $validationConnect = "";
  $checkEmailObj     = Create_PDO_Object($validationConnect);
  $see_db            = $checkEmailObj->query($query);
  $show_db           = $see_db->fetch();
  return ($show_db[0] == 1) ? false:true;	
}

function Passwords_Match($password , $confirmpassword)
{
  // compare two parameters, make sure they are equal. return t or f
  return true;
}

function Email_Is_Validated($userinputtedcode, $sentcode)
{
  //if these two match up. update the db to say true under the email validation section
  return true;
}

function Get_User_First_Name()
{
  $query = "SELECT firstname 
            FROM Members 
            WHERE email = '$useremail'"; 
  $validationConnect = "";                //this returns the current signed in users first name as string//
  $useremail         = $_SESSION['loginemail'];
  $validationConnect = Create_PDO_Object($validationConnect);
  $see_db            = $validationConnect->query($query);
  $show_db           = $see_db->fetch();
  
  return ($show_db[0]);	
}

function Create_Email_Table($tablename)
{
  $query = "CREATE TABLE `pool_pickem`.`$tablename` 
             (
              `id` INT(255)       NOT NULL, 
              `week` INT(255)         NULL, 
              `game` INT(255)         NULL, 
              `userpick` VARCHAR(255) NULL, 
              `answer` VARCHAR(255)   NULL, 
              `getspoint` INT(1)      NULL, 
               PRIMARY KEY (`id`)
             ) 
             ENGINE = MyISAM";
  $validationConnect = "";
  $myConnectObj      = Create_PDO_Object($validationConnect);
  $myConnectObj->exec($query);
  return true;	//<<<---FIXME: this needs to truly evaluate!
}

function AddWeeklySubmission($tablename , $id , $week , $game , $userpick)
{
  $query = "UPDATE `pool_pickem`.`$tablename` 
               SET `week`='$week', 
                   `game`='$game' , 
                   `userpick`='$userpick' 
             WHERE `$tablename`.`id`= $id 
              LIMIT 1";
  $THISSignUpInsert = "";
  $THISSignUpInsert = Create_PDO_Object($SignUpInsert);
  $rowcount = $THISSignUpInsert->exec($query);
  return($rowCount);
}

function TurnWeekToInt($weekstring)
{
  //removes the "week" string, and returns any numbers afterwards 
  // example-> "week12" turns to 12.  
  $length = strlen($weekstring);
  $removeWeek = substr($weekstring,(-($length-4)));
  return $removeWeek;
}

function CorrelateId($weekint)
{
           /*<<-----!!IMPORTANT!!----->>
                 -Conceptual Clarity-
  THE PARAMETER IS AN INTEGER (1-17) REPRESENTING WHICH  
  WEEK I NEED TO REFERENCE. THE RETURN VALUE REPRESENTS THE 
  INDEX NUMBER OF THE FIRST GAME OF THAT WEEK 
              <<-----!!IMPORTANT!!----->>*/
  if(($weekint<1)||($weekint>17))
  {
    die("invalid argument for function CorrelateID in functions.php");
  }	
  return ((($weekint-1)*16)+1);
}

function GetAllEmails()
{
  $validationConnect = "";                                     //this is essential because we make the users table name equivalent to their email
  $validationConnect = Create_PDO_Object($validationConnect);  //we will use this function to insert all the answers into everyones table each week
  $query = "SELECT email FROM Members";
  $see_db = $validationConnect->query($query);
  $show_db = $see_db->fetchall(PDO::FETCH_ASSOC);
  return ($show_db);		
}

function getWinners($array_teams_scores)
{
  $winners= array();
  $i=0;
  for($i=0;$i<16;$i++)
  {
    $j=$i+1;  
    $game="game".$j;
    $homescore=$array_teams_scores[$game]['homescore'];
    $awayscore=$array_teams_scores[$game]['awayscore'];
    if($homescore>$awayscore ){ $winners[$game]=$array_teams_scores[$game]['hometeam']; }   
    elseif($homescore<$awayscore ){ $winners[$game]=$array_teams_scores[$game]['awayteam']; }
    elseif($homescore==$awayscore){ $winners[$game]= "Tie"  ; }
    else                      { $winners[$game]= "NULL"; }   
  }
  return $winners;      
}


?>