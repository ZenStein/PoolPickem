// JavaScript Document

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
var inputone = document.createElement("input");
inputone.setAttribute("id","game1A");
inputone.setAttribute("class","helmetradioinput");
inputone.setAttribute("type","radio");
inputone.setAttribute("name","game1");
inputone.setAttribute("value","packers");
inputone.addEventListener("change", function() {putborder('packerspic','texanspic');});
labelone.appendChild(inputone);

//childofhelmetswrapper, child of tagname-label, 2ndchild, img
var img = document.createElement("img");
img.setAttribute("src","packers.png");
img.setAttribute("class","helmetpng");
img.setAttribute("id","packerspic");
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
var inputTWO = document.createElement("input");
inputTWO.setAttribute("id","game1B");
inputTWO.setAttribute("class","helmetradioinput");
inputTWO.setAttribute("type","radio");
inputTWO.setAttribute("name","game1");
inputTWO.setAttribute("value","texans");
inputTWO.addEventListener("change", function() {putborder('texanspic','packerspic');});
labelTWO.appendChild(inputTWO);

//childofhelmetswrapper, child of tagname-label, 2ndchild, imgTWO
var imgTWO = document.createElement("img");
imgTWO.setAttribute("src","texans.png");
imgTWO.setAttribute("class","helmetpng");
imgTWO.setAttribute("id","texanspic");
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
var textawayteam = document.createTextNode("packers"); 
awayteam.appendChild(textawayteam);
pickgamecontainer.appendChild(awayteam);

//create hometeam, child of picksgamecontainer
var hometeam = document.createElement("div");
hometeam.setAttribute("class","hometeam");
var texthometeam = document.createTextNode("texans"); 
hometeam.appendChild(texthometeam);
pickgamecontainer.appendChild(hometeam);

//create awayteamsite, child of picksgamecontainer
var awayteamsite = document.createElement("div");
awayteamsite.setAttribute("class","awayteamsite");
var textawayteamsite = document.createTextNode("packer.com"); 
awayteamsite.appendChild(textawayteamsite);
pickgamecontainer.appendChild(awayteamsite);

//create hometeamsite, child of picksgamecontainer
var hometeamsite = document.createElement("div");
hometeamsite.setAttribute("class","hometeamsite");
var texthometeamsite = document.createTextNode("texans.com"); 
hometeamsite.appendChild(texthometeamsite);
pickgamecontainer.appendChild(hometeamsite);

//create pickgamefooter, child of picksgamecontainer
var pickgamefooter = document.createElement("div");
pickgamefooter.setAttribute("class","pickgamefooter");
var textpickgamefooter = document.createTextNode("footer"); 
pickgamefooter.appendChild(textpickgamefooter);
pickgamecontainer.appendChild(pickgamefooter);