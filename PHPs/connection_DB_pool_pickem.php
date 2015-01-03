<?php

      $host = 'pool_pickem.db.12077161.hostedresource.com';
	  $username = 'pool_pickem';
	  $password = 'Aquem!n!213';
      $database = 'pool_pickem';
      
      $db = new MySQLi($host,$username,$password,$database);
      $error_message = $db->connect_error;
      if($error_message != NULL){include '../PHPs/errors_page.php';}
      //echo "connected!!";
   
?>