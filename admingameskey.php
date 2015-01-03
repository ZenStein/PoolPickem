<?php


//                                   <<-----!!IMPORTANT!!----->>
//                                       -Conceptual Clarity-
//   for this code to work correctly, there needs to be the SAME NUMBER of weekly games each week.                 
//   to make sure there are 16 games each week in $allgamesKey[$x]="bye bye"
//
//                                   <<-----!!IMPORTANT!!----->>

$allgamesKey = array();

$allgamesKey[1]="saints steelers";
$allgamesKey[2]="packers seahawks";
$allgamesKey[3]="saints giants";
$allgamesKey[4]="key4";
$allgamesKey[5]="key5";
$allgamesKey[6]="key6";
$allgamesKey[7]="key7";
$allgamesKey[8]="key8";
$allgamesKey[9]="key9";
$allgamesKey[10]="key10";
$allgamesKey[11]="saints 11 steelers";
$allgamesKey[12]="packers 12 seahawks";
$allgamesKey[13]="saints 13 giants";
$allgamesKey[14]="key14";
$allgamesKey[15]="key15";
$allgamesKey[16]="key16";
$allgamesKey[17]="key17";
$allgamesKey[18]="key18";
$allgamesKey[19]="key19";
$allgamesKey[20]="key20";
$allgamesKey[21]="saints steelers";
$allgamesKey[22]="packers seahawks";
$allgamesKey[23]="saints giants";
$allgamesKey[24]="key4";
$allgamesKey[25]="key5";
$allgamesKey[26]="key6";
$allgamesKey[27]="key7";
$allgamesKey[28]="key8";
$allgamesKey[29]="key9";
$allgamesKey[30]="key10";
$allgamesKey[31]="saints 31 steelers";
$allgamesKey[32]="packers 32 32 32 32 32 seahawks";




$x=16;            //   <<<---LOOK---  make $x = the number of games for each week. should be 16 for NFL.
$y = 2;           // <<<---LOOK--- this is the number of weeks in the season. should be 17 for the NFL

$counter = 0;
for($i = 1; $i <=$y; $i++)           //weeks iterator
{
   $c = "week $i";
   $weeksarray[$c]= array();                    
   
   
   if($i != 1){$counter+=$x;}            // counter skips the first iteration, 
                                        //its job is to maintain the reference point for the $allgameskey
   for($j = 1; $j <= $x; $j++)          //gamesiterator 
   {  
     $k = "game $j";
     $t = $counter + $j;
     if($counter == 0)
     {
     $weeksarray[$c][$k] = $allgamesKey[$t];
     }
     else{$weeksarray[$c][$k] = $allgamesKey[$t];}
   }   
}
var_dump($weeksarray);
          
?>