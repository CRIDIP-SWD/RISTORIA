<?php
//Verification de l'état du menu
$sql_menu = mysql_query("SELECT * FROM menu")or die(mysql_error());
$donnee_menu = mysql_fetch_array($sql_menu);

?>
<?php

$sql_user = mysql_query("SELECT iduser, login, groupe FROM utilisateur WHERE login = '$login'")or die(mysql_error());
$donnee_user = mysql_fetch_array($sql_user);
$iduser = $donnee_user['iduser'];
$sql_utilisateur = mysql_query("SELECT * FROM utilisateur WHERE iduser = '$iduser'")or die(mysql_error());
$donnee_utilisateur = mysql_fetch_array($sql_utilisateur);
$groupe = $donnee_utilisateur['groupe'];

//Societe
$sql_setting = mysql_query("SELECT * FROM setting WHERE idsetting = '1'")or die(mysql_error());
$donnee_setting = mysql_fetch_array($sql_setting);
$raison_social = $donnee_setting['raison_social'];
$etat_programme = $donnee_setting['etat_programme'];
$serial = $donnee_setting['serial'];
$date_fin_serial = $donnee_setting['date_fin_serial'];

?>