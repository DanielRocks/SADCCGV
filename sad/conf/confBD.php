<?php
 function conn_mysql(){

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "sad2";
	$porta = 1433;
    // Connect to database.

	      $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
		  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $conn;
 }
?>