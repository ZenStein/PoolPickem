<?php
session_start();
include ("../PHPs/RNbiggameoutput.php");


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>BigGame</title>
<link href="../PPstylesheets/biggame.css" rel="stylesheet" type="text/css">
<script src="../Javascript/logInValidation.js"></script>
</head>

<body onLoad="highlightpics(),startTime2(),startTime()">
       <?php echo $UIdeadline->format('l, F j')."th ".$UIdeadline->format('g:ia')." ";?>
<div     id="WEEKSnavcontainer" >   
  <div   id="WEEKSnavwrap"      >
    <div id="WEEKSnavleft"      ><a href="index.php?theXML=XMLs/weeklyGames.xml&weeknum=<?php echo $previousweekSTR;?>"><img src="/images/last.png" height="35" width="35"></a></div> 
    <div id="WEEKSnavcenter"    ><?php echo $weeknumSTR;?></div>  
    <div id="WEEKSnavright"     ><a href="index.php?theXML=XMLs/weeklyGames.xml&weeknum=<?php echo $nextweekSTR;?>"    ><img src="/images/next.png" height="35" width="35"></a></div> 
  </div>     
</div>

<span class="UIdeadline"><?php echo " " . $UIdeadline->format('l, F j') . "th ".$UIdeadline->format('g:ia') . " "; ?></span><span id="DLtimer"></span>

<form action="/PHPs/submitPicks.php?form=<?php echo $weeknumSTR; ?>" method="POST" id="week1" name="week1">

<div id="pickgamecontainer">

    <p class="gametitle"    ><?php echo $gametitle['game1'];?></p>
    <p class="gamedatentime"><?php echo   $gameday['game1']." ".$gamedate['game1'].$datesuffix['game1']." "?><p class="gameAMPM"><?php echo $gametime['game1'];?><p class="gamechannel"><?php echo $channel['game1'];?></p></p></p>
    
    <div id="helmetswrapper">
        <label><input type="radio" name="<?php echo $gameID['game1'];?>" value="<?php echo $awayteam['game1'];?>" style="display:none" id="<?php echo $gameID['game1']."A"; ?>" onChange="putborder('<?php echo $awayteam['game1'] . "pic"; ?>','<?php echo $hometeam['game1'] . "pic"; ?>')"  /><img src="/images/helmetsL/<?php echo $awayteam['game1'];?>.png" class="helmets" id="<?php echo $awayteam['game1']."pic";?>"/></label>
            <span id="versus">VS</span>
        <label><input type="radio" name="<?php echo $gameID['game1'];?>" value="<?php echo $hometeam['game1'];?>" style="display:none" id="<?php echo $gameID['game1']."B"; ?>" onChange="putborder('<?php echo $hometeam['game1'] . "pic"; ?>','<?php echo $awayteam['game1'] . "pic"; ?>')"  /><img src="/images/helmetsR/<?php echo $hometeam['game1'];?>.png" class="helmets" id="<?php echo $hometeam['game1']."pic";?>"/></label>
    </div><!--helmetwrapper-->
    <div id="awayteam"><?php echo $awayteam['game1']; ?></div><div id="hometeam"><?php echo $hometeam['game1'];?></div> 

</div><!--pickgamecontainer-->

<div id="pickgamecontainer">

    <p class="gametitle"    ><?php echo $gametitle['game2'];?></p>
    <p class="gamedatentime"><?php echo   $gameday['game2']." ".$gamedate['game2'].$datesuffix['game2']." "?><p class="gameAMPM"><?php echo $gametime['game2'];?><p class="gamechannel"><?php echo $channel['game2'];?></p></p></p>
    
    <div id="helmetswrapper">
        <label><input type="radio" name="<?php echo $gameID['game2'];?>" value="<?php echo $awayteam['game2'];?>" style="display:none" id="<?php echo $gameID['game2']."A"; ?>" onChange="putborder('<?php echo $awayteam['game2'] . "pic"; ?>','<?php echo $hometeam['game2'] . "pic"; ?>')"  /><img src="/images/helmetsL/<?php echo $awayteam['game2'];?>.png" class="helmets" id="<?php echo $awayteam['game2']."pic";?>"/></label>
            <span id="versus">VS</span>
        <label><input type="radio" name="<?php echo $gameID['game2'];?>" value="<?php echo $hometeam['game2'];?>" style="display:none" id="<?php echo $gameID['game2']."B"; ?>" onChange="putborder('<?php echo $hometeam['game2'] . "pic"; ?>','<?php echo $awayteam['game2'] . "pic"; ?>')"  /><img src="/images/helmetsR/<?php echo $hometeam['game2'];?>.png" class="helmets" id="<?php echo $hometeam['game2']."pic";?>"/></label>
    </div><!--helmetwrapper-->
    <div id="awayteam"><?php echo $awayteam['game2']; ?></div><div id="hometeam"><?php echo $hometeam['game2'];?></div> 

</div><!--pickgamecontainer-->


<div id="pickgamecontainer">

    <p class="gametitle"    ><?php echo $gametitle['game3'];?></p>
    <p class="gamedatentime"><?php echo   $gameday['game3']." ".$gamedate['game3'].$datesuffix['game3']." "?><p class="gameAMPM"><?php echo $gametime['game3'];?><p class="gamechannel"><?php echo $channel['game3'];?></p></p></p>
    
    <div id="helmetswrapper">
        <label><input type="radio" name="<?php echo $gameID['game3'];?>" value="<?php echo $awayteam['game3'];?>" style="display:none" id="<?php echo $gameID['game3']."A"; ?>" onChange="putborder('<?php echo $awayteam['game3'] . "pic"; ?>','<?php echo $hometeam['game3'] . "pic"; ?>')"  /><img src="/images/helmetsL/<?php echo $awayteam['game3'];?>.png" class="helmets" id="<?php echo $awayteam['game3']."pic";?>"/></label>
            <span id="versus">VS</span>
        <label><input type="radio" name="<?php echo $gameID['game3'];?>" value="<?php echo $hometeam['game3'];?>" style="display:none" id="<?php echo $gameID['game3']."B"; ?>" onChange="putborder('<?php echo $hometeam['game3'] . "pic"; ?>','<?php echo $awayteam['game3'] . "pic"; ?>')"  /><img src="/images/helmetsR/<?php echo $hometeam['game3'];?>.png" class="helmets" id="<?php echo $hometeam['game3']."pic";?>"/></label>
    </div><!--helmetwrapper-->
    <div id="awayteam"><?php echo $awayteam['game3']; ?></div><div id="hometeam"><?php echo $hometeam['game3'];?></div> 

</div><!--pickgamecontainer-->

<div id="pickgamecontainer">

    <p class="gametitle"    ><?php echo $gametitle['game4'];?></p>
    <p class="gamedatentime"><?php echo   $gameday['game4']." ".$gamedate['game4'].$datesuffix['game4']." "?><p class="gameAMPM"><?php echo $gametime['game4'];?><p class="gamechannel"><?php echo $channel['game4'];?></p></p></p>
    
    <div id="helmetswrapper">
        <label><input type="radio" name="<?php echo $gameID['game4'];?>" value="<?php echo $awayteam['game4'];?>" style="display:none" id="<?php echo $gameID['game4']."A"; ?>" onChange="putborder('<?php echo $awayteam['game4'] . "pic"; ?>','<?php echo $hometeam['game4'] . "pic"; ?>')"  /><img src="/images/helmetsL/<?php echo $awayteam['game4'];?>.png" class="helmets" id="<?php echo $awayteam['game4']."pic";?>"/></label>
            <span id="versus">VS</span>
        <label><input type="radio" name="<?php echo $gameID['game4'];?>" value="<?php echo $hometeam['game4'];?>" style="display:none" id="<?php echo $gameID['game4']."B"; ?>" onChange="putborder('<?php echo $hometeam['game4'] . "pic"; ?>','<?php echo $awayteam['game4'] . "pic"; ?>')"  /><img src="/images/helmetsR/<?php echo $hometeam['game4'];?>.png" class="helmets" id="<?php echo $hometeam['game4']."pic";?>"/></label>
    </div><!--helmetwrapper-->
    <div id="awayteam"><?php echo $awayteam['game4']; ?></div><div id="hometeam"><?php echo $hometeam['game4'];?></div> 

</div><!--pickgamecontainer-->


<input type="submit" value="Submit Week 1 picks">
</form>
</body>
</html>
