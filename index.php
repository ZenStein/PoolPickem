<?php
session_start();
include 'PHPs/functions.php';
$theXML = $_GET['theXML'];
if (isset($theXML))
{
  $theXML = filter_input(INPUT_GET, "theXML");
} 
else if (isset($_SESSION['loginemail']))
{
	$theXML = "XMLs/YOULOGGEDIN.xml";
}
else 
{
  $theXML = "XMLs/notLoggedMain.xml";
}

if (($theXML=="XMLs/YOULOGGEDIN.xml") && (!isset($_SESSION['loginemail'])))
{
	die("why are you trying to hack my site you dick!");
}

$xml = simplexml_load_file($theXML);

if ( !$xml)
{
  print ("there was a problem opening the XML");
}
?> 

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Pool Pickem</title>
<link href="mystylesheet.css" rel="stylesheet" type="text/css">
<script src="Javascript/logInValidation.js"></script>
</head>

<body>
<div id="biggamemodal"><div id="BGprompt"><p>Successful Submission!</p><p>Helmets with blue border are your registered picks.</p></div></div>
<div id="modal">
   <div id="insidemodal"><input type="button" onClick="makemodalleave()" value="goback">
      <p>
      <form action="/PHPs/usercreatedtable.php" method="post">
      <label><input type="radio" name="publicprivate" value="public" id="publicprivate_0">public</label><br>
      <label><input type="radio" name="publicprivate" value="private" id="publicprivate_1">private</label><br>
      If private, set password:<input type="password" name="usergamepw"><br>
      Confirm:<input type="password" name="confirmusergamepw"><br>
      <br><br>
      Give your game a title:<input type="text" name="usergiventablename"><br>
      Max number of players:<br>
      Unlimited<input type="checkbox" name="unlimitedentries"><br>
      OR<br>
      Set max number of players<input type="number" min="1" max="10000" name="maxplayersallowed" ><br><br>
      Buyin Amount<input type="number" name="buyin">
      <br><br>
      Set which weeks the game will be for:<br>
      <label>
       <input type="checkbox" name="week1" value="week1" id="whichweek_0" >
       Week1</label>
      <br>
      <label>
       <input type="checkbox" name="week2" value="week2" id="whichweek_1">
       Week2</label>
      <br>
      <label>
       <input type="checkbox" name="week3" value="week3" id="whichweek_2">
       Week3</label>
      <br>
      <label>
       <input type="checkbox" name="week4" value="week4" id="whichweek_3">
       Week4</label>
      <br>
      <label>
       <input type="checkbox" name="week5" value="week5" id="whichweek_4">
       Week5</label>
      <br><br><br>
      How many picks per Week?<br>
      Every Game of Each week<input type="checkbox" name="picksperweek"><br>
      Or<br>
      Set Number of picks per week to:<input type="number" min="1" max="16" name="setmaxnumpicks"><br>
      <input type="submit" value="CreateGame">
      </form>
      </p>
   </div>
</div>

<div id="background">
  <div id="header"><div id="textinsideheader">PoolPickem</div></div>
  <div id="navbarcontainer"><?PHP include ($xml->navbar);?></div>
  <div id="midwrap">
    <div id="menu"><?PHP include ($xml->mainMenu);?></div>
    <div id="content"><?PHP include ($xml->contents);?></div>
    <div id="widgets"><?PHP include ($xml->widgets);?></div>
  </div>
</div>

</body>
</html>

