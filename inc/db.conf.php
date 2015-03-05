<?php 
function BaseConnect(){
	//connexion base de donnée
	define("HOST", "localhost");
	define("USER", "remote-user");
	define("PASS", "1992maxime");
	define("BASE", "ristoria");

	$sql_connect = mysql_connect(HOST, USER, PASS)or die(mysql_error());
	$sql_select_db = mysql_select_db(BASE)or die(mysql_error());
}
 ?>