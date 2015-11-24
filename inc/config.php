<?php 
//Paramétrage Balise Head
	$title = 'RESTOGEST';
	$logiciel = 'RESTOGEST';
	$description = '';
	define('SITE', 'http://vps221243.ovh.net/');
	define('FOLDER', 'ristoria/');
	define('ASSETS', 'assets/');
	$theme = 'fire';

//Paramétrage date & Heure
	date_default_timezone_set("EUROPE/PARIS");
	$date_systeme = date("d-m-Y");
	$heure_systeme = date("H:i");
    $semaine = date("W");
	$date_strt = strtotime($date_systeme);

 ?>