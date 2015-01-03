<?php 
function test(){
session_start();
$_SESSION['loggedin'] = true;
return "true";
}
test();
?>