<?php
require_once "../inc/config.php";
require_once "../inc/db.conf.php";

/**
 * TACHE CRON pour Valider automatique les commandes le vendredi à 00h00
 */

$semaine = date("W");

$sql_menu = mysql_query("SELECT * FROM menu WHERE semaine = '$semaine'")or die(mysql_error());
$menu = mysql_fetch_array($sql_menu);
$idmenu = $menu['idmenu'];

$sql_commande = mysql_query("SELECT * FROM commande WHERE idmenu = '$idmenu' AND etat_commande = 0")or die(mysql_error());
while ($commande = mysql_fetch_array($sql_commande)){
    $sql_update = mysql_query("UPDATE commande SET etat_commande = 1 WHERE idcommande = ".$commande['idcommande'])or die(mysql_error());
    var_dump($commande);
}

