// JavaScript Document

/*********************************Functions for BigGame(START)*****************************/
/******************************************************************************************/
/******************************************************************************************/

function popUP(elementsid,elementsinnerHTML) 
{
  this.elementsid = elementsid;
  this.elementsinnerHTML = elementsinnerHTML;
  this.classname = (elementsid.substring(0,12))+"child";
  this.handle = get(elementsid);
  
  this.popitUP = function () 
                {
                  popout=document.createElement("div");
                  popout.setAttribute("class",this.classname);
                  popout.setAttribute("id",this.elementsid+"popout");
                  popout.style.display="inline";
                  popout.addEventListener("click",function(){ remove_popUP_byID(this.id); } );
                  ajax_get_teamstats("../PHPs/getteamstats.php?variable="+this.elementsinnerHTML,popout.id); 
                  this.handle.appendChild(popout);
                 }
  this.alertproperties = function () 
                        {
                          alert("alertprop engaged");
                        }

  function remove_popUP_byID(id)
                     {
                       parent =get(id).parentNode;
                       parent.removeChild(get(id));
                     }

}









function ajax_callback(url,statechanged_function)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange= statechanged_function;

xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}


function ajax_get_teamstats(url,target_id)
{
ajax_callback(url,function()
  {
  if (this.readyState==4 && this.status==200)
    {
    document.getElementById(target_id).innerHTML=this.responseText;
    }
  });
}

function tester()
{
  return "tester";
}

function putborder(self, other) 
{
  var theclicked = document.getElementById(self);
  var theother = document.getElementById(other);
  theclicked.style.border = "10px solid #002CE2";
  theother.style.border = "10px solid #000000";
}

function getMilslastJan_to_date(dateobj)
{
  //var startofcurrentyear = new Date(dateobj.getFullYear(), 0, 0);
  var start = new Date(dateobj.getFullYear(), 0, 0);
  var ThisYearsmills = dateobj - start;
  return ThisYearsmills; 
}

function startTime2()
{
  //  thisfunction needs to be improved. it should take one parameter, thedesired deadline.  
  //  It then rerturns a day,hours,minutes,seconds countdown from "NOW" till deadline.    
  var rightNOW         = new Date();
  var NOWSyearMILLS    = getMilslastJan_to_date(rightNOW);
  var week1deadline    = new Date(2014,8,4,17,30,0,0);
  var Week1DLmills     = getMilslastJan_to_date(week1deadline);
  var aDAYinMillls     = (1000 * 60 * 60 * 24);
  var anHOURinMills    = (1000 * 60 * 60     );
  var aMINUTEinMills   = (1000 * 60          );
  var aSECONDinMills   = (1000               );
  var MillstillWeekOne = (Week1DLmills - NOWSyearMILLS);
  var DAYStillWeek1    = Math.floor(    MillstillWeekOne   /aDAYinMillls);
  var HOURStillWeek1   = Math.floor((   MillstillWeekOne   %aDAYinMillls)  /anHOURinMills);
  var MINStillWeek1    = Math.floor(((  MillstillWeekOne   %aDAYinMillls)  %anHOURinMills) /aMINUTEinMills);
  var SECONDStillWeek1 =  Math.floor((((MillstillWeekOne   %aDAYinMillls)  %anHOURinMills) %aMINUTEinMills) /aSECONDinMills);
  var message          = DAYStillWeek1  + ":";
      message         += HOURStillWeek1 + ":";
      message         += MINStillWeek1  + ":";
      message         += SECONDStillWeek1;
  
  document.getElementById("DLtimer").innerHTML = message;
  var t = setTimeout(function(){startTime2()},1000);
}

function showthemtheirpicks(arrayofpicks)
{
  var error_flag = false;
  if(arrayofpicks instanceof Array)
  {
    for (i = 0; i < arrayofpicks.length; i++)
    {  
      var j = i + 1;
      IDstringA = "game"+j+"A";
      IDstringB = "game"+j+"B";
      var gameA = document.getElementById(IDstringA).value;
      var gameB = document.getElementById(IDstringB).value;
      var teamApic = gameA + "pic";
      var teamBpic = gameB + "pic";
      
      if (gameA == arrayofpicks[i])
      {
        putborder(teamApic , teamBpic);
      }
      else if (gameB == arrayofpicks[i])
      {
        putborder(teamBpic , teamApic);
      }
      else if (arrayofpicks[i] == null)
      {
        continue;
      }
      else 
      {
        if(error_flag==true){continue;}
        alert("ERROR---> arrayofpicks, data is corrupt biggame.js function=showthemtheirpicks()  <---ERROR");
        error_flag = true;
      }
    }
  }
  else
  {
    var id1,id2;
    var AorB =arrayofpicks.substring(arrayofpicks.length-1,arrayofpicks.length);
    if(AorB=="A")
    {
      id1=arrayofpicks;
      id2=arrayofpicks.substring(0,arrayofpicks.length-1)+"B";
      putborder( document.getElementById(id1).value+"pic", 
                 document.getElementById(id2).value+"pic" );
    }
    else
    {
      id1=arrayofpicks.substring(0,arrayofpicks.length-1)+"A";
      id2=arrayofpicks;
      putborder( document.getElementById(id2).value+"pic", 
                 document.getElementById(id1).value+"pic" );         
    }
  }
}

function BGmodalmanip()
{
  var modalmanip          = get("biggamemodal");
  modalmanip.style.display= "none";
  var BGprompt            = document.getElementById("BGprompt");
  BGprompt.style.display  = "none";   
}

function seconds_to_milli(int)
{
 return (int*1000);
}
function createbiggameform(teamnames)
{
  var awayteam      = [];
  var hometeam      = [];
  var day           = [];
  var date          = [];
  var time          = [];
  var network       = [];
  var translatepics = [];
  var userpics      = [];
  var game_stamp    = [];
  var awayscore     = [];
  var homescore     = [];
  var winner        = [];
  var x=0;
  var i=0;
  var justtosee = 58;
  for(x=0;x<129;x+=8)
  {
    awayteam     [i]=                  teamnames[ x ];
    hometeam     [i]=                  teamnames[x+1];
    game_stamp   [i]= seconds_to_milli(teamnames[x+2]);
    network      [i]=                  teamnames[x+3];
    translatepics[i]=                  teamnames[x+4];
    awayscore    [i]=                  teamnames[x+5];
    homescore    [i]=                  teamnames[x+6];
    winner       [i]=                  teamnames[x+7];
    
    day          [i]= "TS";
    date         [i]= "TS";
    time         [i]= "TS";

        
    if(translatepics[i]==0){userpics[i]=awayteam[i];}
    else{userpics[i]=hometeam[i];}
  
    i+=1;
  }
  var gamenum     ;   
  var inputid     ;
  var name        ;
  var value       ;
  var src         ;
  var srcid       ;
  var idtwo       ;
  var valuetwo    ;
  var srctwo      ;
  var srcidtwo    ;  
  var testinfotext;
  x=0;
  i=0;
  
  for(i=0;i<16;i++)//<<<---CREATE BIG GAME LOOP
  {
     //var mymouse2 = new popOutApp();
    gamenum=i+1;     //<<<---gamenum reference starts from 1 NOT zero
    //this is the content box.
    var biggamebody = get("biggamebody");   
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
    var gametitletext = document.createTextNode(day[i]);
    gametitle.appendChild(gametitletext);
    gametitlecontainer.appendChild(gametitle);
    //create gameinfowrap
    var gameinfowrap = document.createElement("div");
    gameinfowrap.setAttribute("class","gameinfowrap");
    //create p element tag
    var gameinfoP=document.createElement("p");
    gameinfoP.setAttribute("class","gameinfoP");
    //append gameinfo textnode to p tag
    var gameinfotext = document.createTextNode(date[i]+" "+time[i]+" "+network[i]);
    gameinfoP.appendChild(gameinfotext);
    //append p tag to pickgamecontainer
    gameinfowrap.appendChild(gameinfoP);
    pickgamecontainer.appendChild(gameinfowrap);
    //child of picksgamecontainer, helmetswrapper
    var helmetswrapper = document.createElement("div");
    helmetswrapper.setAttribute("class","helmetswrapper");
    pickgamecontainer.appendChild(helmetswrapper);
    //child of helmetswrapper, awayteam score
    var awayteamscore = document.createElement("div");
    awayteamscore.setAttribute("class","awayteamscore");
    var textawayteamscore = document.createTextNode(awayscore[i]);
    awayteamscore.appendChild(textawayteamscore);
    helmetswrapper.appendChild(awayteamscore);
    //child of helmetswrapper, tagname label
    var labelone = document.createElement("label");
    helmetswrapper.appendChild(labelone);           
    //set variables
    inputid = "game"+gamenum+"A";
    name    = "game"+gamenum;
    value   = awayteam[i];
    src     = "images/helmets/"+awayteam[i]+".png";
    srcid   = awayteam[i]+"pic";
    //childofhelmetswrapper, child of tagname-label, radioinputone
    var inputone = document.createElement("input");
    inputone.setAttribute("id",inputid);
    inputone.setAttribute("class","helmetradioinput");
    inputone.setAttribute("type","radio");
    inputone.setAttribute("name",name);
    inputone.setAttribute("value",value);
    inputone.addEventListener("change",function(){showthemtheirpicks(this.id);});
    labelone.appendChild(inputone);
    //childofhelmetswrapper, child of tagname-label, 2ndchild, img
    var img = document.createElement("img");
    img.setAttribute("src",src);
    img.setAttribute("class","helmetpng");
    img.setAttribute("id",srcid);
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
    //set variables
    idtwo= "game"+gamenum+"B";
    valuetwo = hometeam[i];
    srctwo= "/images/helmets/"+hometeam[i]+".png";
    srcidtwo= hometeam[i]+"pic";
    //childofhelmetswrapper, child of tagname-label, radioinputTWO
    var inputTWO = document.createElement("input");
    inputTWO.setAttribute("id",idtwo);
    inputTWO.setAttribute("class","helmetradioinput");
    inputTWO.setAttribute("type","radio");
    inputTWO.setAttribute("name",name);
    inputTWO.setAttribute("value",valuetwo);
    inputTWO.addEventListener("change",function(){showthemtheirpicks(this.id);});
    labelTWO.appendChild(inputTWO);
    //childofhelmetswrapper, child of tagname-label, 2ndchild, imgTWO
    var imgTWO = document.createElement("img");
    imgTWO.setAttribute ("src", srctwo);
    imgTWO.setAttribute ("class", "helmetpng");
    imgTWO.setAttribute ("id", srcidtwo);
    labelTWO.appendChild(imgTWO);
    //child of helmetswrapper, hometeamscore
    var hometeamscore = document.createElement("div");
    hometeamscore.setAttribute("class","hometeamscore");
    var texthometeamscore = document.createTextNode(homescore[i]);
    hometeamscore.appendChild (texthometeamscore);
    helmetswrapper.appendChild(hometeamscore);
    //create awayteam, child of picksgamecontainer
    var awayteamdiv = document.createElement("div");
    awayteamdiv.setAttribute("class","awayteam");
    var textawayteam = document.createTextNode(awayteam[i]); 
    awayteamdiv.appendChild(textawayteam);
    pickgamecontainer.appendChild(awayteamdiv);
    //create hometeam, child of picksgamecontainer
    var hometeamdiv = document.createElement("div");
    hometeamdiv.setAttribute("class","hometeam");
    var texthometeam = document.createTextNode(hometeam[i]); 
    hometeamdiv.appendChild(texthometeam);
    pickgamecontainer.appendChild(hometeamdiv);
    //create awayteamsite, child of picksgamecontainer
    var awayteamsite = document.createElement("div");
    awayteamsite.setAttribute("class","awayteamsite");
    awayteamsite.setAttribute("id","awayteamsite"+gamenum);
    awayteamsite.addEventListener("click",function(){if (event.target == this){var pop_obj= new popUP(this.id,this.innerHTML); pop_obj.popitUP();}});//{PopUp_lib(this.id,this.innerHTML);}});
    var textawayteamsite = document.createTextNode(awayteam[i]+" Stats"); 
    awayteamsite.appendChild(textawayteamsite);
    pickgamecontainer.appendChild(awayteamsite);
    //create hometeamsite, child of picksgamecontainer
    var hometeamsite = document.createElement("div");
    hometeamsite.setAttribute("class","hometeamsite");
    hometeamsite.setAttribute("id","hometeamsite"+gamenum);
    hometeamsite.addEventListener("click",function(){if (event.target == this){var pop_obj= new popUP(this.id,this.innerHTML); pop_obj.popitUP();}});
    var texthometeamsite = document.createTextNode(hometeam[i]+" Stats");
    hometeamsite.appendChild(texthometeamsite);
    pickgamecontainer.appendChild(hometeamsite);
    //create pickgamefooter, child of picksgamecontainer
    var pickgamefooter = document.createElement("div");
    pickgamefooter.setAttribute("class","pickgamefooter");
    var textpickgamefooter = document.createTextNode("footer"); 
    pickgamefooter.appendChild(textpickgamefooter);
    pickgamecontainer.appendChild(pickgamefooter);
    //this puts a shield over the entire pickgamecontainer because it is a bye week for these teams
    //this will change, eventually we will check gamestate, and run this if game is on a bye 
    if(gametitle.innerHTML == "Bye Week")
    {
      var byeblock = document.createElement("div");
      byeblock.setAttribute("class","byeblock");
      pickgamecontainer.appendChild(byeblock);    
    }

  }//<<<---CREATE BIG GAME LOOP CLOSING BRACKET--->>>
  //submit button create, child of biggamebody
  var submitbutton = document.createElement("input");
  submitbutton.setAttribute("type","submit");
  biggamebody.appendChild(submitbutton);
  showthemtheirpicks(userpics);


}  //<<--createbiggameform closing bracket

function popOutApp() 
{
  //properties
  alert("newobj");
  var handle;
  var popout_class;
  var popout_id;
  var popout;
  var popouthandle
  var id;
  var i=1;//used to create unique id's for clicked elements
  var parent;// this is element that was clicked originally(i.e. the popouts parent). used to delete the popout
  var flag=false;// used to identify which element is being clicked. (bubbling BS)
  
  popOutApp.prototype.init = function(init_id)
  {
    alert("flag= "+flag);
    alert("i= "+i);
    if(!flag)
    {
      
      i++;
      id=init_id;
      justx = init_id.substring(0,12);
      popout_class=justx+"child";
      popout_id=popout_class+i;
      handle=document.getElementById(init_id);
      popout=document.createElement("div");
      popout.setAttribute("class",popout_class);
      popout.setAttribute("id",popout_id);
      popout.style.display="inline"; 
      handle.appendChild(popout);             
      popouthandle=document.getElementById(popout_id);
      popOutApp.prototype.ajax_get_teamstats();
      flag = true;
    }
    // popouthandle.addEventListener("mouseout",function(){flag=false;popOutApp.prototype.out(id,popouthandle);},false);
    popouthandle.addEventListener("click",function(){flag=false;alert("popouthandle.= "+popouthandle.id);popOutApp.prototype.out(id,popouthandle);});
    //flag=false; 
  }
  
  popOutApp.prototype.over = function()
  {
    alert("mouseover");
  }
  
  popOutApp.prototype.out = function(id,popouthandle)
  {
    alert("outfired and id= "+id);
    parent=document.getElementById(id); 
    parent.removeChild(popouthandle);
  }
  
  popOutApp.prototype.ajax_callback = function(url,whenReady_function)
  {
    if (window.XMLHttpRequest)
    {
      request = new XMLHttpRequest();
    }
    else
    {
      request = new ActiveXObject("Microsoft.XMLHTTP");
    }
    request.onreadystatechange = whenReady_function;
    request.open("POST",url,true);
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    request.send();
 }
 popOutApp.prototype.ajax_get_teamstats = function()
 {
   popOutApp.prototype.ajax_callback("PHPs/getteamstats.php?variable=thisisthevariableeeeeeeeeeee",function()
   {
     if (request.readyState==4 && request.status==200)
     {
       document.getElementById(popout_id).innerHTML = request.responseText;
     }
   });
 }
    
}  //<<--END OF popOutApp definition

//function ajax_get_teamstats()
//{
//
//}
//function callAjax(targets_id,uri)
//{
//  var jax = new XMLHttpRequest();
//  jax.onreadystatechange= function()
//  {
//    if (jax.readyState==4 && jax.status==200)
//    {
//      var target = document.getElementById(targets_id);
//      target.innerHTML = jax.responseText;//<--this is the array of userspicks, for particular week
//      //var splitpicksarray = getarrayofpicks.split(" ",16);
//      //showthemtheirpicks(splitpicksarray);
//    }
//  }
//  jax.open("POST",url,true);
//  jax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//  jax.send();
//}





/*********************************Functions for BigGame(END)*******************************/
/******************************************************************************************/
/******************************************************************************************/