<?php
include 'PHPs/functions.php';
$usersfirstname = Get_User_First_Name();
?>
<!doctype html>
<html></html></h2>>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script>
function makemodalcome()
{
  var bringit = document.getElementById("modal");
  bringit.style.display = "inline";
  bringit.style.zIndex="10";
  bringit.style.WebkitAnimation="mymove 1s 1";
  bringit.style.WebkitAnimationFillMode = "forwards";
}
function makemodalleave()
{
  var bringit = document.getElementById("modal");
  bringit.style.display = "none";
  bringit.style.zIndex="-1";
}
</script>

</head>

<body>

<div class="navbarWrap">
  <ul>
    <li><a href="index.php?theXML=XMLs/weeklyGames.xml&weekint=1">big game</a></li>
    <li><a href="index.php?theXML=XMLs/mainlobby.xml">main lobby</a></li>
    <li><a href="#" onClick="makemodalcome()" value="Makemodal">create game</a></li>
    <li><a href="index.php?theXML=XMLs/stats.xml">leaderboard</a></li>
    <li><a href="#">your lobby</a></li>
  </ul>
</div>


<div id="welcometextwrapper"><?php echo "Welcome, " . $usersfirstname;?></div>

</body>
</html>




