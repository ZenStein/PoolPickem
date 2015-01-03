<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
#testdiv{
    height: 600px;
    width: 600px;
    position: relative;
    float: left;
    background-color:rgba(48,90,50,0.84);
    border: thick solid rgba(0,0,0,1.00);
    color: rgba(0,0,0,1.00);
    font-size: 30px;
    text-align: center;
    }

</style>
</head>

<body>


<script>
function testfunc(dates)
{
var nowinunix = Date.now();//<<<---NOW in UNIX without having to create a new Date object.
var deadline = new Date();//<<---create a date object 
var deadlineInUNIX = deadline.setTime(170364892);//<<---use a UNIX timestamp to set the date/time of the object
var difference = deadlineInUNIX-nowinunix;
var aDAYinMillls = (1000 * 60 * 60 * 24);//<<<--- a representation of one day in milliseconds, or a day in UNIX time
var daystill = Math.floor(difference/aDAYinMillls);
alert(daystill);   
}
function testrun()
{
//  1. have ajax get an array of all the users picks from php script
//  2. use js to use that array to check the corresponding radio button
//  3. run a function that changes the border based on whether or not the radio is checked.
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange= function()
{
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var getarrayofpicks = xmlhttp.responseText;//<--this is the array of userspicks, for particular week
    var dates = getarrayofpicks.split(" ",16);
    testfunc(dates);
    }
}
xmlhttp.open("POST","testtosee.php" ,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}
testrun();
</script>
<div id="testdiv">hello</div>
</body>
</html>