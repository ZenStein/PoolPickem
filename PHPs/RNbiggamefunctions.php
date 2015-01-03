<?php

function ReturnGameTitle($day)
{
       if($day == "THU"){return "Thursday Night Football" ;}
  else if($day == "SUN"){return "Sunday"                  ;}
  else if($day == "MON"){return "Monday Night Football"   ;}
  else if($day == "Bye"){return "Bye Week"                ;}
  else                  {return "error"                   ;}    
}

function TurnCityToTeamName($cityname)
{
       if($cityname == "Green Bay"    ){return "Packers"    ;}
  else if($cityname == "Seattle"      ){return "Seahawks"   ;}
  else if($cityname == "New Orleans"  ){return "Saints"     ;}
  else if($cityname == "Atlanta"      ){return "Falcons"    ;}
  else if($cityname == "Buffalo"      ){return "Bills"      ;}
  else if($cityname == "Chicago"      ){return "Bears"      ;}
  else if($cityname == "Tennessee"    ){return "Titans"     ;}
  else if($cityname == "Kansas City"  ){return "Chiefs"     ;}
  
  else if($cityname == "Tampa Bay"    ){return "Buccaneers" ;}
  else if($cityname == "San Diego"    ){return "Chargers"   ;}
  else if($cityname == "Cincinnati"   ){return "Bengals"    ;}
  else if($cityname == "Baltimore"    ){return "Ravens"     ;}
  else if($cityname == "Cleveland"    ){return "Browns"     ;}
  else if($cityname == "Detroit"      ){return "Lions"      ;}
  else if($cityname == "Dallas"       ){return "Cowboys"    ;}
  else if($cityname == "St. Louis"    ){return "Rams"       ;}
  
  else if($cityname == "Oakland"      ){return "Raiders"    ;}
  else if($cityname == "New England"  ){return "Patriots"   ;}
  else if($cityname == "Minnesota"    ){return "Vikings"    ;}
  else if($cityname == "Houston"      ){return "Texans"     ;}
  else if($cityname == "NY Giants"    ){return "Giants"     ;}
  else if($cityname == "Washington"   ){return "Redskins"   ;}
  else if($cityname == "Philadelphia" ){return "Eagles"     ;}
  else if($cityname == "Indianapolis" ){return "Colts"      ;}
  
  else if($cityname == "Jacksonville" ){return "Jaguars"    ;}
  else if($cityname == "San Francisco"){return "49ers"      ;}
  else if($cityname == "Arizona"      ){return "Cardinals"  ;}
  else if($cityname == "Miami"        ){return "Dolphins"   ;}
  else if($cityname == "Denver"       ){return "Broncos"    ;}
  else if($cityname == "Pittsburgh"   ){return "Steelers"   ;}
  else if($cityname == "Carolina"     ){return "Panthers"   ;}
  else if($cityname == "NY Jets"      ){return "Jets"       ;}
  
  else{return $cityname." error";}//<-- NOT COMPLETE GET THIS ON DB! This is just temporary placeholder
}

function Getdatesuffix($stringendswithINT)
{
  $getint = substr($stringendswithINT, -1);
       if ($getint==1) {return "st";}
  else if ($getint==2) {return "nd";}
  else if ($getint==3) {return "rd";}
  else                 {return "th";}    
}

function getweekstring($week)
{
     if($week == "week1" ) {return  "Week 01";}	
else if($week == "week2" ) {return  "Week 02";}
else if($week == "week3" ) {return  "Week 03";}
else if($week == "week4" ) {return  "Week 04";}
else if($week == "week5" ) {return  "Week 05";}
else if($week == "week6" ) {return  "Week 06";}
else if($week == "week7" ) {return  "Week 07";}
else if($week == "week8" ) {return  "Week 08";}
else if($week == "week9" ) {return  "Week 09";}
else if($week == "week10") {return  "Week 10";}
else if($week == "week11") {return  "Week 11";}
else if($week == "week12") {return  "Week 12";}
else if($week == "week13") {return  "Week 13";}
else if($week == "week14") {return  "Week 14";}
else if($week == "week15") {return  "Week 15";}
else if($week == "week16") {return  "Week 16";}
else if($week == "week17") {return  "Week 17";}
else   {return "error";}
}
?>