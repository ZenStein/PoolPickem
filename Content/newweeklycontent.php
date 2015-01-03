<?php
  $weekint   = $_GET['weekint'];
  $submitted = $_GET['submitted'];
  (isset($submitted)) ? $success=1:$success=0;
  ($weekint==1 ) ? $previous=1: $previous=($weekint-1);
  ($weekint==17) ? $next=17   : $next    =($weekint+1); 
  $weeknum   = "week".$weekint;
  $_SESSION['whichweek'] = $weeknum;
  $tester = 1;
?>

<html>

<head>
<meta charset="UTF-8">
<title>BigGame</title>
<link href="/PPstylesheets/biggame.css" rel="stylesheet" type="text/css"><!--changetolaunch-->
<script src="/Javascript/biggame.js"></script><!--changetolaunch-->
</head>

<body>
<div id="testems"></div>      
<div     id="WEEKSnavcontainer" >   
  <div   id="WEEKSnavwrap"      >
    <div id="WEEKSnavleft"      ><a href="index.php?theXML=XMLs/weeklyGames.xml&weekint=<?php echo $previous; ?>"><img src="/images/last.png" height="35" width="35"></a></div> 
    <div id="WEEKSnavcenter"    ><?php echo $weeknum ?></div>  
    <div id="WEEKSnavright"     ><a href="index.php?theXML=XMLs/weeklyGames.xml&weekint=<?php echo $next; ?>"    ><img src="/images/next.png" height="35" width="35"></a></div> 
  </div>
</div>
<form action="/PHPs/newsubmit.php?weekint=<?php echo $weekint;?>" method="POST" id="form" name="weeklysub">
<div id="biggamebody"></div><!--biggamebody-->
</form>
</body>

<script>
  var BGmodal = <?php echo $success;?>; 
    if(BGmodal==1)
     {
       var modalmanip = get("biggamemodal");
       modalmanip.style.display="inline";
       modalmanip.addEventListener("click",BGmodalmanip);
       modalmanip.style.WebkitAnimation="prompt 1s 1";
       modalmanip.style.WebkitAnimationFillMode = "forwards";
       var innerBGprompt = document.getElementById("BGprompt");
       innerBGprompt.style.display="inline";
     }
  var getBGarray = new XMLHttpRequest();
  getBGarray.onreadystatechange= function()
  {   
    if(getBGarray.readyState==4 && getBGarray.status==200)
    {     
      var rawteamnames;
      var splitteamnames = [];
      rawteamnames   = getBGarray.responseText;
      splitteamnames = rawteamnames.split(",");
      createbiggameform(splitteamnames);
    }
  }
      getBGarray.open("POST","../PHPs/getuserpics.php",true);
      getBGarray.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      getBGarray.send();
</script>

</html>