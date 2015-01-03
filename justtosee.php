<!doctype html>
<html></html></h2>>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>

<!--This document makes a dropdown modal and also has js code to use a button to swap z indexs.-->

<style>
#back{
postion:absolute;
height: 500px;
width:1000px;
background-color:#00F307;
}
#left{
position:relative;  
width:150px;
height:100px;
float:left;
display:inline;
background-color:#333;
z-index:2;
}
#contentcontainer{
position:relative;
width:400px;
height:400px;
float:left;
display:inline;
background-color:#CFEA08;
z-index:2;

}
#content1{
position:absolute;
width:400px;
height:400px;
background-color:#00F917;
z-index:3;
}
#content2{
position:absolute;
width:400px;
height:400px;
background-color:#003FFA;
z-index:4;
}

#right{
position:relative;
width:150px;
height:100px;
float:left;
display:inline;
background-color:#333;
z-index:2;
}
#modal{
    position: absolute;
    height: 500px;
    width: 1000px;
    top: -600px;
    float: left;
    z-index: -99;
    display: none;
   
    color: #FDF9F9;
    font-size: 50px;

background:rgba(162,46,48,0.7);
}
@-webkit-keyframes mymove {
    from {top: -500px;}
    to   {top: 8px;}
}
#weekbutton{
background-color:#5400F0;
}
#insidemodal{
position:absolute;
width:300px;
height:300px;
float:left;
display:inline;
background-color:#000000;
}

</style>

<script>
//document.getElementById("modal").style.animationPlayState="paused";
function makemodalcome()
{

var bringit = document.getElementById("modal");
bringit.style.display = "inline";
bringit.style.zIndex="10";
bringit.style.WebkitAnimation="mymove 1s 1";
bringit.style.WebkitAnimationFillMode = "forwards";
//alert('firing');

}
function makemodalleave()
{
var bringit = document.getElementById("modal");
bringit.style.display = "none";
bringit.style.zIndex="-1";

}
function changecontent()
{
var content1 = document.getElementById("content1");//these are the elements you want to iterate through
var content2 = document.getElementById("content2");//these are the elements you want to iterate through
var weekbutton = document.getElementById("weekbutton");//this grabs the button. we use the string value of the button value as a reference as to where the stack is at.
var counter = 0;//this is used so that one, and only one, if statement evaluate to true.
if((weekbutton.value == "week1") && (counter == 0))
{
weekbutton.value = "week2";
content1.style.zIndex="4";
content2.style.zIndex="3";
counter = 1;
}
if((weekbutton.value == "week2") && (counter == 0))
{
weekbutton.value = "week1";
content1.style.zIndex="3";
content2.style.zIndex="4";
counter = 1;
}
/*
-webkit-animation: mymove 2s 1;
-webkit-animation-play-state: paused;
-webkit-animation-fill-mode: forwards;
*/
}
</script>

</head>

<body>
<?php
/*
print_r($_ENV);
echo "<br><br><br><br>";
print_r($GLOBALS);
echo "<br><br><br><br>";

print_r($_SERVER);
echo "<br><br><br><br>";
print_r($_REQUEST);
echo "<br><br><br><br>";
$_REQUEST[0] = "this is REQUEST at index 0 ";
$_REQUEST[1] = "this is REQUEST at index 1 ";
print_r($_REQUEST);

phpinfo();

echo "<br><br><br><br>";
echo "<br><br><br><br>";
echo "<br><br><br><br>";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
  echo "the request method post statement evaluated to true";	
}
else
{
  echo " else else else else ";	
}

echo $_SERVER['REQUEST_METHOD'];*/
?>

<div id="modal"><input type="button" onClick="makemodalleave()" value="goback">This is the MODAL!!<div id="insidemodal">insidemodal</div></div>
<div id="back">
<div id="left"></div>
<div id="contentcontainer"><div id="content1">11111</div><div id="content2">222222</div></div>
<div id="right"><input type="button" onClick="makemodalcome()" value="Makemodal"><br><input type="button" id="weekbutton" onClick="changecontent()" name="mike" value="week1"></div>
<!--<div id="right"><form><input type="submit" onClick="makemodal()" formaction="http://www.poolpickem.com/index.php"></form></div>-->
</div>

</body>
</html>