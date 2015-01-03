<?php

      $host = 'UserCreatedGames.db.12077161.hostedresource.com';
	  $username = 'UserCreatedGames';
	  $password = 'Aquem!n!213';
      $database = 'UserCreatedGames';
      
      $link = mysqli_connect($host,$username,$password,$database);
      if (mysqli_connect_errno())
              {
              die(mysqli_connect_error());
              }

?>
