// JavaScript Document

<script>
var testarrary = ["packers","texans"];
var nexttest1 = [];
nexttest1[0] =testarrary[0]+"pic";
var nexttest2 =testarrary[1]+"pic";
var testingagain = "game"+4+"A";
//alert(nexttest1); 
document.getElementById(testingagain).addEventListener("change",function(){putborder(nexttest1[0],nexttest2);});
var teamnames = ["titans","bears","cowboys","jets","browns","panthers"];
var gamenum = [1,2,3];
var gameinfo = ["mon","tues","sunday",];
var i = 0;
var inputid = [];
var name = [];
var value = [];
var src = [];
var srcid = [];
var j;
var test1 = [];
var test3 = [];
var idtwo = [];
var nametwo = [];
var valuetwo = [];
var srctwo = [];
var srcidtwo = [];

for(i=0;i<3;i++){

//this is the content box.
var biggamebody = document.getElementById("biggamebody");

//container for one game
var pickgamecontainer = document.createElement("div");
pickgamecontainer.setAttribute("class","pickgamecontainer");
biggamebody.appendChild(pickgamecontainer);

//title container for gametitle
var gametitlecontainer = document.createElement("div");
gametitlecontainer.setAttribute("class","gametitlecontainer");
pickgamecontainer.appendChild(gametitlecontainer);

//gametitle
var gametitle = document.createElement("p");
gametitle.setAttribute("class","gametitle");
var gametitletext = document.createTextNode("gametitle");
gametitle.appendChild(gametitletext);
gametitlecontainer.appendChild(gametitle);

//create gameinfowrap, and append three p elements
var gameinfowrap = document.createElement("div");
gameinfowrap.setAttribute("class","gameinfowrap");
pickgamecontainer.appendChild(gameinfowrap);

//gameinfowrap p1
var gamedatentime= document.createElement("p");
gamedatentime.setAttribute("class","gamedatentime");
var textgamedatentime = document.createTextNode("gameday gamedate suffix ");
 gamedatentime.appendChild(textgamedatentime);
 gameinfowrap.appendChild(gamedatentime);
//gameinfowrap p2
var gametime= document.createElement("p");
gametime.setAttribute("class","gametime");
var textgametime = document.createTextNode("gametime");
 gametime.appendChild(textgametime);
 gameinfowrap.appendChild(gametime);

//gameinfowrap p3
var gamechannel= document.createElement("p");
gamechannel.setAttribute("class","gamechannel");
var textgamechannel = document.createTextNode("gamechannel");
 gamechannel.appendChild(textgamechannel);
 gameinfowrap.appendChild(gamechannel);

//child of picksgamecontainer, helmetswrapper
var helmetswrapper = document.createElement("div");
helmetswrapper.setAttribute("class","helmetswrapper");
pickgamecontainer.appendChild(helmetswrapper);

//child of helmetswrapper, awayteam score
var awayteamscore = document.createElement("div");
awayteamscore.setAttribute("class","awayteamscore");
var textawayteamscore = document.createTextNode("awayscore");
awayteamscore.appendChild(textawayteamscore);
helmetswrapper.appendChild(awayteamscore);

//child of helmetswrapper, tagname label
var labelone = document.createElement("label");
helmetswrapper.appendChild(labelone);           

//childofhelmetswrapper, child of tagname-label, radioinputone
//first,set variables
inputid[i] = "game"+gamenum[i]+"A";
   name[i] = "game"+gamenum[i];
  value[i] = teamnames[i];
    src[i] = teamnames[i]+".png";
  srcid[i] = teamnames[i]+"pic";
      j = i+3;
  test1[i] =teamnames[i]+"pic";
  test3[i] =teamnames[j]+"pic";
//variables set
 var inputone = document.createElement("input");
inputone.setAttribute("id",inputid[i]);
inputone.setAttribute("class","helmetradioinput");
inputone.setAttribute("type","radio");
inputone.setAttribute("name",name[i]);
inputone.setAttribute("value",value[i]);
labelone.appendChild(inputone);



//childofhelmetswrapper, child of tagname-label, 2ndchild, img
var img = document.createElement("img");
img.setAttribute("src",src[i]);
img.setAttribute("class","helmetpng");
img.setAttribute("id",srcid[i]);
labelone.appendChild(img);




//child of helmetswrapper- versus
var versus = document.createElement("div");
versus.setAttribute("class","versus");
var textversus = document.createTextNode("VS");
versus.appendChild(textversus);
helmetswrapper.appendChild(versus);

//child of helmetswrapper, tagname labelTWO
var labelTWO = document.createElement("label");
helmetswrapper.appendChild(labelTWO); 



//childofhelmetswrapper, child of tagname-label, radioinputTWO
//first set variables
idtwo[i] = "game"+gamenum[i]+"B";
valuetwo[i] = teamnames[j];
srctwo[i] = teamnames[j]+".png"; 
srcidtwo[i] = teamnames[j]+"pic";
//variables set
var inputTWO = document.createElement("input");
inputTWO.setAttribute("id",idtwo[i]);
inputTWO.setAttribute("class","helmetradioinput");
inputTWO.setAttribute("type","radio");
inputTWO.setAttribute("name",name[i]);
inputTWO.setAttribute("value",valuetwo[i]);
labelTWO.appendChild(inputTWO);


//childofhelmetswrapper, child of tagname-label, 2ndchild, imgTWO
var imgTWO = document.createElement("img");
imgTWO.setAttribute("src",srctwo[i]);
imgTWO.setAttribute("class","helmetpng");
imgTWO.setAttribute("id",srcidtwo[i]);
labelTWO.appendChild(imgTWO);

//child of helmetswrapper, hometeamscore
var hometeamscore = document.createElement("div");
hometeamscore.setAttribute("class","hometeamscore");
var texthometeamscore = document.createTextNode("homescore");
hometeamscore.appendChild(texthometeamscore);
helmetswrapper.appendChild(hometeamscore);

//create awayteam, child of picksgamecontainer
var awayteam = document.createElement("div");
awayteam.setAttribute("class","awayteam");
var textawayteam = document.createTextNode(teamnames[i]); 
awayteam.appendChild(textawayteam);
pickgamecontainer.appendChild(awayteam);

//create hometeam, child of picksgamecontainer
var hometeam = document.createElement("div");
hometeam.setAttribute("class","hometeam");
var texthometeam = document.createTextNode(teamnames[i+3]); 
hometeam.appendChild(texthometeam);
pickgamecontainer.appendChild(hometeam);

//create awayteamsite, child of picksgamecontainer
var awayteamsite = document.createElement("div");
awayteamsite.setAttribute("class","awayteamsite");
var textawayteamsite = document.createTextNode(teamnames[i]+'.com'); 
awayteamsite.appendChild(textawayteamsite);
pickgamecontainer.appendChild(awayteamsite);

//create hometeamsite, child of picksgamecontainer
var hometeamsite = document.createElement("div");
hometeamsite.setAttribute("class","hometeamsite");
var texthometeamsite = document.createTextNode(teamnames[j]+'.com'); 
hometeamsite.appendChild(texthometeamsite);
pickgamecontainer.appendChild(hometeamsite);

//create pickgamefooter, child of picksgamecontainer
var pickgamefooter = document.createElement("div");
pickgamefooter.setAttribute("class","pickgamefooter");
var textpickgamefooter = document.createTextNode("footer"); 
pickgamefooter.appendChild(textpickgamefooter);
pickgamecontainer.appendChild(pickgamefooter);

}

 


//
//
//
//
//
////<<<---INITIALIZE ALL YOUR VARIABLES HERE--->>>
//var createlabel,goddiv,referencenode,labelsID,xyz,createinput,inputsparent,x;
//var createimg, imgsparent, children, numchild, xy , i;
///*
////     <<<---LIST OF REQUIRED ARRAYS--->>>
////      
////    --  most, but not all,  of these arrays will 
////     come from ajax call in form of string. 
////     i am hand coding them for now as placeholder--
////     
////     
////   
////     <<---END OF LIST OF REQUIRED ARRAYS--->>
//*/  
//   //<<<---PUT FOR LOOP HERE--->>>
//for(i=0;i<2;i++){
///*CREATE LABEL ELEMENT WITH ID OF LABEL AND INSERT INTO PRECISE LOCATION*/
//  createlabel = document.createElement("label");
//  goddiv = document.getElementById("biggamebody");
//  referenenode = (document.getElementById("biggamebody").childNodes[2]);
//  goddiv.insertBefore(createlabel,referenenode);
//  labelsID = "label"+i;//<<--REFERENCE MARKER-->> 
//  xyz = goddiv.getElementsByTagName("label")[0];
//  xyz.setAttribute("id",labelsID);
//
///****CREATES INPUT ELEMENT 1, INSERTS IT AS LAST CHILD OF LABEL ELEMENT X****/
//   createinput = document.createElement("input");
//   inputsparent = document.getElementById(labelsID);
//   inputsparent.appendChild(createinput);
//  
//   /***GRABS FIRST INPUT ELEMENT OF GOD DIV AND SETS ATTRIBUTES ***/
//    x = goddiv.getElementsByTagName("input")[0];
//    x.setAttribute("id","game5A");
//    x.setAttribute("class","helmetradioinput");
//    x.setAttribute("type","radio");
//    x.setAttribute("value","jaguars");
//
///****CREATES IMG ELEMENT 1, INSERTS IT AS LAST CHILD OF LABEL ELEMENT X****/
//   createimg= document.createElement ("img");
//        imgsparent = document.getElementById(labelsID);
//        children = imgsparent.childNodes;
//        numchild = imgsparent.childNodes.length;
//        
//        imgsparent.insertBefore(createimg , children[numchild+1]);
//
////<<<---GRABS FIRST IMG ELEMENT OF GOD DIV AND SETS ALL ATTRIBUTES --->>>
//    xy = goddiv.getElementsByTagName("img")[0];
//    xy.setAttribute("id", "jaguarspic");
//    xy.setAttribute("class", "helmetpng" );
//    xy.setAttribute("src", "/images/helmetsL/jaguars.png");
//    xy.setAttribute("name", "game5");
//    xy.addEventListener("click", function(){putborder('jaguarspic','eaglespic');} );
//
///**************END OF FIRST HELMET CREATION AND IMPLEMENTATION********************/  
//
//
//
////document.getElementById("eaglespic").setAttribute("src","/images/helmetsR/eagles.png");
//alert("loop "+i);
//}/*<<<---END OF FOR LOOP*/
document.getElementById(inputid[0]).addEventListener("change",function(){putborder(test1[0],test3[0]);});
document.getElementById(idtwo[0]).addEventListener("change",function(){putborder(test3[0],test1[0]);});

document.getElementById(inputid[1]).addEventListener("change",function(){putborder(test1[1],test3[1]);});
document.getElementById(idtwo[1]).addEventListener("change",function(){putborder(test3[1],test1[1]);});

document.getElementById(inputid[2]).addEventListener("change",function(){putborder(test1[2],test3[2]);});
document.getElementById(idtwo[2]).addEventListener("change",function(){putborder(test3[2],test1[2]);});
alert("endofscript");
</script>