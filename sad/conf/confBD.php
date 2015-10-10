<?php
 function conn_mysql(){

    $host = "mysql.sadccgv.kinghost.net";
    $user = "sadccgv";
    $pwd = "SAD2015";
    $db = "sadccgv";
	$porta = 3306;
    // Connect to database.

	      $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
		  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      return $conn;
 }
?>