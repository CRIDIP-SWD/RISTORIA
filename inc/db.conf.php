<?php 
	$host = "localhost";
	$user = "test";
	$pass = "azerty1";
	$base = "test";

	$sql_connect = mysql_connect($host, $user, $pass)or die(mysql_error());
	$sql_select_db = mysql_select_db ($base) or die('Error ' . $base . ' : ' . mysql_error());
 ?>