<?php
//array of an array of an array for all teams and type of way to view their name
$allteams = array("NFCnorth" => array("packers" =>array("GB","Green Bay","Packers"),"seahawks" => array("SA","Seattle","Sea Hawks")), 
		          "AFCnorth" => array("ravens" => array("BA","Baltimore","Ravens") , "bengals" => array("CI","Cincinnati","Bengals")));

echo "were good <br><br><br>";

echo $allteams['NFCnorth']['packers'][1] . "<br>";
echo $allteams['NFCnorth']['seahawks'][1] . "<br>";
echo $allteams['AFCnorth']['bengals'][1] . "<br>";
?>